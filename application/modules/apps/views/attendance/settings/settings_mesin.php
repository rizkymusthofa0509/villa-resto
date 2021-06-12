 


<!-- Content -->

<div class="row"> 
        
          <div class="box box-danger box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bank"></i> Data Mesin</h3>
              <!-- Left -->
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <b><i class="fa fa-angle-down"></i></b></button>
                <button type="button" class="btn btn-box-tool" data-widget="Reload" data-toggle="tooltip" title="Reload">
                  <i class="fa fa-refresh"></i></button>
              </div>
              <!-- End Left --> 
            </div>
            <div class="box-body">
              <div class="col-md-12">
                <a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
                <a href="<?= base_url() ?>apps/attendance/settings/mesin-add" class="btn btn-sm btn-info" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add New</a>
                <div class="pull-right">
                   
                </div>
              </div>

              <div class="col-md-12" style="margin-top: 20px;">
                <table class="dataTables table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10px;">No</th>
                  <th>Nama Mesin</th>
                  <th>Lokasi</th>
                  <th>IP Address</th>
                  <th>ComKey</th>
                  <th>Status</th> 
                  <th width="50px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($list->result() as $data): ?>
                	<tr>
                      <td><?= $no++ ?></td>
                      <td><?= $data->nama ?></td>
                      <td><?= $data->lokasi ?></td>
                      <td><?= $data->ip_address ?></td>
                      <td><?= $data->comKey ?></td>
                      <td><?= label_status($data->status) ?></td> 
                      <td>
                        <label class="label label-success"><a href="<?= base_url() ?>apps/attendance/settings/mesin-edit/<?= $data->device_id ?>" title="Test"><i class="fa fa-pencil" style="color: white;"></i></a></label> 
                        <label class="label label-danger"><a onclick="return confirm('Are you sure ?');" href="<?= base_url() ?>apps/attendance/settings/mesin-destroy/<?= $data->device_id ?>" title="Test"><i class="fa fa-trash" style="color: white;"></i></a></label> 
                      </td>
                    </tr>  
                <?php endforeach ?>
                   
                </tbody>
                 
              </table>
              </div>
            </div> 
          </div> 

</div>

<!-- End Content -->