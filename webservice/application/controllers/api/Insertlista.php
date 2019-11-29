<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Insertlista extends REST_Controller {
    
     /**
     * Get All Data from this method.
     *
     * @return Response
    */
    
    public function __construct(){
        parent:: __construct();
        $this->load->database();
        //$this->load->model('Insert_asesoria', 'InsertAsesoria');
    }
       
     /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function lista_post($id){
        header("Access-Control-Allow-Origin: *");
        $_POST = json_decode($this->security->xss_clean(file_get_contents("php://input")),true);

        $input = $this->input->post();
        $this->db->insert_batch('asistencias',$input);
        $data = array ( 'status'=>'1');
        $this->db->set('status', '1', FALSE);
        $this->db->update('asesorias', $data, array('id'=>$id));
     
        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);         
    }
    
}

