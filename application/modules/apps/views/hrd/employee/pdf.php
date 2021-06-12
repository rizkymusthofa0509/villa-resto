<style type="text/css">
	.bold{
		font-weight: bold;
	}
</style> 
<table class="print table table-bordered table-striped" width="100%" id="print" border="5">
                     <tr>
                         <td class="bold" bgcolor="#faa02a" style="box-shadow: 0px 0px 36px 15px rgba(0, 0, 0, 0.28);">
                             <h1>CURRICULUM VITAE</h1>
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
                            <table width="100%" class="table table-bordered table-striped" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="bold" width="20%" valign="top">
                                        Nama Lengkap
                                    </td>
                                    <td width="70%">
                                        <?= $det['full_name']?>
                                    </td>
                                    <td class="bold" width="20%;" valign="top">
                                        Tempat & Tanggal Lahir
                                    </td>
                                    <td width="20%">
                                        <?= $det['pob']?>, <?= $det['dob']?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold" width="" valign="top">
                                        Alamat KTP
                                    </td>
                                    <td>
                                        <?= $det_address['alamat1']?>
                                    </td>
                                    <td class="bold" valign="top">
                                        Agama
                                    </td>
                                    <td>
                                        <?= $det['religion']?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold" width="" valign="top">
                                        Alamat Domisili
                                    </td>
                                    <td>
                                        <?= $det_address['alamat2']?>
                                    </td>
                                    <td class="bold" valign="top">
                                        Nomor KTP 
                                    </td>
                                    <td>
                                        <?= $det['nik']?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold" width="" valign="top">
                                        Kualifikasi Jabatan
                                    </td>
                                    <td>
                                        <?= $det['posisi']?>
                                    </td>
                                    <td class="bold" >
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
                                        <td align="right" width="20%">
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
                                        <td align="right" width="20%">
                                          <?=$training->jam_bln_thn?>
                                        </td> 
                                    </tr>
                                <?php endforeach ?>
                                  
                            </table>
                         </td>
                     </tr>
                 </table>