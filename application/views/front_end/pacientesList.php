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
        <td><button onclick="<?php print base_url()."pacientes/edit/".$fila['id'];?>"><span class="fa fa-edit pull-right"></span></buttom></td>
        </tr>        
      <?php endforeach;?>
  </tbody>
</table>