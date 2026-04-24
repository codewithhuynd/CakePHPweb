<?php
declare(strict_types=1);

namespace App\Controller\Api;

/**
 * Books API Controller
 *
 * RESTful resource controller for Books.
 *
 * | HTTP Method | URL                | Action  |
 * |-------------|--------------------|---------|
 * | GET         | /api/books         | index   |
 * | GET         | /api/books/:id     | view    |
 * | POST        | /api/books         | add     |
 * | PUT/PATCH   | /api/books/:id     | edit    |
 * | DELETE      | /api/books/:id     | delete  |
 *
 * @property \App\Model\Table\BooksTable $Books
 */
class BooksController extends ApiAppController
{
    /**
     * GET /api/books
     *
     * List all books with optional search and category filters.
     * Returns paginated results with pagination metadata.
     *
     * Query parameters:
     *  - search   (string) — partial match on title or author
     *  - category (int)    — filter by category_id
     *
     * @return void
     */
    public function index(): void
    {
        $this->request->allowMethod(['get']);

        $query = $this->Books->find()
            ->contain(['Categories']);

        // Filter: search by title or author
        $search = $this->request->getQuery('search');
        if (!empty($search)) {
            $query = $query->where([
                'OR' => [
                    'Books.title LIKE'  => '%' . $search . '%',
                    'Books.author LIKE' => '%' . $search . '%',
                ],
            ]);
        }

        // Filter: by category
        $category = $this->request->getQuery('category');
        if (!empty($category)) {
            $query = $query->where(['Books.category_id' => $category]);
        }

        $books = $this->paginate($query);
        $pagination = $this->getPaginationMeta();

        $this->jsonResponse(200, true, 'Books retrieved successfully.', $books, null, $pagination);
    }

    /**
     * GET /api/books/:id
     *
     * Retrieve a single book by its ID, including related
     * Category, Users, and Borrows data.
     *
     * @param string $id Book ID.
     * @return void
     */
    public function view(string $id): void
    {
        $this->request->allowMethod(['get']);

        $book = $this->Books->get($id, contain: ['Categories', 'Users', 'Borrows']);

        $this->jsonResponse(200, true, 'Book retrieved successfully.', $book);
    }

    /**
     * POST /api/books
     *
     * Create a new book. Expects JSON body with book fields.
     *
     * @return void
     */
    public function add(): void
    {
        $this->request->allowMethod(['post']);

        $book = $this->Books->newEmptyEntity();
        $book = $this->Books->patchEntity($book, $this->request->getData());

        if ($this->Books->save($book)) {
            $this->jsonResponse(201, true, 'Book created successfully.', $book);

            return;
        }

        $this->jsonResponse(422, false, 'Validation failed. Book could not be created.', null, $book->getErrors());
    }

    /**
     * PUT|PATCH /api/books/:id
     *
     * Update an existing book. Expects JSON body with fields to update.
     *
     * @param string $id Book ID.
     * @return void
     */
    public function edit(string $id): void
    {
        $this->request->allowMethod(['put', 'patch']);

        $book = $this->Books->get($id);
        $book = $this->Books->patchEntity($book, $this->request->getData());

        if ($this->Books->save($book)) {
            $this->jsonResponse(200, true, 'Book updated successfully.', $book);

            return;
        }

        $this->jsonResponse(422, false, 'Validation failed. Book could not be updated.', null, $book->getErrors());
    }

    /**
     * DELETE /api/books/:id
     *
     * Delete a book by its ID.
     *
     * @param string $id Book ID.
     * @return void
     */
    public function delete(string $id): void
    {
        $this->request->allowMethod(['delete']);

        $book = $this->Books->get($id);

        if ($this->Books->delete($book)) {
            $this->jsonResponse(200, true, 'Book deleted successfully.');

            return;
        }

        $this->jsonResponse(500, false, 'Book could not be deleted. Please try again.');
    }
}
