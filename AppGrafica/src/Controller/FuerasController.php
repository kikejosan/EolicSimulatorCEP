<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fueras Controller
 *
 * @property \App\Model\Table\FuerasTable $Fueras
 *
 * @method \App\Model\Entity\Fuera[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FuerasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $fueras = $this->paginate($this->Fueras);

        $this->set(compact('fueras'));
    }

    /**
     * View method
     *
     * @param string|null $id Fuera id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fuera = $this->Fueras->get($id, [
            'contain' => []
        ]);

        $this->set('fuera', $fuera);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fuera = $this->Fueras->newEntity();
        if ($this->request->is('post')) {
            $fuera = $this->Fueras->patchEntity($fuera, $this->request->getData());
            if ($this->Fueras->save($fuera)) {
                $this->Flash->success(__('The fuera has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fuera could not be saved. Please, try again.'));
        }
        $this->set(compact('fuera'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fuera id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fuera = $this->Fueras->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fuera = $this->Fueras->patchEntity($fuera, $this->request->getData());
            if ($this->Fueras->save($fuera)) {
                $this->Flash->success(__('The fuera has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fuera could not be saved. Please, try again.'));
        }
        $this->set(compact('fuera'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fuera id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fuera = $this->Fueras->get($id);
        if ($this->Fueras->delete($fuera)) {
            $this->Flash->success(__('The fuera has been deleted.'));
        } else {
            $this->Flash->error(__('The fuera could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
