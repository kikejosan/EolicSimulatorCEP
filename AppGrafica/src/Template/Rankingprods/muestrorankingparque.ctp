<?php foreach ($rankingAux as $rankin) :?>
    <tr>
        <td><?php echo $rankin['systemNumber']//." | ".$rankin['productividad']?></td>
    </tr>
<?php endforeach; ?>
<script> seguimiento();</script>