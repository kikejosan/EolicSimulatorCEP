<table id="<?php echo $contenedor; ?>"  class="table table-bordered table-striped" >
    <thead>
        <tr style="background-color: #c2c2bc">
            <th style="text-align: center;">SystemNumber</th>
            <th style="text-align: center;">Bin de viento (m/s)</th>
            <th style="text-align: center;">Fecha</th>
            <th style="text-align: center;">Nº Outliers</th>
            <th style="text-align: center;">Media (KW/h)</th>
            <th style="text-align: center;">Desviación típica (KW/h)</th>
        </tr>
    </thead>
    <tbody>                              
        <?php foreach ($totalFueras as $unoF) :?>
        <tr>
            <td style="text-align: center;"><?php echo $unoF['systemNumber']?></td>
            <td style="text-align: center;"><?php echo $unoF['viento']?></td>
            <td style="text-align: center;"><?php echo $unoF['fecha']?></td>
            <td style="text-align: center;"><?php echo $unoF['vecesFuera']?></td>
            <td style="text-align: center;"><?php echo round($unoF['media'],2)?></td>
            <td style="text-align: center;"><?php echo round($unoF['desviacion'],2)?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    /* Inicialización del datetable en el contenedor especificado por parámetro */
    $("#"+"<?php echo $contenedor; ?>").DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ entradas por pagina",
            "zeroRecords": "Nada que mostrar - Lo siento",
            "info": "Enseñando página _PAGE_ de _PAGES_",
            "infoEmpty": "Ninguna entrada disponible",
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
</script>