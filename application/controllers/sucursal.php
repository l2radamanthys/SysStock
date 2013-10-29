<?php
/*************************
    Controlador Sucursal
**************************/

class Sucursal extends CI_Controller
{    
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
        $this->load->model("provincias_model");
        
        $data['provincias'] = $this->provincias_model->all();
        
         $this->load->model("sucursal_model");
         
         $this->load->model('empresas_model'); 
         
         // $this ->load ->view('empresa/buscar_empresa') ;
    }   
}

?>