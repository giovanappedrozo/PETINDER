function showPosition(position){
  
  var x = document.getElementById("demo");
    
    var latitude = document.getElementById("latitude");
    var longitude = document.getElementById("longitude");

    latitude = latitude.value = position.coords.latitude;
    longitude = longitude.value = position.coords.longitude;
}
  
function showError(error){
    var x = document.getElementById("demo");
    switch(error.code) 
      {
      case error.PERMISSION_DENIED:
        x.innerHTML="Usuário rejeitou a solicitação de Geolocalização."
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
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition,showError);
    }
  else{x.innerHTML="Seu browser não suporta Geolocalização.";}
}