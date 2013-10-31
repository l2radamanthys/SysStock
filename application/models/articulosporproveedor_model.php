<?php

class Articulosporproveedor_model extends CI_Model {
     var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'ArticulosPorProveedor'; 
    } 
        
         
    /*
     * Registrar Articulo por Proveedor
     * 
     * Autor: Ricardo Quiroga
     * 
     * @param array $data
     * @return boolean 
     */
    public function register($data) 
    {
        return $this->db->insert($this->table_name, $data);
    }
    
    
}
