 



<!-- Content -->

<div class="row"> 
        
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

     
</div>

<!-- End Content -->