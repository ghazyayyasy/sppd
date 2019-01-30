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
        Data Pegawai
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pegawai</li>
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
                      <h4 class="modal-title">Tambah Data Pegawai</h4>
                    </div>
                    <div class="modal-body">
                      <form class="form-horizontal" role="form" id="urlTambah" method="post" action="<?=base_url('pegawai/TambahPegawai')?>">
                        <div class="form-group">
                          <label class="col-lg-3 col-sm-3 control-label">NIP</label>
                          <div class="col-lg-9">
                            <input type="text" name="NIP" id="NIP" class="form-control" placeholder="NIP" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-3 col-sm-3 control-label">Nama Pegawai</label>
                          <div class="col-lg-9">
                            <input type="text" name="namaPegawai" id="namaPegawai" class="form-control" placeholder="Nama Pegawai" required>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-3 col-sm-3 control-label">Jabatan</label>
                          <div class="col-lg-9">
                            <select name="idJabatan" id="idJabatan" class="form-control" required>
                              <option value="" disabled selected>- Pilih Jabatan -</option>
                              <?php
                              foreach ($jabatan as $d) {
                              ?>
                              <option value="<?=$d->id_jabatan?>"><?=$d->nama_jabatan?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-3 col-sm-3 control-label">GP</label>
                          <div class="col-lg-9">
                            <select name="idGP" id="idGP" class="form-control" required>
                              <option value="" disabled selected>- Pilih GP -</option>
                              <?php
                              foreach ($gp as $d) {
                              ?>
                              <option value="<?=$d->id_gp?>"><?=$d->nama_gp?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div id="alert-msg"> </div>
                        <div class="form-group">
                          <div class="col-lg-offset-3 col-lg-9">
                            <button type="submit" class="btn btn-primary" id="addButton" name="tambah" value="tambah">Kirim</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              if ($this->session->flashdata('message')) {
              ?>
              <div class="alert alert-success clearfix">
                <div class="noti-info">
                  <a href="#"><?=$this->session->flashdata('message')?></a>
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
                          <th>NIP</th>
                          <th>Nama Pegawai</th>
                          <th>Jabatan</th>
                          <th>Golongan</th>
                          <th width="20%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($pegawai as $d) {
                        ?>
                        <tr>
                          <td><?=$no++?></td>
                          <td><?=$d->nip?></td>
                          <td><?=$d->nama_pegawai?></td>
                          <td><?=$d->nama_jabatan?></td>
                          <td><?=$d->nama_gp?></td>
                          <td style="text-align: center">
                            <a href="#modalEditData<?=$d->nip?>" data-toggle="modal" class="btn btn-warning btn-sm">
                              <i class="fa fa-edit"></i> Edit
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" onclick="hapusData('<?=$d->nip?>')"><i class="fa fa-trash-o"></i> Hapus</button>
                          </td>
                        </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                    <?php
                    foreach ($pegawai as $d) {
                    ?>
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalEditData<?=$d->nip?>" class="modal fade edit">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                <h4 class="modal-title">Edit Data Pegawai</h4>
                              </div>
                              <div class="modal-body">
                                <form class="form-horizontal" id="urlEdit" role="form" method="post" action="<?=base_url('pegawai/EditPegawai/'.$d->nip)?>">
                                  <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label">NIP</label>
                                    <div class="col-lg-9">
                                      <input type="text" name="NIP3" id="NIP3" class="form-control" placeholder="NIP" value="<?=$d->nip?>" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label">Nama Pegawai</label>
                                    <div class="col-lg-9">
                                      <input type="text" name="namaPegawai3" id="namaPegawai3" class="form-control" placeholder="Nama Pegawai" value="<?=$d->nama_pegawai?>" required>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label">Jabatan</label>
                                    <div class="col-lg-9">
                                      <select name="idJabatan3" id="idJabatan3" class="form-control" required>
                                        <option>- Pilih Jabatan -</option>
                                        <?php
                                        foreach ($jabatan as $p) {
                                          if ($d->id_jabatan == $p->id_jabatan) {
                                          ?>
                                          <option value="<?=$p->id_jabatan?>" selected><?=$p->nama_jabatan?></option>
                                          <?php
                                          } else {
                                          ?>
                                          <option value="<?=$p->id_jabatan?>"><?=$p->nama_jabatan?></option>
                                          <?php
                                          }
                                        ?>
                                        <?php
                                        }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="col-lg-3 col-sm-3 control-label">GP</label>
                                    <div class="col-lg-9">
                                      <select name="idGP3" id="idGP3" class="form-control" required>
                                        <option>- Pilih GP -</option>
                                        <?php
                                        foreach ($gp as $g) {
                                          if ($d->id_gp == $g->id_gp) {
                                          ?>
                                          <option value="<?=$g->id_gp?>" selected><?=$g->nama_gp?></option>
                                          <?php
                                          } else {
                                          ?>
                                          <option value="<?=$g->id_gp?>"><?=$g->nama_gp?></option>
                                          <?php
                                          }
                                        ?>
                                        <?php
                                        }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="percobaanEdit"></div>
                                  <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-9">
                                      <button type="submit" class="btn btn-primary edit" name="edit" value="edit">Update</button>
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
          url     : "<?=base_url()?>pegawai/AjaxPegawai",
          method  : "post",
          data    : {id:id},
          success : function(data) {
            swal({
              title               : "Apakah Anda Yakin?",
              text                : 'Anda Ingin Menghapus Pegawai "'+data+'"?',
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
                  window.location.href = "<?=base_url()?>pegawai/HapusPegawai/"+id;
                });
              }
            });
          }
        });
      }
