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
                'pacientes'=>array(),                                 
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
        $datos['lugarnacimiento'] =$this->input->post("txtlugarnacimiento");
        $datos['ciudad'] =$this->input->post("txtciudad");
        $datos['acudiente'] =$this->input->post("txtacudiente");
        $datos['telfacudiente'] =$this->input->post("txttelfacudiente");
         //METODO ENCARGADO DE REALIZAR EL LA SUBIDA DE LOS ARCHIVOS EN FISICO Y DE EL REGISTRO DEL NOMBRE DEL ARCHIVO EN EL CAMPO files_inspection TABLA inspection_files
        
        if (empty($_FILES['avatar-1'])) {
            // Devolvemos un array asociativo con la clave error en formato JSON como respuesta	
            echo json_encode(['error'=>'No hay ficheros para realizar upload.']); 
            // Cancelamos el resto del script
            //return false; 
        }
        else{
           if($_FILES['avatar-1']['name']!=""){

                // DEFINICIÓN DE LAS VARIABLES DE TRABAJO (CONSTANTES, ARRAYS Y VARIABLES)
                // ************************************************************************

                // Definimos la constante con el directorio de destino de las descargas
                
                //define('DIR_DESCARGAS',__DIR__.DIRECTORY_SEPARATOR .'descargas');      

                $dirapp=substr($_SERVER["SCRIPT_NAME"],0,strripos($_SERVER["SCRIPT_NAME"],"/"));        

                $dir_subida = $_SERVER['DOCUMENT_ROOT'].$dirapp.'/assets/plugins/server/php/img_pacientes/';        
            
                // Obtenemos el array de ficheros enviados
                $ficheros = $_FILES['avatar-1'];
                // Establecemos el indicador de proceso correcto (simplemente no indicando nada)
                $estado_proceso = NULL;
                // Paths para almacenar
                $paths= array();
                // Obtenemos los nombres de los ficheros
                $nombres_ficheros = $ficheros['name'];
                $mi_archivo = 'avatar-1';
                $config['upload_path'] = "assets/images/";
                $config['file_name'] = $nombres_ficheros;
                $config['allowed_types'] = "*";
                $config['max_size'] = "50000";
                $config['max_width'] = "2000";
                $config['max_height'] = "2000";
                $config['overwrite']=true;

                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload($mi_archivo)) {
                    //*** ocurrio un error
                    $data['uploadError'] = $this->upload->display_errors();
                    echo $this->upload->display_errors();
                    return;
                }

                $data['uploadSuccess'] = $this->upload->data();
                $datos['photo'] =$data['uploadSuccess']['file_name'];
            }
        }    
        $result=$this->Pacientes_model->savePacientes($datos);
        if($result==-1){                       
            $this->session->set_flashdata('success', "Paciente registrado con exito");
            //$this->session->set_flashdata('success', "Paciente registrado con exito");
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
        $datos['lugarnacimiento'] =$this->input->post("txtlugarnacimiento");
        $datos['ciudad'] =$this->input->post("txtciudad");
        $datos['acudiente'] =$this->input->post("txtacudiente");
        $datos['telfacudiente'] =$this->input->post("txttelfacudiente");
        $start_date = $this->input->post("datecita");
        $start_date = new DateTime(str_replace("/","-",$start_date));
        $start_date =$start_date->format('Y-m-d H:i:s');             
        $mesactual=$start_date;       
        

         //METODO ENCARGADO DE REALIZAR EL LA SUBIDA DE LOS ARCHIVOS EN FISICO Y DE EL REGISTRO DEL NOMBRE DEL ARCHIVO EN EL CAMPO files_inspection TABLA inspection_files
        
        if (empty($_FILES['avatar-1'])) {
            // Devolvemos un array asociativo con la clave error en formato JSON como respuesta 
            echo json_encode(['error'=>'No hay ficheros para realizar upload.']); 
            // Cancelamos el resto del script
            //return false; 
        }
        else{
            if($_FILES['avatar-1']['name']!=""){
                // DEFINICIÓN DE LAS VARIABLES DE TRABAJO (CONSTANTES, ARRAYS Y VARIABLES)
                // ************************************************************************

                // Definimos la constante con el directorio de destino de las descargas
                
                //define('DIR_DESCARGAS',__DIR__.DIRECTORY_SEPARATOR .'descargas');      

                $dirapp=substr($_SERVER["SCRIPT_NAME"],0,strripos($_SERVER["SCRIPT_NAME"],"/"));        

                $dir_subida = $_SERVER['DOCUMENT_ROOT'].$dirapp.'/assets/plugins/server/php/img_pacientes/';        
            
                // Obtenemos el array de ficheros enviados
                $ficheros = $_FILES['avatar-1'];
                // Establecemos el indicador de proceso correcto (simplemente no indicando nada)
                $estado_proceso = NULL;
                // Paths para almacenar
                $paths= array();
                // Obtenemos los nombres de los ficheros
                $nombres_ficheros = $ficheros['name'];
                $mi_archivo = 'avatar-1';
                $config['upload_path'] = "assets/images/";
                $config['file_name'] = $nombres_ficheros;
                $config['allowed_types'] = "*";
                $config['max_size'] = "50000";
                $config['max_width'] = "2000";
                $config['max_height'] = "2000";
                $config['overwrite']=true;

                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload($mi_archivo)) {
                    //*** ocurrio un error
                    $data['uploadError'] = $this->upload->display_errors();
                    echo $this->upload->display_errors();
                    return;
                }

                $data['uploadSuccess'] = $this->upload->data();
                $datos['photo'] =$data['uploadSuccess']['file_name'];
        
            }
        }    
        $result=$this->Pacientes_model->savePacientes($datos);
        if($result==-1){            
           
            $this->session->set_flashdata('success', "Paciente registrado con exito");
        }
        else{
            $this->session->set_flashdata('error', "Error al guardar paciente");
        }

