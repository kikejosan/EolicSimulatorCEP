<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<h1>Primer Layout</h1>

<div class="container-fluid text-center">
    <div class="row">
        <div class="col-md-2"  style="background-color: #08f7db">
            <div class="form-group">
                  <label>Parque</label>
                  <select class="form-control">
                    <?php foreach($parques as $parque): ?>
                        <option><?php echo $parque['Nombre']; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <br>
                  <label>Seguimiento del aero: </label>
                  <select class="form-control" >
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
            </div>
            <button type="button" class="btn btn-block btn-primary">Seguimiento</button>
            <br>
            
        </div>
        <div class="col-md-10" id="tablasRank" style="background-color: #FFC600">
            Tabla de los ranking
            
            <div class="container-fluid" >
                <div class="col-md-3">
                <table class="table table-bordered">
                    <thead style="text-align:  center">
                        <tr>
                            <div class="form-group">
                                <label>Ranking del día:</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" id="datepicker1">
                                </div>
                            </div>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aeros as $aero) :?>
                        <tr>
                            <td><?php echo $aero['idIngeboards']?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <div class="form-group">
                                <label>Ranking del día:</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" id="datepicker2">
                                </div>
                            </div>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aeros as $aero) :?>
                        <tr>
                            <td><?php echo $aero['idIngeboards']?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <div class="form-group">
                                <label>Ranking del día:</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" id="datepicker3">
                                </div>
                            </div>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aeros as $aero) :?>
                        <tr>
                            <td><?php echo $aero['idIngeboards']?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <div class="form-group">
                                <label>Ranking del día:</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" id="datepicker4">
                                </div>
                            </div>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($aeros as $aero) :?>
                        <tr>
                            <td><?php echo $aero['idIngeboards']?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            </div>
            
                
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-8">
            Gráfico aquí
        </div>
        <div class="col-md-4">
            Información del aerogenerador ticado
        </div>
    </div>
</div>

<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Date picker</h3>
            </div>
            <div class="box-body">
              <!-- Date -->
              <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date range -->
              <div class="form-group">
                <label>Date range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date and time range -->
              <div class="form-group">
                <label>Date and time range:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservationtime">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date and time range -->
              <div class="form-group">
                <label>Date range button:</label>

                <div class="input-group">
                  <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <span>
                      <i class="fa fa-calendar"></i> Date range picker
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
              </div>
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>

<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
    $('#datepicker1').datepicker({
      autoclose: true
    });
    $('#datepicker2').datepicker({
      autoclose: true
    });
    $('#datepicker3').datepicker({
      autoclose: true
    });
    $('#datepicker4').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<?php $this->end(); ?>



