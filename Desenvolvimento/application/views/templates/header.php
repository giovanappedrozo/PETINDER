<html>
        <head>
                <link rel="stylesheet" href="<?php  echo base_url('assets/stylesheet.css');?>">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet"/>
                <script src="<?php  echo base_url('assets/script.js');?>"></script>

                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
                <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />

                <title><?php echo $title; ?> | PETINDER</title>
                <style>
                        .logo{
                                width: 15%;
                        }
                </style>
        </head>
        <body>
                <header>                     
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                <div class="container-fluid">
                                        <a class="navbar-brand" href="/">
                                                <img class="img-responsive" src="<?php  echo base_url('assets/logo.jpeg');?>">
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
                                                                <a class="nav-link" href="<?php echo site_url('animais/register'); ?>"><?php echo $this->lang->line('Rehome'); ?></a>
                                                        </li>
                                                        <li class="nav-item">
                                                                <a class="nav-link" href="<?php echo site_url('usuarios/register'); ?>"><?php echo $this->lang->line('Adopt'); ?></a>
                                                        </li>

                                                        <li class="nav-item dropdown">
                                                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="<?php echo site_url('usuarios/application'); ?>"><?php echo $this->lang->line('PftMatch'); ?></a>
                                                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                                </ul>
                                                        </li>
                                                </ul>
                                        </div>
                                        <a href="<?php echo site_url('languageSwitcher/switchLang/english'); ?>"><i class="flag flag-us"></i>English</a>&nbsp;&nbsp;&nbsp;
                                        <a href="<?php echo site_url('languageSwitcher/switchLang/portuguese'); ?>"><i class="flag flag-brazil"></i>Portugu&#234;s</a> <br>

                                </div>
                        </nav>
                        
                </header>
                <h1 class="page-title"><?php echo $title; ?></h1>