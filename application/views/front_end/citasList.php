<link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables2/media/css/jquery.dataTables.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables2/media/css/buttons.dataTables.css" />
<div class="container">
    <div class="row">
        <div class="wrapper">
            <div class="side-bar">
                <ul>
                    <li class="menu-head">
                       CONTROL DE CITAS <a href="#" class="push_menu"><span class="fa fa-exchange pull-right"></span></a>
                    </li>
                    <div class="menu">
                        <li>
                            <a href="<?php print base_url();?>pacientes" class="pacientes ">Pacientes </br><span class="fa fa-users pull-right"></span></a>
                        </li>
                        <li>
                            <a href="<?php print base_url();?>home/semanal" class="pacientes  ">Agenda Semanal </br><span class="fa fa-calendar pull-right  active"></span></a>
                        </li>
                        <li>
                            <a href="<?php print base_url();?>home/diario" class="pacientes  active">Agenda Diaria </br><span class="fa fa-list-alt pull-right "></span></a>
                        </li>                                           
                    </div>                    
                </ul>
            </div>                        
            <div class="content">
                <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading" id="tipoagenda">
                            <div class="row">
                            <div class="col-xs-6 text-danger">AGENDA DEL DIA <?php print date('Y/m/d' );?></div>
                            <div class="col-xs-6 text-right"><button type="button" class="btn btn_edit" id="btn_add" data-toggle="modal" data-target="#modalPacientes"><span class="fa fa-new pull-right"></span>Agregar</button></div>
                            </div>
                        </div>
                        <div class="panel-body">
                           
                            <div class="row">                                           
                                <div class="col-md-12">
                                    <div class="hpanel hred">                                            
                                        <div class="panel-body">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <h5>Estado</h5>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <h5> Datos Cita</h5>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <h5>Edicion</h5>
                                                    </div>                                                    
                                                </div>  <hr></hr>  
                                                <?php if ( $citas == -1): ?>
                                                        <div class="col-lg-12" id="no_estadisticas">
                                                            <h2 class="text-danger">NO HAY CITAS PARA EL DIA DE HOY</h2>
                                                        </div>                                                        
                                                <?php else: ?>  
                                                    <?php foreach($citas AS $key=>$fila):?>      
                                                        <div class="row alert alert-info" role="alert">
                                                            <div class="col-lg-2">
                                                                <div class="form-group ">                                                                   
                                                                    <select class="form-control " id="exampleFormControlSelect1">
                                                                    <?php foreach($estadoscitas AS $estado):?>
                                                                        <?php 
                                                                            switch ($estado['id']) {
                                                                                case 1:
                                                                                    $class='label-default';
                                                                                    break;
                                                                                case 2:
                                                                                    $class='label-danger';
                                                                                    break;
                                                                                case 3:
                                                                                    $class='label-success';
                                                                                    break;
                                                                                case 4:
                                                                                    $class='label-warning';
                                                                                    break;
                                                                                case 5:
                                                                                    $class='label-info';
                                                                                    break;
                                                                                default:
                                                                                    $class='label-default';  
                                                                                    break;                                                                      
                                                                            }
                                                                        ?>
                                                                        <?php if($estado['id']!=$fila['idestadocita']):?>
                                                                            <option class="<?php print $class;?>" value="<?php print $estado['id'];?>"><?php print $estado['descripcion'];?></option>
                                                                        <?php else:?>                                                                            
                                                                            <option class="<?php print $class;?>" selected="selected"><?php print $estado['descripcion'];?></option>
                                                                        <?php endif;?>
                                                                    <?php endforeach;?>
                                                                    </select>
                                                                </div>                                                                
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <div>
                                                                <?php print '<b>Documento:</b> '.$fila['documento'].'<br>'.'<b>Paciente:</b> '.$fila['title'].'<br>'.'<b>Motivo Cita:</b> '.$fila['motivocita'];?>
                                                                </div>
                                                            </div>                                                    
                                                            <div class="col-lg-2"><button type="button" id="btn_edit" alt="Editar" title="Editar" class="btn_edit" data-toggle="modal" data-id="<?php print $key;?>" data-target="#modalPacientes"><span class="fa fa-edit pull-right"></span></button>
                                                            <button type="button" id="btn_history" alt="Historia" title="Historia" class="btn-btn_edit" data-toggle="modal" data-id="<?php print $fila['idpaciente'];?>" data-target="#modalPacienteHistory"><span class="fa fa-align-justify pull-right"></span></button>
                                                            </div>
                                                        </div>    
                                                    <?php endforeach;?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                           
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
require_once("modalPacientes.php");
//INCLUYO LA VENTANA MODAL PARA VERHISTORICO EL PACIENTE, LA MISMA SE MOSTRARA AL PRESIONAR EL BOTON DE HISTORICO
require_once("modalPacienteHistorico.php");
?>
</body>
</html>
