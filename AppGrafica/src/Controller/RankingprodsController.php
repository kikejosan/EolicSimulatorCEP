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
    public function muestroRankingParque(){
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
        
        
        $rankingPrimero = $this->Rankingprods->find('all')->where(['Rankingprods.fecha =' => ($this->getFormatoFecha($dateTaken["fecha"]))])->order(['Rankingprods.productividad' => 'DESC']);
        $this -> set('rankingAux',$rankingPrimero);
        $this -> set('fechaAux',$dateTaken["fecha"]);

       
       
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
    
        /*$rankingPrimero = $this->Rankingprods->find('all')->where(['Rankingprods.fecha =' =>$fechaFormateado]);
        $this -> set('rankingPrimero',$rankingPrimero);*/
        
        $rankings = $this->Rankingprods->find('all')->where(['Rankingprods.fecha =' => ($this->getFormatoFecha($formulario["datepickerI"]))])->order(['Rankingprods.productividad' => 'DESC']);
        $this -> set('rankings',$rankings);
        $this -> set('fechaFormateado',$formulario["datepickerI"]);
        
        
        $rankings2 = $this->Rankingprods->find('all')->where(['Rankingprods.fecha =' => ($this->getFormatoFecha($formulario["datepickerI"]))]);
        $rankingPrimero = $rankings2->first();
        $this->set("rankingPrimero",$rankingPrimero["systemNumber"]);
        $miAero = $this->Aeros->find('all')->where(['Aeros.SystemNumber =' => $rankingPrimero["systemNumber"]]);
        
        $this -> set('miAero',$miAero->first());
        
        $this->loadModel('Transicions');
        $transiciones = $this->Transicions->find('all');
        $this -> set('transiciones',$transiciones);

        //$rankingSegundo = $this->Rankingprods->query("SELECT Rankingprods.id AS `Rankingprods__id`, Rankingprods.systemNumber AS `Rankingprods__systemNumber`, Rankingprods.time AS `Rankingprods__time`, Rankingprods.suma AS `Rankingprods__suma`, Rankingprods.productividad AS `Rankingprods__productividad`, Rankingprods.events AS `Rankingprods__events`, Rankingprods.tipo AS `Rankingprods__tipo` FROM rankingprods Rankingprods WHERE Rankingprods.id =4");
        //$this -> set('rankingSegundo',$rankingSegundo);

    }
    public function muestroGrafica(){
        $mainData = $this->request->getData();
        $diasG = $mainData["diasG"];
        $aerosG = $mainData["aerosG"];
        $diasG = explode('-',$diasG);
        $diasG[0]=$this->getFormatoFecha($diasG[0]);
        $diasG[1]=$this->getFormatoFecha($diasG[1]);
        $diasG[0] =  str_replace(' ', '', $diasG[0]);
        $diasG[1] =  str_replace(' ', '', $diasG[1]);
        
        $series = array();
        $categorias = array();
        //$rankingprodsG = $this->Rankingprods->find('all', array('conditions' => array("Rankingprods.systemNumber" => $aerosG)));
        $rankingprodsG = $this->Rankingprods->find('all')->where(['Rankingprods.fecha >=' => $diasG[0],
                                                                    'Rankingprods.fecha <=' => $diasG[1]])->order(['Rankingprods.fecha' => 'ASC']);
        foreach ($aerosG as $aero):
            $serieAero = array();
            foreach ($rankingprodsG as $ranking): 
                if($aero == $ranking["systemNumber"]){
                    array_push($serieAero, $ranking);
                }
            endforeach;
            array_push($series,$serieAero);
        endforeach;
        
        foreach ($serieAero as $registro):
            array_push($categorias,$registro["fecha"]);
        endforeach;
        /* Ahora solo cojo el dato de productividad */
        $dataAux = array();
        $dataArray = array();
        $dataStr = array();
        foreach ($series as $serieAux):
            $dataAux = array();
            foreach($serieAux as $ranking):
                array_push($dataAux,$ranking["productividad"]);
            endforeach;
            array_push($dataArray,$dataAux);
        endforeach;
        
        foreach($dataArray as $productividades):
            array_push($dataStr,implode(',',$productividades));
        endforeach;
        
        $this->set("categorias",implode(',',$categorias));
        $this ->set("dataStr",implode('|',$dataStr));

        $this ->set("series",$series);
       // $rankingprodsG = $this->Rankingprods->find('all',$conditions);
        $this ->set('rankingprodsG',$rankingprodsG);
        $this -> set('diasG',$diasG);
        $this -> set('aerosG',$aerosG);
        $this -> set('aerosStr',implode(',',$aerosG));
        

    }
    public function getInfoAero(){
                $this->loadModel('Aeros');

        $data = $this->request->getData();

        $miAero = $this->Aeros->find('all')->where(['Aeros.SystemNumber =' => $data["idAero"]]);
        
        $this -> set('miAero',$miAero->first());
    }
    
    public function getRankings(){
        /*$dateTaken = $this->request->getData();    */ 
        
        
    }
    
    public function getFormatoFecha($miFecha){
        $miFecha = explode('/', $miFecha);
        $miFecha=$miFecha[2]."-".$miFecha[1]."-".$miFecha[0];
        
        return $miFecha;
    }
    public function getFechaRango($miRango){
        $miCadena = explode('-',$miFecha);
        
    }

}
