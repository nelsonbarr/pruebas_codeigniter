<?php 
class Medicos extends CI_Controller{
    
    public function __construct(){
        parent::__construct(); 
        $this->load->model('Access_model');   
        $this->load->model('Medicos_model');        
        $this->id_user = !empty($this->session->userdata('id_user')) ? $this->session->userdata('id_user') : 0;
        $this->user_name = !empty($this->session->userdata('name_user')) ? $this->session->userdata('name_user') : '';
    }


    public function index()
    {
        $user_login = $this->session->userdata('login') ? $this->session->userdata('login') : false;
        $medicos=$this->Medicos_model->getMedicos();		
        $tiposDocs=$this->Access_model->getTiposDocumentos();        
        $estadosCiviles=$this->Access_model->getEstadosCiviles();
		$especialidades=$this->Access_model->getEspecialidades();
        //if (!empty($user_login)) {
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'tiposDocs'=>$tiposDocs,
                'estadosCiviles'=>$estadosCiviles,
				'especialidades'=>$especialidades,
                'contenido' => 'medicosList',  
                'medicos' =>$medicos,                                
                'vista'=>'medicos',
                'tipocalendar'=>'',
            );
            $this->load->view("plantillas/plantilla", $data);
       // }    
    }

    public function saveMedico(){
        $user_login = $this->session->userdata('login') ? $this->session->userdata('login') : false;

        $datos=array();
        $datos['id']=$this->input->post("idmedico");
        $datos['idtipodocumento']=$this->input->post("idtipodoc");
        $datos['documento']=$this->input->post("txtiddocumento");
        $datos['nombres']=$this->input->post("txtnombres");
        $datos['apellidos']=$this->input->post("txtapellidos");
        $datos['genero']=$this->input->post("genero");
        $datos['fechanacimiento']=$this->input->post("txtfechanacimiento");
        $datos['email']=$this->input->post("txtemail");
        $datos['telefono']=$this->input->post("txttelefonos");
        $datos['direccion'] =$this->input->post("txtdireccion");
		$datos['idespecialidad'] =$this->input->post("idespecialidad");
		$datos['activo'] =1;
        $date = new DateTime($datos['fechanacimiento']);
        $datos['fechanacimiento'] =$date->format('Y-m-d');		

        $result=$this->Medicos_model->saveMedicos($datos);
        if($result==-1){
            $this->session->set_flashdata('success', "Medico registrado con exito");
        }
        else{
            $this->session->set_flashdata('error', "Error al guardar Medico");
        }
		
        $medicos=$this->Medicos_model->getMedicos();        		
        $tiposDocs=$this->Access_model->getTiposDocumentos();        
        $estadosCiviles=$this->Access_model->getEstadosCiviles();
		$especialidades=$this->Access_model->getEspecialidades();
        $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'tiposDocs'=>$tiposDocs,
                'estadosCiviles'=>$estadosCiviles,
				'especialidades'=>$especialidades,
                'contenido' => 'medicosList',  
                'medicos' =>$medicos,                                
                'vista'=>'medicos',
                'tipocalendar'=>'',
        );
        $this->load->view("plantillas/plantilla", $data);
    }

}
?>