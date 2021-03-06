<?php

class Home extends CI_Controller {

   

    public function __construct() {
        parent::__construct();  
        // load Session Library
        $this->load->library('session');         
        // load url helper
        $this->load->helper('url');           
        if ($this->session->userdata('login')[0]!='true') {
            //redirect('access/logout');
        }
        $this->load->model('Access_model');   
        $this->load->model('Citas_model');     
        $this->id_user = !empty($this->session->userdata('id_user')[0]) ? $this->session->userdata('id_user')[0] : 0;
        $this->user_name = !empty($this->session->userdata('name_user')[0]) ? $this->session->userdata('name_user')[0] : '';  

    }

    public function index() {
        
        $user_login = $this->session->userdata('login')[0] ? $this->session->userdata('login')[0] : false;        
       //$user_login=true;  
        if ($user_login=='t') {            
            $citas=$this->Citas_model->getCitas(date('m'));  
            $estadoscitas=$this->Access_model->getEstadosCita();
            $estadospagos=$this->Access_model->getEstadosPago();
            $tiposDocs=$this->Access_model->getTiposDocumentos();        
            $estadosCiviles=$this->Access_model->getEstadosCiviles();
            $medicosEspecialidades=$this->Access_model->getMedicosEspecialidades();
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
                   // $citas[$i]['title'] = str_replace($replace_array, "", $row['title']." - ".$row['documento']."<br>".$row['fechanacimiento']."  ".$row["genero"]);
                   if($this->session->userdata('perfil') ==1){                  
                        $citas[$i]['title'] = str_replace($replace_array, "", $row['documento']." | ".$row['title']." | ".$row['edad']."  | ".$pago." | ".$row['motivocita']." | ".$row['descripcion']." | ".$row["acudiente"]." | ".$row["telfacudiente"] );
                    }
                    else{
                        //$citas[$i]['title'] = str_replace($replace_array, "", $row['title']." - ".$row['documento']);
                        $citas[$i]['title'] = str_replace($replace_array, "", $row['title'] )." | ".$row['edad'];
                        $citas[$i]['description'] = str_replace($replace_array, "",$row['descripcion']);
                        if($row['telefonos']!=""){
                            $citas[$i]['description'].=" | Telf: ".$row['telefonos']; 
                        }
                        if($row['telfacudiente']!=""){
                            $citas[$i]['description'].=" | Telf Acudiente: ".$row['telfacudiente']; 
                        }
                    } 

                   //$citas[$i]['motivocita'] = str_replace($replace_array, "", $row['motivocita']);
                    //$citas[$i]['url'] = 'base_url('home_eventos/eventos_detalle')."/".$row['idcita']';
                    //$citas[$i]['backgroundColor'] = "#DF0101";
                    $i++;
                }               
                $citas = json_encode($citas);
            }
            $this->load->model('Pacientes_model');
            $pacientes=$this->Pacientes_model->getPacientes();
          
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
                'mes'=>date("Y-m-d"),
                'pacientes'=>array(), 
                'vista'=>'calendario'
            );

            
            $this->load->view("plantillas/plantilla", $data);
        }else {

            redirect('access', 'refresh');
        }
       

    }

    public function diario(){
        $user_login = $this->session->userdata('login')[0] ? $this->session->userdata('login')[0] : false;
        
        //$user_login=true;
        if ($user_login=='t') {
            $citas=$this->Citas_model->getCitas(date('m')); 
            $estadoscitas=$this->Access_model->getEstadosCita(); 
            $estadospagos=$this->Access_model->getEstadosPago();
            $tiposDocs=$this->Access_model->getTiposDocumentos();        
            $estadosCiviles=$this->Access_model->getEstadosCiviles();
            $medicosEspecialidades=$this->Access_model->getMedicosEspecialidades();
            $replace_array = array("'", '"');
            //var_dump($citas);
            //print count($citas);
            //die();
            $replace_array=array();
            if ($citas != -1) {
                $i=0;
                foreach ($citas as $row) { 
                    //$citas[$i]['title'] = str_replace($replace_array, "", $row['title']." - ".$row['documento']."<br>".$row['fechanacimiento']."  ".$row["genero"]);
                    if($row['idestadopago']==1){
                        $pago="Pendiente";    
                    }
                    else if($row['idestadopago']==2){
                        $pago="Pagado";    
                    }
                    else{
                        $pago="Transferencia";    
                    }
                    //if($this->session->userdata('perfil') ==1){      
					$date = new DateTime($row['fechanacimiento']);
					$fechanacimiento =$date->format('d-m-Y');            
                    $citas[$i]['title'] = str_replace($replace_array, "", $row['documento']." | ".$row['title']." | ".$row['edad']."  | ".$pago." | ".$row['motivocita']." | ".$row['descripcion']." | ".$row["acudiente"]." | ".$row["telfacudiente"]);

                   /* }
                    else{
                        //$citas[$i]['title'] = str_replace($replace_array, "", $row['title']." - ".$row['documento']);
                        $citas[$i]['title'] = str_replace($replace_array, "", $row['title']." | ID: ".$row['documento'] );
                        $citas[$i]['description'] = str_replace($replace_array, "","FEC.NAC.: ".$row['fechanacimiento']." | GEN: ".$row["genero"]);
                    } */

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
            $this->load->model('Pacientes_model');
            //$pacientes=$this->Pacientes_model->getPacientes();           
            $data = array(
                'user_login' => $user_login,
                'user_name' => $this->user_name,
                'contenido' => 'dashboard_home',
                'tipocalendar'=>'agendaDay', 
                'estadoscitas'=>$estadoscitas, 
                'estadospagos'=>$estadospagos, 
                'tiposDocs'=>$tiposDocs,
                'estadosCiviles'=>$estadosCiviles, 
                'medicosEspecialidades'=>$medicosEspecialidades,             
                'citas'=>$citas,
                'mes'=>date("Y-m-d"),
                //'pacientes'=>$pacientes, 
                'vista'=>'calendario'
            );
            $this->load->view("plantillas/plantilla", $data);
        }else {
            //var_dump($this->session->userdata('login')[0],"DIARIO HOME");die();
            $this->session->set_flashdata('error', "Sesion Vencida");
            redirect('access', 'refresh');
        }
    }
    

    public function semanal($mesactual=NULL){
        
        $user_login = $this->session->userdata('login')[0] ? $this->session->userdata('login')[0] : false;
             
        //$user_login=true;
        //var_dump($this->session->userdata('login'));die();
        if ($user_login=='t') {           
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
                    //$citas[$i]['title'] = str_replace($replace_array, "", $row['title']." - ".$row['documento']."<br>".$row['fechanacimiento']."  ".$row["genero"]);
					$date = new DateTime($row['fechanacimiento']);
					$fechanacimiento =$date->format('d-m-Y');						
                    if($this->session->userdata('perfil') ==1){                  
                        $citas[$i]['title'] = str_replace($replace_array, "", $row['documento']." | ".$row['title']." | ".$row['edad']."  | ".$pago." | ".$row['motivocita']." | ".$row['descripcion']." | ".$row["acudiente"]." | ".$row["telfacudiente"]);
                    }
                    else{
                        //$citas[$i]['title'] = str_replace($replace_array, "", $row['title']." - ".$row['documento']);
                        $citas[$i]['title'] = str_replace($replace_array, "", $row['title'])." | ".$row['edad'];
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
            $this->load->model('Pacientes_model');
            //$pacientes=$this->Pacientes_model->getPacientes();
            if($mesactual!=NULL){
                $date=$mesactual;
            }
            else{
                $date=date("Y-m-d");
            }

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
               // 'pacientes'=>$pacientes,                          
                'citas'=>$citas,
                'mes'=>$date,
                'vista'=>'calendario'
            );
            $this->load->view("plantillas/plantilla", $data);
        }else {
           
            $this->session->set_flashdata('error', "Sesion Vencida");
            redirect('access', 'refresh');
        }
    }

    public function saveCita() 
    {
        /* Our calendar data */
        $idpaciente = $this->input->post("selPaciente");
        $idcita     = $this->input->post("idcita");
        $motivocita = $this->input->post("txtmotivocita");
        $descripcion = $this->input->post("txtdescripcion");
        $historia = $this->input->post("txthistoria");
        $sintomas = $this->input->post("txtsintomas");  
        $estadocita = $this->input->post("selEstadoCita");   
        $estadopago = $this->input->post("selEstadoPago");
        $idmedico = $this->input->post("selMedico");   
        $medicinastomadas = $this->input->post("txtmedicinastomadas");
        $start_date = $this->input->post("date");
        $end_date = $this->input->post("dateend");
        $action=$this->input->post("action");
        
        if($action!="NO"){            
            $start_date = new DateTime(str_replace("/","-",$start_date));
            $start_date =$start_date->format('Y-m-d H:i:s');             
            $mesactual=$start_date;
            $end_date = new DateTime(str_replace("/","-",$end_date));
            $end_date =$end_date->format('Y-m-d H:i:s');
        }
        
        $citas=array(
           "idcita"=>$idcita,
           "idpaciente" => $idpaciente,
           "motivocita" => $motivocita,
           "descripcion"=>$descripcion,
           "historiamedica"=>$historia,
           "sintomas"=>$sintomas,
           'idestadocita'=>$estadocita,
           "medicinastomadas"=>$medicinastomadas,
           'idestadopago'=>$estadopago,
           "fechacita" => $start_date,
           "fechafincita" => $end_date,
           "idmedico"=>$idmedico,           
           'statuscita'=>1
        );
        if($action=="NO"){//CUANDO PROVIENE EL LLAMADO DE DRAG O RESIZE DEL CALENDAR
            unset($citas['idpaciente'],$citas["motivocita"],$citas["sintomas"],$citas["descripcion"],$citas['idestadocita'],$citas['idestadopago'],$citas['idmedico']);
        }
        //METODO QUE PROCESA LOS DATOS
        $regCitas=$this->Citas_model->setCitas($citas);
        if($regCitas){
            $this->session->set_flashdata('success', "Cita registrada con exito");
        }
        else{
            $this->session->set_flashdata('error', "Error al guardar cita");
        }
        if($action!="NO"){//CUANDO NO PROVIENE EL LLAMADO DE DRAG O RESIZE DEL CALENDAR, LLAMO A LA VISTA CON LOS CAMBIOS
            if($this->session->userdata('profile')==1){
                $this->diario();               
            }
            else{
                $this->semanal($mesactual);               
            }            
        }
    }

    public function deleteCita() {
        $idcita     = $this->input->post("idcita");

        //METODO QUE PROCESA LOS DATOS
        $result=$this->Citas_model->deleteCita($idcita);
        if($result===-2){
            $success=false;
            $mensaje="Cita debe estar en estado No Confirmada ó Cancelada para poder Eliminar";
        }
        elseif($result===-1){
            $success=false;
            $mensaje="Problemas el eliminar la cita";
        }
        else{
            $success=true;
            $mensaje="Cita eliminada con exito";
        }
        
        echo json_encode(array('success'=>$success,"mensaje"=>$mensaje));
    
    }
      

}