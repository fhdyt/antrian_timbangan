<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Ponton 1</div>
  <ul class="list-group">
    <li class="list-group-item"><b>Hopper 1</b><p class="ponton_1_hoper_1" style="font-size:170%;"></p></li>
    <li class="list-group-item"><b>Hopper 2</b><p class="ponton_1_hoper_2" style="font-size:170%;"></p></li>
  </ul>
</div>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Ponton 2</div>
  <ul class="list-group">
    <li class="list-group-item"><b>Hopper 1</b><p class="ponton_2_hoper_1" style="font-size:170%;"></p></li>
    <li class="list-group-item"><b>Hopper 2</b><p class="ponton_2_hoper_2" style="font-size:170%;"></p></li>
  </ul>
</div>
<script>
//////////////////////////////////////////// PONTON 1 //////////
function ponton_1_hoper_1()
{
  var data = "PONTON=Ponton 1&HOPER=Hoper 1"
  $.ajax({
    type : 'POST',
    url:'modules/hoper.php',
    data : data,
    success:function(response)
    {
       if(response == "no_data"){
         alert("GAGAL")
       }
       else{
        $("p.ponton_1_hoper_1").html(""+response+"");
      }
    },
    error:function()
    {
      alert("Sistem Bermasalah");
    }
  });
}
$(function(){ ponton_1_hoper_1(); });

function ponton_1_hoper_2()
{
  var data = "PONTON=Ponton 1&HOPER=Hoper 2"
  $.ajax({
    type : 'POST',
    url:'modules/hoper.php',
    data : data,
    success:function(response)
    {
       if(response == "no_data"){
         alert("GAGAL")
       }
       else{
        $("p.ponton_1_hoper_2").html(""+response+"");
      }
    },
    error:function()
    {
      alert("Sistem Bermasalah");
    }
  });
}
$(function(){ ponton_1_hoper_2(); });
//////////////////////////////////////////// PONTON 1 //////////
//////////////////////////////////////////// PONTON 2 //////////
function ponton_2_hoper_1()
{
  var data = "PONTON=Ponton 2&HOPER=Hoper 1"
  $.ajax({
    type : 'POST',
    url:'modules/hoper.php',
    data : data,
    success:function(response)
    {
       if(response == "no_data"){
         alert("GAGAL")
       }
       else{
        $("p.ponton_2_hoper_1").html(""+response+"");
      }
    },
    error:function()
    {
      alert("Sistem Bermasalah");
    }
  });
}
$(function(){ ponton_2_hoper_1(); });

function ponton_2_hoper_2()
{
  var data = "PONTON=Ponton 2&HOPER=Hoper 2"
  $.ajax({
    type : 'POST',
    url:'modules/hoper.php',
    data : data,
    success:function(response)
    {
       if(response == "no_data"){
         alert("GAGAL")
       }
       else{
        $("p.ponton_2_hoper_2").html(""+response+"");
      }
    },
    error:function()
    {
      alert("Sistem Bermasalah");
    }
  });
}
$(function(){ ponton_2_hoper_2(); });
//////////////////////////////////////////// PONTON 2 //////////

</script>
