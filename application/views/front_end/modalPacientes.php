
<div class="modal fade" id="modal_company" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog   ">
        <div class="modal-content ">
            <div class="modal-header text-center">
                <h4 class="modal-title text-danger"><strong>Registro de Pacientes</strong>
                </h4>
                <small class="font-bold"></small>
            </div>
            <div class="modal-body ">
                <div class="container col-xs-12">
                    <div class="row ">
                        <div class="col-xs-6 text-center">
                            <div class="form-group">
                                <label class="control-label">Tipo Documento</label>
                                <select id="tipodoc" class="form-control" name="tipodoc">
                                    <option value="">Seleccione..</option>
                                    <?php foreach($tiposDocs AS $item):?>
                                    <option value="<?php print $item["id"];?>"><?php print $item["descripcion"];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6 text-center">
                            <div class="form-group"><label class=" control-label">Documento</label>
                                <input id="iddocument" type="text" class="form-control" maxlength="100">
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-xs-6 text-center">
                            <div class="form-group"><label class=" control-label">Nombres</label>
                                <input id="edit_name_company" type="text" class="form-control" maxlength="255">
                            </div>
                        </div>   
                        <div class="col-xs-6 text-center">
                            <div class="form-group"><label class=" control-label">Apellidos</label>
                                <input id="edit_name_company" type="text" class="form-control" maxlength="255">
                            </div>
                        </div>  
                    </div>  
                    <div class="row">
                        <div class="form-group"><label class=" control-label">Genero</label>
                            <div class="col-xs-6">
                                <div class="radio radio-danger ">
                                    <input type="radio" class="sradio" id="checkbox1" name="check_agreement" value="si">
                                    <label for="checkbox1">SI</label>
                                    <input type="radio" class="sradio" id="checkbox2" name="check_agreement" value="no" checked="">
                                    <label for="checkbox2">NO</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-4 text-center">
                            <div class="form-group"><label class=" control-label">email</label>
                                <input id="city_company" type="text" class="form-control" maxlength="45">
                            </div>                    
                        </div> 
                    </div>
                </div>
               

                <div class"row ">
                    
                    <div class="col-xs-6 col-sm-4 text-center">
                        <div class="form-group"><label class=" control-label">email</label>
                            <input id="city_company" type="text" class="form-control" maxlength="45">
                        </div>                    
                    </div>    
                    <div class="col-xs-6 col-sm-4 text-center">              
                        <div class="form-group"><label class=" control-label">Documento</label>
                            <input id="iddocument" type="text" class="form-control" maxlength="100">
                        </div> 
                        <div class="form-group"><label class=" control-label">Apellidos de Paciente</label>
                            <div class=""><input id="edit_nit_company" type="text" class="form-control" maxlength="45"></div>
                        </div>

                        <div class="form-group"><label class=" control-label">Estado Civil</label>
                            <select id="tipodoc" name="tipodoc">
                                <option value="">Seleccione..</option>
                                <?php foreach($estadosCiviles AS $item):?>
                                <option value="<?php print $item["id"];?>"><?php print $item["descripcion"];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group"><label class=" control-label">Telefonos</label>
                            <input id="city_company" type="text" class="form-control" maxlength="45">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">                    
                        <div class="form-group"><label class=" control-label">Direccion</label>
                            <input id="city_company" type="text" class="form-control" maxlength="45">
                        </div>
                    
                        <div class="form-group"><label class=" control-label">Alergias</label>
                            <input id="city_company" type="text" class="form-control" maxlength="45">
                        </div>
                    
                        <div class="form-group"><label class=" control-label">Enfermedades</label>
                            <input id="city_company" type="text" class="form-control" maxlength="45">
                        </div>
                    
                        <div class="form-group"><label class=" control-label">Medicinas</label>
                            <input id="city_company" type="text" class="form-control" maxlength="45">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="hr-line-dashed"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-danger" id="btn_send">Guardar</button>
            </div>
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