<?php


class Zonas_model extends CI_Model {
    var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'Zonas'; 
    }
    
    
    /*
     * Devuelve un array con todas las zonas de una ciudades
     * 
     * @param integer $id_ciud
     * 
     * @return array      
     */
    public function all_by_city($id_ciud)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE fk_id_ciud=".$id_ciud);
        return $query->result_array();
    }
     
    
} 