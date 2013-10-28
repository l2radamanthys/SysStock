<?php



class Categorias_model extends CI_Model {
    var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'Categorias'; 
    } 
    
    
    /*
     * Lista todas las categorias Ordenandolas por nombre
     * 
     * @return array 
     */
    public function all() 
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." ORDER BY nombre_cat;");
        return $query->result_array();        
    }    
}
