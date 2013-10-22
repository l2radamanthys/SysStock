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
    function get_person($field, $value)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$field."='".$value."';");
        return $query->row_array();
    }
    
    
    function get_person_by_user($user)
    {
        return $this->get_person('fk_username_usr',$user);
    }
    
    
    // realiza cambios  en la entidad persona
    function modify_person($fiel, $value,$condicion)
    {
        $campo ="";
        foreach ($fiel as $i ) 
        {
            $campo = $fiel[$i]." = ".$value[$i].",";
        }
        $campo = substr($campo, 0,-1);        
        $query = $this -> db -> query("UPDATE ".$this->table_name." SET ".$campo."WHERE ".$condicion.";" );
        return $query;
    }
    
    // realiza la insercion de datos
    function insert_person($fiel, $value)
    {        
        $query = $this -> db -> query("INSERT INTO ".$this->table_name."($fiel) VALUES ($value);");   
        return $query;
    }
}


