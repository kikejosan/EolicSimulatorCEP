<li class="header" id="headerNotificaciones">Tienes <?php echo $total; ?> notificaciones en total </li>
    <li>
      <!-- inner menu: contains the actual data -->
      <ul class="menu">
        <li>
          <a>
            <i class="fa fa-exclamation-circle text-red"></i> <?php echo $fueras; ?> alertas por Outliers peligrosos
          </a>
        </li>
        <li>
          <a>
            <i class="fa fa-exclamation-circle text-red"></i> <?php echo $transicions; ?> bajadas drásticas en el ranking
          </a>
        </li>
        <li>
          <a>
            <i class="fa fa-exclamation-circle text-red"></i> <?php echo $bajadasD; ?> alertas por gran dispersión de datos
          </a>
        </li>
        <li>
          <a>
            <i class="fa fa-exclamation-circle text-red"></i> <?php echo $bajadasM; ?> bajadas de rendimiento drásticas
          </a>
        </li>
      </ul>
    </li>
<li class="footer"><a href="http://localhost/EolicEventConsumer/notificacions/mostrarNotificacions">Más información</a></li>

<script>
    /* Inclusión del número total de notificaciones en el nav-top*/
    $('#totalNotificaciones').html("<?php echo $total; ?>")
</script>

