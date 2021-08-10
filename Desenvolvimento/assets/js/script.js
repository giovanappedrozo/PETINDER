function showPosition(position){        
  var latitude = document.getElementById("latitude");
  var longitude = document.getElementById("longitude");

  latitude = latitude.value = position.coords.latitude;
  longitude = longitude.value = position.coords.longitude;
}
    
function showError(error){
  switch(error.code) {
    case error.PERMISSION_DENIED:
      window.alert("Usuário rejeitou a solicitação de Geolocalização.");
      check = document.getElementById('localizacao');
      check.checked = false;
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML="Localização indisponível."
      break;
    case error.TIMEOUT:
      x.innerHTML="A requisição expirou."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML="Algum erro desconhecido aconteceu."
      break;
  }
}

function getLocation(){
  if (navigator.geolocation){
    navigator.geolocation.getCurrentPosition(showPosition,showError);
  }
  else{x.innerHTML="Seu browser não suporta Geolocalização.";}
}

$(document).ready(function () {
  $("#faespecie").change(function () {
    var val = $(this).val();
    if (val == 1) {
      $("#faraca").html("<option value='test'>item1: test 1</option><option value='test2'>item1: test 2</option>");
    } 
    else if (val == "item2") {
      $("#size").html("<option value='test'>item2: test 1</option><option value='test2'>item2: test 2</option>");
    } 
    else if (val == "item3") {
      $("#size").html("<option value='test'>item3: test 1</option><option value='test2'>item3: test 2</option>");
    } 
    else if (val == "item0") {
      $("#size").html("<option value=''>--select one--</option>");
    }
  });
});

function filledHeart(){
  document.getElementById("like").className = "bi bi-heart-fill";
}

function emptyHeart(){
  document.getElementById("like").className = "bi bi-heart";
}

function filledXCircle(){
  document.getElementById("deslike").className = "bi bi-x-circle-fill";
}

function emptyXCircle(){
  document.getElementById("deslike").className = "bi bi-x-circle";
}

function change(){
  var id_especie = document.getElementById("especie").value;
  alert(id_especie);
}

function fetch_select(val)
{
  var categoria = document.getElementById("especie").value;
  $.ajax({
      url: "usuarios/register", // Metodo de buscar juros
      type: "POST",
      data: {categoria:categoria},
      success: function(data){
          $("#juros").val(data);
      }
  });
}