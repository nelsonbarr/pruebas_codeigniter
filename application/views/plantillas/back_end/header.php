<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Page title -->
        <title>CONTROL DE CITAS</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" />        
        <link href="<?php echo base_url() ?>assets/css/material-dashboard.css" rel="stylesheet"/>
        <link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.print.css" media='print'/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.min.css" />        
        <link href='<?php echo base_url() ?>assets/css/style_sidebar.css' rel='stylesheet' />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
        <link rel="stylesheet" href="<?php print base_url();?>assets/bootstrap-datepicker/css/bootstrap-datepicker.min.css" />
    </head>
    <body>
        <div id="header">
            <div class="color-line">
            </div>                 
            <nav class="navbar ">
                <div class="container-fluid collapse navbar-collapse">
                    <div class="navbar-header ">
                        <img src="<?php echo base_url(); ?>assets/images/codeigniter_logo.png" alt="" class="img-responsive center-block" width="150">
                    </div>                   
                    <ul class="nav navbar-nav navbar-right mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="fa fa-gear">&nbsp;</span>Configuracion
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="<?php echo base_url();?>usuarios">Usuarios</a>
                              <a class="dropdown-item" href="#">Medicos</a>                             
                            </div>
                          </li>
                        <li><a href="<?php print base_url();?>access/logout"><span class="fa fa-user-times">&nbsp;</span>&nbsp;&nbsp;Cerrar Sesion</a></li>

                        
                    </ul>
                </div>
            </nav> 




        </div>



