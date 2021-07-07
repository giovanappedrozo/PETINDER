<?php
include('layout.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <title><?php $pagetitle = getLanguageString("Home", $lang); echo $pagetitle; ?> | PETINDER</title>
    </head>
    <body>
        <header>
            <a href="login"><?php $account = getLanguageString("Registered", $lang); echo $account; ?></a>
        </header>
        <main>
            
        </main>
    </body>
</html>