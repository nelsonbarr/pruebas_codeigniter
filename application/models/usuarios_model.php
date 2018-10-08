<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios_model extends CI_Model{
	public function __construct() {
        parent::__construct();
    }


    public function getUsuarios()
    {        
        $this->db->select("*");        
        $this->db->from('usuarios');        
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }

    public function getUsuarioExiste($datos)
    {        
        $this->db->select("*");        
        $this->db->from('usuarios'); 
        $this->db->where('nombreusuario',$datos["nombreusuario"]);   
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }

    public function saveUsuarios($datos){        
        if($datos['id']!=""){
            $id=$datos["id"];
            unset($datos['id']);
            $this->db->where('nombreusuario',$id);
            $this->db->update('usuarios',$datos);            
        }
        else{
            if($this->getUsuarioExiste($datos)==-1){
                $this->db->insert('usuarios',$datos);
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