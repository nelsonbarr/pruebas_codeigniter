    </body>
    <!--   Core JS Files   -->
    <!--   Core JS Files   -->
    <script src="<?php echo base_url() ?>assets/js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
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
var arrPacientes=new Array();
        
    arrPacientes=<?php print json_encode($pacientes);?>;
    //HAGO SEGUIMIENTO AL onclick DEL BOTON AGREGAR DE LA VISTA LISTA PACIENTES   
    $('#btn_add').on('click',function () { 
      $('#txtiddocumento').attr('readonly',false);       
      $('#idtipodoc').removeAttr('disabled'); 
      $('#idpaciente').val('');
      $('#idtipodoc').val('');
      $('#txtiddocumento').val('');
      $('#txtnombres').val('');
      $('#txtapellidos').val('');
      $('#txtemail').val('');
      $('#txtdireccion').val('');
      $('#txtfechanacimiento').val('');
      $('#txttelefonos').val('');   
      $('#estadocivil').val('');
      $('#txtalergias').val('');   
      $('#txtenfermedades').val('');   
      $('#txtmedicinas').val('');    
      $('input:radio[name="genero"][value=M]').prop('checked', true);  
    });

    //HAGO SEGUIMIENTO AL onclick DE CADA BOTON HISTORIA DEL LISTADO DE PACIENTES 
    $('button[id=btn_history]').on('click',function () {      
        var idpaciente=$(this).data("id");               
        $.ajax({
        type:'POST',
        url:'<?php print base_url();?>pacientes/carga_Historico/'+idpaciente,
        success:function(data){
          data=JSON.parse(data);
          json=data.data;          
          html="";
          $("#historico").html('');
          if(json.length>0){
            $('#txtnombrepaciente').val(json[0].nombre_paciente);
            for(i=0;i<json.length;i++){
                fila=json[i]; 
                if(fila.sintomas==null)
                    sintomas="";                
                else
                    sintomas=fila.sintomas;
                if(fila.motivocita==null)
                    motivocita="";                
                else
                    motivocita=fila.motivocita;
                if(fila.descripcion==null)
                    descripcion="";                
                else
                    descripcion=fila.descripcion;

                html+='<small><div><b>Fecha:</b> '+fila.fechacita+'</div>'; 
                html+='<div><b>Motivo Cita:</b> '+motivocita+'</div>';
                html+='<div><b>Sintomas:</b> '+sintomas+'</div>';            
                html+='<div><b>Descripcion:</b> '+descripcion+'</div></small><hr/>';
            }
          }
          else{
            html+='<div>Paciente aun no tiene Historia</div>';
            //$('#modalPacienteHistory').modal('hide')
          }
          $("#historico").html(html);         
        }
      })//end ajax

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
        $('#tablepacientes').DataTable({
            responsive: true,
            'order': []
        });

        $('#txtfechanacimiento').datepicker({
            format: 'yyyy-mm-dd',
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