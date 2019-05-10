<?php

 //$log_text="TEstttttttttttt";
 //$file_log="test.txt";
 //echo file_put_contents($file_log,$log_text);
  //END LOG

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
     file_put_contents("file/".$no_antrian.".txt","-------------PT. PULAU SAMBU------------\n----------------Kuala Enok--------------\n========================================\n------------No.Antrian : ".$no_antrian." -----------\n========================================\nNama       : ".$nama."\nPonton     : ".$jenis_ponton."\nTanggal    : ".$tanggal."\nTonase     : ".$tonase." Ton\nHoper      : ".$hoper."\n========================================\n========================================");
     shell_exec('/opt/lampp/htdocs/ANTRIAN/modules/file/print.sh');
     echo "ok";
   }
   else
   {
     echo "Gagal";
   }
 }


?>
