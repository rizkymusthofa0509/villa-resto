  
 <form id="form-filter">
 <!-- Filter Data -->
 <div class="row"> 
  <div class="box box-danger box-solid ">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-bank"></i> Filter Reports</h3>
      <!-- Left --> 
    </div>
    <div class="box-body">
        
      <div class="col-md-12" style="margin-top: 20px;">
         <table class="table table-bordered table-striped" style="width: 100%;"> 
          <tr>
             <td class="bold">Start date</td>
             <td>
               <input type="date" name="start_date" id="start_date" class="form-control" value="<?= date_now() ?>" >
             </td>
             <td class="bold">End date</td>
             <td>
               <input type="date" name="end_date" id="end_date" class="form-control" value="<?= date_now() ?>" >
             </td>
           </tr>
           <tr>
             <td class="bold">Division</td>
             <td>
               <select class="form-control select2me" name="division_id" id="division_id" > 
                 <option value="ALL">ALL</option>
                 <?php foreach ($div->result() as $rdiv): ?>
                   <option value="<?= $rdiv->division_id ?>"><?= $rdiv->name ?></option>
                 <?php endforeach ?> 
               </select>
             </td>
             <td class="bold">Employee</td>
             <td>
              <select class="form-control select2me" name="employee_id" id="employee_id" >
                <option value="ALL">ALL</option>
                <?php foreach ($emp->result() as $remp): ?>
                  <option value="<?= $remp->badge_number ?>"><?= $remp->badge_number ?> -  <?= $remp->full_name ?></option>
                <?php endforeach ?>
               </select>
             </td>
           </tr>
          <tr>
             <td class="bold">Report Type</td>
             <td>
               <select class="form-control select2me" name="report_type" id="report_type" > 
                 <option value="Worktime">Worktime</option> 
                 <option value="Uang Makan">Uang Makan</option> 
                 <option value="Late">Late</option> 
                 <option value="Ontime">On Time</option> 
                 <option value="Summary Attendance">Summary Attendance</option> 
               </select>
             </td>
            <td class="bold">Status Pegawai</td>
             <td>
               <select class="form-control select2me" name="status_pegawai" id="status_pegawai" > 
                 <option value="ALL">ALL</option> 
                 <option value="Multifab">Multifab</option> 
                 <option value="Outsource">Outsource</option>  
               </select>
             </td> 
           </tr>
            
         </table>

         <div class="col-md-12" style="margin-top: 20px;"> 
          <a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
          <div class="pull-right">
            <a onclick="excel_pdf();" class="btn btn-sm bg-red" style="border-radius: 0px;"><i class="fa fa-file-pdf-o"></i> Export PDF</a>
            <a onclick="excel_export();" class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-file-excel-o"></i> Export Excel</a>
            <a onclick="filter_reports();" class="btn btn-sm bg-primary" style="border-radius: 0px;"><i class="fa fa-search"></i> Process</a>
          </div> 
      </div>
      </div>
    </div> 
  </div> 
</div> 

</form>

<!-- End Filter Data -->

<!-- Report List -->

 <div class="row"> 
  <div class="box box-danger box-solid ">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-bank"></i> Report List</h3>
      <!-- Left -->
      <div class="box-tools pull-right"> 
      </div> 
    </div>
    <div class="box-body">
        
      <div class="col-md-12" style="margin-top: 20px;">
        <div class="col-md-12" style="margin-bottom: 10px;"> 
          <div class="pull-right">
            
          </div> 
        </div>
          <div id="display-filter"></div> 
      </div>
    </div> 
  </div> 
</div> 
 

<!-- End Report List -->


<script type="text/javascript">
  function filter_reports() {
    var start_date      = document.getElementById('start_date').value;
    var end_date        = document.getElementById('end_date').value;
    var division_id     = document.getElementById('division_id').value;
    var employee_id     = document.getElementById('employee_id').value;
    var report_type     = document.getElementById('report_type').value;
    var status_pegawai  = document.getElementById('status_pegawai').value;

    switch(report_type) {
      case 'Uang Makan':
        document.getElementById('display-filter').innerHTML = 'Synchronize with ERP system.';
        setTimeout(function(){ 
            document.getElementById('display-filter').innerHTML = 'Process data...';
         }, 1000); 
      break; 
      default:
       document.getElementById('display-filter').innerHTML = 'Process data...';
    }
    
    
    $.ajax({
        url:'<?php echo base_url() ?>apps/attendance/reports/filter-report',
        type:'GET',
        async:false,
        data:{
          start_date:start_date,
          end_date:end_date,
          division_id:division_id,
          employee_id:employee_id,
          report_type:report_type,
          status_pegawai:status_pegawai,
        },
        success:function(data){
          setTimeout(function(){ 
            document.getElementById('display-filter').innerHTML = data;
           }, 2000); 
        }
    });
  }

  function excel_export() {
    var start_date      = document.getElementById('start_date').value;
    var end_date        = document.getElementById('end_date').value;
    var division_id     = document.getElementById('division_id').value;
    var employee_id     = document.getElementById('employee_id').value;
    var report_type     = document.getElementById('report_type').value;
    var status_pegawai  = document.getElementById('status_pegawai').value;
    window.open('<?= base_url() ?>apps/attendance/reports/filter-report?start_date='+start_date+'&end_date='+end_date+'&division_id='+division_id+'&employee_id='+employee_id+'&status_pegawai='+status_pegawai+'&report_type='+report_type+'&pdf=FALSE&excel=TRUE');
  }
  function excel_pdf(){
    var start_date      = document.getElementById('start_date').value;
    var end_date        = document.getElementById('end_date').value;
    var division_id     = document.getElementById('division_id').value;
    var employee_id     = document.getElementById('employee_id').value;
    var report_type     = document.getElementById('report_type').value;
    var status_pegawai  = document.getElementById('status_pegawai').value;
    window.open('<?= base_url() ?>apps/attendance/reports/filter-report?start_date='+start_date+'&end_date='+end_date+'&division_id='+division_id+'&employee_id='+employee_id+'&status_pegawai='+status_pegawai+'&report_type='+report_type+'&pdf=TRUE&excel=FALSE');
  }
</script>




<!-- Modal Bootstrap SPD -->
<!-- The Modal -->
<div class="modal" id="spdlist">
  <div class="modal-dialog">
    <div class="modal-content"> 
      <!-- Modal Header -->
      <div class="modal-header" style="background-color: red;">
        <h4 class="modal-title"><font style="color: white;">Perjalanan Dinas</font></h4> 
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div id="SpdList"></div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  function SpdList(forname,start_date,end_date){

    $.ajax({
        url:'<?php echo base_url() ?>apps/attendance/SpdList',
        type:'POST',
        async:false,
        data:{
          start_date:start_date,
          end_date:end_date, 
          forname:forname, 
        },
        success:function(data){
          document.getElementById('SpdList').innerHTML = data;
          
        }
    });
  }
</script>
 