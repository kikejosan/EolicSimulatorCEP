<div class="box" id="boxRangos">
    <div class="box-header with-border">
      <h3 class="box-title">Examen de la Curva de Potencia</h3>
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
     *  - Medias de los bines de viento por aerogenerador
     *  - Desviaciones de los bines de viento por aerogenerador
     */
    var contenedor = "<?php echo $contenedor; ?>";  
    var aerosSeleccionados = "<?php echo $aerosG; ?>";
    aerosSeleccionados = aerosSeleccionados.split(",");
    var vientos = "<?php echo $StrV;?>";
    var medias = "<?php echo $StrM;?>";
    var desviaciones = "<?php echo $StrD;?>";
    vientos = vientos.split("|");
    medias = medias.split("|");
    desviaciones = desviaciones.split("|");
    
    
    var arrayV = [];
    var arrayM = [];
    var arrayD = [];

    var arrayRAux = [];
    var arrayMAux = [];
    var arraySRAux = [];
    var arraySMAux = [];

    var arrayMV = [];
    var arrayMD = [];
    var arrayMM = [];
    
    var rangos = [];
    var seriesMedias = [];
    
    if(medias==""){
        $.post('http://localhost/EolicEventConsumer/error/datosInexistentes',
        function(data) {
            variable = data;

            $("#"+"<?php echo $contenedor ?>").html(data);
        });
    }else{
    /* Preparamos un array con las series de datos:
     * seriesMedias:  [[binViento,media],[binViento2,media2],[binViento3,media3]] 
     * seriesRangos:  [[binViento,infimo,maximo],[binViento2,infimo3,maximo3],[binViento3,infimo3,maximo3]] 
     * El conjunto de la serie corresponde a un aerogenerador, es decir... las coleeciones de los pares binViento y desviacion */
        for(var i=0; i<vientos.length;i++){      
            arrayMV = vientos[i].split(',');
            arrayMD = desviaciones[i].split(',');
            arrayMM = medias[i].split(',');

            for(var j=0; j<arrayMV.length;j++){
                media = parseFloat(arrayMM[j]);
                viento = parseFloat(arrayMV[j]);
                desviacion = parseFloat(arrayMD[j]);

                arrayRAux.push(viento);
                arrayRAux.push(media-desviacion);
                arrayRAux.push(media+desviacion);
                arraySRAux.push(arrayRAux);

                arrayMAux.push(viento);
                arrayMAux.push(media);

                arraySMAux.push(arrayMAux);

                arrayRAux = [];
                arrayMAux = [];
            }
            rangos.push(arraySRAux);
            seriesMedias.push(arraySMAux);
            arraySRAux = [];
            arraySMAux= [];
        }
        /* Preparo el estilo de las series para que el estilo de la gráfica sea el adecuado*/
        var series = [];
        for(var i=0; i<rangos.length;i++){
            var primero = {
                name:  aerosSeleccionados[i],
                data: seriesMedias[i],
                zIndex: 1,
                marker: {
                    fillColor: 'white',
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[i]
                }
            }
            var segundo = {
                name: "Dominio de "+ aerosSeleccionados[i],
                data: rangos[i],
                type: 'arearange',
                lineWidth: 0,
                linkedTo: ':previous',
                color: Highcharts.getOptions().colors[i],
                fillOpacity: 0.3,
                zIndex: 0,
                marker: {
                    enabled: false
                }
            }
            series.push(primero);
            series.push(segundo);

        }

        /*Cargo del grafico en el contenedor especificado */
        Highcharts.chart(contenedor, {
              chart: {
                        zoomType : 'xy'
                    },

            title: {
                text: 'Curva de Potencia'
            },

            xAxis: {
                type: [0,20],
                title: {
                    text: "Bin de viento (m/s)"
                }
            },

            yAxis: {
                title: {
                    text: "Potencia producida (KW/h)"
                }
            },

            tooltip: {
                crosshairs: true,
                shared: true,
                valueSuffix: ' KW/h'
            },

            legend: {
            },

            series: series
        });

    }
    



</script>

