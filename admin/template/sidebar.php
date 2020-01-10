<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="admin/img/<?= $datauser['foto'];  ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $datauser['nama_admin']; ?></p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="?">
            <i class="fa fa-home"></i> <span>Home</span>
          </a>
        </li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-laptop"></i> <span>Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?halaman=Barang"><i class="fa fa-plus"></i> Manajemen Barang</a></li>
            <li class="active"><a href="?halaman=masterBarang"><i class="fa fa-circle-o"></i> Stok In & Stok Out</a></li>
          </ul>
        </li>
        <li>
          <?php if($datauser['level'] == 'superadmin') : ?>
          <a href="?halaman=Admin">
            <i class="fa fa-user"></i> <span>Admin</span>
          </a>
<?php endif; ?>
        </li>
        <li>
          <a href="?halaman=Profil">
            <i class="fa fa-user"></i> <span>Profil</span>
          </a>
        </li>
        <li>
          <a href="?halaman=Kategori">
            <i class="fa fa-bars"></i> <span>Kategori</span>
          </a>
        </li>
        <li>
          <a href="?halaman=Supplier">
            <i class="fa fa-truck"></i> <span>Supplier</span>
          </a>
        </li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-clone"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?halaman=Laporan"><i class="fa fa-cart-plus"></i>Laporan Penjualan</a></li>
            <li><a href="?halaman=LaporanStok"><i class="fa fa-dollar"></i>Laporan Barang In & Out</a></li>
          </ul>
        </li>
        <?php if($datauser['level'] == 'superadmin') : ?>
        <li>
          <a href="?halaman=Log">
            <i class="fa fa-newspaper-o"></i> <span>Log Activity</span>
          </a>
        </li>
        <?php endif; ?>
    </section>
    <!-- /.sidebar -->
  </aside>