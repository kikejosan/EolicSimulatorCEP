<?php foreach ($rankingAux as $rankin) :?>
    <tr>
        <td><?php echo $rankin['systemNumber']//." | ".$rankin['productividad']?></td>
    </tr>
<?php endforeach; ?>
    
    <script>
        /*Muestro el ranking y lo actualizo con el aerogenerador a seguir en caso de haber alguno seleccionado*/
        seguimiento($("#globalSeguir").val());
    </script>