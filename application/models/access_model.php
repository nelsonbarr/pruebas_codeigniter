<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Access_model extends CI_Model{
	public function __construct() {
        parent::__construct();
    }


    public function login($login = NULL, $password = NULL)
    {
        $this->db->select('*')->from('usuarios');
        $this->db->where('nombreusuario', $login)->where('password', $password)->where('status', 1);
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) == 1)
            return $query[0];
        return -1;
    }


    public function getTiposDocumentos()
    {
        $this->db->select('*')->from('tiposdocumento');
        
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }

    public function getEstadosCiviles()
    {
        $this->db->select('*')->from('estadosciviles');
        
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }

    public function getEstadosCita()
    {
        $this->db->select('*')->from('estadoscitas');
        
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }

    public function getEspecialidades()
    {
        $this->db->select('*')->from('especialidades');

        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }
	
    public function getEstadosPago()
    {
        $this->db->select('*')->from('estadospagos');
        
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) >= 1)
            return $query;
        return -1;
    }

}
?>