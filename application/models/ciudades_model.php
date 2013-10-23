<?php

class Ciudades_model extends CI_Model {
    var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'Ciudades'; 
    }
    
    
    /*
     * Devuelve un array con todas las ciudades de una provincia.
     * 
     * @param integer $id_prov
     * 
     * @return array      
     */
    public function all_by_state($id_prov)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE fk_id_prov=".$id_prov);
        return $query->result_array();
    }
     
    
} 