//
        //$pacientes=$this->Pacientes_model->getPacientes();
        $this->load->model("Citas_model");
        $citas=$this->Citas_model->getCitas(date('m')); 
        $replace_array=array();   
        if ($citas != -1) {
            $i=0;
            foreach ($citas as $row) {  
                if($row['idestadopago']==1){
                    $pago="Pendiente";    
                }
                else if($row['idestadopago']==2){
                    $pago="Pagado";    
                }
                else{
                    $pago="Transferencia";    
                }    
                //$citas[$i]['title'] = str_replace($replace_array, "", $row['title']." - ".$row['documento']."<br>".$row['fechanacimiento']."  ".$row["genero"]);
                $date = new DateTime($row['fechanacimiento']);
                $fechanacimiento =$date->format('d-m-Y');						
                if($this->session->userdata('perfil') ==1){                  
                    $citas[$i]['title'] = str_replace($replace_array, "", $row['documento']." | ".$row['title']."  | ".$pago." | ".$row['motivocita']." | ".$row['descripcion']." | ".$row["acudiente"]." | ".$row["telfacudiente"]);
                }
                else{
                    //$citas[$i]['title'] = str_replace($replace_array, "", $row['title']." - ".$row['documento']);
                    $citas[$i]['title'] = str_replace($replace_array, "", $row['title']);
                    //$citas[$i]['description'] = str_replace($replace_array, "","FEC.NAC.: ".$fechanacimiento." | GEN: ".$row["genero"]." | ACUDIENTE:".$row["acudiente"]." | TELF ACUDIENTE:".$row["telfacudiente"]);
                    $citas[$i]['description'] = str_replace($replace_array, "",$row['descripcion']);
                    if($row['telefonos']!=""){
                        $citas[$i]['description'].=" | Telf: ".$row['telefonos']; 
                    }
                    if($row['telfacudiente']!=""){
                        $citas[$i]['description'].=" | Telf Acudiente: ".$row['telfacudiente']; 
                    }
                } 

                //$citas[$i]['motivocita'] = str_replace($replace_array, "", $row['motivocita']);
                //$citas[$i]['url'] = base_url('home_eventos/eventos_detalle')."/".$row['idcita'];
                if($row['estadocita']=='No Confirmada'){
                    $citas[$i]['backgroundColor'] = "rgb(40, 40,60)";    
                } 
                elseif($row['estadocita']=='Cancelada'){
                    $citas[$i]['backgroundColor'] = "#DF0101";
                }                  
                elseif($row['estadocita']=='En camino'){
                    $citas[$i]['backgroundColor'] = "rgb(102, 255, 153)";
                    $citas[$i]['textColor']="#000000";
                } 
                elseif($row['estadocita']=='En Sala'){
                    $citas[$i]['backgroundColor'] = "#ffff00";
                    $citas[$i]['textColor']="#000000";
                } 
                elseif($row['estadocita']=='Visto'){
                    $citas[$i]['backgroundColor'] = "#0066ff";
                } 
                elseif($row['estadocita']=='Confirmado'){
                    $citas[$i]['backgroundColor'] = "green";
                }  
                elseif($row['estadocita']=='No Show'){
                    $citas[$i]['backgroundColor'] = "#da541f";
                }      
                $i++;
            }               
            $citas = json_encode($citas);
        }
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
            'mes'=>$mesactual,
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
            5 => 'fechanacimiento',
            6 =>'edad',
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
            $params['order'][0]['column']='2';
            $params['order'][0]['dir']='asc';
        }
    //var_dump($totalRecords);
        // getting total number records without any search
        $this->db->select("id AS '0',documento AS '1',nombres AS '2',apellidos AS '3',genero AS '4',fechanacimiento AS '5', TIMESTAMPDIFF(YEAR,pacientes.fechanacimiento,CURDATE()) AS '6',CONCAT('<button type=\"button\" id=\"btn_edit\" alt=\"Editar\" title=\"Editar\" class=\"btn btn-danger btn_edit\" data-toggle=modal data-id=\"',id,'\" data-target=#modalPacientes><span class=\"fa fa-edit pull-right\"></span></button>','<button type=\"button\" id=\"btn_history\" alt=\"Historia\" title=\"Historia\" class=\"btn btn-default\" data-toggle=\"modal\" data-id=\"',id,'\" data-target=\"#modalPacienteHistory\"><span class=\"fa fa-align-justify pull-right\"></span></button>') AS '7' ");
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
        echo json_encode($result);  

                // DB table to use


    }

    public function deletePaciente($id){
        $result=$this->Pacientes_model->deletePaciente($id);   
        echo json_encode(array('success'=>true,"mensaje"=>"Paciente eliminado"));
    }

}
?>