<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
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
  'AdminLTE./plugins/datepicker/bootstrap-datepicker',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
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
        Análisis del Rendimiento
        <small>Version 2.0</small>
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><?php echo $nombreParque; ?></a></li>
        <li class="active">Rendimiento</li>
      </ol>
</section>


<section class="content" >
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Datos obtenidos</a></li>
          <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Análisis de Desviaciones Típicas</a></li>
          <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Análisis de Outliers x1</a></li>
          <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Análisis temporal</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- <h3><?php //echo $nombreParque; ?></h3> -->
                            <label> Estadísticas del día:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input required="true" type="text" class="form-control pull-right" id="datepickerDatos" name="datepickerDatos" value="<?php echo $fecha; ?>">
                                <span class="input-group-btn">
                                    <button type="button" id="btnDatos" class="btn btn-info btn-flat">Cargar datos</button>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-7" id="ejemploCarga">
                            
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12" id="datos">
                            <div class="box">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Estadísticos diarios</h3>
                                  <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                      <i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                      <i class="fa fa-times"></i></button>
                                  </div>
                                </div>
                                <div class="box-body" id="box1">
                                  <table id="example1" class="table table-bordered table-striped" >
                                    <thead>
                                    <tr style="background-color: #c2c2bc">
                                      <th style="text-align: center;">SystemNumber</th>
                                      <th style="text-align: center;">Viento (m/s)</th>
                                      <th style="text-align: center;">Fecha</th>
                                      <th style="text-align: center;">Media (KW)</th>
                                      <th style="text-align: center;">Desviación (KW)</th>
                                    </tr>
                                    </thead>
                                    <tbody id="example1Body">                              
                                        <?php foreach ($estadisticos as $estadistico) :?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $estadistico['systemNumber']?></td>
                                            <td style="text-align: center;"><?php echo $estadistico['viento']?></td>
                                            <td style="text-align: center;"><?php echo $estadistico['fecha']?></td>
                                            <td style="text-align: center;"><?php echo $estadistico['media']?></td>
                                            <td style="text-align: center;"><?php echo $estadistico['desviacion']?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6" id="datos">
                            <div class="box">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Conjunto de puntos fuera de los intervalos de confianza</h3>
                                  <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                      <i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                      <i class="fa fa-times"></i></button>
                                  </div>
                                </div>
                                <div class="box-body" id="box2">
                                    <table id="example2" class="table table-bordered table-striped" >
                                        <thead>
                                        <tr style="background-color: #c2c2bc">
                                            <th style="text-align: center;">SystemNumber</th>
                                            <th style="text-align: center;">Viento (m/s)</th>
                                            <th style="text-align: center;">Fecha</th>
                                            <th style="text-align: center;">Puntos fuera</th>
                                            <th style="text-align: center;">Media (KW)</th>
                                            <th style="text-align: center;">Desviación (KW)</th>
                                        </tr>
                                        </thead>
                                        <tbody id="example2Body">                              
                                            <?php foreach ($totalFueras as $unoF) :?>
                                            <tr>
                                                <td style="text-align: center;"><?php echo $unoF['systemNumber']?></td>
                                                <td style="text-align: center;"><?php echo $unoF['viento']?></td>
                                                <td style="text-align: center;"><?php echo $unoF['fecha']?></td>
                                                <td style="text-align: center;"><?php echo $unoF['vecesFuera']?></td>
                                                <td style="text-align: center;"><?php echo $unoF['media']?></td>
                                                <td style="text-align: center;"><?php echo $unoF['desviacion']?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>                             
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6" id="datos">
                            <div class="box">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Bajadas de Rendimiento</h3>
                                  <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                      <i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                      <i class="fa fa-times"></i></button>
                                  </div>
                                </div>
                                <div class="box-body" id="box3">
                                    <table id="example3" class="table table-bordered table-striped" >
                                        <thead>
                                        <tr style="background-color: #c2c2bc">
                                          <th style="text-align: center;">SystemNumber</th>
                                          <th style="text-align: center;">Viento (m/s)</th>
                                          <th style="text-align: center;">Inicio</th>
                                          <th style="text-align: center;">Media Inicio (KW)</th>
                                          <th style="text-align: center;">Fin</th>
                                          <th style="text-align: center;">Media Fin (KW)</th>
                                        </tr>
                                        </thead>
                                        <tbody id="example3Body">                              
                                            <?php foreach ($bajadas as $bajada) :?>
                                            <tr>
                                                <td style="text-align: center;"><?php echo $bajada['systemNumber1']?></td>
                                                <td style="text-align: center;"><?php echo $bajada['viento1']?></td>
                                                <td style="text-align: center;"><?php echo $bajada['fecha1']?></td>
                                                <td style="text-align: center;"><?php echo $bajada['media1']?></td>
                                                <td style="text-align: center;"><?php echo $bajada['fecha2']?></td>
                                                <td style="text-align: center;"><?php echo $bajada['media2']?></td>
                                            </tr>
                                            <?php endforeach; ?>
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
                <div class="container-fluid">
                    <div class="col-md-5">
                        <div class="col-md-12">
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
                                    <div class="form-group">
                                        <label>Día del año</label>
                                        <div class="input-group date">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                            <input type="text" class="form-control pull-right" id="datepicker1" value="<?php echo $formulario["datepickerI"]; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Aeros seleccionados</label>
                                        <select id="aerosG" class="form-control select2" multiple="multiple" data-placeholder="Seleccionar" style="width: 100%;">
                                            <?php foreach ($aeros as $aero) :?>
                                                <option>  <?php echo $aero['SystemNumber']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    
                                    <button id="btnGrafica" type="button" class="btn btn-block btn-primary btn-lg">Generar gráfico</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Estadísticos diarios</h3>
                                  <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                      <i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                      <i class="fa fa-times"></i></button>
                                  </div>
                                </div>
                                <div class="box-body" id="box4">
                                  <table id="example4" class="table table-bordered table-striped" >
                                    <thead>
                                    <tr style="background-color: #c2c2bc">
                                      <th style="text-align: center;">SystemNumber</th>
                                      <th style="text-align: center;">Viento (m/s)</th>
                                      <th style="text-align: center;">Fecha</th>
                                      <th style="text-align: center;">Media (KW)</th>
                                      <th style="text-align: center;">Desviación (KW)</th>
                                    </tr>
                                    </thead>
                                    <tbody>                              
                                        <?php foreach ($estadisticos as $estadistico) :?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo $estadistico['systemNumber']?></td>
                                            <td style="text-align: center;"><?php echo $estadistico['viento']?></td>
                                            <td style="text-align: center;"><?php echo $estadistico['fecha']?></td>
                                            <td style="text-align: center;"><?php echo $estadistico['media']?></td>
                                            <td style="text-align: center;"><?php echo $estadistico['desviacion']?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7" id="sitio">
                        <div class="col-md-12" id="graficoRangos">
                            <br>
                            <center><img class="img-responsive img-thumbnail" src="/EolicEventConsumer/admin_l_t_e/img/6335.jpg"  width="100%" height="100%"></center>
                            
                        </div>
                        <div class="col-md-12" id="graficoBarras">
                            
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane" id="tab_3">
                <div class="container-fluid">
                    <div class="col-md-5">
                        <div class="col-md-12">
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
                                    <div class="form-group">
                                        <label>Día del año</label>
                                        <div class="input-group date">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                            <input type="text" class="form-control pull-right" id="datepicker2" value="<?php echo $formulario["datepickerI"]; ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Aeros seleccionados</label>
                                        <select id="aerosF" class="form-control select2" multiple="multiple" data-placeholder="Seleccionar" style="width: 100%;">
                                            <?php foreach ($aeros as $aero) :?>
                                                <option>  <?php echo $aero['SystemNumber']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    
                                    <button id="btnF" type="button" class="btn btn-block btn-primary btn-lg">Generar gráfico</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Puntos fuera</h3>
                                  <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                      <i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                      <i class="fa fa-times"></i></button>
                                  </div>
                                </div>
                                <div class="box-body" id="box5">
                                  <table id="example5" class="table table-bordered table-striped" >
                                        <thead>
                                            <tr style="background-color: #c2c2bc">
                                                <th style="text-align: center;">SystemNumber</th>
                                                <th style="text-align: center;">Viento (m/s)</th>
                                                <th style="text-align: center;">Fecha</th>
                                                <th style="text-align: center;">Puntos fuera</th>
                                                <th style="text-align: center;">Media (KW)</th>
                                                <th style="text-align: center;">Desviación (KW)</th>
                                            </tr>
                                        </thead>
                                        <tbody>                              
                                            <?php foreach ($totalFueras as $unoF) :?>
                                            <tr>
                                                <td style="text-align: center;"><?php echo $unoF['systemNumber']?></td>
                                                <td style="text-align: center;"><?php echo $unoF['viento']?></td>
                                                <td style="text-align: center;"><?php echo $unoF['fecha']?></td>
                                                <td style="text-align: center;"><?php echo $unoF['vecesFuera']?></td>
                                                <td style="text-align: center;"><?php echo $unoF['media']?></td>
                                                <td style="text-align: center;"><?php echo $unoF['desviacion']?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>               
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="col-md-12" id="curvaFuera">
                            <br>
                            <br>
                            <center><img class="img-responsive img-thumbnail" src="/EolicEventConsumer/admin_l_t_e/img/6335.jpg"  width="100%" height="100%"></center>
                            
                        </div>
                        <div class="col-md-12" id="graficoQuesos">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_4">
                <div class="container-fluid">
                    <div class='col-md-3'>
                        <div class="box">
                            <div class="box-header with-border">
                              <h3 class="box-title">Formulario para el seguimiento temporal</h3>
                              <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                  <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                  <i class="fa fa-times"></i></button>
                              </div>
                            </div>
                            <div class="box-body">
                                    <div class="form-group">
                                        <label>Rango de fechas:</label>

                                        <div class="input-group">
                                          <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="text" class="form-control pull-right" id="diasTemporal">
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <label>Aeros seleccionados</label>
                                        <select id="aerosTemporal" class="form-control select2" multiple="multiple" data-placeholder="Seleccionar" style="width: 100%;">
                                            <?php foreach ($aeros as $aero) :?>
                                                <option>  <?php echo $aero['SystemNumber']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Bin de viento</label>
                                        <select id="binViento" class="form-control" data-placeholder="Seleccionar" style="width: 100%;">
                                            <?php foreach ($bines as $bin) :?>
                                                <option>  <?php echo $bin['viento']?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <button id="btnTemporal" type="button" class="btn btn-block btn-primary btn-lg">Generar gráfico</button>

                            </div>  
                        </div>
                    </div>
                    <div class='col-md-9'>
                        <div class="col-md-12" id='graficoTemporalMedias'>
                           <center><img class="img-responsive img-thumbnail" src="/EolicEventConsumer/admin_l_t_e/img/6335.jpg"  width="50%" height="50%"></center>
                        </div>
                        
                        <div class="col-md-12" id='graficoTemporalDesviaciones'>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    
