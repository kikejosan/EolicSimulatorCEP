<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Estadisticodiarios Controller
 *
 * @property \App\Model\Table\EstadisticodiariosTable $Estadisticodiarios
 *
 * @method \App\Model\Entity\Estadisticodiario[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstadisticodiariosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $estadisticodiarios = $this->paginate($this->Estadisticodiarios);

        $this->set(compact('estadisticodiarios'));
    }

    /**
     * View method
     *
     * @param string|null $id Estadisticodiario id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estadisticodiario = $this->Estadisticodiarios->get($id, [
            'contain' => []
        ]);

        $this->set('estadisticodiario', $estadisticodiario);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estadisticodiario = $this->Estadisticodiarios->newEntity();
        if ($this->request->is('post')) {
            $estadisticodiario = $this->Estadisticodiarios->patchEntity($estadisticodiario, $this->request->getData());
            if ($this->Estadisticodiarios->save($estadisticodiario)) {
                $this->Flash->success(__('The estadisticodiario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estadisticodiario could not be saved. Please, try again.'));
        }
        $this->set(compact('estadisticodiario'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estadisticodiario id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estadisticodiario = $this->Estadisticodiarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estadisticodiario = $this->Estadisticodiarios->patchEntity($estadisticodiario, $this->request->getData());
            if ($this->Estadisticodiarios->save($estadisticodiario)) {
                $this->Flash->success(__('The estadisticodiario has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estadisticodiario could not be saved. Please, try again.'));
        }
        $this->set(compact('estadisticodiario'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estadisticodiario id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estadisticodiario = $this->Estadisticodiarios->get($id);
        if ($this->Estadisticodiarios->delete($estadisticodiario)) {
            $this->Flash->success(__('The estadisticodiario has been deleted.'));
        } else {
            $this->Flash->error(__('The estadisticodiario could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function introRendimiento(){
        $this->loadModel('Parques');
        $parques = $this->Parques->find('all');
        $this -> set('parques',$parques);
        
        
        $estadistiosFechas = $this->Estadisticodiarios->find('all')->select(['Estadisticodiarios.fecha'])->group(['Estadisticodiarios.fecha'])->order(['Estadisticodiarios.fecha' => 'DESC']);  
        $fechasLimite = array();
        array_push($fechasLimite,$estadistiosFechas->last()['fecha']);
        array_push($fechasLimite,$estadistiosFechas->first()['fecha']);
        $this->set('fechasLimite',implode(',',$fechasLimite));
        
    }
    public function getRendimiento(){
        $this->loadModel('Fueras');
        $this->loadModel('Bajadaderendimientos');
        $this->loadModel('Rankingprods');
        $this->loadModel('Aeros');
        $this->loadModel('Parques');
        
        
        
        $this->loadModel('Parques');
        $parques = $this->Parques->find('all');
        $this -> set('parques',$parques);
        
        
        
        
        $bines = $this->Estadisticodiarios->find('all')->select(['Estadisticodiarios.viento'])->group(['Estadisticodiarios.viento'])->order(['Estadisticodiarios.viento' => 'ASC']);  
        $this->set('bines',$bines);
        

        $estadistiosFechas = $this->Estadisticodiarios->find('all')->select(['Estadisticodiarios.fecha'])->group(['Estadisticodiarios.fecha'])->order(['Estadisticodiarios.fecha' => 'DESC']);  
        $fechasLimite = array();
        array_push($fechasLimite,$estadistiosFechas->last()['fecha']);
        array_push($fechasLimite,$estadistiosFechas->first()['fecha']);
        $this->set('fechasLimite',implode(',',$fechasLimite));
        
        
        $formulario = $this->request->getData();
        $this->set('formulario',$formulario);
        
        $nombreParque = $formulario['parque1'];
        $parqueCogido = $this->Parques->find('all')->where(['Parques.nombre =' => $nombreParque]);
        $aerosParque = $this->Aeros->find('all')->where(['Aeros.id_parque =' => $parqueCogido->first()['id']]);
        $this -> set('aeros',$aerosParque);
        
        $estadisticos = $this->Estadisticodiarios->find('all')->where(['Estadisticodiarios.fecha =' => ($this->getFormatoFecha($formulario["datepickerI"]))]);
        $this -> set('estadisticos',$estadisticos);
        
        $totalFueras = $this->Fueras->find('all')->where(['Fueras.fecha =' => ($this->getFormatoFecha($formulario["datepickerI"]))]);
        $this -> set('totalFueras',$totalFueras);
        
        $bajadas = $this->Bajadaderendimientos->find('all')->where(['Bajadaderendimientos.fecha1 =' => ($this->getFormatoFecha($formulario["datepickerI"]))]);;
        $this -> set('bajadas',$bajadas);
        
        

        
    }
    public function muestroGraficaRangos(){
        $mainData = $this->request->getData();
        $diaG = $mainData["dia"];
        $aerosG = $mainData["aerosG"];
        $this->set('contenedor',$mainData['contenedor']);
        
        $this->set('diaG',$diaG);
        $this->set('aerosG',implode(',',$aerosG));
        
        $estadisticosG = $this->Estadisticodiarios->find('all')->where(['Estadisticodiarios.fecha =' => ($this->getFormatoFecha($diaG)),'Estadisticodiarios.systemNumber =' => $aerosG[0]])->order(['Estadisticodiarios.viento' => 'ASC']);
        $estadisticosG2 = $this->Estadisticodiarios->find('all')->where(['Estadisticodiarios.fecha =' => ($this->getFormatoFecha($diaG))])->order(['Estadisticodiarios.viento' => 'ASC']);
       
        
        
        $this->set('estadisticosG',$estadisticosG);
        
        $this->set('estadisticosG2',$estadisticosG2);
        
        $medias = array();
        $desviaciones = array();
        $viento = array();
        foreach ($estadisticosG as $estadistico):
            array_push($medias, $estadistico["media"]);
            array_push($desviaciones, $estadistico["desviacion"]);
            array_push($viento, $estadistico["viento"]);
        endforeach;
        
        $this->set('medias',implode(',',$medias));
        $this->set('desviaciones',implode(',',$desviaciones));
        $this->set('viento',implode(',',$viento));



        /*Dibujar dos curvas de potencia*/
        
        
        $arrayAuxM = array();
        $arrayAuxDesv = array ();
        $arrayAuxViento = array ();
        $medias = array();
        $desviaciones = array();
        $viento = array();
        foreach ($aerosG as $aero):
            foreach ($estadisticosG2 as $estadistico):
                if($estadistico["systemNumber"]==$aero){
                    array_push($arrayAuxM, $estadistico["media"]);
                    array_push($arrayAuxDesv, $estadistico["desviacion"]);
                    array_push($arrayAuxViento, $estadistico["viento"]);
                   
                    
                    
                                                    
                }
            endforeach;
            array_push($medias,implode(',',$arrayAuxM));
            array_push($desviaciones,implode(',',$arrayAuxDesv));
            array_push($viento,implode(',',$arrayAuxViento));
            $arrayAuxM = array();
            $arrayAuxDesv = array ();
            $arrayAuxViento = array (); 
        endforeach;
        
        
        $this->set('arrayPrueba',implode('|',$viento));
        $this->set('arrayPrueba2',implode('|',$medias));
        $this->set('arrayPrueba3',implode('|',$desviaciones));
        
        $this->set('StrV',implode('|',$viento));
        $this->set('StrM',implode('|',$medias));
        $this->set('StrD',implode('|',$desviaciones));

    }
    public function muestroGraficaBarras(){
        $mainData = $this->request->getData();
        $diaG = $mainData["dia"];
        $aerosG = $mainData["aerosG"];
        
        $this->set('contenedor',$mainData['contenedor']);

        
        $this->set('diaG',$diaG);
        $this->set('aerosG',implode(',',$aerosG));
        
        $estadisticosG = $this->Estadisticodiarios->find('all')->where(['Estadisticodiarios.fecha =' => ($this->getFormatoFecha($diaG)),'Estadisticodiarios.systemNumber =' => $aerosG[0]])->order(['Estadisticodiarios.viento' => 'ASC']);
        $estadisticosG2 = $this->Estadisticodiarios->find('all')->where(['Estadisticodiarios.fecha =' => ($this->getFormatoFecha($diaG))])->order(['Estadisticodiarios.viento' => 'ASC']);
       
        
        
        $this->set('estadisticosG',$estadisticosG);
        
        $this->set('estadisticosG2',$estadisticosG2);
        
        $medias = array();
        $desviaciones = array();
        $viento = array();
        foreach ($estadisticosG as $estadistico):
            array_push($medias, $estadistico["media"]);
            array_push($desviaciones, $estadistico["desviacion"]);
            array_push($viento, $estadistico["viento"]);
        endforeach;
        
        $this->set('medias',implode(',',$medias));
        $this->set('desviaciones',implode(',',$desviaciones));
        $this->set('viento',implode(',',$viento));



        /*Dibujar dos curvas de potencia*/
        
        
        $arrayAuxM = array();
        $arrayAuxDesv = array ();
        $arrayAuxViento = array ();
        $medias = array();
        $desviaciones = array();
        $viento = array();
        foreach ($aerosG as $aero):
            foreach ($estadisticosG2 as $estadistico):
                if($estadistico["systemNumber"]==$aero){
                    array_push($arrayAuxM, $estadistico["media"]);
                    array_push($arrayAuxDesv, $estadistico["desviacion"]);
                    array_push($arrayAuxViento, $estadistico["viento"]);                                
                }
            endforeach;
            array_push($medias,implode(',',$arrayAuxM));
            array_push($desviaciones,implode(',',$arrayAuxDesv));
            array_push($viento,implode(',',$arrayAuxViento));
            $arrayAuxM = array();
            $arrayAuxDesv = array ();
            $arrayAuxViento = array (); 
        endforeach;
        
        
        $this->set('arrayPrueba',implode('|',$viento));
        $this->set('arrayPrueba2',implode('|',$medias));
        $this->set('arrayPrueba3',implode('|',$desviaciones));
        
        $this->set('StrV',implode('|',$viento));
        $this->set('StrM',implode('|',$medias));
        $this->set('StrD',implode('|',$desviaciones));
    }
    public function muestroGraficaQuesos(){
        $mainData = $this->request->getData();
        $diaG = $mainData["dia"];
        
        $this->loadModel('Fueras');
        
        $totalFueras = $this->Fueras->find('all')->where(['Fueras.fecha =' => ($this->getFormatoFecha($diaG))]);
        $vientos = $this->Fueras->find()->select(['Fueras.viento'])->where(['Fueras.fecha =' => ($this->getFormatoFecha($diaG))])->group(['Fueras.viento']);     

        
        $fuerasStr = array();
        $fuerasVientoAux = array();
        $fuerasAux = array();
        $vientosArray = array();
        foreach($vientos as $viento):
            $fuerasViento = $this->Fueras->find('all')->where(['Fueras.fecha =' => ($this->getFormatoFecha($diaG)),'Fueras.viento =' => $viento["viento"]]);
            foreach ($fuerasViento as $tupla):
                array_push($fuerasAux,$tupla["systemNumber"]);
                array_push($fuerasAux, $tupla["vecesFuera"]);
                
                array_push($fuerasVientoAux,implode(',',$fuerasAux));
                
                $fuerasAux = array();
            endforeach;
            array_push($fuerasStr,implode('|',$fuerasVientoAux));
            $fuerasVientoAux = [];
            array_push($vientosArray,$viento['viento']);
        endforeach;
        
        $this->set("fuerasStr",implode(':',$fuerasStr));
        $this->set("vientosPHP",$vientosArray);
        $contenedores = array();
        foreach($vientosArray as $viento):
            array_push($contenedores,hash('ripemd160', $viento));
        endforeach;
        $this->set('contenedores',implode(',',$contenedores));
        $this->set("vientosF",implode(',',$vientosArray));
        
    }
    
    public function muestroGraficaBinMedias(){
        $mainData = $this->request->getData();
        $diasTemporal = $mainData['dia'];
        $aerosTemporal = $mainData['aerosTemporal'];
        $bin = $mainData['binViento'];
        $contenedor = $mainData['contenedor'];
        /*Sacar los dias por separado */
        $diasTemporal = explode('-',$diasTemporal);
        $diasTemporal[0]=$this->getFormatoFecha($diasTemporal[0]);
        $diasTemporal[1]=$this->getFormatoFecha($diasTemporal[1]);
        $diasTemporal[0] =  str_replace(' ', '', $diasTemporal[0]);
        $diasTemporal[1] =  str_replace(' ', '', $diasTemporal[1]);
        
        
        $simple = array();
        $compuesto = array();
        $series = array();
        
        foreach($aerosTemporal as $aero):
            $conjuntoAero = $this->Estadisticodiarios->find('all')->find('all')->where(['Estadisticodiarios.fecha >=' => $diasTemporal[0],
                                                                                            'Estadisticodiarios.fecha <=' => $diasTemporal[1],
                                                                                            'Estadisticodiarios.viento =' => $bin,
                                                                                            'Estadisticodiarios.systemNumber =' => $aero])->order(['Estadisticodiarios.fecha' => 'ASC']);
            foreach($conjuntoAero as $conjunto):
                array_push($simple, $conjunto['fecha']);
                array_push($simple, $conjunto['media']);

                array_push($compuesto,implode(',',$simple));
                
                $simple = array();
            endforeach;
            array_push($series,implode('|',$compuesto));
            $compuesto = array();
        endforeach;
        
        $this->set('temporalMedias',implode(':',$series));
        $this->set('contenedor',$contenedor);
        $this->set('bin',$bin);
        
        
        
    }
    public function muestroGraficaBinDesviaciones(){
        $mainData = $this->request->getData();
        $diasTemporal = $mainData['dia'];
        $aerosTemporal = $mainData['aerosTemporal'];
        $bin = $mainData['binViento'];
        $contenedor = $mainData['contenedor'];
        /*Sacar los dias por separado */
        $diasTemporal = explode('-',$diasTemporal);
        $diasTemporal[0]=$this->getFormatoFecha($diasTemporal[0]);
        $diasTemporal[1]=$this->getFormatoFecha($diasTemporal[1]);
        $diasTemporal[0] =  str_replace(' ', '', $diasTemporal[0]);
        $diasTemporal[1] =  str_replace(' ', '', $diasTemporal[1]);
        
        
        $simple = array();
        $compuesto = array();
        $series = array();
        
        foreach($aerosTemporal as $aero):
            $conjuntoAero = $this->Estadisticodiarios->find('all')->find('all')->where(['Estadisticodiarios.fecha >=' => $diasTemporal[0],
                                                                                            'Estadisticodiarios.fecha <=' => $diasTemporal[1],
                                                                                            'Estadisticodiarios.viento =' => $bin,
                                                                                            'Estadisticodiarios.systemNumber =' => $aero])->order(['Estadisticodiarios.fecha' => 'ASC']);
            foreach($conjuntoAero as $conjunto):
                array_push($simple, $conjunto['fecha']);
                array_push($simple, $conjunto['desviacion']);

                array_push($compuesto,implode(',',$simple));
                
                $simple = array();
            endforeach;
            array_push($series,implode('|',$compuesto));
            $compuesto = array();
        endforeach;
        
        $this->set('temporalMedias',implode(':',$series));
        $this->set('contenedor',$contenedor);
        $this->set('bin',$bin);
    }


    public function getFormatoFecha($miFecha){
        $miFecha = explode('/', $miFecha);
        $miFecha=$miFecha[2]."-".$miFecha[1]."-".$miFecha[0];
        
        return $miFecha;
    }
    public function getFormatoFechaPicker($miFecha){
        $miFecha = explode('/',$miFecha);
        $miFecha = $miFecha[1].'/'.$miFecha[0]."/".$miFecha[2];
    }
}
