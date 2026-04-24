<?php
declare(strict_types=1);

namespace App\Controller\Api;

/**
 * Users API Controller
 *
 * RESTful resource controller for Users.
 *
 * | HTTP Method | URL                | Action  |
 * |-------------|--------------------|---------|
 * | GET         | /api/users         | index   |
 * | GET         | /api/users/:id     | view    |
 * | POST        | /api/users         | add     |
 * | PUT/PATCH   | /api/users/:id     | edit    |
 * | DELETE      | /api/users/:id     | delete  |
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends ApiAppController
{
    /**
     * GET /api/users
     *
     * List all users with pagination metadata.
     *
     * @return void
     */
    public function index(): void
    {
        $this->request->allowMethod(['get']);

        $query = $this->Users->find();
        $users = $this->paginate($query);
        $pagination = $this->getPaginationMeta();

        $this->jsonResponse(200, true, 'Users retrieved successfully.', $users, null, $pagination);
    }

    /**
     * GET /api/users/:id
     *
     * Retrieve a single user by their ID, including
     * associated Books and Borrows.
     *
     * @param string $id User ID.
     * @return void
     */
    public function view(string $id): void
    {
        $this->request->allowMethod(['get']);

        $user = $this->Users->get($id, contain: ['Books', 'Borrows']);

        $this->jsonResponse(200, true, 'User retrieved successfully.', $user);
    }

    /**
     * POST /api/users
     *
     * Create a new user. Expects JSON body with user fields.
     *
     * @return void
     */
    public function add(): void
    {
        $this->request->allowMethod(['post']);

        $user = $this->Users->newEmptyEntity();
        $user = $this->Users->patchEntity($user, $this->request->getData());

        if ($this->Users->save($user)) {
            $this->jsonResponse(201, true, 'User created successfully.', $user);

            return;
        }

        $this->jsonResponse(422, false, 'Validation failed. User could not be created.', null, $user->getErrors());
    }

    /**
     * PUT|PATCH /api/users/:id
     *
     * Update an existing user. Expects JSON body with fields to update.
     *
     * @param string $id User ID.
     * @return void
     */
    public function edit(string $id): void
    {
        $this->request->allowMethod(['put', 'patch']);

        $user = $this->Users->get($id);
        $user = $this->Users->patchEntity($user, $this->request->getData());

        if ($this->Users->save($user)) {
            $this->jsonResponse(200, true, 'User updated successfully.', $user);

            return;
        }

        $this->jsonResponse(422, false, 'Validation failed. User could not be updated.', null, $user->getErrors());
    }

    /**
     * DELETE /api/users/:id
     *
     * Delete a user by their ID.
     *
     * @param string $id User ID.
     * @return void
     */
    public function delete(string $id): void
    {
        $this->request->allowMethod(['delete']);

        $user = $this->Users->get($id);

        if ($this->Users->delete($user)) {
            $this->jsonResponse(200, true, 'User deleted successfully.');

            return;
        }

        $this->jsonResponse(500, false, 'User could not be deleted. Please try again.');
    }
}
