<!-- <div class="row">
    <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>apps/hr/master/direktorat">
      <i class="fa fa-bank"></i> Sub-Direktorat
    </a>
    <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>app">
      <i class="fa fa-bank"></i> Division
    </a>
    <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>app">
      <i class="fa fa-bank"></i> Department
    </a>
    <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>app">
      <i class="fa fa-users"></i> Jabatan
    </a>
    <div class="pull-right">
      <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>app"> 
      <i class="fa fa-user"></i> Non Active
    </a>
    </div>
</div>  -->



<!-- Content -->

<div class="row"> 
        
          <div class="box box-danger box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bank"></i> Recruitment Karyawan</h3>
              <!-- Left -->
              <div class="box-tools pull-right">
                <a class="btn btn-sm" target="_blank" href="<?= base_url() ?>apps/employee/manpower/dashboard"><i class="fa fa-desktop"></i> Dashboard Monitor</a>
              </div>
              <!-- End Left --> 
            </div>
            <div class="box-body">
              <div class="col-md-12">
                <a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
                <a href="<?= base_url() ?>apps/employee/manpower/add-new" class="btn btn-sm btn-info" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add Recruitment Karyawan</a>
                <div class="pull-right">
                  <!-- <a href="" class="btn btn-sm btn-primary" style="border-radius: 0px;" ><i class="fa fa-print"></i> Print</a>
                  <a href="" class="btn btn-sm btn-primary" style="border-radius: 0px; background-color: green;"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                  <a href="" class="btn btn-sm btn-primary" style="border-radius: 0px; background-color: green;"><i class="fa fa-file-excel-o"></i> Import Excel</a> -->
                </div>
              </div>

              <div class="col-md-12" style="margin-top: 20px;">
                <table class="dataTables table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10px;">No</th>
                  <th>No. Dok</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Division Request</th>
                  <th>Jabatan</th>
                  <th>Posisi</th>
                  <th>Jumlah</th>
                  <th width="50px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($list->result() as $rlist): ?>
                	 <tr>
                      <td>1</td>
                      <td><a href="<?= base_url() ?>apps/employee/manpower/edit/<?= $rlist->recruitment_id ?>" title="Test"><?= $rlist->doc_no ?></a></td>
                      <td><?= date_idn($rlist->tanggal_pengajuan) ?></td>
                      <td><?= $rlist->division ?></td>
                      <td><?= $rlist->jabatan ?></td>
                      <td><?= $rlist->position ?></td>
                      <td><?= $rlist->jumlah ?></td>
                      <td>
                        <label class="label label-success"><a href="<?= base_url() ?>apps/employee/manpower/edit/<?= $rlist->recruitment_id ?>" title="Test"><i class="fa fa-pencil" style="color: white;"></i></a></label>
                        <label class="label label-warning"><a target="_blank" href="http://career.multifab.co.id/home/detail/<?= $rlist->recruitment_id ?>" title="Test"><i class="fa fa-eye" style="color: white;"></i></a></label>
                        <label class="label label-danger"><a onclick="return confirm('Are you sure you want to delete data permanently?');" href="<?= base_url() ?>apps/employee/manpower/delete/<?= $rlist->recruitment_id ?>" title="Test"><i class="fa fa-trash" style="color: white;"></i></a></label> 
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