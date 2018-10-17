
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Page title -->
        <title>CONTROL DE CITAS</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <link href="<?php print base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php print base_url();?>assets/css/styles.css" rel="stylesheet" />       
        <link href="<?php print base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <script src="<?php print base_url();?>assets/js/jquery.min.js" type="text/javascript"></script>        
    </head>
    <body id="LoginForm">	
        <section class="login-block">
            <div class="container">
                <div class="row">                   
                    <div class="col-md-6 login-sec">                        
                        <div class="col-sm-12 text-center">
                        <img  width="300" src="<?php print base_url();?>assets/images/logo.png"/>
                        <h3 class="text-center  text-danger">RECUPERACION DE CLAVES</h3>
                        </div>
                        <form id="formRepass" method="POST" action="<?php print base_url();?>usuarios/saveRenewPass" >
                        <div class="row"> 
                            <div class="col-xs-6">
                                <div class="form-group"><label class=" control-label">Nombre Usuario</label>                        
                                    <input id="txtnombreusuario" name="txtnombreusuario" value="<?php print $usuario["nombreusuario"]?>" type="text" class="form-control" maxlength="100" readonly/>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group"><label class=" control-label">Email</label>
                                    <input id="txtemail" name="txtemail" value="<?php print $usuario["email"]?>" type="text" class="form-control" maxlength="45" readonly/>
                                </div>                    
                            </div>                                                    
                        </div> 
                        <div class="row">                         
                            <div class="col-xs-6">
                                <div class="form-group"><label class=" control-label">Pregunta de recuperacion</label>
                                    <input id="txtpregunta" name="txtpregunta" type="text" value="<?php print $usuario["preguntaseguridad"]?>" class="form-control" maxlength="45" readonly/>
                                </div>
                            </div>                   
                            <div class="col-xs-6">
                                <div class="form-group"><label class=" control-label">Respuesta pregunta recuperacion</label>
                                    <input id="txtrespuesta" name="txtrespuesta" type="text" class="form-control" maxlength="45">
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
                            <button type="button" class="btn btn-danger" id="btn_send">Enviar</button>
                            <a href="<?php print base_url();?>access" class="btn btn-info">Cancelar</a>
                        </div>
                                    
                        </form>                
                    </div>
                    <div class="col-md-6 banner-sec">
                        <div class="col-sm-12">
                            <?php if ($this->session->flashdata('error')) { ?>
                                <div class="alert alert-danger text-center"> <?php echo $this->session->flashdata('error') ?> </div>
                            <?php unset($_SESSION["error"]);} ?>
                            <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert alert-success text-center"> <?php echo $this->session->flashdata('success') ?> </div>
                            <?php unset($_SESSION["success"]);} ?>
                        </div> 
                    </div>
                </div>
            </div>
        </section>
	</body>
    <!--   Core JS Files   -->
    <script src="<?php print base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/md5.js" ></script>
    <!--  Charts Plugin -->
    <script src="<?php print base_url();?>assets/js/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php print base_url();?>assets/js/bootstrap-notify.js"></script>
    
    <script language="javascript">
        $('#txtpassword').on('change',function(){
            limpiarMensaje()
            $('#txtpassword').val(hex_md5($('#txtpassword').val()));  
        });
        $('#txtrepassword').on('change',function(){
            limpiarMensaje()
            $('#txtrepassword').val(hex_md5($('#txtrepassword').val()));  
        });
         $('#btn_send').on('click',function () {      
            pass=$("#txtpassword").val();
            repass=$("#txtrepassword").val();
           
            if($("#txtrespuesta").val()==""){
                $(".banner-sec").html('<div class="col-sm-12"><div class="alert alert-danger text-center">Deben indicar la respuesta a su pregunta de seguridad</div></div>' ); 
                exit();
            }
            
            if(pass===repass && pass!=""){
                $( "#formRepass" ).submit();                
            }
            else{
                $(".banner-sec").html('<div class="col-sm-12"><div class="alert alert-danger text-center">Deben coincidir los password, asegurese que no sea valors vacios</div></div>' );
            }
        });
    </script>

</html>
