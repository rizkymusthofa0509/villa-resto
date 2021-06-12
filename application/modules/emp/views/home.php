
<!-- Content -->

<div class="row"> 
        
          <div class="box box-danger box-solid " style="border-radius: 0px; ">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-clock-o"></i> Absensi Karyawan</h3>
              <!-- Left -->
              <div class="box-tools pull-right">
 
              </div>
              <!-- End Left --> 
            </div>
            <div class="box-body" style=" background: url('') no-repeat;">
              <div class="col-md-12">
              </div>

              <div class="col-md-12" style="margin-top: 20px;">

                <table border="0" align="center" height="50px;">
                  <tr>
                    <td style="font-family: 'Lucida Console'; font-size: 500%;"><font id="jam" >00</font>:</td>
                    <td style="font-family: 'Lucida Console'; font-size: 500%;"><font id="menit" >00</font>:</td>
                    <td style="font-family: 'Lucida Console'; font-size: 500%;"><font id="detik" >00</font></td>
                  </tr> 
                </table>
                <table border="0" align="center" height="50px;">
                  <tr>
                    <td>
                      <font style="font-family: 'Lucida Console'; font-size: 100%;">
                        PT. Multi Fabrindo Gemilang - Jakarta
                      </font>
                    </td>
                  </tr> 
                </table>
                 <table width="100%" border="0">
                   <tr>
                     <td width="50%" align="center">
                       <a href="" class="btn btn-lg btn-success" style="border-radius: 0px; width: 90%;"><i class="fa fa-clock-o"></i> MASUK</a>
                     </td>
                     <td width="50%" align="center">
                       <a href="" class="btn btn-lg btn-danger" style="border-radius: 0px; width: 90%;"><i class="fa fa-clock-o"></i> MASUK</a>
                     </td>
                   </tr>
                 </table> 
              </div>
            </div> 
          </div> 

</div>
<div class="row"> 
        
          <div class="box box-danger box-solid " style="border-radius: 0px;">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-clock-o"></i> Log Absensi Karyawan</h3>
              <!-- Left -->
              <div class="box-tools pull-right">
                <table>
                  <tr>
                    <td>
                      <select class="form-control" name="" id="">
                        <?php
                            for ($i=1; $i <= 12 ; $i++) { 
                              if ($i<=9){$i='0'.$i;}
                              echo 
                              '
                                <option value="'.$i.'">'.call_month($i).'</option>
                              ';
                            }
                          ?> 
                      </select> 
                    </td>
                    <td>
                      <select class="form-control" name="" id="">
                        <?php
                            for ($i=2020; $i <= DATE("Y")+2; $i++) { 
                              if ($i<=9){$i='0'.$i;}
                              echo 
                              '
                                <option value="'.$i.'">'.($i).'</option>
                              ';
                            }
                          ?> 
                      </select> 
                    </td>
                  </tr>
                </table>
              </div>
              <!-- End Left --> 
            </div>
            <div class="box-body">
              <div class="col-md-12">
              </div>

              <div class="col-md-12" style="margin-top: 20px;"> 
                <ul class="todo-list">
                <?php
                  for ($i=1; $i <= 31 ; $i++) { 
                    ?>
                      <li>
                  <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span> 
                  <!-- <input type="checkbox" value="">  -->
                  <span class="text"><?= date_idn(date_now()) ?></span> 
                  <span class="text">Waktu 07:00 </span> 
                  <small class="label label-success"><i class="fa fa-clock-o"></i> Ontime</small> 
                  <!-- <div class="tools">
                    <i class="fa fa-edit"></i>
                    <i class="fa fa-trash-o"></i>
                  </div> -->
                </li> 
                    <?php
                  }
                ?>
                
              </ul>
              </div>
            </div> 
          </div> 

</div>


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
<!-- End Content -->