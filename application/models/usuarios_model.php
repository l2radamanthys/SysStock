<?php

class Usuarios_model extends CI_Model {
    var $table_name; 
          
    function __construct()  
    { 
        $this->load->database(); 
        $this->table_name = 'Usuarios'; 
    } 
    
    
    /* 
     * Comprueba si existe el usuario $user en caso de que si retornara un array  
     * con los datos correspondiente a la fila, en caso contrario retornara FALSE. 
     *  
     * @param string $user 
     *  
     * @return array or boolean 
     */ 
    public function user_exist($user) 
    { 
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE username_usr='".$user."';"); 
        if ($query->num_rows() != 0) { 
            return $query->row_array();    
        } 
        else { 
            return FALSE; 
        } 
    }    
    
    
    /*
     * Valida usuario y contraseña comparando con los datos en la tabla ademas
     * de actualizar la hora y fecha
     * 
     * @return  
     */
    public function user_validate($user, $pswrd)
    {
        $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE username_usr='".$user."' AND password_usr='".$pswrd."';");
        
    }
    
    
    
    
    /*
     * Inserta un nuevo usuario en la tabla 
     * 
     * @param string $user nombre de usuario
     * @param string $pswrd contraseña de usuario
     * @param string $type tipo de usuario
     * 
     * @return boolean
     */
    public function user_register($user, $pswrd, $type='Vendedor')      
    {
        if (!$this->user_exist($user)) 
        {
            $data = array(
                'username_usr' => $user,
                'password_usr' => $pswrd,
                'tipo_usr' => $type
            );
            return $this->db->insert($this->table_name, $data);
            #return TRUE;
        } 
        else 
        {
	       return FALSE;
        }
    }
}
