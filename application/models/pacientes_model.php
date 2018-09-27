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
        if (count($query) == 1)
            return $query;
        return -1;
    }

}
?>