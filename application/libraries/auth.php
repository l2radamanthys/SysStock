<?php 


class Auth {
    protected $ci;
    
    function __construct() 
    {
        $this->ci =& get_instance();
        $this->ci->load->library('session');
        $this->ci->load->model('usuarios_model');
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
                $this->ci->session->set_userdata('login_user', $result['username_usr']);
                #$this->ci->session->set_userdata('login_user', $result['username_usr']);
            }
        }
    }     
}
