<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Insertasesoria extends REST_Controller {
    
     /**
     * Get All Data from this method.
     *
     * @return Response
    */
    
    public function __construct(){
        parent:: __construct();
        $this->load->model('Insert_asesoria', 'InsertAsesoria');
    }
       
     /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function asesoria_post(){
        header("Access-Control-Allow-Origin: *");
        $_POST = json_decode($this->security->xss_clean(file_get_contents("php://input")),true);

                    $nu_curso = $this->input->post('nu_curso');
                    $competencia = $this->input->post('competencia');
                   // $fecha = $this->post('fecha');
                    $nu_asesoria = $this->post('nu_asesoria');
                    //$fotouno = $this->post('fotouno');
                    //$fotodos = $this->post('fotodos');
                    //$fototres = $this->post('fototres');
                    //$status = $this->post('status');  
               
        
                    $data = array (
                        //'id'=>12,
                        'nu_curso'=>$nu_curso,
                        'competencia'=>$competencia,
                        'fecha'=>date("Y-m-d H"),
                        'nu_asesoria'=>$nu_asesoria,
                        'fotouno'=>'tres',
                        'fotodos'=>'dos',
                        'fototres'=>'uno',
                        'status'=>0

                    );
                    
         $result=$this->InsertAsesoria->asesoria($data);
         if($result){
            $this->response($result, 200); 
        } 
        else{
             $this->response("Invalid ISBN", 404);
        }
         
            
         
    }
    
    public function updateasesoria_put(){
        header("Access-Control-Allow-Origin: *");
        $_POST = json_decode($this->security->xss_clean(file_get_contents("php://input")),true);
        
                    $id = $this->input->post('id');
                    //$nu_curso = $this->input->post('nu_curso');
                    //$competencia = $this->input->post('competencia');
                   // $fecha = $this->post('fecha');
                    //$nu_asesoria = $this->post('nu_asesoria');
                    //$fotouno = $this->post('fotouno');
                    //$fotodos = $this->post('fotodos');
                    //$fototres = $this->post('fototres');
                    //$status = $this->post('status');  
               
        
                    $data = array (
                        'id'=>$id,
                        //'nu_curso'=>$nu_curso,
                        //'competencia'=>$competencia,
                        //'fecha'=>date("Y-m-d H"),
                        //'nu_asesoria'=>$nu_asesoria,
                        //'fotouno'=>'tres',
                        //'fotodos'=>'dos',
                        //'fototres'=>'uno',
                        'status'=>'0'

                    );
                    
         $this->InsertAsesoria->updateasesoria($data);
       //  if($result){
       //     $this->response($result, 200); 
       // } 
       // else{
       //      $this->response("Invalid ISBN", 404);
       // }
         
            
         
    }
    
    public function index_put($id)
    {
        //$input = $this->put();
        $data = array ( 'status'=>'0');
        $this->db->set('status', '0', FALSE);
        $this->db->update('asesorias', $data, array('id'=>$id));
        //$this->db->set('last_login', 'NOW()', FALSE);
        //$this->db->update(DB_PREFIX .'user', array('login_attempts' => 0));
     
        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
        
    }
    
}

