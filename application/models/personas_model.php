<?php

class Personas_model extends CI_Model {
    var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'Personas'; 
    } 
    
    
    /*
     * Devuelve un unico registro de coincidencia exacta, con el campo que se
     * compara. Retornara el registro resultante o FALSE en caso que no ubiese 
     * ninguna coincidencia 
     * 
     * @param string $field nombre del campo
     * @param string $value valor del campo a comparar
     * 
     * @return array OR Boolean  
     */
    function get_persom($field, $value)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$field."='".$value."';");
        return $query->row_array();
    }
    
    
    function get_persom_by_user($user)
    {
        return $this->get_persom('fk_username_usr',$user);
    }
    
}
