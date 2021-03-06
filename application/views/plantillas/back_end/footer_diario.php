    
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
    <script src='<?php echo base_url() ?>assets/fullcalendar/locale-all.js'></script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap-notify.js"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="<?php echo base_url() ?>assets/js/material-dashboard.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url() ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"?></script>
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
    //TOMO EL ARREGLO DE CITAS DEL CONTROLADOR
    var citas='<?php echo is_array($citas); ?>';
    
    if(citas!=-1){        
        var citas='<?php echo $citas ?>'        
        //while(citas.search('\n')>=0){
          citas = citas.split('\n').join('');
          citas = citas.split('\t').join(''); 
          citas = citas.split('\r').join('<br>'); 
        //} 
          
        citas = JSON.parse(citas); 
        var meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
    }
    else{
        citas=new Array();             
        //arrPacientes=<?php //print json_encode($pacientes);?>;       
    } 
    //console.log(citas);
    function limpiarMensaje(){
            $(".banner-sec").html('')
        }   
   
        window.mobilecheck = function() {
        var check = false;
        (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
        return check;
        };
   
    $(function() {
        $("#formulario").keypress(function(e) {//Para deshabilitar el uso de la tecla "Enter"
            if (e.which == 13) {
                return false;
            }
         });

      $('#fecha_comite_patrocinio').datepicker({
            format: 'dd-mm-yyyy',
            //startDate: '-Infinity',
            todayHighlight: true,
            autoclose: true
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

        //HAGO SEGUIMIENTO AL onclick DE BOTON HISTORIA DEL PACIENTE
        $('#btn_add').on('click',function () { 
            blanquear();            
            $('#datecita').val($("#date").val())
            var idpaciente=$('select[name=selPaciente]').val() 
            $.ajax({
                type:'POST',
                url:'<?php print base_url();?>pacientes/carga_Paciente/'+idpaciente,
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
    });

//HAGO SEGUIMIENTO AL onclick DE BOTON HISTORIA DEL PACIENTE
    $('#btn_history').on('click',function () { 
        limpiarMensaje()      
        var idpaciente=$('select[name=selPaciente]').val() 
        $('#txtnombrepaciente').val($('select[name=selPaciente] option:selected').text());             
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
                if(fila.historiamedica==null)
                    historia="";                
                else
                    historia=fila.historiamedica;
                //html+='<div class="col-lg-12">'                  
                historia = historia.split('<br>').join('\n');              
                while( historia.indexOf('<') > -1)
                {
                    historia = historia.replace('<','&lt;');
                }
                while( historia.indexOf('>') > -1)
                {
                    historia = historia.replace('>','&gt;');
                }      
                              
               
                html+='<div class="row"><small>'
                html+='<div class="col-lg-6"><b>Fecha:</b> '+fila.fechacita+'</div>' 
                html+='<div class="col-lg-6"><b>Motivo Cita:</b> '+motivocita+'</div>'
                html+='<div class="col-lg-6"><b>Sintomas:</b> '+sintomas+'</div>'            
                html+='<div class="col-lg-6"><b>Descripcion:</b> '+descripcion+'</div>'
                html+='<div class="col-lg-12"><b>Historia Medica:</b> '+historia+'</div>'
                //html+='</div>'                
                               
                html+='</small></div>'
                html+='<div class="clearfix"><hr></hr></div>' 
                
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

        //BLOQUE DE INICIALIZACION DE CALENDARIO

        var initialLocaleCode = 'en';
        //$('#calendar').fullCalendar({});
        var tipocalendar='<?php print $tipocalendar;?>';
          
       /* if(tipocalendar!=''){*/
           // console.log(tipocalendar);
            if(tipocalendar=='agendaWeek'){
                $('#tipoagenda').text('Agenda Semanal');
                var propRight='month,basicWeek,basicDay,year';
                
            }
            else if(tipocalendar=='agendaDay'){
                $('#tipoagenda').text('AGENDA DIARIA');
                var propRight='listDay,listWeek,listMonth';
                tipocalendar="listDay";                
            }
            else{

            }

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next,today',
                    center: 'title',  //right: 'month'//right: 'year,month,basicWeek,basicDay'
                    right: propRight
                },
                businessHours: {
                    start: '08:00', // hora final
                    end: '18:00', // hora inicial
                    dow: [ 1, 2, 3, 4, 5,6,0 ] // dias de semana, 0=Domingo
                },//minTime: "07:00:00", maxTime: "20:00:00",                           
                slotDuration: '00:15:00',
                contentHeight:480,       //auto                           
                defaultView: tipocalendar,  
                views: {
                    listDay: { buttonText: 'Lista Dia' },
                    listWeek: { buttonText: 'Lista Semana' },
                    listMonth: { buttonText: 'Lista Mes' }
                },
                locale : 'es',
                eventLimit: true, // allow "more" link when too many events*/               
                buttonIcons: true, // show the prev/next text
                weekNumbers: true,
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                allDaySlot: false,
                defaultTimedEventDuration:'00:15:00',                               
                dayClick: function(date, jsEvent, view) {//DETECCION DEL EVENTO SELECCIONAR DIA, LLAMA A LA VENTANA REGISTRAR CITA                    
                    blanquearCita();
                    this.start = date.format('D/M/Y HH:mm');
                    dateend=new Date(date.format('M/D/Y HH:mm'));
                    dateend.setMinutes(dateend.getMinutes() + 15);
                    $("#date").val(this.start);
                    $("#dateend").val(dateend.getDate()+"/"+(dateend.getMonth() + 1) + "/" + dateend.getFullYear() + " " +dateend.getHours() + ":" + dateend.getMinutes() + ":" + dateend.getSeconds());                    
                    $('#btn_add').show()
                    $('#modalPacientesList').modal('show')                    
                },
                eventClick: function(event, jsEvent, view) {//DETECCION DEL EVENTO SELECCIONAR CITA,LLAMA A LA VENTANA REGISTRAR CITA PARA EDICION
                    blanquearCita(); 
                    $("#selPaciente").empty().append('<option value='+event.idpaciente+'>'+event.title+'</option>').val(event.idpaciente).trigger('change');
                    $("#selPaciente").prop("disabled", true);
                    
                    $("select[name=selMedico]").val(event.idmedico);
                    $('.selectpicker').selectpicker('refresh')  
                    //$('#btn_add').hide()
                    $("#txtnombrepaciente").val(event.nombre_paciente+"  ID: "+event.documento);
                    $("#idcita").val(event.idcita)                  
                    $("#date").val(event.start.format('D/M/Y HH:mm'));
                    $("#dateend").val(event.end.format('D/M/Y HH:mm'));
                    $("#txtmotivocita").val(event.motivocita);
                    $("#selEstadoCita").val(event.idestadocita);
                    $("#selEstadoPago").val(event.idestadopago);
                    $("#txtsintomas").val(event.sintomas);
                    $("#txtdescripcion").val(event.descripcion);
                    historia=event.historiamedica
                    historia = historia.split('<br>').join('\n');                                  
                    $("#txthistoria").val(historia);
                    $("#txtmedicinastomadas").val(event.medicamentos);
					$("#txtalergias").val(event.alergias);
                    $('#modalPacienteCita').modal('show')
                },
                eventDrop: function(event, delta){ // event drag and drop, MODIFICA LAS FECHAS Y HORAS DEPENDIENDO DE LA NUEVA SELECCION LUEGO DE ARRASTRAT Y SOLTAR
                    limpiarMensaje()
                    start=event.start.format("Y-MM-DD HH:mm");                                
                    end=event.end.format("Y-MM-DD HH:mm");                    
                    $.ajax({
                        url:'<?php print base_url();?>home/saveCita/',                       
                        data: 'date='+start+'&dateend='+end+'&idcita='+event.idcita+"&action=NO",
                        type: "POST",
                        success: function(json) {
                        //alert(json);
                        }
                    });
                },
                eventResize: function(event) {  // resize to increase or decrease time of event, MODIFICA LAS FECHAS Y HORAS DEPENDIENDO DE LA NUEVA SELECCION LUEGO DE MODIFICAR DURACION DE CITA
                    limpiarMensaje()
                    start=event.start.format("Y-MM-DD HH:mm");                                
                    end=event.end.format("Y-MM-DD HH:mm"); 
                    $.ajax({
                        url:'<?php print base_url();?>home/saveCita/',  
                        data: 'action=NO&date='+start+'&dateend='+end+'&idcita='+event.idcita,
                        type: "POST",
                        success: function(json) {
                            //alert(json);
                        }
                    });
                },
                eventRender: function(event, element) { 
                    element.find('.fc-title').append(" - " + event.description);  
                    element.find('.fc-list-item-title fc-widget-content a').append("- "+event.historiamedica);   
                    

                } ,
                eventAfterAllRender:function(){
                    $("#calendar").find('.fc-widget-header').append("<div class='text-center'><span style='font-size:11px;'>&nbsp;&nbsp;&nbsp;Id &nbsp;&nbsp; |&nbsp;&nbsp; Paciente  &nbsp;&nbsp; |&nbsp;&nbsp; Edad  &nbsp;&nbsp;| &nbsp;&nbsp;Estatus de pago&nbsp;&nbsp; |&nbsp;&nbsp; Motivo Cita&nbsp;&nbsp; | &nbsp;&nbsp;Observacion | &nbsp;&nbsp;Acudiente | &nbsp;&nbsp;Telf Acudiente</span></div>")
                    
                }                
                
            });            
            //console.log(citas)
            $('#calendar').fullCalendar('addEventSource', citas); 


        //}    
        function blanquearCita(){
            limpiarMensaje()
            $('select[name=selPaciente]').val('');
            $('.selectpicker').selectpicker('refresh') 
            $("#idcita").val('')
            $("#date").val('');
            $("#selEstadoCita").val(1)
            $("#dateend").val('');
            $("#txtmotivocita").val('');
            $("#txtsintomas").val('');
            $("#txtdescripcion").val('');
            $("#txtmedicinastomadas").val('')
            $("#txthistoria").val('');
            $('select[name=selMedico]').val('');
            $('.selectpicker').selectpicker('refresh') 
        }    
        
        
        $(".push_menu").click(function(){
             $(".wrapper").toggleClass("active");
        });

        

    });

           

</script>

</html>