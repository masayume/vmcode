<html>
<head>
<title>GODOT Pac-Man</title>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet">
<meta charset="UTF-8">
<style>
  body { 
/*	background-image:url('img/ub-wallp.jpg'); 
	background-color: #0033cc;
*/

/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#f3c5bd+0,e86c57+34,e86c57+34,ea2803+51,ff6600+75,c72200+100 */
background: #f3c5bd; /* Old browsers */
background: -moz-linear-gradient(-45deg,  #f3c5bd 0%, #e86c57 34%, #e86c57 34%, #ea2803 51%, #ff6600 75%, #c72200 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg,  #f3c5bd 0%,#e86c57 34%,#e86c57 34%,#ea2803 51%,#ff6600 75%,#c72200 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg,  #f3c5bd 0%,#e86c57 34%,#e86c57 34%,#ea2803 51%,#ff6600 75%,#c72200 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f3c5bd', endColorstr='#c72200',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
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
      $ai_dirs    = array('/var/www/html/inspire/@COVERS/retrocovers/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      // echo "directory: $directory";
      $images     = glob($directory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      echo       "<!-- image:" . $image . "-->";
      # $imagefile  = substr($image, 14);
      $imagefile  = preg_replace('/\/var\/www\/html/', "", $image);
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"300\">";

    ?>


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

  <div class="_exa">

  </div>


  <div class="_exa">

    <h4>PROJECT</h4>
      <ul> 
        <li> <a href="file:///home/masayume/DATA/E/PROJECTS/GODOT/MY_PROJECTS/godot-pac-man/"><b>DOLPHIN: project directory</b></a> </li> 
        <li> <a href="file:///home/masayume/DATA/E/PROJECTS/GODOT/MY_PROJECTS/godot-pac-man/godot_pacman.infogen.txt"><b>DOLPHIN: Infogen file</b></a> </li> 
        <li> <a href="https://chatgpt.com/c/68f251c3-5d6c-832a-924e-04a27a23e3a8"><b>chatGPT tutorial (firefox)</b></a> </li> 
      </ul>  

    <h4>REPOSITORY</h4>
      <ul> 
        <li> <a href="https://github.com/masayume/godot-pac-man"><b>GITHUB: godot-pac-man</b></a> </li> 
      </ul>  

    <h4>TUTORIALS</h4>
      <ul> 
        <li> <a href="https://docs.godotengine.org/en/stable/getting_started/step_by_step/"><b>step by step</b></a> </li> 
        <li> <a href="file:///home/masayume/DATA/E/books/GODOT/"><b>books</b></a> </li> 
      </ul>  
      
    <h4>ASSETS</h4>
      <ul>  
        <li> <a href="https://thegodotbarn.com/"><b>the Godot Barn ★</b></a> </li> 
        <li> <a href="https://lotovik.itch.io/project-character-controller"><b>character controller</b></a> </li> 
        <li> <a href="https://godotengine.org/asset-library/asset"><b>asset library</b></a> </li> 
      </ul>  

    <h4>RESOURCES</h4> <!-- also in INSPIRE, TOOLS -->
    <ul>
      <li> <a href="https://www.spriters-resource.com/"><b>spriters resource ★</b></a> </a></li>
      <li> <a href="https://www.textures-resource.com/"><b>textures resource ★</b></a> </a></li>
      <li> <a href="https://www.masayume.it/blog/content/material-maker"><b>Material Maker ★</b></a> </a></li>
      <li> <a href="https://www.models-resource.com/"><b>models resource ★</b></a> </a></li>
    </ul>

    <h4>SOUND RES.</h4>
    <ul>
      <li> <a href="https://www.sounds-resource.com/"><b>sounds resource ★</b></a> </a></li>
      <li> <a href="https://elevenlabs.io/sound-effects"><b>elevenlabs ★★</b></a> </li>
    </ul>
      
  </div>


  <div class="_exa">
  
      <h4>MAIN LINKS</h4>
      <ul>
        <li> <a href="https://github.com/Calinou/awesome-godot"><b>awesome godot ★</b></a> </li>
        <li> <a href="https://awesomerank.github.io/lists/Calinou/awesome-godot.html"><b>open godot projects ★</b></a> </li>
        <li> <a href="https://dev.to/github/top-five-godot-games-and-source-code-from-game-off-2022-3690"><b>game off 2022</b></a> </li>
      </ul>


      <h4>LINKS</h4>
      <ul>
        <li> <a href="https://www.reddit.com/r/godot/"><b>Reddit Godot</b></a> </li>
        <li> <a href="https://dev.to/t/godot"><b>dev.to godot</b></a> </li>
        <li> <a href="https://www.reddit.com/r/madeWithGodot/"><b>R madeWithGodot</b></a> </li>
        <li> <a href="https://www.reddit.com/t/gdscript/"><b>GDscript</b></a> 
             <a href="https://dev.to/t/gdscript"><b>@dev.to</b></a> </li>
        <li> <a href="https://www.reddit.com/r/gamedev/"><b>Reddit gamedev</b></a> </li>
        <li> <a href="https://livellosegreto.it/tags/godotengine"><b>#godotengine</b></a> </li>
      </ul>

      
      <h4>CODE</h4>
      <ul>
        <li> <a href="https://godbolt.org/z/sbYh6vW8M"><b>Compiler Explorer</b></a> </li>
      </ul>

      
      <h4>ALGORITHMS</h4>
      <ul>
        <li> <a href="https://github.com/tlobig/godot-procedural-generation/tree/godot4update"><b>Godot procgen</b></a> </li>
        <li> <a href="https://www.redblobgames.com"><b>Amit Patel</b></a> </li>
      </ul>
 
      <h4>STYLE</h4>
      <ul>
        <li> <a href="https://www.masayume.it/blog/content/petscii-unaltra-pixel-art"><b>Playscii★</b></a>
             <a href="https://www.masayume.it/blog9/web/taxonomy/term/52"><b>my Style★</b></a> </li>
        <li> <a href="/HTML5/holden/index.php?art1=144&art2=144"><b>TOM GAULD</b></a> </li>
      </ul>

    </div>


  <div class="_exa">
    <h4>PROCESS</h4>
      <ul>
        <li> <a href="/html5/game-dev-process/the-making-of-shovel-knight-specter-of-torment-part-1.htm" target="_blank"><b>Shovel Knight 2 ★★★</b></a> </li>
        <li> <a href="https://www.masayume.it/blog/content/raster-scroll-la-guida-definitiva-alla-grafica-del-megadrive" target="_blank"><b>megadrive VGP ★★</b></a> </li>
        <li> <a href="https://forums.tigsource.com/" target="_blank"><b>tigsource ★</b></a> </li>        
      </ul>


    <h4>TOOLS</h4>
      <ul>
        <li> <a href="https://github.com/ellisonleao/magictools/commits/master"><b>MAGICTOOLS★</b></a> </li>
        <li> <a href="https://whatdoesthiscodedo.com/"><b>WhatTheCode ★</b></a> </li>
        <li> <a href="http://www.taskade.com/spaces/H1316-R3M" target="_blank"><b>TASKADE</b></a> </li>
        <li> <a href='/writing'>writing</a> 
             <a href='/stackedit'>stackedit</a> </li>
        <li> <a href='/training'>training</a> <a href="https://www.masayume.it/training">(rem)</a>
             <a href='https://threejs.org/'>threejs</a> </li>
        <li> <a href='https://www.masayume.it/blog/content/ldtk-level-designer-toolkit'><b>LDtk LVL Design ★</b>  <a href="https://www.masayume.it/blog/content/ldtk-level-designer-toolkit" target="_blank">my</a></a></li>
        </ul>


    <h4>GENERATIVE</h4>
          <ul>
            <li> <a href="https://github.com/topics/generative-art?o=desc&s=stars">repos ★★★</a></li> 
            <li> <a href="https://github.com/marian42/wavefunctioncollapse">wave fn collapse ★</a> </li>
            <li> <a href="https://www.masayume.it/blog9/web/content/markov-jr">markov junior ★</a> </li>
            <li> <a href="https://colab.research.google.com/github/tensorflow/docs/blob/master/site/en/r2/tutorials/sequences/text_generation.ipynb">TF2 textgen ★★★</a> </li>
            <li> <a href="https://twitter.com/ma5ayume/lists/generative">twitter list</a> </li>
          </ul>
    
    <h4>Music & Sound</h4>
    <ul>
      <li> <a href="https://www.masayume.it/blog/content/deflemask"><b>deflemask ★</b></a></li> 
      <li> <a href="/unity.php">on unity page</a></li> 
    </ul>
 
    <h4>GRAPHS</h4> <!-- also on INSPIRE -->
      <ul>
        <li>  <a href="https://abav.lugaralgum.com/sketch-a-day/"><b>Py5 sketch-a-day</b></a>
              <a href="https://www.masayume.it/blog/content/villares-py5-sketch-a-day">my</a> </li>
        <li>  <a href="/HTML5/holden/index.php?art1=190&art2=190"><b>Py5 sketches holden</b></a> </li>
      </ul>


  </div>

  <div class="_exa">
    <img src="/inspire/@COVERS/retrocovers/none-MSX-PLAY-NAMCO-5128550-msx_pac_man.jpg" width="400px"/>  
  </div>

  <br clear="all">

  <div class="_exa">

    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('/var/www/html/inspire/@COVERS/retrocovers/');
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


</div> <!-- container -->

<!-- FOOTER -->
</body>
</html>
