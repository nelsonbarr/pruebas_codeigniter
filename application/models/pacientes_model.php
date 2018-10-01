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

    public function savePacientes($datos){        

        if($datos['id']!=""){
            $id=$datos["id"];
            unset($datos['id']);
            $this->db->where('id',$id);
            $this->db->update('pacientes',$datos);            
        }
        else{
            if($this->getPacienteExiste($datos)==-1){
                $this->db->insert('pacientes',$datos);
            }
            else{
                print "EXISTE INSERTAR";    
            }
            
        }
        
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        
       return true;
    }
}
?>