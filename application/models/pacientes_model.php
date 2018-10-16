<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pacientes_model extends CI_Model{
	public function __construct() {
        parent::__construct();
    }


    public function getPacientes()
    {        
        $this->db->select("*");        
        $this->db->from('pacientes');        
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }

    public function getPacienteExiste($datos)
    {        
        $this->db->select("*");        
        $this->db->from('pacientes'); 
        $this->db->where('documento',$datos["documento"]);   
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }

    public function getPacientesFiltrado($datos)
    {        
        $this->db->select("nombres");        
        $this->db->from('pacientes'); 
        $this->db->like('documento',$datos["documento"]);   
        /*$query = $this->db->get();
        $query = $query->result_array();*/
        
        $query = $this->db->get();
        $query = $query->result();
        foreach ($query as $hsl)
        {
            $data[] = $hsl->nombres;
        }
        /*if (count($query) >= 1)//*/
            return $data;
        
    }

    public function savePacientes($datos){        
        $result=false;
        if($datos['id']!=""){
            $id=$datos["id"];
            unset($datos['id']);
			unset($datos['idtipodocumento']);
            $this->db->where('id',$id);
            $result=$this->db->update('pacientes',$datos);            
        }
        else{
            if($this->getPacienteExiste($datos)==-1){
                $result=$this->db->insert('pacientes',$datos);
            }
            else{
                print "EXISTE INSERTAR";    
            }            
        }        
       /* if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();*/
        
       return $result;
    }


    public function getHistorico($idpaciente)
    {        
        $this->db->select("citas.*");
        $this->db->select("CONCAT(pacientes.nombres,' ',pacientes.apellidos) AS nombre_paciente");            
        $this->db->from('citas');
        $this->db->join('pacientes','citas.idpaciente=pacientes.id');   
        $this->db->where('idpaciente',$idpaciente) ;
        $this->db->where('idestadocita',5) ;
        $query = $this->db->get();
        $query = $query->result();
        return $query;
    }
}
?>