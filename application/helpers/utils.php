<?php

/*
 * carga los datos de post, de los campos solicitados
 */
function create_post_dict($keys) {
    $data = array();
    $ci =& get_instance();
    foreach ($keys as $key) {
        $data[$key] = $ci->input->post($key);
    }    
    return $data;
    
}
