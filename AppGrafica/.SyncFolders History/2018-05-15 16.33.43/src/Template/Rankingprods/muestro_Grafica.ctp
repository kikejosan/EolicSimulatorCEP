<!--<h3>hola chaval los datos que le he pasado son</h3>
<h1><?php// echo $diasG[0]."      ".$aerosG[0]?> </h1>
<?php// foreach ($rankingprodsG as $ranking) :?>
    <label>  <?php //echo $ranking['systemNumber']?></label>
<?php// endforeach; ?>
    
    <h2>Prueba de enseñar series</h2>
    <?php //foreach ($series as $serie) :?>
    <label>
        <?php// foreach ($serie as $cosa):
       // echo $cosa;
       // endforeach; ?>
    </label>
    <?//php endforeach; ?>
    <h1>ESTo es categorias</h1>
    
    <label><?php// echo $dataStr ?></label>
    -->
<div id="contenedor"></div>
<script>
    /*Tranformación de los string de las categorias en arrays string*/
    var categorias = '<?php echo $categorias;?>';
    console.log(categorias);
    categorias = categorias.split(',');
    
    /*Transformación del nombre de las series*/
    var nombreSeries = '<?php echo $aerosStr?>';
    console.log(nombreSeries);
    nombreSeries = nombreSeries.split(',');
    console.log(nombreSeries[0]);
    console.log(nombreSeries[1]);
    console.log(nombreSeries[2]);
    
    /*Transformación de los string de las series en arrays double*/
    var series = '<?php echo $dataStr; ?>';
    console.log(series);
    series = series.split('|');
    var aux =[];
    
    var arraySeries = [];
    var arrayStr = [];
    var arrayAux = [];
    for (var i = 0; i < series.length; i++) {
      arrayAux = [];
      arrayStr = series[i].split(",");
      for(var j=0; j<arrayStr.length;j++){
          arrayAux.push(parseFloat(arrayStr[j]));
      }
      arraySeries.push(arrayAux);
    }
    console.log(arraySeries[0]);
    console.log(arraySeries[1]);
    console.log(arraySeries[2]);
   
    /*Creación de datos para el grafico*/
    var mainData=[];
    var serie;
    for(var i=0; i<nombreSeries.length;i++){
        serie = {name : nombreSeries[i],
                data :arraySeries[i]};
        mainData.push(serie);
    }
   
    //alert(series);
    
    //var categorias =
    //console.log(categorias);
    Highcharts.chart('contenedor', {
        chart: {
            type: 'areaspline',
            height:600,
            zoomType : 'y'
        },
        title: {
            text: 'Productividad de '+categorias[0]+' hasta '+categorias[categorias.length-1]
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 100,
            y: 20,
            floating: true,
            borderWidth: 1,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        xAxis: {
            title: {
                text: 'Transcurso de días'
            },
            categories: categorias,
            plotBands: [{ // visualize the weekend
                from: 20,
                to: 6.5,
                color: 'rgba(68, 170, 213, .2)'
            }]
        },
        yAxis: {
            title: {
                text: 'Potencia producida KW'
            }
        },
        tooltip: {
            shared: true,
            valueSuffix: ' units'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        series: mainData
    });
</script>
