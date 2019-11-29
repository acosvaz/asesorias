<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';
require APPPATH . 'libraries/REST_Controller_Definitions.php';

class Insertfoto extends REST_Controller {
    
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
                        'status'=>1

                    );
                    
         $result=$this->InsertAsesoria->asesoria($data);
         if($result){
            $this->response($result, 200); 
        } 
        else{
             $this->response("Invalid ISBN", 404);
        }
         
            
         
    }
    
    
    	function upload_post() {
           header("Access-Control-Allow-Origin: *");
          // Recuerda activar $_POST = json_decode($this->security->xss_clean(file_get_contents("php://input")),true);
           header('Access-Control-Allow-Methods: POST');
	   header('Access-Control-Allow-Headers: Content-Type');
            
		if ($this->input->method()) {
			if(!$_FILES) {
				$this->response('Please choose a file', 500);
				return;
			}
			
			$upload_path = '/uploads/';
			//file upload destination
			$config['upload_path'] = $upload_path;
			//allowed file types. * means all types
			$config['allowed_types'] = '*';
			//allowed max file size. 0 means unlimited file size
			$config['max_size'] = '0';
			//max file name size
			$config['max_filename'] = '255';
			//whether file name should be encrypted or not
			//$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if (file_exists($upload_path . $_FILES['file']['name'])) {
				$this->response('File already exists => ' . $upload_path . $_FILES['file']['name']);
				return;
			} else {
				if (!file_exists($upload_path)) {
					mkdir($upload_path, 0777, true);
				}
				
				if($this->upload->do_upload('file')) {
					//$this->response('http://' . $_SERVER['SERVER_NAME'] . $upload_path . $_FILES['file']['name']);
                                         $nu_curso = $this->input->post('nu_curso');
                                         $competencia = $this->input->post('competencia');
                                         $nu_asesoria = $this->post('nu_asesoria');
                                         $fotouno = 'http://' . $_SERVER['SERVER_NAME'] . $upload_path . $_FILES['file']['name'] ;
                                         
                                         $data = array (
                                                //'id'=>12,
                                                'nu_curso'=>$nu_curso,
                                                'competencia'=>$competencia,
                                                'fecha'=>date("Y-m-d H"),
                                                'nu_asesoria'=>$nu_asesoria,
                                                'fotouno'=>$fotouno,
                                                'fotodos'=>'dos',
                                                'fototres'=>'uno',
                                                'status'=>1

                                            );
                                         
                                       $result=$this->InsertAsesoria->asesoria($data);
                                       $response=$this->response('si se pudo');
					return $response;
				} else {
					$this->response('Error during file upload => ' . $this->upload->display_errors(), 500);
					return;
				}
			}
                        
                                   /*      $nu_curso = $this->input->post('nu_curso');
                                         $competencia = $this->input->post('competencia');
                                         $nu_asesoria = $this->post('nu_asesoria');
                                         $fotouno = 'http://' . $_SERVER['SERVER_NAME'] . $upload_path . $_FILES['file']['name'] ;
                                         
                                         $data = array (
                                                //'id'=>12,
                                                'nu_curso'=>$nu_curso,
                                                'competencia'=>$competencia,
                                                'fecha'=>date("Y-m-d H"),
                                                'nu_asesoria'=>$nu_asesoria,
                                                'fotouno'=>$fotouno,
                                                'fotodos'=>'dos',
                                                'fototres'=>'uno',
                                                'status'=>1

                                            );
                                         
                                       $result=$this->InsertAsesoria->asesoria($data);
                                            if($result){
                                                $this->response($result, 200); 
                                            } 
                                            else{
                                                $this->response("Invalid ISBN", 404);
                                                }*/

   
		}
	}
    
}

