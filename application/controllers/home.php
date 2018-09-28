<?php

class Home extends CI_Controller {

   

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login') == false) {
            redirect('access/logout');
        }
        $this->load->model('access_model');   
        $this->load->model('citas_model');     
        $this->id_user = !empty($this->session->userdata('id_user')) ? $this->session->userdata('id_user') : 0;
        $this->user_name = !empty($this->session->userdata('name_user')) ? $this->session->userdata('name_user') : '';  

    }

    public function index() {
        
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;

        if (!empty($user_login)) {
            $citas=$this->citas_model->getCitas(date('m'));  
            $replace_array = array("'", '"');
            //var_dump($citas);
            //print count($citas);
            //die();
            $replace_array=array();
            if ($citas != -1) {
                $i=0;
                foreach ($citas as $row) {                    
                    $citas[$i]['motivocita'] = str_replace($replace_array, "", $row['motivocita']);
                    $citas[$i]['url'] = base_url('home_eventos/eventos_detalle')."/".$row['idcita'];
                    $citas[$i]['backgroundColor'] = "#DF0101";
                    $i++;
                }               
                $citas = json_encode($citas);
            }

            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'contenido' => 'dashboard_home',
                'tipocalendar'=>'agendaWeek',
                'citas'=>$citas
            );
            $this->load->view("plantillas/plantilla", $data);
        }else {
            $data = array(
                'user_login' => $user_login,
            );
            $this->load->view("login-view", $data);
        }
       

    }

    public function diario(){
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;

        if (!empty($user_login)) {
            $citas=$this->citas_model->getCitas(date('m'));  
            $replace_array = array("'", '"');
            //var_dump($citas);
            //print count($citas);
            //die();
            $replace_array=array();
            if ($citas != -1) {
                $i=0;
                foreach ($citas as $row) {                    
                    $citas[$i]['motivocita'] = str_replace($replace_array, "", $row['motivocita']);
                    $citas[$i]['url'] = base_url('home_eventos/eventos_detalle')."/".$row['idcita'];
                    $citas[$i]['backgroundColor'] = "#DF0101";
                    $i++;
                }               
                $citas = json_encode($citas);
            }

            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'contenido' => 'dashboard_home',
                'tipocalendar'=>'agendaDay',
                'citas'=>$citas
            );
            $this->load->view("plantillas/plantilla", $data);
        }else {
            $data = array(
                'user_login' => $user_login,
            );
            $this->load->view("login-view", $data);
        }
    }
    

    public function semanal(){
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;

        if (!empty($user_login)) {
            $citas=$this->citas_model->getCitas(date('m'));  
            $replace_array = array("'", '"');
            //var_dump($citas);
            //print count($citas);
            //die();
            $replace_array=array();
            if ($citas != -1) {
                $i=0;
                foreach ($citas as $row) {                    
                    $citas[$i]['motivocita'] = str_replace($replace_array, "", $row['motivocita']);
                    $citas[$i]['url'] = base_url('home_eventos/eventos_detalle')."/".$row['idcita'];
                    $citas[$i]['backgroundColor'] = "#DF0101";
                    $i++;
                }               
                $citas = json_encode($citas);
            }

            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'contenido' => 'dashboard_home',
                'tipocalendar'=>'agendaWeek',
                'citas'=>$citas
            );
            $this->load->view("plantillas/plantilla", $data);
        }else {
            $data = array(
                'user_login' => $user_login,
            );
            $this->load->view("login-view", $data);
        }
    }

}
