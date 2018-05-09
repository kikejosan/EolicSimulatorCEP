<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use \Cake\Routing\Router;

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
    
    public function introduccion(){
        $this->loadModel('Parques');
        $parques = $this->Parques->find('all');
        $this -> set('parques',$parques);
    }
    public function muestrorankingparque(){
//        $rankingprod = $this->Rankingprods->get($id, [
//            'contain' => []
//        ]);
//
//        $this->set('rankingprod', $rankingprod);
        /*
            Información que hace falta:
         * - Sacar la lista de todos los aeros
         * - Sacar la información del primer aerogenerador
         * - Sacar los rankings de los últimos 5 días
         * - Inhabilitar los días de los calendarios que no se puede sacar el ranking
         *          */
        //$this -> set(compact("aeros"));
        /*$formulario = $this->request->getData();
        $this->set('formulario',$formulario);*/
        $dateTaken = $this->request->getData();
        
//        $dateTaken = explode('/', $dateTaken);
//        $dateTaken=$dateTaken[2]."-".$dateTaken[0]."-".$dateTaken[1];
//        $dateTaken = $this->Rankingprods->find('all')->where(['Rankingprods.fecha =' =>$dateTaken]);
        
        
        
        $fecha = explode('/', $dateTaken["fecha"]);
        $fechaFormateado=$fecha[2]."-".$fecha[0]."-".$fecha[1];
        $rankingPrimero = $this->Rankingprods->find('all')->where(['Rankingprods.fecha =' =>$fechaFormateado]);
        $this -> set('rankingAux',$rankingPrimero);
        $this -> set('fechaAux',$fechaFormateado);

       
       
    }
    
    public function getProductividad(){
//        $rankingprod = $this->Rankingprods->get($id, [
//            'contain' => []
//        ]);
//
//        $this->set('rankingprod', $rankingprod);
        /*
            Información que hace falta:
         * - Sacar la lista de todos los aeros
         * - Sacar la información del primer aerogenerador
         * - Sacar los rankings de los últimos 5 días
         * - Inhabilitar los días de los calendarios que no se puede sacar el ranking
         *          */
        //$this -> set(compact("aeros"));
        
        
        $formulario = $this->request->getData();
        $this->set('formulario',$formulario);
        
        $this->loadModel('Aeros');
        $this->loadModel('Parques');

        $aeros = $this->Aeros->find('all');
        
        $this -> set('aeros',$aeros);

        //$idParque = $this->find('all',array('conditions' =>array('Parques.Nombre'==$formulario['parque1']),'fields' => 'User.id'));
        
        //$idParque = $this -> Parques ->find('all',array('conditions' =>array('Parques.Nombre ==' =>$formulario["parque1"])));
        
        $this->loadModel('Parques');
        $parques = $this->Parques->find('all');
        $this -> set('parques',$parques);
        //$cadenaFecha = split(",",$formulario["datepickerI"]);
        
       /*orden para sacar los ranking de ese dia*/
        $fecha = explode('/', $formulario["datepickerI"]);
        $fechaFormateado=$fecha[2]."-".$fecha[0]."-".$fecha[1];
        /*$rankingPrimero = $this->Rankingprods->find('all')->where(['Rankingprods.fecha =' =>$fechaFormateado]);
        $this -> set('rankingPrimero',$rankingPrimero);*/
        
        $rankings = $this->Rankingprods->find('all')->where(['Rankingprods.fecha =' =>$fechaFormateado]);
        $this -> set('rankings',$rankings);
        $this -> set('fechaFormateado',$fechaFormateado);
        
        
        $rankings2 = $this->Rankingprods->find('all')->where(['Rankingprods.fecha =' =>$fechaFormateado]);
        $rankingPrimero = $rankings2->first();
        $this->set("rankingPrimero",$rankingPrimero["systemNumber"]);
        $miAero = $this->Aeros->find('all')->where(['Aeros.SystemNumber =' => $rankingPrimero["systemNumber"]]);
        
        $this -> set('miAero',$miAero->first());

        //$rankingSegundo = $this->Rankingprods->query("SELECT Rankingprods.id AS `Rankingprods__id`, Rankingprods.systemNumber AS `Rankingprods__systemNumber`, Rankingprods.time AS `Rankingprods__time`, Rankingprods.suma AS `Rankingprods__suma`, Rankingprods.productividad AS `Rankingprods__productividad`, Rankingprods.events AS `Rankingprods__events`, Rankingprods.tipo AS `Rankingprods__tipo` FROM rankingprods Rankingprods WHERE Rankingprods.id =4");
        //$this -> set('rankingSegundo',$rankingSegundo);

    }
    
    public function getRankings(){
        /*$dateTaken = $this->request->getData();    */ 
        
        
    }

}
