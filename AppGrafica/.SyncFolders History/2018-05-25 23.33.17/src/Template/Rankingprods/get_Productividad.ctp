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
        Análisis de la productividad
        <small>Version 2.0</small>
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
          <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Seleccion de Rankings</a></li>
          <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Análisis gráfico</a></li>
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
                    <div class="container-fluid" >
                        <div class="col-md-3" id="ranking1">
                            
                            <table class="table table-bordered " style="border-color:black;" id="tabla1">
                                <thead style="text-align:  center">
                                    <tr>
                                        <div class="form-group">
                                            <label>Ranking del día:</label>
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                                <input type="text" class="form-control pull-right" id="datepicker1" value="<?php echo $formulario["datepickerI"]; ?>" >
                                            </div>
                                        </div>
                                    </tr>
                                </thead>
                                <tbody id="bodyRanking1">
                                    <?php foreach ($rankings as $ranking) :?>
                                    <tr>
                                        <td><?php echo $ranking['systemNumber']?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3" id="ranking2">
                            <table class="table table-bordered" id="tabla2">
                                <thead style="text-align:  center">
                                    <tr>
                                        <div class="form-group">
                                            <label>Ranking del día:</label>
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                                <input type="text" class="form-control pull-right" id="datepicker2" value="Seleccionar" >
                                            </div>
                                        </div>
                                    </tr>
                                </thead>
                                <tbody id="bodyRanking2">

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3" id="ranking3">
                            <table class="table table-bordered" id="tabla3">
                                <thead style="text-align:  center">
                                    <tr>
                                        <div class="form-group">
                                            <label>Ranking del día:</label>
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                                <input type="text" class="form-control pull-right" id="datepicker3" value="Seleccionar" >
                                            </div>
                                        </div>
                                    </tr>
                                </thead>
                                <tbody id="bodyRanking3">

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3" id="ranking4">
                            <table class="table table-bordered" id="tabla4">
                                <thead style="text-align:  center">
                                    <tr>
                                        <div class="form-group">
                                            <label>Ranking del día:</label>
                                            <div class="input-group date">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                                <input type="text" class="form-control pull-right" id="datepicker4" value="Seleccionar" >
                                            </div>
                                        </div>
                                    </tr>
                                </thead>
                                <tbody id="bodyRanking4">

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
                <div class="container-fluid text-center">
                    <div class="row">
                    <div class="box box-bodestoy y">
                        <div class="col-md-3" id="formularioG">
                            <h3>Gráfico de Seguimiento</h3><br>
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
                                <select id="aerosG" class="form-control select2" multiple="multiple" data-placeholder="Seleccionar" style="width: 100%;">
                                   <?php foreach ($rankings as $ranking) :?>
                                    <option>  <?php echo $ranking['systemNumber']?></option>
                                   <?php endforeach; ?>
                                </select>
                            </div>

                            <button id="btnGrafica" type="button" class="btn btn-block btn-primary btn-lg">Generar gráfico</button>

                        </div>
                        
                        
                        <div class="col-md-9" id="graficaI">
                            <br>
                            <img src="/EolicEventConsumer/admin_l_t_e/img/6335.jpg"  width="500" height="500">
                        </div>
                    </div>
                    </div>
                    <br><br>
                    <!-- ############################################################################################################################## -->
                    <div class="row section">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Histórico de las Transiciones</h3>
                            </div>
            <!-- /.box-header -->
                            <div class="box-body">
                              <table id="example1" class="table table-bordered table-striped" >
                                <thead>
                                <tr style="background-color: #c2c2bc">
                                  <th style="text-align: center;">SystemNumber</th>
                                  <th style="text-align: center;">Inicio</th>
                                  <th style="text-align: center;">Fin</th>
                                  <th style="text-align: center;">Posicion Inicio</th>
                                  <th style="text-align: center;">Posicion Fin</th>
                                  <th style="text-align: center;">Variacion</th>
                                </tr>
                                </thead>
                                <tbody>                              
                                    <?php foreach ($transiciones as $transicion) :?>
                                    <tr>
                                        <td><?php echo $transicion['systemNumber']?></td>
                                        <td><?php echo $transicion['inicio']?></td>
                                        <td><?php echo $transicion['fin']?></td>
                                        <td><?php echo $transicion['posicionInicio']?></td>
                                        <td><?php echo $transicion['posicionFin']?></td>
                                        <td><?php echo $transicion['variacion']?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                  <th style="text-align: center;">SystemNumber</th>
                                  <th style="text-align: center;">Inicio</th>
                                  <th style="text-align: center;">Fin</th>
                                  <th style="text-align: center;">Posicion Inicio</th>
                                  <th style="text-align: center;">Posicion Fin</th>
                                  <th style="text-align: center;">Variacion</th>
                                </tr>
                                </tfoot>
                              </table>
                            </div>
                        </div>
                    </div> 
                    <!-- ############################################################################################################################## -->
                    
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
<input id="globalSeguir" type="hidden" name="opcion" value="">

<script>
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

            $("#tabla4 td").each(function(){
               if($(this).text().includes(idASeguir)){
                   console.log("ENCONTRADO");
                   $(this).attr("bgcolor","#F99090");
               }else{
                    $(this).attr("bgcolor","#ccccff");

               }
            });
        }
        
    }
    

    
    
    
    $(document).ready(function(){
       $("#datepicker1").change(function(){
           $.post('http://localhost/EolicEventConsumer/rankingprods/muestrorankingparque',
            {fecha : $("#datepicker1").val()}, 
            function(data) {
                variable = data;
                $("#bodyRanking1").html(data);
                
            });
        });
        $("#datepicker2").change(function(){
           $.post('http://localhost/EolicEventConsumer/rankingprods/muestrorankingparque',
            {fecha : $("#datepicker2").val()}, 
            function(data) {
                variable = data;
                $("#bodyRanking2").html(data)
            });
       
        
        }); 
        $("#datepicker3").change(function(){
           $.post('http://localhost/EolicEventConsumer/rankingprods/muestrorankingparque',
            {fecha : $("#datepicker3").val()}, 
            function(data) {
                variable = data;
                $("#bodyRanking3").html(data)
            });
       
        
        }); 
        $("#datepicker4").change(function(){
           $.post('http://localhost/EolicEventConsumer/rankingprods/muestrorankingparque',
            {fecha : $("#datepicker4").val()}, 
            function(data) {
                variable = data;
                $("#bodyRanking4").html(data)
            });
       
        
        });
        
        $("#btnGrafica").on("click",function(){
           $.post('http://localhost/EolicEventConsumer/rankingprods/muestroGrafica',
            {diasG : $("#diasG").val(), aerosG : $("#aerosG").val()}, 
            function(data) {
                variable = data;
                $("#graficaI").html(data)
            });
       
        
        }); 
        
        
        
        function postAeroSeguir(aeroSeguir){
            $.post('http://localhost/EolicEventConsumer/rankingprods/getInfoAero',
            {idAero : aeroSeguir}, 
            function(data) {
                variable = data;
                $("#infoAero").html(data)
            });
        }
        
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
        
    });
    
   
    
</script>

<script>
  $(function () {
   
    $('#datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });
    
    $('#datepicker2').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });
    $('#datepicker3').datepicker({
      format: 'dd/mm/yyyy',      
      autoclose: true
    });
    $('#datepicker4').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });
    $('#datepicker1').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });
    
    $(".select2").select2();
    
    $(function () {
        $('#diasG').daterangepicker({
            locale: {
                format: 'DD/MM/YYYY'
            }
        });
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



