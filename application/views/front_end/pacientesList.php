<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<div class="container">
    <div class="row">
        <div class="wrapper">
            <div class="side-bar">
                <ul>
                    <li class="menu-head">
                       CONTROL DE CITAS <a href="#" class="push_menu"><span class="fa fa-ellipsis-v pull-right"></span></a>
                    </li>
                    <div class="menu">
                        <li>
                            <a href="<?php print base_url();?>pacientes" >Pacientes </br><span class="fa fa-users pull-right"></span></a>
                        </li>
                        <li>
                            <a href="<?php print base_url();?>home/semanal" class="pacientes  active">Agenda Semanal </br><span class="fa fa-calendar pull-right  active"></span></a>
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
                        <div class="panel-heading" id="tipoagenda">PACIENTES</div>
                        <div class="panel-body">
                           <?php if ( $citas == -1): ?>
                                    <div class="col-lg-6 col-lg-offset-3" id="no_estadisticas">
                                        <h2 class="text-danger">NO HAY PACIENTES PARA MOSTRAR</h2>
                                    </div>
                            <?php endif; ?>
                            <div class="row">                                           
                                <div class="col-md-12">
                                    <div class="hpanel hred">                                            
                                        <div class="panel-body">
                                            <table class="table">
                                            <thead class="thead-dark">
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
                                                <?php foreach($pacientes AS $fila):?>
                                                    <tr>
                                                    <th scope="row"><?php print $fila['id'];?></th>
                                                    <td><?php print $fila['nombres'];?></td>
                                                    <td><?php print $fila['apellidos'];?></td>
                                                    <td><?php if($fila['genero']=='M'){print "MASCULINO";}else{print "FEMENINO";}?></td>
                                                    <td><?php print $fila['fechanacimiento'];?></td>
                                                    <td><button id="btn btn_edit"><span class="fa fa-edit pull-right"></span></buttom></td>
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
//INCLUYO LA VENTANA MODAL PARA EDICION DE PACIENTES, LA MISMA SE MOSTRARA AL PRESIONAR EL BOTON DE EDICION
require_once("modalPacientes.php");
?>
</body>
</html>