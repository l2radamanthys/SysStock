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
        $this->form_validation->set_rules('direccion','Direccion','required');
        $this->form_validation->set_rules('telefono1','Telefono','required');
        
        
        $this->load->model("empresas_model");
        
        if ($this -> form_validation ->run() == TRUE) 
        {
            $this->load->model('empresas_model'); 
            if(($this->empresas_model->consult_empresa("cuit_emp= ".set_value('cuit'))) == null)
            {
                $fiel ="razon_social_emp,tipo_emp,cuit_emp";   
                $values = "'{".set_value('razon_social')."}',".set_value('tipo').",'{".set_value('cuit')."}'";     
                $this->empresas_model->insert_empresa($fiel, $values);          
            }             
            else
            {
                echo "Empresa ya registrada";
            }
                         
            $this ->load ->view('empresa/registro_success') ;           
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