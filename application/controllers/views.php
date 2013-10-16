<?php

class Views extends CI_Controller {
    
    function index() 
    {
        $this->test_template();
    }
    
    
    /*
     * Vista de Prueba para la plantilla
     */ 
    function test_template()
    {
        $data = array(
            'page_title' => 'Vista de Prueba',
        );
        
        #llamar normalmente esto al ultimo
        $this->load->view('header', $data);
        $this->load->view('nav', $data);
        $this->load->view('sample_template', $data);
        $this->load->view('footer', $data);
    }
    
    
    /*
     * Vista de Error
     * 
     */
    function error404() 
    {
        
    }
    
    
    
}
