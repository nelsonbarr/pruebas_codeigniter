<?php

class Home extends CI_Controller {

   

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('login') == false) {
           // redirect('access/logout');
        }
        $this->load->model('access_model');   
        $this->load->model('citas_model');     
        $this->id_user = !empty($this->session->userdata('id_user')) ? $this->session->userdata('id_user') : 0;
        $this->user_name = !empty($this->session->userdata('name_user')) ? $this->session->userdata('name_user') : '';  

    }

    public function index() {
        
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;

       //    if (!empty($user_login)) {            
            $citas=$this->citas_model->getCitas(date('m'));  
            $replace_array = array("'", '"');
            //var_dump($citas);
            //print count($citas);
            //die();
            $replace_array=array();
            if ($citas != -1) {
                $i=0;
                foreach ($citas as $row) { 
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
                    $citas[$i]['motivocita'] = str_replace($replace_array, "", $row['motivocita']);
                    //$citas[$i]['url'] = 'base_url('home_eventos/eventos_detalle')."/".$row['idcita']';
                    //$citas[$i]['backgroundColor'] = "#DF0101";
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
       /* }else {
            $data = array(
                'user_login' => $user_login,
            );
            $this->load->view("login-view", $data);
        }*/
       

    }

    public function diario(){
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;

        //if (!empty($user_login)) {
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
                'tipocalendar'=>'agendaDay',                
                'citas'=>$citas,
                'pacientes'=>$pacientes, 
                'vista'=>'calendario'
            );
            $this->load->view("plantillas/plantilla", $data);
       /* }else {
            $data = array(
                'user_login' => $user_login,
            );
            $this->load->view("login-view", $data);
        }*/
    }
    

    public function semanal(){
        $user_login = ($this->session->userdata('login')) ? $this->session->userdata('login') : false;

       // if (!empty($user_login)) {
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
                'pacientes'=>$pacientes,                          
                'citas'=>$citas,
                'vista'=>'calendario'
            );
            $this->load->view("plantillas/plantilla", $data);
        /*}else {
            $data = array(
                'user_login' => $user_login,
            );
            $this->load->view("login-view", $data);
        }*/
    }

    public function saveCita() 
    {
        /* Our calendar data */
        $idpaciente = $this->input->post("selPaciente");
        $idcita     = $this->input->post("idcita");
        $motivocita = $this->input->post("txtmotivocita");
        $descripcion = $this->input->post("txtdescripcion");
        $sintomas = $this->input->post("txtsintomas");        
        $start_date = $this->input->post("date", TRUE);
        $end_date = $this->input->post("dateend", TRUE);
        $action=$this->input->post("action");
               
        $citas=array(
           "idcita"=>$idcita,
           "idpaciente" => $idpaciente,
           "motivocita" => $motivocita,
           "descripcion"=>$descripcion,
           "sintomas"=>$sintomas,
           "fechacita" => $start_date,
           "fechafincita" => $end_date
        );
        if($action=="NO"){//CUANDO PROVIENE EL LLAMADO DE DRAG O RESIZE DEL CALENDAR
            unset($citas['idpaciente'],$citas["motivocita"],$citas["sintomas"],$citas["descripcion"]);
        }
        //METODO QUE PROCESA LOS DATOS
        $this->citas_model->setCitas($citas);

        if($action!="NO"){//CUANDO NO PROVIENE EL LLAMADO DE DRAG O RESIZE DEL CALENDAR, LLAMO A LA VISTA CON LOS CAMBIOS
            $this->semanal();
        }
    }

}
