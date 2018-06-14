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
    /*
     * Muestra por pantalla el formulario para entrar al apartado de rendimiento.
     * Se filtran los días que están registrados y se muestran los parques disponibles.
     * 
     *  A pesar de haberse filtrado los días, puede ocurrir que no haya datos a analizar,
     *  pero en el apartado aparecerá que no hay datos, por lo que el usuario no estará perdido
     */
    public function introRendimiento(){
        $this->loadModel('Parques');
        $parques = $this->Parques->find('all');
        $this -> set('parques',$parques);
        
        /* Se obtienen los días en los que se han registrado estadisticos diarios */
        $estadistiosFechas = $this->Estadisticodiarios->find('all')->select(['Estadisticodiarios.fecha'])->group(['Estadisticodiarios.fecha'])->order(['Estadisticodiarios.fecha' => 'DESC']);  
        $fechasLimite = array();
        array_push($fechasLimite,$estadistiosFechas->last()['fecha']);
        array_push($fechasLimite,$estadistiosFechas->first()['fecha']);
        $this->set('fechasLimite',implode(',',$fechasLimite));
        
    }
    /*
     *  Despliega todo el apartado de rendimiento.
     *  Se cargan:
     *      - Los aerogeneradores del parque.
     *      - Los estadisticosdiarios que se han dado en ese parque el día seleccionado.
     *      - Los outliers que se han detectado en ese parque el día seleccionado.
     *      - Las bajadas de rendimiento que se han dado en el parque el día seleccionado.
     *  
     */
    public function getRendimiento(){
        $this->loadModel('Fueras');
        $this->loadModel('Bajadaderendimientos');
        $this->loadModel('Rankingprods');
        $this->loadModel('Aeros');
        $this->loadModel('Parques');
        
        /* Cargamos los bines en los que se han registrado estadísticos */
        $bines = $this->Estadisticodiarios->find('all')->select(['Estadisticodiarios.viento'])->group(['Estadisticodiarios.viento'])->order(['Estadisticodiarios.viento' => 'ASC']);  
        $this->set('bines',$bines);
        
        /* Cargamos las fechas en las que se han detectado estadisticos */
        $estadistiosFechas = $this->Estadisticodiarios->find('all')->select(['Estadisticodiarios.fecha'])->group(['Estadisticodiarios.fecha'])->order(['Estadisticodiarios.fecha' => 'DESC']);  
        $fechasLimite = array();
        array_push($fechasLimite,$estadistiosFechas->last()['fecha']);
        array_push($fechasLimite,$estadistiosFechas->first()['fecha']);
        $this->set('fechasLimite',implode(',',$fechasLimite));
        
        /* Cargamos los aerogeneradores que tiene el parque seleccionado */
        $formulario = $this->request->getData();
        $this->set('formulario',$formulario);
        $nombreParque = $formulario['parque1'];
        $parqueCogido = $this->Parques->find('all')->where(['Parques.nombre =' => $nombreParque]);
        $aerosParque = $this->Aeros->find('all')->where(['Aeros.id_parque =' => $parqueCogido->first()['id']]);
        $this -> set('aeros',$aerosParque);
        $this -> set('parque', $parqueCogido->first()['id']);
        $this->set('nombreParque',$nombreParque);
        $this->set('fecha',$formulario["datepickerI"]);
        
        /* Cargamos los estadisticos diarios del día seleccionado para ese parque */
        $estadisticos = $this->getEstadisticoDia(($this->getFormatoFecha($formulario["datepickerI"])), $parqueCogido->first()['id']);
        $this -> set('estadisticos',$estadisticos);
        
        /* Cargamos los outliers del día seleccionado */
        $totalFueras = $this->getFuerasDia(($this->getFormatoFecha($formulario["datepickerI"])), $parqueCogido->first()['id']);
        $this -> set('totalFueras',$totalFueras);
        
        /* Cargamos las bajadas de rendimiento que se han dado en ese día */
        $bajadas = $this->getBajadasDia(($this->getFormatoFecha($formulario["datepickerI"])), $parqueCogido->first()['id']);
        $this -> set('bajadas',$bajadas);

    }
    /* Se genera una gráfica de rangos para representar las curvas de potencia de un aerogenerador o varios.
     * Se cargan:
     *      - Medias del aerogenerador el día seleccionado
     *      - Desviaciones del aerogenerador el día seleccionado
     *      - Bines de viento de los estadisticos generados en el día seleccionado.
     *     */
    public function muestroGraficaRangos(){
        /*Cargo los datos introducidos por el formulario a la vista de la gráfica
         *  - Conjunto de aerogeneradores a seguir.
         *  - El día seleccionado.
         *          
         */
        $mainData = $this->request->getData();
        $diaG = $mainData["dia"];
        $aerosG = $mainData["aerosG"];
        $this->set('contenedor',$mainData['contenedor']);
        $this->set('diaG',$diaG);
        $this->set('aerosG',implode(',',$aerosG));
        
        /* Carga de estadisticos en el día seleccionado */
        $estadisticosG2 = $this->Estadisticodiarios->find('all')->where(['Estadisticodiarios.fecha =' => ($this->getFormatoFecha($diaG))])->order(['Estadisticodiarios.viento' => 'ASC']);

               
        /*Se cargan los datos de cada aerogenerador de tal forma que luego después se puedan transformar en elementos de JavaScript para pasarlo a la gráfica*/
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

        /* Son los bines de viento de cada aerogenerador separados por el carácter  | */
        $this->set('StrV',implode('|',$viento));
        /* Son las medias de cada aerogenerador separados por el carácter  | */
        $this->set('StrM',implode('|',$medias));
        /* Son las desviaciones de cada aerogenerador separadas por el caracter |*/
        $this->set('StrD',implode('|',$desviaciones));
    }
    /* Se genera una gráfica de barras para representar la diferencia entre las desviaciones típicas por cada aerogenerador el día seleccionado.
     * Se cargan:
     *      - Desviaciones del aerogenerador el día seleccionado
     *      - Bines de viento de los estadisticos generados en el día por los aerogeneradores seleccionados.
     * 
     *     */
    public function muestroGraficaBarras(){
        /*Cargo los datos introducidos por el formulario a la vista de la gráfica
         *  - Conjunto de aerogeneradores a seguir.
         *  - El día seleccionado.
         */
        $mainData = $this->request->getData();
        $diaG = $mainData["dia"];
        $aerosG = $mainData["aerosG"];
        $this->set('contenedor',$mainData['contenedor']);        
        $this->set('diaG',$diaG);
        $this->set('aerosG',implode(',',$aerosG));
        
        /* Cargo los estadísticos de ese día */
        $estadisticosG2 = $this->Estadisticodiarios->find('all')->where(['Estadisticodiarios.fecha =' => ($this->getFormatoFecha($diaG))])->order(['Estadisticodiarios.viento' => 'ASC']);
        $this->set('estadisticosG2',$estadisticosG2);

        /* Se cargan los datos de cada aerogenerador de tal forma que luego después se puedan transformar en elementos de JavaScript para pasarlo a la gráfica */
        $arrayAuxDesv = array ();
        $arrayAuxViento = array ();
        $desviaciones = array();
        $viento = array();
        foreach ($aerosG as $aero):
            foreach ($estadisticosG2 as $estadistico):
                if($estadistico["systemNumber"]==$aero){
                    array_push($arrayAuxDesv, $estadistico["desviacion"]);
                    array_push($arrayAuxViento, $estadistico["viento"]);                                
                }
            endforeach;
            array_push($desviaciones,implode(',',$arrayAuxDesv));
            array_push($viento,implode(',',$arrayAuxViento));
           
            $arrayAuxDesv = array ();
            $arrayAuxViento = array (); 
        endforeach;
        
        /* Son los bines de viento de cada aerogenerador separados por el carácter  | */
        $this->set('StrV',implode('|',$viento));
        /* Son las medias de cada aerogenerador separados por el carácter  | */
        $this->set('StrD',implode('|',$desviaciones));
    }
    
    /*
     * Genera un gráfico de sectores por cada bin de viento describiendo cuantos outliers del intervalo de confianza
     * generado por cada aerogenerador se han dado, en el día que ha sido introducido por parámetro. 
     * Cada sector representa el número de outliers de un aerogenerador. Se carga:
     *      - Outliers de cada aerogenerador en cada bin de viento para ese día
     *      - Bines de viento existentes en los que ha habido outliers.
     * 
     */
    public function muestroGraficaQuesos(){
        /* cojo los ids de los aeros del parque*/
        $this->loadModel('Aeros');
        
        /*Cargamos el día y los puntos generados en ese dia*/
        $mainData = $this->request->getData();
        $aerosParque = $this->Aeros->find('all')->where(['Aeros.id_parque =' => $mainData['parque']]);

        /* Carga los bines de viento en los que se ha detectado algún outlier*/
        $diaG = $mainData["dia"];
        $this->loadModel('Fueras');
        $vientos = $this->Fueras->find()->select(['Fueras.viento','Fueras.systemNumber'])->where(['Fueras.fecha =' => ($this->getFormatoFecha($diaG))])->group(['Fueras.viento']);
        $vientosDelParque = array();
        foreach($vientos as $viento):
            foreach($aerosParque as $aero):
                if ($aero['SystemNumber'] == $viento['systemNumber']){
                    array_push($vientosDelParque,$viento);
                }
            endforeach;
        endforeach;
        
        
        /* Cargamos las series (tantas como aerogeneradores haya en el parque) de ese día de manera que se separan series por cada bin de viento*/
        $fuerasStr = array();
        $fuerasVientoAux = array();
        $fuerasAux = array();
        $vientosArray = array();
        
        $fuerasVientoCorrectos = array();
        /* Organizamos las series que irían en cada uno de los diagramas de sectores organizados por bin de viento*/
        foreach($vientosDelParque as $viento):
            
            $fuerasViento = $this->Fueras->find('all')->where(['Fueras.fecha =' => ($this->getFormatoFecha($diaG)),'Fueras.viento =' => $viento["viento"]]);
            
            foreach($fuerasViento as $fuera):
                foreach($aerosParque as $aero):
                    if ($aero['SystemNumber'] == $fuera['systemNumber']){
                        array_push($fuerasVientoCorrectos,$fuera);
                    }
                endforeach;
            endforeach;
            
            foreach ($fuerasVientoCorrectos as $tupla):
                array_push($fuerasAux,$tupla["systemNumber"]);
                array_push($fuerasAux, $tupla["vecesFuera"]);
                array_push($fuerasVientoAux,implode(',',$fuerasAux));
                $fuerasAux = array();
            endforeach;
            array_push($fuerasStr,implode('|',$fuerasVientoAux));
            $fuerasVientoAux = [];
            $fuerasVientoCorrectos = array();
            array_push($vientosArray,$viento['viento']);
        endforeach;
        
        $this->set("fuerasStr",implode(':',$fuerasStr));
        
        /* Preparamos los ids de cada tab pane, será un tab pane por cada bin de viento. Los ids los ciframos por hash para estandarizar
        los identificadores de cada uno y los cargamos a la vista*/
        $this->set("vientosPHP",$vientosArray);
        $contenedores = array();
        foreach($vientosArray as $viento):
            array_push($contenedores,hash('ripemd160', $viento));
        endforeach;
        $this->set('contenedores',implode(',',$contenedores));
        $this->set("vientosF",implode(',',$vientosArray));
        
    }
    /*
     *  Se muestra un gráfico con el seguimiento de las medias diarias de la potencia producida de los aerogeneradores seleccionados. 
     *  Se mostrarán aquellas registradas en los días introducidos por parámetro.  Se carga a la vista:
     *      - Dias con estadisticos del rango de fechas introducido por parámetro.
     *      - Medias de los aerogeneradores (los aerogeneradores pasados por parámetro) en el bin de viento seleccionado
     *      
    */
    
    public function muestroGraficaBinMedias(){
        
        /* Cargamos los días y los aerogeneradores introducidos por parámetro*/
        $mainData = $this->request->getData();
        $diasTemporal = $mainData['dia'];
        $aerosTemporal = $mainData['aerosTemporal'];
        $bin = $mainData['binViento'];
        $contenedor = $mainData['contenedor'];
        /*Sacar los días introducidos por parámetro, para saber de que día a que día hay que buscar*/
        $diasTemporal = explode('-',$diasTemporal);
        $diasTemporal[0]=$this->getFormatoFecha($diasTemporal[0]);
        $diasTemporal[1]=$this->getFormatoFecha($diasTemporal[1]);
        $diasTemporal[0] =  str_replace(' ', '', $diasTemporal[0]);
        $diasTemporal[1] =  str_replace(' ', '', $diasTemporal[1]);
        
        /* Cargamos las series (tantas como aerogeneradores haya en el parque) de ese día de manera que se separan series por cada bin de viento*/
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
        /* Se llevan las variables en el formato adecuado a la vista */
        $this->set('temporalMedias',implode(':',$series));
        $this->set('contenedor',$contenedor);
        $this->set('bin',$bin);
        
        
        
    }
    /*
     *  Se muestra un gráfico con el seguimiento de las desviaciones diarias de la potencia producida de los aerogeneradores seleccionados. 
     *  Se mostrarán aquellas registradas en los días introducidos por parámetro.  Se carga a la vista:
     *      - Dias con estadisticos del rango de fechas introducido por parámetro.
     *      - Desviaciones típicas de los aerogeneradores (los aerogeneradores pasados por parámetro) en el bin de viento seleccionado
     *      
    */
    public function muestroGraficaBinDesviaciones(){
        /* Cargamos los días y los aerogeneradores introducidos por parámetro*/
        $mainData = $this->request->getData();
        $diasTemporal = $mainData['dia'];
        $aerosTemporal = $mainData['aerosTemporal'];
        $bin = $mainData['binViento'];
        $contenedor = $mainData['contenedor'];
        
        /*Sacar los días introducidos por parámetro, para saber de que día a que día hay que buscar*/
        $diasTemporal = explode('-',$diasTemporal);
        $diasTemporal[0]=$this->getFormatoFecha($diasTemporal[0]);
        $diasTemporal[1]=$this->getFormatoFecha($diasTemporal[1]);
        $diasTemporal[0] =  str_replace(' ', '', $diasTemporal[0]);
        $diasTemporal[1] =  str_replace(' ', '', $diasTemporal[1]);
        
        /* Cargamos las series (tantas como aerogeneradores haya en el parque) de ese día de manera que se separan series por cada bin de viento*/
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
        
        /* Se llevan las variables en el formato adecuado a la vista a la vista */
        $this->set('temporalMedias',implode(':',$series));
        $this->set('contenedor',$contenedor);
        $this->set('bin',$bin);
    }
    /* Cargamos los estadísticos del parque y día introducidos por parámetro en formato DateTable */
    public function cargaDatosEstadisticos(){
        $mainData = $this->request->getData();
        $dia = $this->getFormatoFecha($mainData['dia']);
        $parque = $mainData['parque'];
        $contenedor = $mainData['contenedor'];
        $this->set('contenedor',$contenedor);
        
        $estadisticos = $this->getEstadisticoDia($dia, $parque);
        $this->set('estadisticos',$estadisticos);
        
    }
    /* Cargamos los outliers del parque y día introducidos por parámetro en formato DateTable */
    public function cargaDatosFueras(){
        $mainData = $this->request->getData();
        $dia = $this->getFormatoFecha($mainData['dia']);
        $parque = $mainData['parque'];
        $contenedor = $mainData['contenedor'];
        $this->set('contenedor',$contenedor);
        
        $totalFueras = $this->getFuerasDia($dia, $parque);
        $this->set('totalFueras',$totalFueras);
    }
    /* Cargamos las bajadas del parque y día introducidos por parámetro en formato DateTable */
    public function cargaDatosBajadas(){
        $mainData = $this->request->getData();
        $dia = $this->getFormatoFecha($mainData['dia']);
        $parque = $mainData['parque'];
        $contenedor = $mainData['contenedor'];
        $this->set('contenedor',$contenedor);
        
        $bajadas = $this->getBajadasDia($dia, $parque);
        $this->set('bajadas',$bajadas);
    }
    
    /* Se obtiene un array con los estadisticos que se han efectuado en un parque un día concreto */
    public function getEstadisticoDia($unaFecha,$unParque){
        $this->loadModel('Aeros');
        
        /*Cargo los aeros del parque y los estadisticos de ese dia*/
        $aerosParque = $this->Aeros->find('all')->where(['Aeros.id_parque =' => $unParque]);
        $estadisticos = $this->Estadisticodiarios->find('all')->where(['Estadisticodiarios.fecha =' => $unaFecha]);
        
        /*Saco los estadçisticos en orden de los aerogeneradores del parque escogido*/
        $estadisticoDiario = array();
        foreach($estadisticos as $estadistico):
            foreach($aerosParque as $aero):
                if($estadistico['systemNumber']==$aero['SystemNumber']){
                    array_push($estadisticoDiario,$estadistico);
                }
            endforeach;
        endforeach;
        
        return $estadisticoDiario;
    }
    /* Se obtiene un array con los outliers que se han efectuado en un parque un día concreto */
    public function getFuerasDia($unaFecha,$unParque){
        $this->loadModel('Aeros');
        $this->loadModel('Fueras');
        
        /*Cargo los aeros del parque y los outliers de ese dia*/
        $aerosParque = $this->Aeros->find('all')->where(['Aeros.id_parque =' => $unParque]);
        $fueras = $this->Fueras->find('all')->where(['Fueras.fecha =' => $unaFecha]);
        
        /*Saco los outliers en orden de los aerogeneradores del parque escogido*/
        $fuerasDiario = array();
        foreach($fueras as $fuera):
            foreach($aerosParque as $aero):
                if($fuera['systemNumber']==$aero['SystemNumber']){
                    array_push($fuerasDiario,$fuera);
                }
            endforeach;
        endforeach;
        
        return $fuerasDiario;
    }
    /* Se obtiene un array con las bajadas que se han efectuado en un parque un día concreto */
    public function getBajadasDia($unaFecha,$unParque){
        $this->loadModel('Aeros');
        $this->loadModel('Bajadaderendimientos');
        /*Cargo los aeros del parque y las bajadas de ese dia*/
        $aerosParque = $this->Aeros->find('all')->where(['Aeros.id_parque =' => $unParque]);
        $bajadas = $this->Bajadaderendimientos->find('all')->where(['Bajadaderendimientos.fecha1 =' => $unaFecha]);
        
        /*Saco las bajadas  en orden de los aerogeneradores del parque escogido*/
        $bajadasDiario = array();
        foreach($bajadas as $bajada):
            foreach($aerosParque as $aero):
                if($bajada['systemNumber1']==$aero['SystemNumber']){
                    array_push($bajadasDiario,$bajada);
                }
            endforeach;
        endforeach;
        
        return $bajadasDiario;
    }

    /* Este método transforma una fecha del formato dia/mes/año al formato año-mes-dia*/
    public function getFormatoFecha($miFecha){
        $miFecha = explode('/', $miFecha);
        $miFecha=$miFecha[2]."-".$miFecha[1]."-".$miFecha[0];
        
        return $miFecha;
    }
    /*Transforma una fecha en el formato mes/dia/año al formato dia/mes/año*/
    public function getFormatoFechaPicker($miFecha){
        $miFecha = explode('/',$miFecha);
        $miFecha = $miFecha[1].'/'.$miFecha[0]."/".$miFecha[2];
    }
}
