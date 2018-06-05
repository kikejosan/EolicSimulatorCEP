<div class="box" id="boxBarras">
    <div class="box-header with-border">
      <h3 class="box-title">Examen de desviaciones</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
        <div class="container-fluid" id="<?php echo $contenedor; ?>"></div>           
    </div>
                            
</div>

<script>
    /* Sacamos la información adquirida por medio del controlador:
     *  - Aerogeneradores introducidos.
     *  - Bines de viento por aerogenerador
     *  - Desviaciones de los bines de viento por aerogenerador
     */
    var contenedor = "<?php echo $contenedor; ?>";    
    var aerosSeleccionados = "<?php echo $aerosG; ?>";
    aerosSeleccionados = aerosSeleccionados.split(",");   
    var vientos = "<?php echo $StrV;?>";
    var desviaciones = "<?php echo $StrD;?>";
    vientos = vientos.split("|");
    desviaciones = desviaciones.split("|");

    var arrayV = [];
    var arrayD = [];

    
    var arrayRAux = [];
    var arraySRAux = [];


    var arrayMV = [];
    var arrayMD = [];
    
    
    var rangos = [];
    var seriesDesviaciones2 = [];
    var seriesDesviaciones3 = [];
    var seriesDesviaciones4 = [];
    /* En caso de que no haya datos que mostrar, se le mostrará al usuario por pantalla */
    if(desviaciones==""){
        $.post('http://localhost/EolicEventConsumer/error/datosInexistentes',
        function(data) {
            variable = data;

            $("#"+"<?php echo $contenedor ?>").html(data);
        });
    }else{
        /* Preparamos un array con las series de datos:
         * SerieEjemplo seria:  [[binViento,desviacion],[binViento2,desviacion2],[binViento3,desviacion3]] 
         * El conjunto de la serie corresponde a un aerogenerador, es decir... las coleeciones de los pares binViento y desviacion */
        for(var i=0; i<vientos.length;i++){
            arrayMV = vientos[i].split(',');
            arrayMD = desviaciones[i].split(',');


            for(var j=0; j<arrayMV.length;j++){
                viento = parseFloat(arrayMV[j]);
                desviacion = parseFloat(arrayMD[j]);

                seriesDesviaciones2.push(viento);
                seriesDesviaciones2.push(desviacion);
                seriesDesviaciones3.push(seriesDesviaciones2);

                seriesDesviaciones2 = [];
            }
            seriesDesviaciones4.push(seriesDesviaciones3);
            seriesDesviaciones3=[];
        }

        /* Preparo el estilo de las series para que el estilo de la gráfica sea el adecuado*/
        var series2 =[];
        for(var i=0; i<seriesDesviaciones4.length;i++){
            var primero = {
                name:  aerosSeleccionados[i],
                data: seriesDesviaciones4[i],
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
                        type:'column',
                        zoomType : 'xy'
                    },

            title: {
                text: 'Análisis de desviaciones'
            },
            xAxis: {
                type: [0,20],
                title: {
                    text: "Bin de viento (m/s)"
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
                valueSuffix: ' KW'
            },
            legend: {
            },
            series: series2
        });
    }
</script>

