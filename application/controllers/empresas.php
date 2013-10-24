<?php
/********************
   Empresas
 ********************/
 
 /**
  *   Clase empresa
  */
 class Empresas extends CI_Controller
 {
     
     
     //carga las vistas   
    function index()
    {
        
        $this->load->library('form_validation');
        $this->load->view("header");
        $this->load->view("nav");
        
        $this->form_validation->set_rules('razon_social','Razon Social','required');
        $this->form_validation->set_rules('cuit','CUIT','required');
        if ($this -> form_validation ->run() == TRUE) 
        {
            insert_empresa($fiel, $values);
            //$this ->load ->view('empresa/registro_success') ; 
            $this->form_validation->set_rules('razon_social','Razon Social','required');
            $this->form_validation->set_rules('razon_social','Razon Social','required');
            $this->form_validation->set_rules('razon_social','Razon Social','required');
            $this->form_validation->set_rules('razon_social','Razon Social','required');
            $this->form_validation->set_rules('razon_social','Razon Social','required');
            $this ->load ->view('empresa/sucursal') ;    
        } 
        else 
        {
            $this ->load ->view('empresa/registro');
        }
        
        //$this->load->view("home");
        $this->load->view("footer");
    }
    
 }
 
 
 
?>