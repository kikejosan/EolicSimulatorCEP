<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<link rel="icon" type="image/png"  href="/EolicEventConsumer/admin_l_t_e/img/favicon.png">

<?php
$this->Html->css([
    'AdminLTE./plugins/daterangepicker/daterangepicker',
    'AdminLTE./plugins/datepicker/datepicker3',
    'AdminLTE./plugins/iCheck/all',
    'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
    'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
    'AdminLTE./plugins/select2/select2.min',
    
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/select2/select2.full.min',
  'AdminLTE./plugins/input-mask/jquery.inputmask',
  'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/datepicker/bootstrap-datepicker',
  'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
  'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
  'AdminLTE./plugins/iCheck/icheck.min',
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
],
['block' => 'script']);
?>

<section class="content-header">
    <h1>
        Análisis de la Productividad
        <small>Version 2.0</small>
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $formulario['parque1']; ?></a></li>
        <li class="active">Productividad</li>
      </ol>
</section>


<section class="content" >
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Selección de Rankings</a></li>
          <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Análisis Gráfico de la Productividad</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
            <div class="container-fluid text-center">
                <div class="col-md-2" id="graficott">
                        <div class="row box box-primary" id="infoAero">
                            <div class="box-body box-profile">
                              <img src="/EolicEventConsumer/admin_l_t_e/img/aerogenerador.jpg" class="profile-user-img img-responsive img-circle" alt="User profile picture">
                              <h3 class="profile-username text-center"><?php echo $miAero["idIngeboards"];?></h3>

                              <p class="text-muted text-center">Información básica</p>

                              <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Parque</b> <a class="pull-right"><?php echo $miAero["id_parque"];?></a>
                                </li>
                                <li class="list-group-item">
                                  <b>idDB</b> <a class="pull-right"><?php echo $miAero["id"];?></a>
                                </li>
                                <li class="list-group-item">
                                  <b>SystemNumber</b> <a class="pull-right"><?php echo $miAero["SystemNumber"];?></a>
                                </li>
                                <li class="list-group-item">
                                  <b>idIngeboards</b> <a class="pull-right"><?php echo $miAero["idIngeboards"];?></a>
                                </li>
                                <li class="list-group-item">
                                  <b>Localizacion</b> <a class="pull-right"><?php echo $miAero["fila"]."||".$miAero["columna"];?></a>
                                </li>


                              </ul>

                            </div>
                        </div>
                    
                    
                    </div>
                <div class="col-md-10" id="tablasRank">
                    <div class="box box-body"  style="background-color: #ccffff">
                    <h2>Seguimiento de <?php echo $formulario['parque1']; ?>  </h2>
                    
                    <div class="container-fluid">
                        <div class="col-md-12">
                                <table class="table table-bordered" id="tablaC">
                                    <thead style="text-align:  center">
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label>Ranking del día:</label>
                                                    <div class="input-group date">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>
                                                        <input type="text" class="form-control pull-right" id="datepicker1" value="<?php echo $formulario["datepickerI"]; ?>" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>Ranking del día:</label>
                                                    <div class="input-group date">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>
                                                        <input type="text" class="form-control pull-right" id="datepicker2" value="Seleccionar" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>Ranking del día:</label>
                                                    <div class="input-group date">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>
                                                        <input type="text" class="form-control pull-right" id="datepicker3" value="Seleccionar" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>Ranking del día:</label>
                                                    <div class="input-group date">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>
                                                        <input type="text" class="form-control pull-right" id="datepicker4" value="Seleccionar" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>Ranking del día:</label>
                                                    <div class="input-group date">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>
                                                        <input type="text" class="form-control pull-right" id="datepicker5" value="Seleccionar" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>Ranking del día:</label>
                                                    <div class="input-group date">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>
                                                        <input type="text" class="form-control pull-right" id="datepicker6" value="Seleccionar" >
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>Ranking del día:</label>
                                                    <div class="input-group date">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>
                                                        <input type="text" class="form-control pull-right" id="datepicker7" value="Seleccionar" >
                                                    </div>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><table class="table table-bordered" id="tabla1"><tbody id="bodyRanking1"></tbody></table></td>
                                            <td><table class="table table-bordered" id="tabla2"><tbody id="bodyRanking2"></tbody></table></td>
                                            <td><table class="table table-bordered" id="tabla3"><tbody id="bodyRanking3"></tbody></table></td>
                                            <td><table class="table table-bordered" id="tabla4"><tbody id="bodyRanking4"></tbody></table></td>
                                            <td><table class="table table-bordered" id="tabla5"><tbody id="bodyRanking5"></tbody></table></td>
                                            <td><table class="table table-bordered" id="tabla6"><tbody id="bodyRanking6"></tbody></table></td>
                                            <td><table class="table table-bordered" id="tabla7"><tbody id="bodyRanking7"></tbody></table></td>
                                        </tr>
                                    </tbody>
                                </table>
                            
                            
                        </div>
                        
                    </div>
                </div>
                </div>
                
            </div>
            </div>
