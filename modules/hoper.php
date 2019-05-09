<?php
require_once("../config/db.php");
error_reporting(0);
$hoper    = $_POST['HOPER'];

$query  = "SELECT SUM(TONASE) AS TOTAL_TIMBANG FROM ANTRIAN_BONGKAR_MATERIAL WHERE HOPER_TIMBANGAN='".$hoper."' AND TIMBANG_STATUS='N'";
$result = mysqli_query($mysqli,$query)or die(mysqli_error());
$num_row = mysqli_num_rows($result);
if(empty($num_row)){
  echo "no_data";
}
else{

while($row = mysqli_fetch_array($result))
{
    $total_hoper += $row['TONASE'];
    echo $row['TOTAL_TIMBANG'];
}

  }

?>
