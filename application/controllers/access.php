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
            $estadoscitas=$this->access_model->getEstadosCita();  
            $replace_array = array("'", '"');            
            $replace_array=array();
            if ($citas != -1) {
                $i=0;
                foreach ($citas as $row) {  
                    if($row['idestadocita']==1){
                        $pago="Pendiente";    
                    }
                    else if($row['idestadocita']==2){
                        $pago="Pagado";    
                    }
                    else{
                        $pago="Transferencia";    
                    }                   
                        //$citas[$i]['motivocita'] = str_replace($replace_array, "", $row['motivocita']);
                    //   $citas[$i]['title'] = str_replace($replace_array, "", $row['title']." - ".$row['documento']."<br>".$row['fechanacimiento']."  ".$row["genero"]);
                    if($this->session->userdata('perfil') ==1){                  
                        $citas[$i]['title'] = str_replace($replace_array, "", $row['title']." | ID: ".$row['documento']."  |  FECHA NAC: ".$row['fechanacimiento']."  |  GENERO: ".$row["genero"]."  |  PAGO: ".$pago);

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
                        $citas[$i]['backgroundColor'] = "rgb(10, 170,90)";
                        $citas[$i]['textColor']="#000000";
                    } 
                    elseif($row['estadocita']=='En Sala'){
                        $citas[$i]['backgroundColor'] = "#ffff00";
                        $citas[$i]['textColor']="#000000";
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
                'estadoscitas'=>$estadoscitas,                               
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
            
            $estadoscitas=$this->access_model->getEstadosCita(); 
            
            if($valid_user['perfil']==1){
                $tipocalendar="agendaDay";
                $contenido = 'dashboard_home';
                $citas=$this->citas_model->getCitas(date('m'));
                //$citas=$this->citas_model->getCitasDia(date('Y/m/d'));
                
            }
            else{
                $tipocalendar="agendaWeek";
                $contenido = 'dashboard_home';
                $citas=$this->citas_model->getCitas(date('m'));
               
            }   
                $replace_array = array("'", '"');
                //var_dump($citas);
                //print count($citas);
                //die();
                $replace_array=array();
                if ($citas != -1) {
                    $i=0;
                    foreach ($citas as $row) { 
                        if($row['idestadocita']==1){
                            $pago="Pendiente";    
                        }
                        else if($row['idestadocita']==2){
                            $pago="Pagado";    
                        }
                        else{
                            $pago="Transferencia";    
                        } 
                        if($valid_user['perfil']==1){                  
                            $citas[$i]['title'] = str_replace($replace_array, "", $row['title']." | ID: ".$row['documento']."  |  FECHA NAC: ".$row['fechanacimiento']."  |  GENERO: ".$row["genero"]."  |  PAGO: ".$pago);                

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
                            $citas[$i]['backgroundColor'] = "rgb(10, 170,90)";
                            $citas[$i]['textColor']="#000000";
                        } 
                        elseif($row['estadocita']=='En Sala'){
                            $citas[$i]['backgroundColor'] = "#ffff00";
                            $citas[$i]['textColor']="#000000";
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
                'contenido' => $contenido,
                'tipocalendar'=>$tipocalendar, 
                'estadoscitas'=>$estadoscitas,   
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
