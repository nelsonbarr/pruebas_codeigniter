<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Medicos_model extends CI_Model{
	public function __construct() {
        parent::__construct();
    }


    public function getMedicos()
    {        
        $this->db->select("*");        
        $this->db->from('medicos');        
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }

    public function getMedicosExiste($datos)
    {        
        $this->db->select("*");        
        $this->db->from('medicos'); 
        $this->db->where('documento',$datos["documento"]);   
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }

    public function saveMedicos($datos){        
        $result=false;
        if($datos['id']!=""){
            $id=$datos["id"];
            unset($datos['id']);
            $this->db->where('id',$id);
            $result=$this->db->update('medicos',$datos);            
        }
        else{
            if($this->getMedicosExiste($datos)==-1){
                $result=$this->db->insert('medicos',$datos);
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