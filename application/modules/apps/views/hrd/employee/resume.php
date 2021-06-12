 

<style media="print" type="text/css">
    .print{
        -webkit-print-color-adjust: exact;
    } 
</style>
<div class="row"> 
<!-- <form action="<?= base_url() ?>apps/employee/act/update" method="POST"> -->
<?php echo form_open_multipart('apps/employee/act/update');?>
	<input type="hidden" name="employee_id" id="employee_id" value="<?= $det['employee_id']?>">
	 
	<div class="col-md-12">
		<div class="box box-danger box-solid ">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-file"></i> Curriculum Vitae</h3>
              <!-- Left -->
              <div class="box-tools pull-right">
                <a target="_blank" href="<?= base_url() ?>apps/employee/act/pdf/<?= $det['employee_id']?>" class="btn bg-white bg-sm"><i class="fa fa-print"></i> Cetak</a>
              </div>
              <!-- End Left --> 
            </div>
            <div class="box-body">
			 <div class="col-md-12">
                 <table class="print table table-bordered table-striped" width="50%" id="print" border="5">
                     <tr>
                         <td class="bold" bgcolor="#faa02a" style="box-shadow: 0px 0px 36px 15px rgba(0, 0, 0, 0.28);">
                             CURRICULUM VITAE
                         </td>
                     </tr>
                     <tr>
                         <td>
                             <table class="" border="0" width="100%">
                                 <tr>
                                     <td valign="top" width="50%">
                                         <table>
                                             <tr>
                                                 <td><h1 style="font-family:'Lucida Console';"><?= $det['full_name']?></h1></td>
                                             </tr>
                                             <tr>
                                                 <td class="bold">PT. MULTI FABRINDO GEMILANG</td>
                                             </tr>
                                             <tr>
                                                 <td>
                                                     Perum Pondok Jaya Indah blok F3 No.1 Rt.45/Rw13
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>
                                                     <i class="fa fa-mobile"></i> <?= $det['mobile']?> | 
                                                     <i class="fa fa-envelope"></i> <?= $det['email']?>
                                                 </td>
                                             </tr>
                                             
                                         </table>
                                     </td>
                                     <td valign="top" width="50%">
                                         <table width="100%">
                                             <tr>
                                                 <td align="right">
                                                    <div align="right">
                                                         <?php
                                                            if ($det['photo']==""){
                                                                ?>
                                                                    <img id="output" src="<?= base_url() ?>assets/images/no.png" width="180px;" height="210px;" style="border:5px solid #021a40;" />
                                                                <?php
                                                            }else{
                                                                ?>
                                                                    <img id="output" src="<?= base_url() ?>assets/images/profile/<?= $det['photo'] ?>" height="210px;" style="border:5px solid #021a40;" />
                                                                <?php
                                                            }
                                                        ?>
                                                    </div>
                                                 </td>
                                             </tr>
                                         </table>
                                     </td>
                                 </tr>
                             </table>
                         </td>
                     </tr> 
                     <tr>
                         <td class="bold" bgcolor="#faa02a">
                            <i class="fa fa-user"></i>  BIODATA KARYAWAN
                         </td>
                     </tr>
                     <tr>
                         <td>
                            <table width="100%" class="table table-bordered table-striped ">
                                <tr>
                                    <td class="bold" width="200px;">
                                        Nama Lengkap
                                    </td>
                                    <td>
                                        <?= $det['full_name']?>
                                    </td>
                                    <td class="bold" width="200px;">
                                        Tempat & Tanggal Lahir
                                    </td>
                                    <td width="300px;">
                                        <?= $det['pob']?>, <?= $det['dob']?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold" width="200px;">
                                        Alamat KTP
                                    </td>
                                    <td>
                                        <?= $det_address['alamat1']?>
                                    </td>
                                    <td class="bold">
                                        Agama
                                    </td>
                                    <td>
                                        <?= $det['religion']?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold" width="200px;">
                                        Alamat Domisili
                                    </td>
                                    <td>
                                        <?= $det_address['alamat2']?>
                                    </td>
                                    <td class="bold">
                                        Nomor KTP 
                                    </td>
                                    <td>
                                        <?= $det['nik']?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold" width="200px;">
                                        Kualifikasi Jabatan
                                    </td>
                                    <td>
                                        <?= $det['posisi']?>
                                    </td>
                                    <td class="bold">
                                        Status Pernikahan
                                    </td>
                                    <td>
                                        <?= $det['marital']?>
                                    </td>
                                </tr>
                                 
                            </table>
                         </td>
                     </tr>
                     <tr>
                         <td class="bold" bgcolor="#faa02a">
                            <i class="fa fa-suitcase"></i> PENGALAMAN KERJA
                         </td>
                     </tr>
                     <tr>
                         <td>
                            <table width="100%" class="table table-bordered table-striped ">
                                <?php foreach ($det_experience->result() as $experience): ?>
                                    <tr>
                                        <td class="" width="">
                                           <b> <?= $experience->nama_perusahaan ?> (<?= $experience->bidang_usaha ?>)</b><br>
                                           <?= $experience->departemen ?> - <?= $experience->posisi ?>
                                        </td>
                                        <td align="right" width="200px;">
                                           <?= $experience->dari ?> s/d <?= $experience->sampai ?>
                                        </td> 
                                    </tr> 
                                <?php endforeach ?>
                                 
                            </table>
                         </td>
                     </tr>
                     <tr>
                         <td class="bold" bgcolor="#faa02a">
                            <i class="fa fa-university"></i> SERTIFIKAT TRAINING KEAHLIAN
                         </td>
                     </tr>
                     <tr>
                         <td>
                             <table width="100%" class="table table-bordered table-striped ">
                                <?php foreach ($det_training->result() as $training): ?>
                                    <tr>
                                        <td class="" width="">
                                           <b><?=$training->lembaga?>, <?=$training->bidang?></b><br>
                                           <?=$training->kota?>
                                        </td>
                                        <td align="right" width="200px;">
                                          <?=$training->jam_bln_thn?>
                                        </td> 
                                    </tr>
                                <?php endforeach ?>
                                  
                            </table>
                         </td>
                     </tr>
                 </table>
             </div>

            </div> 
          </div> 

	</div>
        
</form>     
</div> 

<script type="text/javascript">
    function cetak() {
        var printContents = document.getElementById('print').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents; 
     window.print(); 
     document.body.innerHTML = originalContents;
    }
</script>