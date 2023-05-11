<?php

function layer_types($json, $jstruct = "") {

    $layer_types = Array();

    if ($jstruct) {
        $layer_types = $json["structs"][$jstruct]["layers"];
    } else {
        $layer_types = $json["layers"];
    }


    // print "<pre>"; var_dump($json["structs"]); exit(0);

    return $layer_types; 
}

