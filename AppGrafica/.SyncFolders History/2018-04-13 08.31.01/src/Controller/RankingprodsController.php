<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Rankingprods Controller
 *
 * @property \App\Model\Table\RankingprodsTable $Rankingprods
 *
 * @method \App\Model\Entity\Rankingprod[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RankingprodsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $rankingprods = $this->paginate($this->Rankingprods);

        $this->set(compact('rankingprods'));
    }

    /**
     * View method
     *
     * @param string|null $id Rankingprod id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rankingprod = $this->Rankingprods->get($id, [
            'contain' => []
        ]);

        $this->set('rankingprod', $rankingprod);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rankingprod = $this->Rankingprods->newEntity();
        if ($this->request->is('post')) {
            $rankingprod = $this->Rankingprods->patchEntity($rankingprod, $this->request->getData());
            if ($this->Rankingprods->save($rankingprod)) {
                $this->Flash->success(__('The rankingprod has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rankingprod could not be saved. Please, try again.'));
        }
        $this->set(compact('rankingprod'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Rankingprod id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rankingprod = $this->Rankingprods->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rankingprod = $this->Rankingprods->patchEntity($rankingprod, $this->request->getData());
            if ($this->Rankingprods->save($rankingprod)) {
                $this->Flash->success(__('The rankingprod has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The rankingprod could not be saved. Please, try again.'));
        }
        $this->set(compact('rankingprod'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Rankingprod id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rankingprod = $this->Rankingprods->get($id);
        if ($this->Rankingprods->delete($rankingprod)) {
            $this->Flash->success(__('The rankingprod has been deleted.'));
        } else {
            $this->Flash->error(__('The rankingprod could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
