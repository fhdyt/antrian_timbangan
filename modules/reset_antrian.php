<?php
require_once("../config/db.php");

   $query  = "UPDATE ANTRIAN_BONGKAR_MATERIAL SET ANTRIAN_STATUS='1' WHERE ANTRIAN_STATUS='0'";
   $result = mysqli_query($mysqli,$query) or die(mysqli_error());

   if( $result==true )
   {
     echo "ok";
   }
   else
   {
     echo "Gagal";
   }

?>
