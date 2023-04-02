<?php

$version = '1.1';

$jfile = $_GET['jfile'];
if (!$jfile) {
  $jfile = "os";
} else if ($jfile == 1) {
  $jfile = "myos";  
} else if ($jfile == 2) {
  $jfile = "prompts";  
} else if ($jfile == 3) {
  $jfile = "theme";  
} 
$jfile = $jfile . ".js";
$bfile = $jfile;

$page =<<< "EOP"
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>masayume oblique taktix - ver. $version</title>
  <link rel="stylesheet" href="utilities/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
  <script src="utilities/jquery.bigSlide.min.js"></script>
  <style>
.wrapper {
  background-image: url("img/$bfile.jpg");
  display: flex;
  justify-content: center;
  align-items: center;
  background-repeat: no-repeat;
  background-size: cover;
  opacity: 0.9;
  width: 100%;
  height: 100%;
}
  </style>
<!-- to delete -->
<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
</head>

<body >
  <div class="wrapper">

    <div id="site-id" class="overlay-box">
      <a href="https://www.masayume.it">masayume.it</a>
    </div>


    <div id="positionController" class="hide">
      <div id="controllerToggle" class="overlay-box no-select">
        <a href="#menu" class="menu-link">&#9776;</a>
      </div>
    </div>

  <button class="KanjiCard" id="card">
    <div id="overcard" ></div>
      <img class="KanjiCard_bimage" id="bimage" src="img/cards/000.png" />
      <p class="KanjiCard_kanji" id="kanji"></p>
      <p class="KanjiCard_kana" id="kana"></p>
      <div class="KanjiCard_translation" id="translation"></div>
      <div class="KanjiCard_words" id="words"></div>
      <div class="KanjiCard_descr" id="descr"></div>
  </button>

</div>

    <div id="menu" class="panel" role="navigation">
        <br />
        <ul>
            <li>"oblique tactics " - v. $version</li>
            <li>&nbsp;</li>
            <li><a href="index.php"><span class="icon-github nav-icon"></span>standard oblique strategies</a></li>
            <li><a href="index.php?jfile=2"><span class="icon-github nav-icon"></span>Taktix (prompts)</a></li>
            <li><a href="index.php?jfile=1"><span class="icon-github nav-icon"></span>Taktix (improve)</a></li>
            <li>&nbsp;</li>
            <li><b>Credits:</b></li>
            <li><a href="http://codepen.io/reccanti/pen/BjwOev"><span class="icon-cog nav-icon"></span>Random Kanji Card by B. Wilcox</a></li>
            <li><a href="https://en.wikipedia.org/wiki/Oblique_Strategies"><span class="icon-cog nav-icon"></span>Oblique Strategies</a></li>
            <li><a href="https://dev.w3.org/html5/html-author/charref"><span class="icon-cog nav-icon"></span>Charref</a></li>
        </ul>
    </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'></script>

  <script src="php/info.php?file=$jfile"></script>
  <script src="js/index.js"></script>


<!--    <script src="utilities/jquery.min.js"></script> -->
    <script src="utilities/bigSlide.js"></script>
    <script>
        $(document).ready(function() {
            $('.menu-link').bigSlide();
        });
    </script>

</body>

<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-89665-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-89665-1');
</script>

</html>

EOP;

print $page;

exit(0);
