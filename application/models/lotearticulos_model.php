<?php


class Lotearticulos_model extends CI_Model {
    var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'LoteArticulos'; 
    } 
          
    
    
}
