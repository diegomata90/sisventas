<!--------------------------
        | Your Page Content Here |
        -------------------------->


  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Diego Mata</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <!-- <?php //require 'app/views/Main/sidebar.php'; ?>-->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->


<!-- Bootstrap 3.3.7 -->
<script src="<?= PATH_ASSETS . '/bower_components/bootstrap/dist/js/bootstrap.min.js' ?>"></script>

<!-- DataTables -->
<script src="<?= PATH_ASSETS . '/bower_components/datatables.net/js/jquery.dataTables.min.js' ?>"></script>
<script src="<?= PATH_ASSETS . '/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js' ?>"></script>

<!-- SlimScroll -->
<script src="<?= PATH_ASSETS . '/bower_components/jquery-slimscroll/jquery.slimscroll.min.js' ?>"></script>

<!-- FastClick -->
<script src="<?= PATH_ASSETS . '/bower_components/fastclick/lib/fastclick.js' ?>"></script>

<!-- AdminLTE App -->
<script src="<?= PATH_ASSETS . '/dist/js/adminlte.min.js' ?>"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?= PATH_ASSETS . '/dist/js/demo.js' ?>"></script>

<!-- FLOT CHARTS -->
<script src="<?= PATH_ASSETS . '/bower_components/Flot/jquery.flot.js' ?>"></script>

<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?= PATH_ASSETS . '/bower_components/Flot/jquery.flot.resize.js' ?>"></script>

<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?= PATH_ASSETS . '/bower_components/Flot/jquery.flot.pie.js' ?>"></script>

<!-- Bootstrap Sect  -->
<script src="<?= PATH_ASSETS . '/js/bootstrap-select.min.js' ?>"></script>



<script>
  $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [], totalPoints = 100

    function getRandomData() {

      if (data.length > 0)
        data = data.slice(1)

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive', [getRandomData()], {
      grid  : {
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0, // Drawing is faster without shadows
        color     : '#3c8dbc'
      },
      lines : {
        fill : true, //Converts the line chart to area chart
        color: '#3c8dbc'
      },
      yaxis : {
        min : 0,
        max : 100,
        show: true
      },
      xaxis : {
        show: true
      }
    })

    
    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [
      { label: 'Terminado', data: 10, color: '#3c8dbc' },
      { label: 'Faltante', data: 90, color: '#00c0ef' }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>

<!-- Tablas jquery -->
      <script>
  $(function () {
    $('#TablaJquery').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true
    })
  })
</script>

</body>
</html>