<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Notificacions Controller
 *
 * @property \App\Model\Table\NotificacionsTable $Notificacions
 *
 * @method \App\Model\Entity\Notificacion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NotificacionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $notificacions = $this->paginate($this->Notificacions);

        $this->set(compact('notificacions'));
    }

    /**
     * View method
     *
     * @param string|null $id Notificacion id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $notificacion = $this->Notificacions->get($id, [
            'contain' => []
        ]);

        $this->set('notificacion', $notificacion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $notificacion = $this->Notificacions->newEntity();
        if ($this->request->is('post')) {
            $notificacion = $this->Notificacions->patchEntity($notificacion, $this->request->getData());
            if ($this->Notificacions->save($notificacion)) {
                $this->Flash->success(__('The notificacion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notificacion could not be saved. Please, try again.'));
        }
        $this->set(compact('notificacion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Notificacion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $notificacion = $this->Notificacions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $notificacion = $this->Notificacions->patchEntity($notificacion, $this->request->getData());
            if ($this->Notificacions->save($notificacion)) {
                $this->Flash->success(__('The notificacion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The notificacion could not be saved. Please, try again.'));
        }
        $this->set(compact('notificacion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Notificacion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $notificacion = $this->Notificacions->get($id);
        if ($this->Notificacions->delete($notificacion)) {
            $this->Flash->success(__('The notificacion has been deleted.'));
        } else {
            $this->Flash->error(__('The notificacion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    /* Método que cambia las notificaciones del estado "Pendiente" a "Tramitada", para dar por visualizadas las notificaciones */
    public function actualizarEstado($id = null)
    {
        $this->request->allowMethod(['post', 'actualizarEstado']);
        $notificacion = $this->Notificacions->get($id);
        $notificacion->estado="Tramitada";
        if ($this->Notificacions->save($notificacion)) {
            
        } else {
            $this->Flash->error(__('La notificacion no ha sido tramitada, inténtelo de nuevo.'));
        }

        return $this->redirect(['action' => 'mostrarNotificacions']);
    }
    /* Refresco de notificaciones en el na-top */
    public function navNotificacions(){
        /* Cargo el número de notificaciones de cada tipo que están en estado "Pendiente" y las sumo*/
        $fueras = $this->Notificacions->find('all')->where(['Notificacions.tipo =' => "Fuera", "Notificacions.estado ="=>"Pendiente"])->count();
        $bajadasM = $this->Notificacions->find('all')->where(['Notificacions.tipo =' => "BajadaM", "Notificacions.estado ="=>"Pendiente"])->count();
        $bajadasD = $this->Notificacions->find('all')->where(['Notificacions.tipo =' => "BajadaD", "Notificacions.estado ="=>"Pendiente"])->count();
        $transicions = $this->Notificacions->find('all')->where(['Notificacions.tipo =' => "Transicion", "Notificacions.estado ="=>"Pendiente"])->count();
        $total = $fueras+$bajadasM+$bajadasD+$transicions;
        
        /*Envío la información para ser mostrada en la vista*/
        $this->set("fueras",$fueras);
        $this->set("bajadasM",$bajadasM);
        $this->set("bajadasD",$bajadasD);
        $this->set("transicions",$transicions);
        $this->set("total",$total);
    }
    public function mostrarNotificacions(){
        /* Cargo todas las notificaciones que están en estado "Pendiente"*/
        $fueras = $this->Notificacions->find('all')->where(['Notificacions.tipo =' => "Fuera", "Notificacions.estado ="=>"Pendiente"]);
        $bajadasM = $this->Notificacions->find('all')->where(['Notificacions.tipo =' => "BajadaM", "Notificacions.estado ="=>"Pendiente"]);
        $bajadasD = $this->Notificacions->find('all')->where(['Notificacions.tipo =' => "BajadaD", "Notificacions.estado ="=>"Pendiente"]);
        $transicions = $this->Notificacions->find('all')->where(['Notificacions.tipo =' => "Transicion", "Notificacions.estado ="=>"Pendiente"]);
        
        /* Envío la información a la vista para mostrarlas en datetables */
        $this->set("fueras",$fueras);
        $this->set("bajadasM",$bajadasM);
        $this->set("bajadasD",$bajadasD);
        $this->set("transicions",$transicions);
        
    }
}
