<?php

$config = array(
    'persona' => array(
        array('field' => 'nombre_pers', 'label' => 'Nombre', 'rules' => 'required'),
        array('field' => 'apellido_pers', 'label' =>'Apellido', 'rules' => 'required'),
        array('field' => 'nro_dni_pers', 'label' =>'Numero de Documento', 'rules' => 'numeric'),
        
    ), 
    
    'articulo' => array(
        array('field' => 'nombre_art', 'label' => 'Nombre Articulos', '' => 'required'),
        #array('field' => '', 'label' => '', '' => 'required|numeric'),
        #array('field' => '', 'label' => '', '' => 'required|numeric'),
        #array('field' => '', 'label' => '', '' => 'required|numeric'),
        
    ),
    
);

