<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Transicions Controller
 *
 * @property \App\Model\Table\TransicionsTable $Transicions
 *
 * @method \App\Model\Entity\Transicion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransicionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $transicions = $this->paginate($this->Transicions);

        $this->set(compact('transicions'));
    }

    /**
     * View method
     *
     * @param string|null $id Transicion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transicion = $this->Transicions->get($id, [
            'contain' => []
        ]);

        $this->set('transicion', $transicion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transicion = $this->Transicions->newEntity();
        if ($this->request->is('post')) {
            $transicion = $this->Transicions->patchEntity($transicion, $this->request->getData());
            if ($this->Transicions->save($transicion)) {
                $this->Flash->success(__('The transicion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transicion could not be saved. Please, try again.'));
        }
        $this->set(compact('transicion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transicion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transicion = $this->Transicions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transicion = $this->Transicions->patchEntity($transicion, $this->request->getData());
            if ($this->Transicions->save($transicion)) {
                $this->Flash->success(__('The transicion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transicion could not be saved. Please, try again.'));
        }
        $this->set(compact('transicion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transicion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transicion = $this->Transicions->get($id);
        if ($this->Transicions->delete($transicion)) {
            $this->Flash->success(__('The transicion has been deleted.'));
        } else {
            $this->Flash->error(__('The transicion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