</section>

<script>
    /* Inicialización de datepickers, range-datepicker y datetables en lenguaje español */
  $(function () {
    var fechasLimite = "<?php echo $fechasLimite ?>";
    fechasLimite = fechasLimite.split(',');
    var inicio = new Date(fechasLimite[0]);
    var final = new Date(fechasLimite[1]);
    
    $('#datepickerDatos').datepicker({
      format: 'dd/mm/yyyy',
       startDate:inicio,
       endDate:final,
      autoclose: true
    });
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
    
    $(".select2").select2();
    $(function () {
        $('#diasTemporal').daterangepicker({
            locale: {
                format: 'DD/MM/YYYY'
            },
            startDate:inicio,
            endDate:final,
            minDate:inicio,
            maxDate:final
        });
    });
    $('#example1').DataTable({
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
    $('#example2').DataTable({
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
    $('#example3').DataTable({
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
    $('#example4').DataTable({
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
    $('#example5').DataTable({
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
<script>
 
    /* Eventos vinculados con los botones de la pantalla*/
    
    
    /* Botón de la gráfica del seguimiento de las curvas de potencia, en caso de estar todo el formulario completo mostraremos por pantalla las graficas resultado
     * En caso de que falte algo por rellenar el navegador informará al usuario. Ambos seguimientos, serán de los aeros introducidos en el formulario
     */
    $("#btnGrafica").on("click",function(){
        if($("#datepicker1").val()==null || $("#aerosG").val()==null){
            $.post('http://localhost/EolicEventConsumer/error/formularioIncorrecto',
            function(data) {
                variable = data;
                $("#graficoRangos").html(data);
                $("#graficoBarras").html("<div></div>");
            });
        }else{
            /*Llamada para insertar la grafica de rangos para poner la curva de potencia de los aerogeneradores seleccionados*/
            $.post('http://localhost/EolicEventConsumer/estadisticodiarios/muestroGraficaRangos',
             {dia : $("#datepicker1").val(), aerosG : $("#aerosG").val(), contenedor:"graficaDesviaciones"}, 
             function(data) {
                 variable = data;
                 $("#graficoRangos").html(data);
             });
            /*Llamado para insertar la gráfica de barras para analizar cuan grandes son las desviaciones en los distintos bines de viento*/
            $.post('http://localhost/EolicEventConsumer/estadisticodiarios/muestroGraficaBarras',
            {dia : $("#datepicker1").val(), aerosG : $("#aerosG").val(), contenedor:"contenedorBarras"}, 
            function(data) {
                variable = data;
                $("#graficoBarras").html(data)
            });
            /* Llamada para cargar los datos de los estadísticos*/
            $.post('http://localhost/EolicEventConsumer/estadisticodiarios/cargaDatosEstadisticos',
            {dia : $("#datepicker1").val(), parque:"<?php echo $parque ?>",contenedor:"example4"},
            function(data) {
                variable = data;
                $("#box4").html(data);
            });
        }
       
        
    });
    
    /* Botón del apartado de los puntos fuera, aquí mostraremos dos gráficas, la del seguimiento de curvas de potencia y la de sectores informando cuantos puntos
     * fuera ha habido. 
     * En caso de que falte algo por rellenar el navegador informará al usuario
     */
     
    $("#btnF").on("click",function(){
        if($("#datepicker2").val()==null || $("#aerosF").val()==null){
            $.post('http://localhost/EolicEventConsumer/error/formularioIncorrecto',
            function(data) {
                variable = data;

                $("#curvaFuera").html(data);
                $("#graficoQuesos").html("<div></div>");
            });
        }else{
            /* Llamada para generar el gráfico de las curvas de potencia */
            $.post('http://localhost/EolicEventConsumer/estadisticodiarios/muestroGraficaRangos',
             {dia : $("#datepicker2").val(), aerosG : $("#aerosF").val(),contenedor:"graficaFueras"}, 
             function(data) {
                 variable = data;
                 $("#curvaFuera").html(data);


             });
             /* Llamada para generar el gráfico de sectores de los puntos fuera en cada bin de viento */
             $.post('http://localhost/EolicEventConsumer/estadisticodiarios/muestroGraficaQuesos',
             {dia : $("#datepicker2").val(), parque:"<?php echo $parque; ?>"}, 
             function(data) {
                 variable = data;
                 $("#graficoQuesos").html(data);    
             });
            /* Llamada para cargar los datos de los puntos fuera en la datetable */
            $.post('http://localhost/EolicEventConsumer/estadisticodiarios/cargaDatosFueras',
            {dia : $("#datepicker2").val(), parque:"<?php echo $parque ?>",contenedor:"example5"},
            function(data) {
                variable = data;
                $("#box5").html(data);
            });
         }
    });
    
    /* Botón del apartado del seguimiento temporal, aquí mostraremos dos gráficas, la del seguimiento temporal de las medias en un bin concreto, y 
     * otra con el seguimiento temporal de las desviaciones en un bin de viento concreto. Ambos seguimientos, serán de los aeros introducidos en el formulario
     * En caso de que falte algo por rellenar el navegador informará al usuario.
     */
    $("#btnTemporal").on("click",function(){
        if($("#diasTemporal").val()==null || $("#binViento").val()==null || $('#aerosTemporal').val()==null){
            $.post('http://localhost/EolicEventConsumer/error/formularioIncorrecto',
            function(data) {
                variable = data;

                $("#graficoTemporalMedias").html(data);
                $("#graficoTemporalDesviaciones").html("<div></div>");
            });
        }else{
            /* Llamado para insertar la gráfica del seguimiento temporal de las medias */
            $.post('http://localhost/EolicEventConsumer/estadisticodiarios/muestroGraficaBinMedias',
             {dia : $("#diasTemporal").val(), binViento : $('#binViento').val() ,aerosTemporal : $("#aerosTemporal").val(),contenedor:"graficoBM"},
             function(data) {
                 variable = data;
                 $("#graficoTemporalMedias").html(data);
             });
             /* Llamado para insertar la gráfica del seguimiento temporal de las desviaciones */
             $.post('http://localhost/EolicEventConsumer/estadisticodiarios/muestroGraficaBinDesviaciones',
             {dia : $("#diasTemporal").val(), binViento : $('#binViento').val() ,aerosTemporal : $("#aerosTemporal").val(),contenedor:"graficoBD"},
             function(data) {
                 variable = data;
                 $("#graficoTemporalDesviaciones").html(data);    
             });
        }
    });
    
    /*
    * Botón del apartado de los datos, sirve para poder actualizar la información de los datetables con el día introducido por parámetro.
    * 
     */
    
    
    $("#btnDatos").on("click",function(){
        if($("#datepickerDatos").val()==""){
            $.post('http://localhost/EolicEventConsumer/error/formularioIncorrecto',
            function(data) {
                variable = data;

                $("#ejemploCarga").html(data);
            });
        }else{
            /* Llamada para cargar los datos de los estadisticos en la datetable */
            $.post('http://localhost/EolicEventConsumer/estadisticodiarios/cargaDatosEstadisticos',
             {dia : $("#datepickerDatos").val(), parque:"<?php echo $parque ?>",contenedor:"example1"},
             function(data) {
                 variable = data;
                 $("#box1").html(data);
            });
            /* Llamada para cargar los datos de los puntos fuera en la datetable */
            $.post('http://localhost/EolicEventConsumer/estadisticodiarios/cargaDatosFueras',
             {dia : $("#datepickerDatos").val(), parque:"<?php echo $parque ?>",contenedor:"example2"},
             function(data) {
                 variable = data;
                 $("#box2").html(data);
            });
            /* Llamada para cargar los datos de bajadas de rendimiento en la datetable */
            $.post('http://localhost/EolicEventConsumer/estadisticodiarios/cargaDatosBajadas',
             {dia : $("#datepickerDatos").val(), parque:"<?php echo $parque ?>",contenedor:"example3"},
             function(data) {
                 variable = data;
                 console.log(data);
                 $("#box3").html(data);
            });
             
        }
    });
</script>




