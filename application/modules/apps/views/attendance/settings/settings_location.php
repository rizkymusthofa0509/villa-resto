 
<!-- Content -->

<div class="row"> 
        
          <div class="box box-danger box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bank"></i> Data Location</h3>
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
                <a href="<?= base_url() ?>apps/attendance/settings/location-add" class="btn btn-sm btn-info" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add New</a>
                <div class="pull-right">
                  <a target="_blank" href="<?= base_url() ?>apps/attendance/settings/location-maps" class="btn btn-default">Open Maps</a>
                </div>
              </div>
              <div class="col-md-12" style="margin-top: 20px;" >
                <iframe src="<?= base_url() ?>apps/attendance/settings/location-maps" style="width: 100%; height: 300px;"> 
                </iframe>
              </div>
                
              <div class="col-md-12" style="margin-top: 20px;">
                <table class="dataTables table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10px;">No</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Radius</th> 
                  <th width="50px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($list->result() as $rlist): ?>
                  <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $rlist->name ?></td>
                      <td><?= $rlist->description ?></td>
                      <td><?= $rlist->lat ?></td> 
                      <td><?= $rlist->lon ?></td>
                      <td align="center"><?= $rlist->radius ?> m</td>
                      <td>
                        <label class="label label-success"><a href="<?= base_url() ?>apps/attendance/settings/location-edit/<?= $rlist->location_id ?>" title="Test"><i class="fa fa-pencil" style="color: white;"></i></a></label>
                        <!-- <label class="label label-warning"><a href="<?= base_url() ?>apps/attendance/settings/location-edit/<?= $rlist->location_id ?>" title="Test"><i class="fa fa-eye" style="color: white;"></i></a></label> -->
                        <label class="label label-danger"><a onclick="return confirm('Are You Sure ?');" href="<?= base_url() ?>apps/attendance/settings/location-delete/<?= $rlist->location_id ?>" title="Test"><i class="fa fa-trash" style="color: white;"></i></a></label> 
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