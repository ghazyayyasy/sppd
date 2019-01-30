<!DOCTYPE html>
<html>
<head>
   <?php $this->load->view("_partials/head.php") ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
      <?php $this->load->view("_partials/header.php") ?>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <?php $this->load->view("_partials/sidebar.php") ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Statistik Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <!-- Info boxes -->
       <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-hourglass"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><h4>Pengajuan Keuangan</h4></span>
              <span class="info-box-number"><?=$belumcair?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

       
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-thumbs-up"></i></span>
            <div class="info-box-content">
              <span class="info-box-text"><h4>Keuangan Diterima</h4></span>
              <span class="info-box-number"><?=$sdmpusat?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

       
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-check-circle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><h4>Selesai</h4></span>
              <span class="info-box-number"><?=$selesai?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data SPPD</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No SPPD</th>
                  <th>Nama Pegawai</th>
                  <th>Tanggal Berangkat</th>
                  <th>Tanggal Pulang</th>
                  <th>Maksud</th>
                  <th>Kota Tujuan</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                     $no=1 ;
                     foreach($sppd as $s) {
                     ?>
                    <tr>
                      <td><center><b><?=$s->no_sppd?></b></center></td>
                      <td><?=$s->nama_pegawai?></td>
                      <td><?=date_indo($s->tgl_berangkat)?></td>
                      <td><?=date_indo($s->tgl_berakhir)?></td>
                      <td><?=$s->maksud?></td>
                      <td><?=$s->rute?></td>
                      <td style="text-align: center;">
                      <?php
                      if ($s->status == 'Selesai') {
                      ?>
                        <span class="badge label-success">Selesai</span>
                      <?php
                      } elseif ($s->status == 'Masuk Keuangan') {
                      ?>
                        <span class="badge label-danger">Keuangan Diterima</span>
                      <?php
                      } elseif ($s->status == 'Pengajuan ke SDM Pusat') {
                      ?>
                        <span class="badge" style="background-color: #00bfbf">Pengajuan Keuangan</span>
                      <?php
                      }
                      ?>
                      </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

        
    </section>
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->



  <!-- dashboard hightlight information SPPD -->

  
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">  
    </div>
    <strong>Copyright &copy; Magangers KOMINFO Kebumen 2019</strong>
  </footer>
</div>
  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->


<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/')?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/')?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/')?>dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/')?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo base_url('assets/')?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets/')?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/')?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/')?>bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/')?>dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/')?>dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/')?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/')?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()

  })
</script>

</body>
</html>
<script>
    var url = window.location;
// Will only work if string in href matches with location
    $('.sidebar-menu a[href="'+ url +'"]').parent().addClass('active');

// Will also work for relative and absolute hrefs
    $('.sidebar-menu a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
</script>