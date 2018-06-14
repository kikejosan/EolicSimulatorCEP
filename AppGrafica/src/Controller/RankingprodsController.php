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
    /*
     * Muestra por pantalla el formulario para entrar al apartado de productividad.
     * Se filtran los días que están registrados y se muestran los parques disponibles.
     */
    public function introProductividad(){
        $this->loadModel('Parques');
        $parques = $this->Parques->find('all');
        $this -> set('parques',$parques);
        
        /* Se obtienen los días en los que se han registrado rankings diarios */
        $rankingsFechas = $this->Rankingprods->find('all')->select(['Rankingprods.fecha'])->group(['Rankingprods.fecha'])->order(['Rankingprods.fecha' => 'DESC']);  
        $fechasLimite = array();
        array_push($fechasLimite,$rankingsFechas->last()['fecha']);
        array_push($fechasLimite,$rankingsFechas->first()['fecha']);
        $this->set('fechasLimite',implode(',',$fechasLimite));

    }
    /*
     * Es una función para dar el ranking que se ha producido en una fecha concreta
     */     
    public function muestroRankingParque(){
        $mainData = $this->request->getData();       
        $rankingPrimero = $this->getRankingDia(($this->getFormatoFecha($mainData["fecha"])), $mainData['parque']);
        $this -> set('rankingAux',$rankingPrimero);
        $this -> set('fechaAux',$mainData["fecha"]);
   
    }
    /*
     *  Despliega todo el apartado de Productividad.
     *  Se cargan:
     *      - Los aerogeneradores del parque.
     *      - Los rankingprods que se han dado en ese parque el día seleccionado.
     *      - Los transiciones que se han detectado en ese parque el día seleccionado.
     */
    
    public function getProductividad(){
        $this->loadModel('Aeros');
        $this->loadModel('Parques');
        $formulario = $this->request->getData();
        $this->set('formulario',$formulario);
        $this -> set('fechaDB',$this->getFormatoFecha($formulario["datepickerI"]));
        /* Cargamos los aerogeneradores del parque */
        $nombreParque = $formulario['parque1'];
        $parqueCogido = $this->Parques->find('all')->where(['Parques.nombre =' => $nombreParque]);
        $aerosParque = $this->Aeros->find('all')->where(['Aeros.id_parque =' => $parqueCogido->first()['id']]);
        $this -> set('aeros',$aerosParque);
        $this ->set('parque',$parqueCogido->first()['id']);
        $this->set('fecha',$formulario["datepickerI"]);

        /* Cargamos las fechas en las que se han registrado Rankings diarios*/
        $rankingsFechas = $this->Rankingprods->find('all')->select(['Rankingprods.fecha'])->group(['Rankingprods.fecha'])->order(['Rankingprods.fecha' => 'DESC']);  
        $fechasLimite = array();
        array_push($fechasLimite,$rankingsFechas->last()['fecha']);
        array_push($fechasLimite,$rankingsFechas->first()['fecha']);
        $this->set('fechasLimite',implode(',',$fechasLimite));       
        
        /* Cargo los rankings de esas fechas en orden descente del parque concreto*/
        $rankings = $this->getRankingDia(($this->getFormatoFecha($formulario["datepickerI"])),$parqueCogido->first()['id']);
        $this -> set('rankings',$rankings);
        $this -> set('fechaFormateado',$formulario["datepickerI"]);
        
        
        /*   Escojo el primer ranking de todo para mostrar su información básica, en caso contrario cojo el primer aerogenerador del parque que encuentre.
         *   Puede caber la posibilidad de que el parque no tenga ningún aerogenerador registrado, y esta carga de información sea vacía
         */
        if(!empty($rankings)){
            $rankingPrimero = $rankings[0];
            $this->set("rankingPrimero",$rankingPrimero["systemNumber"]);
            $miAero = $this->Aeros->find('all')->where(['Aeros.SystemNumber =' => $rankingPrimero["systemNumber"]]);
        }else{
            $miAero = $this->Aeros->find('all')->where(['Aeros.id_parque =' =>$parqueCogido->first()['id']]);
        }
        $this -> set('miAero',$miAero->first());
        
        /* Recojo todas las transioiones que se han registrado para ese parque*/
        $transiciones = $this->getTransiciones($parqueCogido->first()['id']);
        $this -> set('transiciones',$transiciones);
    }
    /*
     *  Muestra el seguimiento de la productividad de los aerogeneradores que forman el ranking en los días introducidos por parámetro. Se cargan:
     *      - Los días del rango establecido con ranking registrados para esos aerogeneradores.
     *      - Los ranking registrados en el rango de días introducido para esos aerogeneradores, y así sacar su productividad
     */
    public function muestroGrafica(){
        /* Cargamos los días del rango introducido de días, solo el límite infimo y el maximo  */
        $mainData = $this->request->getData();
        $diasG = $mainData["diasG"];
        $aerosG = $mainData["aerosG"];
        $diasG = explode('-',$diasG);
        $diasG[0] =  str_replace(' ', '', $diasG[0]);
        $diasG[1] =  str_replace(' ', '', $diasG[1]);
        $this->set('diasG',implode(',',$diasG));
        $diasG[0]=$this->getFormatoFecha($diasG[0]);
        $diasG[1]=$this->getFormatoFecha($diasG[1]);
        
        /* Cargamos las series de la grafica con la productividad correspondiente a cada aerogenerador en el rango de dias solicitado*/        
        $simple = array();
        $compuesto = array();
        $series = array();
        foreach($aerosG as $aero):
            $conjuntoAero = $this->Rankingprods->find('all')->where(['Rankingprods.fecha >=' => $diasG[0],
                                                                                    'Rankingprods.fecha <=' => $diasG[1],
                                                                                    'Rankingprods.systemNumber =' => $aero])->order(['Rankingprods.fecha' => 'ASC']);
            foreach($conjuntoAero as $conjunto):
                array_push($simple, $conjunto['fecha']);
                array_push($simple, $conjunto['productividad']);

                array_push($compuesto,implode(',',$simple));
                
                $simple = array();
            endforeach;
            array_push($series,implode('|',$compuesto));
            $compuesto = array();
        endforeach;
        
        /*Cargo los ranking separandolos con el caracter ":" y cargamos el nombre del contenedor donde irá ubicado el gráfico*/
        $this->set('temporalRankings',implode(':',$series));
        $contenedor = $mainData['contenedor'];
        $this->set('contenedor',$contenedor);
        

        
    }
    /*
     *  Muestra el seguimiento del ranking en un conjunto de días pasados por parámetro. Se cargan:
     *      - Los días del rango establecido con ranking registrados para esos aerogeneradores.
     *      - Los ranking registrados en el rango de días introducido.
     */
    public function muestroGraficaPos(){
        /* Cargamos los días del rango introducido de días, solo el límite infimo y el maximo  */
        $this->loadModel('Escalas');
        $mainData = $this->request->getData();
        $diasG = $mainData["diasG"];
        $aerosG = $mainData["aerosG"];
        $diasG = explode('-',$diasG);
        $diasG[0] =  str_replace(' ', '', $diasG[0]);
        $diasG[1] =  str_replace(' ', '', $diasG[1]);
        $this->set('diasG',implode(',',$diasG));
        $diasG[0]=$this->getFormatoFecha($diasG[0]);
        $diasG[1]=$this->getFormatoFecha($diasG[1]);
        
        
        
        /* Cargamos las series de la grafica con la productividad correspondiente a cada aerogenerador en el rango de dias solicitado*/        
        $simple = array();
        $compuesto = array();
        $series = array();
        foreach($aerosG as $aero):
            $conjuntoAero = $this->Escalas->find('all')->where(['Escalas.fecha >=' => $diasG[0],
                                                                                    'Escalas.fecha <=' => $diasG[1],
                                                                                    'Escalas.systemNumber =' => $aero])->order(['Escalas.fecha' => 'ASC']);
            foreach($conjuntoAero as $conjunto):
                array_push($simple, $conjunto['fecha']);
                array_push($simple, $conjunto['posicion']);

                array_push($compuesto,implode(',',$simple));
                
                $simple = array();
            endforeach;
            array_push($series,implode('|',$compuesto));
            $compuesto = array();
        endforeach;
        
        /*Cargo los ranking separandolos con el caracter ":" y cargamos el nombre del contenedor donde irá ubicado el gráfico*/
        $this->set('temporalRankings',implode(':',$series));
        $contenedor = $mainData['contenedor'];
        $this->set('contenedor',$contenedor);
        

        
    }
    /* Carga los datos del modelo de un aerogenerador concreto cuyo systemNumber es pasado por parámetro:
        Muestra por pantalla:
     *      - el id de la base de datos
     *      - el systemNumber
     *      - la fila
     *      - la columna
     *      - el idIngeboards
     *      */
    public function getInfoAero(){
        /*Cargamos el modelo de Aeros y obtenemos el aerogenerador con systemNumber igual pasado por parámetro*/
        $this->loadModel('Aeros');

        $data = $this->request->getData();

        $miAero = $this->Aeros->find('all')->where(['Aeros.SystemNumber =' => $data["idAero"]]);
        
        $this -> set('miAero',$miAero->first());
    }
    
    /* Este método transforma una fecha del formato dia/mes/año al formato año-mes-dia*/
    public function getFormatoFecha($miFecha){
        $miFecha = explode('/', $miFecha);
        $miFecha=$miFecha[2]."-".$miFecha[1]."-".$miFecha[0];
        
        return $miFecha;
    }
    /* Se obtiene un array con los ranking que se ha efectuado en un parque un día concreto*/
    public function getRankingDia($unaFecha,$unParque){
        $this->loadModel('Aeros');
        $this->loadModel('Parques');
        /*Cargo los aeros del parque y los ranking de ese dia*/
        $aerosParque = $this->Aeros->find('all')->where(['Aeros.id_parque =' => $unParque]);
        $rankings = $this->Rankingprods->find('all')->where(['Rankingprods.fecha =' => $unaFecha])->order(['Rankingprods.productividad' => 'DESC']);
        
        /*Saco los ranking en orden de los aerogeneradores del parque escogido*/
        $rankingDiario = array();
        foreach($rankings as $ranking):
            foreach($aerosParque as $aero):
                if($ranking['systemNumber']==$aero['SystemNumber']){
                    array_push($rankingDiario,$ranking);
                }
            endforeach;
        endforeach;
        
        return $rankingDiario;
    }
    /* Se obtiene un array con las transiciones que se han efectuado en un parque */
    public function getTransiciones($unParque){
        $this->loadModel('Transicions');
        
        /*Cargo los aeros del parque y las transiciones todos los parques*/
        $aerosParque = $this->Aeros->find('all')->where(['Aeros.id_parque =' => $unParque]);
        $transiciones = $this->Transicions->find('all');
        
        /* Saco las transiciones de los aerogeneradores del parque que pasamos por parámetro*/
        $transicionesParque = array();
        foreach($transiciones as $transicion):
            foreach($aerosParque as $aero):
                if($transicion['systemNumber']==$aero['SystemNumber']){
                    array_push($transicionesParque,$transicion);
                }
            endforeach;
        endforeach;
        
        return $transicionesParque;
    }
    /* Separar en dos el rango de fechas */
    public function getFechaRango($miRango){
        $miCadena = explode('-',$miFecha);
        
    }
    /*Transforma una fecha en el formato mes/dia/año al formato dia/mes/año*/
    public function getFormatoFechaPicker($miFecha){
        $miFecha = explode('/',$miFecha);
        $miFecha = $miFecha[1].'/'.$miFecha[0]."/".$miFecha[2];
        return $miFecha;
    }

}
