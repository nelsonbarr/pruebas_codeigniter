<?php 
class Especialidades extends CI_Controller{
    
    public function __construct(){
        parent::__construct(); 
        $this->load->model('access_model');   
        $this->load->model('especialidades_model');        
        $this->id_user = !empty($this->session->userdata('id_user')) ? $this->session->userdata('id_user') : 0;
        $this->user_name = !empty($this->session->userdata('name_user')) ? $this->session->userdata('name_user') : '';
    }


    public function index()
    {
        $user_login = $this->session->userdata('login') ? $this->session->userdata('login') : false;
        $especialidades=$this->especialidades_model->getEspecialidades();
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
                      
        $this->especialidades_model->saveEspecialidades($datos);

        $especialidades=$this->especialidades_model->getEspecialidades();
        if($especialidades!=-1){
            $this->session->set_flashdata('success', "Especialidad registrada");
        }
        else{
            $this->session->set_flashdata('error', "Error al guardar especialidad");
        }
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