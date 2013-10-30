<?php


class Lote_articulos extends CI_Controller {
    function __construct() {
        parent::__construct();
        
        $this->load->model('articulos_model');      
    }
    
    
    
}

