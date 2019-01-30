<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/')?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?php echo base_url('dashboard/index')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-book"></i> <span>Data Utama</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('pegawai/index')?>"><i class="fa fa-circle-o"></i> Data Pegawai</a></li>
            <li><a href="<?php echo base_url('gp/index')?>"><i class="fa fa-circle-o"></i> Data Golongan</a></li>
            <li><a href="<?php echo base_url('jabatan/index')?>"><i class="fa fa-circle-o"></i> Data Jabatan</a></li>
            <li><a href="<?php echo base_url('transportasi/index')?>"><i class="fa fa-circle-o"></i> Data Transportasi</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-envelope-o"></i> <span>SPPD</span></a></li>
        <!-- <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
    <script>
    var url = window.location;
// Will only work if string in href matches with location
    $('.sidebar-menu a[href="'+ url +'"]').parent().addClass('active');

// Will also work for relative and absolute hrefs
    $('.sidebar-menu a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
    </script>