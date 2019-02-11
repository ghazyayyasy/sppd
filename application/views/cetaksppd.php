
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Perjalanan Dinas</title>
    <link href="<?=base_url('assets/')?>css/formatsurat/sppd.css" rel="stylesheet">
    <script type="text/javascript">
   
      window.print();
    
    </script>

</head>

<body style="font-size: 15px" >
    <page size="A4">
        <div class="padding-10mm">
            <table class="align-center" border="0px" width="100%">
                <td width="20%">
                   <img style="max-width:40%;height:auto;" src="<?=base_url('assets/icon_image/logoKebumen.png')?>"> 
               </td>
        </div>
               <td>
                <table class="align-center" border="0" width="100%">
                    <tr>
                        <td class="bold f20">PEMERINTAH KABUPATEN KEBUMEN</td>
                    </tr>
                    <tr>
                        <td class="bold f16">DINAS KOMUNIKASI DAN INFORMATIKA</td>
                    </tr>
                    <tr>
                        <td class="">Jl. Kutoarjo No. 6 Panjer, Kebumen Telp/Fax 0287-383349 <br> 
                        </td>
                    </tr>
                </table>
            </td>

        </table>
        <div class="garis5p"></div>
        <div class="garis1p"></div>
        <br>
        <div class="content">

            <table class="align-center" width="100%" border="0">
                <tr> 
                    <td style="font-weight: bold; text-decoration: underline; font-size: 18px">
                        SURAT PERINTAH PERJALANAN DINAS
                    </td>
                </tr>
                <tr>
                    <td>
                       Nomor : <?=$data->no_sppd?>/125/SPPD/12/2019
                   </td>
               </tr>
           </table>
           <br>
       </div>

       <!-- isi -->
       <div class="content">
        <table class="mainTable" width="100%" >
           <tr>
               <td width="2%"> 1. </td>
               <td colspan="2" width="40%"> Pejabat yang memberi perintah </td>
               <td width="1%">:</td>
               <td colspan="3" style="text-transform: uppercase;"> Kepala Dinas Kominfo</td>
           </tr>
           <tr>
               <td width="2%"> 2. </td>
               <td colspan="2" width="40%"> Nama pegawai yang diperintahkan </td>
               <td width="1%">:</td>
               <td colspan="3"> <?=$data->nama_pegawai?></td>
           </tr>
           <tr>
               <td rowspan="2" width="2%"> 3. </td>
               <td width="1%">a.</td>
               <td width="40%"> Pangkat dan golongan menurut PP No. 6 Th. 1997 </td>
               <td width="1%">:</td>
               <td colspan="3"> <?=$data->nama_gp?> </td>
           </tr>
           <tr>
               <td width="1%">b.</td>
               <td width="40%"> Jabatan </td>
               <td width="1%">:</td>
               <td colspan="3"><?=$data->nama_jabatan?></td>
           </tr>
           <tr>
               <td width="2%">4.</td>
               <td colspan="2" width="40%"> Maksud perjalanan dinas </td>
               <td width="1%">:</td>
               <td colspan="3"><?=$data->maksud?></td>
           </tr>
           <tr>
               <td width="2%">5.</td>
               <td colspan="2" width="40%"> Alat angkut yang dipergunakan </td>
               <td width="1%">:</td>
               <td colspan="3">
               <?php 
                if ($data->transport_berangkat == $data->transport_pulang)
                    echo $data->transport_berangkat;
                else
                    echo "Transportasi Berangkat : ".$data->transport_berangkat."; " ."Transportasi Pulang : ".$data->transport_pulang;
               ?> </td>
           </tr>
           <tr>
               <td rowspan="2" width="2%">6.</td>
               <td width="1%">a.</td>
               <td width="40%"> Tempat berangkat </td>
               <td width="1%">:</td>
               <td colspan="3">Kebumen</td>
           </tr>
           <tr>
               <td width="1%">b.</td>
               <td width="40%"> Tempat tujuan </td>
               <td width="1%">:</td>
               <td colspan="3"><?=$data->rute?></td>
           </tr>
           <tr>
                <?php
                    $date1=date_create($data->tgl_berangkat);
                    $date2=date_create($data->tgl_berakhir);
                    $diff=date_diff($date1,$date2);
                ?>
               <td rowspan="3" width="2%">7. </td>
               <td width="1%">a.</td>
               <td width="40%"> Lamanya perjalanan dinas </td>
               <td width="1%">:</td>
               <td colspan="3"><?=$diff->format("%a");?> hari </td>
           </tr>
           <tr>
               <td width="1%">b.</td>
               <td width="40%"> Tanggal berangkat </td>
               <td width="1%">:</td>
               <td colspan="3"><?=date_indo($data->tgl_berangkat)?></td>
           </tr>
           <tr>
               <td width="1%">c.</td>
               <td width="40%"> Tanggal harus kembali </td>
               <td width="1%">:</td>
               <td colspan="3"><?=date_indo($data->tgl_berakhir)?></td>
           </tr>
           <!-- <tr>
               <td width="2%">8. </td>
               <td colspan="2" width="40%"> Pengikut </td>
               <td width="1%">:</td>
               <td width="2%">1.</td>
               <td width="20%">< Bawono > </td>
               <td width="15%"> Golongan III/a</td>
           </tr> -->
           <tr >
               <td rowspan="3" width="2%" >8. </td>
               <td colspan="2" width="40%"> Pembebanan anggaran </td>
               <td width="1%">:</td>
               <td colspan="3"><b></td>
               </tr>
               <tr>
                   <td width="1%">a.</td>
                   <td width="40%"> Instansi </td>
                   <td width="1%">:</td>
                   <td colspan="7">Dinas Kominfo Kabupaten Kebumen </td>
               </tr>
               <tr>
                   <td width="1%">b.</td>
                   <td width="40%"> Mata Anggaran </td>
                   <td width="1%">:</td>
                   <td colspan="3"> 
                   <?php
                        if ($data->rute == "Kebumen")
                            echo "5.2.2.15.01";
                        else
                            echo "5.2.2.15.02";

                   ?>
                   </td>
               </tr>
               <tr>
                   <td width="2%">9. </td>
                   <td colspan="2" width="40%"> Keterangan lain-lain </td>
                   <td width="1%">:</td>
                   <td colspan="3"> </td>
               </tr>
           </table>
       </div>
       <!-- Footer  -->
       <table width="100%" border="0" >
 
       </table>
       <br><br>
       <table width="100%" border="0">
        <tr>
            <td width="55%"></td>
            <td width="45%">
                <table width="100%">
                    <tr>
                        <td width="85%" style="text-align: center;"> Kebumen, <?=date_indo($data->tgl_berangkat) ?></td>
                    </tr>
                  
                        <tr>
                            <td width="85%" style="text-align: center;">Kepala Dinas Komunikasi Dan Informatika</td>
                        </tr>
                        <tr>
                            <td width="85%" style="text-align: center;">Kabupaten Kebumen</td>
                        </tr>
                        <tr>
                            <td width="85%">&nbsp;</td>
                        </tr>
                        <tr>
                            <tr>
                                <td width="85%">&nbsp;</td>
                            </tr>
                            <tr>
                                <td width="85%"></td>
                            </tr>
                            <tr>
                                <td width="85%" style="text-align: center; font-weight: bold; text-decoration: underline;"> COKRO AMINOTO, S.I.P.M.Kes </td>
                            </tr>                    
                            <!-- <tr>
                                <td width="85%" style="text-align: center;">KEPALA DINAS KOMUNIKASI DAN INFORMATIKA </td>
                            </tr> -->
                            <tr>
                                <td width="85%" style="text-align: center;">NIP. 19661129 198702 1 004 </td>
                            </tr>
                        </table>
                    </td>
</page>
</body>
</html>