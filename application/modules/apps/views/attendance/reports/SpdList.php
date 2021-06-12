<?php
  $push    = array();  
  $get_spd = getSpdList('2021-01-01','2021-03-01');
  foreach ($get_spd as $key => $value) {
    array_push($push,$value);
  } 
  // echo print_r($push);
?>  
<table class="table table-bordered table-striped">
	<tr>
		<td class="bold">No</td>
		<td class="bold">SPD</td> 
		<td class="bold">Description</td>
		<td class="bold">File</td>
	</tr>
	<?php
		$no = 1;
		foreach ($push as $cekSpd) {
	      if (strpos($cekSpd->forname,$forname)){
	        ?>
	        	<tr>
					<td><?= $no++ ?></td>
					<td><?= date_idn($cekSpd->tanggal) ?><br><?= $cekSpd->spdno ?></td> 
					<td><?= $cekSpd->description ?></td>
					<td align="center">
						<a href="http://erp.multifab.co.id/erpmultifab/site/reports/spd_biaya.php?nospd=<?= $cekSpd->spdno ?>" target="_blank"><i class="fa fa-download"></i></a>
					</td>
				</tr>
	        <?php
	      } 
	    }
	?>
	
</table>