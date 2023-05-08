<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>mersenne 4</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <!-- https://fontawesome.com/v4/icons/ -->
  </head>
  <body>
    <p>mersenne 4</p>

<?php

// cfr. https://twig.symfony.com/doc/3.x/api.html
require_once '/usr/share/php/Twig/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, ['debug' => true ]);

?>

    <div class="container">

    <?php
      echo $twig->render('layer.twig', [
        'image_num'     => 'image1',
        'controls_num'  => 'controls1',
        'image_file'    => '/demon/mersenne/mabius/mabius_O_BKO_1_001.png'
      ]);
    ?>

    <?php
      echo $twig->render('layer.twig', [
        'image_num'     => 'image2',
        'controls_num'  => 'controls2',
        'image_file'    => '/demon/mersenne/mabius/mabius_O_BKM_1_002.png'
      ]);
    ?>

    <?php
      echo $twig->render('layer.twig', [
        'image_num'     => 'image3',
        'controls_num'  => 'controls3',
        'image_file'    => '/demon/mersenne/mabius/mabius_O_VB_1_017.png'
      ]);
    ?>

    <?php
      echo $twig->render('layer.twig', [
        'image_num'     => 'image4',
        'controls_num'  => 'controls4',
        'image_file'    => '/demon/mersenne/mabius/mabius_O_LW_1_0251.png'
      ]);
    ?>

    <?php
      echo $twig->render('layer.twig', [
        'image_num'     => 'image5',
        'controls_num'  => 'controls5',
        'image_file'    => '/demon/mersenne/mabius/mabius_O_HE_1_0042.png'
      ]);
    ?>

    <?php
      echo $twig->render('layer.twig', [
        'image_num'     => 'image6',
        'controls_num'  => 'controls6',
        'image_file'    => '/demon/mersenne/mabius/mabius_O_BO_1_0271.png'
      ]);
    ?>

    <?php
      echo $twig->render('layer.twig', [
        'image_num'     => 'image7',
        'controls_num'  => 'controls7',
        'image_file'    => '/demon/mersenne/mabius/mabius_O_LB_1_0393.png'
      ]);
    ?>

    <?php
      echo $twig->render('layer.twig', [
        'image_num'     => 'image8',
        'controls_num'  => 'controls8',
        'image_file'    => '/demon/mersenne/mabius/mabius_O_RW_1_034.png'
      ]);
    ?>


      <div class="image-container">
        <img id="image8" src="/demon/mersenne/mabius/mabius_O_RW_1_034.png">
        <div class="controls8">
          <button onclick="reloadImage('image8')"><i class="fa fa-refresh fa-2x" aria-hidden="true"></i></button>
          <button onclick="changeSize('image8', 0.5)"><i class="fa fa-search-minus fa-2x" aria-hidden="true"></i></button>
          <button onclick="changeSize('image8', 2)"><i class="fa fa-search-plus fa-2x" aria-hidden="true"></i></button>
          <button onclick="changeColor('image8', 'grayscale')">Grayscale</button>
          <button onclick="changeColor('image8', 'sepia')">Sepia</button>
        </div>
      </div>


    </div>

<div>
  <p>
    <a href="https://fontawesome.com/v4/icons/" target="_blank">fontawesome search</a>
  </p>
</div>

<script>
      function reloadImage(id) {
        var img = document.getElementById(id);
        img.src = img.src + '?' + new Date().getTime(); // add timestamp to force reload
      }
      
      function changeSize(id, scale) {
        var img = document.getElementById(id);
        img.style.transform = 'scale(' + scale + ')';
      }
      
      function changeColor(id, filter) {
        var img = document.getElementById(id);
        img.style.filter = filter;
      }
    </script>
  </body>
</html>

