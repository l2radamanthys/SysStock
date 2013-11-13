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
            if(is_array($this->empresas_model->consult_empresa("cuit_emp",set_value('cuit'))))
            {               
                
                $form_data = array(
                    'razon_social_emp' => $this->input->post('razon_social'),
                    'tipo_emp' => $this->input->post('tipo'),
                    'cuit_emp' => $this->input->post('cuit')                  
                );
                
                if($this->empresas_model->register($form_data))
                {
                    $empresa = $this->empresas_model->consult_empresa('cuit_emp', $this->input->post('cuit'));
                    
                    $data_sucursal= array(
                        'fk_id_emp'=>$empresa["id_emp"],
                        'nombre_suc'=> "Casa Central",
                        'direccion_suc'=> $this->input->post('direccion'),
                        'horario'=> $this->input->post('horario'),
                        'email_suc'=> $this->input->post('email'),
                        'telefono_a_suc' => $this->input->post('telefono1'),
                        'telefono_b_suc'=> $this->input->post('telefono2'),
                        'web_suc'=> $this->input->post('sitio'),
                        'fk_id_zona'=> $this->input->post('fk_id_zona'),
                        'fk_id_ciud'=> $this->input->post('fk_id_ciud'),
                        'fk_id_prov'=> $this->input->post('fk_id_prov')
                    );  
                              
                    if($this->sucursal_model->new_sucursal($data_sucursal))
                    {
                        $data['empresa'] ="Empresa registrada correctamente";   
                        $data['sucursal'] = "Sucursal Agregada Correctamente";                   
                                         
                    }
                    else
                    {
                        $data['empresa'] = "Empresa registrada correctamente" ;
                        $data['sucursal'] = "Fallo en la insersion";	                   
                        
                    }
                  }
                  else
                  {
                      $data['empresa'] = "Fallo en la carga de datos de empresas" ;
                      $data['sucursal'] = "";                      
                  }               
                                    
            }             
            else
            {
                $data['empresa'] = "Empresa ya registrada";
                $data['sucursal'] ="" ;                   
            }
            $this ->load ->view('empresa/registro_success',$data) ;      
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
        $this->load->model("empresas_model");    
        $this->load->library('form_validation');        
        #$this->form_validation->set_rules('query','Query','required');
        $this->load->helper('utils');
        
        
        $data = array (
             'page_title' => 'Nuevo Articulo',
             #'title' => 'Registrar Articulo',
             'user' => $this->auth->user_get_login_info(),
        );
        
        $data['css_include'] = css_include('tables.css');
        
        $this->load->view("header", $data);
        $this->load->view("nav", $data); 
        
        
        
        if(isset($_POST['query']))
        {                          
            $valor = $this->input->post('query');          
            $campo =  $this->input->post('field');
            $data['empresas'] = $this->empresas_model->search_empresa($campo,$valor);  
                  
        }
        else
        {
            $data['empresas'] = $this->empresas_model->all_by_name(); 
             
        }
        $this ->load ->view('empresa/buscar_empresa',$data) ;
        $this->load->view("footer");
    }


    //modificar empresas
    function modificar_empresas()
    {
        
        
    }
    
 }
 
 
 
?>