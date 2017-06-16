<?php

$oglafiledir 	= '/var/www/html/inspire/@CARTOONS/Oglaf'

$images = glob($oglafiledir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

$randomImage = $images[array_rand($images)]; // See comments

print $randomImage;



