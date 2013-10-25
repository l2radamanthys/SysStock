<?php

class Articulos extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        $this->load->model('articulos_model');
        #$this->load->library('auth');
    }
    
    
    /*
     * Vista para registrar un Articulo
     * 
     * Autor: Ricardo Quiroga
     */
    public function create() 
    {
        if ($this->auth->user_is_logged() AND TRUE)
        {
            $this->load->library('form_validation');    
            $this->load->helper('form');
                        
            $data = array (
                'page_title' => 'Nuevo Articulo',
                'title' => 'Registrar Articulo',
                'user' => $this->auth->user_get_login_info(),
            );
            $nav = $this->auth->user_get_nav(); 
            
            $data['show_errors'] = FALSE; #mostrar error
            $data['custom_error']='';     #error personalizado si lo hay   
           
            $this->load->view('header', $data);
            $this->load->view($nav, $data);
           
            if ($this->form_validation->run('persona') != FALSE)
            {
                #formulario enviado
                
            }
            else 
            {
                #formulario no enviado
                $this->load->view('articulos/registrar', $data);
            } 
            
            $this->load->view('footer', $data);   
               
        }    
        elseif ($this->auth->user_is_logged())
        {
            #usuario logueado pero no tiene permisos    
        }

        else 
        {
            #usuario no logueado
            redirect('/session/login');
        }
    } 
    
    
}
