<?php
include_once('common.php');
$lang='pt_BR';

require_once("db/banco.class.php");
$banco = new Banco;
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/stylesheet.css">
        <script src="js/script.js"></script>
    </head>
    <body>
        <header>
            <a href="/"><img src="img/logo.jpeg" alt="PETINDER" class="logo"></a>
            <form action="#" method="POST">
            <input type="submit" name="lang" value="Português">
            <input type="submit" name="lang" value="English">
            </form>
            <?php $lang = $_POST['lang'];
                if($lang == "English") $lang='en_US';
                else $lang='pt_BR'; ?>
            <nav>
                <ul>
                    <li><a href="/"><?php $home = getLanguageString("Home", $lang); echo $home; ?></a></li>
                    <li><a href="pet_register.php"><?php $rehome = getLanguageString("Rehome", $lang); echo $rehome; ?></a></li>
                    <li><a href="user_register.php"><?php $adopt = getLanguageString("Adopt", $lang); echo $adopt; ?></a></li>                </ul>
            </nav>
<!--https://pt.stackoverflow.com/questions/382342/como-inserir-esse-menu-em-hamburguer-no-meu-menu-retratil-ja-feito-->
            <!--<input type="checkbox" id="check">
            <label id="icone" for="check"></label>
            <div class="barra">
                <nav>
                <a href="#">
                    <div class="Link">In&#237;cio</div>
                </a>
                <a href="#">
                    <div class="Link">Adotar</div>
                </a>
                <a href="#">
                    <div class="Link">Doar</div>
                </a>
                <a href="#">
                    <div class="Link">Meu perfil</div>
                </a>
                </nav>
            </div>

            <nav class="menu">
                <a href="index.html">
                    &#9776;
                </a>
            </nav>

            <label for="menu-hamburguer">
                <div class="mburg">
                <span class="hamburguer"></span>
                </div>
            </label>!-->
        </header>
    </body>
</html>
