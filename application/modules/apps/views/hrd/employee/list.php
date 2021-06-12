<div class="row">
    <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>apps/hr/master/direktorat">
      <i class="fa fa-bank"></i> Sub-Direktorat
    </a>
    <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>apps/hr/master/division">
      <i class="fa fa-bank"></i> Division
    </a>
    <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>apps/hr/master/department">
      <i class="fa fa-bank"></i> Department
    </a>
    <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>apps/hr/master/jabatan">
      <i class="fa fa-users"></i> Jabatan
    </a>
    <div class="pull-right">
      <a class="btn btn-app bg-green" style="border-radius: 0px; " href="<?= base_url() ?>apps/employee/filter/Active"> 
        <i class="fa fa-user"></i> Active
      </a>
      <a class="btn btn-app bg-red" style="border-radius: 0px; " href="<?= base_url() ?>apps/employee/filter/Inactive"> 
        <i class="fa fa-user"></i> Inactive
      </a>
    </div>
</div> 



<!-- Content -->

<div class="row"> 
        
          <div class="box box-danger box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bank"></i> Data Karyawan</h3>
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
                <a href="<?= base_url() ?>apps/employee/act/add-new" class="btn btn-sm btn-info" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add New</a>
                <div class="pull-right">
                  <a href="#" onclick="alert('Development')" class="btn btn-sm btn-primary" style="border-radius: 0px;" ><i class="fa fa-print"></i> Print</a>
                  <a href="#" onclick="alert('Development')" class="btn btn-sm btn-primary" style="border-radius: 0px; background-color: green;"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                  <a href="#" onclick="alert('Development')" class="btn btn-sm btn-primary" style="border-radius: 0px; background-color: green;"><i class="fa fa-file-excel-o"></i> Import Excel</a>
                </div>
              </div>

              <div class="col-md-12" style="margin-top: 20px;">
                <table class="dataTables table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10px;">No</th>
                  <th>Badge Number</th>
                  <!-- <th>NIK</th> -->
                  <th>Full Name</th>
                  <th>Tanggal Masuk</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>Posisi</th>
                  <th>Status Pegawai</th>
                  <th>Account</th>
                  <th width="50px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($getAll->result() as $data): ?>
                  <?php
                    // if ($data->full_name!=""){
                      ?>
                         <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->badge_number; ?></td>
                            <td><a href="<?= base_url() ?>apps/employee/act/edit-user/<?= $data->employee_id ?>"><?= $data->full_name; ?></a></td>
                            <td><?= $data->join_date; ?></td>
                            <td><?= $data->gender; ?></td>
                            <td><?= $data->religion; ?></td>
                            <td><?= $data->posisi; ?></td>
                            <td><?= $data->pegawai; ?></td>
                            <td align="center">
                              <?php
                                switch ($data->status) {
                                  case 'Active':
                                    ?>
                                    <label class="badge bg-sm bg-green">Active</label>
                                    <?php
                                  break;
                                  case 'Inactive':
                                    ?>
                                    <label class="badge bg-sm bg-red">Inactive</label>
                                    <?php
                                  break; 
                                }
                              ?>
                            </td>
                            <td>
                              <label class="label label-success"><a href="<?= base_url() ?>apps/employee/act/edit-user/<?= $data->employee_id ?>" title="Test"><i class="fa fa-pencil" style="color: white;"></i></a></label>
                              <label class="label label-warning"><a href="<?= base_url() ?>apps/employee/act/resume/<?= $data->employee_id ?>" title="Test"><i class="fa fa-file-pdf-o" style="color: white;"></i></a></label>
                              <label class="label label-danger"><a href="#" onclick="alert('Hubungi Administrator');" title="Test"><i class="fa fa-trash" style="color: white;"></i></a></label> 
                            </td>
                          </tr>    
                      <?php
                    // }
                  ?>
                   
                  <?php endforeach ?>
                </tbody>
                 
              </table>
              </div>
            </div> 
          </div> 

</div>

<!-- End Content -->