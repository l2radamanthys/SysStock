<?php

class Views extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
    }
    
    
    public function index() 
    {
        $this->test_template();
    }
    
    
    /*
     * Vista de Prueba para la plantilla
     */ 
    public function test_template()
    {
        $data = array(
            'page_title' => 'Vista de Prueba',
            'user' => 'No Login'
        );
        
        $data['user'] = $this->auth->user_get_login_info(); 
        
        #llamar normalmente esto al ultimo
        $this->load->view('header', $data);
        $this->load->view('nav', $data);
        $this->load->view('sample_template', $data);
        $this->load->view('footer', $data);
    }
    
    
    /*
     * test only view, delete on App deploy
     */ 
    public function query_test()
    {
        $this->load->model('usuarios_model');
        echo "hola";
        print_r($this->usuarios_model->user_exist('user'));
        
        
    } 
    
    
    /*
     * Vista de Error
     * 
     */
    public function error404() 
    {
        
    }
    
    
    
}
