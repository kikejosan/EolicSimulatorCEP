<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Cambioinicios Controller
 *
 * @property \App\Model\Table\CambioiniciosTable $Cambioinicios
 *
 * @method \App\Model\Entity\Cambioinicio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CambioiniciosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $cambioinicios = $this->paginate($this->Cambioinicios);

        $this->set(compact('cambioinicios'));
    }

    /**
     * View method
     *
     * @param string|null $id Cambioinicio id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cambioinicio = $this->Cambioinicios->get($id, [
            'contain' => []
        ]);

        $this->set('cambioinicio', $cambioinicio);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cambioinicio = $this->Cambioinicios->newEntity();
        if ($this->request->is('post')) {
            $cambioinicio = $this->Cambioinicios->patchEntity($cambioinicio, $this->request->getData());
            if ($this->Cambioinicios->save($cambioinicio)) {
                $this->Flash->success(__('The cambioinicio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cambioinicio could not be saved. Please, try again.'));
        }
        $this->set(compact('cambioinicio'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cambioinicio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cambioinicio = $this->Cambioinicios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cambioinicio = $this->Cambioinicios->patchEntity($cambioinicio, $this->request->getData());
            if ($this->Cambioinicios->save($cambioinicio)) {
                $this->Flash->success(__('The cambioinicio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cambioinicio could not be saved. Please, try again.'));
        }
        $this->set(compact('cambioinicio'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cambioinicio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cambioinicio = $this->Cambioinicios->get($id);
        if ($this->Cambioinicios->delete($cambioinicio)) {
            $this->Flash->success(__('The cambioinicio has been deleted.'));
        } else {
            $this->Flash->error(__('The cambioinicio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
