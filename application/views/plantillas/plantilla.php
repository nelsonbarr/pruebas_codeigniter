<?php
    $this->load->view("plantillas/back_end/header");
    $this->load->view("plantillas/back_end/menu");
    $this->load->view("front_end/".$contenido);
    if($vista=="paciente"){
        $this->load->view("plantillas/back_end/footer_paciente");
    }
    else{
        $this->load->view("plantillas/back_end/footer");
    }
    
 ?>
