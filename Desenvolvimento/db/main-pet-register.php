<?php 
if(isset($_FILES['faimg']['name'])&& $_FILES['faimg']['error'] == 0){
 
   $arquivo_tmp = $_FILES['faimg']['tmp_name'];
   $nome = $_FILES['faimg']['name'];
 
   $extensao = pathinfo($nome, PATHINFO_EXTENSION);
 
   $extensao = strtolower($extensao);

   if(strstr('.jpg;.jpeg;.gif;.png', $extensao)){
      $novoNome = md5(uniqid(time())).'.'.$extensao;
      $destino = 'imagens/'.$novoNome;
 
      move_uploaded_file($arquivo_tmp, $destino);
   }   
   else
      echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
}
else
    echo 'Você não enviou nenhum arquivo!';

$nome = $_POST['fanome'];
$sexo = $_POST['fasexo'];
$data = $_POST['fadata'];
$especie = $_POST['faespecie'];
$raca = $_POST['faraca'];
$porte = $_POST['faporte'];
$castrado = $_POST['facastrado'];
$infoadic = $_POST['fainfo'];
$lang = $_POST['lang'];

if($lang == 'pt_BR') $status = 1;
else if($lang == 'en_US') $status = 4;

if($castrado == 'castrado'){
   $castrado = 1;
}
else $castrado = 0;


$sql = "INSERT INTO animal VALUES (DEFAULT, '$novoNome', '$nome', '$sexo', '$data', '$raca', '$porte', '$castrado', '$infoadic', '$status')";
    require_once("banco.class.php");
    $banco = new Banco;
    //header("Location: ../");
    try{
    $banco->Executar($sql);}
    catch(exception $e){
       echo $e->getMessage();
    }
?>