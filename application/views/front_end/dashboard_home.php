    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.print.css" media='print'/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.min.css" />


    <style>
      .posicion{
        position: absolute;
        display: block;
        right: 50px;
        z-index: 60;
        max-width: 200px;
        height: auto;

      }
    </style>


    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12 text-center m-t-md">
                <h2>
                    Citas del Dia
                </h2>
                Locales:
              <select id='locale-selector'></select>
            </div>
        </div>
        <?php var_dump($this->session->userdata('profile'));?>
        <?php if ( $citas == -1): ?>
                <div class="col-lg-6 col-lg-offset-3" id="no_estadisticas">
                    <h2 class="text-danger">NO HAY CITAS PARA MOSTRAR</h2>
                </div>
        <?php endif; ?>
        <div class="row">           
            <?php if ($citas != -1): ?>
                <div class="col-lg-6">
                    <div class="hpanel hred">
                        <div class="panel-heading">
                            <div class="panel-tools">
                                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                            </div>
                            <span class="text-danger">Agenda del dia</span>
                        </div>
                        <div class="panel-body">
                            <div id="calendar" class="calendar"></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>            
        </div>

    </div>


<!-- Vendor scripts -->
<script src="<?php echo base_url(); ?>assets/plugins/vendor/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar.js"></script>
<script src="<?php echo base_url(); ?>assets/fullcalendar/locale-all.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/vendor/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/theme_highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/vendor/highcharts/modules/exporting.js"></script>


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
        

    });

            

</script>
