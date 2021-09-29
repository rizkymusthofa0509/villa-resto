<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-utensils"></i>
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
        <a class="nav-link" href="<?= base_url() ?>administrator">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <?php
    if ((session('type') == 'admin')) {
    ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kategori" aria-expanded="true" aria-controls="kategori">
                <i class="fas fa-fw fa-tag"></i>
                <span>Kategori</span>
            </a>
            <div id="kategori" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url() ?>administrator/category/create">Tambah data</a>
                    <a class="collapse-item" href="<?= base_url() ?>administrator/category">Data Kategori</a>
                </div>
            </div>
        </li>
    <?php
    }
    ?>
    <?php
    if ((session('type') == 'admin')) {
    ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#produk" aria-expanded="true" aria-controls="produk">
                <i class="fas fa-utensils"></i>
                <span>Menu</span>
            </a>
            <div id="produk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url() ?>administrator/product/create">Tambah data</a>
                    <a class="collapse-item" href="<?= base_url() ?>administrator/product">Data Produk</a>
                </div>
            </div>
        </li>
    <?php
    }
    ?>
    <?php
    if ((session('type') == 'admin') or (session('type') == 'kasir')) {
    ?>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#order_transaksi" aria-expanded="true" aria-controls="order_transaksi">
                <i class="fas fa-fw fa-cog"></i>
                <span>Order Transaksi</span>
            </a>
            <div id="order_transaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url() ?>administrator/transaction">Permintaan pesanan</a>

                </div>
            </div>
        </li>
    <?php
    }
    ?>
    <?php
    if ((session('type') == 'admin') or (session('type') == 'kasir') or (session('type') == 'receptionis')) {
    ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#data_villa" aria-expanded="true" aria-controls="data_villa">
                <i class="fas fa-home"></i>
                <span>Data Villa</span>
            </a>
            <div id="data_villa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <?php
                    if ((session('type') == 'admin')) {
                    ?>
                        <a class="collapse-item" href="<?= base_url() ?>administrator/villa/create">Tambah data</a>
                    <?php
                    }
                    ?>
                    <a class="collapse-item" href="<?= base_url() ?>administrator/villa">Data Villa</a>
                </div>
            </div>
        </li>
    <?php
    }
    ?>

    <?php
    if (session('type') == 'admin') {
    ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#data_account" aria-expanded="true" aria-controls="data_account">
                <i class="fas fa-fw fa-cog"></i>
                <span>Data Account</span>
            </a>
            <div id="data_account" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url() ?>administrator/account">Account</a>
                </div>
            </div>
        </li>
    <?php
    }
    ?>


</ul>