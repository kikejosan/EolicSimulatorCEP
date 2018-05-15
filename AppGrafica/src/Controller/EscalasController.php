<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Escalas Controller
 *
 * @property \App\Model\Table\EscalasTable $Escalas
 *
 * @method \App\Model\Entity\Escala[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EscalasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $escalas = $this->paginate($this->Escalas);

        $this->set(compact('escalas'));
    }

    /**
     * View method
     *
     * @param string|null $id Escala id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $escala = $this->Escalas->get($id, [
            'contain' => []
        ]);

        $this->set('escala', $escala);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $escala = $this->Escalas->newEntity();
        if ($this->request->is('post')) {
            $escala = $this->Escalas->patchEntity($escala, $this->request->getData());
            if ($this->Escalas->save($escala)) {
                $this->Flash->success(__('The escala has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The escala could not be saved. Please, try again.'));
        }
        $this->set(compact('escala'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Escala id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $escala = $this->Escalas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $escala = $this->Escalas->patchEntity($escala, $this->request->getData());
            if ($this->Escalas->save($escala)) {
                $this->Flash->success(__('The escala has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The escala could not be saved. Please, try again.'));
        }
        $this->set(compact('escala'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Escala id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $escala = $this->Escalas->get($id);
        if ($this->Escalas->delete($escala)) {
            $this->Flash->success(__('The escala has been deleted.'));
        } else {
            $this->Flash->error(__('The escala could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
