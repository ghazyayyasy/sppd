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
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="exampler" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama Pegawai</th>
                  <th>Golongan</th>
                  <th>Jabatan</th>   
                </tr>
                </thead>
                <tbody>
                <?php
                     $no=1 ;
                     foreach($pegawai as $pegawai) {
                     ?>
                    <tr>
                      <td><?=$no?></td>
                      <td><?=$pegawai->nip?></td>
                      <td><?=$pegawai->nama_pegawai?></td>
                      <td><?=$pegawai->nama_gp?></td>
                      <td><?=$pegawai->nama_profesi?></td>
                    </tr>
                    <?php
                    $no++;
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
  $(function (){
    $('#exampler').DataTable()
  });
</script>

</body>
</html>
