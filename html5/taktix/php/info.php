<?php

// load js/jlpt4.js

$file2load 	= '../js/' . $_GET['file'];

$info 		= file_get_contents($file2load);

echo $info;

exit(0);

