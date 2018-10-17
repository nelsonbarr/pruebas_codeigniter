<?php 
class Especialidades extends CI_Controller{
    
    public function __construct(){
        parent::__construct(); 
        $this->load->model('Access_model');   
        $this->load->model('Especialidades_model');        
        $this->id_user = !empty($this->session->userdata('id_user')) ? $this->session->userdata('id_user') : 0;
        $this->user_name = !empty($this->session->userdata('name_user')) ? $this->session->userdata('name_user') : '';
    }


    public function index()
    {
        $user_login = $this->session->userdata('login') ? $this->session->userdata('login') : false;
        $especialidades=$this->Especialidades_model->getEspecialidades();
        //if (!empty($user_login)) {
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'contenido' => 'especialidadesList',  
                'especialidades' =>$especialidades,                                
                'vista'=>'especialidades',
                'tipocalendar'=>'',
            );
            $this->load->view("plantillas/plantilla", $data);
       // }    
    }

    public function saveEspecialidad(){
        $user_login = $this->session->userdata('login') ? $this->session->userdata('login') : false;

        $datos=array();
        $datos['id']=$this->input->post("id");
        $datos['descripcion']=$this->input->post("txtdescripcion");
                      
        $result=$this->Especialidades_model->saveEspecialidades($datos);
        if($result==-1){
            $this->session->set_flashdata('success', "Especialidad registrada");
        }
        else{
            $this->session->set_flashdata('error', "Error al guardar especialidad");
        }

        $especialidades=$this->Especialidades_model->getEspecialidades();
        $data = array(
            'user_login' => $user_login,
            'user_name' => $this->user_name,
            'contenido' => 'especialidadesList',
            'especialidades'=>$especialidades,
            'vista'=>'especialidades',
            'tipocalendar'=>'',            
        );
        $this->load->view("plantillas/plantilla", $data);


    }

    

}
?>