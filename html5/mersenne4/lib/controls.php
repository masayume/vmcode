
<?php

function check_workdir($workdir) {
    if ( !is_dir($workdir) ) {
        print "<b>ERROR</b>: work directory defined in config.php doesn't exist: $workdir";
        exit(1);
    }
}  

function check_workfile($workfile) {
    if ( !is_file($workfile) ) {
        print "<b>ERROR</b>: asset configuration file doesn't exist: $workfile";
        exit(2);
    } 
    $file_content = file_get_contents($workfile);
    return $file_content;
}

function check_json($json) {
    if ( is_null($json) ) {
        print "<b>ERROR</b>: this is not a valid JSON configuration file: $workfile";
        exit(3);
    }      
}


