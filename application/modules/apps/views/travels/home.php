
<!-- Content -->

<div class="row"> 
        
          <div class="box box-danger box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bank"></i> Data Perjalanan Dinas</h3>
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

              <div class="col-md-12" style="margin-top: 20px;">
                <table class="dataTables table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10px;">No</th>
                  <th>No SPD</th>
                  <th>Nama Karyawan</th>
                  <th>Tanggal</th>
                  <th>aktivitas Perjalanan</th>
                  <th>Lama Perjalanan</th> 
                  <th width="50px;">Laporan</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach (getSpdList() as $data): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><a target="_blank" href="http://erp.multifab.co.id/erpmultifab/site/reports/spd_biaya.php?nospd=<?= $data->spdno ?>" title="Lihat Laporan"><?= $data->spdno ?></a></td>
                      <td>
                          <?php
                            $pisah = explode(",",$data->forname);
                            foreach ($pisah as $g) {
                              if (isset(forname($g)->row_array()['full_name'])){ 
                               echo forname($g)->row_array()['full_name'].',';
                              }
                             } 
                          ?>
                      </td>
                      <td><?= $data->tanggal ?></td>
                      <td><?= $data->description ?></td>
                      <td>
                          <?=durationTime(substr($data->departuredate,0,10),substr($data->returndate,0,10))?> Hari<br>
                          Mulai : <?= date_idn(substr($data->departuredate,0,10)) ?> <br>
                          Akhir :  <?= date_idn(substr($data->returndate,0,10)) ?> </td> 
                      <td>
                        <label class="label label-danger"><a target="_blank" href="http://erp.multifab.co.id/erpmultifab/site/reports/spd_biaya.php?nospd=<?= $data->spdno ?>" title="Test"><i class="fa fa-file-pdf-o" style="color: white;"></i></a></label> 
                        Report
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