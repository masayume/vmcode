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

  <?php
    
    require('config.php'); 
    echo "<h2> mersenne 4 </h2><p><small>ver. $version </small></p>";

  ?>

<!-- BEGIN LAYERS -->
    <div class="container">

    <?php
      
      require('lib/mersenne4.php'); 
      $layer_types = layer_types();

      // calculate layer images
      require('lib/layer_images.php'); 
      $images = array();
      foreach ($layer_types as $t) {
        array_push($images, layer_images($t));
      }
      
      // calculate html/js layer code and controls
      require('lib/template_functions.php'); 
      $layers_html = layer_code($images);

      echo $layers_html;

    ?>

    </div>
<!-- END LAYERS -->


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

