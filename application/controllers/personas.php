<?php


class Personas extends CI_Controller {
      
    /*
     * Vista Para creacion de una persona ya sea cliente o proveedor
     * 
     * Autor: Ricardo D. Quiroga
     * 
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
                
                
                $this->load->view('header', $data);
                $this->load->view($nav, $data);
                $this->load->view('personas/registrar_success', $data);
                $this->load->view('footer', $data);
                

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
    
    
    
}
