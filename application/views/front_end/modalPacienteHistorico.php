<div class="modal fade" id="modalPacienteHistory" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog   ">
        <div class="modal-content ">
            <form action="<?php print base_url();?>pacientes/savePaciente" method="POST">
            <div class="modal-header text-center">
                <h4 class="modal-title text-danger"><strong>Historico de Paciente</strong>
                </h4>
                <small class="font-bold"></small>
            </div>            
            <div class="modal-body ">
                <div class="container col-xs-12">                    
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <div class="form-group">
                                <label class=" control-label">Paciente</label>
                                <input id="txtnombrepaciente" name="txtnombrepaciente" type="text" class="form-control" readonly maxlength="255">
                            </div>
                        </div>                           
                    </div> 
                    <div class="row">
                        <div id="historico" style="overflow-y: true"><!--ACA SE CARGARA LA HISTORIA DEL PACIENTE--></div>
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
            </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="myModalH" tabindex="-1" role="dialog" aria-labelledby="myModalHistorico" aria-hidden="true" style="display: none;">
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
