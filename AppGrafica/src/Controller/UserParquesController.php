<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserParques Controller
 *
 * @property \App\Model\Table\UserParquesTable $UserParques
 *
 * @method \App\Model\Entity\UserParque[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserParquesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $userParques = $this->paginate($this->UserParques);

        $this->set(compact('userParques'));
    }

    /**
     * View method
     *
     * @param string|null $id User Parque id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userParque = $this->UserParques->get($id, [
            'contain' => []
        ]);

        $this->set('userParque', $userParque);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userParque = $this->UserParques->newEntity();
        if ($this->request->is('post')) {
            $userParque = $this->UserParques->patchEntity($userParque, $this->request->getData());
            if ($this->UserParques->save($userParque)) {
                $this->Flash->success(__('The user parque has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user parque could not be saved. Please, try again.'));
        }
        $this->set(compact('userParque'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Parque id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userParque = $this->UserParques->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userParque = $this->UserParques->patchEntity($userParque, $this->request->getData());
            if ($this->UserParques->save($userParque)) {
                $this->Flash->success(__('The user parque has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user parque could not be saved. Please, try again.'));
        }
        $this->set(compact('userParque'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Parque id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userParque = $this->UserParques->get($id);
        if ($this->UserParques->delete($userParque)) {
            $this->Flash->success(__('The user parque has been deleted.'));
        } else {
            $this->Flash->error(__('The user parque could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
