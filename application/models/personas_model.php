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
     * Autor: Ricardo Quiroga
     * 
     * @param string $field nombre del campo
     * @param string $value valor del campo a comparar   
     * @return array OR Boolean  
     */
    public function get_person($field, $value)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$field."='".$value."';");
        return $query->row_array();
    }
    
    
    /*
     * Obtiene la primera fila resultante mediante busqueda por usuario
     * 
     * Autor: Ricardo Quiroga
     */
    public function get_person_by_user($user)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE  fk_username_usr='".$user."';");
        return $query->row_array();
    }
    
    
    /*
     * Obtiene los Datos de la Persona desde la Vista que mescla los datos 
     * persona con los de la Empresa
     * 
     * Autor: Ricardo Quiroga
     */ 
    public function get_person_by_id($id)
    {
        $query = $this->db->query("SELECT * FROM personaempresa WHERE id_pers=".$id.";");        
        return $query->row_array();
        #return $this->get_person('id_pers', $id);
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
        $query = $this->db->query("UPDATE ".$this->table_name." SET ".$campo."WHERE ".$condicion.";" );
        return $query;
    }
    

    /*
     * Registra una nueva persona
     * 
     * Author: Ricardo Quiroga
     * 
     * @param array $data diccionario asociativo con los campos a insertar
     */
    public function register_person($data) 
    {
        return $this->db->insert($this->table_name, $data);
    }


    /*
     * Muestra Todas Las Personas sin discriminar si son clientes o proveedores
     * 
     * Autor: Ricardo Quiroga
     */ 
    public function all()
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name);
        return $query->result_array();
    }
    
    
    /*
     * Muestra todos los que esten marcado como clientes
     * 
     * Autor: Ricardo Quiroga
     */ 
    public function all_clients()
    {
        $query = $this->db->query("SELECT * FROM personaempresa WHERE es_cliente_pers = 1");
        return $query->result_array();
    }
    

    /*
     * Muestra todos los que esten marcados com Proveedor
     * 
     * Autor: Ricardo Quiroga
     */     
    public function all_proveedors()
    {
        $query = $this->db->query("SELECT * FROM personaempresa WHERE es_proveedor_pers = 1");
        return $query->result_array();
    }
    
    
    /*
     * Utiliza la busqueda sobre la vista mediante parecido osea LIKE
     * para buscar CLiente
     * 
     * Autor: Ricardo Quiroga
     */ 
    public function find_client($key, $val) {
        $query = $this->db->query("SELECT * FROM personaempresa WHERE ".$key." LIKE '%".$val."%' AND es_cliente_pers = 1;");
        return $query->result_array(); 
    }


    /*
     * Utiliza la busqueda sobre la vista mediante parecido osea LIKE
     * para buscar Proveedores
     * 
     * Autor: Ricardo Quiroga
     * 
     */ 
    public function find_proveedors($key, $val) {
        $query = $this->db->query("SELECT * FROM personaempresa WHERE ".$key." LIKE '%".$val."%' AND es_proveedor_pers = 1;");
        return $query->result_array(); 
    }

    
    // realiza la insercion de datos
    function insert_person($fiel, $value)
    {        
        $query = $this->db->query("INSERT INTO ".$this->table_name."($fiel) VALUES ($value);");   
        return $query;
    }
    
    
    /*
     * Actualiza un campo de un registro por id
     * Autor: Ricardo Quiroga 
     */
    public function update_person_field($id_pers, $field, $val)
    {
        $data = array($field => $val);
        $this->db->where('id_pers', $id_pers);
        return $this->db->update($this->table_name, $data);
    }    
}


