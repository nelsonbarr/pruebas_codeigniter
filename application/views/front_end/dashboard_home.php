  


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
                        <a href="#" class="push_menu">CONTROL DE CITAS<span class="fa fa-exchange pull-right"></span></a>
                    </li>
                    <div class="menu">
                        <li>
                            <a href="<?php print base_url();?>pacientes" >Pacientes </br><span class="fa fa-users pull-right"></span></a>
                        </li>                                                
                        <li>                            
                            <a href="<?php print base_url();?>home/semanal" class="pacientes  <?php if($tipocalendar=="agendaWeek"){print 'active';}?>">Agenda Semanal </br><span class="fa fa-calendar pull-right  active"></span></a>
                        </li>                        
                        <li>                            
                            <a href="<?php print base_url();?>home/diario" class="pacientes <?php if($tipocalendar=="agendaDay"){print 'active';}?>">Agenda Diaria </br><span class="fa fa-list-alt pull-right "></span></a>
                        </li>                   
                        
                    </div>
                    
                </ul>
            </div>              
            <div class="content">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            <div class="row">
                            <strong><div class="col-xs-6 text-danger" id="tipoagenda">AGENDA</div></strong>                           
                            </div></div>

                        <div class="panel-body">
                            <div class="col-sm-12 banner-sec">
                                <?php if ($this->session->flashdata('error')) { ?>
                                    <div class="alert alert-danger text-center"> <?php echo $this->session->flashdata('error') ?> </div>
                                <?php unset($_SESSION["error"]);} ?>
                                <?php if ($this->session->flashdata('success')) { ?>
                                    <div class="alert alert-success text-center"> <?php echo $this->session->flashdata('success') ?> </div>
                                <?php unset($_SESSION["success"]);} ?>
                            </div>
                           <?php if ( $citas == -1): ?>
                                    <div class="col-lg-6 col-lg-offset-3" id="no_estadisticas">
                                        <h2 class="text-danger">NO HAY CITAS PARA MOSTRAR</h2>
                                    </div>
                            <?php endif; ?>
                            <div class="row">           
                                <?php //if ($citas != -1): ?>
                                    <div class="col-md-12">
                                        <div class="hpanel hred">                                            
                                            <div class="panel-body">
                                                <div id="calendar" class="calendar "></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php //endif; ?>            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
//INCLUYO LA VENTANA MODAL PARA EDICION DE PACIENTES, LA MISMA SE MOSTRARA AL PRESIONAR EL BOTON DE EDICION
require_once("modalCitaPaciente.php");
require_once("modalPacienteHistorico.php");
//INCLUYO LA VENTANA MODAL PARA EDICION DE PACIENTES, LA MISMA SE MOSTRARA AL PRESIONAR EL BOTON DE EDICION
require_once("modalPacienteCita.php");
?>
    



