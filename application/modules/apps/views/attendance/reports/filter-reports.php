
 
<table class="" cellpadding="0" cellspacing="0" border="0" width="100%">
  <?php
  if ($emp->num_rows() == 0){
    echo "Tidak ada data.";
  }else{ 
  foreach ($emp->result() as $remp) {
      ?>
          <tr>
            <td class="bold" colspan="6">
              <table border="0" width="40%">
                <tr>
                  <td width="100px;" align="left">
                    Badge  
                  </td>
                  <td>
                    <?= $remp->badge_number ?> 
                  </td>
                </tr>
                <tr>
                  <td width="100px;" align="left">
                    Nama 
                  </td>
                  <td>
                    <?= $remp->full_name ?> 
                  </td>
                </tr>
                <tr>
                  <td width="100px;" align="left">
                    Jabatan
                  </td>
                  <td>
                    <?= $remp->posisi ?> 
                  </td>
                </tr>
                <tr>
                  <td width="100px;" align="left">
                    Periode
                  </td>
                  <td>
                    <?= date_idn($start_date).' s/d '.date_idn($end_date)?> 
                  </td>
                </tr>
              </table> 
            </td>
          </tr>
          <tr>
            <td colspan="6">
              <table width="100%;" border="1" cellpadding="0" cellspacing="0">
                <tr>
                  <td  class="bold" width="10%;"><b>Hari</b></td>
                  <td  class="bold" width="10%;"><b>Tanggal</b></td>
                  <td  class="bold text-center" width="10%;" align="center"><b>Jam Kerja</b></td>
                  <td  class="bold text-center" width="5%;" align="center"><b>Jam Masuk</b></td>
                  <td  class="bold text-center" width="5%;" align="center"><b>Jam Keluar</b></td>
                  <td  class="bold text-center" width="5%;" align="center"><b>Terlambat</b></td>
                  <td  class="bold text-center" width="10%;" align="center"><b>Cepat Pulang</b></td>
                  <td  class="bold text-center" width="10%;" align="center"><b>Lembur</b></td>
                  <td  class="bold text-center" width="10%;" align="center"><b>Jumlah Jam</b></td>
                  <td  class="bold text-center" width="100px;" align="center"><b>Catatan</b></td>
                </tr>
                <?php
                  date_default_timezone_set('Asia/Jakarta');
                  $dari = $start_date;
                  $sampai = $end_date; 

                  //Total working time  
                  $tot_workingtime = array();
                  $tot_HitungTerlambat = array();
                  $tot_HitungPulangCepat = array();
                  $tot_HitungLembur = array();


                  //Catatan
                  $telat = 0; //Terlambat Masuk
                  $cepat = 0; //Terlambat Cepat
                  $no_in = 0; //Tidak Absen Masuk
                  $no_out = 0; // Tidak Absen Pulang
                  while (strtotime($dari) <= strtotime($sampai)) { 
                    $dt = strtotime($dari);
                    $day = date("D", $dt);

                    /*Jam Masuk Karyawan*/
                    $getTime_in  = getTime_in($dari,$remp->badge_number);

                    /*Jam Pulang Karyawan*/
                    $getTime_out = getTime_out($dari,$remp->badge_number);
                    
                    /*Hitung Terlambat*/
                    $HitungTerlambat    = HitungTerlambat($dari,$remp->badge_number);
                    array_push($tot_HitungTerlambat, $HitungTerlambat['jam'].':'.$HitungTerlambat['menit']);

                    /*Hitung Pulang Cepat*/
                    $HitungPulangCepat  = HitungPulangCepat($dari,$remp->badge_number);
                    array_push($tot_HitungPulangCepat, $HitungPulangCepat['jam'].':'.$HitungPulangCepat['menit']); 
                    
                    /*Hitung Jam Lembur*/
                    $HitungLembur       = HitungLembur($dari,$remp->badge_number);
                    array_push($tot_HitungLembur, $HitungLembur['jam'].':'.$HitungLembur['menit']);

                    /*Hitung Jam Kerja*/
                    $workingTime = timeHours($getTime_in,$getTime_out);
                    array_push($tot_workingtime, $workingTime['jam'].':'.$workingTime['menit']);


                    //Catatan
                    if ( ($getTime_in >= timeIn().':59') AND ($getTime_in!='00:00') AND (offDay($dari) == FALSE)){
                      $telat = $telat+1;
                    } 
                    if ( ($HitungPulangCepat['jam']>0) OR ($HitungPulangCepat['menit']>0) AND (offDay($dari) == FALSE)){
                      $cepat = $cepat+1;
                    } 
                    if (($getTime_in == '00:00') AND (offDay($dari)==FALSE)){
                      $no_in = $no_in+1;
                    }   
                    if (($getTime_out == '00:00') AND (offDay($dari)==FALSE)){
                      $no_out = $no_out+1;
                    }     
                   ?>
                      <tr style="background-color: <?php if (offDay($dari) == TRUE){echo 'red';}else{echo 'white';} ?>;">
                        <td>&nbsp;<?= hari($day) ?></td>
                        <td>&nbsp;<?= date_idn($dari) ?></td>
                        <td class="text-center" align="center"><?= timeIn(); ?> - <?= timeOut(); ?></td> 
                        <td class="text-center" align="center"><?= $getTime_in; ?></td>
                        <td class="text-center" align="center"><?= $getTime_out; ?></td>
                        <td class="text-center" align="center"><?= $HitungTerlambat['jam'].'h'.$HitungTerlambat['menit'].'m'; ?></td>
                        <td class="text-center" align="center"><?= $HitungPulangCepat['jam'].'h'.$HitungPulangCepat['menit'].'m'; ?></td>
                        <td class="text-center" align="center"><?= $HitungLembur['jam'].'h'.$HitungLembur['menit'].'m'; ?></td> 
                        <td class="text-center" align="center">
                          <?= $workingTime['jam'] ?>h<?= $workingTime['menit'] ?>m 
                        </td>
                        <td class="" align="left">&nbsp;
                          <?php if (offDay($dari)==TRUE){
                              echo offDayReturn($dari);
                            }else{
                              echo CatatanAttandance($dari,$remp->badge_number);
                            } ?></td>
                      </tr> 
                    <?php
                   $dari = date ("Y-m-d", strtotime("+1 day", strtotime($dari)));//looping tambah 1 date
                  } 

                ?> 
                <tr>
                  <td colspan="5" align="center"><b>Jumlah</b></td>
                  <td align="center"><b><?= sum_time($tot_HitungTerlambat) ?></b></td>
                  <td align="center"><b><?= sum_time($tot_HitungPulangCepat) ?></b></td>
                  <td align="center"><b><?= sum_time($tot_HitungLembur) ?></b></td>
                  <td align="center"><b><?= sum_time($tot_workingtime) ?></b></td>
                  <td align="center"><b></b></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="6">
              <table width="40%" border="0">
                <tr>
                  <td colspan="3"><b>Catatan</b></td> 
                </tr>
                <tr>
                  <td width="30%">1. Terlambat Masuk</td>
                  <td width="1%">:</td>
                  <td width=""> <?= number_format($telat); ?> Kali</td>
                </tr>
                <tr>
                  <td>2. Pulang Cepat</td>
                  <td>:</td>
                  <td> <?= number_format($cepat); ?> Kali</td>
                </tr>
                <tr>
                  <td>3. Tidak Absen Masuk</td>
                  <td>:</td>
                  <td> <?= number_format($no_in); ?> Kali</td>
                </tr>
                <tr>
                  <td>4. Tidak Absen Pulang</td>
                  <td>:</td>
                  <td> <?= number_format($no_out); ?> Kali</td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td colspan="6" height="30px;"></td>
          </tr> 
      <?php
      $telat = 0; //Terlambat Masuk
      $cepat = 0; //Terlambat Cepat
      $no_in = 0; //Tidak Absen Masuk
      $no_out = 0; // Tidak Absen Pulang
    }
  }
  ?> 

</table>




<?php
  function sum_time($data) {
    $i = 0;
    foreach ($data as $time) {
        sscanf($time, '%d:%d', $hour, $min);
        $i += $hour * 60 + $min;
    }
    if ($h = floor($i / 60)) {
        $i %= 60;
    }
    return sprintf('%02dh%02dm', $h, $i);
}
?>