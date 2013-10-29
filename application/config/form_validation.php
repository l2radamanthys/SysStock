<?php

$config = array(
    'login' => array(
        array('field' => 'username', 'label' => 'Usuario', 'rules' => 'required'),
        array('field' => 'password', 'label' => 'Contraseña', 'rules' => 'required'),
    ),


    'persona' => array(
        array('field' => 'nombre_pers', 'label' => 'Nombre', 'rules' => 'required'),
        array('field' => 'apellido_pers', 'label' =>'Apellido', 'rules' => 'required'),
        array('field' => 'nro_dni_pers', 'label' =>'Numero de Documento', 'rules' => 'numeric'),
        
    ), 
    
    'articulo' => array(
        array('field' => 'nombre_art', 'label' => 'Nombre Articulos', 'rules' => 'required'),        
        array('field' => 'precio_costo_art', 'label' => 'Precio Costo Articulo', 'rules' => 'required|numeric'),
        array('field' => 'precio_venta_art', 'label' => 'Precio de Venta', 'rules' => 'required|numeric'),
        array('field' => 'precio_venta_lista_art', 'label' => 'Precio de Lista', 'rules' => 'required|numeric'),
        #array('field' => '', 'label' => '', 'rules' => 'required'),
        
    ),
    
);

