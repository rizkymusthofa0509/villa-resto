  
 <form action="<?= base_url() ?>apps/attendance/settings/location-update" method="post">
 <div class="row"> 
  <div class="box box-danger box-solid ">
    <div class="box-header with-border">
      <h3 class="box-title"><i class="fa fa-bank"></i> Add Location</h3>
      <!-- Left -->
      <div class="box-tools pull-right">
        
      </div>
      <!-- End Left --> 
    </div>
    <div class="box-body">

       
      <div class="col-md-12" style="margin-top: 20px;">
         <table class="table table-bordered table-striped"> 
          <tr>
             <td class="bold">Nama Lokasi</td>
             <td>
               <input type="hidden" name="location_id" id="location_id" class="form-control" value="<?= $det['location_id'] ?>" >
               <input type="text" name="name" id="name" class="form-control" value="<?= $det['name'] ?>" >
             </td>
             <td class="bold">Latitude</td>
             <td>
               <input type="text" name="lat" id="lat" class="form-control" value="<?= $det['lat'] ?>" >
             </td>
           </tr>
           <tr>
             <td class="bold">Deskripsi</td>
             <td>
                <input type="text" name="description" id="description" class="form-control" value="<?= $det['description'] ?>" >
             </td>
             <td class="bold">Longitude</td>
             <td>
               <input type="text" name="lon" id="lon" class="form-control" value="<?= $det['lon'] ?>" >
             </td>
           </tr>
           <tr>
             <td class="bold">Radius</td>
             <td >
               <div class="input-group"> 
                  <input   type="number" name="radius" id="radius" class="form-control" value="<?= $det['radius'] ?>" >
                  <span class="input-group-addon">m</span>
                </div> 
             </td>  
           </tr>
            
         </table>

         <div class="col-md-12" style="margin-top: 20px;"> 
          <a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
          <div class="pull-right">
            <button class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-save"></i> Save</button>
          </div> 
      </div>
      </div>
    </div> 
  </div> 
</div> 
 
</form> 