<?php 


class Auth {
    protected $ci;
    
    function __construct() 
    {
        $this->ci =& get_instance();
        $this->ci->load->library('session');
        $this->ci->load->model('usuarios_model');
        $this->ci->load->model('personas_model');
    }
    
    
    /*
     * Metodo para iniciar session
     */
    public function user_login($user, $pswrd)
    {
        #por las dudas borra todos los datos existentes de session anteriores
        $this->ci->session->sess_destroy();
        $this->ci->session->sess_create();
        
        $result = $this->ci->usuarios_model->user_exist($user);
        if ($result !== FALSE)
        {
            if ($pswrd == $result['password_usr'])
            {
                $pers = $this->ci->personas_model->get_person_by_user($user);
                $nombre = $pers['nombre_pers']." ".$pers['apellido_pers']; #concatena el nombre y apellido               
                $this->ci->session->set_userdata('login_user', $result['username_usr']);
                $this->ci->session->set_userdata('login_role', $result['tipo_usr']);
                $this->ci->session->set_userdata('login_name', $nombre);   
                
                $this->ci->usuarios_model->update_last_login($user);  
                return TRUE;           
            }
            else 
            {
                return FALSE;
            }
       }
       else 
       {
           return FALSE;
       }
    }    
    
    
    /*
     * Comprueba si hay una session iniciada. Retornara el nombre de usuario en
     * caso que haya una session iniciada, o false en caso contrario.
     * 
     * @return string OR boolean False
     */
    public function user_is_logged() 
    {
        $usr = $this->ci->session->userdata('login_user');
        if ($usr !== FALSE)
        {
            return $usr;
        }
        else 
        {
            return FALSE;
        }
    }
    
    
    /*
     * Retorna el nombre del Usuario que esta logueado Actualmente
     */
    public function user_get_name() 
    {        
        return $this->ci->session->userdata('login_name');
    }
 
    /*
     * Retorna el tipo de Usuario
     */ 
    public function user_get_role()
    {
        return $this->ci->session->userdata('login_role');
    }
    
 
    /*
     * informacion para mostrar en la cabecera del sitio, de los datos
     * del usuario que esta logueado actualmente
     */ 
    public function user_get_login_info()
    {
        if ($this->user_is_logged()) {
            return $this->ci->session->userdata('login_name')." - ".$this->ci->session->userdata('login_role');
        }
        else 
        {
            return "Usuario No Logueado";    
        }
    }
 
 
    public function user_get_nav() {
        if (!$this->user_is_logged()) 
        {
            return 'user_menu/not-login';
        }
        elseif ($this->user_get_role() == 'Vendedor')
        {
            return 'user_menu/vendedor';
        }
        elseif ($this->user_get_role() == '')
        {
            return 'nav';
        }
        elseif ($this->user_get_role() == '')
        {
            return 'nav';      
        }
    }
 
 
    /*
     * Borra los datos de la session actual
     */
    public function user_logout() 
    {
        $this->ci->session->unset_userdata('login_user');
        $this->ci->session->unset_userdata('login_role');
        $this->ci->session->unset_userdata('login_name');
        $this->ci->session->sess_destroy();    
        $this->ci->session->sess_create(); 
    } 
     
}
