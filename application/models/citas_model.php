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
        $this->db->select('idcita');
        $this->db->select('motivocita');
        $this->db->select("'idpaciente");
        $this->db->select("sintomas");
        $this->db->select("enfermedadesprevias");
        $this->db->select("'medicinastomadas");
        $this->db->select("idmedico");
        $this->db->select("CONCAT(medicos.nombres,' ',medicos.apellidos) AS nombremedico");        
        $this->db->from('citas');
        $this->db->join('pacientes','citas.idpaciente=pacientes.id');
        $this->db->join('medicos','citas.idmedico=medicos.id');
        $this->db->where("DATE_FORMAT(fechacita,'%m')", $mes);
        $query = $this->db->get();
        $query = $query->result_array();
        if (count($query) == 1)
            return $query;
        return -1;
    }

}
?>