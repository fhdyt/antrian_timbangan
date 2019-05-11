<?php
require_once("../config/db.php");

$nama    = $_POST['nama'];
$jenis_ponton    = $_POST['jenis_ponton'];
$tanggal    = $_POST['tanggal'];
$no_antrian    = $_POST['no_antrian'];
$tonase    = $_POST['tonase'];
$hoper    = $_POST['hoper'];



 if(empty($_POST['no_antrian']))
 {

 }
 else
 {
   $query  = "INSERT INTO ANTRIAN_BONGKAR_MATERIAL (NAMA, JENIS_PONTON, TANGGAL, NO_ANTRIAN, TONASE, HOPER_TIMBANGAN, TIMBANG_STATUS, ANTRIAN_STATUS)
   VALUES ('".$nama."','".$jenis_ponton."','".$tanggal."','".$no_antrian."','".$tonase."','".$hoper."','N', '0')";
   $result = mysqli_query($mysqli,$query) or die(mysqli_error());

   if( $result==true )
   {
     $query  = "SELECT * FROM ANTRIAN_BONGKAR_MATERIAL ORDER BY ID DESC LIMIT 1";
     $result = mysqli_query($mysqli,$query)or die(mysqli_error());
     $num_row = mysqli_num_rows($result);

     while($row = mysqli_fetch_array($result))
     {
       $tanggal = strtotime($row['TANGGAL']);
       $id = date(('m-d'), $tanggal);

       file_put_contents("file/".$row['ID'].".txt","\n-------------PT. PULAU SAMBU------------\n----------------Kuala Enok--------------\n========================================\n---------No.Antrian : ".$id."-".$row['NO_ANTRIAN']." --------\n========================================\nNama       : ".$row['NAMA']."\nPonton     : ".$row['JENIS_PONTON']."\nTanggal    : ".$row['TANGGAL']."\nTonase     : ".$row['TONASE']." Ton\nHoper      : ".$row['HOPER_TIMBANGAN']."\n========================================\n========================================".chr(0xff).chr(12));
       shell_exec('lpr -l -P EPSON_LQ-310 /var/www/html/antrian_timbangan/modules/file/'.$row['ID'].'.txt');
       echo $row['ID'];
     }
   }
   else
   {
     echo "Gagal";
   }
 }


?>
