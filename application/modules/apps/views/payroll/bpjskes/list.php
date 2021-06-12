<div class="row">
    <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>apps/hr/master/direktorat">
      <i class="fa fa-gear"></i> Setup
    </a>
    <!-- <a class="btn btn-app" style="border-radius: 0px;" href="<?= base_url() ?>app">
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
    </div> -->
</div> 



<!-- Content -->

<div class="row"> 
        
          <div class="box box-danger box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bank"></i> BPJS Kesehatan</h3>
              <!-- Left -->
              <div class="box-tools pull-right">
                <!--  -->
                <button type="button" class="btn btn-box-tool" data-widget="Reload" data-toggle="tooltip" title="Reload">
                  <i class="fa fa-refresh"></i></button>
              </div>
              <!-- End Left --> 
            </div>
            <div class="box-body">
              <div class="col-md-12">
                <a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
                <a href="<?= base_url() ?>apps/payroll/bpjskes/create-bpjskes" class="btn btn-sm btn-info" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add New</a>
                <div class="pull-right">
                  <a href="" class="btn btn-sm btn-primary" style="border-radius: 0px;" ><i class="fa fa-print"></i> Print</a>
                  <a href="" class="btn btn-sm btn-primary" style="border-radius: 0px; background-color: green;"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                  <a href="" class="btn btn-sm btn-primary" style="border-radius: 0px; background-color: green;"><i class="fa fa-file-excel-o"></i> Import Excel</a>
                </div>
              </div>

              <div class="col-md-12" style="margin-top: 20px;">
                <table class="dataTables table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10px;">No</th>
                  <th width="100px;">Karyawan</th>
                  <th>Nomor BPJS</th>
                  <th>Tgl Daftar</th>
                  <th width="5px;">Tanggungan</th>
                  <th width="5px;">Tambahan</th>
                  <th>Upah</th>
                  <th>Premi(5.00%)</th>
                  <th>Pekerja(1.00%)</th>
                  <th>Perusahaan(4.00%)</th> 
                  <th width="50px;">Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($list->result() as $data): ?>
                    <tr>
                      <td><?=$no++?></td>
                      <td><?= $data->full_name; ?></td>
                      <td><?= $data->no_bpjskes; ?></td>
                      <td><?= $data->tgl_daftar; ?></td>
                      <td><?= 0; ?></td>
                      <td><?= 0; ?></td>
                      <td><?= rupiah($data->laporan_gaji); ?></td>
                      <td><?= rupiah($data->iuran_pekerja+$data->iuran_perusahaan); ?></td>
                      <td><?= rupiah($data->iuran_pekerja); ?></td>
                      <td><?= rupiah($data->iuran_perusahaan); ?></td>
                      <td align="center">
                        <label class="label label-success"><a href="<?= base_url() ?>apps/" title="Test"><i class="fa fa-pencil" style="color: white;"></i></a></label>
                        <!-- <label class="label label-warning"><a href="<?= base_url() ?>apps/" title="Test"><i class="fa fa-eye" style="color: white;"></i></a></label> -->
                        <label class="label label-danger"><a href="<?= base_url() ?>apps/" title="Test"><i class="fa fa-trash" style="color: white;"></i></a></label> 
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