<!-- ------------------------------FINAL DEL PRIMER PANEL  --------------------------------------------------->
            <div class="tab-pane" id="tab_2">
                <div class='row'>
                <div class='col-md-5'>
                    <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Formulario</h3>
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                              <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                              <i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <div class="box-body">
                            <div class='container-fluid' id='formularioG'>
                                <form>
                                <div class="form-group">
                                    <label>Rango de fechas:</label>

                                    <div class="input-group">
                                      <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                      </div>
                                      <input type="text" class="form-control pull-right" id="diasG">
                                    </div>


                                </div>
                                <div class="form-group">
                                    <label>Aeros seleccionados</label>
                                    <select required id="aerosG" class="form-control select2" multiple="multiple" data-placeholder="Seleccionar" style="width: 100%;">
                                       <?php foreach ($aeros as $aero) :?>
                                        <option>  <?php echo $aero['SystemNumber']?></option>
                                       <?php endforeach; ?>
                                    </select>
                                </div>

                                <button id="btnGrafica" type="button" class="btn btn-block btn-primary btn-lg">Generar gráfico</button>
                                </form>
                            </div>
                        </div>  
                    </div>
                    <div class="box">
                        <div class="box-header with-border">
                          <h3 class="box-title">Transiciones en los Rankings</h3>
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                              <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                              <i class="fa fa-times"></i></button>
                          </div>
                        </div>
                        <div class="box-body">
                            <div class="container-fluid">
                            <table id="example1" class="table table-bordered table-striped" >
                                <thead>
                                <tr style="background-color: #c2c2bc">
                                  <th style="text-align: center;">SystemNumber</th>
                                  <th style="text-align: center;">Inicio</th>
                                  <th style="text-align: center;">Fin</th>
                                  <th style="text-align: center;">Pos.Inicio</th>
                                  <th style="text-align: center;">Pos.Fin</th>
                                  <th style="text-align: center;">Var</th>
                                  <th style="text-align: center;">Var %</th>
                                </tr>
                                </thead>
                                <tbody>                              
                                    <?php foreach ($transiciones as $transicion) :?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $transicion['systemNumber']?></td>
                                        <td style="text-align: center;"><?php echo $transicion['inicio']?></td>
                                        <td style="text-align: center;"><?php echo $transicion['fin']?></td>
                                        <td style="text-align: center;"><?php echo $transicion['posicionInicio']?></td>
                                        <td style="text-align: center;"><?php echo $transicion['posicionFin']?></td>
                                        <td style="text-align: center;"><?php echo $transicion['variacion']?></td>
                                        <td style="text-align: center;"><?php echo round($transicion['variacionR'],2)?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                  <th style="text-align: center;">SystemNumber</th>
                                  <th style="text-align: center;">Inicio</th>
                                  <th style="text-align: center;">Fin</th>
                                  <th style="text-align: center;">Pos.Inicio</th>
                                  <th style="text-align: center;">Pos.Fin</th>
                                  <th style="text-align: center;">Var</th>
                                  <th style="text-align: center;">Var %</th>
                                </tr>
                                </tfoot>
                              </table>
                                </div> 
                        </div>  
                    </div>
                </div>
                <div class='col-md-7'>
                    <div class="container-fluid" id="aviso"></div>
                    <div class="container-fluid" id="graficaI"></div>
                    <div class="container-fluid" id="graficaPos"></div>
                </div>
                </div>
                
                
                </div>
          </div>
          
        </div>
            <!-- /.tab-content -->
    
    <div class="container-fluid text-center">
        <div class="row">
            

        </div>
        <br>
        
    </div>
    
