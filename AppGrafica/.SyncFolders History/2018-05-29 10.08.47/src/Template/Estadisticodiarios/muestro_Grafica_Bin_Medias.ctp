<div class="container-fluid" id="<?php echo $contenedor?>"></div>
<script>
    var temporalMedias = "<?php echo $temporalMedias ?>"; 
    temporalMedias = temporalMedias.split(':');
    var contenedor = "<?php echo $contenedor; ?>";
    var bin = "<?php echo $bin; ?>";
    var compuesto = [];
    var simple = [];
    var series = [];
    
    var compuestoAux = [];
    var simpleAux = [];
    var fechaSimple = new Date();
    for(var i=0;i<temporalMedias.length;i++){
        compuesto = temporalMedias[i].split('|');
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
    var aerosSeleccionados = $('#aerosTemporal').val();
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
       // series2.push(segundo);

    }

var fechita = '1/19/2018';
var miFechita = new Date(fechita);


Highcharts.chart(contenedor, {
      chart: {
                type:'areaspline',
                zoomType : 'xy'
            },

    title: {
        text: 'Análisis temporal de medias en el bin '+bin
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
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },

    tooltip: {
        crosshairs: true,
        shared: true,
        valueSuffix: 'KW'
    },

    legend: {
    },

    series: series2
});
    
</script>