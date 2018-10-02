<?php

class Access extends CI_Controller {
    private $id_user;
    private $user_name;
    
    public function __construct(){
        parent::__construct(); 
        $this->load->model('access_model');   
        $this->load->model('citas_model');     
        $this->id_user = !empty($this->session->userdata('id_user')) ? $this->session->userdata('id_user') : 0;
        $this->user_name = !empty($this->session->userdata('name_user')) ? $this->session->userdata('name_user') : '';
    }

    public function index()
    {
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;

        if (!empty($user_login)) {
            $citas=$this->citas_model->getCitas(date('m'));  
            $replace_array = array("'", '"');            
            $replace_array=array();
            if ($citas != -1) {
                $i=0;
                foreach ($citas as $row) {                    
                    $citas[$i]['motivocita'] = str_replace($replace_array, "", $row['motivocita']);
                    //$citas[$i]['url'] = base_url('home_eventos/eventos_detalle')."/".$row['idcita'];
                    if($row['estadocita']=='No Confirmada'){
                        $citas[$i]['backgroundColor'] = "rgb(40, 40,60)";    
                    } 
                    elseif($row['estadocita']=='Cancelada'){
                        $citas[$i]['backgroundColor'] = "#DF0101";
                    }                  
                    elseif($row['estadocita']=='En camino'){
                        $citas[$i]['backgroundColor'] = "rgb(10, 170,90)";
                    } 
                    elseif($row['estadocita']=='En Sala'){
                        $citas[$i]['backgroundColor'] = "#ffff00";
                    } 
                    elseif($row['estadocita']=='Visto'){
                        $citas[$i]['backgroundColor'] = "#0066ff";
                    }    
                    $i++;
                }               
                $citas = json_encode($citas);
            }
            $this->load->model('pacientes_model');
            $pacientes=$this->pacientes_model->getPacientes();
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'contenido' => 'dashboard_home',
                'tipocalendar'=>'agendaWeek',                               
                'citas'=>$citas,
                'pacientes'=>$pacientes, 
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
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;
        if ($user_login) {
            redirect('access', 'refresh');
        }

        $usuario = $this->input->post('txtusr');
        $password = $this->input->post('txtpwd');
        $valid_user = $this->access_model->login($usuario,$password);

        if ($valid_user != -1 && !empty($valid_user)) {

            $datos_cookie['login'] = true;
            $datos_cookie['id_user'] = intval($valid_user['id']);
            $datos_cookie['name_user'] = $valid_user['nombres']." ".$valid_user['apellidos'];           
            $datos_cookie['email_user'] = $valid_user['email'];
            $datos_cookie['profile']=$valid_user['perfil'];
            
            $this->session->set_userdata($datos_cookie);
            $citas=$this->citas_model->getCitas(date('m'));  
            $replace_array = array("'", '"');
            //var_dump($citas);
            //print count($citas);
            //die();
            $replace_array=array();
            if ($citas != -1) {
                $i=0;
                foreach ($citas as $row) {                   
                    $citas[$i]['title'] = str_replace($replace_array, "", $row['motivocita']);
                    //$citas[$i]['url'] = base_url('home_eventos/eventos_detalle')."/".$row['idcita'];
                    if($row['estadocita']=='No Confirmada'){
                        $citas[$i]['backgroundColor'] = "rgb(40, 40,60)";    
                    } 
                    elseif($row['estadocita']=='Cancelada'){
                        $citas[$i]['backgroundColor'] = "#DF0101";
                    }                  
                    elseif($row['estadocita']=='En camino'){
                        $citas[$i]['backgroundColor'] = "rgb(10, 170,90)";
                    } 
                    elseif($row['estadocita']=='En Sala'){
                        $citas[$i]['backgroundColor'] = "#ffff00";
                    } 
                    elseif($row['estadocita']=='Visto'){
                        $citas[$i]['backgroundColor'] = "#0066ff";
                    }    
                    $i++;
                }               
                $citas = json_encode($citas);
            }
            if($valid_user['perfil']==1){
                $tipocalendar="agendaDay";
            }
            else{
                $tipocalendar="agendaWeek";
            }
            
            $this->load->model('pacientes_model');
            $pacientes=$this->pacientes_model->getPacientes();
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,                
                'contenido' => 'dashboard_home',
                'tipocalendar'=>$tipocalendar,   
                'pacientes'=>$pacientes,                              
                'citas'=>$citas,
                'vista'=>'calendario'
            );
            $this->load->view("plantillas/plantilla", $data);           
        }else {
            $data = array(
                'user_login' => -1,
            );
            $this->load->view("login", $data);
        }

    }


    public function logout(){
		$this->session->sess_destroy();
        $this->session->set_userdata('login', false);
		redirect('access', 'refresh');
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
