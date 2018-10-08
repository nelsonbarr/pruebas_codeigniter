<div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog   ">
        <div class="modal-content ">
            <form action="<?php print base_url();?>usuarios/saveUsuario" method="POST">
            <div class="modal-header">
                <h4 class="modal-title text-danger text-center"><strong>Registro de Usuarios</strong>
                </h4>
                <small class="font-bold"></small>
            </div>            
            <div class="modal-body ">
                <div class="container col-xs-12">                    
                    <div class="row ">                        
                        <div class="col-xs-12">
                            <div class="form-group"><label class=" control-label">Nombre Usuario</label>
                                <input id="id" name="id"  type="text" />
								<input id="status" name="status"  type="hidden" />
                                <input id="txtnombreusuario" name="txtnombreusuario" type="text" class="form-control" maxlength="100"/>
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group"><label class=" control-label">Nombres</label>
                                <input id="txtnombres" name="txtnombres" type="text" class="form-control" maxlength="255">
                            </div>
                        </div>   
                        <div class="col-xs-6">
                            <div class="form-group"><label class=" control-label">Apellidos</label>
                                <input id="txtapellidos" name="txtapellidos" type="text" class="form-control" maxlength="255">
                            </div>
                        </div>  
                    </div>  
                    <div class="row">                       
                         <div class="col-xs-6">
                            <div class="form-group"><label class=" control-label">Telefonos</label>
                                <input id="txttelefonos" name="txttelefonos" type="text" class="form-control" maxlength="45">
                            </div>
                        </div>       
                        
                        <div class="col-xs-6">
                            <div class="form-group"><label class=" control-label">Email</label>
                                <input id="txtemail" name="txtemail" type="text" class="form-control" maxlength="45">
                            </div>                    
                        </div> 
                    </div>
                    <div class="row">
                         <div class="col-xs-6">
                            <div class="form-group"><label class=" control-label">Perfil</label>
                                <select id="selPerfil" class="form-control" name="selPerfil">
                                    <option value="">Seleccione..</option>
                                    <option value="1">Medico</option>                                    
                                    <option value="2">Asistente</option>
                                </select>
                            </div>
                        </div>                        
                        <div class="col-xs-6 text-center">
                            <div class="form-group">
                                <input id="txtpassword" name="txtpassword" type="password" class="form-control" placeholder="Contraseña" type="password" maxlength="10" value="">
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