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

    <!-- <form class="user" method="POST" action="<?= base_url() ?>administrator/product/update/<?= $detail['id'] ?>"> -->
    <?php echo form_open_multipart('administrator/product/update/'.$detail['id']);?>
        <div class="form-group">
            <label>Kategori</label>
            <select name="category_id" id="category_id" class="form-control" >
                <?php
                    foreach ($category->result() as $list) {
                        ?>
                            <option value="<?= $list->id ?>" <?php if($detail['category_id'] == $list->id){echo 'selected';} ?> > <?= $list->name ?></option>        
                        <?php
                    }
                ?> 
            </select> 
        </div> 
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" class="form-control form-control-user"
                id="name" name="name" aria-describedby="emailHelp"
                placeholder="Masukan Nama Produk" value="<?= $detail['name'] ?>">
        </div> 
        <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control form-control-user"
                id="price" name="price" aria-describedby="emailHelp"
                placeholder="Masukan Harga" value="<?= $detail['price'] ?>">
        </div> 
        <div class="form-group">
            <label>Gambar</label>
            <input type="text" name="image_old" value="<?= $detail['image'] ?>" />
            <input type="file" class="form-control form-control-user"
                id="image" name="image" aria-describedby="emailHelp"
                placeholder="Masukan Gambar" value="">
        </div> 
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea id="description" name="description" class="form-control form-control-user" ><?= $detail['description'] ?></textarea>
        </div> 
        <button class="btn btn-primary btn-user btn-block">Simpan</button>
    </form>
        
    </div>
</div>

 

</div>
<!-- /.container-fluid -->