<html>
<head>
<title>TOOLS</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">
<meta charset="UTF-8">
<style>
  body { 
/*	background-image:url('img/ub-wallp.jpg'); 
	background-color: #0033cc;
*/

/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#b4ddb4+0,83c783+13,52b152+49,008a00+67,005700+97,002400+100 */
background: #b4ddb4; /* Old browsers */
background: -moz-linear-gradient(-45deg,  #b4ddb4 0%, #83c783 13%, #52b152 49%, #008a00 67%, #005700 97%, #002400 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(-45deg,  #b4ddb4 0%,#83c783 13%,#52b152 49%,#008a00 67%,#005700 97%,#002400 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(135deg,  #b4ddb4 0%,#83c783 13%,#52b152 49%,#008a00 67%,#005700 97%,#002400 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b4ddb4', endColorstr='#002400',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
  }
  a, a:visited {  color: #ffffff; }
  h3, h4 {  color: #002244; }
  .container{ text-align:left; border:1px solid #666; }
  ._img{ display:inline-block; margin:5px 20px; padding:5px; border:1px solid #CCC; }
  ._text{ display:inline-block; margin:5px 20px; padding:5px; border:1px solid #CCC; top: 0px; }
  ._exa{ display:inline-block; margin:2px 1px; padding:2px; border:1px solid #CCC; top: 0px; vertical-align: text-top;}
</style>

</head>
<body>
<div class="container-fluid">

  <div class="_exa">
  
  <h4>WEB TOOLS</h4> <!-- also in INSPIRE -->
  <ul>
    <li><a href="https://onlinehtmleditor.dev/"><b>htmleditor★</b></a>
        <a href="https://numbr.dev/?ref=masayume.it" title="excel alternative"><b>numbr★</b></a></li>
    <li><a href="https://photomosh.com/"><b>photomosh★</b></a></li>
    <li><a href="https://snappa.com/" title="canva alternative"><b>snappa★</b></a>
        <a href="https://stackblitz.com/" title="canva alternative"><b>stackblitz★</b></a></li>
    <li><a href="http://www.colorzilla.com/gradient-editor/"><b>gradient</b></a> - <a href="http://ourownthing.co.uk/gradpad.html#">gradpad</a></li>
    <li><a href="https://openmoji.org/library/#group=smileys-emotion">openmoji</a>
        <a href="http://jupyter.org/"><b>jupyter</b></a></li>
    <li><a href="https://webgems.io"><b>webgems</b></a>
        <a href="http://webtoolkitonline.com">webtools</a></li>
    <li><a href="/HTML5/SVGbackgrounds">SVG backgrounds</a></li>
    <li><a href="/HTML5/graphviz/">graphviz </a> - <a href="/HTML5/cytoscape/">cytoscape</a></li>
    <li><a href="/HTML5/dagre/">dagre</a> - <a href="https://github.com/dagrejs/dagre-d3/wiki">wiki</a></li>
    <li><a href="http://jsoneditoronline.org/">JSONEdit</a> (<a href="https://github.com/josdejong/jsoneditor">git</a>) <a href="https://jsonformatter.org/json-editor">JSONF</a></li>
  </ul>

  <h4>PDF TOOLS</h4>  <!-- also in PIXELART -->
  <ul>
    <li>  <a href="https://webtopdf.com/"><b>webtopdf</b></a> 
          <a href="https://www.pdflabs.com/tools/pdftk-the-pdf-toolkit/">pdftk</a>
          <a href="https://www.pdflabs.com/docs/pdftk-cli-examples/">CLI</a></li>
    </ul>

  <h4>MOBILE</h4>  
  <ul>
    <li>  <a href="http://192.168.1.16:1200/"><b>REALME file comm</b></a> </li>
    </ul>

    
  <h4>FONTS</h4>  <!-- also in PIXELART -->
  <ul>
    <li> <a href="http://localhost:8989/HTML5/AFV/arcade.php/y-r/x-BABICH%20RULEZ/dbl-4"><b>arcade font writer</b></a> <a href="http://arcade.photonstorm.com">onl.</a></li>
    <li> <a href="https://fontsource.org/?query=na"><b>fontsource</b></a> </li>
    <li> <a href="/HTML5/holden/index.php?art1=175&art2=175"><b>ref-TEXT (fonts) ■</b></a> </li>
    <li> <a href="/HTML5/holden/index.php?art1=175&art2=175"><b>local pixel fonts ■</b></a> </li>
    <li> <a href="https://fontstruct.com/gallery/tag/9/Pixel"><b>online pixel fonts ■</b></a> </li>
    <li> <a href="https://fontstruct.com/gallery/tag/1723/Arcade"><b>online arcade fonts ■</b></a> </li>
    <li> <a href="https://www.masayume.it/blog/content/fontforge" target="_blank"><b>Fontforge (L)</b></a>
    <li> <a href="https://nerdfonts.com/#cheat-sheet"><b>nerdfonts</b></a> </li>
    <li> <a href="https://fontawesome.com/icons?d=gallery"><b>fontawesome</b></a></li>
    <li> <a href="http://mathew-kurian.github.io/CharacterMap/"><b>Font Char Map</b></a></li>
    <li> <a href="https://fontstruct.com/fontstructor/edit"><b>Fontstruct ■</b></a>
         <a href="https://www.masayume.it/blog9/web/content/splintered-pixel-fonts-fontstruct"><b>my</b></a></li>
  </ul>
  </div>  


  <div class="_exa">
    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('inspire/@CARTOONS/@gif animations/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      $images     = glob($directory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      $imagefile  = $image;
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"300\">";

    ?>

    <br />

          <h4>TOOLS</h4>
          <ul>
            <li> <a href="https://1000.tools/" target="_blank"><b>1000 tools ★★</b></a> -
                 <a href="https://github.com/ellisonleao/magictools/commits/master">MAGIC TOOLS ★★</a></li>
            <li> <a href="http://www.taskade.com/spaces/H1316-R3M" target="_blank">taskade</a> - 
                 <a href='https://www.devpen.io/editor'>github MD ★</a> </li>
            <li> <a href='/writing'>writing</a> -
                 <a href='/stackedit'>stackedit</a> - 
                 <a href='/training'>training</a> <a href="https://www.masayume.it/training">(remote)</a></li>
            <li> <a href='https://threejs.org/'>threejs</a></li>
            </ul>

          <h4>WEEKLY done</h4>
            <ul>
              <li> <a href="/HTML5/random-kanji-card/kanjipage.php">Kanji Cards</a>
                   <a href="/HTML5/taktix/">Oblique Taktix</a> </li>
              <li> <a href="/inspire/@CARTOONS/SIO/bin/sio.php">siomixbot</a> - <a href="https://twitter.com/siomixbot"></a>
                   <a href="/oglaf.php">Oglaf RND comic</a> </li>
              <li> <a href="/rory.php">rory story cubes</a>
                   <a href="/mersenne/mersenne.php">mersenne general</a> </li>
            </ul>    
  </div>

  <div class="_exa">

    <h4>GENERAL TOOLS</h4>
      <ul>
        <li> <a href="https://www.virustotal.com/?utm_source=masayume.it"><b>virustotal ★★</b></a>
      </ul>
 

    <h4>IMAGE TOOLS</h4>
      <ul>
        <li> <a href="https://imgupscaler.com/?utm_source=masayume.it"><b>image upscaler ★</b></a>
        <li> <a href="https://cleanup.pictures/?utm_source=masayume.it"><b>image cleanup ★</b></a>
      </ul>

    <h4>SHADERS</h4> <!-- also in GODOT -->
          <ul>
            <li> <a href="https://www.masayume.it/blog9/web/content/shader-introduction"><b>Shaders Intro</b></a></li> 
            <li> <a href="https://thebookofshaders.com/">book of shaders</a></li> 
            <li> <a href="https://github.com/patriciogonzalezvivo/thebookofshaders">github</a> - <a href="http://editor.thebookofshaders.com/">editor</a> </li>
            <li> <a href="https://github.com/mnmxmx/toon-shading">js toon shading</a></li> 
            <li> <a href="https://www.shadertoy.com/results?query=tag%3Dcrosshatch"><b>shadertoy xhatch</b></a></li> 
            <li> <a href="https://www.poshbrolly.net/"><b>posh brolly</b></a></li> 
            <li> <a href="https://www.clicktorelease.com/code/cross-hatching/">crosshatching</a></li> 
            <li> <a href="http://dev.thi.ng/gradients/">Color palette webapp</a></li> 
            <li> <a href="https://graphtoy.com/">graphtoy</a></li> 

          </ul>


    <h4>GENERATIVE</h4>
          <ul>
            <li> <a href="https://github.com/topics/generative-art?o=desc&s=stars">repos ★★★</a></li> 
            <li> <a href="https://github.com/marian42/wavefunctioncollapse">wave fn collapse ★</a> </li>
            <li> <a href="https://www.masayume.it/blog9/web/content/markov-jr">markov junior ★</a> </li>
            <li> <a href="https://thisxdoesnotexist.com/">this does not exist ★</a> </li>
            <li> <a href="/html5/slant/">Golid slant ★</a> <a href="https://www.masayume.it/blog/content/kjetil-midtgarden-golid">my</a></li>
            <li> <a href="/html5/gengrid/dist/">generative grid ★</a> </li>
            <li> <a href="https://colab.research.google.com/github/tensorflow/docs/blob/master/site/en/r2/tutorials/sequences/text_generation.ipynb">TF2 textgen ★★★</a> </li>
            <li> <a href="https://twitter.com/ma5ayume/lists/generative">twitter list</a> </li>
            <li> <a href="https://polyhedra.tessera.li/"><b>polyhedra★</b></a>
                 <a href="https://www.masayume.it/blog/content/polyhedra-viewer"><b>my</b></a></li> 
          </ul>


    <h4>LEVEL DESIGN</h4>
    <ul>
      <li> <a href="https://www.masayume.it/blog/content/ldtk-level-designer-toolkit" target="_blank"><b>LDtk LVL Design ★</b></a> <a href="https://www.masayume.it/blog/content/ldtk-level-designer-toolkit" target="_blank">my</a></li>
      <li> <a href="https://vgmaps.com/" target="_blank"><b>VG Maps ★</b></a> <a href="/blog/content/mappe-di-videogame" target="_blank">my</a></li>
    </ul>
    

  </div>

  <div class="_exa">
      
    <h4>GRAPH 4PIXATOOL</h4> <!-- also in INSPIRE, UNITY -->
    <ul>
      <li> <a href="/inspire.php"><b>INSPIRE</b></a> or <a href="/unity.htm"><b>UNITY</b></a></li>
    </ul>

    <h4>RESOURCES</h4> <!-- also in INSPIRE, UNITY -->
    <ul>
      <li> <a href="https://www.spriters-resource.com/"><b>spriters resource ★</b></a> </a></li>
      <li> <a href="https://www.textures-resource.com/"><b>textures resource ★</b></a> </a></li>
      <li> <a href="https://www.models-resource.com/"><b>models resource ★</b></a> </a></li>
      <li> <a href="https://www.sounds-resource.com/"><b>sounds resource ★</b></a> </a></li>
    </ul>

  <h4>PALETTE</h4> <!-- also in PIXELART -->
    <ul>
      <li><a href="https://rilden.github.io/tiledpalettequant/"><b>tiledpq★</b></a> 
          <a href="https://github.com/rilden/tiledpalettequant"><b>github</b></a>  
          <a href="https://www.masayume.it/blog9/web/content/tiled-palette-quantization"><b>my</b></a> 
          <a href="/HTML5/tiledpalettequant/"><b>loc</b></a> </li> 
      <li><a href="https://lospec.com/palette-list"><b>LoSPEC ★</b></a>, 
          <a href="https://lospec.com/palette-list/dawnbringer-32"><b>DB32 ★</b></a></li>
      <li><a href="https://lospec.com/palettes/dawnbringer-palette-analyser">analyzer</a>
          <a href="https://mdigi.tools/color-extractor/?utm_source=pocket_mylist">xtractor</a>
          <a href="https://palettegenerator.com/?utm_source=pocket_mylist">genertr</a></li>
      <li><a href="http://www.cssdrive.com/imagepalette/">cssdrive palettegen</a></li>
      <li><a href="https://meodai.github.io/poline/"><b>Poline</b></a>
          <a href="https://codepen.io/meodai/pen/GRyjQoZ">color scaler</a></li>
      <li><a href="https://sites.google.com/view/rejected-palettes/palette-list">rejected palettes</a></li>
    </ul>

    <details>
        <summary><strong><b>PHOTOSHOP+ TUTS ⬇️</b></strong></summary> 
        <p>
          <ul>
            <li> <a href="https://www.youtube.com/watch?v=ZpdP_28N-oQ&list=PLHDWQaj1wMEw7buji4J5SMSUl3cYC5_xn"><b>texturelabs ★★</b></a></li> 
            <li> <a href="https://www.youtube.com/watch?v=1Lv4_atfkqo"><b>Retro-Future Monitor ★</b></a></li> 
            <li> <a href="https://www.youtube.com/watch?v=dZF6JGFuXAE"><b>ArtRage Colouring ! </b></a></li>
            <li> <a href="https://www.youtube.com/watch?v=NmZxWXeIjJI"><b>Collage Art Effect</b></a></li> 
            <li> <a href="https://www.youtube.com/watch?v=5EuYKEvugLU"><b>Difference of Gaussians</b></a></li> 
          </ul>
        </p>
    </details>


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
            <li> <a href="https://twitter.com/hashtag/stablediffusionart"><b>#stablediffusion★</b></a></li>  
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

    <h4>3D GRAPH</h4>  <!-- also in UNITY -->
      <ul>
        <li> <a href="">blender LMX</a> - <a href="blender.keyboard.reference.htm">keyboard</a></li>
        <li> <a href="https://www.masayume.it/blog/content/3d-con-pochi-click-mixamo"><b>mixamo ★</b>  </a> <a href="https://www.youtube.com/watch?v=-FhvQDqmgmU">course ★ </a></li>
        <li> <a href="https://www.youtube.com/watch?v=PVmDgrr75nE"><b>MIXAMO proc-anim</b> ★</a></li>
        <li> <a href="https://threejs.org/examples/#webgl_animation_skinning_additive_blending"><b>3js virtual model</b> ★★</a></li>
        <li> <a href="https://www.masayume.it/blog/content/plask"><b>Plask ★</b></a>
             <a href=""><b>magicavoxel</b></a></li>
        <li> <a href="https://metahuman.unrealengine.com/"><b>metahuman ★</b> </a></li>
        <li> <a href="https://www.masayume.it/blog/content/dalla-fotografia-al-3d-pifuhd">pifu2D>3D★</a>
             <a href="https://www.masayume.it/blog/content/blockbench">blckbnch★</a> </li>  
      </ul>

      
  </div>

  <div class="_exa">
    <h4>Sprites</h4>

    <details>
      <summary><strong><b>Sprites ⬇️</b></strong></summary> 
      <p>    
    
        <ul>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Akuma">Akuma</a>, 
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Athena%20Asamiya">Athena</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Balrog">Balrog</a></li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Benimaru%20Nikaido">Benimaru</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Blanka">Blanka</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Cammy">Cammy</a></li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Chun-Li">Chun-Li</a>, 
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Dan%20Hibiki">Dan H.</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Dhalsim">Dhalsim</a></li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Eagle">Eagle</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Edmund%20Honda">Honda</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Evil%Ryu">Evil Ryu</a></li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Geese%20Howard">G.Howard</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/God%20Rugal">G.Rugal</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Guile">Guile</a></li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Haohmaru">Haohmaru</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Hibiki">Hibiki</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Iori%20Yagami">Yagami</a></li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Joe%20Higashi">Higashi</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Ken%20Masters">Ken</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Kim%20Kaphwan">Kim K.</a></li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/King">King</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Kyo%20Kusanagi">Kyo K.</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Kyosuke">Kyosuke</a></li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/M.%20Bison">M. Bison</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Mai%20Shiranui">Mai S.</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Maki">Maki</a></li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Morrigan%20Aensland">Morrigan</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Nakoruru">Nakoruru</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Orochi%20Iori">Orochi</a></li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Raiden">Raiden</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Rock%20Howard">Rock H.</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Rolento">Rolento</a></li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Rugal%20Bernstein">Rugal B.</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Ryo%20Sakazaki">Ryo S.</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Ryu">Ryu</a></li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Sagat">Sagat</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Sakura%20Kasugano">Sakura K.</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Shin%20Akuma">S.Akuma</a></li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Terry%20Bogard">Terry B.</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Todoh">Todoh</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Vega">Vega</a></li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Vice">Vice</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Yamazaki">Yamazaki</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Yun">Yun</a></li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Yuri%20Sakazaki">Yuri S.</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/Zangief">Zangief</a></li>
        </ul>
      </p>
    </details>


    <details>
      <summary><strong><b>Sprites RCG ⬇️</b></strong></summary> 
      <p>    
    
        <ul>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Kyoko">Kyoko</a>, 
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Misako">Misako</a> </li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Cheerleader">Cheerleader</a>, 
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Cyborg">Cyborg</a>, </li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Hanase%20Mami">Hanase-Mami</a>, </li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Kunio">Kunio</a>, 
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Linda">Linda</a>, 
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Misuzu">Misuzu</a>, </li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/MT">MT</a>, 
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Noize">Noize</a>, 
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Policeman">Policeman</a>, </li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Trasher">Trasher</a>, 
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Waver">Waver</a>, 
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Riki">Riki</a>, </li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/School%20Boy">School%20Boy</a>, </li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/School%20Girl">School%20Girl</a>, </li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Tigerman">Tigerman</a>,
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Yamada">Yamada</a>, </li>
          <li><a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Yakuza%20Female">Yakuza F</a>, 
              <a href="/HTML5/holden/index.php?folder=@pixelart/SPRITES/_RiverCityGirls/Yakuza%20Male">Yakuza M</a>, </li>

        </ul>

      </p>
    </details>

    <h4>Downloaders</h4>
    <ul>
      <li><a href="https://cobalt.tools/"><b>cobalt ★</b></a> </li>
      <li><a href="https://fdownloader.net/en"><b>facebookD ★</b></a> </li>
      <li><a href="https://snapinsta.app/"><b>snapinsta ★</b></a> </li>
      <li><a href="https://imginn.com/"><b>imginn ★</b></a> </li>
    </ul>


  </div>


  <div class="_exa">

  <h4>Sounds</h4>
  <ul>
    <li><a href="https://wavacity.com/"><b>wavacity ★</b></a> </li>
    <li><a href="https://archive.org/details/usc-sound-effect-archive?&sort=-week&page=3"><b>USC foley ★★</b></a> 
        <a href="https://www.masayume.it/blog9/web/content/foley-sse-sound-library"><b>my</b></a> </li>
    <li><a href="https://audioalter.com/?ref=masayume.it"><b>audioalter ★</b></a> </li>
    <li><a href="https://www.sounds-resource.com/"><b>sounds resource ★</b></a> </li>
    <li><a href="https://www.masayume.it/blog/content/essential-game-audio-toolkit"><b>Essential Tools</b></a></li>
    <li><a href="https://github.com/masayume/DigitalGarden/tree/main/resources/foley"><b>DigiGarden ★★</b></a></li>
    <li><a href="/home/masayume/DATA/E/LOCALE/sonniss/sounds.txt"><b>SONNISS ★★</b></a></li>
    <li><a href="https://freesound.org/browse/"><b>freesound ★</b></a>,<a href="https://freesound.org/search/?q=car&fbclid=IwAR2RYIcbws5MJihzo1IG8sCck8Awe-x9rcNpe1lqtGGxa_lR_msNlvYZ0qc">src</a></li>
    <li><a href="https://www.shockwave-sound.com/">shockwavesound</a></li>
    <li><a href="/demon/soundboard/">soundBrd</a>
        <a href="https://www.101soundboards.com/">101.SBDs</a></li>    
    <li><a href="http://bbcsfx.acropolis.org.uk/">BBC 16k</a>
        <a href="https://elements.envato.com/sound-effects">envato sfx</a></li>
    <li><a href="">BFXR Win</a>
        <a href="https://synapse.cephasteom.co.uk/">ambsounds</a></li>
    <li><a href="https://soundcloud.com/soundsuigood" target="_blank"><b><i>sounds ui good</i></b></a></li>
  </ul>

    <h4>Text 2 Speech</h4>
  <ul>
    <li><a href="https://watson-speech.mybluemix.net/text-to-speech-custom-voice.html">text2speech js</a></li>
    <li><a href="https://discordier.github.io/sam/">S.A.M (js)</a></li>
  </ul>

  <h4>Teropa +</h4>
  <ul>
    <li><a href="https://codepen.io/teropa/pen/JLjXGK">Neural Drums</a></li>
    <li><a href="https://codepen.io/teropa/pen/zpbLOj">Deep Roll</a></li>
    <li><a href="https://codepen.io/teropa/pen/rdoPbG">Latent Cycles</a></li>
    <li><a href="https://codepen.io/teropa/pen/ddqEwj">N. Arpeggiator</a></li>
    <li><a href="https://experiments.withgoogle.com/ai/beat-blender/view/">AI beatblender</a></li>
  </ul>

  <h4>MIDI</h4> <!-- also in UNITY -->
  <ul>
    <li><a href="https://bitmidi.com/">BitMIDI</a>
        <a href="https://twitter.com/OnlyMIDIs">OnlyMIDIs★</a></li>
    <li><a href="">SID2MIDI WIN ★</a></li>
  </ul>

  </div>
  
  <div class="_exa">
    <h4>MUSIC</h4>
  <ul>
    <li><a href="https://huggingface.co/spaces/enzostvs/ai-jukebox"><b>AIjukebox★</b></a>
        <a href="https://www.aiva.ai/"><b>AIVAAI★</b></a></li>
    <li><a href="https://eternalbox.dev/jukebox_index.html"><b>eternalbox</b></a>
        <a href="https://www.masayume.it/blog/content/aiva-ai-assisted-music-composing"><b>my</b></a></li>
    <li><a href="https://chiptune.app/">Chipjs★</a>
        <a href="https://www.masayume.it/blog9/web/content/famistudio/">famistudio★</a></li>
    <li><a href="https://telesplit.com/"><b>telesplit ★</b></a> <a href="https://www.masayume.it/blog9/web/content/telesplit"><b>my</b></a></li>
    <li><a href="http://everynoise.com/">everysound ★</a></li>
    <li><a href="https://www.zophar.net/music"><b>zophar.net ★★</b></a></li>
    <li><a href="/demon/OSS/oss.php">OSS ★</a>, 
        <a href="https://incompetech.com/music">incompetech</a></li>
    <li><a href="https://openai.com/blog/musenet/#try">musenet</a>
        <a href="https://musescore.com/user/2891181/sheetmusic"><b>musescore</b></a></li>
    <li><a href="https://www.bespokesynth.com/"><b>bespoke synth</b></a>
        <a href="https://www.masayume.it/blog9/web/content/bespoke-synth"><b>my</b></a></li>
    <li><a href="https://onlinesequencer.net/"><b>online sequencer ★</b></a></li>

    <li><a href="https://boscaceoil.net/linux-info.html">BoscaCeoil</a>,
        <a href="tenori-off.glitch.me">TenoriOff</a></li>
    <li><a href="/jsSID">jsSID</a> <a href='https://github.com/jhohertz/jsSID'>gh</a>,
        <a href="/3dpiano">piano3D</a> <a href='https://github.com/reality3d/3d-piano-player'>gh</a></li>
    <li><a href="https://www.youtube.com/c/8bitMusicTheory/playlists" target="_blank"><b>8bitMusicTheory ★</b></a></li>
    <li><a href="https://icons8.com/music/?ref=masayume.it" target="_blank"><b><i>Fugue</i></b></a>, 
        <a href="https://no-lick.com/?ref=masayume.it" target="_blank"><b><i>No Lick</i></b></a></li>
    <li><a href="https://soundcloud.com/soundsuigood" target="_blank"><b><i>sounds ui good</i></b></a></li>
    <li><a href="https://musicformakers.com/?ref=masayume.it" target="_blank"><b><i>music for makers</i></b></a></li>
    <li><a href="http://stampede.it/?ref=masayume.it" target="_blank"><b><i>stampede</i></b></a>
        <a href="https://musicmaker.site/?ref=masayume.it" target="_blank"><b><i>musicmaker</i></b></a></li>
    <li><a href="https://www.tunepocket.com/?ref=masayume.it" target="_blank"><b><i>TunePocket</i></b></a>
        <a href="https://www.noteflight.com/home">noteflight★</a></li>
    <li><a href="">SID2MIDI WIN ★</a></li>
    <li><a href="https://www.tony-b.org/">Tony-B 機</a> <a href="https://teropa.info/musicmouse/"><b>music鼠</b></a></li>
    <li><a href="https://openmusicarchive">O.M.A.</a> <a href="https://musopen.org/">musopen</a></li>
    <li><a href="https://freepd.com">freepd</a>
        <a href="https://imslp.org/wiki/Main_Page">imslp</a>
        <a href="https://www.cpdl.org/wiki/index.php/Main_Page">cpdl</a></li>
    <li><a href="https://ccmixter.org">ccmixter</a>
        <a href="https://www.youtube.com/c/audiolibrary-channel/videos">youtube</a></li>
    <li><a href="https://www.freemusicpublicdomain.com/">freemusic PD</a></li>
    <li><a href="https://www.freesoundtrackmusic.com/">freeSTmusic</a></li>
    <li><a href="https://www.vitling.xyz/toys/autotracker/"><b>rawWASM★</b></a>
        <a href="https://www.masayume.it/blog9/web/content/amiga-mod-music-online-bassoon-tracker"><b>my</b></a></li>
    <li><a href="https://www.vitling.xyz/toys/autotracker/"><b>Autotrackr★</b></a>
        <a href="https://publicdomain4u.com/music/">PD4u</a></li>
        </ul>

  </div>

  <div class="_exa">

    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('inspire/@software pins/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      $images     = glob($directory . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      $imagefile  = $image;
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"260\">";

    ?>


    <h4>ANIMATION</h4>
      <ul>
        <li><a href="https://cascadeur.com/tutorial">Cascadeur</a> <a href="https://www.masayume.it/blog/content/cascadeur-entra-open-beta">(my)</a></li>
      </ul>
    
    <h4>VIDEO EDIT</h4>
      <ul>
        <li> <a href="http://www.masayume.it/blog/content/kdenlive-non-linear-video-editor"><b>kdenlive LMX★</b></a> </li> 
      </ul>

    <h4>TEXTGEN</h4>
      <ul>
        <li> <a href="https://lettering.org/lettering-generator/" target="_blank"><b>Calligraphy Lettering ★</b></a> </li>
        <li> <a href="https://talktotransformer.com/" target="_blank"><b>GPT-2 online &nbsp; ★</b></a> </li>
        <li> <a href="https://github.com/minimaxir/textgenrnn" target="_blank"><b>textgenrnn</b></a> <a href="https://colab.research.google.com/drive/1e2yJMxW6co10yh_9wXZp5UoijsXSsiMi">CO</a> <a href="https://www.youtube.com/watch?v=RW7mP6BfZuY">V ★</a> </li> 
      </ul>      

      
    </div>

  <div class="_exa">
    <ul>
      <li><small>3d Model (Simple) - Sketchup</small>
      <li><small>(Digital Clay Sculpting) - Sculptris</small>
      <li><small>(in VR) - Google Blocks</small>
      <li><small>Photo Editing/Maniputaion - GIMP</small>
      <li><small>Digital Painting/ Comics - Krita</small>
      <li><small>Vector Art (like illustrator) - Inkscape</small>
      <li><small>Storyboarding - Storyboarder</small>
      <li><small>Visual Novel Maker: Fungus + Unity</small>
      <li><small>Text Based Game - Twine (Twinery.org)</small>
      <li><small>Screen & webcam recording - OBS Studio</small>
      <li><small>Live Streaming twitch/youtube: OBS</small>
      <li><small>Video and Audio Converter - Handbrake</small>
      <li><small>2DAnim (Cutout), Dragonbones Pro, Synfig</small>
      <li><small>2DAnim (drawn), Blender 2.8, Opentoonz</small>
      <li><small>Stick Figure Animation - Pivot Animator</small>
      <li><small>Disraction Free Writer (bighugelabs)</small>
      <li><small>Script/Playwriting - Amazon Storywriter</small>
      <li><small>Textures and HDRIs for 3D- Hdri Haven</small>
      <li><small>Fonts - Google Fonts, 1001freefonts.com</small>
      <li><small>Color Palette Generator - coolors.co</small>
      <li><small>Rhyme Dictionary - rhymezone.com</small>
    </ul>

  </div>

<div class="_exa">

  <h4>HTML5</h4>
  <ul>
    <li><a href="http://codepen.io/patterns"><b>codepen patterns</b></a></li>
    <li><a href="https://www.masayume.it/blog9/web/content/p5js"><b>my</b></a>, 
        <a href="https://editor.p5js.org/"><b>p5edit</b></a>, 
        <a href="https://twitter.com/hashtag/%E3%81%A4%E3%81%B6%E3%82%84%E3%81%8DProcessing?src=hashtag_click"><b>#つぶやき</b></a></li>
    <li><a href="/HTML5/sliding-text/">sliding-text</a> by <a href="http://nathan.tokyo">NT</a> - <a href="https://blotter.js.org/">blotter</a>
    <li><a href="/HTML5/step-anim/">sprite anim</a> by <a href="http://codepen.io/simurai/">simurai</a></li>
    <li><a href="/HTML5/filmator"><b>filmator</b></a></li>
    <li><a href="/HTML5/random-words/"><b>random words</b></a></li>
    <li><a href="/html5/pixelize-canvas.htm">pixelize canvas</a></li>
    <li><a href="/html5/interactive-canvas.htm">interactive canvas</a></li>
    <li><a >C64 shader:</a> <a href="/c64/C64Shader.htm" title="Cyberpunk 2077">1</a>, <a href="/c64/C64Shader2.htm" title="Gangnam Style">2</a>, <a href="/c64/C64Shader3.htm" title="ATARI TEMPEST">3</a>, <a href="/c64/C64Shader4.htm" title="DRAGON's LAIR">4</a>, <a href="/c64/C64Shader5.htm"  title="BAYONETTA">5</a>, <a href="/c64/C64Shader6.htm"  title="Ju Ju">6</a></li>
    <li><a href="/HTML5/full-loader/gui.neocities.org.htm">full loader</a> (not working yet)</li>
    <li><a href="http://www.turnjs.com"><b>Turn.js book</b></a></li>
    <li><a href="https://codepen.io/erinesullivan/full/gxdbzp"><b>book layout</b></a></li>
    <li> <a href="/HTML5/pageflipbook-01/">Skyrim Flipbook</a> </li>
  </ul>

</div>


  <div class="_exa">

    <h4>RANDOM GENs</h4> <!-- also in INDEX, INSPIRE -->
    <ul>
      <li><a href="/mersenne/mersenne.php?seed=100&page=1&results=1&atype=uchida"><b>uchida mersenne ★</b></a> </li>
      <li><a href="/keplerion/mersenne-01.php">mersenne-01</a> <a href="/keplerion/mersenne-02.php?seed=100&page=20&results=3&dir=./img/demons/">m-02-demon</a> </li>
      <li><a href="/keplerion/bouletmaton.php">bouletmaton</a> </li>
      <li><a href="/keplerion/layerizer.php">layerizer</a> </li>
      <li> <a href="https://talktotransformer.com/" target="_blank"><b>GPT-2 online &nbsp; ★</b></a> </li>
      <li> <a href="https://books.google.com/talktobooks/" target="_blank"><b>talk to books</b></a> </li>
      <li><a href="/html5/RiTaJS/examples/">RiTaJS</a>, <a href="http://www.rednoise.org/rita/tutorial/index.php">tut</a>, <a href="html5/gamedefinitions/">game defs</a>, <a href="http://www.rednoise.org/rita/reference/index.php">ref</a> </li>
      <li><a href="/html5/tracery/">tracery</a> - <a href="/html5/tracery/readme.md">readme</a> </li>
      <li><a href="http://orteil.dashnet.org/randomgen/?gen=cKeB4v4J" target="_blank">Randomgen</a> (online) </li>
      <li><a href="http://instagrammar.surge.sh" target="_blank">Instagrammar</a> (online) </li>
      <li><a href="https://ml5js.org/docs/lstm-example.html" target="_blank">LSTM by ml5.js</a> (online) </li>
      <li><a href="https://watabou.itch.io/medieval-fantasy-city-generator" target="_blank">fantasy-city-gen</a> (onl.) </li>
    </ul>

  </div>  

  <div class="_exa">
	<h4>js graph</h4>
	<ul>
    <li><a href="http://localhost:8989/three.js/examples/">Three.js examples</a></li>
    <li><a href="https://www.babylonjs.com/">babylonjs</a> - <a href="http://www.babylonjs-playground.com/#BCU1XR#0">examples</a></li>
    <li><a href="https://pixijs.io/examples">pixi.js</a> examples</li>
    <li><a href="/c64/crayon.js%20-%20example.htm">Crayon.js</a></li>
    <li> <a href="/demon/DART/mazes.htm">mazes (DART)</a></li>
	  <li> <a href="/netart/netart.htm">netart</a></li>
	  <li> <a href="/netart/neurogram.htm?gallery=b0e7ffcb9fe9c1c2c743623d67008515">neurogram</a></li>
	  <li> <a href="/freewall/">freewall JS</a></li>
	  <li> <a href="/paper.js/examples/Paperjs.org/DivisionRaster.html">Division Raster (paperjs)</a></li>
	  <li> <a href="/workflow/Jit/Examples/AreaChart/example1.html">AreaChart</a></li>
	  <li> <a href="/workflow/Jit/Examples/BarChart/example1.html">BarChart</a></li>
	  <li> <a href="/workflow/Jit/Examples/ForceDirected/example1.html">ForceDirected</a></li>
	  <li> <a href="/workflow/Jit/Examples/Hypertree/example1.html">Hypertree</a></li>
	  <li> <a href="/workflow/Jit/Examples/Icicle/example1.html">Icicle</a></li>
	  <li> <a href="/workflow/Jit/Examples/Other/example1.html">Other</a></li>
	  <li> <a href="/workflow/Jit/Examples/PieChart/example1.html">PieChart</a></li>
	  <li> <a href="/workflow/Jit/Examples/Treemap/example1.html">Treemap</a></li>
	</ul>
  </div>

  <div class="_exa">
    <h4>SERVICES</h4>
    <ul>
    <li><a href="/phpmyadmin">phpmyadmin - mysql</a>
    <li><a href="/phppgadmin">phppgadmin - postgres</a>
    <li><a href="/matomo">matomo</a> 
    <li><a href="http://cpanel.2freehosting.com/website/auto-installer">2fh</a> (2freehosting)
    </ul>

	<ul>
	<li><a href="/cgi-bin/phpinfo.php">phpinfo</a>
	<li><a href="/projects/genre-table.htm">periodic table of videogame innovations</a>
	<li><a href="/rt">request tracker</a>
	<li><a href="/jtype/ztype/index.html">j-type</a> <pre><small> j-type </small></pre> <a href="https://github.com/masayume/k-type">GIT REPO</a>  <a href="http://b.lesseverything.com/2008/3/25/got-git-howto-git-and-github">howto</a>
	</ul>
  </div>

  <div class="_exa">

    <h4>DEV</h4>
    <ul>
      <li> <a href="/demon/lightgallery.js/demo/NMS.htm">masayume@PS4</a> (music)
    </ul>

    <h4>BASH</h4>
    <ul>
      <li><a href="https://github.com/dylanaraps/pure-bash-bible"><b>pure bash bible ★</b></a></li>    
    </ul>

    <h4>DRUPAL</h4>
    <ul>
    <li><a href="/drupal8">drupal8-01</a></li>
    </ul>
    <h4>BOOTSTRAP</h4>
    <ul>
      <li><a href="https://uxplanet.org/how-the-bootstrap-4-grid-works-a1b04703a3b7">grid system</a> - <a href="https://www.codeply.com/go/6rPBFWFNPS">codeply</a></li>
      <li><a href="http://bootsnipp.com">bootsnipp</a> - <a href="https://bootswatch.com">bootswatch</a></li>
      <li><a href="https://bootstrapbay.com/blog/bootstrap-resources/">bootstrapbay</a> - <a href="https://bootstrap.build">btstrp.build</a></li>
      <li><a href="/bootstrap-examples">examples</a> - <a href="https://startbootstrap.com/bootstrap-resources/">resources</a></li>
      <li><a href="/HTML5/3DButtons/buttons.htm">3D Buttons</a></li>
    </ul>

  </div>

  <div class="_exa">
	<h4>PHASER</h4>
	<ul>
	<li><a href="/phaser/v2/docs/">PHASER</a> - <a href="https://phaser.io/examples">PHASER examples</a>
	<li><a href="/PHASER.my/myexamples">my examples</a> - <a href="/PHASER.my/myexamples/02-invader/index.html">invaders</a> - <a href="http://pgl.ilinov.eu/">game list</a> -  <a href="http://createdineden.com/blog/2014/may/01/multi-platform-games-with-phaserjs/">introduction</a>
	<li><a href="http://www.html5gamedevs.com/forum/14-phaser/">forum</a> - <a href="http://examples.phaser.io/_site/view_full.html?d=loader&f=load+events.js&t=load%20events">ex. loader</a> - <a href="http://gamedev.stackexchange.com/questions/76048/phaser-preload-future-states-in-create">stack exchange</a>
	<li>coding tips
	<a href="/phaser-coding-tips/issue-001/tanks.html">tanks 1</a>,
	<a href="/phaser-coding-tips/issue-002/tanks.html">tanks 2</a>,
	<a href="/phaser-coding-tips/issue-003/jumpup.html">jumpup</a>,
	<a href="/phaser-coding-tips/issue-004/clouds.html">clouds</a>,
	<a href="/phaser-coding-tips/issue-005/car.html">car</a>,
	<a href="/phaser-coding-tips/issue-005/pacman.html">pacman</a>,
	</ul>
  </div>

  <div class="_exa">
	<h4>GAMES</h4>
	<ul>
	<li><a href="http://www.progettoemma.net/mess/random.php" target="_blank">EPIC game juxtapose</a>
	</ul>
  </div>

  <div class="_exa">
	<!-- ABANDONWARE -->
	<h4>cardrogue</h4>
	<ul>
	<li><a href="/cardrogue/prototype-01">cardrogue pt01</a> <a href="/cardrogue/prototype-02">cardrogue pt02</a>
	<li><a href="/cgi-bin/maze2.pl?cards=1">maze prototype 0.1</a>
	</ul>
  </div>

  <div class="_exa">
	<h4>No Man's Sky</h4>

	<ul>
	<li> <a href="/demon/lightgallery.js/demo/NMS.htm">masayume@PS4</a>


	</ul>
  </div>

  <div class="_exa">
	<h4>VIVUS</h4>
	<ul>
	<li><a href="/vivus/index.html">example</a>
	<li><a href="/vivus/index2.htm">my example</a>
	<li><a href="http://www.autotracer.org/">autotracer.org</a>
	<li><a href="http://vectormagic.com/home">vectormagic</a>
	</ul>
  </div>

  <div class="_exa">
	<h4>1001 fables (1k1f) </h4>
	<ul>
	<li><a href="/cgi-bin/1k1f/1k1f-editor.pl">1k1f character editor (LOCAL)</a> - <a href="http://www.masayume.it/cgi-bin/1k1f-editor.pl">1k1f character editor (ONLINE)</a>
	<li><a href="/1k1f/dnd-div.htm">1k1f scene editor</a>
	<li><a href="https://docs.google.com/spreadsheet/ccc?key=0Av5S34ISFEfrdHZGVVFFQ1RRQktuQmxPQ0lMYVRRbGc#gid=0">google 1001 spreadsheet</a>
	</ul>
  </div>

  <div class="_exa">
	<h4>Five Elements</h4>
	<ul>
	<li><a href="/cgi-bin/5elems/hikiko.pl">hikiko.pl</a>
	</ul>
  </div>


</div> <!-- container -->

<!-- FOOTER -->
</body>
</html>
