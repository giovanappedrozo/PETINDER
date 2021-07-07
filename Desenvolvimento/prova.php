<?php
include('layout.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <title><?php $pagetitle = getLanguageString("Title_reg", $lang); echo $pagetitle; ?> | PETINDER</title>
    </head>
    <body>
        <main>
            <h2>Usuários cadastrados:</h2>
            
                <?php                     
                $sql = "SELECT * FROM usuario";
                $banco->Prova($sql);
                ?>
                </select><br>

        </main>
    </body>
</html>