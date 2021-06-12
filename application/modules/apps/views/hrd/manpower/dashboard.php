 



<!-- Content -->

<div class="row"> 
	<div class="">
		<div class="col-md-8">
	    	  <div class="box box-danger box-solid ">
	            <div class="box-header with-border">
	              <h3 class="box-title"><i class="fa fa-bank"></i> Recruitment Dashboard </h3> 
	              <div class="pull-right">
	              	
	              </div>
	            </div>
	            <div class="box-body"> 
	              <div class="col-md-12" style="margin-top: 20px;">
	                <?php foreach ($list->result() as $rlist): ?>
	                	
					  <table width="30%" style="border: 1px solid #BFBFBF;
												  background-color: white;
												  box-shadow: 10px 10px 5px #aaaaaa;float: left;">
	                 	<tr>
	                 		<td class="bold" colspan="2"> 
	                	<?=$rlist->doc_no?>
	                 		 <div class="pull-right">
	                 		 	<a href="http://career.multifab.co.id/home/detail/<?=$rlist->recruitment_id?>" title="Open " target="_blank"><i class="fa fa-desktop"></i></a>
	                 		 </div> 
	                 		</td>
	                 	</tr>
	                 	<tr>
	                 		<td valign="top" class="bold">Position</td>
	                 		<td>&nbsp;&nbsp;<?= $rlist->position ?></td>
	                 	</tr>
	                 	<tr>
	                 		<td valign="top" class="bold">Candidate</td>
	                 		<td>&nbsp;&nbsp;<?= candidate($rlist->recruitment_id)->num_rows() ?></td>
	                 	</tr>
	                 	<tr>
	                 		<td valign="top" class="bold">Status</td>
	                 		<td>&nbsp;&nbsp;<label class="label label-success">Open</label></td>
	                 	</tr>
	                 	<tr>
	                 		<td valign="top" class="bold">Plan</td>
	                 		<td>&nbsp;&nbsp;<?= date_idn($rlist->tanggal_butuh) ?></td>
	                 	</tr>
	                 	<tr>
	                 		<td colspan="2">
	                 			<a href="<?= base_url() ?>apps/employee/manpower/candidate/<?= $rlist->recruitment_id ?>" class="btn btn-sm btn-danger" style="width: 100%; border-radius: 0px;"><i class="fa fa-eye"></i> Open Candidate</a>
	                 		</td>
	                 	</tr>
	                 </table>
	                 

					<?php endforeach ?>
	              </div>
	            </div> 
	          </div> 
	    </div>
		
	</div>
	<div class="col-md-4">
          <div class="box box-danger box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"> <i class="fa fa-users"></i> Candidate Apply </h3>
               
            </div>
            <div class="box-body">
              <div class="chart">
                <div id="" style="height:400px">
                  <marquee direction = "up" width = "100%" height="100%" scrolldelay="10" scrollamount="5" onmouseover="this.stop();" onmouseout="this.start();">
                    <?php foreach ($candidate->result() as $rcandidate): ?>
                      <table width="100%" class="" style="border: 1px solid #BFBFBF;
														    background-color: white;
														    box-shadow: 10px 10px 5px #aaaaaa;">
                      	<tr>
                      		<td colspan="2" align="right">
                      			<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> <?= $rcandidate->create_date ?></small>
                      		</td> 
                      	</tr>
                      	<tr>
                      		<td class="bold" width="140px;">&nbsp;&nbsp;Full Name</td>
                      		<td><?= strtoupper($rcandidate->first_name.' '.$rcandidate->last_name) ?></td> 
                      	</tr>
                      	<tr>
                      		<td class="bold">&nbsp;&nbsp;Position</td>
                      		<td><?= $rcandidate->position ?></td> 
                      	</tr>
                      	<tr>
                      		<td class="bold">&nbsp;&nbsp;Current Salary </td>
                      		<td><?= $rcandidate->current_salary  ?></td> 
                      	</tr>
                      	<tr>
                      		<td class="bold">&nbsp;&nbsp;Contack </td>
                      		<td><?= $rcandidate->email  ?> / <?= $rcandidate->phone_number  ?></td> 
                      	</tr>
                      	<tr>
                      		<td class="bold">&nbsp;&nbsp;View Profile </td>
                      		<td><a href="<?= base_url() ?>"><i class="fa fa-eye"></i> Click More</a></td> 
                      	</tr>
                      </table>
                      <br>
                    <?php endforeach ?>
                    
                  </marquee>
                </div>
              </div>
            </div>
          </div>
        </div> 
    
</div>

<!-- End Content -->