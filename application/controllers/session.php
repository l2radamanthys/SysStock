<?php


/*
 * Vista Para Manejar las Sessiones de Usuarios
 */
class Session extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        
    }
    
    function index()
    {
        echo "hola";
    }
    
    
    function login() 
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data = array(
            'page_title' => 'Iniciar Session',
            'result' => '',
            'show_errors' => FALSE,
            'custom_errors' => '',
        );
        
        
        if ($this->form_validation->run() == FALSE)
        {
            
        }
        
        
        
        $this->load->view('header', $data);
        $this->load->view('user_menu/not-login');
        $this->load->view('session/login');
        $this->load->view('footer');
    }
    
    
    function logout() 
    {
        
    } 
    
    
    function register()
    {
        
    }
    
    
    function change_password()
    {
        
    }
}
