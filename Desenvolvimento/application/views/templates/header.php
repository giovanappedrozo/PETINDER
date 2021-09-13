<!DOCTYPE html>
        <html>
                <head>
                        <meta charset='UTF-8'>
                        <title><?php echo $title; ?> | PETINDER</title>
                        <link rel="stylesheet" href="<?php  echo base_url('assets/css/stylesheet.css');?>">
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet"/>
                        <script src="<?php  echo base_url('assets/js/script.js');?>"></script>
                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
                        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
                        <script src="http://code.jquery.com/jquery-latest.js"></script>
                </head>
                <body>
                        <header>    
                        <?php 
                                $logged = $this->session->userdata("logged"); 
                                $usuario = $this->session->userdata("usuario");
                                $id = $this->session->userdata("id");         
                        ?>
                                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                        <div class="container-fluid">
                                                <a class="navbar-brand" href="<?php echo site_url("animais"); ?>">
                                                        <img class="img-responsive" alt="PETINDER" src="<?php  echo base_url('assets/img/logo.jpeg');?>">
                                                </a>
                                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                                        <span class="navbar-toggler-icon"></span>
                                                </button>
                                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                                        <ul class="navbar-nav">
                                                                <li class="nav-item">
                                                                        <a class="nav-link active" aria-current="page" href="<?php echo site_url('animais'); ?>"><?php echo $this->lang->line('Home'); ?></a>
                                                                </li>
                                                
                                                                <li class="nav-item">
                                                                <a class="nav-link" href="<?php if(!$logged) echo site_url('usuarios/login'); else echo site_url('animais/register'); ?>"><?php echo $this->lang->line('Rehome'); ?></a>
                                                                </li>
                                                                
                                                                <li class="nav-item">
                                                                        <a class="nav-link" href="<?php if(!$logged) echo site_url('usuarios/login'); else echo site_url('usuarios'); ?>"><?php echo $this->lang->line('Adopt'); ?></a>
                                                                </li>

                                                                <li class="nav-item">
                                                                        <a class="nav-link" href="<?php if($logged) echo site_url('usuarios/application'); else echo site_url('usuarios/login'); ?>"><?php echo $this->lang->line('PftMatch'); ?></a>
                                                                </li>
                                                        </ul>
                                                </div>
                                                        <ul class='navbar-nav'>
                                                                <li class='nav-item dropdown'>
                                                                <a class='nav-link dropdown-toggle' id='navbarDropdownMenuLink' role='button' 
                                                                data-bs-toggle='dropdown' aria-expanded='false'>

                                                                <?php $lang = $this->session->get_userdata('site_lang');
                                                                $lang = $lang['site_lang'];

                                                                if($lang == 'portuguese'){ ?>
                                                                        <i class='flag flag-brazil'></i></a>
                                                                <?php }
                                                                else { ?>
                                                                        <i class='flag flag-us'></i></a>
                                                                <?php } ?>
                                                                <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                                                        <?php 
                                                                        if($lang == 'portuguese'){ ?>
                                                                                <li><a class='dropdown-item' href='<?php echo site_url('languageSwitcher/switchLang/english'); ?>'><i class="flag flag-us"></i></a>
                                                                        <?php }
                                                                        else { ?>
                                                                                <li><a class='dropdown-item' href='<?php echo site_url('languageSwitcher/switchLang/portuguese'); ?>'><i class="flag flag-brazil"></i></a>
                                                                        <?php } ?>
                                                                </ul>
                                                                </li>
                                                        </ul>
                                                <?php
                                                        if(!$logged) {
                                                                echo "<a class='btn-login' href='".site_url('usuarios/login')."'>".$this->lang->line("Login")."</a>&nbsp;"; 
                                                                echo "<a class='btn-login' href='".site_url('usuarios/register')."'>".$this->lang->line("Title_reg")."</a>";
                                                        }
                                                        else
                                                                echo 
                                                                "<ul class='navbar-nav'>
                                                                        <li class='nav-item dropdown'>
                                                                                <a class='nav-link dropdown-toggle' id='navbarDropdownMenuLink' role='button' 
                                                                                data-bs-toggle='dropdown' aria-expanded='false'>".$this->lang->line('Hello').$usuario." &nbsp;<i class='bi bi-person-circle'></i></a>
                                                                                <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                                                                        <li><a class='dropdown-item' href='".site_url('usuarios/'.$id)."'>".$this->lang->line("Profile")."</a></li>
                                                                                        <li><a class='dropdown-item' href='".site_url('usuarios/my_animals')."'>".$this->lang->line("My_animals")."</a></li>
                                                                                        <li><a class='dropdown-item' href='".site_url('usuarios/logout')."'>".$this->lang->line("Logout")."&nbsp;<i class='bi bi-box-arrow-in-right'></i></a></li>                                                                        
                                                                                </ul>
                                                                        </li>
                                                                </ul>";
                                                        ?>
                                        </div>
                                </nav>
                                
                        </header>
                        <h1 class="page-title"><?php echo $title; ?></h1>