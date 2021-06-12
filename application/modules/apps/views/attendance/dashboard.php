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
</div>   -->



<!-- Content -->
<div class="row" style="margin-bottom: 10px;">
  <div class="col-md-9">
    
  </div>
  <div class="col-md-3">
    <form method="GET"> 
      <div class="input-group input-group-sm">
        <input type="date" class="form-control" name="date" value="<?php if ($this->input->get('date')){echo $this->input->get('date'); }else{echo date_now();} ?>">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-info btn-flat"><i class="fa fa-search"></i></button>
            </span>
      </div>
    </form> 
  </div>
</div>
<div class="row"> 
        <div class="col-md-3">
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Working Time  <?= timeIn() ?> s/d <?= timeOut() ?></h3>
              <div class="pull-right">
                 (<?= $onTime->num_rows() ?>)
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <div id="" style="height:250px">
                  <marquee direction = "up" width = "100%" height="100%" scrolldelay="10" scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();">
                    <?php foreach ($onTime->result() as $ronTime): ?>
                      <div class="item">
                        <p class="message" style="font-family: 'Lucida Console'; font-size: 110%;">
                          <a href="<?= base_url() ?>apps/attendance/profile/<?= $ronTime->badge_number ?>" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?= $ronTime->time_in ?></small>
                            <i class="fa fa-user"></i> <?php if (strlen(ucfirst($ronTime->full_name))>=15){echo substr(ucfirst($ronTime->full_name),0,15).'...';}else{echo ucfirst($ronTime->full_name);} ?>
                          </a> 
                        </p>
                      </div>
                    <?php endforeach ?>
                    
                  </marquee>
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="col-md-3">
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Late </h3>
              <div class="pull-right">
                (<?= $late->num_rows() ?>)
              </div>
            </div>
            <div class="box-body">
              <div class="">
                <div id="areaChart" style="height:250px">

                <marquee direction = "up" width = "100%" height="100%" scrolldelay="10" scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();">
                  <?php foreach ($late->result() as $rlate): ?>
                      <div class="item">
                        <p class="message" style="font-family: 'Lucida Console'; font-size: 110%;">
                          <a href="<?= base_url() ?>apps/attendance/profile/<?= $rlate->badge_number ?>" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?= $rlate->time_in ?></small>
                            <i class="fa fa-user"></i> <?php if (strlen(ucfirst($rlate->full_name))>=15){echo substr(ucfirst($rlate->full_name),0,15).'...';}else{echo ucfirst($rlate->full_name);} ?>
                          </a> 
                        </p>
                      </div>
                    <?php endforeach ?>
                </marquee>


                </div>

              </div>
            </div>
          </div>
        </div> 
        <div class="col-md-3">
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Attendance Summary</h3>
            </div>
            <div class="box-body">
              <div class="" style="height:250px;">
                <!-- <ul>
                  <li>present</li>
                  <li>leave</li>
                  <li>Absent</li>
                  <li>Sick</li>
                </ul> -->
                <?php $this->load->view('attendance/chart');?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-clock-o"></i> Waktu</h3>
              <div class="pull-right">
                <?= date_idn(date_now()); ?>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <div style="height:250px"> 
                  <table border="0" align="center">
                    <tr>
                      <td style="font-family: 'Lucida Console'; font-size: 500%;"><font id="jam" >00</font>:</td>
                      <td style="font-family: 'Lucida Console'; font-size: 500%;"><font id="menit" >00</font>:</td>
                      <td style="font-family: 'Lucida Console'; font-size: 500%;"><font id="detik" >00</font></td>
                    </tr>
                    <tr>
                      <td align="center" style="font-family: 'Lucida Console';"><b>Jam</b></td>
                      <td align="center" style="font-family: 'Lucida Console';"><b>Menit</b></td>
                      <td align="center" style="font-family: 'Lucida Console';"><b>Detik</b></td>
                    </tr>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>
        </div>  

</div>


<div class="row"> 
        
      <div class="col-md-12">
         <div class="box box-danger box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bank"></i> Data Attendance</h3>
              <!-- Left -->
              <div class="box-tools pull-right">
                <?= date_idn(date_now()) ?>
              </div>
              <!-- End Left --> 
            </div>
            <div class="box-body">
               

              <div class="col-md-12" style="margin-top: 20px;">
                <table class="dataTables table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10px;">No</th>
                  <th>Employee</th> 
                  <th width="100px;">Time In</th>
                  <th width="100px;">Time Out</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($getAll->result() as $rgetAll): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $rgetAll->full_name ?></td>
                      <td><?= $rgetAll->time_in ?></td>
                      <td><?= $rgetAll->time_out == $rgetAll->time_in ? '' : $rgetAll->time_out ?></td>
                    </tr> 
                  <?php endforeach ?> 
                </tbody>
                 
              </table>
              </div>
            </div> 
          </div> 
      </div>

</div>

<!-- End Content-->
<script type="text/javascript">
  window.setTimeout("waktu()", 1000);
 
  function waktu() {
    var waktu = new Date();
    setTimeout("waktu()", 1000);
    document.getElementById("jam").innerHTML = waktu.getHours();
    document.getElementById("menit").innerHTML = waktu.getMinutes();
    document.getElementById("detik").innerHTML = waktu.getSeconds();
  }
</script>