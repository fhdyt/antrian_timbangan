
    <form id="fdata">
      <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control nama" name="nama" id="nama" placeholder="Nama" autocomplete="off">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Tonase</label>
        <div class="input-group">
          <input type="number" class="form-control tonase" name="tonase" id="tonase" placeholder="Tonase">
          <span class="input-group-addon" id="basic-addon2">Ton</span>
        </div>

      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Tanggal</label>
        <input type="date" class="form-control tanggal" name="tanggal" id="tanggal" placeholder="Nama" value="<?php echo date("Y-m-d") ?>" readonly>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">No Antrian</label>
        <div class="input-group">
          <input type="text" class="form-control no_antrian" name="no_antrian" id="no_antrian" readonly placeholder="Nama">
          <span class="input-group-btn">
            <button class="btn btn-danger" onclick="reset_antrian()" type="button">Reset</button>
          </span>
        </div><!-- /input-group -->

      </div>
      <div class="form-group" hidden>
        <label for="exampleInputEmail1">Jenis Ponton</label>
        <input type="text" class="form-control jenis_ponton" name="jenis_ponton" id="jenis_ponton" placeholder="" readonly>
        <!-- <select class="form-control" class="jenis_ponton" name="jenis_ponton" id="jenis_ponton">
          <option>Pilih</option>
          <option value="1">Ponton 1</option>
          <option value="2">Ponton 2</option>
        </select> -->
      </div>
      <div class="form-group" hidden>
        <label for="exampleInputEmail1">Hopper Timbangan</label>
        <input type="text" class="form-control hoper" name="hoper" id="hoper" placeholder="" readonly>
        <!-- <select class="form-control" class="form-control hoper" name="hoper" id="hoper">
          <option>Pilih</option>
          <option>Hoper 1</option>
          <option>Hoper 2</option>
        </select> -->
      </div>

      <button type="button" class="btn btn-success btn_simpan">Simpan</button>
    </form>


<script>

$('.nama').focus();
function cek_ponton_dan_hoper(){
  var ponton_1_hoper_1 = $('.ponton_1_hoper_1').text();
  var ponton_1_hoper_2 = $('.ponton_1_hoper_2').text();
  var ponton_2_hoper_1 = $('.ponton_2_hoper_1').text();
  var ponton_2_hoper_2 = $('.ponton_2_hoper_2').text();

  var terkecil = Math.min(ponton_1_hoper_1, ponton_1_hoper_2, ponton_2_hoper_1, ponton_2_hoper_2);
  console.log("ponton : "+ponton_1_hoper_2)
  console.log(terkecil)
  if (ponton_1_hoper_1 == terkecil){
    $('.jenis_ponton').val('Ponton 1')
    $('.hoper').val('Hopper 1')
  }
  else if (ponton_1_hoper_2 == terkecil){
    $('.jenis_ponton').val('Ponton 1')
    $('.hoper').val('Hopper 2')
  }
  else if (ponton_2_hoper_1 == terkecil){
    $('.jenis_ponton').val('Ponton 2')
    $('.hoper').val('Hopper 1')
  }
  else if (ponton_2_hoper_2 == terkecil){
    $('.jenis_ponton').val('Ponton 2')
    $('.hoper').val('Hopper 2')
  }
  else{
    console.log("gagal")
  }
}
$(function(){ cek_ponton_dan_hoper(); });

function simpan_antrian(){
  cek_ponton_dan_hoper();
  var form = $("#fdata").serialize();
  if($('.nama').val() == '')
  {
    alert('Nama tidak boleh kosong')
    $('.btn_simpan').removeAttr('disabled')
  }
  else if($('.tonase').val() == '')
  {
    alert('Tonase tidak boleh kosong')
    $('.btn_simpan').removeAttr('disabled')
  }
  else {
  $.ajax({
      type : 'POST',
      url:'modules/simpan_antrian.php',
      data : form,
      success:function(response)
      {
         if(response == "gagal")
         {
            alert("Gagal");
         }

         else{

            antrian_list();
            no_antrian();
            ponton_1_hoper_1()
            ponton_1_hoper_2()
            ponton_2_hoper_1()
            ponton_2_hoper_2()
            $('.nama').val('');
            $('.tonase').val('');
            $('.nama').focus();
            $('.btn_simpan').removeAttr('disabled')
        }
      },
      error:function()
      {
        alert("Sistem Bermasalah");
      }
    });
  }
}

$(document).on('keypress',function(e) {
    if(e.which == 13) {
      $('btn_simpan').attr('disabled','disabled')
        simpan_antrian();
    }
});
$('.tanggal').data('date')
$(".btn_simpan").on('click', function(e) {
  $(this).attr('disabled','disabled')
	simpan_antrian();
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

function reset_antrian(){
  {
    $.ajax({
      type : 'POST',
      url:'modules/reset_antrian.php',
      success:function(response)
      {
         if(response == "no_data"){
         }
         else{
           antrian_list();
           no_antrian();
           ponton_1_hoper_1()
           ponton_1_hoper_2()
           ponton_2_hoper_1()
           ponton_2_hoper_2()
           cek_ponton_dan_hoper()
           $('.nama').focus();
        }
      },
      error:function()
      {
        alert("Sistem Bermasalah");
      }
    });
  }
}
</script>
