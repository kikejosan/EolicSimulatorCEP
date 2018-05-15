<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<section class="content-header">
      <h1 id="titulo">
        Búsqueda de rankings de productividad
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> RankingProds</a></li>
        <li class="active">Búsqueda</li>
      </ol>
    </section>

    <!-- Main content -->
<section class="content">

          <!-- Your Page Content Here -->



    <div class="container-fluid text-center">
        <br><br><br>
        <div class="row">
            <div class="col-md-4" id="tablasRank" style="background-color: #FFC600">



            </div>
            <div class="col-md-4"  style="background-color: #08f7db">
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
               <!-- <button id="btnIntro2" class="btn btn-block btn-primary"> Pruebas </button>-->
                <div id="pruebasContenedor"> </div>
                <br>

            </div>
            <div class="col-md-4" id="tablasRank" style="background-color: #FFC600">
            </div>

        </div>
    </div>
</section>
    <script>
        $("#btnIntro2").on('click',function(){
            var parque=$("#parque1").val();
            var dia=$("#datepickerI").val();
            console.log(dia);
            console.log(parque);
            //$("#titulo").append(dia);
            $.post('http://localhost/EolicEventConsumer/rankingprods/muestrorankingparque',
            {parque1: parque, dia1: dia}, 
            function(data) {
                variable = data;
                $("#pruebasContenedor").html(data)
            });


        });

    </script>    
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
  $(function () {
    //Initialize Select2 Elements

    

    //Date picker
    $('#datepickerI').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
    });
    alert("s");
  });
</script>
<?php $this->end(); ?>



