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
var arrUsuarios=new Array();
        
    arrUsuarios=<?php print json_encode($usuarios);?>;
    //HAGO SEGUIMIENTO AL onclick DEL BOTON AGREGAR DE LA VISTA LISTA PACIENTES   
    $('#btn_add').on('click',function () { 
       
      $('#id').val('');
      $('#idtipodoc').val('');
      $('#txtnombres').val('');
      $('#txtapellidos').val('');
      $('#txtemail').val('');
      $('#txttelefonos').val('');   
      $('#selPerfil').val('');   
      
    });

    
    
    //HAGO SEGUIMIENTO AL onclick DE CADA BOTON EDICION DEL LISTADO DE PACIENTES 
    $('button[id=btn_edit]').on('click',function () {
      id=$(this).data("id");    
      //arrPacientes=JSON.parse(arrPacientes.split('\t').join(''));;
      pacienteEdit=arrPacientes[id];
      $('#idpaciente').val(pacienteEdit.id);      
      $('#idtipodoc').val(pacienteEdit.idtipodocumento);
      $('#idtipodoc').attr('disabled','disabled');
      $('#txtiddocumento').val(pacienteEdit.documento);
      $('#txtiddocumento').attr('readonly',true);
      $('#txtnombres').val(pacienteEdit.nombres);
      $('#txtapellidos').val(pacienteEdit.apellidos);
      $('#txtemail').val(pacienteEdit.email);
      $('#txtdireccion').val(pacienteEdit.direccion);
      $('#txtfechanacimiento').val(pacienteEdit.fechanacimiento);
      $('#txttelefonos').val(pacienteEdit.telefono);   
      $('#estadocivil').val(pacienteEdit.idestadocivil);
      $('#txtalergias').val(pacienteEdit.alergias);   
      $('#txtenfermedades').val(pacienteEdit.enfermedadesprevias);   
      $('#txtmedicinas').val(pacienteEdit.medicamentos);    
      $('input:radio[name="genero"][value='+pacienteEdit.genero+']').prop('checked', true);  
    });

    $(function() {
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