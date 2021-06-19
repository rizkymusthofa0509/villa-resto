<div class="container-fluid">

<!-- Page Heading --> 

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
        <div></div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th>Kategori</th> 
                    </tr>
                </thead> 
                <tbody>
                    <?php
                        $no=1;
                        foreach ($getAll->result() as $data) {
                            ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?= $data->name ?></td> 
                                </tr>       
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->