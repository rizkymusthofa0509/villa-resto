<table width="100%" class="table table-bordered table-striped">
	<tr>
		<td height="130px;" width="130px;">
			<?php
	      	if ($list['photo']==""){
	      		?>
	      			<img id="output" src="<?= base_url() ?>assets/images/no.png" width="100%" height="100%" />
	      		<?php
	      	}else{
	      		?>
	      			<img id="output" src="<?= base_url() ?>assets/images/profile/<?= $list['photo'] ?>" width="100%" height="100%" />
	      		<?php
	      	}
	      ?>
	    </td>
	    <td>
	    	<table class="table table-bordered table-striped">
	    		
	    		<tr>
	    			<td class="bold" width="200px;">Badge Number</td>
	    			<td><?= $list['badge_number'] ?></td>
	    		</tr>
	    		<tr>
	    			<td class="bold">Nama</td>
	    			<td><?= $list['full_name'] ?></td>
	    		</tr>
	    		<tr>
	    			<td class="bold">Waktu</td>
	    			<td><?= $list['time_in'] ?></td>
	    		</tr>
	    	</table>
	    </td>
	</tr>
</table>
<?php 
	if ( $list['dob']!="" ){
		if ( substr($list['dob'],5,10)==DATE("m-d") ){
			?>
				<div class="alert alert-success" role="alert">
				  <h4 class="alert-heading">Happy Birthday <?= $list['full_name'] ?>!</h4>
				  <p>Selamat ulang tahun, semoga hari-harimu menyenangkan dan mendapat tahun yang lebih baik lagi.</p> 
				</div>
			<?php
		}
	}
 ?>