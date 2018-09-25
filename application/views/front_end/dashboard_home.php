    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/vendor/fullcalendar/dist/fullcalendar.print.css" media='print'/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/vendor/fullcalendar/dist/fullcalendar.min.css" />


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
            </div>
        </div>

        <div class="row">           
            <?php if ($activities != -1): ?>
                <div class="col-lg-6">
                    <div class="hpanel hred">
                        <div class="panel-heading">
                            <div class="panel-tools">
                                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                            </div>
                            <span class="text-danger">Agenda del dia</span>
                        </div>
                        <div class="panel-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>            
        </div>

    </div>


<!-- Vendor scripts -->
<script src="<?php echo base_url(); ?>assets/plugins/vendor/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/vendor/fullcalendar/dist/fullcalendar.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/vendor/highcharts/highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/theme_highcharts.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/vendor/highcharts/modules/exporting.js"></script>


<script>

    var total_count = JSON.parse('<?php echo json_encode($total_pendiente) ?>');
    var total_activities = JSON.parse('<?php echo json_encode($total_activities) ?>');
    // var total_group = JSON.parse('<?php //echo json_encode($state_activity) ?>');

    var activities = JSON.parse('<?php echo $activities; ?>'.split('\t').join(''));
    var meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];


    $(function() {


        // // Radialize the colors
        Highcharts.setOptions({
            colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            })
        });

        $(".state_activity").fadeOut();

        $('#calendar').fullCalendar({});
        $('#calendar').fullCalendar('addEventSource', activities);


        if (total_activities != -1) {
            var max = 0;
            for (var i = 0; i < total_activities.length; i++) {
                if (max < total_activities[i]) {
                    max = total_activities[i];
                    mes = meses[i];
                }
            }
            $("#mes_patrocinio").text(mes);
        }

        for (var i = 0; i < total_count.length; i++) {
            total_count[i].y = parseInt(total_count[i].y);
            if (i == 1) {
                total_count[i].sliced = true;
                total_count[i].selected = true;
            }
        }


        if (total_activities != -1) {
            Highcharts.chart('sharpLineOptions', {
                chart:{
                    backgroundColor:null
                },
                colors: [ "#E1BA1E"],
                xAxis: {
                    categories: meses
                },
                legend: {
                    enabled: false,
                    // floating: true,
                    // align: 'left',
                    // verticalAlign: 'top',
                    // y: 35,
                    // labelFormat: '<span>{name}</span>: USD <span>{}</span>: ASD',
                    borderWidth: 0
                },

                series: [{
                    name: 'Cantidad',
                    data: total_activities
                }],
                credits: {
                    enabled: false // Geen verwijzing naar highchart
                },
                title: {
                    text: '',
                    style: {
                        color: 'white',
                        fontWeight: 'bold'
                    }
                },
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
            });
        }

        if (total_count != -1) {

        var chart = new Highcharts.Chart({
            tooltip: {
                enabled: true
            },
            chart: {
                renderTo: 'doughnutChart', //Dat is waar hij heen moet
                type:'pie', // Type die we hebben gekozen
                borderWidth: 0,
                backgroundColor:null
            },
            legend: {
                enabled: true
            },
            // xAxis: {
            //     // categories: paramState, // De namen
            //     color: 'black',
            // },
            credits: {
                enabled: false // Geen verwijzing naar highchart
            },
            
            // plotOptions: {
            //     series: {
            //         dataLabels: {
            //             enabled: true,
            //             // formatter: function() {
            //             //     var cat = this.series.chart.xAxis[0].categories,
            //             //         x = this.point.x;

            //             //     return 'name: ' + cat[x] + '<br>' +  Math.round(this.percentage*100)/100 + ' %';
            //             // },
            //             distance: -60, // Hoe ver naar binnen de teksten staan
            //             color:'black' // De kleur van de percentages
            //         },
            //         animation: {
            //             duration: 2000
            //         }
            //     }
            // },

            plotOptions: {
                series: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        formatter: function() {
                            // var cat = this.series.chart.xAxis[0].categories,
                            //     x = this.point.x;
                            return this.point.name + '<br>' + this.point.y;
                        },
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        },
                        connectorColor: 'silver',
                    }
                }
            },
            
            title: {
                text: '',
                style: {
                    color: 'white',
                    fontWeight: 'bold'
                }
            },
            series: [{
                showInLegend: true,
                data: total_count,
            }]
        });


        }

        //Enviar datos al metodo de registro
        var callData = JSON.stringify({
            "serviceName": "home_evento",
            "methodName": "get_activities_state",
            "parameters": []
        });

        $.post(BASE_SERVICE, callData, function(data) {
            var total_group = data;
            console.log(data);
            if (data != -1) {
                $("#presupuesto").css("display", "block");
                $(".state_activity").fadeIn();
                $("#no_estadisticas").css("display", "none");

                Highcharts.chart('lineOptions', {
                    chart:{
                        backgroundColor:null
                    },
                    colors: ["#CF1313","#E1BA1E"],
                    xAxis: {
                        categories: ["Express", "Especial", "Gran formato", "Sin montaje"]
                    },
                    legend: {
                        enabled: true,
                        // floating: true,
                        // align: 'left',
                        // verticalAlign: 'top',
                        // y: 35,
                        // labelFormat: '<span>{name}</span>: USD <span>{}</span>: ASD',
                        borderWidth: 0
                    },

                    series: [{
                        data: total_group[0]
                    }],
                    credits: {
                        enabled: false // Geen verwijzing naar highchart
                    },
                    title: {
                        text: '',
                        style: {
                            color: 'white',
                            fontWeight: 'bold'
                        }
                    },
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                });
            }
        });


    });

</script>
