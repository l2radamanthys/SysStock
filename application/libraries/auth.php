<?php 


class Auth {
    protected $ci;
    
    function __construct() 
    {
        $this->ci =& get_instance();
        $this->ci->load->library('session');
        $this->ci->load->model('usuarios_model');
    }
    
    
    
    
}
