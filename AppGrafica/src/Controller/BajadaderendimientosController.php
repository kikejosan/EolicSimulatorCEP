<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bajadaderendimientos Controller
 *
 * @property \App\Model\Table\BajadaderendimientosTable $Bajadaderendimientos
 *
 * @method \App\Model\Entity\Bajadaderendimiento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BajadaderendimientosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $bajadaderendimientos = $this->paginate($this->Bajadaderendimientos);

        $this->set(compact('bajadaderendimientos'));
    }

    /**
     * View method
     *
     * @param string|null $id Bajadaderendimiento id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bajadaderendimiento = $this->Bajadaderendimientos->get($id, [
            'contain' => []
        ]);

        $this->set('bajadaderendimiento', $bajadaderendimiento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bajadaderendimiento = $this->Bajadaderendimientos->newEntity();
        if ($this->request->is('post')) {
            $bajadaderendimiento = $this->Bajadaderendimientos->patchEntity($bajadaderendimiento, $this->request->getData());
            if ($this->Bajadaderendimientos->save($bajadaderendimiento)) {
                $this->Flash->success(__('The bajadaderendimiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bajadaderendimiento could not be saved. Please, try again.'));
        }
        $this->set(compact('bajadaderendimiento'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bajadaderendimiento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bajadaderendimiento = $this->Bajadaderendimientos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bajadaderendimiento = $this->Bajadaderendimientos->patchEntity($bajadaderendimiento, $this->request->getData());
            if ($this->Bajadaderendimientos->save($bajadaderendimiento)) {
                $this->Flash->success(__('The bajadaderendimiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bajadaderendimiento could not be saved. Please, try again.'));
        }
        $this->set(compact('bajadaderendimiento'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bajadaderendimiento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bajadaderendimiento = $this->Bajadaderendimientos->get($id);
        if ($this->Bajadaderendimientos->delete($bajadaderendimiento)) {
            $this->Flash->success(__('The bajadaderendimiento has been deleted.'));
        } else {
            $this->Flash->error(__('The bajadaderendimiento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
