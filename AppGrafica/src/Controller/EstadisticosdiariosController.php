<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Estadisticosdiarios Controller
 *
 * @property \App\Model\Table\EstadisticosdiariosTable $Estadisticosdiarios
 *
 * @method \App\Model\Entity\Estadisticosdiario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstadisticosdiariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $estadisticosdiarios = $this->paginate($this->Estadisticosdiarios);

        $this->set(compact('estadisticosdiarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Estadisticosdiario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estadisticosdiario = $this->Estadisticosdiarios->get($id, [
            'contain' => []
        ]);

        $this->set('estadisticosdiario', $estadisticosdiario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estadisticosdiario = $this->Estadisticosdiarios->newEntity();
        if ($this->request->is('post')) {
            $estadisticosdiario = $this->Estadisticosdiarios->patchEntity($estadisticosdiario, $this->request->getData());
            if ($this->Estadisticosdiarios->save($estadisticosdiario)) {
                $this->Flash->success(__('The estadisticosdiario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estadisticosdiario could not be saved. Please, try again.'));
        }
        $this->set(compact('estadisticosdiario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estadisticosdiario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estadisticosdiario = $this->Estadisticosdiarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estadisticosdiario = $this->Estadisticosdiarios->patchEntity($estadisticosdiario, $this->request->getData());
            if ($this->Estadisticosdiarios->save($estadisticosdiario)) {
                $this->Flash->success(__('The estadisticosdiario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estadisticosdiario could not be saved. Please, try again.'));
        }
        $this->set(compact('estadisticosdiario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estadisticosdiario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estadisticosdiario = $this->Estadisticosdiarios->get($id);
        if ($this->Estadisticosdiarios->delete($estadisticosdiario)) {
            $this->Flash->success(__('The estadisticosdiario has been deleted.'));
        } else {
            $this->Flash->error(__('The estadisticosdiario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
