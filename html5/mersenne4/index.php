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

    <!-- PARSE PARAMETERS -->
    <?php
      global $params, $file_content, $json;
      parse_str($_SERVER['QUERY_STRING'], $params);

      require('config.php'); 
      if ( isset($params['atype']) ) { $atype = $params['atype']; }
    ?>

    <!-- PRELIMINARY CONTROLS -->
    <?php
      $workdir = $basedir . $atype;
      if (!is_dir($workdir)) {
        print "<b>ERROR</b>: work directory defined in config.php doesn't exist: $workdir";
        exit(1);
      }
      $workfile = $basedir . $atype . '/' . $atype . '.json';
      if (!is_file($workfile)) {
        print "<b>ERROR</b>: asset configuration file doesn't exist: $workfile";
        exit(2);
      } else {
        $file_content = file_get_contents($workfile);
      }
      $json = json_decode($file_content , true);
      if (is_null($json)) {
        print "<b>ERROR</b>: this is not a valid JSON configuration file: $workfile";
        exit(3);
      }      

    ?>

    <!-- HEADER -->
    <h2> mersenne 4 </h2>
    <?php      
      echo "<div class='version'><small>ver: <b>$version</b> <br>directory: <b>$atype</b></small></div>";
    ?>

    <div class="container">

      <!-- BEGIN LAYERS -->
      <?php

//       print "<pre>"; print_r($_SERVER);
//       var_dump($json);

        require('lib/mersenne4.php'); 
        $layer_types = layer_types($json);

        // calculate layer images
        require('lib/layer_images.php'); 
        $images = array();
        foreach ($layer_types as $t => $val) {
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

