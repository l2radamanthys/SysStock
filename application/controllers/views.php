<?php

class Views extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
    }
    
    
    public function index() 
    {
        $this->home();
    }
    
    
    /*
     * sample basic view content copy paste and edit.
     */ 
    public function home() 
    {
        if ($this->auth->user_is_logged())
        {
            $data = array(
                'page_title' => 'Home',
                'user' => $this->auth->user_get_login_info(),
            );
            $nav = $this->auth->user_get_nav();
            
            #content here.
            
            $this->load->view('header', $data);
            $this->load->view($nav, $data);
            $this->load->view('home', $data);
            $this->load->view('footer', $data);
        }        
        else {
            #usuario no logueado
            redirect('/session/login');
        }
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
