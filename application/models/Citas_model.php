<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Citas_model extends CI_Model{
	public function __construct() {
        parent::__construct();
    }


    public function getCitas($mes)
    {
        $this->db->select("CONCAT(pacientes.nombres,' ',pacientes.apellidos) as title");
        $this->db->select("fechacita as start");   
        $this->db->select("fechafincita as end");    
        $this->db->select('idcita');
        $this->db->select('motivocita');
        $this->db->select("idpaciente");
        $this->db->select("pacientes.documento");
        $this->db->select("pacientes.fechanacimiento");
        $this->db->select("pacientes.genero");
        $this->db->select("sintomas");
        $this->db->select("pacientes.enfermedadesprevias");
        $this->db->select("pacientes.medicamentos");
        $this->db->select("pacientes.alergias");
        $this->db->select("citas.descripcion");
        $this->db->select("idmedico");
        $this->db->select("estadoscitas.id AS idestadocita");
        $this->db->select("estadospagos.id AS idestadopago");
        $this->db->select("estadoscitas.descripcion AS estadocita");
        $this->db->select("CONCAT(pacientes.nombres,' ',pacientes.apellidos) AS nombre_paciente");
        $this->db->select("CONCAT(medicos.nombres,' ',medicos.apellidos) AS nombremedico");
        $this->db->from('citas');
        $this->db->join('pacientes','citas.idpaciente=pacientes.id');
        $this->db->join('estadoscitas','citas.idestadocita=estadoscitas.id');
        $this->db->join('estadospagos','citas.idestadopago=estadospagos.id');
        $this->db->join('medicos','citas.idmedico=medicos.id','left outer ');
        $this->db->where("statuscita", 1);
        //$this->db->where("DATE_FORMAT(fechacita,'%m')", $mes);

        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }

    public function getEstadoCita($idcita)
    {
        $this->db->select("*");        
        $this->db->from('citas');        
        $this->db->where_in("idestadocita",array(1,2,3,4))->where("idcita",$idcita);
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }

    public function setCitas($datos){
        if($datos['idcita']!=""){
            $id=$datos['idcita'];
            unset($datos['idcita'],$datos['idpaciente']);           
            $this->db->where('idcita',$id);
            $result=$this->db->update("citas",$datos);

        }
        else{
            $id=$datos['idcita'];
            unset($datos['idcita']);           
            $result=$this->db->insert('citas',$datos);           
        }
        $error = $this->db->error(); // Has keys 'code' and 'message')  
        return $result;
        
    }

     public function deleteCita($idcita){
        $result=$this->getEstadoCita($idcita);
        if($result!=-1){             
            $this->db->where('idcita',$idcita);
            $result=$this->db->update("citas",array('statuscita'=>0));                            
        }
        else{
            $result=-2;
        }
            
        return $result;        
    }

}
?>