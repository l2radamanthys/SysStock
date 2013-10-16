<?php 


class Auth {
    protected $ci;
    
    function __construct() 
    {
        $this->$ci =& get_instance();  #obtiene instancia actual del objecto CI 
        $this->load->library('session');
        $this->load->library('usuarios_model');
        
    }
    
}
