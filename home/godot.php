<html>
<head>
<title>GODOT</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">
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
      $ai_dirs    = array('inspire/@COVERS/BookCovers/Godot/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      // echo "directory: $directory";
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,svg,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      $imagefile  = $image;
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
            <li> <a href="/HTML5/holden/index.php?art1=194&art2=194"><b>Godot Book Covers</b></a>  </li>

          </ul>  
  </div>

  <div class="_exa">

  </div>


  <div class="_exa">

    <h4>DOWNLOAD</h4>
      <ul> 
        <li> <a href="https://godotengine.org/download/linux/"><b>linux version</b></a> </li> 
      </ul>  

    <h4>TUTORIALS</h4>
      <ul> 
        <li> <a href="https://www.kimi.com"><b>Kimi AI ★</b></a> </li> 
        <li> <a href="https://docs.godotengine.org/en/stable/getting_started/step_by_step/"><b>step by step</b></a> </li> 
        <li> <a href="file:///home/masayume/DATA/E/books/GODOT/"><b>books</b></a> </li> 
      </ul>  
      
    <h4>ASSETS</h4>
      <ul>        
        <li> <a href="https://godotengine.org/asset-library/asset"><b>Godot Asset Lib ★</b></a> </li> 
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

  </div>


  <div class="_exa">
    <h4>MY PROJECTS</h4>
      <ul> 
        <li> <a href="/godot/pacman.php"><b>Pac-Man</b></a> </li>  
        <li> <a href="/godot/solomon.php"><b>Solomon</b></a> </li>  
        <li> <a href="/godot/pengo.php"><b>Pengo</b></a> </li>  
      </ul>

    <h4>GAME IDEAS</h4>
    <ul>
      <li> <a href="/HTML5/holden/index.php?art1=134&art2=134&tag1=AIGAME&tag2=AIGAME" title="Ideas for Games about AI"><b>GAMES on AI★</b></a> </a></li>
      <li> <a href="/HTML5/holden/index.php?art1=14&art2=14&tag1=4GODOT&tag2=4GODOT" title="Godot Remakes to do"><b>4GODOT★</b></a> </a></li>
    </ul>

 
    <h4>GRAPHS</h4> <!-- also on INSPIRE -->
      <ul>
        <li>  <a href="https://abav.lugaralgum.com/sketch-a-day/"><b>Py5 sketch-a-day</b></a>
              <a href="https://www.masayume.it/blog/content/villares-py5-sketch-a-day">my</a> </li>
        <li>  <a href="/HTML5/holden/index.php?art1=190&art2=190"><b>Py5 sketches holden</b></a> </li>
      </ul>      

      <h4>MAGAZINES</h4>
          <ul>
            <li> <a href="/retro.htm"><b>Retro★</b></a> </li>
            <li> <a href="https://www.masayume.it/blog/content/retro-riviste"><b>Riviste★</b></a> </li>
            <li> <a href="https://www.masayume.it/blog/content/retro-covers-mega-thread"><b>Covers★</b></a> </li>
            <li> <a href="/HTML5/holden/index.php?folder=@COVERS/commodore&id=1"><b>C64 Covers</b></a></li> </li>
          </ul>  

    <h4>JSON</h4>
      <ul>
        <li> <a href="https://j-brooke.github.io/FracturedJson/"><b>FracturedJson</b></a> </li>
      </ul>

<!-- 
      <h4>STYLE</h4>
      <ul>
        <li> <a href="https://www.masayume.it/blog/content/petscii-unaltra-pixel-art"><b>Playscii★</b></a>
             <a href="https://www.masayume.it/blog9/web/taxonomy/term/52"><b>my Style★</b></a> </li>
        <li> <a href="/HTML5/holden/index.php?art1=144&art2=144"><b>TOM GAULD</b></a> </li>
      </ul>
-->

    </div>


  <div class="_exa">
    <h4>PROCESS ★</h4>
      <ul>
        <li> <a href="https://www.masayume.it/blog/content/game-feel-improvement" target="_blank"><b>Game Feel ★★★</b></a> </li>
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

  </div>



  <div class="_exa">

    <details>
      <summary><strong><h3><b>GODOT links ⬇️</b></h3></strong></summary> <!-- ALSO on INSPIRE,UNITY,PIXELART,TOOLS -->
      <ul>
        <li> <a href="https://github.com/Calinou/awesome-godot"><b>awesome godot ★</b></a> </li>
        <li> <a href="https://awesomerank.github.io/lists/Calinou/awesome-godot.html"><b>open godot projects ★</b></a> </li>
        <li> <a href="https://dev.to/github/top-five-godot-games-and-source-code-from-game-off-2022-3690"><b>game off 2022</b></a> </li>
        <li> <a href="https://www.reddit.com/r/godot/"><b>Reddit Godot</b></a> </li>
        <li> <a href="https://dev.to/t/godot"><b>dev.to godot</b></a> </li>
        <li> <a href="https://www.reddit.com/r/madeWithGodot/"><b>R madeWithGodot</b></a> </li>
        <li> <a href="https://www.reddit.com/t/gdscript/"><b>GDscript</b></a> 
             <a href="https://dev.to/t/gdscript"><b>@dev.to</b></a> </li>
        <li> <a href="https://www.reddit.com/r/gamedev/"><b>Reddit gamedev</b></a> </li>
        <li> <a href="https://livellosegreto.it/tags/godotengine"><b>#godotengine</b></a> </li>
      </ul>

    </details>

    <details>
      <summary><strong><h3><b>PYTHON ⬇️</b></h3></strong></summary> <!-- ALSO on INSPIRE,UNITY,PIXELART,TOOLS -->
      <ul>
        <li> <a href="https://realpython.com/"><b>Real Python</b></a></li> 
          <li> <a href="https://realpython.com/tutorials/web-scraping/"><b>web scraping</b></a></li> 
          <li> <a href="https://realpython.com/tutorials/gamedev/"><b>game dev</b></a></li> 
          <li> <a href="https://realpython.com/tutorials/data-structures/"><b>data structures</b></a></li> 
          <li> <a href="https://realpython.com/tutorials/best-practices/"><b>best practices</b></a></li> 
          <li> <a href="https://realpython.com/tutorials/ai/"><b>python & AI</b></a></li> 
          <li> <a href="https://realpython.com/tutorials/flask/"><b>flask</b></a></li> 
          <li> <a href="https://realpython.com/tutorials/tools/"><b>dev tools</b></a></li> 
          <li> <a href="https://realpython.com/tutorials/web-dev/"><b>deb dev</b></a></li> 
          <li> <a href="https://realpython.com/get-started-with-fastapi/"><b>FastAPI</b></a></li> 
      </ul>

    </details>

    <details>
      <summary><strong><h3><b>SHADERS ⬇️</b></h3></strong></summary> <!-- ALSO on INSPIRE,UNITY,PIXELART,TOOLS -->
      <ul>
         <li> <a href="/HTML5/holden/index.php?art1=202&art2=202"><b>Holden Gallery</b></a> </li>
         <li> <a href="https://danielchasehooper.com/posts/code-animated-rick/"><b>Learn Shaders★</b></a></li> 
         <li> <a href="https://godotshaders.com/"><b>Godot Shaders</b></a></li> 
         <li> <a href="https://inspirnathan.com/topics/shaders"><b>Shaders 101</b></a></li> 
         <li> <a href="https://github.com/gtibo/VFX-sketchbook-Godot-4.x?tab=readme-ov-file"><b>VFX sketchbook</b></a></li> 
         <li> <a href="https://www.masayume.it/blog9/web/content/shader-introduction"><b>Shaders Intro</b></a></li> 
         <li> <a href="https://thebookofshaders.com/">book of shaders</a></li> 
         <li> <a href="https://github.com/patriciogonzalezvivo/thebookofshaders">github</a> - <a href="http://tor.thebookofshaders.com/">editor</a> </li>

         <li> <a href="https://www.shadertoy.com/"><b>shadertoy ★</b></a></li> 
         <li> <a href="https://www.sleditor.com/#id=1woyjcot9"><b>sleditor ★</b></a></li> 
         <li> <a href="https://twigl.app/"><b>Twigl</b></a> 
              <a href="https://codesandbox.io/p/sandbox/hydra-shader-9ru5hj"><b>hydra</b></a> </li> 

         <li> <details>
                <summary><strong><b>SHADER AUTHORS ⬇️</b></strong></summary> <!-- ALSO on INSPIRE,UNITY,PIXELART,TOOLS -->
                <p>
                  <ul>
                    <li> <a href="https://livellosegreto.it/@diatribes@mastodon.social"><b>diatribes★</b></a></li> 
                  </ul>
                </p>
              </details>
          </li>  
      </ul>
    </details>

    <details>
      <summary><strong><h3><b>CODE ⬇️</b></h3></strong></summary> <!-- ALSO on INSPIRE,UNITY,PIXELART,TOOLS -->
      <ul>
        <li> <a href="https://godbolt.org/z/sbYh6vW8M"><b>Compiler Explorer</b></a> </li>
        <li> <a href="https://deepwiki.com/" title="Which repo would you like to understand?"><b>DeepWiki Repo</b></a> </li>
        <li> <a href="https://github.com/tlobig/godot-procedural-generation/tree/godot4update"><b>Godot procgen</b></a> </li>
        <li> <a href="https://www.redblobgames.com"><b>Amit Patel</b></a> </li>
      </ul>

    </details>

    <h4>MUSIC & SOUND</h4>
    <ul>
      <li> <a href="https://www.masayume.it/blog/content/deflemask"><b>deflemask ★</b></a></li> 
      <li> <a href="https://castpixel.itch.io/animevox">animevox ★</a></li> 
      <li> <a href="https://www.sounds-resource.com/"><b>sounds resource ★</b></a> </a></li>
      <li> <a href="https://elevenlabs.io/sound-effects"><b>elevenlabs ★★</b></a> </li>
      <!-- <li> <a href="/unity.php">on unity page</a></li> -->
    </ul>

    <!-- https://dev.to/whitep4nth3r/how-to-build-an-html-only-accordion-no-javascript-required-4jc4 -->
    <details>
      <summary><strong><b>DIFFUSION MODELS ⬇️</b></strong></summary> <!-- ALSO on INSPIRE,UNITY,PIXELART,TOOLS -->
      <p>
        <ul>
          <li> <a href="https://huggingface.co/spaces?sort=likes"><b>huggingface spaces ★★</b></a></li> 
          <li> <a href="https://lexica.art/"><b>lexica.art ★★</b></a></li> 
          <li> <a href="https://libraire.ai/"><b>libraire.ai ★★</b></a></li> 
          <li> <a href="https://huggingface.co/hakurei/waifu-diffusion"><b>waifu diffusion ★★</b></a></li>
          <li> <a href="https://huggingface.co/spaces/akhaliq/AnimeGANv2"><b>AnimeGANv2 ★</b></a></li>
          <li> <a href="https://huggingface.co/spaces/stabilityai/stable-diffusion"><b>stablediffusion 🤗★</b></a>
               <a href="https://stablediffusionweb.com/"><b>site</b></a></li>
          <li> <a href="https://twitter.com/hashtag/stablediffusion"><b>#stablediffusion★</b></a></li>  
          <li> <a href="https://twitter.com/hashtag/NovelAIDiffusion?src=hashtag_click&f=live"><b>#NovelAIDiff★</b></a>
               <a href="https://twitter.com/hashtag/NovelAI?src=hashtag_click&f=live"><b>#NovelAI★</b></a></li>  
          <li><a href="https://discord.com/channels/662267976984297473/989268365870776411"><b>midjourney</b></a></a></li>
          <li> <a href="https://weirdwonderfulai.art/"><b>Weird Wonderful AI</b></a> </li>
          <li> <a href="https://colab.research.google.com/github/huggingface/notebooks/blob/main/diffusers/stable_diffusion.ipynb"><b>Stable Diffusion ★</b></a> </li>
          <li> <a href="https://www.masayume.it/blog/content/disco-diffusion-google-colab"><b>Disco Diffusion ★</b></a> </li>    
          <li><a href="https://twitter.com/search?q=discodiffusion%20min_faves%3A20&src=typed_query&f=top"><b>discodiffusion ADVQ ■★</b></a></li>
          <li><a href="https://twitter.com/nin_artificial/media"><b>nin_artificial</b></a></li>
          <li><a href="https://www.reddit.com/r/deepdream/"><b>Red.Deepdream</b></a></li>
          <li><a href="https://twitter.com/GlennIsZen/media"><b>GlennIsZen</b></a>
              <a href="https://twitter.com/nvnot_/media"><b>NVnot</b></a>
              <a href="https://twitter.com/snecc_art/media">snecc</a></li>
          <li><a href="https://twitter.com/ganbrood/media"><b>ganbrood</b></a>
              <a href="https://twitter.com/Somnai_dreams/media"><b>Somnaidrms</b></a></li>
          <li><a href="https://twitter.com/romanguillermo_/media"><b>romanguillermo</b></a></li>
          <li><a href="https://twitter.com/EErratica/media"><b>EncyclErratica</b></a>
              <a href="https://twitter.com/NekroXIII/media"><b>NecroXIII</b></a></li>
          <li><a href="https://twitter.com/JvdeNft/media">JvdeNft</a>
              <a href="https://twitter.com/inigma_a/media">AInigma</a>
              <a href="https://twitter.com/thibaudz/media">Thibaudz</a></li>
          <li><a href="https://twitter.com/noir_random/media">noirndom</a>
              <a href="https://twitter.com/EmporiumLoris/media">LorisEmporium</a></li>
          <li><a href="https://twitter.com/magnasoma/media">magnasoma</a></li>
        </ul>
      </p>
    </details>
        










  </div>
  

  <div class="_exa">

    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('inspire/@COVERS/retrocovers/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      // echo "directory: $directory";
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,svg,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      $imagefile  = $image;
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"360\">";

    ?>

    <h4>ONGOING</h4>
          <ul>
            <li> <a href="https://bitbucket.org/radicalbit/slalom2020/commits/"><b>Slalom 2020</b></a> -
                 <a href="https://bitbucket.org/radicalbit/keplerion/commits/"><b>Keplerion</b></a> -
                 <a href="https://bitbucket.org/radicalbit/solomon/commits/"><b>Solomon's World</b></a></li> 
          </ul>


  </div>


  <div class="_exa">

    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('inspire/@pixelart/RETRO/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      // echo "directory: $directory";
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,svg,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      $imagefile  = $image;
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"400\">";

    ?>

  </div>


  <div class="_exa">

    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('inspire/@CARTOONS/Kento_Iida/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      // echo "directory: $directory";
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,svg,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      $imagefile  = $image;
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"400\">";

    ?>

  </div>


  <div class="_exa">

    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('inspire/@pixelart/RETRO/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      // echo "directory: $directory";
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,svg,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      $imagefile  = $image;
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"400\">";

    ?>

  </div>


  <div class="_exa">

    <h4>LOCALE</h4>
      <ul> 
        <li><a href="/HTML5/ottostennis/"><b>otto's tennis</b></a> </li>
      </ul>

    <h4>DEFOLD</h4>
      <ul> 
        <li><a href="https://www.masayume.it/blog9/web/content/defold-game-engine"><b>masayume</b></a> 
            <a href="https://github.com/masayume/DigitalGarden/tree/main/engineering-code/defold"><b>github</b></a> </li>
        <li><a href="http://britzl.github.io/publicexamples/"><b>examples demo</b></a> </li>
      </ul>

    <h4>DEV</h4>
    <ul>
      <li> <a href="/demon/lightgallery.js/demo/NMS.htm">masayume@PS4</a> (music)
    </ul>
      <h4>GAMES</h4>
      <ul>
      <li><a href="http://www.progettoemma.net/mess/random.php" target="_blank">EPIC game juxtapose</a>
      </ul>  
    <!-- ABANDONWARE -->
    <h4>cardrogue</h4>
    <ul>
    <li><a href="/cardrogue/prototype-01">cardrogue pt01</a> <a href="/cardrogue/prototype-02">cardrogue pt02</a>
    <li><a href="/cgi-bin/maze2.pl?cards=1">maze prototype 0.1</a>
    </ul>

    <h4>No Man's Sky</h4>

    <ul>
    <li> <a href="/demon/lightgallery.js/demo/NMS.htm">masayume@PS4</a>  
    </ul>
  
  </div>


  <div class="_exa">
    <h4>1001 fables (1k1f) </h4>
    <ul>
      <li>  <a href="/cgi-bin/1k1f/1k1f-editor.pl">1k1f character editor (LOCAL)</a> </li>
      <li>  <a href="http://www.masayume.it/cgi-bin/1k1f-editor.pl">1k1f character editor (ONLINE)</a> </li>
      <li>  <a href="/1k1f/dnd-div.htm">1k1f scene editor</a> </li>
      <li>  <a href="https://docs.google.com/spreadsheet/ccc?key=0Av5S34ISFEfrdHZGVVFFQ1RRQktuQmxPQ0lMYVRRbGc#gid=0">google 1001 spreadsheet</a> </li>
    </ul>

    <h4>VIVUS</h4>
    <ul>
      <li><a href="/vivus/index.html">example</a> </li>
      <li><a href="/vivus/index2.htm">my example</a> </li>
      <li><a href="http://www.autotracer.org/">autotracer.org</a> </li>
      <li><a href="http://vectormagic.com/home">vectormagic</a> </li>
    </ul>

    <h4>Five Elements</h4>
    <ul>
      <li><a href="/cgi-bin/5elems/hikiko.pl">hikiko.pl</a>
    </ul>

  </div>


  <div class="_exa">

    <h4>3D GRAPH</h4>  <!-- also in TOOLS -->
    <ul>
      <li> <a href="https://www.models-resource.com/"><b>models resource ★</b></a> </a></li>
      <li> <a href="">blender LMX</a> - <a href="blender.keyboard.reference.htm">keyboard</a></li>
      <li> <a href="https://www.masayume.it/blog/content/3d-con-pochi-click-mixamo"><b>mixamo ★</b>  </a> <a href="https://www.youtube.com/watch?v=-FhvQDqmgmU">course ★ </a></li>
      <li> <a href="https://www.youtube.com/watch?v=PVmDgrr75nE"><b>MIXAMO proc-anim</b> ★</a></li>
      <li> <a href="https://threejs.org/examples/#webgl_animation_skinning_additive_blending"><b>3js virtual model</b> ★★</a></li>
      <li> <a href="https://www.masayume.it/blog/content/plask"><b>Plask ★</b></a></li>
      <li> <a href="">magicavoxel WIN</a></li>
      <li> <a href="https://metahuman.unrealengine.com/"><b>metahuman ★</b> </a></li>
      <li> <a href="https://www.masayume.it/blog/content/dalla-fotografia-al-3d-pifuhd">pifu 2D->3D ★</a>
      <li> <a href="https://www.masayume.it/blog/content/blockbench">blockbench ★</a> </li>  
    </ul>

  </div>

</div> <!-- container -->

<!-- FOOTER -->
</body>
</html>
