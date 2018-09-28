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
<script>

    


    $('#btn_edit').on('click', function() {
        $('#modal_company').modal('show');
        return false;
    });
    var citas='<?php echo $citas; ?>';
    if(citas)
    {
        var citas = JSON.parse('<?php echo $citas; ?>'.split('\t').join(''));
        var meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
    }else
    {
        citas=new Array();
    }

    $(function() {

      


        //BLOQUE DE INICIALIZACION DE CALENDARIO

        var initialLocaleCode = 'en';
        //$('#calendar').fullCalendar({});
            var tipocalendar='<?php print $tipocalendar;?>';
            console.log(tipocalendar);
       /* if(tipocalendar!=''){
            console.log(tipocalendar);*/
            if(tipocalendar=='agendaWeek'){
                $('#tipoagenda').text('Agenda Semanal');
            }
            else{
                $('#tipoagenda').text('Agenda Diaria');
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
                allDay: false,
                defaultTimedEventDuration:'00:15:00',
                dayClick: function(date, jsEvent, view) {//DETECCION DEL EVENTO SELECCIONAR DIA, MODIFICAR PARA LLAMAR A LA VENTANA REGISTRAR CITA
                    this.title = prompt('Event Title:');
                    this.start = date.format();
                    dateend=new Date(date.format());
                    dateend.setMinutes(dateend.getMinutes() + 30);
                    this.dateend = dateend;               
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
                    $('#calendar').fullCalendar('unselect');
                },
                
            });        
            $('#calendar').fullCalendar('addEventSource', citas); 


        //}    
        
        
        
        $(".push_menu").click(function(){
             $(".wrapper").toggleClass("active");
        });

    });

           

</script>

</html>