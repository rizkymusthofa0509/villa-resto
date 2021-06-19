<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-desktop"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= $this->db->APP_NAME ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0"> 

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Modul
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item ">
        <a class="nav-link" href="<?= base_url() ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kategori"
            aria-expanded="true" aria-controls="kategori">
            <i class="fas fa-fw fa-tag"></i>
            <span>Kategori</span>
        </a>
        <div id="kategori" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded"> 
                <a class="collapse-item" href="<?= base_url() ?>">Tambah data</a>
                <a class="collapse-item" href="<?= base_url() ?>">Data Kategori</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#produk"
            aria-expanded="true" aria-controls="produk">
            <i class="fas fa-fw fa-cog"></i>
            <span>Produk</span>
        </a>
        <div id="produk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded"> 
                <a class="collapse-item" href="<?= base_url() ?>">Tambah data</a>
                <a class="collapse-item" href="<?= base_url() ?>">Data Produk</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#order_transaksi"
            aria-expanded="true" aria-controls="order_transaksi">
            <i class="fas fa-fw fa-cog"></i>
            <span>Order Transaksi</span>
        </a>
        <div id="order_transaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded"> 
                <a class="collapse-item" href="<?= base_url() ?>">Permintaan pesanan</a>
                <a class="collapse-item" href="<?= base_url() ?>">Riwayat Pesanan</a>
            </div>
        </div>
    </li> 

</ul>