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
    
    
    /*
     * Devuelve todos los articulos
     * Autor: Ricardo Quiroga
     */
    public function all()
    {
        $query =$this->db->query('SELECT * FROM articulos');
        return $query->result_array();         
    }
    
    
    /*
     * Obtiene un articulo determinado mediante su ID
     * 
     * Autor: Ricardo Quiroga
     */
     public function get($id) 
     {
        $query =$this->db->query("SELECT * FROM ".$this->table_name." WHERE id_art=".$id);
        return $query->row_array();    
     }    
        
        
    
    
}
