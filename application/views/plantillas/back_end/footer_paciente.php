<?php
header("Expires: Fri, 14 Mar 1980 20:53:00 GMT"); //la pagina expira en fecha pasada
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header("Pragma: no-cache"); //PARANOIA, NO GUARDAR EN CACHE
?>    
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
    <!--REQUIRES FOR BOOTSTRAP FILEINPUT MASTER-->
    <link  href="<?php echo base_url('assets/bootstrap_file_input/css/fileinput.css');?>" media="all" rel="stylesheet" type="text/css"/>
    <link  href="<?php echo base_url('assets/bootstrap_file_input/themes/explorer-fa/theme.css');?>" media="all" rel="stylesheet" type="text/css"/>
    <script src="<?php echo base_url('assets/bootstrap_file_input/js/plugins/sortable.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/bootstrap_file_input/js/fileinput.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/bootstrap_file_input/js/locales/es.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/bootstrap_file_input/themes/explorer-fa/theme.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/bootstrap_file_input/themes/fa/theme.js');?>" type="text/javascript"></script> 
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

    $('#txtiddocumento').attr('readonly',false);       
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
        $('#txtciudad').val('');
        $('#txtfechanacimiento').val('');
        $('#txttelefonos').val('');   
        $('#estadocivil').val('');
        $('#txtalergias').val('');   
        $('#txtenfermedades').val('');   
        $('#txtmedicinas').val(''); 
        $("#txtlugarnacimiento").val("");
        $("#txtacudiente").val("");
        $("#txttelfacudiente").val("");  
        $('input:radio[name="genero"][value=M]').prop('checked', true);  
        foto="<?php print base_url();?>assets/images/profile-2.png";
                                  
        //$("#avatar-1").fileinput('refresh'); 
        // refresh plugin with new options 
        if ($("#avatar-1").data('fileinput')) {
            $("#avatar-1").fileinput('destroy');
        }
        
        $("#avatar-1").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showRemove: false,
            showClose: false,
            showCaption: false,
            autoReplace: true,
            validateInitialCount: false,
            browseLabel: '',                                 
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            layoutTemplates: {main2: '{preview} ' + ' {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"],
            initialPreviewAsData: true,  
            initialPreviewFileType: 'image', // image is the default and can be overridden in config below  
            initialPreview: [ foto], 
            uploadUrl:"C:\fakepath\escudo-xxx-lata.jpg",
            previewFileIconSettings: {                                    
                'jpg': '<i class="fa fa-file-photo-o text-warning"></i>',
                },
            previewFileExtSettings: {
                    'jpg': function(ext) {
                        return ext.match(/(jp?g|png|gif|bmp)$/i);
                    },
                }, 
            initialPreviewConfig: [ {caption: '',type:"image",  height: "120px", url: "", key:''}],                                                         
            } 
        ); 
    }

   
    
   
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
                    return '<button type="button" id="btn_edit" alt="Editar" title="Editar" class="btn btn-info btn_edit" data-toggle="modal" data-id="'+row[0]+'" data-target="#modalPacientes"><span class="fa fa-edit pull-right"></span></button>'
                    +
                        '<button type="button" id="btn_history" alt="Historia" title="Historia" class="btn btn-default" data-toggle="modal" data-id="'+row[0]+'" data-target="#modalPacienteHistory"><span class="fa fa-align-justify pull-right"></span></button>'
                    +
                        '<button type="button" id="btn_delete" alt="Borrar" title="Borrar" class="btn btn-danger" data-id="'+row[0]+'" ><span class="fa fa-close pull-right"></span></button>'    
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
                            $('#txtiddocumento').val(pacienteEdit.documento.trim());                                                                                                                       
                            $('#txtnombres').val(pacienteEdit.nombres);
                            $('#txtapellidos').val(pacienteEdit.apellidos);
                            $('#txtemail').val(pacienteEdit.email);
                            $('#txtdireccion').val(pacienteEdit.direccion);
                            $('#txtciudad').val(pacienteEdit.ciudad);
                            $('#txtfechanacimiento').val(pacienteEdit.fechanacimiento);
                            $('#txttelefonos').val(pacienteEdit.telefono);   
                            $('#estadocivil').val(pacienteEdit.idestadocivil);
                            $('#txtalergias').val(pacienteEdit.alergias);   
                            $('#txtenfermedades').val(pacienteEdit.enfermedadesprevias);   
                            $('#txtmedicinas').val(pacienteEdit.medicamentos);   
                            $('#txtlugarnacimiento').val(pacienteEdit.lugarnacimiento);
                            $('#txtacudiente').val(pacienteEdit.acudiente);   
                            $('#txttelfacudiente').val(pacienteEdit.telfacudiente);                             
                            if(pacienteEdit.genero.trim()!=""){
                                $('input:radio[name="genero"][value="'+pacienteEdit.genero+'"]').prop('checked', true); 
                            }
                            
                            if(pacienteEdit.photo==null){
                                foto="<?php print base_url();?>assets/images/profile-2.png";
                                caption="profile-2.png";
                            }
                            else{
                                foto="<?php print base_url();?>assets/images/"+pacienteEdit.photo;
                                caption=pacienteEdit.photo;
                            }
                            //$("#avatar-1").fileinput('refresh'); 
                            // refresh plugin with new options 
                            if ($("#avatar-1").data('fileinput')) {
                                $("#avatar-1").fileinput('destroy');
                            }
                            
                            $("#avatar-1").fileinput({
                                overwriteInitial: true,
                                maxFileSize: 1500,
                                showRemove: false,
                                showClose: false,
                                showCaption: false,
                                autoReplace: true,
                                validateInitialCount: false,
                                browseLabel: '',                                 
                                browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
                                removeTitle: 'Cancel or reset changes',
                                elErrorContainer: '#kv-avatar-errors-1',
                                msgErrorClass: 'alert alert-block alert-danger',
                                layoutTemplates: {main2: '{preview} ' + ' {browse}'},
                                allowedFileExtensions: ["jpg", "png", "gif"],
                                initialPreviewAsData: true,  
                                initialPreviewFileType: 'image', // image is the default and can be overridden in config below  
                                initialPreview: [ foto],                                
                                uploadUrl:"<?php print base_url();?>assets/images/",
                                defaultPreviewContent:foto,
                                previewFileIconSettings: {                                    
                                    'jpg': '<i class="fa fa-file-photo-o text-warning"></i>',
                                    },
                                previewFileExtSettings: {
                                        'jpg': function(ext) {
                                            return ext.match(/(jp?g|png|gif|bmp)$/i);
                                        },
                                    }, 
                                initialPreviewConfig: [ {caption: caption,type:"image",  height: "120px", url: "", key:caption}],                                                         
                                } 
                            );
                            
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

                                        html+='<small><div class="col-xs-6"><b>Fecha:</b> '+fila.fechacita+'</div>'; 
                                        html+='<div class="col-xs-6"><div class"clearfix"></div><b>Motivo Cita:</b> '+motivocita+'</div>';
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
            else if(this.id=="btn_delete"){                
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
                            if(confirm("Seguro desea eliminar el paciente "+json[0].nombres+"  "+json[0].apellidos)){
                                $.ajax({
                                    type:'POST',
                                    url:'<?php print base_url();?>pacientes/deletePaciente/'+json[0].id,
                                    success:function(data){  
                                        data=JSON.parse(data)
                                        if(data.success){
                                            console.log("PRUEBA");
                                            location.href="<?php print base_url();?>pacientes";
                                        }
                                    }
                                });
                                
                            }
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