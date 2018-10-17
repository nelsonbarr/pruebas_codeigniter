    
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

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
var arrPacientes=new Array();
    //TOMO EL ARREGLO DE CITAS DEL CONTROLADOR
    var citas='<?php echo is_array($citas); ?>';
    if(citas!=-1){
        var citas = JSON.parse('<?php echo $citas ?>'.split('\t').join(''));        
        var meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
    }
    else{
        citas=new Array();             

        //arrPacientes=<?php //print json_encode($pacientes);?>;      
    }
    function limpiarMensaje(){
        $(".banner-sec").html('')
    }    
       
    $('#selPaciente').select2({
        placeholder: '--- Seleccione Paciente ---',
        minimumInputLength: 2,
        ajax: {
          url: '<?php print base_url();?>pacientes/buscarPaciente/',
          dataType: 'json',
          delay: 250,
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true
        }
      });

  
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

//HAGO SEGUIMIENTO AL onclick DE BOTON HISTORIA DEL PACIENTE
    $('#btn_history').on('click',function () { 
        limpiarMensaje()      
        var idpaciente=$('select[name=selPaciente]').val() 
        console.log(idpaciente);
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

        //BLOQUE DE INICIALIZACION DE CALENDARIO

        var initialLocaleCode = 'en';
        //$('#calendar').fullCalendar({});
        var tipocalendar='<?php print $tipocalendar;?>';
          
       /* if(tipocalendar!=''){
            console.log(tipocalendar);*/
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
                    dow: [ 1, 2, 3, 4, 5 ] // dias de semana, 0=Domingo
                },
                minTime: "07:00:00", 
                maxTime: "20:00:00",           
                slotDuration: '00:15:00',
                contentHeight:480,       //auto            
                hiddenDays: [ 6,0 ], // hide Tuesdays and Thursdays //defaultView: tipocalendar,               
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
                    this.start = date.format('D/M/Y hh:mm');
                    dateend=new Date(date.format('M/D/Y hh:mm'));
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
                    $('#btn_add').hide()
                    $("#txtnombrepaciente").val(event.nombre_paciente+"  ID: "+event.documento);
                    $("#idcita").val(event.idcita)                  
                    $("#date").val(event.start.format('D/M/Y hh:mm'));
                    $("#dateend").val(event.end.format('D/M/Y hh:mm'));
                    $("#txtmotivocita").val(event.motivocita);
                    $("#selEstadoCita").val(event.idestadocita);
                    $("#selEstadoPago").val(event.idestadopago);
                    $("#txtsintomas").val(event.sintomas);
                    $("#txtdescripcion").val(event.descripcion);
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
                } 
                
            });            
            
            $('#calendar').fullCalendar('addEventSource', citas); 


        //}    
        function blanquearCita(){
            limpiarMensaje()
            $("#selPaciente").val('').trigger('change');            
            $("#selPaciente").prop("disabled", false);
            $("#idcita").val('')
            $("#date").val('');
            $("#selEstadoCita").val(1)
            $("#dateend").val('');
            $("#txtmotivocita").val('');
            $("#txtsintomas").val('');
            $("#txtdescripcion").val('');
            $("#txtmedicinastomadas").val('')
            $('select[name=selMedico]').val('');
            $('.selectpicker').selectpicker('refresh') 
        }    
        
        
        $(".push_menu").click(function(){
             $(".wrapper").toggleClass("active");
        });

        


    });

           

</script>

</html>