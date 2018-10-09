<link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables2/media/css/jquery.dataTables.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables2/media/css/buttons.dataTables.css" />
<div class="container ">    
    <div class="col-lg-12 text-center">                    
        <div class="row">                        
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <div class="form-group"><label class=" control-label">Nombre Usuario</label>                        
                        <input id="txtnombreusuario" name="txtnombreusuario" type="text" class="form-control" maxlength="100"/>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group"><label class=" control-label">Email</label>
                        <input id="txtemail" name="txtemail" type="text" class="form-control" maxlength="45">
                    </div>                    
                </div>
            </div>                        
        </div>               
        <div class="col-xs-12 text-center">
            <div class="row">                       
                <div class="col-xs-6">
                    <div class="form-group"><label class=" control-label">Pregunta de recuperacion</label>
                        <input id="txtpregunta" name="txtrespuesta" type="text" class="form-control" maxlength="45">
                    </div>
                </div>                   
                <div class="col-xs-6">
                    <div class="form-group"><label class=" control-label">Respuesta pregunta recuperacion</label>
                        <input id="txtrespuesta" name="txtrespuesta" type="text" class="form-control" maxlength="45">
                    </div>                    
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 text-center">
                <div class="form-group"><label class=" control-label">Nueva Contraseña</label>
                    <input id="txtpassword" name="txtpassword" type="password" class="form-control" placeholder="Contraseña" type="password" maxlength="10" value="">
                </div>                    
            </div>                       
            <div class="col-xs-6 text-center">
                <div class="form-group"><label class=" control-label">Contraseña</label>
                    <input id="txtrepassword" name="txtrepassword" type="password" class="form-control" placeholder="Re-escriba Contraseña" type="password" maxlength="10" value="">
                </div>                    
            </div> 
        </div>   
        <div class="row text-center">                  
            <button type="submit" class="btn btn-danger" id="btn_send">Guardar</button>
        </div>
    </div>
    
</div>    
</body>
</html>
