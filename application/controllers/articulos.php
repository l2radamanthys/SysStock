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
            $this->load->helper('utils');
                        
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
 
            if ($this->form_validation->run('articulo') === FALSE) 
            {
                #formulario no enviado
                $data['show_errors'] = TRUE;
                $this->load->view('articulos/registrar', $data);
            } 
            else           
            
            {
                #formulario enviado
                
                $art_data = array(
                    'codigo_art'=> blanc_to_null($this->input->post('codigo_art')),
                    'nombre_art' => $this->input->post('nombre_art'),
                    'precio_costo_art' => $this->input->post('precio_costo_art'),
                    'precio_venta_art' => $this->input->post('precio_venta_art'),
                    'precio_venta_lista_art' => $this->input->post('precio_venta_lista_art'),
                    'stock_art' => 0, #no se registra stock inicial al ingreso
                    'stock_min_art' => $this->input->post('stock_min_art'),
                    'stock_max_art' => $this->input->post('stock_max_art'),
                    'not_stock_art' => $this->input->post('not_stock_art'),
                );
                
                $band = TRUE; #bandera de control de insercion
                
                if ($art_data['codigo_art'] != NULL) #¿existe un articulo con el mismo codigo?
                {
                    if ($this->articulos_model->exist('codigo_art', $art_data['codigo_art']))
                    {
                        #si ya se registro un articulo con ese codigo, lanzo el error
                        $data['show_errors'] = TRUE;
                        $data['custom_errors'] = "Error ya se registro un Articulo con dicho Codigo ";
                        $band = FALSE;
                    }
                    else {
                        #el codigo no esta asignado podemos continiar
                        $band = TRUE;
                    }
                }
                
                if ($band)
                {
                    $id_art = $this->articulos_model->register($art_data);
                    if ($id_art != FALSE) #no se registro el articulo
                    {
                        $artscat_data = array(
                            'fk_id_art' => $id_art,    
                            'fk_id_cat' => $this->input->post('id_cat'),
                            'fk_id_scat' => $this->input->post('id_scat'),
                        );
                    }
                    
                
                
                }
                else
                {
                    $this->load->view('articulos/registrar', $data);
                    $data['show_errors'] = TRUE;
                    $data['custom_errors'] = "Error ";
                }    
                
                
                #print_r($art_data);
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
