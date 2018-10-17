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

    public function getUsuarioValido($datos)
    {        
        $this->db->select("*");        
        $this->db->from('usuarios'); 
        $this->db->where('nombreusuario',$datos["nombreusuario"]);   
        $this->db->where('email',$datos["email"]);   
        $this->db->where('preguntaseguridad',$datos["preguntaseguridad"]);   
        $this->db->where('respuestapregunta',md5($datos["respuestapregunta"]));  
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }

    public function saveUsuarios($datos){          
        $result=false;
        if($datos['id']!=""){
            $id=$datos["id"];
            unset($datos['id']);
            $this->db->where('id',$id);
            $result=$this->db->update('usuarios',$datos);            
        }
        else{
            if($this->getUsuarioExiste($datos)==-1){
                $result=$this->db->insert('usuarios',$datos);
            }
            else{
                print "EXISTE INSERTAR";    
            }            
        }        
       /* if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();*/
        
       return $result;
    }


    public function saveRenewPass($datos){          
        $result=false;
        $valido=$this->getUsuarioValido($datos);
        
        if($valido!=-1 && $datos['nombreusuario']!=""){
                      
            $this->db->where('nombreusuario',$datos['nombreusuario']);
            unset($datos['nombreusuario'],$datos['email'],$datos['preguntaseguridad'],$datos['respuestapregunta']);
            $result=$this->db->update('usuarios',$datos);            
        }
         
       /* if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();*/
        
       return $result;
    }


   
}
?>