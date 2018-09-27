    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.print.css" media='print'/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.min.css" />


    <style>
      .posicion{
        position: absolute;
        display: block;
        right: 50px;
        z-index: 60;
        max-width: 200px;
        height: auto;

      }
    </style>

<div class="container">
    <div class="row">
        <div class="wrapper">
            <div class="side-bar">
                <ul>
                    <li class="menu-head">
                        Control de Citas <a href="#" class="push_menu"><span class="glyphicon glyphicon-align-justify pull-right"></span></a>
                    </li>
                    <div class="menu">
                        <li>
                            <a href="<?php print base_url();?>">Agenda <span class="glyphicon glyphicon-dashboard pull-right"></span></a>
                        </li>
                        <li>
                            <a href="#" class="active">Love snippet<span class="glyphicon glyphicon-heart pull-right"></span></a>
                        </li>
                        <li>
                            <a href="#">Like it? <span class="glyphicon glyphicon-star pull-right"></span></a>
                        </li>
                        <li>
                            <a href="#">Settings <span class="glyphicon glyphicon-cog pull-right"></span></a>
                        </li>
                    </div>
                    
                </ul>
            </div>   
            <div class="content">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Agenda</div>
                        <div class="panel-body">
                           <?php if ( $citas == -1): ?>
                                    <div class="col-lg-6 col-lg-offset-3" id="no_estadisticas">
                                        <h2 class="text-danger">NO HAY CITAS PARA MOSTRAR</h2>
                                    </div>
                            <?php endif; ?>
                            <div class="row">           
                                <?php if ($citas != -1): ?>
                                    <div class="col-lg-6">
                                        <div class="hpanel hred">
                                            <div class="panel-heading">
                                                <div class="panel-tools">
                                                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                                                </div>
                                                <span class="text-danger">Agenda del dia</span>
                                            </div>
                                            <div class="panel-body">
                                                <div id="calendar" class="calendar"></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    


<!-- Vendor scripts -->
<script src="<?php echo base_url(); ?>assets/plugins/vendor/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.js"></script>
<script src="<?php echo base_url(); ?>assets/fullcalendar/locale-all.js"></script>

