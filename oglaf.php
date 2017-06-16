<?php

$oglafiledir 	= '/var/www/html/inspire/@CARTOONS/Oglaf/';

$images = glob($oglafiledir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

$randomImage 	= $images[array_rand($images)]; // See comments

$rndImgUrl 	= $randomImage;

$pattern 	= "/\/var\/www\/html/";
$replacement 	= "";
$rndImgUrl 	=  preg_replace($pattern, $replacement, $rndImgUrl);

print "<img src='$rndImgUrl'>";



