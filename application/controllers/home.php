<?php

class Home extends CI_Controller {

   

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login') == false) {
            redirect('access/logout');
        }

    }

    public function index() {
        

            $datos = array(                
                'contenido' => "access",                
            );
            $this->load->view("plantillas/plantilla", $datos);
       

    }
    

}
