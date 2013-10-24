<?php

/*
 * Remplaza un valor '' por NULL
 * 
 * Author: Ricardo Quiroga
 */
function blanc_to_null($val) 
{
    if ($val == '') 
    {
        $val = NULL;    
    }
    return $val;
}


/*
 * Genera un tag de inclusion css
 */
function css_include($style)
{    
    return '<link rel="stylesheet" media="all"  href="'.base_url().'/media/styles/'.$style.'" />';
}


function bool_to_str($val)
{
    if ($val == TRUE)
    {
        return "Si";
    }    
    else 
    {
        return "No";
    }
}
