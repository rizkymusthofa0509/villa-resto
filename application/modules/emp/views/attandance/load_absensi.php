 <ul class="todo-list">
     	
 	<?php
 		if ($list->num_rows() > 0){
 			?>
 				<?php foreach ($list->result() as $rlist): ?>
		        	 <li>
		              <!-- <span class="handle">
		                    <i class="fa fa-ellipsis-v"></i>
		                    <i class="fa fa-ellipsis-v"></i>
		                  </span>  -->
		              <!-- <input type="checkbox" value="">  -->
		              <span class="text"><?= hari(date("D", strtotime($rlist->tanggal))); ?>, <?= date_idn($rlist->tanggal) ?> </span> 
		              <span class="text"><?php if ($rlist->time_in!=''){echo substr($rlist->time_in,0,5);} ?><?php if ($rlist->time_out!=''){echo ' ~ '.substr($rlist->time_out,0,5);} ?></span>  
		              <div class="pull-right">
		                <small class="label label-success" style="font-size:50%;"> <?= timeHours($rlist->time_in,$rlist->time_out)['jam'].' Jam '.timeHours($rlist->time_in,$rlist->time_out)['menit'].' Menit'; ?></small> 
		              </div>
		            </li> 
		        <?php endforeach ?>
 			<?php
 		}else{
 			?>
	        	 <li>
	              <!-- <span class="handle">
	                    <i class="fa fa-ellipsis-v"></i>
	                    <i class="fa fa-ellipsis-v"></i>
	                  </span>  -->
	              <!-- <input type="checkbox" value="">  -->
	              <span class="text">No Data! </span> 
	            </li> 
 			<?php
 		}
 	?>

        
         
         
</ul>