
    <form id="fdata">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control nama" name="nama" id="nama" placeholder="Nama" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Jenis Ponton</label>
        <select class="form-control" class="jenis_ponton" name="jenis_ponton" id="jenis_ponton">
          <option>Ponton 1</option>
          <option>Ponton 2</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Tanggal</label>
        <input type="date" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Nama">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">No Antrian</label>
        <div class="input-group">
          <input type="text" class="form-control no_antrian" name="no_antrian" id="no_antrian" placeholder="Nama">
          <span class="input-group-btn">
            <button class="btn btn-danger" type="button">Reset</button>
          </span>
        </div><!-- /input-group -->

      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Tonase</label>
        <div class="input-group">
          <input type="text" class="form-control tonase" name="tonase" id="tonase" placeholder="Tonase">
          <span class="input-group-addon" id="basic-addon2">Ton</span>
        </div>

      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Hoper Timbangan</label>
        <select class="form-control" class="form-control hoper" name="hoper" id="hoper">
          <option>Hoper 1</option>
          <option>Hoper 2</option>
        </select>
      </div>

      <button type="button" class="btn btn-success btn_simpan">Simpan</button>
    </form>


<script>
$(".btn_simpan").on('click', function(e) {

  var form = $("#fdata").serialize();
  console.log(form)
  $.ajax({
      type : 'POST',
      url:'modules/simpan_antrian.php',
      data : form,
      success:function(response)
      {
         if(response == "ok"){
          console.log("Sukses")
          antrian_list();
          no_antrian();
          hoper_1();
          hoper_2();
          $('#fdata')[0].reset();
         }

         else{
          alert("Gagal Tersimpan")
        }
      },
      error:function()
      {
        alert("Sistem Bermasalah");
      }
    });
})




function no_antrian()
{
  $.ajax({
    type : 'POST',
    url:'modules/no_antrian.php',
    success:function(response)
    {
       if(response == "no_data"){
       }
       else{
        $(".no_antrian").val(""+response+"");
      }
    },
    error:function()
    {
      alert("Sistem Bermasalah");
    }
  });
}
$(function(){ no_antrian(); });


</script>
