    </body>
    <!--   Core JS Files   -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/material.min.js" type="text/javascript"></script>
    
    <script src='<?php echo base_url() ?>assets/fullcalendar/moment.min.js'></script>
    <script src='<?php echo base_url() ?>assets/fullcalendar/fullcalendar.min.js'></script>
    

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap-notify.js"></script>

    <!-- Material Dashboard javascript methods -->
    <script src="<?php echo base_url() ?>assets/js/material-dashboard.js"></script>
<script>

    
    var total_citas = JSON.parse('<?php echo json_encode(0) ?>');
    // var total_group = JSON.parse('<?php //echo json_encode($state_activity) ?>');

    var citas = JSON.parse('<?php echo $citas; ?>'.split('\t').join(''));
    var meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];


    $(function() {

      


        //BLOQUE DE INICIALIZACION DE CALENDARIO

        var initialLocaleCode = 'en';
        //$('#calendar').fullCalendar({});
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',                
                right: 'month,agendaWeek,agendaDay,listMonth'//right: 'year,month,basicWeek,basicDay'
            },
            
            /*defaultView: 'agendaWeek',
            editable: true,
            firstDay: 1,
            locale : 'es',
            eventLimit: true, // allow "more" link when too many events*/
            locale: 'es',
            buttonIcons: false, // show the prev/next text
            weekNumbers: true,
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            dayClick: function(date, jsEvent, view) {//DETECCION DEL EVENTO SELECCIONAR DIA, MODIFICAR PARA LLAMAR A LA VENTANA REGISTRAR CITA
                alert('Clicked on: ' + date.format());
                alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
                alert('Current view: ' + view.name);
                // change the day's background color just for fun
                $(this).css('background-color', 'red');
            }
        });        
        $('#calendar').fullCalendar('addEventSource', citas); 


        $(".push_menu").click(function(){
             $(".wrapper").toggleClass("active");
        });

    });

           

</script>

</html>