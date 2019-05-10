<?php
require_once("../config/db.php");
$query  = "SELECT * FROM ANTRIAN_BONGKAR_MATERIAL ORDER BY ID DESC LIMIT 1";
$result = mysqli_query($mysqli,$query)or die(mysqli_error());
$num_row = mysqli_num_rows($result);

while($row = mysqli_fetch_array($result))
{
  echo $row['ID'];
}
?>
