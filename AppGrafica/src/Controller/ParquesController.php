<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Parques Controller
 *
 * @property \App\Model\Table\ParquesTable $Parques
 *
 * @method \App\Model\Entity\Parque[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ParquesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $parques = $this->paginate($this->Parques);

        $this->set(compact('parques'));
    }

    /**
     * View method
     *
     * @param string|null $id Parque id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $parque = $this->Parques->get($id, [
            'contain' => []
        ]);

        $this->set('parque', $parque);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parque = $this->Parques->newEntity();
        if ($this->request->is('post')) {
            $parque = $this->Parques->patchEntity($parque, $this->request->getData());
            if ($this->Parques->save($parque)) {
                $this->Flash->success(__('The parque has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parque could not be saved. Please, try again.'));
        }
        $this->set(compact('parque'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Parque id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parque = $this->Parques->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $parque = $this->Parques->patchEntity($parque, $this->request->getData());
            if ($this->Parques->save($parque)) {
                $this->Flash->success(__('The parque has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The parque could not be saved. Please, try again.'));
        }
        $this->set(compact('parque'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Parque id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $parque = $this->Parques->get($id);
        if ($this->Parques->delete($parque)) {
            $this->Flash->success(__('The parque has been deleted.'));
        } else {
            $this->Flash->error(__('The parque could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
