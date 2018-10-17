<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Especialidades_model extends CI_Model{
	public function __construct() {
        parent::__construct();
    }


    public function getEspecialidades()
    {        
        $this->db->select("*");        
        $this->db->from('especialidades');        
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }

    public function getEspecialidadExiste($datos)
    {        
        $this->db->select("*");        
        $this->db->from('especialidades'); 
        $this->db->where('id',$datos["id"]);   
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }

    public function saveEspecialidades($datos){          
        $result=false;
        if($datos['id']!=""){
            $id=$datos["id"];
            unset($datos['id']);
            $this->db->where('id',$id);
            $result=$this->db->update('especialidades',$datos);            
        }
        else{
            if($this->getEspecialidadExiste($datos)==-1){
                $result=$this->db->insert('especialidades',$datos);
            }
            else{
                print "EXISTE INSERTAR";    
            }            
        }        
        /*if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();*/
        
       return $result;
    }


   
}
?>