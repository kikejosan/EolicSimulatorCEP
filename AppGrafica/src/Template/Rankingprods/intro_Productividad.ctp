<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


<section class="content-header">
      <h1 id="titulo">
        Análisis de la Productividad
                <small>Introducción</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-fw fa-search"></i>Búsqueda</a></li>
        <li class="active">Productividad</li>
      </ol>
</section>
<br>
    <!-- Main content -->
<section class="content" height=2222 style="background-image: url('/EolicEventConsumer/admin_l_t_e/img/O7MEZJ0.jpg');   background-position: center center;   background-repeat: no-repeat;    background-size: cover; background-attachment: fixed;  background-color: #464646;">
    <div class="container-fluid text-center">
        
        <div class="row">
            <div class="col-md-4" id="tablasRank">
                <br>
            </div>
            <div class="col-md-4">
                <br>
                <div class="box box-primary" style="background-color: #e6f3ff;">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <form class="form-group" method="post" action="../rankingprods/getProductividad">
                            <h3>Parque</h3>
                            <select id="parque1" class="form-control" name="parque1">
                                <?php foreach($parques as $parque): ?>
                                <option><?php echo $parque['Nombre']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <br>
                            <h3>Día del año: </h3>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input required="true" type="text" class="form-control pull-right" id="datepickerI" name="datepickerI">
                                </div>
                            <br>
                            <input type="submit" id="btnIntro" class="btn btn-block btn-primary" value="Seguimiento"/>    
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                    <br>
              
            </div>
            </div>
            <div class="col-md-4" id="tablasRank">
            </div>

        </div>
    </div>
    <br>
<br>
<br>
<br>
<br>

</section>
   
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
],
['block' => 'script']);
?>
<?php $this->start('scriptBottom'); ?>
<script>
    var fechasLimite = "<?php echo $fechasLimite ?>";
    fechasLimite = fechasLimite.split(',');
    var inicio = new Date(fechasLimite[0]);
    var final = new Date(fechasLimite[1]);
    
    $('#datepickerI').datepicker({
        format: 'dd/mm/yyyy',
        startDate:inicio,
        endDate:final,
        autoclose: true
        
    });
    
</script>
<?php $this->end(); ?>



