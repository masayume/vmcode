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
      global $params, $file_content, $json, $workdir, $atype, $subtype, $jstruct;
      parse_str($_SERVER['QUERY_STRING'], $params);

      require('config.php'); 
      if ( isset($params['atype']) ) { $atype = $params['atype']; }
      if ( isset($params['jstruct']) ) { $jstruct = $params['jstruct']; }
      if ( isset($params['subtype']) ) { $subtype = $params['subtype']; }
      if (!$subtype) { $subtype = "A"; }
    ?>

    <!-- PRELIMINARY CONTROLS -->
    <?php

      require('lib/controls.php'); 

      $workdir = $basedir . $atype;
      check_workdir($workdir);

      $workfile = $basedir . $atype . '/' . $atype . '.json';
      $file_content = check_workfile($workfile);

      $json = json_decode($file_content , true);
      check_json($json);

    ?>


    <!-- BEGIN HEADER -->
    <div class="mersenne">
    <h2> mersenne 4 </h2>
    </div>

    <?php      
      echo "<div class='version'><small>ver: <b>$version</b> <br>directory: <b>$atype</b></small></div>";
    ?>
    <!-- END HEADER -->


    <div class="container">

      <!-- BEGIN LAYERS -->
      <?php

//       print "<pre>"; print_r($_SERVER);
//       var_dump($json);

        require('lib/mersenne4.php'); 
        $layer_types = Array();
        if ($jstruct){
          $layer_types = layer_types($json, $jstruct);
        } else {
          $layer_types = layer_types($json);
        }

        // calculate layer images
        require('lib/layer_images.php'); 
        $images = array();
        foreach ($layer_types as $t => $val) {
          $images[$t] = find_layer_images($atype, $subtype, $t, $workdir);
        }
        
        // calculate html/js layer code and controls
        require('lib/template_functions.php'); 
        $layers_html = layer_code($images);

        echo $layers_html;

      ?>
      <!-- END LAYERS -->

</div>

<!-- JAVASCRIPT FUNCTIONS -->
<script src="js/functions.js"></script>

<div class="messages">
  <textarea id="messages">
  </textarea>

  <script>
        selectStringOnClick('messages');
  </script>
</div>

<div>
  <p>
    <ul>    
      <li><a href="https://fontawesome.com/v4/icons/" target="_blank">fontawesome search</a></li>
      <li><a href="README.txt" target="_blank">README.txt</a></li>
  </p>
</div>


  </body>
</html>

