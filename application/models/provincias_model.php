<?php

class Provincias_model extends CI_Model {
    var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'Provincias'; 
    } 
    
    
    /*
     * Devuelve un array con todas las Provincias
     * 
     * @return array
     */
    public function all() 
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." ORDER BY nombre_prov;");
        return $query->result_array();        
    }
    
    
    
}
