<?php

class Empresas_model extends CI_Model {
    var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'Empresas'; 
        $this-> data =array();
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
    
    /*
     * Registra una nueva empresa
     * 
     * @param $data array
     */
    public function register($data) 
    {
        return $this->db->insert($this->table_name, $data);
    }
    
    
    // realiza la busqueda de empresas con un like
    function search_empresa($campo, $value)
    {        
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$campo." LIKE '%".$value."%';");     
        return $query->row_array();
    }
    
    //realiza la consulta de empresas
    function consult_empresa($campo, $value)
    {
         $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$campo."=".$value.";");     
         return $query->row_array();       
    }
    
    // modifica los datos
    function modify_empresa($data, $condition)
    {
       return $this->db->update($this->table_name, $data, $condition);            
    }
    
   
}