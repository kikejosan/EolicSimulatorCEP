<div class="container-fluid" id="<?php echo $contenedor?>"></div>
<script>
    var temporalRankings = "<?php echo $temporalRankings ?>"; 
    temporalRankings = temporalRankings.split(':');
    var contenedor = "<?php echo $contenedor; ?>";
    var dia = "<?php echo $diasG; ?>";
    dia = dia.split(',');
    //var bin = "<?php //echo $bin; ?>";
    var compuesto = [];
    var simple = [];
    var series = [];
    
    var compuestoAux = [];
    var simpleAux = [];
    var fechaSimple = new Date();
    for(var i=0;i<temporalRankings.length;i++){
        compuesto = temporalRankings[i].split('|');
        for(var j=0;j<compuesto.length;j++){
            simple = compuesto[j].split(',');
            
            fechaSimple = Math.round(Date.parse(simple[0])+3600000);
            simpleAux.push(fechaSimple);
            simpleAux.push(parseFloat(simple[1]));
            
            compuestoAux.push(simpleAux);
            simpleAux = [];
        }
        series.push(compuestoAux);
        compuestoAux = [];
        
    }
    var aerosSeleccionados = $('#aerosG').val();
    var series2 =[];
    for(var i=0; i<series.length;i++){
        var primero = {
            name:  aerosSeleccionados[i],
            data: series[i],
            zIndex: 1,
            marker: {
                fillColor: 'white',
                lineWidth: 2,
                lineColor: Highcharts.getOptions().colors[i]
            }
        }
        series2.push(primero);

    }



Highcharts.chart(contenedor, {
      chart: {
                type:'areaspline',
                zoomType : 'xy'
            },

    title: {
        text: 'Análisis de los rankings del '+ dia[0]+' al '+dia[1]
    },

    xAxis: {
        
        type: 'datetime',
        title:{
            text: "Transcurso del tiempo (dias)"
        }
    },

    yAxis: {
        title: {
            text: "Potencia producida (KW)"
        }
    },

    tooltip: {
        crosshairs: true,
        shared: true,
        valueSuffix: 'KW'
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },

    legend: {
    },

    series: series2
});
    
</script>
<script>
//    /*Tranformación de los string de las categorias en arrays string*/
//    var categorias = '<?php //echo $categorias;?>';
//    console.log(categorias);
//    categorias = categorias.split(',');
//    
//    /*Transformación del nombre de las series*/
//    var nombreSeries = '<?php //echo $aerosStr?>';
//    console.log(nombreSeries);
//    nombreSeries = nombreSeries.split(',');
//    console.log(nombreSeries[0]);
//    console.log(nombreSeries[1]);
//    console.log(nombreSeries[2]);
//    
//    /*Transformación de los string de las series en arrays double*/
//    var series = '<?php //echo $dataStr; ?>';
//    console.log(series);
//    series = series.split('|');
//    var aux =[];
//    
//    var arraySeries = [];
//    var arrayStr = [];
//    var arrayAux = [];
//    for (var i = 0; i < series.length; i++) {
//      arrayAux = [];
//      arrayStr = series[i].split(",");
//      for(var j=0; j<arrayStr.length;j++){
//          arrayAux.push(parseFloat(arrayStr[j]));
//      }
//      arraySeries.push(arrayAux);
//    }
//    console.log(arraySeries[0]);
//    console.log(arraySeries[1]);
//    console.log(arraySeries[2]);
//   
//    /*Creación de datos para el grafico*/
//    var mainData=[];
//    var serie;
//    for(var i=0; i<nombreSeries.length;i++){
//        serie = {name : nombreSeries[i],
//                data :arraySeries[i]};
//        mainData.push(serie);
//    }
//   
//    //alert(series);
//    
//    //var categorias =
//    //console.log(categorias);
//    Highcharts.chart('contenedor', {
//        chart: {
//            type: 'areaspline',
//            //height:600,
//            zoomType : 'xy'
//        },
//        title: {
//            text: 'Productividad de '+categorias[0]+' hasta '+categorias[categorias.length-1]
//        },
//        legend: {
//            layout: 'vertical',
//            align: 'left',
//            verticalAlign: 'top',
//            x: 100,
//            y: 20,
//            floating: true,
//            borderWidth: 1,
//            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
//        },
//        xAxis: {
//            title: {
//                text: 'Transcurso de días'
//            },
//            categories: categorias,
//            plotBands: [{ // visualize the weekend
//                from: 20,
//                to: 6.5,
//                color: 'rgba(68, 170, 213, .2)'
//            }]
//        },
//        yAxis: {
//            title: {
//                text: 'Potencia producida KW'
//            }
//        },
//        tooltip: {
//            shared: true,
//            valueSuffix: ' KW'
//        },
//        credits: {
//            enabled: false
//        },
//        plotOptions: {
//            areaspline: {
//                fillOpacity: 0.5
//            }
//        },
//        series: mainData
//    });

</script>