</section>
<input id="globalSeguir" type="hidden" name="opcion" value="">

<script>
    /* Iniciacion de las tablas de los ranking de una forma dinámica
     * Inicializo las fechas y cargo los 7 siguientes días, en caso de que no haya datos en la BB.DD no se carga nada*/
    var strFecha = "<?php echo $fechaDB; ?>";
    var fechaForm = new Date(strFecha);
    var numeroFecha = Math.round(Date.parse(fechaForm))-3600000;
   
    
    for(var i=0;i<7;i++){
        fechaForm = new Date(numeroFecha+86400000*i);
        strFecha = (fechaForm.getDate())+"/"+(fechaForm.getMonth()+1)+"/"+fechaForm.getFullYear();
        muestroRankingParque(strFecha,i+1);
        console.log(fechaForm);
        console.log(strFecha);
    }
    function muestroRankingParque(fecha,indice){
        console.log(indice)
        $("#datepicker"+indice).val(fecha);
        $.post('http://localhost/EolicEventConsumer/rankingprods/muestrorankingparque',
        {fecha : fecha, parque:"<?php echo $parque; ?>"}, 
        function(data) {
            variable = data;
            $("#bodyRanking"+indice).html(data)
        });
    }
    
    seguimiento();
    
    function seguimiento(idASeguir){
        if($("#globalSeguir").val()=="" && idASeguir==""){
            $("#globalSeguir").val(idASeguir);
            $("#tabla1 td").each(function(){
                $(this).attr("bgcolor","#ccccff");
            });
            $("#tabla2 td").each(function(){
                $(this).attr("bgcolor","#ccccff");
            });
            $("#tabla3 td").each(function(){
                $(this).attr("bgcolor","#ccccff");
            });
            $("#tabla4 td").each(function(){
                $(this).attr("bgcolor","#ccccff");
            });
            $("#tabla5 td").each(function(){
                $(this).attr("bgcolor","#ccccff");
            });
            $("#tabla6 td").each(function(){
                $(this).attr("bgcolor","#ccccff");
            });
            $("#tabla7 td").each(function(){
                $(this).attr("bgcolor","#ccccff");
            });
        }else{ 
            $("#globalSeguir").val(idASeguir);
            $("#tabla1 td").each(function(){
               if($(this).text().includes(idASeguir)){
                   console.log("ENCONTRADO");
                   $(this).attr("bgcolor","#F99090");
               }else{
                    $(this).attr("bgcolor","#ccccff");

               }
            });

            $("#tabla2 td").each(function(){
               if($(this).text().includes(idASeguir)){
                   console.log("ENCONTRADO");
                   $(this).attr("bgcolor","#F99090");
               }else{
                    $(this).attr("bgcolor","#ccccff");

               }
            });

            $("#tabla3 td").each(function(){
               if($(this).text().includes(idASeguir)){
                   console.log("ENCONTRADO");
                   $(this).attr("bgcolor","#F99090");
               }else{
                    $(this).attr("bgcolor","#ccccff");

               }
            });
            $("#tabla5 td").each(function(){
               if($(this).text().includes(idASeguir)){
                   console.log("ENCONTRADO");
                   $(this).attr("bgcolor","#F99090");
               }else{
                    $(this).attr("bgcolor","#ccccff");

               }
            });

            $("#tabla4 td").each(function(){
               if($(this).text().includes(idASeguir)){
                   console.log("ENCONTRADO");
                   $(this).attr("bgcolor","#F99090");
               }else{
                    $(this).attr("bgcolor","#ccccff");

               }
            });
            $("#tabla6 td").each(function(){
               if($(this).text().includes(idASeguir)){
                   console.log("ENCONTRADO");
                   $(this).attr("bgcolor","#F99090");
               }else{
                    $(this).attr("bgcolor","#ccccff");

               }
            });
            $("#tabla7 td").each(function(){
               if($(this).text().includes(idASeguir)){
                   console.log("ENCONTRADO");
                   $(this).attr("bgcolor","#F99090");
               }else{
                    $(this).attr("bgcolor","#ccccff");

               }
            });
            
        }
        
    }
    

    
    
    /* Especificación de las acciones a realizar dados unos eventos concretos, en concreto para el seguimiento
     * visual del aerogenerador seleccionado en los rankings */
    $(document).ready(function(){
        
       $("#datepicker1").change(function(){
           if($("#datepicker1").val()!=""){
                $.post('http://localhost/EolicEventConsumer/rankingprods/muestrorankingparque',
                {fecha : $("#datepicker1").val(), parque:"<?php echo $parque; ?>"}, 
                function(data) {
                    variable = data;
                    $("#bodyRanking1").html(data);

                });
            }
        });
        $("#datepicker2").change(function(){
            if($("#datepicker2").val()!=""){
                $.post('http://localhost/EolicEventConsumer/rankingprods/muestrorankingparque',
                {fecha : $("#datepicker2").val(), parque:"<?php echo $parque; ?>"}, 
                function(data) {
                    variable = data;
                    $("#bodyRanking2").html(data)
                });
            }
       
        
        }); 
        $("#datepicker3").change(function(){
            if($("#datepicker3").val()!=""){
                $.post('http://localhost/EolicEventConsumer/rankingprods/muestrorankingparque',
                 {fecha : $("#datepicker3").val(), parque:"<?php echo $parque; ?>"}, 
                 function(data) {
                     variable = data;
                     $("#bodyRanking3").html(data)
                 });
            }
        }); 
        $("#datepicker4").change(function(){
            if($("#datepicker4").val()!=""){
                $.post('http://localhost/EolicEventConsumer/rankingprods/muestrorankingparque',
                {fecha : $("#datepicker4").val(), parque:"<?php echo $parque; ?>"}, 
                function(data) {
                    variable = data;
                    $("#bodyRanking4").html(data)
                });
            }
        
        });
        
        $("#datepicker5").change(function(){
            if($("#datepicker5").val()!=""){
                $.post('http://localhost/EolicEventConsumer/rankingprods/muestrorankingparque',
                {fecha : $("#datepicker5").val(), parque:"<?php echo $parque; ?>"}, 
                function(data) {
                    variable = data;
                    $("#bodyRanking5").html(data)
                });
            }
        
        });
        $("#datepicker6").change(function(){
            if($("#datepicker6").val()!=""){
                $.post('http://localhost/EolicEventConsumer/rankingprods/muestrorankingparque',
                {fecha : $("#datepicker6").val(), parque:"<?php echo $parque; ?>"}, 
                function(data) {
                    variable = data;
                    $("#bodyRanking6").html(data)
                });
            }
        
        });
        $("#datepicker7").change(function(){
            if($("#datepicker7").val()!=""){
                $.post('http://localhost/EolicEventConsumer/rankingprods/muestrorankingparque',
                {fecha : $("#datepicker7").val(), parque:"<?php echo $parque; ?>"}, 
                function(data) {
                    variable = data;
                    $("#bodyRanking7").html(data)
                });
            }
        
        });
        
        
        $("#btnGrafica").on("click",function(){
            if($("#aerosG").val()==null || $("#diasG").val()==null){
                $.post('http://localhost/EolicEventConsumer/error/formularioIncorrecto',
                function(data) {
                    variable = data;
                    
                    $("#graficaI").html("<div></div>");
                    $("#graficaPos").html("<div></div>");
                    $("#aviso").html(data);
                    
                });
            }else{
                $("#aviso").html("<div></div>");
                    
                $.post('http://localhost/EolicEventConsumer/rankingprods/muestroGrafica',
                 {diasG : $("#diasG").val(), aerosG : $("#aerosG").val(), contenedor:'rankingGraficab'}, 
                 function(data) {
                     variable = data;
                     $("#graficaI").html(data)
                 });
                $.post('http://localhost/EolicEventConsumer/rankingprods/muestroGraficaPos',
                {diasG : $("#diasG").val(), aerosG : $("#aerosG").val(), contenedor:'graficaPos2b'}, 
                function(data) {
                    variable = data;
                    $("#graficaPos").html(data)
                });
       
            }
        }); 
        
        
        /* Función para actualizar la información básica del aerogenerador seleccionado */
        function postAeroSeguir(aeroSeguir){
            $.post('http://localhost/EolicEventConsumer/rankingprods/getInfoAero',
            {idAero : aeroSeguir}, 
            function(data) {
                variable = data;
                $("#infoAero").html(data)
            });
        }
        /* Eventos click de las celdas seleccionadas */        
        $('#tabla1').on('click','tr td', function(){
            seguimiento($(this).text());
            postAeroSeguir($(this).text());
        });
        $('#tabla2').on('click','tr td', function(){
            seguimiento($(this).text());
            postAeroSeguir($(this).text());
        });
        $('#tabla3').on('click','tr td', function(){
            seguimiento($(this).text());
            postAeroSeguir($(this).text());
        });
        $('#tabla4').on('click','tr td', function(){
            seguimiento($(this).text());
            postAeroSeguir($(this).text());
        });
        $('#tabla5').on('click','tr td', function(){
            seguimiento($(this).text());
            postAeroSeguir($(this).text());
        });
        $('#tabla6').on('click','tr td', function(){
            seguimiento($(this).text());
            postAeroSeguir($(this).text());
        });
        $('#tabla7').on('click','tr td', function(){
            seguimiento($(this).text());
            postAeroSeguir($(this).text());
        });
        
        
        
        
    });
    
   
    
