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
        $data = array(
            'page_title' => 'Iniciar Session',
        );
        
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
