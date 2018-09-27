<?php 
class Pacientes extends CI_Controller{
    
    public function __construct(){
        parent::__construct(); 
        $this->load->model('access_model');   
        $this->load->model('pacientes_model');        
        $this->id_user = !empty($this->session->userdata('id_user')) ? $this->session->userdata('id_user') : 0;
        $this->user_name = !empty($this->session->userdata('name_user')) ? $this->session->userdata('name_user') : '';
    }


    public function index()
    {
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;
        $pacientes=$this->pacientes_model->getPacientes();
        if (!empty($user_login)) {
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                //'contenido' => 'pacientesList',  
                'pacientes' =>$pacientes
            );
            $this->load->view("front_end/pacientesList", $data);
        }    
    }


}
?>