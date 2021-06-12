<?php foreach ($list->result() as $rlist): ?>
	<table width="130px;" border="1" style="display: inline-block;">
	  <tr>
	    <td height="130px;">
	      <?php
	      	if ($rlist->photo==""){
	      		?>
	      			<img id="output" src="<?= base_url() ?>assets/images/no.png" width="100%" height="100%" />
	      		<?php
	      	}else{
	      		?>
	      			<img id="output" src="<?= base_url() ?>assets/images/profile/<?= $rlist->photo ?>" width="100%" height="100%" />
	      		<?php
	      	}
	      ?>
	    </td>
	  </tr>
	  <tr>
	    <td align="center" bgcolor="red">
	    <font color="white">
	    	<p><b><?= substr($rlist->full_name, 0,10) ?></b><br><b><?= $rlist->badge_number ?></b></p> 	
	    </font>
	    </td>
	  </tr>
	</table> 
<?php endforeach ?>
	
