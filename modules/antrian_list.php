<?php
require_once("../config/db.php");
error_reporting(0);
$SISWA_ID    = $_POST['SISWA_ID'];

$query  = "SELECT * FROM ANTRIAN_BONGKAR_MATERIAL WHERE ANTRIAN_STATUS='0' ORDER BY TIMBANG_STATUS DESC, NO_ANTRIAN DESC";
$result = mysqli_query($mysqli,$query)or die(mysqli_error());
$num_row = mysqli_num_rows($result);
if(empty($num_row)){
  echo "no_data";
}
else{

while($row = mysqli_fetch_array($result))
{
$no++;
if ($row['TIMBANG_STATUS'] == 'A')
{
  $class = "success";
  $button ="";
}
else {
  $class="";
  $button = "<a class='btn btn-success btn-sm' onclick='selesai_timbang(".$row['ID'].")' ID_TIMBANG='".$row['ID']."'><span class='glyphicon glyphicon-check' aria-hidden='true'></span>";
}
  $tanggal = strtotime($row['TANGGAL']);
  $id = date(('m-d'), $tanggal);

	echo "<tr class='".$class."'>";
	echo "<td>".$no."</td>";

    echo "<td>".$id."-".$row['NO_ANTRIAN']."</td>";
    echo "<td>".$row['NAMA']."</td>";
    echo "<td>".$row['JENIS_PONTON']."</td>";
    echo "<td>".$row['TANGGAL']."</td>";
    echo "<td>".$row['TONASE']."</td>";
    echo "<td>".$row['HOPER_TIMBANGAN']."</td>";
    echo "<td>".$button."</td>";
    echo "</tr>";
}

  }

?>
