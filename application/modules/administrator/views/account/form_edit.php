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

    <form class="user" method="POST" action="<?= base_url() ?>administrator/account/update/<?= $detail['id'] ?>">
        <div class="form-group">
            <label>Tipe User</label>
            <select class="form-control" name="type" id="">
                <option value="user" <?php if($detail['type']=='user'){echo 'selected';} ?>>User</option>
                <option value="admin" <?php if($detail['type']=='admin'){echo 'selected';} ?>>Administrator</option>
                <option value="receptionis" <?php if($detail['type']=='receptionis'){echo 'selected';} ?>>Receptionist</option>
                <option value="kasir" <?php if($detail['type']=='kasir'){echo 'selected';} ?>>Kasir</option>
            </select>
        </div> 
        <div class="form-group">
            <label>Nama Account</label>
            <input type="text" class="form-control form-control-user"
                id="fullname" name="fullname" aria-describedby="emailHelp"
                placeholder="Masukan Nama Account..." value="<?= $detail['fullname'] ?>">
        </div> 
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control form-control-user"
                id="username" name="username" aria-describedby="emailHelp"
                placeholder="Masukan username...." value="<?= $detail['username'] ?>">
        </div> 
        <div class="form-group">
            <label>Password Baru</label>
            <input type="password" class="form-control form-control-user"
                id="password_new" name="password_new" aria-describedby="emailHelp"
                placeholder="Masukan password baru..." value="">
        </div>  
        <button class="btn btn-primary btn-user btn-block">Simpan</button>
    </form>
        
    </div>
</div>

 

</div>
<!-- /.container-fluid -->