
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
        <br>Desarrollado por: Ing. Nelson Barraez. Instagram:<a href="https://www.instagram.com/nelsonbarrwebdesign" target="_blank">@nelsonbarrwebdesign</a>        
    </div>
    <!--/.Copyright-->
 </footer> 
</body>
    <!--   Core JS Files   -->
    <!--   Core JS Files   -->
    <script src="<?php echo base_url() ?>assets/js/popper.min.js" ></script>
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
var arrEspecialidades=new Array();
        
    arrEspecialidades=<?php print json_encode($especialidades);?>;
    //HAGO SEGUIMIENTO AL onclick DEL BOTON AGREGAR DE LA VISTA LISTA PACIENTES   
    $('#btn_add').on('click',function () { 
        limpiarMensaje()
        $('#id').val('');
        $('#txtdescripcion').val('');	       
    });

    //HAGO SEGUIMIENTO AL onclick DE CADA BOTON EDICION DEL LISTADO DE PACIENTES 
    $('button[id=btn_edit]').on('click',function () {
        limpiarMensaje()
        id=$(this).data("id");    
        //arrPacientes=JSON.parse(arrPacientes.split('\t').join(''));;
        especialidadesEdit=arrEspecialidades[id];
        $('#id').val(especialidadesEdit.id);      
        $('#txtdescripcion').val(especialidadesEdit.descripcion);  
    });

    $(function() {
        $('#tableespecialidades').DataTable({
            responsive: true,
            'order': []
        });

       
        $(".push_menu").click(function(){
             $(".wrapper").toggleClass("active");
        });

        function limpiarMensaje(){
            $(".banner-sec").html('')
        }
    });          
</script>
</html>