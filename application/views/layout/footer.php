  <!-- /.content-wrapper -->
  <footer class="main-footer">
      <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2022 <a href="https://bit.ly/kojolah">Kojolah Sandbox</a>.</strong> All rights
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

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
var tahun = [];
var capaian = [];
<?php
            foreach ($hasil_capaian as $value) { ?>
tahun.push(<?= $value->tahun ?>);
capaian.push(<?= $value->capaian ?>);
<?php            }
            ?>

const labels = tahun;

const data = {
    labels: labels,
    datasets: [{
        label: 'Capaian',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: capaian,
    }]
};

const config = {
    type: 'line',
    data: data,
    options: {}
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
);
  </script>

  <?php } ?>
  </body>

  </html>