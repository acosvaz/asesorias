<?php

class Userasesoria_model extends CI_Model {
    
    public function __construct(){
        Parent::__construct();
    }
    
    public function get($id = null) {
        
        if(!is_null($id)){
            $this->db->select('username');
            $this->db->from('users');
            $this->db->where('id', $id);
            $query = $this->db->get();
            
            if ($query->num_rows() === 1){
            return $query->result_array();
            
            }
            
            return false;
            
        }
      
            $this->db->select('id, competencia, fecha, nu_asesoria');
            $this->db->from('asesorias');
            $this->db->join('tipo_asesorias', 'tipo_asesorias.id=asesorias.nu_asesoria');
            $this->db->where('nu_materia');
            $query = $this->db->get();
      
      if($query->num_rows() > 0){
          return $query->result_array();
      }
      
      return false;
      
    }
    
    
}