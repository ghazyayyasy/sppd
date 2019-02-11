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
        Data SPPD
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data SPPD</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
            <div class="col-sm-12">
              <div class="panel-body">
                <a href="<?=base_url('datasppd/tambahsppd')?>" data-toggle="modal" class="btn btn-primary">
                  <i class="fa fa-plus"></i> Tambah SPPD
                </a>
              </div>
              <?php
              if ($this->session->flashdata('pesan')) {
              ?>
              <div class="alert alert-success clearfix">
                <div class="noti-info">
                  <a href="#"><?=$this->session->flashdata('pesan')?></a>
                </div>
              </div>
              <?php
              }
              ?>
            </div>
            <div class="col-sm-12">
              <section class="panel">
                <div class="panel-body">
                  <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="dynamic-table">
                      <thead>
                        <tr>
                          <th width="7%">No</th>
                          <th>Nama Pegawai</th>
                          <th>Tanggal Berangkat</th>
                          <th>Tanggal Berakhir</th>
                          <th>Keperluan</th>
                          <th>Rute</th>
                          <th>Total Biaya</th>
                          <th width="20%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $d) {
                        ?>
                        <tr>
                          <td><center><b><?=$d->no_sppd?></b></center></td>
                          <td><?=$d->nama_pegawai?></td>
                          <td><?=date_indo($d->tgl_berangkat)?></td>
                          <td><?=date_indo($d->tgl_berakhir)?></td>
                          <td><?=$d->maksud?></td>
                          <td><?=$d->rute?></td>
                          <td>Rp <?= number_format($d->jumlah_biaya, 0, '', '.')?></td>
                          <td style="text-align: center">
                            <a href="#view-<?=$d->no_sppd?>" data-toggle="modal" class="btn btn-success btn-sm">
                              <i class="fa fa-eye"></i> 
                            </a>
                            <a href="<?=base_url('datasppd/CetakSPPD/'.$d->no_sppd)?>" target="_blank" class="btn btn-primary btn-sm">
                              <i class="fa fa-print"></i>
                            </a>
                            <a href="<?=base_url('datasppd/EditSPPD/'.$d->no_sppd)?>" class="btn btn-warning btn-sm">
                              <i class="fa fa-edit"></i> 
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="hapusData('<?=$d->no_sppd?>')"><i class="fa fa-trash-o"></i> </button>
                          </td>
                        </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    <?php
                    foreach ($data as $d) {
                    ?>
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="view-<?=$d->no_sppd?>" class="modal fade">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                            <center><h4 class="modal-title">Detail SPPD</h4></center>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label style="font-weight: bold;">Nomor SPPD</label>
                                  <p><?=$d->no_sppd?></p>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label style="font-weight: bold;">Nama</label>
                                  <p><?=$d->nama_pegawai?></p>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label style="font-weight: bold;">Tanggal Berangkat</label>
                                  <p><?=date_indo($d->tgl_berangkat)?></p>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label style="font-weight: bold;">Tanggal Berakhir</label>
                                  <p><?=date_indo($d->tgl_berakhir)?></p>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label style="font-weight: bold;">Transportasi Berangkat</label>
                                  <p><?=$d->transport_berangkat?></p>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label style="font-weight: bold;">Transportasi Pulang</label>
                                  <p><?=$d->transport_pulang?></p>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label style="font-weight: bold;">Biaya Transportasi Berangkat</label>
                                  <p>Rp <?=number_format($d->biaya_pergi, 0, '', '.')?></p>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label style="font-weight: bold;">Biaya Transportasi Pulang</label>
                                  <p>Rp <?=number_format($d->biaya_pulang, 0, '', '.')?></p>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label style="font-weight: bold;">Rute Perjalanan</label>
                                  <p><?=$d->rute?></p>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label style="font-weight: bold;">Pembuat SPPD</label>
                                  <p><?=$d->pembuat_daftar?></p>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label style="font-weight: bold;">Tarif GP</label>
                                  <p>Rp <?=number_format($d->tarif, 0, '', '.')?></p>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label style="font-weight: bold;">Total Biaya</label>
                                  <p>Rp <?=number_format($d->jumlah_biaya, 0, '', '.')?></p>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label style="font-weight: bold;">Maksud</label>
                                  <p><?=$d->maksud?></p>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label style="font-weight: bold;">Status</label>
                                  <p><?=$d->status?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                    }
                    ?>
                  </div>
                </div>
              </section>
            </div>
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
<script src="<?=base_url('assets/')?>js/sweetalert/sweetalert.min.js"></script>
<script>
  $(function () {
    $('#dynamic-table').DataTable()
  })
  window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
        });
      }, 2000);
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
<script>
      function hapusData(id) {
        $.ajax({
          url     : "<?=base_url()?>datasppd/AjaxSPPD",
          method  : "post",
          data    : {id:id},
          success : function(data) {
            swal({
              title               : "Apakah Anda Yakin?",
              text                : 'Anda Ingin Menghapus SPPD Nomor"'+data+'"?',
              type                : "warning",
              showCancelButton    : true,
              confirmButtonColor  : "#DD6B55",
              confirmButtonText   : "Ya",
              cancelButtonText    : "Tidak",
              closeOnConfirm      : false,
              closeOnCancel       : true
            },
            function (isConfirm) {
              if (isConfirm) {
                swal({
                  title             : "Dihapus!",
                  text              : "Data Sukses Dihapus.",
                  timer             : 1500,
                  type              : "success",
                  showConfirmButton : false
                }, function () {
                  window.location.href = "<?=base_url()?>datasppd/HapusSPPD/"+id;
                });
              }
            });
          }
        });
      }
</script>