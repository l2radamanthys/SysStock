<?php

class Empresas_model extends CI_Model {
    var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'Empresas'; 
    } 
    
    
    function get_empresa($id)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE id_emp='".$value."';");
        return $query->row_array();
    }
    
    // inserta una empresa
    function insert_empresa($fiel, $values)
    {
         $query = $this ->db->query("INSERT INTO ".$this->table_name."($fiel) VALUES($values);");
         return $query;
    }
}