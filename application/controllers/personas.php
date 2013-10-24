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
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->model('provincias_model');
            $this->load->model('empresas_model');
            $this->load->helper('utils');
            
            $data = array(
                'page_title' => 'Home',
                'type_pers' => $type,
                'user' => $this->auth->user_get_login_info(),
            );
            $nav = $this->auth->user_get_nav();
                      
                            
            #adapto la vista segun el tipo de Persona a Registrar                                   
            if ($type == 'cliente') 
            {
                $data['title'] = "Registrar Cliente"; 
                $data['is_cliente'] = TRUE; 
                $data['is_proveedor'] = FALSE;                
            }
            elseif ($type == 'proveedor') 
            {
                $data['title'] = "Registrar Proveedor";
                $data['is_cliente'] = FALSE; 
                $data['is_proveedor'] = TRUE;                
            }
            else 
            {
                $data['title'] = "Registrar Persona";
                $data['is_cliente'] = TRUE;
                $data['is_proveedor'] = TRUE;
            }                
            
            
            $data['show_errors'] = FALSE; #mostrar error
            $data['custom_error']='';     #error personalizado si lo hay      
            $data['provincias'] = $this->provincias_model->all();
            $data['empresas'] = $this->empresas_model->all_by_name();
            
            
            if ($this->form_validation->run('persona') != FALSE) 
            {
                #pass
                echo "run";
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
                    'direccion_pers' => $this->input->post('direccion'),
                    'es_cliente' => $data['is_cliente'],
                    #lo mismo que con empresas, si no seleciona se pone a null
                    'fk_id_prov' => blanc_to_null($this->input->post('fk_id_prov')),
                    'fk_id_ciud' => blanc_to_null($this->input->post('fk_id_ciud')),
                    'fk_id_zona' => $this->input->post('fk_id_zona'),
                );
                
                $result = $this->personas_model->register_person($form_data);
                
                if ($result) 
                {
                    $this->load->view('header', $data);
                    $this->load->view($nav, $data);
                    $this->load->view('personas/registrar_success', $data);
                    $this->load->view('footer', $data);
                }

                else 
                {
                    #opps    
                    $this->load->view('header', $data);
                    $this->load->view($nav, $data);
                    $this->load->view('personas/registrar', $data);
                    $this->load->view('footer', $data);
                }

            }
            else {
                $data['show_errors'] = TRUE;

                $this->load->view('header', $data);
                $this->load->view($nav, $data);
                $this->load->view('personas/registrar', $data);
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


    /*
     * Buscar Un CLiente
     * 
     * Autor: Ricardo Quiroga
     * Estado: Incompleto 
     */     
    public function search_client($query="")
    {
        if ($this->auth->user_is_logged() AND TRUE)
        {
            $this->load->model('personas_model');
            $this->load->helper('utils');  
              
            $data = array(
                'page_title' => 'Buscar Cliente',
                #'type_pers' => $type,
                'user' => $this->auth->user_get_login_info(),
            );
            $nav = $this->auth->user_get_nav();  
            
            $data['css_include'] = css_include('tables.css');               
            
            $data['personas'] = $this->personas_model->all();
            
            
            
            $this->load->view('header', $data);
            $this->load->view($nav, $data);
            $this->load->view('personas/buscar', $data);
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
            $data = array(
                'page_title' => 'Datos Persona',
                'user' => $this->auth->user_get_login_info(),
            );
            $nav = $this->auth->user_get_nav(); 
            
            $pers = 
            
            
            
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
    
    
}
