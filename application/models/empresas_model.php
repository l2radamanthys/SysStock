<?php

class Empresas_model extends CI_Model {
    var $table_name;
    
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'Empresas'; 
    } 
    
    //carga las vistas
    /*
    function index()
    {
        $this -> load ->library('form_validation');
        $this ->load ->view("empresa/registro");
        $this->form_validation->set_rules('razon_social','Razon Social','required');
        $this->form_validation->set_rules('cuit','CUIT','required');
        if ($this -> form_validation ->run() == TRUE) 
        {
            $this ->load ->view('registro_success') ;   
        } 
        else 
        {
            $this ->load ->view('registro');
        }
    }
    */
    
    
    
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
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE id_emp='".$value."';");
        return $query->row_array();
    }
    
    
    
    // inserta una empresa
    function insert_empresa($fiel, $values)
    {
         $query = $this->db->query("INSERT INTO ".$this->table_name."($fiel) VALUES($values);");
         return $query;
    }
    
    // modifica los datos
    function modify_empresa($fiel, $value, $condition)
    {
                
    }
    
    // baja de la empresa, seria un cambio de estado
}