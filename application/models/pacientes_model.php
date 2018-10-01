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

    public function savePacientes($datos){
        $this->db->insert('pacientes',$datos);
        if ($this->db->affected_rows() == 1)
            return $this->db->insert_id();
        
        else
            print "ERROR AL INSERTAR";
    }
}
?>