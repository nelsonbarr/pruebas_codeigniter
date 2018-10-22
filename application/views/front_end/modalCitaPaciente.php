<!-- Modal -->
  <div class="modal fade" id="modalPacienteCita" role="dialog">
    <div class="modal-dialog">
      <form action="<?php print base_url();?>home/saveCita" id="formulario" name="formulario" method="POST">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-danger text-center">Registro de Cita</h4>
        </div>        
        <div class="modal-body">
            <div class="container col-xs-12">
                <div class="row-fluid"> 
                    <div class="col-xs-12">

                        <div class="form-group">
                            <label class="control-label">Paciente</label>
                            <small><button type="button" class="btn btn-info hiden btn_edit" id="btn_add" data-toggle="modal" data-target="#modalPacientes"><span class="fa fa-new pull-right"></span>Nuevo Paciente</button></small>
                            <input id="idcita" name="idcita" type="hidden"/>                            
                            <select id="selPaciente" name="selPaciente" class=" form-control" data-show-subtext="true" data-live-search="true" style="width:100%" >  
                                   
                            </select>                            
                        </div>
                        <div class="form-group">
                            <div class="row">
                            <div class="col-xs-6">
                                <label class="control-label">Fecha Inicio</label>                            
                                <input type="text" id="date" name="date" class="form-control" readonly maxlength="12"/>
                            </div>                            
                            <div class="col-xs-6">
                                <label class="control-label">Fecha Fin</label>
                                <input type="text" id="dateend" name="dateend" class="form-control" readonly maxlength="12"/>  
                            </div>  
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label class="control-label">Estado Cita</label>                          
                                    <select id="selEstadoCita" name="selEstadoCita" class="form-control">
                                        <?php foreach($estadoscitas AS $fila):?>
                                            <?php switch($fila["id"]): case 1:?>    
                                            <option class="label-default" value="<?php print $fila["id"];?>"><?php print $fila["descripcion"];?></option>
                                            <?php break; case 2:?>
                                            <option class="label-danger" value="<?php print $fila["id"];?>"><?php print $fila["descripcion"];?></option>
                                            <?php break; case 3:?>
                                            <option class="label-success" value="<?php print $fila["id"];?>"><?php print $fila["descripcion"];?></option>
                                            <?php break; case 4:?>
                                            <option class="label-warning" value="<?php print $fila["id"];?>"><?php print $fila["descripcion"];?></option>
                                            <?php break; case 5:?>
                                            <option class="label-info" value="<?php print $fila["id"];?>"><?php print $fila["descripcion"];?></option>
                                            <?php break; case 6:?>
                                            <option class="label-confirm" value="<?php print $fila["id"];?>"><?php print $fila["descripcion"];?></option>
                                            <?php break; endswitch; ?>
                                        <?php endforeach;?>   
                                    </select>  
                                </div>
                                <div class="col-xs-6">
                                    <label class="control-label">Estado Pago</label>                         
                                    <select id="selEstadoPago" name="selEstadoPago" class="form-control">
                                        <?php foreach($estadospagos AS $fila):?>        
                                        <option value="<?php print $fila["id"];?>"><?php print $fila["descripcion"];?></option>
                                        <?php endforeach;?>   
                                    </select>
                                </div>
                            </div>                                                                       
                        </div>  
                                                  
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label class=" control-label">Motivo Cita</label>
                                    <input id="txtmotivocita" name="txtmotivocita" type="text" class="form-control" maxlength="100">
                                </div>                            
                                <div class="col-xs-6">
                                    <label class=" control-label">Sintomas</label>
                                    <input id="txtsintomas" name="txtsintomas" type="text" class="form-control" maxlength="100">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label class="control-label">Medicinas</label>                            
                                    <input type="text" id="txtmedicinastomadas" name="txtmedicinastomadas" class="form-control" maxlength="100" readonly/>
                                </div>                            
                                <div class="col-xs-6">
                                    <label class="control-label">Alergias</label>
                                    <input type="text" id="txtalergias" name="txtalergias" class="form-control" maxlength="100" readonly/>  
                                </div>  
                            </div>
                        </div>
                        <div class="form-group" style="display:none;">
                            <label class="control-label">Especialista</label>                            
                            <select id="selMedico" name="selMedico" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" >  
                                <option value="" >Seleccione..</option>                 
                                <?php foreach($medicosEspecialidades AS $fila):?>        
                                <option data-subtext="<?php print $fila["descripcion"];?>" value="<?php print $fila["id"];?>"><?php print $fila["nombres"]." ".$fila['apellidos'];?></option>
                                <?php endforeach;?>   
                            </select>                            
                        </div>
                        <div class="form-group">
                            <label class=" control-label">Observaciones Cita</label>
                            <input id="txtdescripcion" name="txtdescripcion" type="text" class="form-control" maxlength="255">
                        </div>
                        <div class="form-group">
                            <label class=" control-label">Historia Medica</label>                            
                            <textarea id="txthistoria" name="txthistoria" class="form-control" maxlength="500" ></textarea>
                        </div>               
                      
                    </div>                        
                </div>
            </div>    
        </div>
        
        <div class="modal-footer">    
            <button type="button" id="btn_history" alt="Historia" title="Historia" class="btn btn-info" data-toggle="modal"  data-target="#modalPacienteHistory">Ver Historia</button>
            <button type="submit" class="btn btn-danger" id="btn_procesa">Procesar</button>            
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      </form>
    </div>
  </div>

