<?php
require_once("../config/db.php");

$query  = "SELECT NO_ANTRIAN FROM ANTRIAN_BONGKAR_MATERIAL WHERE ANTRIAN_STATUS='0' ORDER BY NO_ANTRIAN DESC LIMIT 1 ";
$result = mysqli_query($mysqli,$query)or die(mysqli_error());
$num_row = mysqli_num_rows($result);
if(empty($num_row)){
  echo "001";
}
else
{

while($row = mysqli_fetch_array($result))
{
$no_antrian = $row['NO_ANTRIAN'] + 1;
$number = str_pad($no_antrian, 3, '0', STR_PAD_LEFT);
echo $number;
}

  }

?>
