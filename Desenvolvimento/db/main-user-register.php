<?php
$nome = $_POST['funome'];
$email = $_POST['fuemail'];
$senha = $_POST['fusenha'];
$genero = $_POST['fugenero'];
$data = $_POST['fudata'];
$confirmacao = $_POST['fuconfirmacao'];
$latitude = $_POST['latitude'];
$longitude = $_POST['latitude'];
$ponto = "($latitude, $longitude)";


if($confirmacao == $senha){
    $options = [
        'cost' => 12,
    ];
    $criptografada = password_hash($senha, PASSWORD_BCRYPT, $options);
    
    
    $sql = "INSERT INTO usuario (id_usuario, nome, email, senha, id_genero, datanasci, localizacao) VALUES (DEFAULT, '$nome', '$email', '$criptografada', '$genero', '$data', '$ponto')";
    require_once("banco.class.php");
    $banco = new Banco;
    //header("Location: ../");
    try{
    $banco->Executar($sql);}
    catch (exception $e){
        echo $e->getMessage();
    }
}
else{
    echo "As senhas nao coincidem, tente de novo";
}
?>

<!--if(crypt($senhadigitada,$senhaguardada)) == $senhaguardada) echo "Login efetuado com sucesso";!-->