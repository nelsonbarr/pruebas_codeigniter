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
            $this->load->model('pacientes_model');
            $pacientes=$this->pacientes_model->getPacientes();
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'contenido' => 'dashboard_home',
                'tipocalendar'=>'agendaWeek',
                'pacientes'=>$pacientes,
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
            $this->load->model('pacientes_model');
            $pacientes=$this->pacientes_model->getPacientes();
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'contenido' => 'dashboard_home',
                'tipocalendar'=>'agendaDay',
                'pacientes'=>$pacientes,
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
            $this->load->model('pacientes_model');
            $pacientes=$this->pacientes_model->getPacientes();
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'contenido' => 'dashboard_home',
                'tipocalendar'=>'agendaWeek',
                'pacientes'=>$pacientes,                
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

    public function add_event() 
    {
        /* Our calendar data */
        $idpaciente = $this->input->post("selPaciente");
        $motivocita = $this->input->post("txtmotivocita");
        $start_date = $this->input->post("date", TRUE);
        $end_date = $this->input->post("dateend", TRUE);

        if(!empty($start_date)) {
           $sd = DateTime::createFromFormat("Y/m/d H:i", $start_date);
           $start_date = $sd->format('Y-m-d H:i:s');
           $start_date_timestamp = $sd->getTimestamp();
        } else {
           $start_date = date("Y-m-d H:i:s", time());
           $start_date_timestamp = time();
        }

        if(!empty($end_date)) {
           $ed = DateTime::createFromFormat("Y/m/d H:i", $end_date);
           $end_date = $ed->format('Y-m-d H:i:s');
           $end_date_timestamp = $ed->getTimestamp();
        } else {
           $end_date = date("Y-m-d H:i:s", time());
           $end_date_timestamp = time();
        }

        $this->citas_model->setCitas(array(
           "idpaciente" => $idpaciente,
           "motivocita" => $motivocita,
           "fechacita" => $start_date,
           "fechafincita" => $end_date
           )
        );

        redirect(base_url("home"));
    }

}
