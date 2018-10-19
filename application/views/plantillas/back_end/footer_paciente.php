    
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
        
    //arrPacientes=<?php //print json_encode($pacientes);?>;
    function limpiarMensaje(){
            $(".banner-sec").html('')
        }

        //HAGO SEGUIMIENTO AL onclick DEL BOTON AGREGAR DE LA VISTA LISTA PACIENTES   
    $('#btn_add').on('click',function () { 
        limpiarMensaje()
        blanquear()  
    });


    function blanquear() { 
        limpiarMensaje()
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
    }

    //HAGO SEGUIMIENTO AL onclick DE CADA BOTON HISTORIA DEL LISTADO DE PACIENTES 
    $('button[id=btn_history]').on('click',function () {     
        limpiarMensaje()
        key=$(this).data("id");    
        //arrPacientes=JSON.parse(arrPacientes.split('\t').join(''));;
        pacienteEdit=arrPacientes[key];
        idpaciente=pacienteEdit.id;
        $('#txtnombrepaciente').val(pacienteEdit.nombres+" "+pacienteEdit.apellidos);                     
        $.ajax({
        type:'POST',
        url:'<?php print base_url();?>pacientes/carga_Historico/'+idpaciente,
        success:function(data){
          data=JSON.parse(data);
          json=data.data;          
          html="";
          $("#historico").html('');
          if(json.length>0){
            

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


    $(function() {
        $("#formulario").keypress(function(e) {//Para deshabilitar el uso de la tecla "Enter"
            if (e.which == 13) {
            return false;
            }
        });
        var table=$('#tablepacientes').DataTable({
            responsive: true,
            'order':  [[ 2, "asc" ]] ,
            "bProcessing": true,
            "serverSide": true,
            "ajax":{
                url :"<?php print base_url();?>pacientes/buscarPacienteList/", // json datasource
                type: "post",  // type of method  ,GET/POST/DELETE
                error: function(){
                $("#tablepacientes").css("display","none");
                }
            } ,
            "columns": [{'data':'0'},{'data':'1'},{'data':'2'},{'data':'3'},{'data':'4'},{'data':'5'},
                    {
                    "render": function (data, type, row) {
                    return '<button type="button" id="btn_edit" alt="Editar" title="Editar" class="btn btn-danger btn_edit" data-toggle="modal" data-id="'+row[0]+'" data-target="#modalPacientes"><span class="fa fa-edit pull-right"></span></button>'
                    +
                        '<button type="button" id="btn_history" alt="Historia" title="Historia" class="btn btn-default" data-toggle="modal" data-id="'+row[0]+'" data-target="#modalPacienteHistory"><span class="fa fa-align-justify pull-right"></span></button>'
                }}],
            columnDefs: [ { orderable: false, targets: [6] } ],
        });
        
        //ACTIVO LAS ACCIONES PARA LOS BOTONES EDIT E HISTORIA
        $('#tablepacientes tbody').on( 'click', 'button', function () {            
            if(this.id=="btn_edit"){
                limpiarMensaje()
                key=$(this).data("id");                 
                $.ajax({
                    type:'POST',
                    url:'<?php print base_url();?>pacientes/carga_Paciente/'+key,
                    success:function(data){                
                        data=JSON.parse(data);   
                        json=data.data;  
                        if(json.length>0){                    
                           
                            pacienteEdit=json[0];                         
                            blanquear()
                            $('#idpaciente').val(pacienteEdit.id);      
                            $('#idtipodoc').val(pacienteEdit.idtipodocumento);
                            $('#idtipodoc').attr('disabled','disabled');
                            $('#txtiddocumento').val(pacienteEdit.documento);                        
                            if(pacienteEdit.documento.trim()!=""){
                                $('#txtiddocumento').attr('readonly',true);
                            }                                            
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
                        }     
                       
                    }
                }); 
            } 
            else if(this.id=="btn_history"){
                key=$(this).data("id"); 
                $.ajax({
                    type:'POST',
                    url:'<?php print base_url();?>pacientes/carga_Paciente/'+key,
                    success:function(data){                
                        data=JSON.parse(data);   
                        json=data.data;  
                        if(json.length>0){                    
                           
                            pacienteEdit=json[0];                         
                            blanquear()
                            $('#txtnombrepaciente').val(json[0].nombres+"  "+json[0].apellidos);
                            $.ajax({
                                type:'POST',
                                url:'<?php print base_url();?>pacientes/carga_Historico/'+key,
                                success:function(data){
                                  data=JSON.parse(data);
                                  json=data.data;          
                                  html="";
                                  $("#historico").html('');
                                  if(json.length>0){
                                    
                                    
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
                              })//  end ajax
                        } 
                    }   
                });                  
            }  

        } );


        $('#txtfechanacimiento').datepicker({
            format: 'dd-mm-yyyy',
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