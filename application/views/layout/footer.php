  <!-- /.content-wrapper -->
  <footer class="main-footer">
      <div class="pull-right hidden-xs">
          <b>Version</b> 2.4.18
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
      reserved.
  </footer>


  <!-- jQuery 3 -->
  <script src="<?= base_url('assets'); ?>/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?= base_url('assets'); ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url('assets'); ?>/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets'); ?>/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?= base_url('assets'); ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url('assets'); ?>/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('assets'); ?>/dist/js/demo.js"></script>
  <!-- page script -->
  <!-- script download -->
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
];

const data = {
    labels: labels,
    datasets: [{
        label: 'My First dataset',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: [0, 10, 5, 2, 20, 30, 45],
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {}
};
  </script>


  <script>
$(function() {
    $('#example1').DataTable()
    $('#example2').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
    })
    $('#example3').DataTable({
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdf',
                className: 'btn btn-danger'
            },
            {
                extend: 'print',
                className: 'btn btn-warning'
            },
        ]
    })

})
  </script>

  <?php if ($this->uri->segment(2) == "capaian") { ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script>
var tahun = [];
var capaian = [];
<?php
            foreach ($hasil_capaian as $value) { ?>
tahun.push(<?= $value->tahun ?>);
capaian.push(<?= $value->capaian ?>);
<?php            }
            ?>

var xValues = tahun;
var yValues = capaian;
var barColors = ["dark", "green", "blue", "orange", "brown", "red", "silver", "lime", "navy", "bisque"];
var judul = '<?= ucwords(strtolower($hasil_capaian[0]->uraian)); ?>';

new Chart("myChart", {
    type: "bar",
    data: {
        labels: xValues,
        datasets: [{
            backgroundColor: barColors,
            data: yValues
        }]
    },
    options: {
        legend: {
            display: false
        },
        title: {
            display: true,
            text: judul
        }
    }
});
  </script>

  <?php } ?>
  </body>

  </html>