<?php
    $this->load->view("plantillas/back_end/header");
    $this->load->view("plantillas/back_end/menu");
    $this->load->view("front_end/".$contenido);
    if($vista=="paciente"){
        $this->load->view("plantillas/back_end/footer_paciente");
    }
    elseif($vista=="usuarios"){
        $this->load->view("plantillas/back_end/footer_usuario");
    }
    elseif($vista=="medicos"){
        $this->load->view("plantillas/back_end/footer_medico");
    }
    else{
        $this->load->view("plantillas/back_end/footer");
    }
    
 ?>
