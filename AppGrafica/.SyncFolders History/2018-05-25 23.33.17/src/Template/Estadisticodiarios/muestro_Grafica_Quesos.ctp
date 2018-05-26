<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Gráficos de los puntos fuera del intervalo de confianza</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">            
              
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Seleccione un bin de viento<span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <?php foreach($vientosPHP as $viento):?>
                  <li role="presentation">
                      <a role="menuitem" tabindex="-1" href="<?php echo '#tab_'.hash('ripemd160', $viento);?>" data-toggle="tab"><?php echo $viento ?></a>
                  </li>
                  <?php endforeach;?>
                </ul>
              </li>              
            </ul>
            <div class="tab-content">
                <?php foreach($vientosPHP as $viento):?>
                <?php if($vientosPHP[0] == $viento){ ?>
                    <div class="tab-pane active" id="<?php echo 'tab_'.hash('ripemd160', $viento)?>"><?php echo $viento;?></div>
                <?php }else{ ?>
                    <div class="tab-pane" id="<?php echo 'tab_'.hash('ripemd160', $viento)?>"><?php echo $viento;?></div>
                <?php }                                
               endforeach;?>
            </div>
        </div>
        
    </div>
</div>

<script>
    var contenedores = "<?php echo $contenedores?>";
    contenedores = contenedores.split(',');
    var fuerasStr = "<?php echo $fuerasStr?>";
    fuerasStr = fuerasStr.split(':');
    var vientosF = "<?php echo $vientosF ?>"
    vientosF = vientosF.split(',');
    var vientoIntervalo = [];
    var vientoAuxSimple = [];
    var conjuntoSimple =[];
    var conjuntoCompuesto =[];
    var conjunto = [];
    var systemNumber = 0.0;
    var vecesFuera = 0;
    var clasificador = { };

    for(var i=0; i<fuerasStr.length; i++){
        vientoIntervalo = fuerasStr[i].split('|');
        for(var j=0;j<vientoIntervalo.length;j++){
            
            vientoAuxSimple = vientoIntervalo[j].split(',');
            systemNumber = parseFloat(vientoAuxSimple[0]);
            vecesFuera = parseInt(vientoAuxSimple[1]);
            
            conjuntoSimple.push(systemNumber);
            conjuntoSimple.push(vecesFuera);
            clasificador = { name: systemNumber, y: vecesFuera };

            conjuntoCompuesto.push(clasificador);
            conjuntoSimple = [];
        }
        conjunto.push(conjuntoCompuesto);
        conjuntoCompuesto =[];
    }
    //crearGrafico(vientosF[1]+"Cheese",conjunto[12],vientosF[12]);
    for(var i=0;i<vientosF.length;i++){
        crearGrafico("tab_"+contenedores[i],conjunto[i],vientosF[i]);
    }
function crearGrafico(contenedor,dataSerie,bin){
    
Highcharts.chart(contenedor, {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: "Bin "+bin+" m/s"
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.y} puntos  de {point.total}</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.y} veces',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                },
                connectorColor: 'silver'
            }
        }
    },
    series: [{
        name: 'Puntos fuera',
        data: dataSerie
    }]
});

}    
    
    
    

// Build the chart

    
    


</script>