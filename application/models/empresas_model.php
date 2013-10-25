<?php

class Empresas_model extends CI_Model {
    var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'Empresas'; 
    } 
     
    
    
    
    /*
     * Obtiene listado de todas las empresas ordenadas por nombre
     * 
     * Autor: Ricardo Quiroga
     * 
     * @return array
     * 
     */
    public function all_by_name() 
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." ORDER BY razon_social_emp");
        return $query->result_array();
    }
        
    
    
    function get_empresa($id)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE id_emp='".$id."';");
        return $query->row_array();
    }
    
    
    
    // inserta una empresa
    function insert_empresa($fiel, $values)
    {
         $query = $this->db->query("INSERT INTO ".$this->table_name."($fiel) VALUES($values);");
         return $query;
    }
    
    // realiza la consulta de una empresa
    function consult_empresa($condition)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$condition.";");
        return $query->row_array();
    }
    
    // modifica los datos
    function modify_empresa($fiel, $value, $condition)
    {
                
    }
    
    // 
    function estatus()
    {
                
    }
}