<link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables2/media/css/jquery.dataTables.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables2/media/css/buttons.dataTables.css" />
<div class="container">
    <div class="row">
        <div class="wrapper">
            <div class="side-bar">
                <ul>
                    <li class="menu-head">
                       <a href="#" class="push_menu">CONTROL DE CITAS <span class="fa fa-exchange pull-right"></span></a>
                    </li>
                    <div class="menu">
                        <li>
                            <a href="<?php print base_url();?>pacientes" class="pacientes ">Pacientes </br><span class="fa fa-users pull-right"></span></a>
                        </li>
                        <li>
                            <a href="<?php print base_url();?>home/semanal" class="  ">Agenda Semanal </br><span class="fa fa-calendar pull-right  active"></span></a>
                        </li>
                        <li>
                            <a href="<?php print base_url();?>home/diario" class=" ">Agenda Diaria </br><span class="fa fa-list-alt pull-right "></span></a>
                        </li>                                           
                    </div>                    
                </ul>
            </div>                        
            <div class="content">
                <div class="col-md-12">
                <div class="panel panel-default">
                        <div class="panel-heading" id="tipoagenda">
                            <div class="row">
                            <div class="col-xs-6 text-danger"><strong>ESPECIALIDADES</strong></div>
                            <div class="col-xs-6 text-right"><button type="button" class="btn btn-info btn_edit" id="btn_add" data-toggle="modal" data-target="#modalEspecialidades"><span class="fa fa-new pull-right"></span>Agregar</button></div>
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
                           <?php if ( $especialidades == -1): ?>
                                    <div class="col-lg-6 col-lg-offset-3" id="no_estadisticas">
                                        <h2 class="text-danger">NO HAY ESPECIALIDADES PARA MOSTRAR</h2>
                                    </div>
                            <?php endif; ?>
                            <div class="row">                                           
                                <div class="col-md-12">
                                    <div class="hpanel hred">                                            
                                        <div class="panel-body">
                                            <table class="table table-responsive" id="tableespecialidades">
                                            <thead class="thead-inverse">
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Descripcion</th> 
                                                <th>Acciones</th>     
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($especialidades!=-1){
												         foreach($especialidades AS $key=>$fila):?>    
                                                    <tr>
                                                    <th scope="row"><?php print $fila['id'];?></th>
                                                    <td><?php print $fila['descripcion'];?></td>
                                                    <td><button type="button" id="btn_edit" alt="Editar" title="Editar" class="btn btn-danger btn_edit" data-toggle="modal" data-id="<?php print $key;?>" data-target="#modalEspecialidades"><span class="fa fa-edit pull-right"></span></button></td>
                                                    </tr>        
                                                <?php endforeach; }?>
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
//INCLUYO LA VENTANA MODAL PARA EDICION DE ESPECIALIDADAES, LA MISMA SE MOSTRARA AL PRESIONAR EL BOTON DE EDICION
require_once("modalEspecialidades.php");
?>
</body>
</html>
