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

    <h2> mersenne 4 </h2>
    <?php      
      require('config.php'); 
      echo "<div class='version'><small>ver. $version </small></div>";
    ?>

    <div class="container">

      <!-- BEGIN LAYERS -->
      <?php
        
        require('lib/mersenne4.php'); 
        $layer_types = layer_types();

        // calculate layer images
        require('lib/layer_images.php'); 
        $images = array();
        foreach ($layer_types as $t) {
          // array_push($images, layer_images($t));
          $images[$t] = layer_images($t);
        }
        
        // calculate html/js layer code and controls
        require('lib/template_functions.php'); 
        $layers_html = layer_code($images);

        echo $layers_html;

      ?>
      <!-- END LAYERS -->

</div>


<div>
  <p>
    <ul>    
      <li><a href="https://fontawesome.com/v4/icons/" target="_blank">fontawesome search</a></li>
      <li><a href="README.txt" target="_blank">README.txt</a></li>
  </p>
</div>

<script src="js/functions.js"></script>

  </body>
</html>

