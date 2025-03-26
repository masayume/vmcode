<html>
<head>
<title>COSMOgony</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">
    <meta charset="UTF-8">
<style>
  body { 
/*	background-image:url('img/ub-wallp.jpg'); 
	background-color: #0033cc;
*/

/* Permalink - use to edit and share this gradient: https://colorzilla.com/gradient-editor/#e0b8dd+0,ce65c5+22,f24864+51,ff4f51+59,bf353e+100 */
    background: linear-gradient(to bottom,  #e0b8dd 0%,#ce65c5 22%,#f24864 51%,#ff4f51 59%,#bf353e 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    background: #2485e5; /* Old browsers */
    background: -moz-linear-gradient(top,  #e0b8dd 0%,#ce65c5 22%,#f24864 51%,#ff4f51 59%,#bf353e 100%); /* FF3.6-15 */
    background: -webkit-linear-gradient(top,  #e0b8dd 0%,#ce65c5 22%,#f24864 51%,#ff4f51 59%,#bf353e 100%); /* Chrome10-25,Safari5.1-6 */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#2485e5', endColorstr='#26558b',GradientType=0 ); /* IE6-9 */
  }
  a, a:visited {  color: #ffffff; }
  h3, h4 {  color: #0022bb; }
  .container{ text-align:left; border:1px solid #666; }
  ._img{ display:inline-block; margin:5px 20px; padding:5px; border:1px solid #CCC; }
  ._text{ display:inline-block; margin:5px 20px; padding:5px; border:1px solid #CCC; top: 0px; }
  ._exa{ display:inline-block; margin:2px 1px; padding:2px; border:1px solid #CCC; top: 0px; vertical-align: text-top;}
</style>
<!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="/matomo/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

</head>
<body>
<div class="container-fluid">

  <div class="_exa">
    <h4>PAGES</h4>
      <ul>
        <li> <a href="/tools.php" target="_blank"><b>TOOLS</b></a> 
             <a href="/godot.php" target="_blank"><b>GODOT</b></a>
             <a href="/inspire.php" target="_blank"><b>INSPIRE</b></a> </li>
        <li> <a href="/pixelart/" target="_blank"><b>PIXELART</b></a> 
             <a href="/nihongo.php" target="_blank"><b>NIHONGO</b></a>
             <a href="/ai.php" target="_blank"><b>AI</b></a> </li>
        <li> <a href="/retro.php" target="_blank"><b>RETRO</b></a>
             <a href='/training'>training</a>/<a href="https://www.masayume.it/training">remote</a></li>
      </ul>

    <h4>TOOLS</h4>
      <ul>
        <li> <a href="LINK_URL" target="_blank"><b>TITLE</b></a> </li>
      </ul>

    <h4>WEB TOOLS</h4>
      <ul>
        <li> <a href="LINK_URL" target="_blank"><b>TITLE</b></a> </li>
      </ul>


  </div>

      
<div class="_exa">

  <h4>FONTS</h4>
      <ul>
        <li> <a href="LINK_URL" target="_blank"><b>TITLE</b></a> </li>
      </ul>

  <h4>BEST</h4>
      <ul>
        <li> <a href="LINK_URL" target="_blank"><b>TITLE</b></a> </li>
      </ul>
  
  <h4>Game Making</h4>
      <ul>
        <li> <a href="LINK_URL" target="_blank"><b>TITLE</b></a> </li>
      </ul>

  <h4>CODE</h4>
      <ul>
        <li> <a href="LINK_URL" target="_blank"><b>TITLE</b></a> </li>
      </ul>

  <h4>WEEKLY todo</h4>
      <ul>
        <li> <a href="LINK_URL" target="_blank"><b>TITLE</b></a> </li>
      </ul>

  </div>


  <div class="_exa">

    <h4>WEB TOOLS 2</h4> <!-- ALSO IN index.php -->
      <ul>
        <li> <a href="LINK_URL" target="_blank"><b>TITLE</b></a> </li>
      </ul>

      <h4>WEB LAYOUT</h4> 
      <ul>
        <li> <a href="LINK_URL" target="_blank"><b>TITLE</b></a> </li>
      </ul>

    <h4>open source</h4>
      <ul>
        <li> <a href="LINK_URL" target="_blank"><b>TITLE</b></a> </li>
      </ul>

  </div>

  <div class="_exa">

    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('inspire/@gnokkenland/M/marina/tarots/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      $imagefile  = $image;
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"300\">";

    ?>

    <p>
      post image
    </p>
<!--
    <br />
      <h4>PROJECTS done</h4>
          <ul>
          </ul>
-->

  </div>

  <div class="_exa">
    <h4>GRAPHICS</h4>
      <ul>
        <li><a href="https://www.pinta-project.com/" title="kdrive"><b>Pinta★</b></a>
            <a href="https://jeneira94.github.io/pintapals/shortcuts/" title="kdrive"><b>Keyb★</b></a></li>
      </ul>

    <h4>CLOUD</h4>
      <ul>
        <li><a href="https://www.masayume.it/blog/content/pico-8-la-fantasy-console" title="kdrive"><b>kdrive★</b></a></li>
        <li><a href="https://drive.proton.me/" title="proton drive"><b>pdrive★</b></a>
            <a href="https://mail.proton.me/" title="proton drive"><b>pmail</b></a> </li>
      </ul>

    <h4>pico-8</h4>
      <ul>
        <li><a href="https://www.masayume.it/blog/content/pico-8-la-fantasy-console"><b>my.it (L/PICO8)</b></a></li>
      </ul>

    <h4>DRUPAL</h4>
      <ul>
        <li><a href="/drupal8">drupal8-01</a></li>
      </ul>

 </div>


 
  
  <div class="_exa">
    <h4>Boardgames</h4>
      <ul>
        <li><a href="/HTML5/a4-page/index.htm">card print template</a></li>    
        <li><a href="/html5/isotope/isotope-boardgame/">ISOboardgame</a></li>  
      </ul>

    <h4>CGI-BIN</h4>
      <ul>
        <li><a href="/demon/webcomix/index.htm"><b>webcomix</b></a> <a href="/cgi-bin/dailystrips.pl">dailystrips</a> </li>
        <li><a href="/demon/pixelize/index.htm"><b>pixelize</b></a> </li>
      </ul>

    <h4>GAMES</h4>
      <ul>
        <li><a href="http://www.progettoemma.net/mess/random.php" target="_blank">EPIC game juxtapose</a>
      </ul>

    <h4>Text 2 Speech</h4>
      <ul>
        <li><a href="https://watson-speech.mybluemix.net/text-to-speech-custom-voice.html">watson text2speech</a></li>
      </ul>

    <h4>js graph</h4>
      <ul>
        <li> <a href="/three.js/examples/">Three.js examples</a></li>
        <li> <a href="https://www.babylonjs.com/">babylonjs</a> - <a href="http://www.babylonjs-playground.com/#BCU1XR#0">examples</a></li>
        <li> <a href="https://pixijs.io/examples">pixi.js</a> examples</li>
        <li> <a href="/c64/crayon.js%20-%20example.htm">Crayon.js</a>
            <a href="/HTML5/packery/">packery</a> </li>
        <li> <a href="/demon/DART/mazes.htm">mazes (DART)</a></li>
        <li> <a href="/netart/netart.htm">netart</a>
            <a href="/netart/neurogram.htm?gallery=b0e7ffcb9fe9c1c2c743623d67008515">neurogram</a></li>
        <li> <a href="/freewall/">freewall JS</a></li>
        <!-- <li> <a href="/paper.js/examples/Paperjs.org/DivisionRaster.html">Division Raster (paperjs)</a></li> -->
        <li> <a href="/workflow/Jit/Examples/AreaChart/example1.html">AreaChart</a>
            <a href="/workflow/Jit/Examples/BarChart/example1.html">BarChart</a></li>
        <li> <a href="/workflow/Jit/Examples/ForceDirected/example1.html">ForceDirected</a></li>
        <li> <a href="/workflow/Jit/Examples/Hypertree/example1.html">Hypertree</a></li>
        <li> <a href="/workflow/Jit/Examples/Icicle/example1.html">Icicle</a>
            <a href="/workflow/Jit/Examples/Other/example1.html">Other</a></li>
        <li> <a href="/workflow/Jit/Examples/PieChart/example1.html">PieChart</a>
            <a href="/workflow/Jit/Examples/Treemap/example1.html">Treemap</a></li>
      </ul>

  </div>


  <div class="_exa">
    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('inspire/@TEXTURES/@dynamic-textures/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      $imagefile  = $image;
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"340\">";

    ?>

    <br clear="all"><br>

    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('inspire/@pixelart/frames/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      $imagefile  = $image;
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"340\">";

    ?>

    <br clear="all"><br>

  </div>


</div> <!-- container -->

<!-- FOOTER -->
</body>
</html>
