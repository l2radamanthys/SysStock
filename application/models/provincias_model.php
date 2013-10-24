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
    
    
    /*
     * Devuelve el nombre de la provincia pasando el ID
     */
    public function get_name($id)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE id_prov=".$id);
        $q = $query->row_array();
        if(isset($q['nombre_prov'])) 
        {
            return $q['nombre_prov'];
        }
        else 
        {
            return "-------------";
        }                
    }
    
}
