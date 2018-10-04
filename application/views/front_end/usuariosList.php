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
                            <div class="col-xs-6">USUARIOS</div>
                            <div class="col-xs-6 text-right"><button type="button" class="btn btn_edit" id="btn_add" data-toggle="modal" data-target="#modalUsuarios"><span class="fa fa-new pull-right"></span>Agregar</button></div>
                            </div>
                        </div>
                        <div class="panel-body">
                           <?php if ( $usuarios == -1): ?>
                                    <div class="col-lg-6 col-lg-offset-3" id="no_estadisticas">
                                        <h2 class="text-danger">NO HAY USUARIOS PARA MOSTRAR</h2>
                                    </div>
                            <?php endif; ?>
                            <div class="row">                                           
                                <div class="col-md-12">
                                    <div class="hpanel hred">                                            
                                        <div class="panel-body">
                                            <table class="table table-responsive" id="tableusuarios">
                                            <thead class="thead-inverse">
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nombres</th>
                                                <th scope="col">Apellidos</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Telefonos</th> 
                                                <th>Acciones</th>     
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($usuarios AS $key=>$fila):?>    
                                                    <tr>
                                                    <th scope="row"><?php print $fila['id'];?></th>
                                                    <td><?php print $fila['nombres'];?></td>
                                                    <td><?php print $fila['apellidos'];?></td>
                                                    <td><?php print $fila['email'];?></td>
                                                    <td><?php print $fila['telefono'];?></td>
                                                    <td><button type="button" id="btn_edit" alt="Editar" title="Editar" class="btn btn_edit" data-toggle="modal" data-id="<?php print $key;?>" data-target="#modalUsuarios"><span class="fa fa-edit pull-right"></span></button></td>
                                                    </tr>        
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
//INCLUYO LA VENTANA MODAL PARA EDICION DE USUARIOS, LA MISMA SE MOSTRARA AL PRESIONAR EL BOTON DE EDICION
require_once("modalUsuarios.php");
?>
</body>
</html>
