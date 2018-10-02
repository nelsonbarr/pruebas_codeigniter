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
        $tiposDocs=$this->access_model->getTiposDocumentos();        
        $estadosCiviles=$this->access_model->getEstadosCiviles();
        //if (!empty($user_login)) {
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'tiposDocs'=>$tiposDocs,
                'estadosCiviles'=>$estadosCiviles,
                'contenido' => 'pacientesList',  
                'pacientes' =>$pacientes,                                
                'vista'=>'paciente'
            );
            $this->load->view("plantillas/plantilla", $data);
       // }    
    }

    public function savePaciente(){
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;

        $datos=array();
        $datos['id']=$this->input->post("idpaciente");
        $datos['idtipodocumento']=$this->input->post("idtipodoc");
        $datos['documento']=$this->input->post("txtiddocumento");
        $datos['nombres']=$this->input->post("txtnombres");
        $datos['apellidos']=$this->input->post("txtapellidos");
        $datos['genero']=$this->input->post("genero");
        $datos['fechanacimiento']=$this->input->post("txtfechanacimiento");
        $datos['email']=$this->input->post("txtemail");
        $datos['telefono']=$this->input->post("txttelefonos");
        $datos['direccion'] =$this->input->post("txtdireccion");
        $datos['idestadocivil']=$this->input->post("estadocivil");
        $datos['alergias']=$this->input->post("txtalergias");
        $datos['enfermedadesprevias']=$this->input->post("txtenfermedades");
        $datos['medicamentos']=$this->input->post("txtmedicinas");
        $datos['genero']=$this->input->post("genero");        
        $this->pacientes_model->savePacientes($datos);

        $pacientes=$this->pacientes_model->getPacientes();
        $tiposDocs=$this->access_model->getTiposDocumentos();        
        $estadosCiviles=$this->access_model->getEstadosCiviles();
        $data = array(
            'user_login' => $user_login,
            'user_name' => $this->user_name,
            'contenido' => 'pacientesList',
            'tiposDocs'=>$tiposDocs,
            'estadosCiviles'=>$estadosCiviles,
            'tipocalendar'=>'agendaWeek',
            'pacientes'=>$pacientes,
            'vista'=>'paciente'            
        );
        $this->load->view("plantillas/plantilla", $data);


    }

    public function carga_Historico($id){
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;        
        $result=$this->pacientes_model->getHistorico($id);       
        //se define un arreglo con la informacion de los clientes
        $consulta=array('data'=>$result);

        if(!$consulta){
            die('Error');
        }else{
            //se codifica la data en formato json
            echo json_encode($consulta);
        }


    }

}
?>