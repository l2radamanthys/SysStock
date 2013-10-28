<?php

class Articulos extends CI_Controller {
    function __construct() {
        parent::__construct();
        
        $this->load->model('articulos_model');      
    }
    
    
    /*
     * Vista para registrar un Articulo
     * 
     * Autor: Ricardo Quiroga
     * 
     * Observaciones: NO FUNCIONA, por alguna razon no se envia el formulario o la aplicacion 
     * no lo toma nose que pasa, revisar mas tarde
     */     
    public function create() 
    {
        if ($this->auth->user_is_logged() AND TRUE)
        {
            $this->load->model('categorias_model');
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

            $data['categorias'] = $this->categorias_model->all();
 
            if ($this->form_validation->run('articulo') != FALSE)
            {
                #formulario enviado
                $art_data = array(
                    'nombre_art' => $this->input->post('nombre_art'),
                );
                
                $lote_data = array(
                
                );
                
                print_r($art_data);
            }
            else 
            {
                #formulario no enviado
                $data['show_errors'] = TRUE;
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
    
    
    
    /*
     * Buscar Articulos
     * 
     * 
     * 
     */
    public function search($key="")
    {
        $this->load->helper('utils');
        
        if ($this->auth->user_is_logged() AND TRUE)
        {
            $data = array (
                'page_title' => 'Buscar Articulo',
                'title' => 'Buscar Articulo',
                'user' => $this->auth->user_get_login_info(),
            );
            $nav = $this->auth->user_get_nav();
            $data['css_include'] = css_include('tables.css');
 
               
            $this->load->view('header', $data);
            $this->load->view($nav, $data);     
            
            
            
            
            $this->load->view('articulos/buscar', $data);
                 
               
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
