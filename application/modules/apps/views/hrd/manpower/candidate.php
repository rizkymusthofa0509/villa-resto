


<!-- Content -->

<div class="row"> 
        
          <div class="box box-danger box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-bank"></i> Data Candidate</h3>
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
                <a onclick="window.history.back();" class="btn btn-sm bg-navy" style="border-radius: 0px;"><i class="fa fa-angle-left"></i> Back</a>
                <!-- <a href="" class="btn btn-sm btn-info" style="border-radius: 0px;"><i class="fa fa-plus"></i> Add New</a> -->
                <div class="pull-right">
                   
                </div>
              </div>

              <div class="col-md-12" style="margin-top: 20px;">
                <table class="dataTables table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="10px;">No</th> 
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Current Salary</th>
                  <th>Resume</th>
                  <th>Create date</th>
                  <th>CV file</th>  
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($candidate->result() as $rcandidate): ?>
                	<tr>
                      <td><?= $no++; ?></td>
                      <td><?= $rcandidate->first_name ?> <?= $rcandidate->last_name ?></td>
                      <td><?= $rcandidate->email ?></td>
                      <td><?= $rcandidate->phone_number ?></td>
                      <td><?= $rcandidate->current_salary ?></td>
                      <td><?= $rcandidate->resume ?></td>
                      <td><?= $rcandidate->create_date ?></td>  
                      <td> 
                      	<?php
                      		if ($rcandidate->cv!=""){
                      			?>
 <label class="label label-primary"><a target="_blank" href="http://career.multifab.co.id/assets/cv/<?= $rcandidate->cv ?>" title="Test"><font  style="color: white;"><i class="fa fa-eye"></i> Preview</font></a></label> 
                      			<?php
                      		}
                      	?>
                       
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