<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Windeventrs Controller
 *
 * @property \App\Model\Table\WindeventrsTable $Windeventrs
 *
 * @method \App\Model\Entity\Windeventr[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WindeventrsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $windeventrs = $this->paginate($this->Windeventrs);

        $this->set(compact('windeventrs'));
    }

    /**
     * View method
     *
     * @param string|null $id Windeventr id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $windeventr = $this->Windeventrs->get($id, [
            'contain' => []
        ]);

        $this->set('windeventr', $windeventr);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $windeventr = $this->Windeventrs->newEntity();
        if ($this->request->is('post')) {
            $windeventr = $this->Windeventrs->patchEntity($windeventr, $this->request->getData());
            if ($this->Windeventrs->save($windeventr)) {
                $this->Flash->success(__('The windeventr has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The windeventr could not be saved. Please, try again.'));
        }
        $this->set(compact('windeventr'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Windeventr id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $windeventr = $this->Windeventrs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $windeventr = $this->Windeventrs->patchEntity($windeventr, $this->request->getData());
            if ($this->Windeventrs->save($windeventr)) {
                $this->Flash->success(__('The windeventr has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The windeventr could not be saved. Please, try again.'));
        }
        $this->set(compact('windeventr'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Windeventr id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $windeventr = $this->Windeventrs->get($id);
        if ($this->Windeventrs->delete($windeventr)) {
            $this->Flash->success(__('The windeventr has been deleted.'));
        } else {
            $this->Flash->error(__('The windeventr could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
