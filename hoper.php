<div class="panel panel-default">
  <div class="panel-heading">HOPER 1</div>
  <div class="panel-body">
    <p class="hoper_1" style="font-size:160%;"></p>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">HOPER 2</div>
  <div class="panel-body">
    <p class="hoper_2" style="font-size:160%;"></p>
  </div>
</div>


<script>
function hoper_1()
{
  var data = "HOPER=Hoper 1"
  $.ajax({
    type : 'POST',
    url:'modules/hoper.php',
    data : data,
    success:function(response)
    {
      console.log("Sukses")
       if(response == "no_data"){
         alert("GAGAL")
       }
       else{
         console.log(response)
        $("p.hoper_1").html(""+response+"");
      }
    },
    error:function()
    {
      alert("Sistem Bermasalah");
    }
  });
}
$(function(){ hoper_1(); });

function hoper_2()
{
  var data = "HOPER=Hoper 2"
  $.ajax({
    type : 'POST',
    url:'modules/hoper.php',
    data : data,
    success:function(response)
    {
      console.log("Sukses")
       if(response == "no_data"){
         alert("GAGAL")
       }
       else{
         console.log(response)
        $("p.hoper_2").html(""+response+"");
      }
    },
    error:function()
    {
      alert("Sistem Bermasalah");
    }
  });
}
$(function(){ hoper_2(); });
</script>
