<table width="100%" class="table table-bordered table-striped" border="1">
 <tr>
    <td class="bold" colspan="6">Badge</td>
    <td class="bold" colspan="6">Nama Karyawan</td>
    <?php
      date_default_timezone_set('Asia/Jakarta');
      $dari = $start_date;
      $sampai = $end_date;
      while (strtotime($dari) <= strtotime($sampai)) { 
        $dt = strtotime($dari);
        $day = date("d", $dt);
        $hari = date("D", $dt);
       ?> 
        <td class="bold" style="background-color: <?php if (($hari=='Sat') OR ($hari=='Sun')){echo 'red';}else{echo 'white';} ?>;"><?= $day ?></td> 
        <?php
       $dari = date ("Y-m-d", strtotime("+1 day", strtotime($dari)));//looping tambah 1 date
      } 
    ?> 
    <td class="bold">TOT</td> 
  </tr> 
  <?php
  foreach ($emp->result() as $remp) {
      ?>
          <tr>
            <td class="" colspan="6"><?= $remp->badge_number ?></td>
            <td class="" colspan="6"><?= $remp->full_name ?> </td>
            <?php
              date_default_timezone_set('Asia/Jakarta');
              $dari = $start_date;
              $sampai = $end_date;
              $totalday = 0;
              while (strtotime($dari) <= strtotime($sampai)) { 
                $dt = strtotime($dari);
                $day = date("d", $dt);
                $hari = date("D", $dt);
                $show = 0;
                if (getTime_in($dari,$remp->badge_number) > '00:00:00'){
                  $totalday = $totalday+1;
                  $show = 1;
                }else{
                  $totalday = $totalday+0;
                  $show = 0;
                }
               ?> 
                <td valign="center" align="center" style="background-color: <?php if (($hari=='Sat') OR ($hari=='Sun')){echo 'red';}else{echo 'white';} ?>;">
                  <?= $show; ?>
                </td> 
                <?php
               $dari = date ("Y-m-d", strtotime("+1 day", strtotime($dari)));//looping tambah 1 date
              } 
            ?> 
            <td class="bold" align="center"><?= $totalday; ?></td> 
          </tr> 
      <?php
    }
  ?>
</table>