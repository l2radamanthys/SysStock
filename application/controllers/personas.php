<?php


class Personas extends CI_Controller {
      
    /*
     * Vista Para creacion de una persona ya sea cliente o proveedor
     * 
     * Autor: Ricardo Quiroga
     * Estado: Completo
     * @param string tipo ("cliente", "proveedor")
     * 
     */
    public function create($type='')
    {
        if ($this->auth->user_is_logged() AND TRUE)
        {            
            $this->load->library('form_validation');
            $this->load->model('provincias_model');
            $this->load->model('empresas_model');
            $this->load->helper('form');
            $this->load->helper('utils');
            
            $data = array(
                'page_title' => 'Home',
                'type_pers' => $type,
                'user' => $this->auth->user_get_login_info(),
            );
            $nav = $this->auth->user_get_nav();
            
            $this->load->view('header', $data);
            $this->load->view($nav, $data);                     
                            
            #adapto la vista segun el tipo de Persona a Registrar                                   
            if ($type == 'cliente') 
            {
                $data['title'] = "Registrar Cliente"; 
                $data['is_cliente'] = TRUE; 
                $data['is_proveedor'] = FALSE;   
                $data['success'] = "registrar_cliente_success";             
            }
            elseif ($type == 'proveedor') 
            {
                $data['title'] = "Registrar Proveedor";
                $data['is_cliente'] = FALSE; 
                $data['is_proveedor'] = TRUE;
                $data['success'] = "registrar_proveedor_success";                
            }
            else 
            {
                $data['title'] = "Registrar Persona";
                $data['is_cliente'] = TRUE;
                $data['is_proveedor'] = TRUE;
                $data['success'] = "registrar_proveedor_success";
            }                
            
            $data['show_errors'] = FALSE; #mostrar error
            $data['custom_error']='';     #error personalizado si lo hay      
            $data['provincias'] = $this->provincias_model->all();
            $data['empresas'] = $this->empresas_model->all_by_name();

            if ($this->form_validation->run('persona') != FALSE) 
            {
                $form_data = array(
                    'nombre_pers' => $this->input->post('nombre_pers'),
                    'apellido_pers' => $this->input->post('apellido_pers'),
                    'tipo_dni_pers' => $this->input->post('tipo_dni_pers'),
                    'nro_dni_pers' => $this->input->post('nro_dni_pers'),
                    #si no se seleciono empresa coloca en null
                    'fk_id_emp' => blanc_to_null($this->input->post('fk_id_emp')),                    
                    'telefono_pers' => $this->input->post('telefono_pers'), 
                    'celular_pers' => $this->input->post('celular_pers'),
                    'email_pers' => $this->input->post('email_pers'),
                    'observaciones_pers' => $this->input->post('observaciones_pers'),
                    'direccion_pers' => $this->input->post('direccion_pers'),
                    'es_cliente_pers' => $data['is_cliente'],
                    'es_proveedor_pers' => $data['is_proveedor'],
                    #lo mismo que con empresas, si no seleciona se pone a null
                    'fk_id_prov' => blanc_to_null($this->input->post('fk_id_prov')),
                    'fk_id_ciud' => blanc_to_null($this->input->post('fk_id_ciud')),
                    'fk_id_zona' => $this->input->post('fk_id_zona'),
                );
                
                $result = $this->personas_model->register_person($form_data);
                
                if ($result) 
                {
                    $this->load->view('personas/'.$data['success'], $data);
                }

                else 
                {
                    #opps    
                    $this->load->view('personas/registrar', $data);
                }

            }
            else {
                $data['show_errors'] = TRUE;
                $this->load->view('personas/registrar', $data);
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
     * Buscar un Proveedor
     * 
     * Autor: Ricardo Quiroga
     * Estado: Incompleto 
     */     
    public function search_client($query="")
    {
        $this->load->helper('form');
        $this->load->helper('utils');
        
        if ($this->auth->user_is_logged() AND TRUE)
        {
            $this->load->model('personas_model');

            $data = array(
                'page_title' => 'Buscar Cliente',
                'user' => $this->auth->user_get_login_info(),
            );
            $nav = $this->auth->user_get_nav();  
            $data['css_include'] = css_include('tables.css');               

            $this->load->view('header', $data);
            $this->load->view($nav, $data);             
                          
            if (!isset($_POST['field']))
            {
                $data['personas'] = $this->personas_model->all_clients();
            }
            else 
            {
                $key = $this->input->post('field');
                $match = $this->input->post('query');                               
                $data['personas'] = $this->personas_model->find_client($key, $match);
            }
            
            $this->load->view('personas/buscar_cliente', $data);
            $this->load->view('footer');   
                   
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
     * Buscar Un CLiente
     * 
     * Autor: Ricardo Quiroga
     * Estado: Incompleto 
     */     
    public function search_proveedor($query="")
    {
        if ($this->auth->user_is_logged() AND TRUE)
        {
            $this->load->model('personas_model');
            $this->load->helper('form'); 
            $this->load->helper('utils');  
              
            $data = array(
                'page_title' => 'Buscar Cliente',
                'user' => $this->auth->user_get_login_info(),
            );
            $nav = $this->auth->user_get_nav();  
            $data['css_include'] = css_include('tables.css');     
                      
            $this->load->view('header', $data);
            $this->load->view($nav, $data);  

            if (!isset($_POST['field']))
            {
                $data['personas'] = $this->personas_model->all_proveedors();
            }
            else 
            {
                $key = $this->input->post('field');
                $match = $this->input->post('query');                               
                $data['personas'] = $this->personas_model->find_proveedors($key, $match);
            }
            
            $this->load->view('personas/buscar_proveedor', $data);
            $this->load->view('footer');               

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
    
    
    public function search($type, $param="")
    {
        if ($type == "cliente")
        {
            $this->search_client($param);
        }
        elseif ($type == "proveedor")
        {
            $this->search_proveedor($param);
        }
    }


    /*
     * Mostrar datos Cliente
     * 
     * Autor: Ricardo Quiroga
     * Estado: Incompleto
     */
    public function show($id)
    {
        if ($this->auth->user_is_logged() AND TRUE)
        {
            $this->load->model('personas_model');
            $this->load->model('provincias_model');
            $this->load->model('ciudades_model');
            $this->load->model('zonas_model');
            $this->load->helper('utils');
            
            $data = array(
                'page_title' => 'Datos Persona',
                'user' => $this->auth->user_get_login_info(),
            );
            $nav = $this->auth->user_get_nav(); 
            
            $data['css_include'] = css_include('tables.css'); 
            
            
            $pers = $this->personas_model->get_person_by_id($id);
            $data['pers'] = $pers;
            $data['pers']['prov'] = $this->provincias_model->get_name($pers['fk_id_prov']);
            $data['pers']['ciud'] = $this->ciudades_model->get_name($pers['fk_id_ciud']);
            $data['pers']['zona'] = $this->zonas_model->get_name($pers['fk_id_zona']);
            
            $data['pers']['es_cliente_pers'] = bool_to_str($data['pers']['es_cliente_pers']);
            $data['pers']['es_proveedor_pers'] = bool_to_str($data['pers']['es_proveedor_pers']); 
            
            
            $this->load->view('header', $data);
            $this->load->view($nav, $data);
            $this->load->view('personas/mostrar', $data);
            $this->load->view('footer');             
               
               
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
     * Modificar Datos Persona
     * 
     * Autor: Ricardo Quiroga
     */
    public function edit($id)
    {
        if ($this->auth->user_is_logged() AND TRUE)
        {
             
               
               
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
    
    
    public function habilitar($tipo="cliente",$id_pers)
    {
        if ($this->auth->user_is_logged() AND TRUE)
        {
            $this->load->model('personas_model');
            
            $data = array(
                #'page_title' => 'Habilitar '.$tipo,
                'user' => $this->auth->user_get_login_info(),
            );
            $nav = $this->auth->user_get_nav(); 
            
            $pers = $this->personas_model->get_person_by_id($id_pers);
            $data['pers'] = $pers;            
            if ($tipo == "cliente")
            {
                $data['title'] = 'Habilitar Como Cliente';
                $data['page_title'] = 'Habilitar Como Cliente';                 
                if ($pers['es_cliente_pers'] != '1')
                {
                    $data['error'] = FALSE;   
                    $this->personas_model->update_person_field($id_pers,'es_cliente_pers',TRUE);          
                }
                else 
                {
                    $data['error'] = TRUE;
                }
                $this->load->view('header', $data);
                $this->load->view($nav, $data);
                $this->load->view('personas/habilitar_cliente', $data);
                $this->load->view('footer', $data);
            }
            elseif ($tipo == "proveedor") 
            {
                $data['title'] = 'Habilitar Como Proveedor';
                $data['page_title'] = 'Habilitar Como Proveedor';
                if ($pers['es_proveedor_pers'] != '1')
                {
                    $data['error'] = FALSE;   
                    $this->personas_model->update_person_field($id_pers,'es_proveedor_pers',TRUE);          
                }
                else 
                {
                    $data['error'] = TRUE;
                }    
                
                $this->load->view('header', $data);
                $this->load->view($nav, $data);
                $this->load->view('personas/habilitar_proveedor', $data);
                $this->load->view('footer', $data);
            }
               
               
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
