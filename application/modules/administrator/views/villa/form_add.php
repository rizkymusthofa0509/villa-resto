<div class="container-fluid">

<!-- Page Heading --> 

<!-- DataTales Example -->
<!-- Collapsable Card Example -->
 <!-- Dropdown Card Example -->
 <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title ?? '' ?></h6>
        <div class="dropdown no-arrow">
            <a onclick="window.history.back();" class="btn btn-danger btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-left"><</i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">

    <form class="user" method="POST" action="<?= base_url() ?>administrator/villa/store">
        <div class="form-group">
            <label>Nama Villa</label>
            <input type="text" class="form-control form-control-user"
                id="name" name="name" aria-describedby="emailHelp"
                placeholder="Masukan Nama Villa...">
        </div>
        <div class="form-group">
            <label>Lokasi</label>
            <input type="text" class="form-control form-control-user"
                id="penyewa" name="penyewa" placeholder="Masukan Lokasi">
        </div> 
        <button class="btn btn-primary btn-user btn-block">Simpan</button>
    </form>
        
    </div>
</div>

 

</div>
<!-- /.container-fluid -->