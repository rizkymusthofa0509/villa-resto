
<table width="50%" border="0"> 
  <tr>
    <td>Periode</td>
    <td>:</td>
    <td><?= date_idn($start_date) ?> s/d <?= date_idn($end_date) ?></td>
  </tr>
  <tr>
    <td>Work Time</td>
    <td>:</td>
    <td><?= timeIn() ?> s/d <?=timeOut()?></td>
  </tr>
  <tr>
    <td>Report Type</td>
    <td>:</td>
    <td>Ontime</td>
  </tr>
</table>
<br>
<table class="table table-bordered table-striped" width="100%" border="1">
 <tr>
   <td class="text-center bold" width="5%">No</td>
   <td class="text-center bold">Nama Karyawan</td> 
   <td class="text-center bold">Total</td>
   <td class="text-center bold">TTD</td>
 </tr>

<?php $no=1; foreach ($emp->result() as $remp): ?>
  <?php
    date_default_timezone_set('Asia/Jakarta');
    $dari   = $start_date;
    $sampai = $end_date; 
    $hitung     = 0;
    while (strtotime($dari) <= strtotime($sampai)) {  
      if ((getTime_in($dari,$remp->badge_number) > '00:00:00') and (getTime_in($dari,$remp->badge_number) !='')){
        if (getTime_in($dari,$remp->badge_number) < timeIn()){
          $hitung = $hitung+1;
        }else{
          $hitung = $hitung+0;
        }
      }
     $dari = date ("Y-m-d", strtotime("+1 day", strtotime($dari)));//looping tambah 1 date
    } 
  ?> 

    <?php
      if ($hitung > 0){ //Tampilkan, jika jumlah terlambat lebih dari 1
        ?>
          <tr>
             <td><?= $no++ ?></td>
             <td><?= $remp->full_name ?></td> 
             <td class="text-center"><?= $hitung ?></td> 
             <td>
               <table width="100%" border="1">
                 <tr>
                   <td height="30px;" style="background-color: white;"></td>
                 </tr>
               </table>
             </td>
           </tr>
        <?php
      }
    ?>

   

<?php endforeach ?>

</table>