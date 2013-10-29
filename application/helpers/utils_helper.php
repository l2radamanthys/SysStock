<?php

/*
 * Remplaza un valor en caso que sea una cadena vacia '' por NULL 
 * Author: Ricardo Quiroga
 * 
 * @param string $val
 * @return NULL OR string
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
 * Completa con un caracter a eleccion, en caso de recivirse una cadena vacia
 * 
 * Autor: Ricardo Quiroga
 * 
 * @param string $var
 * @param string $char
 * @param int $lenght
 */ 
function complete_char($var, $char='-', $lenght=6)
{
    if ($var == '' OR $var == NULL)
    {
        $str = "";
        $i=0;
        while ($i < $lenght)
        {
            $str .= $char;
            $i++;
        }
        return $str;
    }
    else 
    {
        return $var; 
    }
}



/*
 * Genera un tag de inclusion css pasando 
 * 
 * @param string $style    
 * @return string
 */
function css_include($style)
{    
    return '<link rel="stylesheet" media="all"  href="'.base_url().'/media/styles/'.$style.'" />';
}


/*
 * Convierte un resultado Booleano en un string legible por personas
 * Author: Ricardo Quiroga
 * 
 * @param boolean $val
 * @return string 
 */
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
