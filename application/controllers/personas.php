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
    public function create($type='cliente')
    {
        if ($this->auth->user_is_logged() AND TRUE)
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->model('provincias_model');
            
            
            $data = array(
                'page_title' => 'Home',
                'user' => $this->auth->user_get_login_info(),
            );
            $nav = $this->auth->user_get_nav();
                      
                            
            #adapto la vista segun el tipo de Persona a Registrar                                   
            if ($type == 'cliente') 
            {
                $data['title'] = "Registrar Cliente"; 
                $data['is_cliente'] = TRUE;               
            }
            elseif ($type == 'proveedor') 
            {
                $data['title'] = "Registrar Proveedor";
                $data['is_proveedor'] = TRUE;                
            }
            else 
            {
                $data['title'] = "Registrar Persona";
                $data['is_cliente'] = TRUE;
                $data['is_proveedor'] = TRUE;
            }                
            
            
            $data['show_form'] = TRUE;
            $data['custom_error']='';            
            
            $data['provincias'] = $this->provincias_model->all();
            #$data['empresas'] = $this->empresas_model->all();
            
            
            if ($this->form_validation->run() !== FALSE) 
            {
                #pass
                echo "run";

            }
            else {
                


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
