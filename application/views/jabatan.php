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
        Data Jabatan Pegawai
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Jabatan Pegawai</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
            <div class="col-sm-12">
              <div class="panel-body">
                <a href="#modalTambahData" data-toggle="modal" class="btn btn-primary">
                  <i class="fa fa-plus"></i> Tambah Data
                </a>
              </div>
              <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalTambahData" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                      <h4 class="modal-title">Tambah Data Jabatan</h4>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" role="form" method="post" action="<?=base_url('jabatan/TambahJabatan')?>">
                        <div class="form-group">
                          <label class="col-lg-3 col-sm-3 control-label">Nama Jabatan</label>
                          <div class="col-lg-9">
                            <input type="text" name="namaJabatan" id="namaJabatan" class="form-control" placeholder="Nama Jabatan" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-offset-3 col-lg-9">
                            <button type="submit" class="btn btn-primary" name="tambah" value="tambah">Kirim</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
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
                          <th width="10%">No</th>
                          <th>Nama Jabatan</th>
                          <th width="20%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $d) {
                        ?>
                        <tr>
                          <td><?=$no++?></td>
                          <td><?=$d->nama_jabatan?></td>
                          <td style="text-align: center">
                            <a href="#modalEditData<?=$d->id_jabatan?>" data-toggle="modal" class="btn btn-warning btn-sm">
                              <i class="fa fa-edit"></i> Edit
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="hapusData('<?=$d->id_jabatan?>')"><i class="fa fa-trash-o"></i> Hapus</button>
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
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalEditData<?=$d->id_jabatan?>" class="modal fade">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                <h4 class="modal-title">Edit Data Jabatan</h4>
                              </div>
                              <div class="modal-body">
                                <form class="form-horizontal" role="form" method="post" action="<?=base_url('jabatan/EditJabatan/'.$d->id_jabatan)?>">
                                  <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label">Nama Jabatan</label>
                                    <div class="col-lg-9">
                                      <input type="text" name="namaJabatan" id="namaJabatan" class="form-control" placeholder="Nama Jabatan" value="<?=$d->nama_jabatan?>" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-9">
                                      <button type="submit" class="btn btn-primary" name="edit" value="edit">Update</button>
                                    </div>
                                  </div>
                                </form>
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
          <!-- /.box -->
        <!-- /.col -->
    

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
  $(function (){
    $('#dynamic-table').DataTable()
  });
        window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
          $(this).remove(); 
        });
      }, 2000);

</script>
<script>
     function hapusData(id) {
        $.ajax({
          url     : "<?=base_url()?>jabatan/AjaxJabatan",
          method  : "post",
          data    : {id:id},
          success : function(data) {
            swal({
              title               : "Apakah Anda Yakin?",
              text                : 'Anda Ingin Menghapus Jabatan "'+data+'"?',
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
                  window.location.href = "<?=base_url()?>jabatan/HapusJabatan/"+id;
                });
              }
            });
          }
        });
      }
</script>

</body>
</html>
<script>

var url = window.location;
// Will only work if string in href matches with location
$('.treeview-menu a[href="'+ url +'"]').parent().addClass('active');

// Will also work for relative and absolute hrefs
$('.treeview-menu a').filter(function() {
return this.href == url;
}).parent().addClass('active');
</script>