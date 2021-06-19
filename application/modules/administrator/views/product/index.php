<div class="container-fluid">

<!-- Page Heading --> 

<!-- DataTales Example -->
<!-- Collapsable Card Example -->
 <!-- Dropdown Card Example -->
 <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
        <div class="dropdown no-arrow">
            <a href="<?= base_url() ?>administrator/product/create" class="btn btn-primary btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah data</span>
            </a>
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th width="10%">Gambar</th> 
                        <th>Kategori</th> 
                        <th>Nama Produk</th> 
                        <th>Harga</th> 
                        <th width="10%">Action</th> 
                    </tr>
                </thead> 
                <tbody>
                    <?php
                        $no=1;
                        foreach ($getAll->result() as $data) {
                            ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td>
                                        <img src="<?= base_url() ?>/assets/product/<?= $data->image ?>" width="100%">
                                    </td> 
                                    <td><?= $data->cat_name ?></td> 
                                    <td><?= $data->name ?></td> 
                                    <td><?= rp($data->price) ?></td> 
                                    <td>
                                        
                                        <a href="<?= base_url() ?>administrator/product/edit/<?= $data->id ?>" class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="<?= base_url() ?>administrator/product/destroy/<?= $data->id ?>" onclick="return confirm('Yakin ingin menghapus data ?');" class="btn btn-danger btn-circle btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td> 
                                </tr>       
                            <?php
                        }
                    ?>
                </tbody>
            </table>
    </div>
</div>

 

</div>
<!-- /.container-fluid -->