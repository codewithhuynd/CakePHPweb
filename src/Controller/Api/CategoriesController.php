<?php
declare(strict_types=1);

namespace App\Controller\Api;

use App\Controller\AppController;

class CategoriesController extends AppController
{
    public function index(): void
    {
        $categories = $this->Categories->find('all')->all();

        $this->set([
            'success' => true,
            'data'    => $categories,
        ]);
        $this->viewBuilder()
             ->setClassName('Json')
             ->setOption('serialize', ['success', 'data']);
    }

    public function view(string $id): void
    {
        $category = $this->Categories->get($id);

        $this->set([
            'success' => true,
            'data'    => $category,
        ]);
        $this->viewBuilder()
             ->setClassName('Json')
             ->setOption('serialize', ['success', 'data']);
    }

    public function add(): void
    {
        $category = $this->Categories->newEmptyEntity();
        $category = $this->Categories->patchEntity(
            $category,
            $this->request->getData()
        );

        if ($this->Categories->save($category)) {
            $this->response = $this->response->withStatus(201);
            $this->set([
                'success' => true,
                'message' => 'Thêm danh mục thành công',
                'data'    => $category,
            ]);
        } else {
            $this->response = $this->response->withStatus(400);
            $this->set([
                'success' => false,
                'message' => 'Thêm danh mục thất bại',
                'errors'  => $category->getErrors(),
            ]);
        }
        $this->viewBuilder()
             ->setClassName('Json')
             ->setOption('serialize', ['success', 'message', 'data', 'errors']);
    }

    public function edit(string $id): void
    {
        $category = $this->Categories->get($id);
        $category = $this->Categories->patchEntity(
            $category,
            $this->request->getData()
        );

        if ($this->Categories->save($category)) {
            $this->set([
                'success' => true,
                'message' => 'Cập nhật thành công',
                'data'    => $category,
            ]);
        } else {
            $this->response = $this->response->withStatus(400);
            $this->set([
                'success' => false,
                'message' => 'Cập nhật thất bại',
                'errors'  => $category->getErrors(),
            ]);
        }
        $this->viewBuilder()
             ->setClassName('Json')
             ->setOption('serialize', ['success', 'message', 'data', 'errors']);
    }

    public function delete(string $id): void
    {
        $this->request->allowMethod(['delete']);
        $category = $this->Categories->get($id);

        if ($this->Categories->delete($category)) {
            $this->set([
                'success' => true,
                'message' => 'Xóa danh mục thành công',
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