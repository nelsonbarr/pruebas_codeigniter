<div class="modal fade" id="modalEspecialidades" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog   ">
        <div class="modal-content ">
            <form action="<?php print base_url();?>especialidades/saveEspecialidad" id="formulario" name="formulario" method="POST">
            <div class="modal-header">
                <h4 class="modal-title text-danger text-center"><strong>Registro de Especialidades</strong>
                </h4>
                <small class="font-bold"></small>
            </div>            
            <div class="modal-body ">
                <div class="container col-xs-12">                    
                    <div class="row ">                        
                        <div class="col-xs-12">
                            <div class="form-group"><label class=" control-label">Descripcion</label>
                                <input id="id" name="id"  type="hidden" />
								<input id="status" name="status"  type="hidden" />
                                <input id="txtdescripcion" name="txtdescripcion" type="text" class="form-control" maxlength="100"/>
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