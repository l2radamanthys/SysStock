<?php

class Articulos_model extends CI_Model {
    var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'Articulos'; 
    } 
      
    
    /*
     * Registra un Nuevo Articulo
     * 
     * Autor: Ricardo Quiroga
     * 
     * @param array $data Campo asociativo con los parametros que se utilizaran
     * 
     * @return boolean Resultado de la insercion
     */
    public function register($data) 
    {
        if ($this->db->insert($this->table_name, $data)) 
        {
            return $this->db->insert_id();
        }
        else
        {
            return FALSE;        
        }
    }
    
    
    /*
     * Autor: Ricardo Quiroga
     */
    public function exist($key, $val)
    {
        return FALSE;
    }
    
    
    
}
