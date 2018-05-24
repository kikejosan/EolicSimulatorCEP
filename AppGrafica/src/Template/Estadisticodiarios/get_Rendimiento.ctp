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
        Análisis de la Rendimiento
        <small>Version 1.0</small>
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">RankingProds</a></li>
        <li class="active">Productividad</li>
      </ol>
</section>


<section class="content" >
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Datos obtenidos</a></li>
          <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Análisis de desviaciones</a></li>
          <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Análisis de los puntos fuera</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="container-fluid">

                <div class="col-md-12" id="datos">
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
                            <div class="box-body">
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
                            <div class="box-body">
                                <table id="example3" class="table table-bordered table-striped" >
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
                            <div class="box-body">
                                <table id="example2" class="table table-bordered table-striped" >
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
                                    <tbody>                              
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
                                            <option>724024001</option>
                                            <option>724024002</option>
                                            <option>724024003</option>
                                            <option>724024004</option>
                                            <option>724024031</option>
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
                                <div class="box-body">
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
                                            <option>724024001</option>
                                            <option>724024002</option>
                                            <option>724024003</option>
                                            <option>724024004</option>
                                            <option>724024031</option>
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
                                <div class="box-body">
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
                            
                            
                        </div>
                        <div class="col-md-12" id="graficoQuesos">fff
                            
                        </div>
                    </div>
                </div>
            </div>

          
        </div>
            <!-- /.tab-content -->
    </div>
    <div class="container-fluid text-center">
        <div class="row">
            

        </div>
        <br>
        
    </div>
    
</section>

<script>
  $(function () {
    $('#datepicker1').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });
    $('#datepicker2').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });
    
    $(".select2").select2();
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
    $("#btnGrafica").on("click",function(){
        $.post('http://localhost/EolicEventConsumer/estadisticodiarios/muestroGraficaRangos',
         {dia : $("#datepicker1").val(), aerosG : $("#aerosG").val()}, 
         function(data) {
             variable = data;
             $("#graficoRangos").html(data);
             
                
         });
        
        $.post('http://localhost/EolicEventConsumer/estadisticodiarios/muestroGraficaBarras',
        {dia : $("#datepicker1").val(), aerosG : $("#aerosG").val()}, 
        function(data) {
            variable = data;
            $("#graficoBarras").html(data)
        });
        
       
        
    });
    $("#btnF").on("click",function(){
        $.post('http://localhost/EolicEventConsumer/estadisticodiarios/muestroGraficaRangos',
         {dia : $("#datepicker2").val(), aerosG : $("#aerosF").val()}, 
         function(data) {
             variable = data;
             $("#curvaFuera").html(data);
             
                
         });
         $.post('http://localhost/EolicEventConsumer/estadisticodiarios/muestroGraficaQuesos',
         {dia : $("#datepicker2").val()}, 
         function(data) {
             variable = data;
             $("#graficoQuesos").html(data);
             
                
         });

    }); 
</script>




