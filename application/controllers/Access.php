<?php

class Access extends CI_Controller {
    private $id_user;
    private $user_name;
    
    public function __construct(){
        parent::__construct(); 
        // load Session Library
        $this->load->library('session');         
        // load url helper
        $this->load->helper('url');
        $this->load->model('Access_model');   
        $this->load->model('Citas_model');     
        $this->id_user = !empty($this->session->userdata('id_user')[0]) ? $this->session->userdata('id_user')[0] : 0;
        $this->user_name = !empty($this->session->userdata('name_user')[0]) ? $this->session->userdata('name_user')[0] : '';        
    }

    public function index()
    {
        $user_login = $this->session->userdata('login')[0] ? $this->session->userdata('login')[0] : false;
        if (!empty($user_login)) {
            $citas=$this->Citas_model->getCitas(date('m')); 
            $estadoscitas=$this->Access_model->getEstadosCita();  
            $estadospagos=$this->Access_model->getEstadosPago();
            $tiposDocs=$this->Access_model->getTiposDocumentos();        
            $estadosCiviles=$this->Access_model->getEstadosCiviles();
            $medicosEspecialidades=$this->Access_model->getMedicosEspecialidades();
            $replace_array = array("'", '"');            
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
                        //$citas[$i]['motivocita'] = str_replace($replace_array, "", $row['motivocita']);
                    //   $citas[$i]['title'] = str_replace($replace_array, "", $row['title']." - ".$row['documento']."<br>".$row['fechanacimiento']."  ".$row["genero"]);
                    if($this->session->userdata('perfil') ==1){                  
                        $citas[$i]['title'] = str_replace($replace_array, "", $row['documento']." | ".$row['title']."  | ".$pago." | ".$row['motivocita']." | ".$row['descripcion']);
                    }
                    else{
                        //$citas[$i]['title'] = str_replace($replace_array, "", $row['title']." - ".$row['documento']);
                        $citas[$i]['title'] = str_replace($replace_array, "", $row['title']." | ID: ".$row['documento']."  |  PAGO: ".$pago );
                        $citas[$i]['description'] = str_replace($replace_array, "","FEC.NAC.: ".$row['fechanacimiento']." | GEN: ".$row["genero"]);
                    }   
                    /*$citas[$i]['title'] = str_replace($replace_array, "", $row['title']."  ID: ".$row['documento']." NAC.:");
                     $citas[$i]['description'] = str_replace($replace_array, "",$row['fechanacimiento']."  ".$row["genero"]);*/

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
                    $i++;
                }               
                $citas = json_encode($citas);
            }
            $this->load->model('Pacientes_model');
            //$pacientes=$this->Pacientes_model->getPacientes();
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'contenido' => 'dashboard_home',
                'tipocalendar'=>'agendaWeek', 
                'estadoscitas'=>$estadoscitas,
                'estadospagos'=>$estadospagos,  
                'tiposDocs'=>$tiposDocs,
                'estadosCiviles'=>$estadosCiviles, 
                'medicosEspecialidades'=>$medicosEspecialidades,                             
                'citas'=>$citas,
                'pacientes'=>array(), 
                'vista'=>'calendario'
            );
            $this->load->view("plantillas/plantilla", $data);
        }else {
            $data = array(
                'user_login' => $user_login,
            );
            $this->load->view("login-view", $data);
        }
    }

    public function login_user(){
        $user_login = $this->session->userdata('login')[0] ? $this->session->userdata('login')[0] : false;
        if ($user_login) {
            redirect('access', 'refresh');
        }

        $usuario = $this->input->post('txtusr');
        $password = $this->input->post('txtpwd');
        $valid_user = $this->Access_model->login($usuario,md5($password));

        if ($valid_user != -1 && !empty($valid_user)) {

            $datos_cookie['login'] = 'true';
            $datos_cookie['id_user'] = intval($valid_user['id']);
            $datos_cookie['name_user'] = $valid_user['nombres']." ".$valid_user['apellidos'];           
            $datos_cookie['email_user'] = $valid_user['email'];
            $datos_cookie['profile']=$valid_user['perfil'];
            
            $this->session->set_userdata($datos_cookie);
           
            $estadoscitas=$this->Access_model->getEstadosCita(); 
            $estadospagos=$this->Access_model->getEstadosPago();
            $tiposDocs=$this->Access_model->getTiposDocumentos();        
            $estadosCiviles=$this->Access_model->getEstadosCiviles();
            $medicosEspecialidades=$this->Access_model->getMedicosEspecialidades();
            if($valid_user['perfil']==1){
                $tipocalendar="agendaDay";
                $contenido = 'dashboard_home';
                $citas=$this->Citas_model->getCitas(date('m'));
                //$citas=$this->Citas_model->getCitasDia(date('Y/m/d'));
                
            }
            else{
                $tipocalendar="agendaWeek";
                $contenido = 'dashboard_home';
                $citas=$this->Citas_model->getCitas(date('m'));
               
            }   
                $replace_array = array("'", '"');
                //var_dump($citas);
                //print count($citas);
                //die();
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
                        if($valid_user['perfil']==1){                  
                            $citas[$i]['title'] = str_replace($replace_array, "", $row['documento']." | ".$row['title']."  | ".$pago." | ".$row['motivocita']." | ".$row['descripcion']);
                        }
                        else{
                            $citas[$i]['title'] = str_replace($replace_array, "", $row['title']." | ID: ".$row['documento']."  |  PAGO: ".$pago );
                            $citas[$i]['description'] = str_replace($replace_array, "","FEC.NAC.: ".$row['fechanacimiento']." | GEN: ".$row["genero"]);
                        }
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
                        $i++;
                    }               
                    $citas = json_encode($citas);
                }
            
            
            $this->load->model('Pacientes_model');
            //$pacientes=$this->Pacientes_model->getPacientes();
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,                
                'contenido' => $contenido,
                'tipocalendar'=>$tipocalendar, 
                'estadoscitas'=>$estadoscitas,
                'estadospagos'=>$estadospagos, 
                'tiposDocs'=>$tiposDocs,
                'estadosCiviles'=>$estadosCiviles,
                'medicosEspecialidades'=>$medicosEspecialidades,
                'pacientes'=>array(),                              
                'citas'=>$citas,
                'vista'=>'calendario'
            );
            $this->load->view("plantillas/plantilla", $data);           
        }else {
            $data = array(
                'user_login' => -1,
            );
            $this->session->set_flashdata('error', "Error de acceso");
            redirect('access', 'refresh');
        }

    }


    public function logout(){
		$this->session->sess_destroy();
        $this->session->set_userdata('login', 'false');
		redirect('access', 'refresh');
    }
    
    public function recuperacion($user){
        $result=$this->Access_model->getUser($user);        
		$this->session->sess_destroy();
        $this->session->set_userdata('login', 'false');
        if($result!=-1){
            $datos = array(
                'id_user' => $this->id_user,
                'user_name' => $this->user_name,                            
                'vista'=>'',
                'usuario'=>$result,
                'tipocalendar'=>'', 
            );
            $this->load->view("front_end/recuperacion", $datos);
        }
        else{
            $this->session->set_flashdata('error', "Debe Indicar un usuario correcto");
            redirect('access', 'refresh');
        }
	}

    public function acceso_denegado()
    {
        $datos = array(
            'id_user' => $this->id_user,
            'user_name' => $this->user_name,
            'budget_actual' => $this->budget_actual,
            'titulo' => "CMS | Acceso denegado",
            'contenido' => 'acceso'
        );
        $this->load->view("plantillas/plantilla", $datos);

    }

}

?>