<table class="table">
  <thead>
    <tr>
      <th>No.</th>
      <th>No. Antrian</th>
      <th>Nama</th>
      <th>Jenis Ponton</th>
      <th>Tanggal</th>
      <th>Tonase</th>
      <th>Hoper Timbangan</th>
    </tr>
  </thead>
  <tbody id="zona_data">

  </tbody>
</table>

<script>
  function antrian_list()
{
    $.ajax({
      type : 'POST',
      url:'modules/antrian_list.php',
      success:function(response)
      {
         if(response == "no_data"){
           $("tbody#zona_data").empty();
          $("tbody#zona_data").append("<tr><td colspan='7'><div class='callout callout-danger'>Belum ada data.</div></td></tr>");
         }
         else{
          $("tbody#zona_data").empty();
          $("tbody#zona_data").append(""+response+"");
        }
      },
      error:function()
      {
        alert("Sistem Bermasalah");
      }
    });
  }
  $(function(){ antrian_list(); });
</script>
