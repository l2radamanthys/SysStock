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

    
    /*
     * muestra en un select el listado de subcategorias
     * 
     * 
     */
    public function subcat_for_cat() 
    {
        $this->load->model('subcategorias_model');
        if (isset($_POST['id_cat'])) 
        {
            $id_cat = $this->input->post('id_cat');
        }
        else {
            $id_cat = 1;
        }
        $result = $this->subcategorias_model->all_by_cat($id_cat);
        foreach ($result as $row) 
        {
            echo '<option value="'.$row['id_scat'].'">'.$row['nombre_scat'].'</option>';
        }        
    } 

    
    /*
     * Sencillo buscador de Articulos
     * 
     * requiere que se ingrese
     * 
     */ 
    public function search_art($page=0)
    {
        $this->load->model('articulos_model');
        $this->load->helper('utils');
        $data = array();
        
        $query = $this->input->post('query');
        if($query != "") 
        {
            $search = TRUE;
        }
        else 
        {
            $search = FALSE;
        }
        
        //url destino
        $data['label'] = $this->input->post('label');
        $data['url'] = $this->input->post('url');
        
        //se hara busquera o mostrara todo
        if ($search) 
        {
            //$articulos = array();
            $data['articulos'] = $this->articulos_model->all();  
              
        }
        else 
        {
            $data['articulos'] = $this->articulos_model->all(); 
        }
        
        
        #$this->load->view('header', $data);
        
        $this->load->view('httpresponse/search_art', $data);
        
    }
    
    
    /*
     * Buscador Articulos Proveedor
     */
    public function search_art_prov($id_prov)
    {
        
    }

    
    /*
     * Buscador de Articulos que no distribuye un proveedor
     */
    public function search_art_not_prov($id_prov)
    {
        
    }
}




