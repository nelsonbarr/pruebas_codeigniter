<?php 
class Usuarios extends CI_Controller{
    
    public function __construct(){
        parent::__construct(); 
        $this->load->model('access_model');   
        $this->load->model('usuarios_model');        
        $this->id_user = !empty($this->session->userdata('id_user')) ? $this->session->userdata('id_user') : 0;
        $this->user_name = !empty($this->session->userdata('name_user')) ? $this->session->userdata('name_user') : '';
    }


    public function index()
    {
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;
        $usuarios=$this->usuarios_model->getUsuarios();
        //if (!empty($user_login)) {
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'contenido' => 'usuariosList',  
                'usuarios' =>$usuarios,                                
                'vista'=>'usuarios'
            );
            $this->load->view("plantillas/plantilla", $data);
       // }    
    }

    public function saveUsuario(){
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;

        $datos=array();
        $datos['id']=$this->input->post("id");
        $datos['nombreusuario']=$this->input->post("txtnombreusuario");
        $datos['nombres']=$this->input->post("txtnombres");
        $datos['apellidos']=$this->input->post("txtapellidos");
        $datos['email']=$this->input->post("txtemail");
        $datos['telefono']=$this->input->post("txttelefonos");
        $datos['password'] =$this->input->post("txtpassword");
        $datos['status']=1;
        $datos['perfil']=$this->input->post("selPerfil");;
              
        $this->usuarios_model->saveUsuarios($datos);

        $usuarios=$this->usuarios_model->getUsuarios();
        $data = array(
            'user_login' => $user_login,
            'user_name' => $this->user_name,
            'contenido' => 'usuariosList',
            'usuarios'=>$usuarios,
            'vista'=>'usuarios'            
        );
        $this->load->view("plantillas/plantilla", $data);


    }

    

}
?>