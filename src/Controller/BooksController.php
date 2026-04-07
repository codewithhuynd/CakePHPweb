<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Books Controller
 *
 * @property \App\Model\Table\BooksTable $Books
 */
class BooksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index(): void
    {
        $query = $this->Books->find()
            ->contain(['Categories']);

        // Tìm kiếm theo tên sách hoặc tác giả
        $search = $this->request->getQuery('search');
        if (!empty($search)) {
            $query = $query->where([
                'OR' => [
                    'Books.title LIKE' => '%' . $search . '%',
                    'Books.author LIKE' => '%' . $search . '%',
                ]
            ]);
        }

        // Lọc theo danh mục
        $category = $this->request->getQuery('category');
        if (!empty($category)) {
            $query = $query->where(['Books.category_id' => $category]);
        }

        $books = $this->paginate($query);

        // Lấy danh sách categories cho dropdown
        $categories = $this->Books->Categories
            ->find('list', keyField: 'id', valueField: 'name')
            ->all();

        $this->set(compact('books', 'categories'));
    }

    /**
     * View method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $book = $this->Books->get($id, contain: ['Categories', 'Users', 'Borrows']);
        $this->set(compact('book'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $book = $this->Books->newEmptyEntity();
        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $categories = $this->Books->Categories->find('list', limit: 200)->all();
        $users = $this->Books->Users->find('list', limit: 200)->all();
        $this->set(compact('book', 'categories', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $book = $this->Books->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $categories = $this->Books->Categories->find('list', limit: 200)->all();
        $users = $this->Books->Users->find('list', limit: 200)->all();
        $this->set(compact('book', 'categories', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
