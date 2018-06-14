<div class="box" id="<?php echo $contenedor.'b'; ?>">
    <div class="box-header with-border">
      <h3 class="box-title">Gráfico de Seguimiento</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
        <div class='container-fluid' id="<?php echo $contenedor?>">
            
        </div>
    </div>  
</div>

<script>
     /* Sacamos la información adquirida por medio del controlador:
     *  - Aerogeneradores introducidos.
     *  - Posiciones de los aerogeneradores seleccionados los días especificados.
     *  - Días a los que pertenecen esas posiciones
     */
    var temporalRankings = "<?php echo $temporalRankings ?>"; 
    temporalRankings = temporalRankings.split(':');
    var contenedor = "<?php echo $contenedor; ?>";
    var dia = "<?php echo $diasG; ?>";
    dia = dia.split(',');
    var compuesto = [];
    var simple = [];
    var series = [];
    
    var compuestoAux = [];
    var simpleAux = [];
    var fechaSimple = new Date();
     /*Controlamos si hay datos en la información aportada por el controlador*/
    if(esVacio(temporalRankings)){
        $.post('http://localhost/EolicEventConsumer/error/datosInexistentes',
        function(data) {
            variable = data;

            $("#"+"<?php echo $contenedor?>").html(data);
        });
    }else{
    /* Preparamos un array con las series de datos:
         * SerieEjemplo seria:  [[fechaMillisec,posicion],[fechaMillisec2,posicion],[fechaMillisec3,posicion]] 
         */
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
                        
                        zoomType : 'xy'
                    },

            title: {
                text: 'Análisis del Ranking del '+ dia[0]+' al '+dia[1]
            },

            xAxis: {
                
                type: 'datetime',
                title:{
                    text: "Transcurso del tiempo (dias)"
                }
            },

            yAxis: {

                title: {
                    text: "Posiciones"
                },
                reversed: true
                
            },

            tooltip: {
                crosshairs: true,
                shared: true,
                valueSuffix: 'º',
                
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
    }
    function esVacio (datos){
        for (var i=0;i<datos.length;i++){
            if(datos[i]!="") return false;
        }
        return true;
    }
    
</script>
