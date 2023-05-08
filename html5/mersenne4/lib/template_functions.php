<?php

// use layer.twig template to calculate html code for layer images and layer controls
function layer_code($images) {

    // cfr. https://twig.symfony.com/doc/3.x/api.html
    require_once '/usr/share/php/Twig/autoload.php';
    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader, ['debug' => true ]);

    $count = 0;
    $layers_code = "";

    foreach ($images as $img) {

        $count++;
        $imagenum   = 'image' . $count;
        $controlnum = 'controls' . $count;

        $layers_code .= $twig->render('layer.twig', [
            'image_num'     => $imagenum,
            'controls_num'  => $controlnum,
            'image_file'    => $img
        ]);

    }

    return $layers_code;
}
