<?php 
class Medicos extends CI_Controller{
    
    public function __construct(){
        parent::__construct(); 
        $this->load->model('access_model');   
        $this->load->model('medicos_model');        
        $this->id_user = !empty($this->session->userdata('id_user')) ? $this->session->userdata('id_user') : 0;
        $this->user_name = !empty($this->session->userdata('name_user')) ? $this->session->userdata('name_user') : '';
    }


    public function index()
    {
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;
        $medicos=$this->medicos_model->getMedicos();
        $tiposDocs=$this->access_model->getTiposDocumentos();        
        $estadosCiviles=$this->access_model->getEstadosCiviles();
		$especialidades=$this->access_model->getEspecialidades();
        //if (!empty($user_login)) {
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'tiposDocs'=>$tiposDocs,
                'estadosCiviles'=>$estadosCiviles,
				'especialidades'=>$especialidades,
                'contenido' => 'medicosList',  
                'medicos' =>$medicos,                                
                'vista'=>'medicos'
            );
            $this->load->view("plantillas/plantilla", $data);
       // }    
    }

    public function saveMedico(){
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;

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

        $this->medicos_model->saveMedicos($datos);

        $medicos=$this->medicos_model->getMedicos();
        $tiposDocs=$this->access_model->getTiposDocumentos();        
        $estadosCiviles=$this->access_model->getEstadosCiviles();
		$especialidades=$this->access_model->getEspecialidades();
        $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'tiposDocs'=>$tiposDocs,
                'estadosCiviles'=>$estadosCiviles,
				'especialidades'=>$especialidades,
                'contenido' => 'medicosList',  
                'medicos' =>$medicos,                                
                'vista'=>'medicos'
        );
        $this->load->view("plantillas/plantilla", $data);


    }

}
?>