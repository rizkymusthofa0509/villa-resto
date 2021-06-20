<div class="container-fluid">

<!-- Page Heading --> 

<!-- DataTales Example -->
<!-- Collapsable Card Example -->
 <!-- Dropdown Card Example -->
 <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Pesanan</h6>
        <div class="dropdown no-arrow">
            <a href="<?= base_url() ?>administrator/transaction" class="btn btn-<?php if ($this->input->get('status')==''){echo 'primary';}else{echo 'default';}  ?>  btn-icon-split btn-sm"> 
                <span class="text">All</span>
            </a>
            <a href="<?= base_url() ?>administrator/transaction?status=dipesan" class="btn btn-<?php if ($this->input->get('status')=='dipesan'){echo 'primary';}else{echo 'default';}  ?> btn-icon-split btn-sm"> 
                <span class="text">Dipesan</span>
            </a>
            <a href="<?= base_url() ?>administrator/transaction?status=diproses" class="btn btn-<?php if ($this->input->get('status')=='diproses'){echo 'primary';}else{echo 'default';}  ?> btn-icon-split btn-sm"> 
                <span class="text">Diproses</span>
            </a>
            <a href="<?= base_url() ?>administrator/transaction?status=dikirim" class="btn btn-<?php if ($this->input->get('status')=='dikirim'){echo 'primary';}else{echo 'default';}  ?> btn-icon-split btn-sm"> 
                <span class="text">Dikirim</span>
            </a>
            <a href="<?= base_url() ?>administrator/transaction?status=selesai" class="btn btn-<?php if ($this->input->get('status')=='selesai'){echo 'primary';}else{echo 'default';}  ?> btn-icon-split btn-sm"> 
                <span class="text">Selesai</span>
            </a>
            <a href="<?= base_url() ?>administrator/transaction?status=reject" class="btn btn-<?php if ($this->input->get('status')=='reject'){echo 'primary';}else{echo 'default';}  ?> btn-icon-split btn-sm"> 
                <span class="text">Reject</span>
            </a>
        </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="1%">No</th>  
                        <th>Nama Pelanggan</th> 
                        <th>Waktu Pesanan</th> 
                        <th>Villa</th> 
                        <th>Status</th> 
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
                                    <td><?= $data->name ?></td>  
                                    <td><?= $data->created_at ?></td>  
                                    <td><?= $data->villa_name ?></td>  
                                    <td> 
                                        <select onchange="update_status(this,<?= $data->id ?>)" class="form-control">
                                            <option value="dipesan"  <?php if($data->status=='dipesan'){echo 'selected';} ?> >Dipesan</option>
                                            <option value="diproses" <?php if($data->status=='diproses'){echo 'selected';} ?> >Diproses</option>
                                            <option value="dikirim"  <?php if($data->status=='dikirim'){echo 'selected';} ?> >Dikirim</option>
                                            <option value="selesai"  <?php if($data->status=='selesai'){echo 'selected';} ?> >Selesai</option>
                                            <option value="reject"  <?php if($data->status=='reject'){echo 'selected';} ?> >Reject</option>
                                        </select>
                                    </td>  
                                    <td align="center"> 
                                        <a onclick="infoWindows(<?= $data->id ?>)" data-toggle="modal" data-target="#infoWindow" class="btn btn-info btn-circle btn-sm">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a href="<?= base_url() ?>administrator/transaction/destroy/<?= $data->id ?>" onclick="return confirm('Yakin ingin menghapus data ?');" class="btn btn-danger btn-circle btn-sm">
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

<script>
    function update_status(data,id){ 
        $.ajax({
          url:'<?php echo base_url() ?>administrator/transaction/update_status',
          type:'POST',
          async:false,
          data:{
            update:data.value,
            id:id,
          },
          success:function(data){
            alert(data);
          }
        });
    }

    function infoWindows(id){  
        $.ajax({
          url:'<?php echo base_url() ?>administrator/transaction/infoWindows',
          type:'POST',
          async:false,
          data:{ 
            id:id,
          },
          success:function(data){
            document.getElementById('infoWindows').innerHTML = data;
          }
        });
    }
</script>



<!-- Modal -->
<div class="modal fade" id="infoWindow" tabindex="-1" role="dialog" aria-labelledby="infoWindowLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoWindowLabel">Detail Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="infoWindows"></div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>