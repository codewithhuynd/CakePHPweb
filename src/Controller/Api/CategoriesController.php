<?php
declare(strict_types=1);

namespace App\Controller\Api;

/**
 * Categories API Controller
 *
 * RESTful resource controller for Categories.
 *
 * | HTTP Method | URL                    | Action  |
 * |-------------|------------------------|---------|
 * | GET         | /api/categories        | index   |
 * | GET         | /api/categories/:id    | view    |
 * | POST        | /api/categories        | add     |
 * | PUT/PATCH   | /api/categories/:id    | edit    |
 * | DELETE      | /api/categories/:id    | delete  |
 *
 * @property \App\Model\Table\CategoriesTable $Categories
 */
class CategoriesController extends ApiAppController
{
    /**
     * GET /api/categories
     *
     * List all categories with pagination metadata.
     *
     * @return void
     */
    public function index(): void
    {
        $this->request->allowMethod(['get']);

        $query = $this->Categories->find();
        $categories = $this->paginate($query);
        $pagination = $this->getPaginationMeta();

        $this->jsonResponse(200, true, 'Categories retrieved successfully.', $categories, null, $pagination);
    }

    /**
     * GET /api/categories/:id
     *
     * Retrieve a single category by its ID, including
     * associated Books.
     *
     * @param string $id Category ID.
     * @return void
     */
    public function view(string $id): void
    {
        $this->request->allowMethod(['get']);

        $category = $this->Categories->get($id, contain: ['Books']);

        $this->jsonResponse(200, true, 'Category retrieved successfully.', $category);
    }

    /**
     * POST /api/categories
     *
     * Create a new category. Expects JSON body.
     *
     * @return void
     */
    public function add(): void
    {
        $this->request->allowMethod(['post']);

        $category = $this->Categories->newEmptyEntity();
        $category = $this->Categories->patchEntity($category, $this->request->getData());

        if ($this->Categories->save($category)) {
            $this->jsonResponse(201, true, 'Category created successfully.', $category);

            return;
        }

        $this->jsonResponse(422, false, 'Validation failed. Category could not be created.', null, $category->getErrors());
    }

    /**
     * PUT|PATCH /api/categories/:id
     *
     * Update an existing category. Expects JSON body.
     *
     * @param string $id Category ID.
     * @return void
     */
    public function edit(string $id): void
    {
        $this->request->allowMethod(['put', 'patch']);

        $category = $this->Categories->get($id);
        $category = $this->Categories->patchEntity($category, $this->request->getData());

        if ($this->Categories->save($category)) {
            $this->jsonResponse(200, true, 'Category updated successfully.', $category);

            return;
        }

        $this->jsonResponse(422, false, 'Validation failed. Category could not be updated.', null, $category->getErrors());
    }

    /**
     * DELETE /api/categories/:id
     *
     * Delete a category by its ID.
     *
     * @param string $id Category ID.
     * @return void
     */
    public function delete(string $id): void
    {
        $this->request->allowMethod(['delete']);

        $category = $this->Categories->get($id);

        if ($this->Categories->delete($category)) {
            $this->jsonResponse(200, true, 'Category deleted successfully.');

            return;
        }

        $this->jsonResponse(500, false, 'Category could not be deleted. Please try again.');
    }

    /**
     * GET /api/categories/:id/books
     *
     * Nested sub-resource: retrieve all books belonging to
     * a specific category. Demonstrates RESTful relationship routing.
     *
     * @param string $id Category ID.
     * @return void
     */
    public function books(string $id): void
    {
        $this->request->allowMethod(['get']);

        // Verify the category exists (throws 404 if not)
        $this->Categories->get($id);

        $booksTable = $this->fetchTable('Books');
        $query = $booksTable->find()
            ->where(['Books.category_id' => $id])
            ->contain(['Categories']);

        $books = $this->paginate($query);
        $pagination = $this->getPaginationMeta();

        $this->jsonResponse(200, true, 'Books for category retrieved successfully.', $books, null, $pagination);
    }
}
