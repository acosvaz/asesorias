<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Catalogo extends REST_Controller {
    
    public function __construct(){
        parent:: __construct();
        $this->load->model('Catalogoapi_model');
    }
    
    public function index_get(){
        $catalogo = $this->Catalogoapi_model->get();
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }
    
    public function find_get($nu){
        
        if(!$nu){
            $this->response(null, 400);
        }
        
        $catalogo = $this->Catalogoapi_model->get($nu);
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'Catalogo no disponible'), 404);
        }
    }
    
        public function tipos_get(){
        $catalogo = $this->Catalogoapi_model->tipoasesoria();
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }
    
        public function sesion_get($cu){
        $catalogo = $this->Catalogoapi_model->sesion($cu);
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }
    
        public function asistencia_get($cu,$id, $as){
        $catalogo = $this->Catalogoapi_model->asistencia($cu,$id, $as);
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }
    
    public function maestros_get(){
        $data = $this->db->get_where("users", ['nu_rol' => '2'])->result();
        $this->response($data, REST_Controller::HTTP_OK);
    }
    
        public function admin1_get($id){
        $catalogo = $this->Catalogoapi_model->admin1($id);
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }
    
        public function pdf_get($id){
        $catalogo = $this->Catalogoapi_model->pdf($id);
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }

           public function encabezado_get($id){
        $catalogo = $this->Catalogoapi_model->encabezado($id);
        
        if(!is_null($catalogo)){
            $this->response($catalogo, 200);
        } else {
            $this->response(array('error' => 'No hay promociones disponibles'), 404);
        }
    }
    
}

