<?php 
class Pacientes extends CI_Controller{
    
    public function __construct(){
        parent::__construct(); 
        // load Session Library
        $this->load->library('session');         
        // load url helper
        $this->load->helper('url');
        $this->load->model('Access_model');   
        $this->load->model('Pacientes_model');        
        $this->id_user = !empty($this->session->userdata('id_user')[0]) ? $this->session->userdata('id_user')[0] : 0;
        $this->user_name = !empty($this->session->userdata('name_user')[0]) ? $this->session->userdata('name_user')[0] : '';
    }


    public function index()
    {
        $user_login = $this->session->userdata('login')[0] ? $this->session->userdata('login')[0] : false;
        $pacientes=$this->Pacientes_model->getPacientes();		
		$tiposDocs=$this->Access_model->getTiposDocumentos();        
        $estadosCiviles=$this->Access_model->getEstadosCiviles();
        //if (!empty($user_login)) {
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'tiposDocs'=>$tiposDocs,
                'estadosCiviles'=>$estadosCiviles,
                'tipocalendar'=>'',
                'contenido' => 'pacientesList',  
                'pacientes' =>$pacientes,                                
                'vista'=>'paciente'
            );
            $this->load->view("plantillas/plantilla", $data);
       // }    
    }

    public function savePaciente(){
        $user_login = $this->session->userdata('login')[0] ? $this->session->userdata('login')[0] : false;

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
        $date = new DateTime($datos['fechanacimiento']);
        $datos['fechanacimiento'] =$date->format('Y-m-d');
              
        $result=$this->Pacientes_model->savePacientes($datos);
        if($result==-1){
            $this->session->set_flashdata('success', "Paciente registrado con exito");
        }
        else{
            $this->session->set_flashdata('error', "Error al guardar paciente");
        }
        $pacientes=$this->Pacientes_model->getPacientes();        	
        $tiposDocs=$this->Access_model->getTiposDocumentos();        
        $estadosCiviles=$this->Access_model->getEstadosCiviles();
        $data = array(
            'user_login' => $user_login,
            'user_name' => $this->user_name,
            'contenido' => 'pacientesList',
            'tiposDocs'=>$tiposDocs,
            'estadosCiviles'=>$estadosCiviles,
            'tipocalendar'=>'',
            'pacientes'=>$pacientes,
            'vista'=>'paciente'            
        );
        $this->load->view("plantillas/plantilla", $data);


    }

    public function savePacienteCita(){
        $user_login = $this->session->userdata('login')[0] ? $this->session->userdata('login')[0] : false;

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
        $date = new DateTime($datos['fechanacimiento']);
        $datos['fechanacimiento'] =$date->format('Y-m-d');
              
        $result=$this->Pacientes_model->savePacientes($datos);
        if($result==-1){
            $this->session->set_flashdata('success', "Paciente registrado con exito");
        }
        else{
            $this->session->set_flashdata('error', "Error al guardar paciente");
        }
        //$pacientes=$this->Pacientes_model->getPacientes();
        $this->load->model("Citas_model");
        $citas=$this->Citas_model->getCitas(date('m'));       
        $estadoscitas=$this->Access_model->getEstadosCita(); 	
        $tiposDocs=$this->Access_model->getTiposDocumentos();     
        $estadospagos=$this->Access_model->getEstadosPago();   
        $estadosCiviles=$this->Access_model->getEstadosCiviles();
        $medicosEspecialidades=$this->Access_model->getMedicosEspecialidades();
        $data = array(
            'user_login' => $user_login,
            'user_name' => $this->user_name,
            'contenido' => 'dashboard_home',
            'estadoscitas'=>$estadoscitas,
            'estadospagos'=>$estadospagos, 
            'tiposDocs'=>$tiposDocs,
            'estadosCiviles'=>$estadosCiviles,
            'medicosEspecialidades'=>$medicosEspecialidades,               
            'citas'=>$citas,
            'tipocalendar'=>'agendaWeek',            
            'vista'=>'calendario'          
        );
        $this->load->view("plantillas/plantilla", $data);


    }

    public function carga_Historico($id){
        $user_login = $this->session->userdata('login')[0] ? $this->session->userdata('login')[0] : false;        
        $result=$this->Pacientes_model->getHistorico($id);       
        //se define un arreglo con la informacion de los clientes
        $consulta=array('data'=>$result);

        if(!$consulta){
            die('Error');
        }else{
            //se codifica la data en formato json
            echo json_encode($consulta);
        }


    }
    public function carga_Paciente($id){
        $user_login = $this->session->userdata('login')[0] ? $this->session->userdata('login')[0] : false;        
        $result=$this->Pacientes_model->getPacientePorId($id);       
        //se define un arreglo con la informacion de los clientes
        $consulta=array('data'=>$result);

        if(!$consulta){
            die('Error');
        }else{
            //se codifica la data en formato json
            echo json_encode($consulta);
        }


    }

    public function buscarPacienteList(){

        //$q = $_GET['q'];
       /* $user_login = $this->session->userdata('login')[0] ? $this->session->userdata('login')[0] : false;   

             
        $result=$this->Pacientes_model->getPacientesList(array('documento'=>$q));       
        //se define un arreglo con la informacion de los clientes
        
        //$consulta=array('data'=>$result);
       
        /*if(!$result){
            die('Error');
        }else{*/
            //se codifica la data en formato json    
            
           // echo json_encode($result);
        //}

                // DB table to use
        
// initilize all variable
    $params = $columns = $totalRecords = $data = array();

    $params = $_POST;
    //var_export($params);
    //define index of column
    $columns = array( 
        0 =>'id',
        1 =>'documento', 
        2 => 'nombres',
        3 => 'apellidos',
        4 => 'genero',
        5 => 'fechanacimiento'
    );

    $where = $sqlTot = $sqlRec = "";

    // check search value exist
    if( !empty($params['search']['value']) ) {   
        
        $where .=" ( id LIKE '%".$params['search']['value']."%' ";    
        $where .=" OR documento LIKE '%".$params['search']['value']."%' ";
        $where .=" OR nombres LIKE '%".$params['search']['value']."%' ";
        $where .=" OR apellidos LIKE '%".$params['search']['value']."%'  )";
    }

    $this->db->select('*');
    $this->db->from('pacientes');
    if($where!="")
        $this->db->where($where);
    $query = $this->db->get();
    $query = $query->result_array();
    $totalRecords=count($query);
    if(!array_key_exists('order',$params)){
        $params['order'][0]['column']='1';
        $params['order'][0]['dir']='asc';
    }
//var_dump($totalRecords);
    // getting total number records without any search
    $this->db->select("id AS '0',documento AS '1',nombres AS '2',apellidos AS '3',genero AS '4',fechanacimiento AS '5',CONCAT('<button type=\"button\" id=\"btn_edit\" alt=\"Editar\" title=\"Editar\" class=\"btn btn-danger btn_edit\" data-toggle=modal data-id=\"',id,'\" data-target=#modalPacientes><span class=\"fa fa-edit pull-right\"></span></button>','<button type=\"button\" id=\"btn_history\" alt=\"Historia\" title=\"Historia\" class=\"btn btn-default\" data-toggle=\"modal\" data-id=\"',id,'\" data-target=\"#modalPacienteHistory\"><span class=\"fa fa-align-justify pull-right\"></span></button>') AS '6' ");
    $this->db->from('pacientes');
    if($where!="")
        $this->db->where($where);
    
    $this->db->order_by($columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']);
    $this->db->limit($params['length'],$params['start']);
    
    //concatenate search sql if value exist
    if(isset($where) && $where != '') {

        $sqlTot .= $where;
        $sqlRec .= $where;
    }
    $query = $this->db->get();
    $query = $query->result_array();
    //var_dump($query);
    foreach( $query AS $row) {         
        $data[] = $row;
    }   

    $json_data = array(
            "draw"            => intval( $params['draw'] ),   
            "recordsTotal"    => intval( $totalRecords ),  
            "recordsFiltered" => intval($totalRecords),
            "data"            => $data   // total data array
            );

    echo json_encode($json_data);  // send data as json format

    }

    public function buscarPaciente(){

        $q = $_GET['q'];
        $user_login = $this->session->userdata('login')[0] ? $this->session->userdata('login')[0] : false;   

             
        $result=$this->Pacientes_model->getPacientesFiltrado($q);       
        //se define un arreglo con la informacion de los clientes
        
        //$consulta=array('data'=>$result);

        /*if(!$result){
            die('Error');
        }else{*/
            //se codifica la data en formato json            
            echo json_encode($result);
        //}

                // DB table to use


    }

}
?>