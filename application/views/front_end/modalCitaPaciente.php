<!-- Modal -->
  <div class="modal fade" id="modalPacientesList" role="dialog">
    <div class="modal-dialog">
      <form action="<?php print base_url();?>home/saveCita" method="POST">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-danger">Registro de Cita</h4>
        </div>        
        <div class="modal-body">
            <div class="container col-xs-12">
                <div class="row-fluid"> 
                    <div class="col-xs-12 text-center">

                        <div class="form-group">
                            <label class="control-label">Paciente</label>
                            <input id="idcita" name="idcita" type="hidden"/>
                            <select id="selPaciente" name="selPaciente" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" >  
                                <option value="" >Seleccione..</option>                 
                                <?php foreach($pacientes AS $fila):?>        
                                <option data-subtext="<?php print $fila["documento"];?>" value="<?php print $fila["id"];?>"><?php print $fila["nombres"]." ".$fila['apellidos'];?></option>
                                <?php endforeach;?>   
                            </select>                            
                        </div>
                        <div class="form-group">
                            <label class="control-label">Fecha Inicio</label>
                            <input type="text" id="date" name="date" class="form-control" maxlength="12"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Fecha Fin</label>
                            <input type="text" id="dateend" name="dateend" class="form-control" maxlength="12"/> 
                        </div>                            
                        <div class="form-group">
                            <label class=" control-label">Motivo Cita</label>
                            <input id="txtmotivocita" name="txtmotivocita" type="text" class="form-control" maxlength="100">
                        </div>
                        <div class="form-group">
                            <label class=" control-label">Sintomas</label>
                            <input id="txtmedicinastomadas" name="txtmedicinastomadas" type="text" class="form-control" maxlength="100">
                        </div>
                        <div class="form-group">
                            <label class=" control-label">Sintomas</label>
                            <input id="txtsintomas" name="txtsintomas" type="text" class="form-control" maxlength="100">
                        </div>
                        <div class="form-group">
                            <label class=" control-label">Descripcion</label>
                            <input id="txtdescripcion" name="txtdescripcion" type="text" class="form-control" maxlength="100">
                        </div>
                        
                      
                    </div>                        
                </div>
            </div>    
        </div>
        
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger" id="btn_procesa">Procesar</button>            
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>

