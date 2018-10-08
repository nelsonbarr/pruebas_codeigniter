<?php
    $this->load->view("plantillas/back_end/header");
    $this->load->view("plantillas/back_end/menu");
    $this->load->view("front_end/".$contenido);
    switch($vista){
        case "paciente":
            $this->load->view("plantillas/back_end/footer_paciente");
            break;
        case "usuarios":
            $this->load->view("plantillas/back_end/footer_usuario");
            break;
        case "especialidades":
            $this->load->view("plantillas/back_end/footer_especialidad");
            break;
        case "medicos":
            $this->load->view("plantillas/back_end/footer_medico");
            break;
    }
    
	
    if($tipocalendar=='agendaDay'){
        $this->load->view("plantillas/back_end/footer_diario");
    }
    elseif($tipocalendar=='agendaWeek'){
        $this->load->view("plantillas/back_end/footer");
    }
?>