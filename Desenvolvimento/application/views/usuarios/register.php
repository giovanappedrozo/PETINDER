<?php echo validation_errors(); ?>

<?php echo form_open('usuarios/register'); ?>

<label for="nome"><?php echo $this->lang->line('Name'); ?></label><br>
<input type="text" id="nome" name="nome" placeholder="<?php echo $this->lang->line('Name'); ?>" required><br>

<label for="email"><?php echo $this->lang->line('Email'); ?></label><br>
<input type="email" name="email" id="email" placeholder="<?php echo $this->lang->line('Email'); ?>" required><br>

<label for="senha"><?php echo $this->lang->line('Password'); ?></label><br>
<input type="password" name="senha" id="senha" placeholder="*********" required><br>

<label for="confirmacao"><?php echo $this->lang->line('Conf_passwd'); ?></label><br>
<input type="password" name="confirmacao" id="confirmacao" placeholder="*********" required><br>

<label for="genero"><?php echo $this->lang->line('Gender'); ?></label><br>
<select name="genero" id="genero">
<?php foreach ($generos as $genero): ?>
        <option value="<?php echo $genero['id_genero']; ?>"><?php echo $genero['genero']; ?></option>
<?php endforeach; ?>
</select><br>

<label for="data"><?php echo $this->lang->line('BirthDate'); ?></label><br>
<input type="date" name="data" id="data" required 
min="<?php $data = new DateTime('now'); $data->modify('-108 years'); echo $data->format('Y-m-d');?>"
max="<?php $data = new DateTime('now'); $data->modify('-18 years'); echo $data->format('Y-m-d');?>"><br>
                
<label onclick="getLocation()">
<input type="checkbox" name="localizacao" id="localizacao" value="Habilitado">
<?php echo $this->lang->line('Location'); ?>
</label><br>
<p id="demo"></p>
                
<input type="hidden" name="latitude" id="latitude" value="0">
<input type="hidden" name="longitude" id="longitude" value="0">

<input type="submit" name="submit" value="<?php echo $this->lang->line('Title_reg'); ?>">
</form>

<script>
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

function changeBreed(){
  var especie = document.getElementById("faespecie").value;
  if(especie == 1){

  }
}

$(document).ready(function () {
  $("#faespecie").change(function () {
      var val = $(this).val();
      if (val == 1) {
          $("#faraca").html("<option value='test'>item1: test 1</option><option value='test2'>item1: test 2</option>");
      } else if (val == "item2") {
          $("#size").html("<option value='test'>item2: test 1</option><option value='test2'>item2: test 2</option>");
      } else if (val == "item3") {
          $("#size").html("<option value='test'>item3: test 1</option><option value='test2'>item3: test 2</option>");
      } else if (val == "item0") {
          $("#size").html("<option value=''>--select one--</option>");
      }
  });
});
</script>