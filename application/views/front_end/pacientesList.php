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
                            <a href="<?php print base_url();?>pacientes" class="pacientes active ">Pacientes </br><span class="fa fa-users pull-right"></span></a>
                        </li>
                        <li>
                            <a href="<?php print base_url();?>home/semanal" class="pacientes  ">Agenda Semanal </br><span class="fa fa-calendar pull-right  active"></span></a>
                        </li>
                        <li>
                            <a href="<?php print base_url();?>home/diario" class="pacientes ">Agenda Diaria </br><span class="fa fa-list-alt pull-right "></span></a>
                        </li>                                           
                    </div>                    
                </ul>
            </div>                        
            <div class="content">
                <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading" id="tipoagenda">
                            <div class="row">
                            <div class="col-xs-6">PACIENTES</div>
                            <div class="col-xs-6 text-right"><button type="button" class="btn btn-info btn_edit" id="btn_add" data-toggle="modal" data-target="#modalPacientes"><span class="fa fa-new pull-right"></span>Agregar</button></div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-12">
                                <?php if ($this->session->flashdata('error')) { ?>
                                    <div class="alert alert-danger text-center"> <?php echo $this->session->flashdata('error') ?> </div>
                                <?php } ?>
                                <?php if ($this->session->flashdata('success')) { ?>
                                    <div class="alert alert-success text-center"> <?php echo $this->session->flashdata('success') ?> </div>
                                <?php } ?>
                            </div>
                           <?php if ( $pacientes == -1): ?>
                                    <div class="col-lg-6 col-lg-offset-3" id="no_estadisticas">
                                        <h2 class="text-danger">NO HAY PACIENTES PARA MOSTRAR</h2>
                                    </div>
                            <?php endif; ?>
                            <div class="row">                                           
                                <div class="col-md-12">
                                    <div class="hpanel hred">                                            
                                        <div class="panel-body">
                                            <table class="table table-responsive" id="tablepacientes">
                                            <thead class="thead-inverse">
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nombres</th>
                                                <th scope="col">Apellidos</th>
                                                <th scope="col">Sexo</th>
                                                <th scope="col">Edad</th> 
                                                <th>Acciones</th>     
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($pacientes AS $key=>$fila):?>    
                                                    <tr>
                                                    <th scope="row"><?php print $fila['id'];?></th>
                                                    <td><?php print $fila['nombres'];?></td>
                                                    <td><?php print $fila['apellidos'];?></td>
                                                    <td><?php if($fila['genero']=='M'){print "MASCULINO";}else{print "FEMENINO";}?></td>
                                                    <td><?php print $fila['fechanacimiento'];?></td>
                                                    <td><button type="button" id="btn_edit" alt="Editar" title="Editar" class="btn btn-danger btn_edit" data-toggle="modal" data-id="<?php print $key;?>" data-target="#modalPacientes"><span class="fa fa-edit pull-right"></span></button>
                                                        <button type="button" id="btn_history" alt="Historia" title="Historia" class="btn btn-default" data-toggle="modal" data-id="<?php print $key;?>" data-target="#modalPacienteHistory"><span class="fa fa-align-justify pull-right"></span></button></td>                                                    </tr>        
                                                <?php endforeach;?>
                                            </tbody>
                                            </table>
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
