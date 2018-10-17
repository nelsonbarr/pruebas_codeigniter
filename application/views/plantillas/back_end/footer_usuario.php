    
<!--Footer-->
<footer class="page-footer text-center font-small mt-4 wow fadeIn">


<!-- Social icons -->
<div class="pb-4">
    <a href="https://www.facebook.com/mdbootstrap" target="_blank">
        <i class="fa fa-facebook mr-3"></i>
    </a>

    <a href="https://twitter.com/MDBootstrap" target="_blank">
        <i class="fa fa-twitter mr-3"></i>
    </a>

    <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
        <i class="fa fa-youtube mr-3"></i>
    </a>
    
</div>
<!-- Social icons -->

<!--Copyright-->
<div class="footer-copyright py-3">
    © 2018 Copyright: Dr. Jorge Ulloa <a href="https://www.drjorgeulloa.com" target="_blank"> Dr Ulloa </a>
    <br>Desarrollado por: DEVELO, en conjunto con <a href="https://www.instagram.com/nelsonbarrwebdesign" target="_blank">@nelsonbarrwebdesign</a>
</div>
<!--/.Copyright-->
</footer> 
    </body>
    <!--   Core JS Files   -->
    <!--   Core JS Files   -->
    <script src="<?php echo base_url() ?>assets/js/popper.min.js" ></script>
    <script src="<?php echo base_url() ?>assets/js/md5.min.js" ></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/material.min.js" type="text/javascript"></script>
    <script src='<?php echo base_url() ?>assets/fullcalendar/moment.min.js'></script>    
    <script src='<?php echo base_url() ?>assets/fullcalendar/fullcalendar.min.js'></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap-notify.js"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="<?php echo base_url() ?>assets/js/material-dashboard.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"?></script>
    <script src="<?php echo base_url(); ?>assets/datatables2/media/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/datatables2/media/js/dataTables.buttons.js"></script>
    <script src="<?php echo base_url(); ?>assets/datatables2/media/js/buttons.print.js"></script>
    <script src="<?php echo base_url(); ?>assets/datatables2/media/js/buttons.html5.js"></script>
    <script src="<?php echo base_url(); ?>assets/datatables2/media/js/buttons.flash.js"></script>
    <!-- App scripts -->   
<script>
var arrUsuarios=new Array();
        
    arrUsuarios=<?php print json_encode($usuarios);?>;
    function limpiarMensaje(){
            $(".banner-sec").html('')
        }        
    //HAGO SEGUIMIENTO AL onclick DEL BOTON AGREGAR DE LA VISTA LISTA PACIENTES   
    $('#btn_add').on('click',function () {         
        limpiarMensaje()
        $('#id').val('');
        $('#txtnombreusuario').val('');
        $('#txtnombres').val('');
        $('#txtapellidos').val('');
        $('#txtemail').val('');
        $('#txttelefonos').val('');   
        $('#txtpassword').val('');   
        $('#status').val('0');   
        $('#selPerfil').val('');   
        $('#txtpregunta').val('');   
        $('#txtrespuesta').val('');
    });

    $('#txtpassword').on('change',function(){
        limpiarMensaje()
        $('#txtpassword').val(md5($('#txtpassword').val('')));  
    });

    //HAGO SEGUIMIENTO AL onclick DE CADA BOTON EDICION DEL LISTADO DE PACIENTES 
    $('button[id=btn_edit]').on('click',function () {
        limpiarMensaje()
        id=$(this).data("id");    
        //arrPacientes=JSON.parse(arrPacientes.split('\t').join(''));;
        usuarioEdit=arrUsuarios[id];
        $('#id').val(usuarioEdit.id);      
        $('#txtnombreusuario').val(usuarioEdit.nombreusuario);
        $('#txtnombres').val(usuarioEdit.nombres);
        $('#txtapellidos').val(usuarioEdit.apellidos);
        $('#txtemail').val(usuarioEdit.email);
        $('#txttelefonos').val(usuarioEdit.telefono); 
        $('#txtpassword').val(usuarioEdit.password); 
        $('#selPerfil').val(usuarioEdit.perfil);  
        $('#txtpregunta').val(usuarioEdit.preguntaseguridad);   
        $('#txtrespuesta').val(usuarioEdit.respuestapregunta); 
    });

    $(function() {
        $("#formulario").keypress(function(e) {//Para deshabilitar el uso de la tecla "Enter"
            if (e.which == 13) {
            return false;
            }
        });
        $('#tableusuarios').DataTable({
            responsive: true,
            'order': []
        });

       
        $(".push_menu").click(function(){
             $(".wrapper").toggleClass("active");
        });

        

    });          
</script>
</html>