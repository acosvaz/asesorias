<?php

class Insert_asesoria extends CI_Model {
    
    public function __construct(){
        Parent::__construct();
    }
    
//protected $table = 'grupos';    
        public function asesoria($data) {
        
       if ($this->db->insert('asesorias', $data)){
           
       return true;
        }else{
           return false;
        }
        
        }
        
    public function updateasesoria($data)
    {
        /**
         * Check Article exist with article_id and user_id
         */
        $query = $this->db->get_where('asesorias', [
            'id' => $data['id'],
            //'status' => $data['status'],
        ]);
        if ($this->db->affected_rows() > 0) {
            
            // Update an Article
            $update_data = [
                
                'status' =>  $data['status'],
            ];
            return $this->db->update('asesorias', $update_data, ['id' => $query->row('id')]);
        }   
        return false;
    }
        
}

