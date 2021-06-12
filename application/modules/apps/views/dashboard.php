 



<!-- Content -->

<div class="row"> 
    <!-- Monitor Ulang Tahun    -->
    <div class="col-md-3">
      <div class="box box-danger box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Birthday  <?= call_month(DATE("m")); ?></h3>
          <div class="pull-right">
             <?php $no=1; foreach ($getAll->result() as $data): ?> 
                  <?php
                    if (substr($data->dob, 5,2) == DATE("m")){
                      $no++;
                    }
                  ?> 
                <?php endforeach ?>
                (<?= $no ?>)
          </div>
        </div>
        <div class="box-body">
          <div class="chart">
            <div id="" style="height:250px">
              <marquee direction = "up" width = "100%" height="100%" scrolldelay="10" scrollamount="2" >
                <?php foreach ($getAll->result() as $data): ?> 
                  <?php
                    if (substr($data->dob, 5,2) == DATE("m")){
                      ?>
                      <div class="item">
                          <p class="message" style="font-family: 'Lucida Console'; font-size: 110%;">
                            <a href="<?= base_url() ?>apps/employee/act/edit-user/<?= $data->employee_id ?>" class="name">
                              <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?= date_idn($data->dob) ?></small>
                              <i class="fa fa-user"></i> <?= substr($data->full_name,0,15) ?>
                            </a> 
                          </p>
                       </div>
                      <?php
                    }
                  ?> 
                <?php endforeach ?>  
              </marquee>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <!-- End Monitor Ulang Tahun    -->
    <!-- Monitor Perjalanan Dinas   -->
    <div class="col-md-3">
      <div class="box box-danger box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Perjalanan Dinas bulan  <?= call_month(DATE("m")); ?></h3>
          
        </div>
        <div class="box-body">
          <div class="chart">
            <div id="" style="height:250px">
               <div class="pull-right">
                  <a href="<?= base_url() ?>apps/travels"><i class="fa fa-th-large"></i> Lihat detail</a>
              </div>
               <marquee direction = "up" width = "100%" height="100%" scrolldelay="10" scrollamount="2" >
                <?php foreach ($spd as $data): ?> 
                  <?php
                    if (substr($data->departuredate, 5,2) == DATE("m")){
                      ?>
                      <a href="http://erp.multifab.co.id/erpmultifab/site/reports/spd_biaya.php?nospd=<?= $data->spdno ?>" target="_blank">
                        <table width="100%" border="0" style="width: 100%;
                                                      padding: 10px 10px 20px 10px;
                                                      border: 1px solid #BFBFBF;
                                                      background-color: white;
                                                      box-shadow: 10px 10px 5px #aaaaaa;">
                            <tr> 
                              <td align="right">
                                <?= date_idn(substr($data->departuredate,0,10)) ?>
                              </td>
                            </tr>
                            <tr> 
                              <td><?= $data->spdno ?></td>
                            </tr>
                            <tr> 
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
                            </tr>
                            <tr> 
                              <td>
                                <?= ($data->description) ?>
                              </td>
                            </tr> 
                          </table>
                        </a>
                        <br> 
                      <?php
                    }
                  ?> 
                <?php endforeach ?>
              </marquee> 
            </div>
          </div>
        </div>
      </div>
    </div> 
    <!-- End Monitor Perjalanan Dinas    -->

     
</div>
 

<!-- End Content -->