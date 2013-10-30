<?php 

class Movimientos_models extends CI_Model {
    var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'Movimientos'; 
    } 
          
    
    
}
