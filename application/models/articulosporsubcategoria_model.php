<?php

class Articulosporsubcategoria_model extends CI_Model {
    var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'ArticulosPorSubcategoria'; 
        
        parent::__construct();
    }     
    
    
    /*
     * Registra una sub categoria para un articulo
     */
    public function register($data)
    {
        return $this->db->insert($this->table_name, $data);
    }
    
    
    /*
     * Retorna una Lista con todas las subcategorias de un articulo
     */
    public function filter($id_art)
    {
        $query = $this->db->query("SELECT * FROM ArticulosCategoria WHERE fk_id_art=".$id_art);
        return $query->result_array();
    }
    
    
} 