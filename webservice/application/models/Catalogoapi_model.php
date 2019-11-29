<?php

class Catalogoapi_model extends CI_Model {
    
    public function __construct(){
        Parent::__construct();
    }
    
    public function get($nu = null) {
        
        if(!is_null($nu)){
            $this->db->select('cursos.id, materias.fullname, grupos.nombre');
            $this->db->from('cursos');
            $this->db->join('materias', 'materias.id=cursos.nu_materia');
            $this->db->join('grupos', 'grupos.id=cursos.nu_grupo');
            $this->db->where('cursos.nu_user', $nu);
            $query = $this->db->get();
            
            if ($query->num_rows() > 0){
            return $query->result_array();
            
            }
            
            return false;
            
        }
      
            $this->db->select('cursos.id, materias.fullname, grupos.nombre');
            $this->db->from('cursos');
            $this->db->JOIN('materias', 'materias.id=cursos.nu_materia');
            $this->db->join('grupos', 'grupos.id=cursos.nu_grupo');
            $query = $this->db->get();
      
      if($query->num_rows() > 0){
          return $query->result_array();
      }
      
      return false;
      
    }
    
        public function tipoasesoria($id = null) {
        
        if(!is_null($id)){
            $this->db->select('id, tipo');
            $this->db->from('tipo_asesorias');
            $this->db->where('id', $id);
            $query = $this->db->get();
            
            if ($query->num_rows() === 1){
            return $query->result_array();
            
            }
            
            return false;
            
        }
      
            $this->db->select('id, tipo');
            $this->db->from('tipo_asesorias');
            $query = $this->db->get();
      
      if($query->num_rows() > 0){
          return $query->result_array();
      }
      
      return false;
      
    }
    
        public function sesion($id = null) {
        
        if(!is_null($id)){
            $this->db->select('asesorias.id, cursos.nu_materia as materia, materias.shortname, asesorias.competencia, cursos.nu_grupo as grupo');
            $this->db->from('asesorias');
            $this->db->join('cursos', 'cursos.id=asesorias.nu_curso');
            $this->db->join('materias','materias.id=cursos.nu_materia'); 
            $this->db->where('cursos.nu_user', $id);
            $this->db->where('asesorias.status=0');
            $query = $this->db->get();
            
            if ($query->num_rows() > 0){
            return $query->result_array();
            
            }
            
            return false;
            
        }
      
      
    }
    
       public function asistencia($id,$nu,$as) {
        
       // if(!is_null($id,$nu)){
            $this->db->select('miembros.nu_user as userid, users.firstname, users.lastname, cursos.nu_materia, cursos.nu_grupo, asesorias.id as nu_asesoria');
            $this->db->from('miembros');
            $this->db->join('users', 'users.id=miembros.nu_user');
            $this->db->join('cursos','cursos.id=miembros.nu_curso');
            $this->db->join('asesorias','asesorias.nu_curso=cursos.id');
            $this->db->where('cursos.nu_materia', $id); 
            $this->db->where('cursos.nu_grupo', $nu);
            $this->db->where('asesorias.id', $as);
            $query = $this->db->get();
            
            if ($query->num_rows() > 0){
            return $query->result_array();
            
            }
            
            return false;
            
       // }
      
      
    }
    
       public function admin1($id) {
        
       // if(!is_null($id,$nu)){
            $this->db->select('asesorias.id, asesorias.competencia, asesorias.fecha');
            $this->db->from('asesorias');
            $this->db->join('cursos', 'cursos.id=asesorias.nu_curso');
            $this->db->where('cursos.nu_user', $id);
            $query = $this->db->get();
            
            if ($query->num_rows() > 0){
            return $query->result_array();
            
            }
            
            return false;
            
       // }
      
      
    }
    
       public function pdf($id) {
        
       // if(!is_null($id,$nu)){
            $this->db->select('users.firstname, users.lastname, grupos.nombre, asesorias.competencia, asesorias.fecha, tipo_Asesorias.shortname');
            $this->db->from('asistencias');
            $this->db->join('users', 'users.id=asistencias.userid');
            $this->db->join('asesorias', 'asesorias.id=asistencias.nu_asesoria');
            $this->db->join('cursos', 'cursos.id=asesorias.nu_curso');
            $this->db->join('grupos', 'grupos.id=cursos.nu_grupo');
            $this->db->join('tipo_asesorias', 'tipo_asesorias.id=asesorias.nu_asesoria');
            $this->db->where('asistencias.nu_asesoria', $id);
            $query = $this->db->get();
            
            if ($query->num_rows() > 0){
            return $query->result_array();
            
            }
            
            return false;
            
       // }
      
      
    }
    
       public function encabezado($id) {
        
       // if(!is_null($id,$nu)){
            $this->db->select('users.firstname, users.lastname, materias.fullname');
            $this->db->from('asistencias');
            $this->db->join('asesorias', 'asesorias.id=asistencias.nu_asesoria');
            $this->db->join('cursos', 'cursos.id=asesorias.nu_curso');
            $this->db->join('users', 'users.id=cursos.nu_user');
            $this->db->join('materias', 'materias.id=cursos.nu_materia');
            $this->db->where('asistencias.nu_asesoria', $id);
            $this->db->limit('1');
            $query = $this->db->get();
            
            if ($query->num_rows() > 0){
                
            return $query->result_array() ;
            
            }
            
            return false;
            
       // }
      
      
    }
    
}