
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
        <link href='<?php print base_url();?>assets/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
        <link href='<?php print base_url();?>assets/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
        <script src='<?php print base_url();?>assets/fullcalendar/moment.min.js'></script>
        <script src='<?php print base_url();?>assets/fullcalendar/fullcalendar.min.js'></script>
    </head>
    <body id="LoginForm">	
        <section class="login-block">
            <div class="container">
                <div class="row">                   
                    <div class="col-md-6 login-sec">
                        <!--h2 class="text-center">SISTEMA DE CONTROL DE CITAS</h2>
                        <h3 class="text-center">Ingreso</h3-->
                        <div class="col-sm-12 text-center">
                        <img  width="300" src="<?php print base_url();?>assets/images/logo.png"/>
                        </div>
                        <form class="login-form" action="<?php base_url()?>access/login_user" method="post">
                            <div class="form-group">
                                <input class="form-control" placeholder="Usuario" name="txtusr" id="txtusr"  type="text"/>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Contraseña" id="txtpwd" name="txtpwd" type="password" value=""/>
                            </div>
                            <div class="forgot">
                                <a href="#" id="btn_olvido">Olvido su contraseña</a>
                            </div>
                            <input class=" btn btn-login" type="submit" value="Iniciar Sesion"/> 
                                    
                        </form>                
                    </div>
                    <div class="col-md-6 banner-sec">
                        <div class="col-sm-12">
                            <?php if ($this->session->flashdata('error')) { ?>
                                <div class="alert alert-danger text-center"> <?php echo $this->session->flashdata('error') ?> </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert alert-success text-center"> <?php echo $this->session->flashdata('success') ?> </div>
                            <?php } ?>
                        </div> 
                    </div>
                </div>
            </div>
        </section>
	</body>
    <!--   Core JS Files   -->
    <script src="<?php print base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
   
    <!--  Charts Plugin -->
    <script src="<?php print base_url();?>assets/js/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="<?php print base_url();?>assets/js/bootstrap-notify.js"></script>
    
    <script language="javascript">
        $('#btn_olvido').on('click',function () {      
            user=$("#txtusr").val();
            if(user==""){
                $(".banner-sec").html('<div class="col-sm-12"><div class="alert alert-danger text-center">Debe indicar el Usuario</div></div>' );
            }
            else{
                location.href="<?php print base_url();?>access/recuperacion/"+user;
            }
        });
    </script>
</html>
