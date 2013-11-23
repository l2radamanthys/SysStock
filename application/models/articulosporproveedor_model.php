<?php

class Articulosporproveedor_model extends CI_Model {
     var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'ArticulosPorProveedor'; 
    } 
        
         
    /*
     * Registrar Articulo por Proveedor
     * 
     * Autor: Ricardo Quiroga
     * 
     * @param array $data
     * @return boolean 
     */
    public function register($data) 
    {
        return $this->db->insert($this->table_name, $data);
    }
    
    
    /*
     * Retorna todos los articulos coincidentes con el Proveedor
     * 
     * Autor: Ricardo Quiroga
     * 
     * @param $id_prov
     */
    public function filter_art($id_prov)
    {
        $query = $this->db->query("SELECT * FROM ArticulosProveedor WHERE id_pers =".$id_prov);
        return $query->result_array();
    }
    
    
    
}
