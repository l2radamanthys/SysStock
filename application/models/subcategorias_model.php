<?php


class Subcategorias_model extends CI_Model {
    var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'SubCategorias'; 
    } 
    
    
    /*
     * Lista todas las categorias Ordenandolas por nombre
     * 
     * @return array 
     */
    public function all_by_cat($id_cat) 
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE fk_id_cat=".$id_cat." ORDER BY nombre_scat;");
        return $query->result_array();        
    }    
}