</script>

<script>
    /* Inicialización de formularios, datepickers, rangedatepickers y datetables*/
  $(function () {
    var fechasLimite = "<?php echo $fechasLimite ?>";
    fechasLimite = fechasLimite.split(',');
    var inicio = new Date(fechasLimite[0]);
    var final = new Date(fechasLimite[1]);
    $('#datepicker1').datepicker({
        format: 'dd/mm/yyyy',
        startDate:inicio,
        endDate:final,
        autoclose: true
    });
    
    $('#datepicker2').datepicker({
        format: 'dd/mm/yyyy',
        startDate:inicio,
        endDate:final,
        autoclose: true
    });
    $('#datepicker3').datepicker({
        format: 'dd/mm/yyyy',
        startDate:inicio,
        endDate:final,
        autoclose: true
      
    });
    $('#datepicker4').datepicker({
        format: 'dd/mm/yyyy',
        startDate:inicio,
        endDate:final,
        autoclose: true
    });
    $('#datepicker5').datepicker({
        format: 'dd/mm/yyyy',
        startDate:inicio,
        endDate:final,
        autoclose: true
    });
    $('#datepicker6').datepicker({
        format: 'dd/mm/yyyy',
        startDate:inicio,
        endDate:final,
        autoclose: true
    });
    $('#datepicker7').datepicker({
        format: 'dd/mm/yyyy',
        startDate:inicio,
        endDate:final,
        autoclose: true
    });
    
    
    $(".select2").select2();
    
    
    $('#diasG').daterangepicker({
        locale: {
            format: 'DD/MM/YYYY'
        },
        startDate:inicio,
        endDate:final,
        minDate:inicio,
        maxDate:final

    });

    
    $('#example1').DataTable({
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            if(aData[5]<-5){
                $('td', nRow).css('background-color', '#F99090');
            }                   
        },
        "language": {
            "lengthMenu": "Mostrar _MENU_ entradas por pagina",
            "zeroRecords": "Nada que mostrar - lo siento",
            "info": "Enseñando página _PAGE_ de _PAGES_",
            "infoEmpty": "No entradas disponibles",
            "infoFiltered": "(filtrado de _MAX_ entradas totales)",
            "search":         "Búsqueda: ",
            "paginate": {
                "first":      "Primero",
                "last":       "Último",
                "next":       "Siguiente",
                "previous":   "Anterior"
            }
        }
    });
     
     
  });
</script>



