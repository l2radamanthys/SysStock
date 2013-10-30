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
        $this->load->model("provincias_model");
        
        $data['provincias'] = $this->provincias_model->all();
        
         $this->load->model("sucursal_model");
            
        //print_r($provincias);
        
        if ($this -> form_validation ->run() == TRUE) 
        {            
            $this->load->model('empresas_model'); 
            if(($this->empresas_model->consult_empresa("cuit_emp= ".set_value('cuit'))) == null)
            {
                $fiel ="razon_social_emp, cuit_emp"; 
                
                
                $form_data = array(
                    'razon_social_emp' => $this->input->post('razon_social'),
                    'tipo_emp' => $this->input->post('tipo'),
                    'cuit_emp' => $this->input->post('cuit')
                  
                );
                
                $this->empresas_model->register($form_data);
                $data_sucursal= array(
                    'nombre_suc'=> "Casa Central",
                    'direccion_suc'=> $this->input->post('direccion'),
                    'horario'=> $this->input->post('horario'),
                    'email_suc'=> $this->input->post('email'),
                    'telefono_a_suc' => $this->input->post('telefono1'),
                    'telefono_b_suc'=> $this->input->post('telefono2'),
                    'web_suc'=> $this->input->post('sitio'),
                    'fk_id_zona'=> $this->input->post('fk_id_zona'),
                    'fk_id_ciud'=> $this->input->post('fk_id_ciud"'),
                    'fk_id_prov'=> $this->input->post('fk_id_prov')
                );
               
                $this->sucursal_model->new_sucursal($data_sucursal);                      
            }             
            else
            {
                echo "Empresa ya registrada"; //mejorar aqui
            }
                         
            $this ->load ->view('empresa/registro_success') ;           
        } 
        else 
        {
            $this ->load ->view('empresa/registro', $data);            
        }        
       
        $this->load->view("footer");
    }

    // Busca las empresas 
    function buscar_empresas()
    {
        $this->load->library('form_validation');
        $this->load->view("header");
        $this->load->view("nav"); 
        $this->form_validation->set_rules('query','Query','required');
        
        $this->load->model("empresas_model");
        $empresas = array();
        if($this -> form_validation ->run() == TRUE)
        {//aqui me quede
            if($this->input->post('razon_social') ==)
            {                
                
            }
            else
            {
                
            }
            $empresa = $this->empresas_model->consult_empresa($this->input->post('razon_social')")       
        }
        else
        {
            $this ->load ->view('empresa/buscar_empresa',$empresas) ; 
        }
        
    }
    
 }
 
 
 
?>