
<!-- some CSS styling changes and overrides -->
<style>
.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar {
    display: inline-block;
}
.kv-avatar .file-input {
    display: table-cell;
    width: 123px;
}
.kv-reqd {
    color: red;
    font-family: monospace;
    font-weight: normal;
}
</style>
<div class="modal fade" id="modalPacientes" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog   ">
        <div class="modal-content ">
            <form action="<?php print base_url();?>pacientes/savePacienteCita" id="formulario" name="formulario" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-danger text-center"><strong>Registro de Pacientes</strong>
                </h4>
                <small class="font-bold"></small>
            </div>            
            <div class="modal-body ">
                <div class="container col-xs-12"> 
                    <!-- markup -->
                    <!-- note: your server code `avatar_upload.php` will receive `$_FILES['avatar']` on form submission -->
                    <!-- the avatar markup -->                        
                        <div class="row">
                            <div class="col-sm-4 text-center">                                
                                <div class="kv-avatar col-sm-12">
                                    <div class="file-loading">
                                        <input id="avatar-1" name="avatar-1" type="file" >
                                    </div>
                                </div>
                                <div class="kv-avatar-hint"><small>Select file < 1500 KB</small></div>                                                                   
                            </div>
                            <div class="col-sm-8">
                                <div class="container col-xs-12">                                          
                                    <!-- edit form column -->                                            
                                    <div class="row ">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <label class="control-label">Tipo Documento</label>
                                                <input id="idpaciente" name="idpaciente" type="hidden"/>
                                                <select id="idtipodoc" class="form-control" name="idtipodoc" required>
                                                    <option value="">Seleccione..</option>
                                                    <?php foreach($tiposDocs AS $item):?>
                                                        <option value="<?php print $item["id"];?>"><?php print $item["descripcion"];?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group"><label class=" control-label">Documento</label>
                                                <input id="txtiddocumento" name="txtiddocumento" type="number" class="form-control" maxlength="12" required>
                                            </div>
                                        </div>                        
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group"><label class=" control-label">Nombres</label>
                                                <input id="txtnombres" name="txtnombres" type="text" class="form-control" maxlength="255" required>
                                            </div>
                                        </div>   
                                        <div class="col-xs-6">
                                            <div class="form-group"><label class=" control-label">Apellidos</label>
                                                <input id="txtapellidos" name="txtapellidos" type="text" class="form-control" maxlength="255" required>
                                            </div>
                                        </div>  
                                    </div>  
                                    <div class="row">                       
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <label class=" control-label">Genero</label>
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="genero" name="genero" value="M">
                                                    <label for="checkbox1"><small>Masculino</small></label>
                                                    <input type="radio" class="form-check-input" id="genero" name="genero" value="F" >
                                                    <label for="checkbox2"><small>Femenino</small></label>
                                                </div>                                  
                                            </div>
                                        </div>
                                        <div class="col-xs-4 form-group">
                                            <label class="control-label">Fecha Nacimiento</label>
                                            <div class="input-group date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
                                                <div class="input-group-addon"><span class="fa fa-calendar"></span>
                                                <input type="text" id="txtfechanacimiento" name="txtfechanacimiento" class="form-control" readonly/>
                                                </div>
                                            </div>
                                        </div>
                                                                                
                                        
                                        <div class="col-xs-4">
                                            <div class="form-group"><label class=" control-label">Email</label>
                                                <input id="txtemail" name="txtemail" type="email" class="form-control" maxlength="45" required>
                                            </div>                    
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="form-group"><label class=" control-label">Estado Civil</label>
                                                <select id="estadocivil" class="form-control" name="estadocivil" required>
                                                    <option value="">Seleccione..</option>
                                                    <?php foreach($estadosCiviles AS $item):?>
                                                    <option value="<?php print $item["id"];?>"><?php print $item["descripcion"];?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group"><label class=" control-label">Telefonos</label>
                                                <input id="txttelefonos" name="txttelefonos" type="text" class="form-control" maxlength="45" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="form-group"><label class=" control-label">Ciudad</label>
                                                <input id="txtciudad" name="txtciudad" type="text" class="form-control" maxlength="45">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="form-group">
                                                <label class=" control-label">Direccion</label>
                                                <input id="txtdireccion" name="txtdireccion" type="text" class="form-control" maxlength="45">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">                                                                
                                        <div class="col-xs-6">
                                            <div class="form-group"><label class=" control-label">Lugar Nacimiento</label>
                                                <input id="txtlugarnacimiento" name="txtlugarnacimiento" type="text" class="form-control" maxlength="255">
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group"><label class=" control-label">Enfermedades</label>
                                                <input id="txtenfermedades" name="txtenfermedades" type="text" class="form-control" maxlength="45">
                                            </div>
                                        </div> 
                                    </div>  
                                    <div class="row">   
                                        <div class="col-xs-6">
                                            <div class="form-group"><label class=" control-label">Alergias</label>
                                                <input id="txtalergias" name="txtalergias" type="text" class="form-control" maxlength="45">
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group"><label class=" control-label">Medicinas</label>
                                                <input id="txtenfermedades" name="txtenfermedades" type="text" class="form-control" maxlength="45">
                                            </div>
                                        </div>
                                    </div>       
                                    <div class="row">  
                                        <div class="col-xs-6">
                                            <div class="form-group"><label class=" control-label">Acudiente</label>
                                                <input id="txtacudiente" name="txtacudiente" type="text" class="form-control" maxlength="45">
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group"><label class=" control-label">Telefono Acudiente</label>
                                                <input id="txttelfacudiente" name="txttelfacudiente" type="text" class="form-control" maxlength="45">
                                            </div>
                                        </div>                                            
                                    </div>                         
                                </div>
                            </div>
                        </div>                        
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