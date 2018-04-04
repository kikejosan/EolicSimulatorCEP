<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fluctuaprods Controller
 *
 * @property \App\Model\Table\FluctuaprodsTable $Fluctuaprods
 *
 * @method \App\Model\Entity\Fluctuaprod[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FluctuaprodsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $fluctuaprods = $this->paginate($this->Fluctuaprods);

        $this->set(compact('fluctuaprods'));
    }

    /**
     * View method
     *
     * @param string|null $id Fluctuaprod id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fluctuaprod = $this->Fluctuaprods->get($id, [
            'contain' => []
        ]);

        $this->set('fluctuaprod', $fluctuaprod);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fluctuaprod = $this->Fluctuaprods->newEntity();
        if ($this->request->is('post')) {
            $fluctuaprod = $this->Fluctuaprods->patchEntity($fluctuaprod, $this->request->getData());
            if ($this->Fluctuaprods->save($fluctuaprod)) {
                $this->Flash->success(__('The fluctuaprod has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fluctuaprod could not be saved. Please, try again.'));
        }
        $this->set(compact('fluctuaprod'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fluctuaprod id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fluctuaprod = $this->Fluctuaprods->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fluctuaprod = $this->Fluctuaprods->patchEntity($fluctuaprod, $this->request->getData());
            if ($this->Fluctuaprods->save($fluctuaprod)) {
                $this->Flash->success(__('The fluctuaprod has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fluctuaprod could not be saved. Please, try again.'));
        }
        $this->set(compact('fluctuaprod'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fluctuaprod id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fluctuaprod = $this->Fluctuaprods->get($id);
        if ($this->Fluctuaprods->delete($fluctuaprod)) {
            $this->Flash->success(__('The fluctuaprod has been deleted.'));
        } else {
            $this->Flash->error(__('The fluctuaprod could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
