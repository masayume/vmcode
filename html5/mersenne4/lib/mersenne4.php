<?php

function layer_types($json) {

//     $layer_types = array('BKO' ,'BKM' ,'VB' ,'LW' ,'HE' ,'BO' ,'LB' ,'RW');
    $layer_types = $json["layers"];

//    print "<pre>"; var_dump($json["layers"]);

    return $layer_types; 
}

