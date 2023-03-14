<?php

if(!function_exists('get_formated_date')){

    function get_formated_date($date, $format){

        $formated_datde = date($format,strtotime($format));
        return $formated_datde;

    }
}

?>
