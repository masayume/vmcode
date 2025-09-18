<html>
<head>
<title>GAMES page</title>
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
      $ai_dirs    = array('inspire/@CARDS/cosmogony/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      $imagefile  = $image;
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"360\">";

    ?>

    <p>
      <a href="/cosmo/cosmogony02"> cosmogony </a>
    </p>
<!--
    <br />
      <h4>PROJECTS done</h4>
          <ul>
          </ul>
-->

  </div>
 
  
  <div class="_exa">

    <h4>MTG TOOLS</h4>
      <ul>
        <li><a href="http://www.deckcheck.co" target="_blank"><b>deckcheck</b></a>
        <li><a href="https://mtg.cardsrealm.com/en-us/decks/" target="_blank"><b>cardsrealm decks</b></a>
        <li><a href="https://managathering.com/manarocks.html" target="_blank"><b>manarocks</b></a>
        <li><a href="https://www.wargamer.com/magic-the-gathering/planeswalkers" target="_blank"><b>planeswalkers</b></a>
        <li><a href="https://archidekt.com/sandbox" target="_blank"><b>archidekt</b></a>
        <li><a href="https://aetherhub.com/Deck/Builder/" target="_blank"><b>aetherhub</b></a>
        <li><a href="https://www.reddit.com/r/mtg/" target="_blank"><b>reddit MTG</b></a>
        <li><a href="https://www.reddit.com/r/MagicArena/" target="_blank"><b>reddit Arena</b></a>
        <li><a href="https://mtgazone.com/decks/" target="_blank"><b>MTGA zone</b></a>
        <li><a href="https://mtga.untapped.gg/" target="_blank"><b>MTGA untapped</b></a>
        <li><a href="https://mtgaassistant.net/Meta/Standard-BO1/Deck/mono-red-1358633" target="_blank"><b>MTGA Assistant</b></a>

      </ul>

  </div>


  <div class="_exa">

    <h4>Boardgames</h4>
      <ul>
        <li><a href="/html5/isotope/isotope-boardgame/"><b>ISOboardgame</b></a></li>  
        <li><a href="/HTML5/a4-page/index.htm">card print template</a></li>    
      </ul>

  </div>


  <div class="_exa">

    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('inspire/@CARDS/LOST_ARCANA/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      $imagefile  = $image;
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"350\">";

    ?>

  </div>


  <div class="_exa">
    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('inspire/@gnokkenland/M/marina/tarots/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      $imagefile  = $image;
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"340\">";

    ?>

    <br clear="all"><br>

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

  </div>


  <div class="_exa">
    <!-- php_image_show -->
    <?php
      $ai_dirs    = array('inspire/@CARDS/LOST_ARCANA/other_renders/');
      $directory  = $ai_dirs[array_rand($ai_dirs, 1)];
      $images     = glob($directory . '*.{jpg,jpeg,png,gif,webp}', GLOB_BRACE);
      $image      = $images[array_rand($images)];
      $imagefile  = $image;
      echo "      <img src=\"" . $imagefile . "\" title=\"$imagefile\" width=\"340\">";

    ?>

    <br clear="all"><br>

  </div>



  <div class="_exa">
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
