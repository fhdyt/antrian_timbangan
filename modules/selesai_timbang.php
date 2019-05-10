<?php
require_once("../config/db.php");

$id    = $_POST['ID'];

if(empty($id)){
  echo "no_data";
}
else{
   $query  = "UPDATE ANTRIAN_BONGKAR_MATERIAL SET TIMBANG_STATUS='A' WHERE ID='".$id."'";
   $result = mysqli_query($mysqli,$query) or die(mysqli_error());

   if( $result==true )
   {
     echo "ok";
   }
   else
   {
     echo "Gagal";
   }
}

?>
