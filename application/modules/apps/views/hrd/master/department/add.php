 

<!-- Content -->
<form action="<?= base_url() ?>apps/hr/master/department-save" method="POST">
  
<div class="row"> 
        
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bank"></i> Tambah Deparment</h3>
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
                <!-- <a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a> -->
                <!-- <a href="" class="btn btn-sm btn-info" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add New</a> -->
                <div class="pull-right">
                  <!-- <a href="" class="btn btn-sm btn-primary" style="border-radius: 0px;" ><i class="fa fa-print"></i> Print</a>
                  <a href="" class="btn btn-sm btn-primary" style="border-radius: 0px; background-color: green;"><i class="fa fa-file-excel-o"></i> Export Excel</a>
                  <a href="" class="btn btn-sm btn-primary" style="border-radius: 0px; background-color: green;"><i class="fa fa-file-excel-o"></i> Import Excel</a> -->
                </div>
              </div>

              <div class="col-md-12" style="margin-top: 20px;">
                <table class="dataTables table table-bordered table-striped">
                
                  <tr>
                    <td class="bold">Division</td>
                    <td>
                      <select class="form-control" name="division_id" id="division_id">
                        <?php foreach ($division->result() as $res): ?>
                          <option value="<?= $res->division_id ?>"><?= $res->name ?></option>  
                        <?php endforeach ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td class="bold">Code</td>
                    <td>
                      <input class="form-control" type="text" name="code" id="code" onkeyup="upperCode(this);">
                    </td>
                  </tr>
                  <tr>
                    <td class="bold">Name</td>
                    <td>
                      <input class="form-control" type="text" name="name" id="name" onkeyup="upperName(this);">
                    </td>
                  </tr>
                  <tr>
                    <td class="bold">Description</td>
                    <td>
                      <input class="form-control" type="text" name="description">
                    </td>
                  </tr>
                </table>
              </div>

              <div class="col-md-12">
                <a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
                <div class="pull-right">
                  <button class="btn btn-sm bg-green" style="border-radius: 0px;"><i class="fa fa-save"></i> Save</button>
                </div>
              </div>

            </div> 
          </div> 

</div>

</form>
<!-- End Content -->
<script type="text/javascript">
  function upperCode(get) {
      var str = get.value;
      var res = str.toUpperCase();
      $('#code').val(res);
    }
    function upperName(get) {
      var str = get.value;
      var res = str.toUpperCase();
      $('#name').val(res);
    }
</script>