<html>
        <head>
                <title><?php echo $title; ?> | PETINDER</title>
                <style>
                        .logo{
                                width: 15%;
                        }
                </style>
        </head>
        <body>
                <a href="/"><img src="assets/logo.jpeg" alt="PETINDER" class="logo"></a><br><br>
                <a href="<?php echo "../../../../../ci/index.php/languageSwitcher/switchLang/english"; ?>">English</a> |
                <a href="<?php echo "../../../../../ci/index.php/languageSwitcher/switchLang/portuguese"; ?>">Portugu&#234;s</a> | <br>
                <ul>
                <li><a href="<?php echo "../../../../../ci/index.php/";?>"><?php echo $this->lang->line('Home'); ?></a></li>
                <li><a href="<?php echo "../../../../../ci/index.php/animais/register/http";?>"><?php echo $this->lang->line('Rehome'); ?></a></li>
                <li><a href="<?php echo "../../../../../ci/index.php/usuarios/register/http";?>"><?php echo $this->lang->line('Adopt'); ?></a></li>
                <li><a href="<?php echo "../../../../../ci/index.php/usuarios/application/http";?>"><?php echo $this->lang->line('PftMatch'); ?></a></li>
                </ul>
                <h1><?php echo $title; ?></h1>