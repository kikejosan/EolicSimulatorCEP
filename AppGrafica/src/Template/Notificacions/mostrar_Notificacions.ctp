<section class="content-header">
    <h1>
        Notificaciones
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-list-alt"></i>Listado</a></li>
        <li class="active">Notificaciones</li>
      </ol>
</section>

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
<section class="content">
    <div class="row">
    <div class="col-md-6">
        <div class="col-md-12">
           <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Outliers peligrosos</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body"> 
                    <table id="tablaFueras" class="table table-bordered table-striped" >
                        <thead>
                        <tr style="background-color: #c2c2bc">
                            
                            <th style="text-align: center;">SystemNumber</th>
                            <th style="text-align: center;">Fecha</th>
                            <th style="text-align: center;">Nº Outliers</th>
                            <th style="text-align: center;">Bin de viento (m/s)</th>
                            <th style="text-align: center;">Media (KW/h)</th>
                            <th style="text-align: center;">Desviación típica (KW/h)</th>
                            <th style="text-align: center;"></th>
                            
                        </tr>
                        </thead>
                        <tbody>                              
                            <?php foreach ($fueras as $unoF) :?>
                            <tr>
                                <td style="text-align: center;"><?php echo $unoF['systemNumber']?></td>
                                <td style="text-align: center;"><?php echo $unoF['fecha']?></td>
                                <td style="text-align: center;"><?php echo $unoF['campo1']?></td>
                                <td style="text-align: center;"><?php echo $unoF['campo3']?></td>
                                <td style="text-align: center;"><?php echo round($unoF['campo4'],2)?></td>
                                <td style="text-align: center;"><?php echo round($unoF['campo5'],2)?></td>
                                <td><?= $this->Form->postLink(__("Tramitar") ,['action' => 'actualizarEstado', $unoF->id], array('class'=>'btn btn-block btn-warning btn-xs')) ?></button></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>                             
                </div>
            </div> 
        </div>
        
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Bajadas drásticas en el Ranking</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <table id="tablaTransicions" class="table table-bordered table-striped" >
                        <thead>
                        <tr style="background-color: #c2c2bc">
                            <th style="text-align: center;">SystemNumber</th>
                            <th style="text-align: center;">Fecha</th>
                            <th style="text-align: center;">Pos.Final</th>
                            <th style="text-align: center;">Nº puestos bajados</th>
                            <th style="text-align: center;">Variación en ranking %</th>
                            <th style="text-align: center;">Variación de la media % (KW/h)</th>
                            <th style="text-align: center;"></th>
                        </tr>
                        </thead>
                        <tbody>                              
                            <?php foreach ($transicions as $transicion) :?>
                            <tr>
                                <td style="text-align: center;"><?php echo $transicion['systemNumber']?></td>
                                <td style="text-align: center;"><?php echo $transicion['fecha']?></td>
                                <td style="text-align: center;"><?php echo $transicion['campo1']?></td>
                                <td style="text-align: center;"><?php echo $transicion['campo2']?></td>
                                <td style="text-align: center;"><?php echo round($transicion['campo3'],2)?></td>
                                <td style="text-align: center;"><?php echo round($transicion['campo4'],2)?></td>
                                <td><?= $this->Form->postLink(__("Tramitar") ,['action' => 'actualizarEstado', $transicion->id], array('class'=>'btn btn-block btn-warning btn-xs')) ?></button></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>                             
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-12">
           <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Bajadas de rendimiento drásticas</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <table id="tablaBajadasM" class="table table-bordered table-striped" >
                        <thead>
                        <tr style="background-color: #c2c2bc">
                            <th style="text-align: center;">SystemNumber</th>
                            <th style="text-align: center;">Fecha</th>
                            <th style="text-align: center;">Nº D.Minutales</th>
                            <th style="text-align: center;">Bin de viento (m/s)</th>
                            <th style="text-align: center;">Media (KW/h)</th>
                            <th style="text-align: center;">Variación de la media % (KW/h)</th>
                            <th style="text-align: center;"></th>
                        </tr>
                        </thead>
                        <tbody>                              
                            <?php foreach ($bajadasM as $bajadaM) :?>
                            <tr>
                                <td style="text-align: center;"><?php echo $bajadaM['systemNumber']?></td>
                                <td style="text-align: center;"><?php echo $bajadaM['fecha']?></td>
                                <td style="text-align: center;"><?php echo $bajadaM['campo1']?></td>
                                <td style="text-align: center;"><?php echo $bajadaM['campo3']?></td>
                                <td style="text-align: center;"><?php echo round($bajadaM['campo4'],2)?></td>
                                <td style="text-align: center;"><?php echo round($bajadaM['campo5'],2)?></td>
                                <td><?= $this->Form->postLink(__("Tramitar") ,['action' => 'actualizarEstado', $bajadaM->id], array('class'=>'btn btn-block btn-warning btn-xs')) ?></button></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>                             
                </div>
            </div> 
        </div>
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Dispersiones de datos altas</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                      <i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <table id="tablaBajadasD" class="table table-bordered table-striped" >
                        <thead>
                        <tr style="background-color: #c2c2bc">
                            <th style="text-align: center;">SystemNumber</th>
                            <th style="text-align: center;">Fecha</th>
                            <th style="text-align: center;">Nº D.Minutales</th>
                            <th style="text-align: center;">Bin de viento (m/s)</th>
                            <th style="text-align: center;">Desviacion típica (KW/h)</th>
                            <th style="text-align: center;">Variación de la desviación típica % (KW/h)</th>
                            <th style="text-align: center;"></th>

                        </tr>
                        </thead>
                        <tbody>                              
                            <?php foreach ($bajadasD as $bajadaD) :?>
                            <tr>
                                <td style="text-align: center;"><?php echo $bajadaD['systemNumber']?></td>
                                <td style="text-align: center;"><?php echo $bajadaD['fecha']?></td>
                                <td style="text-align: center;"><?php echo $bajadaD['campo1']?></td>
                                <td style="text-align: center;"><?php echo $bajadaD['campo2']?></td>
                                <td style="text-align: center;"><?php echo round($bajadaD['campo3'],2)?></td>
                                <td style="text-align: center;"><?php echo round($bajadaD['campo4'],2)?></td>
                                <td><?= $this->Form->postLink(__("Tramitar") ,['action' => 'actualizarEstado', $bajadaD->id], array('class'=>'btn btn-block btn-warning btn-xs')) ?></button></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>                             
                </div>
            </div>
        </div>
    </div>
        </div>
</section>
<script>
    $(function () {
        /*Inicialización de los datetables de todos los tipo de notificaciones */
        $('#tablaFueras').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ entradas por pagina",
                "zeroRecords": "Nada que mostrar - Lo siento",
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
        $('#tablaTransicions').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ entradas por pagina",
                "zeroRecords": "Nada que mostrar - Lo siento",
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
        $('#tablaBajadasD').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ entradas por pagina",
                "zeroRecords": "Nada que mostrar - Lo siento",
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
        $('#tablaBajadasM').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ entradas por pagina",
                "zeroRecords": "Nada que mostrar - Lo siento",
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


