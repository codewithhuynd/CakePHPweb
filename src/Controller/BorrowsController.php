<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Borrows Controller
 *
 * @property \App\Model\Table\BorrowsTable $Borrows
 */
class BorrowsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Borrows->find()
            ->contain(['Users', 'Books']);
        $borrows = $this->paginate($query);

        $this->set(compact('borrows'));
    }

    /**
     * View method
     *
     * @param string|null $id Borrow id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $borrow = $this->Borrows->get($id, contain: ['Users', 'Books']);
        $this->set(compact('borrow'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $borrow = $this->Borrows->newEmptyEntity();
        if ($this->request->is('post')) {
            $borrow = $this->Borrows->patchEntity($borrow, $this->request->getData());
            if ($this->Borrows->save($borrow)) {
                $this->Flash->success(__('The borrow has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The borrow could not be saved. Please, try again.'));
        }
        $users = $this->Borrows->Users->find('list', limit: 200)->all();
        $books = $this->Borrows->Books->find('list', limit: 200)->all();
        $this->set(compact('borrow', 'users', 'books'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Borrow id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $borrow = $this->Borrows->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $borrow = $this->Borrows->patchEntity($borrow, $this->request->getData());
            if ($this->Borrows->save($borrow)) {
                $this->Flash->success(__('The borrow has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The borrow could not be saved. Please, try again.'));
        }
        $users = $this->Borrows->Users->find('list', limit: 200)->all();
        $books = $this->Borrows->Books->find('list', limit: 200)->all();
        $this->set(compact('borrow', 'users', 'books'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Borrow id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $borrow = $this->Borrows->get($id);
        if ($this->Borrows->delete($borrow)) {
            $this->Flash->success(__('The borrow has been deleted.'));
        } else {
            $this->Flash->error(__('The borrow could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
