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
<script>
var arrPacientes=new Array();
    



    /*$('#btn_procesar').on('click', function() {
        //PROCESAR PARA LA SELECCION DE PACIENTES EN LA CITA 
        paciente=$("#selPaciente option:selected").text(); 
        var myCalendar = $('#calendar'); 
        datestart = $("#date").val();
        dateend=new Date(datestart);
        dateend.setMinutes(dateend.getMinutes() + 15);
        var myEvent = { title:paciente, allDay: false, start: datestart, end: dateend }; 
        myCalendar.fullCalendar('getResources');
        myCalendar.fullCalendar( 'renderEvent', myEvent );        
        myCalendar.fullCalendar('unselect'); 
        $('#modalPacientesList').modal('hide') 
        $.ajax({
               url: 'index.php',
               data: 'action=add&title='+title+'&start='+startTime+'&end='+endTime,
               type: "POST",
               success: function(json) {
                   $("#calendar").fullCalendar('renderEvent',
                   {
                       id: json.id,
                       title: title,
                       start: startTime,
                       end: endTime,
                       allDay: false
                   },
                   true);
               }
           });    
    });*/

    var citas='<?php echo is_array($citas); ?>';
    if(citas!=-1)
    {
        var citas = JSON.parse('<?php echo $citas ?>'.split('\t').join(''));        
        var meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
    }else
    {
        citas=new Array();
        // $('.datepicker').datepicker({
        //     format: 'mm/dd/yyyy',
        //     startDate: '-3d'
        // });        
        arrPacientes=<?php print json_encode($pacientes);?>;
         
        
    }
  
    
   
    $(function() {

      $('#fecha_comite_patrocinio').datepicker({
            format: 'yyyy-mm-dd',
            //startDate: '-Infinity',
            todayHighlight: true,
            autoclose: true
        });


        //BLOQUE DE INICIALIZACION DE CALENDARIO

        var initialLocaleCode = 'en';
        //$('#calendar').fullCalendar({});
            var tipocalendar='<?php print $tipocalendar;?>';
          
       /* if(tipocalendar!=''){
            console.log(tipocalendar);*/
            if(tipocalendar=='agendaWeek'){
                $('#tipoagenda').text('Agenda Semanal');
            }
            else if(tipocalendar=='agendaDay'){
                $('#tipoagenda').text('Agenda Diaria');
            }
            else{

            }

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',                
                    right: 'month,agendaWeek,agendaDay,listMonth'//right: 'year,month,basicWeek,basicDay'
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
                hiddenDays: [ 6,0 ], // hide Tuesdays and Thursdays
                defaultView: '<?php print $tipocalendar;?>',
                editable: true,
                firstDay: 1,
                locale : 'es',
                eventLimit: true, // allow "more" link when too many events*/               
                buttonIcons: false, // show the prev/next text
                weekNumbers: true,
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                allDaySlot: false,
                defaultTimedEventDuration:'00:15:00',
                dayClick: function(date, jsEvent, view) {//DETECCION DEL EVENTO SELECCIONAR DIA, MODIFICAR PARA LLAMAR A LA VENTANA REGISTRAR CITA
                    /*this.title = prompt('Event Title:');*/
                    blanquearCita();
                    this.start = date.format('Y/M/D hh:mm');
                    dateend=new Date(date.format('Y/M/D hh:mm'));
                    dateend.setMinutes(dateend.getMinutes() + 15);
                    $("#date").val(this.start);
                    $("#dateend").val(dateend.getFullYear()+"-"+(dateend.getMonth() + 1) + "-" + dateend.getDate() + "-" +dateend.getHours() + ":" + dateend.getMinutes() + ":" + dateend.getSeconds() +
":" + dateend.getMilliseconds() );
                    $('#modalPacientesList').modal('show')
                    /*this.dateend = dateend;               
                    this.eventData;
                    if (this.title) {
                        this.eventData = {
                            title: this.title,
                            start: this.start,
                            forceEventDuration:true,                       
                            resourceId:['ResourceID1'] // Example  of resource ID
                        };
                        $('#calendar').fullCalendar('getResources')// This loads the resources your events are associated with(you have toload your resources as well )
                        $('#calendar').fullCalendar('renderEvent', this.eventData, true); // stick? = true
                    }
                    $('#calendar').fullCalendar('unselect');*/
                },
                eventClick: function(event, jsEvent, view) {//DETECCION DEL EVENTO SELECCIONAR DIA, MODIFICAR PARA LLAMAR A LA VENTANA REGISTRAR CITA
                    blanquearCita();                                        
                    $('select[name=selPaciente]').val(event.idpaciente);
                    $('.selectpicker').selectpicker('refresh')  
                    $("#idcita").val(event.idcita)                  
                    $("#date").val(event.start.format('Y/M/D hh:mm'));
                    $("#dateend").val(event.end.format('Y/M/D hh:mm'));
                    $("#txtmotivocita").val(event.motivocita);
                    $("#txtsintomas").val(event.sintomas);
                    $("#txtdescripcion").val(event.descripcion);
                    $("#txtmedicinastomadas").val(event.medicinastomadas);
                    $('#modalPacientesList').modal('show')
                },
                eventDrop: function(event, delta){ // event drag and drop
                    start=event.start.format();                                
                    end=event.end.format();
                    console.log(event)
                    console.log(start+"     "+end)
                    $.ajax({
                        url:'<?php print base_url();?>home/saveCita/',                       
                        data: 'date='+start+'&dateend='+end+'&idcita='+event.idcita+"&action=NO",
                        type: "POST",
                        success: function(json) {
                        //alert(json);
                        }
                    });
                },
                eventResize: function(event) {  // resize to increase or decrease time of event
                    start=event.start.format(); 
                    end=event.end.format();
                    $.ajax({
                        url:'<?php print base_url();?>home/saveCita/',  
                        data: 'action=NO&date='+start+'&dateend='+end+'&idcita='+event.idcita,
                        type: "POST",
                        success: function(json) {
                            //alert(json);
                        }
                    });
                }
                
            });        
            $('#calendar').fullCalendar('addEventSource', citas); 


        //}    
        function blanquearCita(){
            $('select[name=selPaciente]').val('');
            $('.selectpicker').selectpicker('refresh') 
            $("#date").val('');
            $("#dateend").val('');
            $("#txtmotivocita").val('');
            $("#txtsintomas").val('');
            $("#txtdescripcion").val('');
            $("#txtmedicinastomadas").val('')
           
        }    
        
        
        $(".push_menu").click(function(){
             $(".wrapper").toggleClass("active");
        });

    });

           

</script>

</html>