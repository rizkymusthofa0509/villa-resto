
<?php
  $push    = array();  
  $get_spd = getSpdList($start_date,$end_date);
  foreach ($get_spd as $key => $value) {
    array_push($push,$value);
  } 
  // echo print_r($push);
?> 
<table class="table table-bordered table-striped">
 <tr>
   <td class="text-center bold" width="5%">No</td>
   <td class="text-center bold">Nama Karyawan</td>
   <td class="text-center bold">Uang Makan</td>
   <td class="text-center bold">Cilegon</td>
   <td class="text-center bold">Total</td>
   <td class="text-center bold">TTD</td>
 </tr>

<?php $no=1; foreach ($emp->result() as $remp): ?>
  <?php
    date_default_timezone_set('Asia/Jakarta');
    $dari   = $start_date;
    $sampai = $end_date;
    $spd        = 0;
    $uang_makan = 0;
    foreach ($push as $cekSpd) {
      if (strpos($cekSpd->forname,$remp->badge_number)){
        $spd = $spd+25000;
      }else{
        $spd = $spd+0;
      }
    }
    while (strtotime($dari) <= strtotime($sampai)) {  
      if (UangMakan($remp->badge_number,$dari) == TRUE){
        $uang_makan = $uang_makan+1;
      }
     $dari = date ("Y-m-d", strtotime("+1 day", strtotime($dari)));//looping tambah 1 date
    } 
  ?> 
   <tr>
     <td><?= $no++ ?></td>
     <td><?= $remp->full_name ?></td>
     <td class="text-center"><?= $uang_makan; ?> x 25,000</td>
     <td class="text-center"><a data-toggle="modal" data-target="#spdlist" onclick="SpdList('<?= $remp->badge_number ?>','<?= $dari ?>','<?= $sampai ?>');"><?= rupiah($spd) ?></a></td>
     <td class="text-center"><?= rupiah(($uang_makan*25000)+$spd) ?></td>
     <td>
       <table width="100%" border="1">
         <tr>
           <td height="30px;" style="background-color: white;"></td>
         </tr>
       </table>
     </td>
   </tr>

<?php endforeach ?>

</table>