<?php
require_once("../config/db.php");
error_reporting(0);
$SISWA_ID    = $_POST['SISWA_ID'];

$query  = "SELECT * FROM ANTRIAN_BONGKAR_MATERIAL ORDER BY NO_ANTRIAN DESC";
$result = mysqli_query($mysqli,$query)or die(mysqli_error());
$num_row = mysqli_num_rows($result);
if(empty($num_row)){
  echo "no_data";
}
else{

while($row = mysqli_fetch_array($result))
{
$no++;
	echo "<tr>";
	echo "<td>".$no."</td>";

    echo "<td>".$row['NO_ANTRIAN']."</td>";
    echo "<td>".$row['NAMA']."</td>";
    echo "<td>".$row['JENIS_PONTON']."</td>";
    echo "<td>".$row['TANGGAL']."</td>";
    echo "<td>".$row['TONASE']."</td>";
    echo "<td>".$row['HOPER_TIMBANGAN']."</td>";
    echo "</tr>";
}

  }

?>
