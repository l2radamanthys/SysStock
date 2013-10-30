<?php

class Pedidos extends CI_Controller {
    function __construct() {
        parent::__construct();
        
        $this->load->model('pedidos_model');
        $this->load->model('articulos_model');      
    }
    
    
        
    
    
    
}
