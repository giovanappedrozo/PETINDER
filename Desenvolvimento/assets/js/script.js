function showPosition(position){        
  var latitude = document.getElementById("latitude");
  var longitude = document.getElementById("longitude");

  latitude = latitude.value = position.coords.latitude;
  longitude = longitude.value = position.coords.longitude;
}
    
function showError(error){
  switch(error.code) {
    case error.PERMISSION_DENIED:
      check = document.getElementById('localizacao');
      check.checked = false;
      break;
    case error.POSITION_UNAVAILABLE:
      window.alert("Localização indisponível.");
      break;
    case error.TIMEOUT:
      window.alert("A requisição expirou.");
      break;
    case error.UNKNOWN_ERROR:
      window.alert("Algum erro desconhecido aconteceu.");
      break;
  }
}

function getLocation(){
  if (navigator.geolocation){
    navigator.geolocation.getCurrentPosition(showPosition,showError);
  }
  else{x.innerHTML="Seu browser não suporta Geolocalização.";}
}

$('#chat_area').animate({
  scrollTop: $(this).height() 
}, 300);

setInterval(function(){
  load_notifications();
}, 1000);