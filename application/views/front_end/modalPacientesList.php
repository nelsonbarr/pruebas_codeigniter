<!-- Modal -->
  <div class="modal fade" id="modalPacientesList" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-danger">Paciente</h4>
        </div>        
        <div class="modal-body">
            <div class="container col-xs-12">
                <div class="row-fluid"> 
                    <div class="col-xs-12 text-center">
                      <form action="<?php base_url();?>home/add_event" method="POST">
                        <div class="form-group">
                            <select id="selPaciente" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" >  
                                <option value="" >Seleccione..</option>                 
                                <?php foreach($pacientes AS $fila):?>        
                                <option data-subtext="<?php print $fila["documento"];?>" value="<?php print $fila["id"];?>"><?php print $fila["nombres"]." ".$fila['apellidos'];?></option>
                                <?php endforeach;?>   
                            </select> 
                        </div>
                        <input type="text" id="date"/>
                        <input type="text" id="dateend"/>
                      </form>
                    </div>                        
                </div>
            </div>    
        </div>
        
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger" id="btn_procesa">Procesar</button>
            <input type="submit" class="btn btn-primary" value="Add Event">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

