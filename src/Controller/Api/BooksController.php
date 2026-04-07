<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Http\Response;

class BooksController extends AppController
{
    // KHÔNG cần initialize() nữa
    // CakePHP 5.x tự xử lý JSON qua Content-Type

    public function initialize(): void
    {
        parent::initialize();
        // Fix tiếng Việt không bị mã hóa unicode
        $this->response = $this->response
            ->withCharset('UTF-8');
    }

    public function index(): void
    {
        $books = $this->Books->find('all')
            ->contain(['Categories'])
            ->all();

        $this->set([
            'success' => true,
            'data'    => $books,
        ]);
        $this->viewBuilder()
             ->setClassName('Json')
             ->setOption('serialize', ['success', 'data']);
    }

    public function view(string $id): void
    {
        $book = $this->Books->get($id, contain: ['Categories']);

        $this->set([
            'success' => true,
            'data'    => $book,
        ]);
        $this->viewBuilder()
             ->setClassName('Json')
             ->setOption('serialize', ['success', 'data']);
    }

    public function add(): void
    {
        $book = $this->Books->newEmptyEntity();
        $book = $this->Books->patchEntity(
            $book,
            $this->request->getData()
        );

        if ($this->Books->save($book)) {
            $this->response = $this->response->withStatus(201);
            $this->set([
                'success' => true,
                'message' => 'Thêm sách thành công',
                'data'    => $book,
            ]);
        } else {
            $this->response = $this->response->withStatus(400);
            $this->set([
                'success' => false,
                'message' => 'Thêm sách thất bại',
                'errors'  => $book->getErrors(),
            ]);
        }
        $this->viewBuilder()
             ->setClassName('Json')
             ->setOption('serialize', ['success', 'message', 'data', 'errors']);
    }

    public function edit(string $id): void
    {
        $book = $this->Books->get($id);
        $book = $this->Books->patchEntity(
            $book,
            $this->request->getData()
        );

        if ($this->Books->save($book)) {
            $this->set([
                'success' => true,
                'message' => 'Cập nhật thành công',
                'data'    => $book,
            ]);
        } else {
            $this->response = $this->response->withStatus(400);
            $this->set([
                'success' => false,
                'message' => 'Cập nhật thất bại',
                'errors'  => $book->getErrors(),
            ]);
        }
        $this->viewBuilder()
             ->setClassName('Json')
             ->setOption('serialize', ['success', 'message', 'data', 'errors']);
    }

    public function delete(string $id): void
    {
        $this->request->allowMethod(['delete']);
        $book = $this->Books->get($id);

        if ($this->Books->delete($book)) {
            $this->set([
                'success' => true,
                'message' => 'Xóa sách thành công',
            ]);
        } else {
            $this->response = $this->response->withStatus(400);
            $this->set([
                'success' => false,
                'message' => 'Xóa thất bại',
            ]);
        }
        $this->viewBuilder()
             ->setClassName('Json')
             ->setOption('serialize', ['success', 'message']);
    }
}
