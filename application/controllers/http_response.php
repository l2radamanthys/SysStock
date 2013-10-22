<?php


/*
 * Clase Para devolver consultas em AJAX
 * 
 */
class Http_response extends CI_Controller {
    
    
    /*
     * muestra en un select el listado de ciudades por provincias
     * 
     */
    public function cities_for_state()
    {  
        $this->load->model('ciudades_model');
        if (isset($_POST['id_prov'])) 
        {
            $id_prov = $this->input->post('id_prov');
        }
        else {
            $id_prov = 1;
        }
        $result = $this->ciudades_model->all_by_state($id_prov);
        foreach ($result as $row) 
        {
            echo '<option value="'.$row['id_ciud'].'">'.$row['nombre_ciud'].'</option>';
        }         
    }
    
    
    /*
     * muestra en un select el listado de zonas por ciudad
     */
    public function zones_for_city()
    {
        $this->load->model('zonas_model');
        if (isset($_POST['id_ciud'])) 
        {
            $id_ciud = $this->input->post('id_ciud');
        }
        else {
            $id_ciud = 1;
        }
        $result = $this->zonas_model->all_by_city($id_ciud);
        foreach ($result as $row) 
        {
            echo '<option value="'.$row['id_zona'].'">'.$row['nombre_zona'].'</option>';
        }         
    }
    
}
