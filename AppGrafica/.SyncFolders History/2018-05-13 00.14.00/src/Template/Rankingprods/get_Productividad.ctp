<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<section class="content-header">
    <h1>
        Análisis de la productividad
        <small>Version 1.0</small>
    </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">RankingProds</a></li>
        <li class="active">Productividad</li>
      </ol>
</section>

<section class="content">
    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-md-2"  style="background-color: #08f7db">
                <div class="form-group">
                      <label>Parque   </label>
                      <select class="form-control">
                        <?php foreach($parques as $parque): ?>
                            <option><?php echo $parque['Nombre'];?></option>
                        <?php endforeach; ?>
                      </select>
                      <br>
                      <label>Seguimiento del aero: </label>
                      <select id="aeroSeguir" class="form-control" >
                                <option> ------ </option>
                            <?php foreach ($rankings as $ranking) :?>
                                <option>  <?php echo $ranking['systemNumber']?></option>
                            <?php endforeach; ?>
                        </select>
                </div>
                <button type="button" id="boton1" class="btn btn-block btn-primary">Seguimiento</button>
                <br>
                <br>
                <br>
                <br>

            </div>

            <div class="col-md-10" id="tablasRank" style="background-color: #FFC600">
                <h2>Seguimiento de <?php echo $formulario['parque1']; ?>  </h2>
                <div class="container-fluid" >
                    <div class="col-md-3" id="ranking1">
                        <table class="table table-bordered" id="tabla1">
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
                                            <input type="text" class="form-control pull-right" id="datepicker2" value="Seleccionar2" >
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
        <br>
        <div class="row">
            <div class="col-md-3" id="graficott">
                <div class="box box-primary">
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
                    <!-- /.box-body -->
                </div>
            </div>
            <div class="col-md-9" id="graficoI">
                Gráfico aquí
            </div>
        </div>
    </div>
</section>


<script>
    
    $("#aeroSeguir").on("change",function(){
        seguimiento();
    });
    
    
    function seguimiento(){
        alert("han llamado a seguimiento");
        $("#tabla1 td").each(function(){
           if($(this).text()==$("#aeroSeguir").val()){
               console.log("ENCONTRADO");
               $(this).attr("bgcolor","#F99090");
           }else{
                $(this).attr("bgcolor","#FFC600");

           }
        });
        
        $("#tabla2 td").each(function(){
           if($(this).text()==$("#aeroSeguir").val()){
               console.log("ENCONTRADO");
               $(this).attr("bgcolor","#F99090");
           }else{
                $(this).attr("bgcolor","#FFC600");

           }
        });
        
        $("#tabla3 td").each(function(){
           if($(this).text()==$("#aeroSeguir").val()){
               console.log("ENCONTRADO");
               $(this).attr("bgcolor","#F99090");
           }else{
                $(this).attr("bgcolor","#FFC600");

           }
        });
        
        $("#tabla4 td").each(function(){
           if($(this).text()==$("#aeroSeguir").val()){
               console.log("ENCONTRADO");
               $(this).attr("bgcolor","#F99090");
           }else{
                $(this).attr("bgcolor","#FFC600");

           }
        });
    }
    

    /*$("#datepicker2").change(function(){alert("dfdf");});
    $("#boton1").on("click",function(){
        $.post('http://localhost/EolicEventConsumer/rankingprods/muestrorankingparque',
            {fecha : $("#datepicker2").val()}, 
            function(data) {
                variable = data;
                $("#bodyRanking2").html(data)
            });
    });*/
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
        
    });
    
    $(document).ready(function(){
       $("#dfdfdf").change(function(){
           
        console.log("hello");
        
        }); 
        
    });
    
</script>

<script>
  $(function () {
   
    $('#datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true
    });
    $('#datepicker1').datepicker({
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
    


  });
</script>

<script>
    Highcharts.setOptions({
    global: {
        useUTC: false
    }
});

Highcharts.chart('graficoI', {
    chart: {
        type: 'spline',
        animation: Highcharts.svg, // don't animate in old IE
        marginRight: 10,
        events: {
            load: function () {

                // set up the updating of the chart each second
                var series = this.series[0];
                setInterval(function () {
                    var x = (new Date()).getTime(), // current time
                        y = Math.random();
                    series.addPoint([x, y], true, true);
                }, 1000);
            }
        }
    },
    title: {
        text: 'Live random data'
    },
    xAxis: {
        type: 'datetime',
        tickPixelInterval: 150
    },
    yAxis: {
        title: {
            text: 'Value'
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    },
    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                Highcharts.numberFormat(this.y, 2);
        }
    },
    legend: {
        enabled: false
    },
    exporting: {
        enabled: false
    },
    series: [{
        name: 'Random data',
        data: (function () {
            // generate an array of random data
            var data = [],
                time = (new Date()).getTime(),
                i;

            for (i = -19; i <= 0; i += 1) {
                data.push({
                    x: time + i * 1000,
                    y: Math.random()
                });
            }
            return data;
        }())
    }]
});
</script>



