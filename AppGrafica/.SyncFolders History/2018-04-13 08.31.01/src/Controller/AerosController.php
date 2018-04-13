<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Aeros Controller
 *
 * @property \App\Model\Table\AerosTable $Aeros
 *
 * @method \App\Model\Entity\Aero[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AerosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $aeros = $this->paginate($this->Aeros);

        $this->set(compact('aeros'));
    }

    /**
     * View method
     *
     * @param string|null $id Aero id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aero = $this->Aeros->get($id, [
            'contain' => []
        ]);

        $this->set('aero', $aero);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aero = $this->Aeros->newEntity();
        if ($this->request->is('post')) {
            $aero = $this->Aeros->patchEntity($aero, $this->request->getData());
            if ($this->Aeros->save($aero)) {
                $this->Flash->success(__('The aero has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aero could not be saved. Please, try again.'));
        }
        $this->set(compact('aero'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Aero id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aero = $this->Aeros->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aero = $this->Aeros->patchEntity($aero, $this->request->getData());
            if ($this->Aeros->save($aero)) {
                $this->Flash->success(__('The aero has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aero could not be saved. Please, try again.'));
        }
        $this->set(compact('aero'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Aero id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aero = $this->Aeros->get($id);
        if ($this->Aeros->delete($aero)) {
            $this->Flash->success(__('The aero has been deleted.'));
        } else {
            $this->Flash->error(__('The aero could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
