<!DOCTYPE html>
        <html>
                <head>
                        <meta charset='UTF-8'>
                        <title><?php echo $title; ?> | PETINDER</title>
                        <link rel="stylesheet" href="<?php echo base_url('assets/css/stylesheet.css');?>">
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet"/>
                        <script src="<?php  echo base_url('assets/js/script.js');?>"></script>
                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
                        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
                        <script src="http://code.jquery.com/jquery-latest.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.js" integrity="sha512-K3MtzSFJk6kgiFxCXXQKH6BbyBrTkTDf7E6kFh3xBZ2QNMtb6cU/RstENgQkdSLkAZeH/zAtzkxJOTTd8BqpHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                        <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>

                        <!-- API mapa -->
                        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
                        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

                        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url().'/assets/img/favicon/apple-icon-57x57.png';?>">
                        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url().'/assets/img/favicon/apple-icon-60x60.png';?>">
                        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url().'/assets/img/favicon/apple-icon-72x72.png';?>">
                        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url().'/assets/img/favicon/apple-icon-76x76.png';?>">
                        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url().'/assets/img/favicon/apple-icon-114x114.png';?>">
                        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url().'/assets/img/favicon/apple-icon-120x120.png';?>">
                        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url().'/assets/img/favicon/apple-icon-144x144.png';?>">
                        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url().'/assets/img/favicon/apple-icon-152x152.png';?>">
                        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url().'/assets/img/favicon/apple-icon-180x180.png';?>">
                        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url().'/assets/img/favicon/android-icon-192x192.png';?>">
                        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url().'/assets/img/favicon/favicon-32x32.png';?>">
                        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url().'/assets/img/favicon/favicon-96x96.png';?>">
                        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url().'/assets/img/favicon/favicon-16x16.png';?>">
                        <link rel="manifest" href="<?php echo base_url().'/assets/img/favicon/manifest.json';?>">
                        <meta name="msapplication-TileColor" content="#ffffff">
                        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
                        <meta name="theme-color" content="#ffffff">
                </head>
                <body>
                        <header>    
                        <?php 
                                $doador = $this->session->userdata("doador"); 
                                $logged = $this->session->userdata("logged"); 
                                $usuario = $this->session->userdata("usuario");
                                $usuario = explode(" ", $usuario);
                                $id = $this->session->userdata("id");         
                        ?>
                                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                        <div class="container-fluid">
                                                <a class="navbar-brand" href="<?php echo site_url("animais"); ?>">
                                                        <img class="img-responsive" alt="PETINDER" src="<?php echo base_url('assets/img/logo.jpeg');?>">
                                                </a>
                                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                                        <span class="navbar-toggler-icon"><i class="bi bi-list"></i></span>
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
                                                                        <a class="nav-link" href="<?php if(!$logged) echo site_url('usuarios/login'); else echo site_url('usuarios/my_chats'); ?>"><?php echo $this->lang->line('Adopt'); ?></a>
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
                                                        else{ if($doador){?>
                                                                &nbsp;<a href="<?php echo site_url('usuarios/notifications'); ?>"><i class="bi bi-bell-fill icones"></i></a>&nbsp;&nbsp;
                                                        <?php } ?>
                                                        <ul class='navbar-nav'>
                                                                <li class='nav-item dropdown'>
                                                                        <a class='nav-link dropdown-toggle' id='navbarDropdownMenuLink' role='button' 
                                                                        data-bs-toggle='dropdown' aria-expanded='false' onclick="load_messages();"><i class="bi bi-chat-dots-fill"></i></a>
                                                                        <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink' id="message_area">
                                                                                <li>
                                                                                        <div class="dropdown-item" ></div>                                                                                
                                                                                </li>
                                                                        </ul>
                                                                </li>
                                                        </ul>

                                                        <?php echo 
                                                                "<ul class='navbar-nav'>
                                                                        <li class='nav-item dropdown'>
                                                                                <a class='nav-link dropdown-toggle' id='navbarDropdownMenuLink' role='button' 
                                                                                data-bs-toggle='dropdown' aria-expanded='false'>".$this->lang->line('Hello').$usuario[0]." &nbsp;<i class='bi bi-person-circle'></i></a>
                                                                                <ul class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
                                                                                        <li><a class='dropdown-item' href='".site_url('usuarios/'.$id)."'>".$this->lang->line("Profile")."</a></li>
                                                                                        <li><a class='dropdown-item' href='".site_url('usuarios/my_animals')."'>".$this->lang->line("My_animals")."</a></li>                                                                                       
                                                                                        <li><a class='dropdown-item' href='".site_url('usuarios/des-au-gosteis')."'>".$this->lang->line("My_deslikes")."</a></li>  
                                                                                        <li><a class='dropdown-item' href='".site_url('usuarios/logout')."'>".$this->lang->line("Logout")."&nbsp;<i class='bi bi-box-arrow-in-right'></i></a></li>                                                                        
                                                                                </ul>
                                                                        </li>
                                                                </ul>";
                                                        } ?>
                                        </div>
                                </nav>
                                
                        </header>
                        <h1 class="page-title"><?php echo $title; ?></h1>