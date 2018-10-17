    
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/material.min.js" type="text/javascript"></script>
    <script src='<?php echo base_url() ?>assets/fullcalendar/moment.min.js'></script>    
    <script src='<?php echo base_url() ?>assets/fullcalendar/fullcalendar.min.js'></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap-notify.js"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="<?php echo base_url() ?>assets/js/material-dashboard.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"?></script>
    <script src="<?php echo base_url(); ?>assets/datatables2/media/js/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/datatables2/media/js/dataTables.buttons.js"></script>
    <script src="<?php echo base_url(); ?>assets/datatables2/media/js/buttons.print.js"></script>
    <script src="<?php echo base_url(); ?>assets/datatables2/media/js/buttons.html5.js"></script>
    <script src="<?php echo base_url(); ?>assets/datatables2/media/js/buttons.flash.js"></script>
    <!-- App scripts -->   
<script>
var arrMedicos=new Array();
    function limpiarMensaje(){
            $(".banner-sec").html('')
        }   
    arrMedicos=<?php print json_encode($medicos);?>;
    //HAGO SEGUIMIENTO AL onclick DEL BOTON AGREGAR DE LA VISTA LISTA PACIENTES           
    $('#btn_add').on('click',function () { 
        limpiarMensaje()
        $('#txtiddocumento').attr('readonly',false);       
        $('#idtipodoc').removeAttr('disabled'); 
        $('#idmedico').val('');
        $('#idtipodoc').val('');
        $('#txtiddocumento').val('');
        $('#txtnombres').val('');
        $('#txtapellidos').val('');
        $('#txtemail').val('');
        $('#txtdireccion').val('');
        $('#txtfechanacimiento').val('');
        $('#txttelefonos').val(''); 
        $('#txtdireccion').val('');          
        $('input:radio[name="genero"][value=M]').prop('checked', true);  
    });

    //HAGO SEGUIMIENTO AL onclick DE CADA BOTON EDICION DEL LISTADO DE PACIENTES 
    $('button[id=btn_edit]').on('click',function () {
        limpiarMensaje()
        id=$(this).data("id");    
        //arrMedicos=JSON.parse(arrMedicos.split('\t').join(''));;
        medicoEdit=arrMedicos[id];
        $('#idmedico').val(medicoEdit.id);      
        $('#idtipodoc').val(medicoEdit.idtipodocumento);
        $('#idtipodoc').attr('disabled','disabled');
        $('#txtiddocumento').val(medicoEdit.documento);
        $('#txtiddocumento').attr('readonly',true);
        $('#txtnombres').val(medicoEdit.nombres);
        $('#txtapellidos').val(medicoEdit.apellidos);
        $('#txtemail').val(medicoEdit.email);
        $('#txtdireccion').val(medicoEdit.direccion);
        $('#txtfechanacimiento').val(medicoEdit.fechanacimiento);
        $('#txttelefonos').val(medicoEdit.telefono);   
        console.log(medicoEdit.idespecialidad);
        $('#idespecialidad').val(medicoEdit.idespecialidad);       
        $('input:radio[name="genero"][value='+medicoEdit.genero+']').prop('checked', true);  
    });

    function limpiarMensaje(){
        $(".banner-sec").html('')
    }

    $(function() {
        $("#formulario").keypress(function(e) {//Para deshabilitar el uso de la tecla "Enter"
            if (e.which == 13) {
            return false;
            }
        });
        $('#tablemedicos').DataTable({
            responsive: true,
            'order': []
        });

        $('#txtfechanacimiento').datepicker({
            format: 'dd-mm-yy',
            //startDate: '-Infinity',
            todayHighlight: true,
            autoclose: true
        });        
        
        $(".push_menu").click(function(){
             $(".wrapper").toggleClass("active");
        });     


    });          
</script>
</html>