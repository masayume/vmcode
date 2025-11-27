<html>
<head>
<title>GODOT SOLOMON</title>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet">
<meta charset="UTF-8">
<style>
  body { 
/*	background-image:url('img/ub-wallp.jpg'); 
	background-color: #0033cc;
*/

/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#b4ddb4+0,83c783+17,52b152+33,008a00+67,005700+83,002400+100;Green+3D+%231 */
background: linear-gradient(to bottom,  #b4ddb4 0%,#83c783 17%,#52b152 33%,#008a00 67%,#005700 83%,#002400 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
background: #f3c5bd; /* Old browsers */
background: -moz-linear-gradient(-45deg,  #b4ddb4 0%, #83c783 17%, #52b152 33%, #008a00 67%, #005700 83%, #002400 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg,  #b4ddb4 0%,#83c783 17%,#52b152 33%,#008a00 67%,#005700 83%,#002400 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg,  #f3c5bd 0%,#b4ddb4 34%,#83c783 17%,#52b152 33%,#008a00 67%,#005700 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b4ddb4', endColorstr='#002400',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
  }
  a, a:visited {  color: #ffffff; }
  h3, h4 {  color: #002244; }
  .container{ text-align:left; border:1px solid #666; }
  ._img{ display:inline-block; margin:5px 20px; padding:5px; border:1px solid #CCC; }
  ._text{ display:inline-block; margin:5px 20px; padding:5px; border:1px solid #CCC; top: 0px; }
  ._exa{ display:inline-block; margin:5px 6px; padding:5px; border:1px solid #CCC; top: 0px; vertical-align: text-top;}
</style>

</head>
<body>
<div class="container-fluid">

  <div class="_exa">

    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('/var/www/html/inspire/PROJECTS/solomon-reference/@REFERENCES/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      // echo "directory: $directory";
      $images     = glob($directory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      echo       "<!-- image:" . $image . "-->";
      # $imagefile  = substr($image, 14);
      $imagefile  = preg_replace('/\/var\/www\/html/', "", $image);
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"300\">";

    ?>

  </div>


  <div class="_exa">
    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('/var/www/html/inspire/@CARTOONS/mosqi/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      // echo "directory: $directory";
      $images     = glob($directory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      echo       "<!-- image:" . $image . "-->";
      # $imagefile  = substr($image, 14);
      $imagefile  = preg_replace('/\/var\/www\/html/', "", $image);
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"400\">";

    ?>
    <br /><a href="https://livellosegreto.it/@Mosqi@mastodon.gamedev.place">@Mosqi@mastodon</a>
  </div>

  <div class="_exa">

    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('/var/www/html/inspire/PROJECTS/solomon-reference/@REFERENCES/art/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      // echo "directory: $directory";
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      echo       "<!-- image:" . $image . "-->";
      # $imagefile  = substr($image, 14);
      $imagefile  = preg_replace('/\/var\/www\/html/', "", $image);
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"300\">";

    ?>

  </div>

  <div class="_exa">
    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('/var/www/html/inspire/@CARDS/LOST_ARCANA/style-illuminated_manuscript/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      // echo "directory: $directory";
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      echo       "<!-- image:" . $image . "-->";
      # $imagefile  = substr($image, 14);
      $imagefile  = preg_replace('/\/var\/www\/html/', "", $image);
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"400\">";

    ?>

  </div>

  <div class="_exa">

    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('/var/www/html/inspire/PROJECTS/solomon-reference/@REFERENCES/block-refs/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      // echo "directory: $directory";
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      echo       "<!-- image:" . $image . "-->";
      # $imagefile  = substr($image, 14);
      $imagefile  = preg_replace('/\/var\/www\/html/', "", $image);
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"300\">";

    ?>

  </div>

  <div class="_exa">

    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('/var/www/html/inspire/PROJECTS/solomon-reference/@REFERENCES/block-decoration-refs/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      // echo "directory: $directory";
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      echo       "<!-- image:" . $image . "-->";
      # $imagefile  = substr($image, 14);
      $imagefile  = preg_replace('/\/var\/www\/html/', "", $image);
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"300\">";

    ?>

  </div>

  <div class="_exa">

    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('/var/www/html/inspire/PROJECTS/solomon-reference/@REFERENCES/splash-refs/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      // echo "directory: $directory";
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      echo       "<!-- image:" . $image . "-->";
      # $imagefile  = substr($image, 14);
      $imagefile  = preg_replace('/\/var\/www\/html/', "", $image);
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"300\">";

    ?>

  </div>

  <div class="_exa">

    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('/var/www/html/inspire/@pixelart/GUI/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      // echo "directory: $directory";
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      echo       "<!-- image:" . $image . "-->";
      # $imagefile  = substr($image, 14);
      $imagefile  = preg_replace('/\/var\/www\/html/', "", $image);
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"300\">";

    ?>

  </div>


<!--
  <br />
      <h4>PAGES</h4>
          <ul>
            <li> <a href="/html5/isotope/isotope-projects/"><b>ISO Projects ★★</b></a>
                 &nbsp; &nbsp;
                 <a href="https://github.com/masayume/DigitalGarden/tree/main/engineering-code/godot"><b>Godot DG</b></a>
                 &nbsp; &nbsp;
                 <a href="/HTML5/holden/index.php?art1=14&art2=14&tag1=-PLAY-&tag2=-PLAY-"><b>COVERS</b></a></li> 
          </ul>  
      <h4>MAGAZINES</h4>
          <ul>
            <li> <a href="/retro.htm"><b>Retro★</b></a> -
                 <a href="https://www.masayume.it/blog/content/retro-riviste"><b>Riviste★</b></a> -
                 <a href="https://www.masayume.it/blog/content/retro-covers-mega-thread"><b>Covers★</b></a> -
                 <a href="/HTML5/holden/index.php?folder=@COVERS/commodore&id=1"><b>C64 Covers</b></a></li> 
          </ul>  
  </div>
-->


</div> <!-- container -->

<!-- FOOTER -->
</body>
</html>
