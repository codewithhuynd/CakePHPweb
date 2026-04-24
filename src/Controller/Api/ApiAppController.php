<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Http\Exception\NotFoundException;

/**
 * API Application Controller
 *
 * Shared base class for all API controllers.
 * Provides JSON response helpers, UTF-8 charset, and
 * overrides the session-based auth guard so API consumers
 * receive proper JSON error responses instead of HTML redirects.
 *
 * @link https://book.cakephp.org/5/en/controllers.html
 */
class ApiAppController extends AppController
{
    /**
     * Initialization hook.
     *
     * Sets UTF-8 charset and configures the JSON view class
     * once for every API action, eliminating the need to repeat
     * viewBuilder setup in each individual action.
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->response = $this->response->withCharset('UTF-8');

        // Default to JSON view for all API responses
        $this->viewBuilder()->setClassName('Json');
    }

    /**
     * Before-filter override for API prefix.
     *
     * Skips the session-based login redirect from AppController
     * and returns a 401 JSON response for unauthenticated requests.
     *
     * @param \Cake\Event\EventInterface $event The beforeFilter event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeFilter(EventInterface $event)
    {
        // Intentionally do NOT call parent::beforeFilter()
        // to avoid the session-based HTML redirect.

        $session = $this->request->getSession();
        $user = $session->read('Auth');

        if (!$user) {
            $this->jsonResponse(401, false, 'Authentication required.');

            return $this->response;
        }
    }

    /**
     * Convenience method to build a standardised JSON response.
     *
     * Sets the HTTP status code, populates the standard envelope keys
     * (`success`, `message`, `data`, `errors`, `pagination`), and
     * configures serialisation — all in a single call.
     *
     * @param int         $statusCode HTTP status code (200, 201, 400, 404 …).
     * @param bool        $success    Whether the operation succeeded.
     * @param string      $message    Human-readable message.
     * @param mixed|null  $data       Entity or collection payload.
     * @param array|null  $errors     Field-level validation errors.
     * @param array|null  $pagination Pagination metadata (page, limit, total, pageCount).
     * @return void
     */
    protected function jsonResponse(
        int $statusCode,
        bool $success,
        string $message,
        mixed $data = null,
        ?array $errors = null,
        ?array $pagination = null
    ): void {
        $this->response = $this->response->withStatus($statusCode);

        $serialize = ['success', 'message'];

        $this->set('success', $success);
        $this->set('message', $message);

        if ($data !== null) {
            $this->set('data', $data);
            $serialize[] = 'data';
        }

        if ($errors !== null) {
            $this->set('errors', $errors);
            $serialize[] = 'errors';
        }

        if ($pagination !== null) {
            $this->set('pagination', $pagination);
            $serialize[] = 'pagination';
        }

        $this->viewBuilder()->setOption('serialize', $serialize);
    }

    /**
     * Extract pagination metadata from the Paginator component.
     *
     * Returns an array suitable for the `pagination` key in the
     * standard JSON envelope.
     *
     * @return array{page: int, limit: int, total: int, pageCount: int}
     */
    protected function getPaginationMeta(): array
    {
        $paging = $this->request->getAttribute('paging');
        $model = array_key_first($paging ?? []);

        if ($model === null) {
            return [];
        }

        $p = $paging[$model];

        return [
            'page'      => (int)($p['page'] ?? 1),
            'limit'     => (int)($p['perPage'] ?? $p['limit'] ?? 20),
            'total'     => (int)($p['count'] ?? 0),
            'pageCount' => (int)($p['pageCount'] ?? 1),
        ];
    }
}
