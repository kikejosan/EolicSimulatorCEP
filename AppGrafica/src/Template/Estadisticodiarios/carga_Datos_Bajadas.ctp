<table id="<?php echo $contenedor; ?>"  class="table table-bordered table-striped" >
    <thead>
    <tr style="background-color: #c2c2bc">
      <th style="text-align: center;">SystemNumber</th>
      <th style="text-align: center;">Bin de viento (m/s)</th>
      <th style="text-align: center;">Inicio</th>
      <th style="text-align: center;">Media Inicio (KW/h)</th>
      <th style="text-align: center;">Fin</th>
      <th style="text-align: center;">Media Fin (KW/h)</th>
    </tr>
    </thead>
    <tbody>                              
        <?php foreach ($bajadas as $bajada) :?>
        <tr>
            <td style="text-align: center;"><?php echo $bajada['systemNumber1']?></td>
            <td style="text-align: center;"><?php echo $bajada['viento1']?></td>
            <td style="text-align: center;"><?php echo $bajada['fecha1']?></td>
            <td style="text-align: center;"><?php echo round($bajada['media1'],2)?></td>
            <td style="text-align: center;"><?php echo $bajada['fecha2']?></td>
            <td style="text-align: center;"><?php echo round($bajada['media2'],2)?></td>
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