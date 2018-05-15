<div class="box-body box-profile">
    <img src="/EolicEventConsumer/admin_l_t_e/img/aerogenerador.jpg" class="profile-user-img img-responsive img-circle" alt="User profile picture">
    <h3 class="profile-username text-center"><?php echo $miAero["idIngeboards"];?></h3>

    <p class="text-muted text-center">Información básica</p>

    <ul class="list-group list-group-unbordered">
      <li class="list-group-item">
          <b>Parque</b> <a class="pull-right"><?php echo $miAero["id_parque"];?></a>
      </li>
      <li class="list-group-item">
        <b>idDB</b> <a class="pull-right"><?php echo $miAero["id"];?></a>
      </li>
      <li class="list-group-item">
        <b>SystemNumber</b> <a class="pull-right"><?php echo $miAero["SystemNumber"];?></a>
      </li>
      <li class="list-group-item">
        <b>idIngeboards</b> <a class="pull-right"><?php echo $miAero["idIngeboards"];?></a>
      </li>
      <li class="list-group-item">
        <b>Localizacion</b> <a class="pull-right"><?php echo $miAero["fila"]."||".$miAero["columna"];?></a>
      </li>
    </ul>
</div>