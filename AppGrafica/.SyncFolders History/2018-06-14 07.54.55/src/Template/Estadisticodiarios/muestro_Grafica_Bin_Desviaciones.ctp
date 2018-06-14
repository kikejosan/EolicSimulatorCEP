<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Seguimiento de desviaciones</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
        <div class='container-fluid' id="<?php echo $contenedor?>" >
        </div>
    </div>  
</div>

<script>
    /* Sacamos la información adquirida por medio del controlador:
     *  - Aerogeneradores introducidos.
     *  - Desviaciones producidas por los aerogeneradores seleccionados los días especificados.
     *  - Días a los que pertenecen esas desviaciones
     */
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
    
    if(esVacio(temporalMedias)){
        $.post('http://localhost/EolicEventConsumer/error/datosInexistentes',
        function(data) {
            variable = data;
            $("#"+"<?php echo $contenedor ?>").html(data);
        });
    }else{
        for(var i=0;i<temporalMedias.length;i++){
            compuesto = temporalMedias[i].split('|');
            for(var j=0;j<compuesto.length;j++){
                simple = compuesto[j].split(',');

                fechaSimple = Date.parse(simple[0])+3600000;
                simpleAux.push(fechaSimple);
                simpleAux.push(parseFloat(simple[1]));

                compuestoAux.push(simpleAux);
                simpleAux = [];
            }
            series.push(compuestoAux);
            compuestoAux = [];

        }
        /* Preparo el estilo de las series para que el estilo de la gráfica sea el adecuado*/
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
        }



        /*Cargo del grafico en el contenedor especificado */
        Highcharts.chart(contenedor, {
              chart: {
                        type:'areaspline',
                        zoomType : 'xy'
                    },

            title: {
                text: 'Análisis temporal de desviaciones en el bin '+bin
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
    }
    function esVacio (datos){
        for (var i=0;i<datos.length;i++){
            if(datos[i]!="") return false;
        }
        return true;
    }
    
</script>