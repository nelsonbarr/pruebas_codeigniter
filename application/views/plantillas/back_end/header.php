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
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="assets/css/material-dashboard.css" rel="stylesheet"/>
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
        <link href='assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
        <link href='assets/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
        <script src='assets/fullcalendar/moment.min.js'></script>
        <script src='assets/fullcalendar/fullcalendar.min.js'></script>
    </head>
    <body>
        <div id="header">
            <div class="color-line">
            </div>
            
                <a href="<?php echo base_url() ?>">
                    <div id="logo" class="light-version">
                        <img src="<?php echo base_url(); ?>assets/images/codeigniter_logo.png" alt="" class="img-responsive center-block" width="50">
                    </div>
                </a>
            

            <nav role="navigation">
                <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
                <div class="small-logo">
                    <img src="<?php echo base_url(); ?>assets/images/codeigniter_logo.png" width="80" class="img-responsive center-block" alt="">
                    <!-- <span class="text-primary">EVENTOS Y PATROCINIOS</span> -->
                </div>
                <div class="mobile-menu">
                    <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                    <i class="fa fa-chevron-down"></i>
                </button>
                    <div class="collapse mobile-navbar" id="mobile-collapse">
                        <ul class="nav navbar-nav">
                            <li>
                                <a class="" href="<?php echo base_url() ?>access/logout">Logout</a>
                            </li>
                            <li>
                                <a class="" href="<?php echo base_url() ?>users">Perfil</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="navbar-right">
                    <ul class="nav navbar-nav no-borders">
                        <li class="dropdown">
                            <ul class="dropdown-menu hdropdown notification animated flipInX">
                                <li>
                                    <a>
                                        <span class="label label-success">NEW</span> It is a long established.
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="label label-warning">WAR</span> There are many variations.
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="label label-danger">ERR</span> Contrary to popular belief.
                                    </a>
                                </li>
                                <li class="summary"><a href="#">See all notifications</a></li>
                            </ul>
                        </li>
                        <li>
                            <div class="ac">
                                <ul class="sag-menu">
                                    <form action="" method="GET">
                                        <input type="text" class="search" name="s" /><i class="fa fa-search fa-lg"></i>
                                    </form>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown mensajes">
                            <a class="dropdown-toggle label-menu-corner" href="#" data-toggle="dropdown">
                                <i class="pe-7s-mail"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu hdropdown animated flipInX">
                                <div class="title">
                                    You have 4 new messages
                                </div>
                                <li>
                                    <a>
                                    It is a long established.
                                </a>
                                </li>
                                <li>
                                    <a>
                                    There are many variations.
                                </a>
                                </li>
                                <li>
                                    <a>
                                    Lorem Ipsum is simply dummy.
                                </a>
                                </li>
                                <li>
                                    <a>
                                    Contrary to popular belief.
                                </a>
                                </li>
                                <li class="summary"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <li class="nombres_perfil">
                            <p><b>Usuario Prueba</b> </p>
                            <p></p>
                        </li>

                        <li class="menu_perfil">
                            <div class="profile-picture">
                                <div class="stats-label text-color">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                                            <i class="fa fa-2x fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu animated flipInX m-t-xs">
                                            <li>
                                                <a href="<?php echo base_url('users') ?>">
                                                    <h5>Analítica</h5>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="img-perfil">
                                <a href="<?php echo base_url().'users/edit_user_id/'.$this->session->userdata('id_user'); ?>">
                                    <img src="<?php echo base_url(); ?>assets/images/profile-2.png" width="50" class="img-circle center-block img-responsive left m-b" alt="logo">
                                </a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="<?php echo base_url() ?>access/logout">
                                <i class="pe-7s-upload pe-rotate-90"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

