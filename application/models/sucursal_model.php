<?php
/***********************************************
 * Modelo de sucursales
 */

 class Sucursal_model extends CI_Controller
 {
     // Sucursal
     function __construct()
     {         
       // $this->load->database(); 
        $this-> table_name = 'sucursal'; 
        $this-> fk_id_emp =0;
        $this-> data =array();      
     }
     
     // registra una nueva sucursal
     function new_sucursal($data)
     {
         return $this->db->insert($this->table_name, $data);
     }
     
     // realiza la consulta de sucursal
     function consult_sucursal($condition)
     {
         if($condition == "")
         {
             $query = $this->db->query("SELECT * FROM ".$this->table_name.";");  
         }
         else
         {
           $query = $this->db->query("SELECT * FROM ".$this->table_name." WHERE ".$condition.";");   
         }        
         return $query;
     }
     
     // obtiene todas las sucursales
     function get_sucursal()
     {
         $query =$this->db->query("SELECT * FROM ".$this->table_name."  WHERE ");
         return $query;
     }
          
     
     // modifica datos de una sucursal
     function modify_sucursal()
     {
         return $this->db->update($this->table_name, $this->data, "fk_id_emp=".$this-> fk_id_emp." AND id_suc=".$this-> data['id_suc'].";");
     }
     
     // elimina una sucursal, hay que ver si cambiarla de estado o no
     function delete_sucursal($id)
     {         
        return $this->db->delete($this->table_name,"id_suc=".$id);   
     }
 }

?>