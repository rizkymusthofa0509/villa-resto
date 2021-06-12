
<div class="box box-danger box-solid">
	<div class="box-header with-border">
	  <h3 class="box-title"><i class="fa fa-clock-o"></i> Attendance</h3>

	  <div class="box-tools pull-right">
	    <!-- <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
	      <i class="fa fa-minus"></i></button>
	    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
	      <i class="fa fa-times"></i></button> -->
        <font style="font-size:50%;" id="error"></font>
	  </div>
	</div>
	<div class="box-body">  
	  <table border="0" align="center" height="50px;">
        <tr>
          <td style="font-family: 'Lucida Console'; font-size: 500%;"><font id="jam" >00</font>:</td>
          <td style="font-family: 'Lucida Console'; font-size: 500%;"><font id="menit" >00</font>:</td>
          <td style="font-family: 'Lucida Console'; font-size: 500%;"><font id="detik" >00</font></td>
        </tr> 
      </table>
      <table border="0" align="center" height="50px;">
        <tr>
          <td align="center">
            <font style="font-family: 'Lucida Console'; font-size: 100%;">
              PT. Multi Fabrindo Gemilang - Jakarta 
            </font>
             <font id="jarak"></font><br>
             
          </td>
        </tr> 
      </table>
       <table width="100%" border="0">
         <tr>
           <td width="50%" align="center">
             <a onclick="masuk();" class="btn btn-lg btn-success" style="border-radius: 0px; width: 90%;text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"><i class="fa fa-clock-o"></i> IN</a>
           </td>
           <td width="50%" align="center">
             <a onclick="pulang();" class="btn btn-lg btn-danger" style="border-radius: 0px; width: 90%; text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;"><i class="fa fa-clock-o"></i> OUT</a>
           </td>
         </tr>
       </table> 
	</div> 
	 
</div> 
<div class="box box-danger box-solid">
	<div class="box-header with-border">
	  <h3 class="box-title"><i class="fa fa-list"></i> Log</h3>

	  <div class="box-tools pull-right">
                <table style="margin-top: -2px;">
                  <tr>
                    <td>
                      <select class="form-control" name="" id="month" onchange="load_absensi();">
                        <?php
                            for ($i=1; $i <= 12 ; $i++) { 
                              if ($i<=9){$i='0'.$i;}
                              echo 
                              '
                                <option value="'.$i.'" '; if($i==DATE("m")){echo "selected";}  echo'>'.call_month($i).'</option>
                              ';
                            }
                          ?> 
                      </select> 
                    </td>
                    <td>
                      <select class="form-control" name="" id="year" onchange="load_absensi();">
                        <?php
                            for ($i=2020; $i <= DATE("Y")+2; $i++) { 
                              if ($i<=9){$i='0'.$i;}
                              echo 
                              '
                                <option value="'.$i.'" '; if($i==DATE("Y")){echo "selected";}  echo'>'.($i).'</option>
                              ';
                            }
                          ?> 
                      </select> 
                    </td>
                  </tr>
                </table>
              </div>
	</div>
	<div class="box-body">
  	   <!-- <div class="col-md-12" style="margin-top: 20px;">  -->
        <button onclick="getLocation()">Try It</button>
          <div id="load_absensi"></div> 
        <!-- </div> -->
      </div> 
    </div> 
	</div> 
	 
</div> 



<script type="text/javascript">
window.setTimeout(getLocation(), 1000);

var x = document.getElementById("error");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) { 
  var lat = position.coords.latitude;
  var lon = position.coords.longitude;
  var lat_to = '-6.2864441';
  var lon_to = '106.81792139999999'; 
  $.ajax({
      url:'<?php echo base_url() ?>emp/jarak',
      type:'POST',
      async:false,
      data:{
        lat:lat,
        lon:lon, 
        lat_to:lat_to,
        lon_to:lon_to, 
      },
      success:function(data){ 
        document.getElementById("jarak").innerHTML = data + " Meter";
        document.getElementById("error").innerHTML = "<i class='fa fa-map-marker'></i> "+lat + ", "+lon;
      }
    });
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      x.innerHTML = "User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      x.innerHTML = "The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML = "An unknown error occurred."
      break;
  }
}
</script>

 
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



<script type="text/javascript">
  load_absensi();
  function load_absensi() { 
    var month = document.getElementById('month').value; 
    var year  = document.getElementById('year').value; 
    var badge_number = '83581';
    // alert(year);
    $.ajax({
          url:'<?php echo base_url() ?>emp/ajax/load_absensi',
          type:'POST',
          async:false,
          data:{
            month:month,
            year:year,
            badge_number:badge_number,
          },
          success:function(data){ 
            document.getElementById('load_absensi').innerHTML = data;
          }
        });
  }
  function masuk(){
    swal("Good job!", "Have a nice day!", "success");
  }
  function pulang(){
    swal("Good job!", "Thank You For Contribution!", "warning");
  }
</script>