</script>
<script type="text/javascript">
$('#addButton').click(function() {// aku nggawe iki sedino nggliyeng :(

    var urlTambah = document.getElementById("urlTambah").action;
    console.log(urlTambah);
    var form_data = {
        NIP: $('#NIP').val(),
        namaPegawai: $('#namaPegawai').val(),
        idJabatan: $('#idJabatan').val(),
        idGP: $('#idGP').val()
    };
    $.ajax({
        url: "<?php echo base_url('pegawai/tambahPegawai'); ?>",
        type: 'POST',
        data: form_data,
        success: function(msg) {
            // if (msg == 'YES')
            //     $('#alert-msg').html('<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
            // else if (msg == 'NO')
            //     $('#alert-msg').html('<div class="alert alert-danger text-center">Error in sending your message! Please try again later.</div>');
            // else
            if (msg == "Sukses"){
              location.reload();
            }
            else{
                $('#alert-msg').html('<div class="alert alert-danger">' + msg + '</div>');
            }
        }
    });
    return false;
});
</script>
<script type="text/javascript">
// var editButton = document.getElementsByTagName("")
$('.btn.btn-primary.edit').click(function() {// aku nggawe iki sedino nggliyeng :(
    // event.stopPropagation();
    // event.stopImmediatePropagation();
    var cek = document.getElementsByClassName("btn btn-primary edit");
    console.log(cek);

    var urlEdit = document.getElementById("urlEdit").action;
    console.log(urlEdit);
    var form_data = {
        NIP: $('#NIP3').val(),
        namaPegawai: $('#namaPegawai3').val(),
        idJabatan: $('#idJabatan3').val(),
        idGP: $('#idGP3').val()
    };
    $.ajax({
        url: urlEdit,
        type: 'POST',
        data: form_data,
        success: function(msg) {
            // if (msg == 'YES')
            //     $('#alert-msg').html('<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
            // else if (msg == 'NO')
            //     $('#alert-msg').html('<div class="alert alert-danger text-center">Error in sending your message! Please try again later.</div>');
            // else
            if (msg == "Sukses"){
              location.reload();
            }
            else{
                $('.percobaanEdit').html('<div class="alert alert-danger">' + msg + '</div>');
            }
        }
    });
    return false;
});
</script>
<script>
    $('.modal.fade.edit').on('hidden.bs.modal', function () {
    // do something…
    $( ".alert.alert-danger" ).remove();
})
</script>
</body>
</html>
<script> // buat sidebar active 
    var url = window.location;
    // Will only work if string in href matches with location
    $('.treeview-menu a[href="'+ url +'"]').parent().addClass('active');

    // Will also work for relative and absolute hrefs
    $('.treeview-menu a').filter(function() {
    return this.href == url;
    }).parent().addClass('active');
</script>

    <script>
    var url = window.location;
// Will only work if string in href matches with location
    $('.sidebar-menu a[href="'+ url +'"]').parent().addClass('active');

// Will also work for relative and absolute hrefs
    $('.sidebar-menu a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
    </script>