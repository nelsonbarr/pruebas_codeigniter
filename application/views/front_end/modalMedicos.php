<div class="modal fade" id="modalMedicos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog   ">
        <div class="modal-content ">
            <form action="<?php print base_url();?>medicos/saveMedico" id="formulario" name="formulario" method="POST">
            <div class="modal-header text-center">
                <h4 class="modal-title text-danger"><strong>Registro de Medicos</strong>
                </h4>
                <small class="font-bold"></small>
            </div>            
            <div class="modal-body ">
                <div class="container col-xs-12">                    
                    <div class="row ">
                        <div class="col-xs-6 text-center">
                            <div class="form-group">
                                <label class="control-label">Tipo Documento</label>
                                <input id="idmedico" name="idmedico" type="hidden"/>
                                <select id="idtipodoc" class="form-control" name="idtipodoc">
                                    <option value="">Seleccione..</option>
                                    <?php foreach($tiposDocs AS $item):?>
                                          <option value="<?php print $item["id"];?>"><?php print $item["descripcion"];?></option>
                                    <?php endforeach;?>											 
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 text-center">
                            <div class="form-group"><label class=" control-label">Documento</label>
                                <input id="txtiddocumento" name="txtiddocumento" type="number" class="form-control" maxlength="12">
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-xs-6 text-center">
                            <div class="form-group"><label class=" control-label">Nombres</label>
                                <input id="txtnombres" name="txtnombres" type="text" class="form-control" maxlength="255">
                            </div>
                        </div>   
                        <div class="col-xs-6 text-center">
                            <div class="form-group"><label class=" control-label">Apellidos</label>
                                <input id="txtapellidos" name="txtapellidos" type="text" class="form-control" maxlength="255">
                            </div>
                        </div>  
                    </div>  
                    <div class="row">                       
                        <div class="col-xs-4 text-center">
                            <div class="form-group">
                                <label class=" control-label">Genero</label>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="checkbox1" name="genero" value="M">
                                    <label for="checkbox1"><small>Masculino</small></label>
                                    <input type="radio" class="form-check-input" id="checkbox2" name="genero" value="F" >
                                    <label for="checkbox2"><small>Femenino</small></label>
                                </div>                                  
                            </div>
                        </div>
                        <!--div class="col-xs-4 text-center">
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" id="txtfechanacimiento" name="txtfechanacimiento" class="form-control">
                                <div class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                                </div>
                            </div>
                        </div-->
                        <div class="col-xs-4 form-group">
                            <label class="control-label">Fecha Nacimiento</label>
                            <div class="input-group date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input class="form-control" id="txtfechanacimiento" name="txtfechanacimiento" type="text" readonly/>
                            </div>                                               
                        </div>
                        <div class="col-xs-4 text-center">
                            <div class="form-group"><label class=" control-label">Email</label>
                                <input id="txtemail" name="txtemail" type="text" class="form-control" maxlength="45">
                            </div>                    
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-xs-6 text-center">
                            <div class="form-group"><label class=" control-label">Telefonos</label>
                                <input id="txttelefonos" name="txttelefonos" type="text" class="form-control" maxlength="45">
                            </div>
                        </div>
                        <div class="col-xs-6 text-center">
                            <div class="form-group"><label class=" control-label">Foto</label>
                                <input id="txtfoto" name="txtfoto" type="files" class="form-control" maxlength="255">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <div class="form-group">
                                <label class=" control-label">Direccion</label>
                                <input id="txtdireccion" name="txtdireccion" type="text" class="form-control" maxlength="200">
                            </div>
							 <div class="form-group">
                               <label class="control-label">Especialidad</label>
                                <select id="idespecialidad" class="form-control" name="idespecialidad">
                                    <option value="">Seleccione..</option>
                                    <?php foreach($especialidades AS $item):?>
                                    <option value="<?php print $item["id"];?>"><?php print $item["descripcion"];?></option>
                                    <?php endforeach;?>
                                </select>
							  </div>							
                        </div>
                    </div>
                </div>
               

                <div class"row ">
                    <div class="col-lg-12">
                        <div class="hr-line-dashed"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-danger" id="btn_send">Guardar</button>
            </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content" style="overflow: hidden;">

                <div class="modal-footer footerbase">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">Cerrar [ X ]</button>
                    <div class="clearfix"></div>
                    <div class="show_img_support"></div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>