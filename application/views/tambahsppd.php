<!DOCTYPE html>
<html>
<head>
   <?php $this->load->view("_partials/head.php") ?>
   <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css"> -->
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
       Form SPPD
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data SPPD</li>
        <li class="active">Form SPPD</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
            <div class="col-sm-12">
              <section class="panel">
                <div class="panel-body">
                  <form role="form" method="post" action="<?=base_url('datasppd/Tambah')?>">
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Nomor SPPD</label>
                          <input type="text" name="noSPPD" id="noSPPD" class="form-control" placeholder="Input Nomor SPPD" value="<?=$no_sppd?>" readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Nama</label>
                          <select name="namaPegawai" id="namaPegawai" class="form-control">
                            <option value="" disabled selected>- Pilih Pegawai -</option>
                            <?php
                            foreach ($pegawai as $p) {
                            ?>
                            <option value="<?=$p->nip?>"><?=$p->nama_pegawai?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Tanggal Berangkat </label>
                          <input type="date" name="tglBerangkat" id="tglBerangkat" class="form-control datepicker" >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Tanggal Berakhir</label>
                          <input type="date" name="tglBerakhir" id="tglBerakhir" class="form-control datepicker">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Transportasi Berangkat</label>
                          <select name="transportBerangkat" id="transportBerangkat" class="form-control">
                            <option>- Pilih Transportasi -</option>
                            <?php
                            foreach ($transportasi as $t) {
                            ?>
                            <option value="<?=$t->id_transportasi?>"><?=$t->nama_transportasi?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Transportasi Pulang</label>
                          <select name="transportPulang" id="transportPulang" class="form-control">
                            <option>- Pilih Transportasi -</option>
                            <?php
                            foreach ($transportasi as $t) {
                            ?>
                            <option value="<?=$t->id_transportasi?>"><?=$t->nama_transportasi?></option>
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Biaya Transportasi Berangkat</label>
                          <input type="text" name="qty" id="qty1" class="form-control" placeholder="Input Biaya Transport Berangkat" onblur="total()">
                          <input type="text" name="biayaTransportBerangkat" id="biayaTransportBerangkat" hidden>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Biaya Transportasi Pulang</label>
                          <input type="text" name="qty" id="qty2" class="form-control" placeholder="Input Biaya Transport Pulang" onblur="total()">
                          <input type="text" name="biayaTransportPulang" id="biayaTransportPulang" hidden>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Rute Perjalanan</label>
                          <input type="text" name="rutePerjalanan" id="rutePerjalanan" class="form-control" placeholder="Input Rute Perjalanan">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Pembuat SPPD</label>
                          <input type="text" name="pembuat" id="pembuat" class="form-control" placeholder="Input Pembuat SPPD">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Tarif GP</label>
                          <input type="text" name="tarifGP" id="tarifGP" class="form-control" placeholder="Rp. " readonly>
                          <input type="text" name="tarifGPangka" id="tarifGPangka" hidden>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Total Biaya</label>
                          <input type="text" name="totalBiaya" id="totalBiaya" class="form-control" placeholder="Rp. " readonly>
                          <input type="number" name="totalBiayaAngka" id="totalBiayaAngka" hidden>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Maksud</label>
                          <textarea name="maksud" id="maksud" class="form-control" placeholder="Input Maksud" rows="5"></textarea>
                        </div>
                      </div>
                      <!-- <div class="col-sm-6"> //  // NEXT BUAT EDIT DELET //
                        <div class="form-group"> // SESUAI RULES STATUS YANG DIBUAT 
                          <label>Status</label>
                          <div class="icheck">
                            <div class="square-green single-row">
                              <div class="radio ">
                                <input type="radio" name="status" id="status" value="Pengajuan ke SDM Pusat">
                                <label>Pengajuan ke SDM Pusat </label>
                              </div>
                            </div>
                            <div class="square-green single-row">
                              <div class="radio ">
                                <input type="radio" name="status" id="status" value="Masuk Keuangan">
                                <label>Masuk Keuangan </label>
                              </div>
                            </div>
                            <div class="square-green single-row">
                              <div class="radio ">
                                <input type="radio" name="status" id="status" value="Selesai">
                                <label>Selesai </label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="row">
                          <div class="col-sm-2">
                            <button type="submit" name="tambah" id="tambah" value="tambah" class="btn btn-primary">Buat</button>
                          </div>
                          <!-- <div class="col-sm-2">
                            <button type="reset" class="btn btn-warning">Reset</button> 
                            <!-- KOSEK AKU BINGUNG RESET E
                          </div> -->
                          <div class="col-sm-2">
                            <a href="<?=base_url('datasppd/index')?>">
                              <button type="button" class="btn btn-danger">Kembali</button>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
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
<script src="<?=base_url('assets/')?>js/sweetalert/sweetalert.min.js"></script>
<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

    <script>
      $(document).ready(function() {
        $('#qty1').change(function() {
          document.getElementById('biayaTransportBerangkat').value = $(this).val();
          total();
        });

        $('#qty2').change(function() {
          document.getElementById('biayaTransportPulang').value = $(this).val();
          total();
        });

        $('#namaPegawai').change(function() {
          var nip = $(this).val();
          $.ajax({
            url: '<?=base_url('DataSPPDController/AjaxFormattedTarifGP')?>',
            method: 'post',
            data: {nip:nip},
            success: function(data){
              document.getElementById('tarifGP').value = data;
              total();
            }
          });
          $.ajax({
            url: '<?=base_url('DataSPPDController/AjaxTarifGP')?>',
            method: 'post',
            data: {nip:nip},
            success: function(data){
              document.getElementById('tarifGPangka').value = data;
              total();
            }
          });
        });
      });
      $('#tglBerangkat').change(function() {
        document.getElementById('tglBerangkat').value = $(this).val();
          total();
        });
        $('#tglBerakhir').change(function() {
          document.getElementById('tglBerakhir').value = $(this).val();
          total();
        });

      function hitungBiayaBerangkat() {
        var total = document.getElementById('tarifGPangka').value;
        var biaya = document.getElementById('biayaTransportBerangkat').value;
        total = +total + +biaya;
        document.getElementById('totalBiaya').value = (total/1000).toFixed(3);
        document.getElementById('totalBiayaAngka').value = total;
      }

      function hitungBiayaPulang() {
        var total = document.getElementById('totalBiaya').value;
        var biaya = document.getElementById('biayaTransportPulang').value;
        total = +total + +biaya;
        document.getElementById('totalBiaya').value = (total/1000).toFixed(3);
        document.getElementById('totalBiayaAngka').value = total;
      }

         function total() {
        var arr = document.getElementsByName('qty'); //class quantity dari tarnsportasi
        var tglBerangkat = new Date(document.getElementById('tglBerangkat').value);
        var tglBerakhir = new Date(document.getElementById('tglBerakhir').value);
        var selisih = tglBerakhir - tglBerangkat; // multiplier untuk biaya golongan
        var tot = parseInt(document.getElementById('tarifGPangka').value) * ((selisih/1000/60/60/24) + 1); // total per golongan * hari
        if(tglBerangkat == "Invalid Date" || tglBerakhir == "Invalid Date"){
            tot = 0;
        }
        for(var i=0;i<arr.length;i++){ // tambah arr[index] value, arr - > array dari DOM Name
          if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
        }
        document.getElementById('totalBiaya').value = convertRupiah(tot);
        document.getElementById('totalBiayaAngka').value = tot;
      }
      
      function convertRupiah(jumlah){

          var	number_string = jumlah.toString(),
          split	= number_string.split(','),
          sisa 	= split[0].length % 3,
          rupiah 	= split[0].substr(0, sisa),
          ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
            
        if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        hasil = "Rp. ".concat(rupiah);

        return hasil;


      }
      
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
    // var editButton = document.getElementsByClassName("btn btn-primary edit")[0];
    
    var editButton = document.getElementsByClassName("btn btn-primary edit");

    // for(var i = 0; i< editButton.length; i++) {
    //   var editan = editButton[i].id;
    
    
$('.btn.btn-primary.edit').each(function(index) {// aku nggawe iki sedino nggliyeng :(

      $(this).on("click", function(){
    // for( var i = 0; i< editButton.length; i++){
    // event.stopPropagation();
    // event.stopImmediatePropagation();
    // event.preventDefault();
    var cek = document.getElementsByClassName("btn btn-primary edit");
    // console.log(cek);
    var nipEdit = document.getElementsByClassName("form-control nip")[index].id;
    var namaEdit = document.getElementsByClassName("form-control nama")[index].id;
    var jabatanEdit = document.getElementsByClassName("form-control jabatan")[index].id;
    var gpEdit = document.getElementsByClassName("form-control gp")[index].id;
    console.log(nipEdit);

    // var urlEdit = document.getElementById("urlEdit").action;
    var b = document.getElementsByClassName("form-horizontal edit")[index].id;
    var urlEdit = document.getElementById(b).action;
    console.log(urlEdit);
    
    var form_data = {
        NIP: $('#'+nipEdit).val(),
        namaPegawai: $('#'+namaEdit).val(),
        idJabatan: $('#'+jabatanEdit).val(),
        idGP: $('#'+gpEdit).val()
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
    // }
  });
});
// }
    $('.modal.fade.edit').on('hidden.bs.modal', function () {
      
    // do something…
    // $('.form-control.nip input[type="text"]').val('');
    // $('.form-control.nama input[type="text"]').val('');
    // $('.form-control.jabatan input[type="text"]').val('');
    // $('.form-control.gp input[type="text"]').val('');
    $('input[name=checkListItem').val('');
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
    // $('.sidebar-menu a[href="'+ url +'"]').parent().addClass('active');

// Will also work for relative and absolute hrefs
    $('.sidebar-menu a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
    </script>

    <script>//script paling konyol -- >i would admit it as silly code lmfao -> sidebar biar aktif, i got no idea way to implement this using the sidebar layout lmfao
    document.getElementsByClassName("fa fa-envelope-o")[0].parentElement.parentElement.className ='active li'
    </script>

    <script>
      function setInputFilter(textbox, inputFilter) {
          ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
            textbox.addEventListener(event, function() {
              if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
              } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
              }
            });
          });
        }
    setInputFilter(document.getElementById("qty1"), function(value) {
      return /^\d*$/.test(value); });
   setInputFilter(document.getElementById("qty2"), function(value) {
      return /^\d*$/.test(value); });
    </script>

    <script>
//       $('#tglBerangkat').datepicker({
//     onSelect: function(dateText, inst){
//         $('#tglBerakhir').datepicker('option', 'minDate', new Date(dateText));
//     },
//     });

//     $('#tglBerakhir').datepicker({
//     onSelect: function(dateText, inst){
//         $('#tglBerangkat').datepicker('option', 'maxDate', new Date(dateText));
//     }
// });
    </script>
    <script>
//    $(function(){
//      $(".datepicker").datepicker({
//         format: 'mm-dd-yyyy',
//         autoclose: true,
//         todayHighlight: true,
//     });
//     $("#tglBerangkat").on('changeDate', function(selected) {
//         var startDate = new Date(selected.date.valueOf());
//         $("#tglBerakhir").datepicker('setStartDate', startDate);
//         if($("#tglBerangkat").val() > $("#tglBerakhir").val()){
//           $("#tglBerakhir").val($("#tglBerangkat").val());
//         }
//     });
//  });
</script>

