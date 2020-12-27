<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $session = $this->session->userdata('NKK');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu <?=$menu ?></li>
        <?php

        if($role == 'warga'){
        echo'
            <li>
              <a href="'.site_url().'warga/dashboard">
                <i class="fa fa-home"></i> <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="'.site_url().'warga/crudwarga">
                <i class="fa fa-users"></i>
                <span>Profil Keluarga</span>
              </a>
            </li>
            <li>
              <a href="'.site_url().'warga/crudsurat">
                <i class="fa fa-envelope"></i>
                <span>Surat Pengantar</span>
              </a>
            </li>';
          }

          else if($role == 'rt'){
        echo'
            <li>
              <a href="'.site_url().'rt/dashboard">
                <i class="fa fa-home"></i> <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="'.site_url().'rt/crudwarga">
                <i class="fa fa-users"></i>
                <span>Data Warga</span>
              </a>
            </li>
            <li>
              <a href="'.site_url().'rt/crudakun">
                <i class="fa fa-laptop"></i>
                <span>Buat Akun</span>
              </a>
            </li>
            <li>
              <a href="'.site_url().'rt/crudsurat">
                <i class="fa fa-envelope"></i>
                <span>Surat Pengantar</span>
              </a>
            </li>';
          }

          else if($role == 'admin'){
        echo'
            <li>
              <a href="'.site_url().'admin/dashboard">
                <i class="fa fa-home"></i> <span>Dashboard</span>
              </a>
            </li>
            <li>
              <a href="'.site_url().'admin/crudrt">
                <i class="fa fa-users"></i>
                <span>Data Wilayah</span>
              </a>
            </li>
            <li>
              <a href="'.site_url().'admin/crudwarga">
                <i class="fa fa-envelope"></i>
                <span>Data Warga</span>
              </a>
            </li>
            <li>
              <a href="'.site_url().'admin/crudakun">
                <i class="fa fa-laptop"></i>
                <span>Buat Akun</span>
              </a>
            </li>';
          }
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>