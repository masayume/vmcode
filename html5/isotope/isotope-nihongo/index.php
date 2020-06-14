<!DOCTYPE html>
<html lang="ja-jp">
<head>
  <meta charset="UTF-8">
  <title>masayume - japanese grammar forms N5, N4, N3 (WiP)</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

<!------ sidebar ---------->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        h1, h1:lang(ja-jp) { 
            font-family: serif; 
            font-size: 24px; 
            font-weight: normal; 
            }
        h2, h2:lang(ja-jp) { 
            font-family: sans-serif; 
            font-size: 24px; 
            font-weight: normal; 
            }
        h3, h3:lang(ja-jp) { 
            font-family: cursive; 
            font-size: 24px; 
            font-weight: normal; 
            }
    </style>
</head>

<!--

TO DO: 

usare i panel come in catalogo su monicamarelli/ART
onomatopee: https://www.tofugu.com/japanese/japanese-onomatopoeia/

-->

<body>

<!-- START DYNAMIC SIDEBAR -->
<!--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="wrapper">
    <aside class="main_sidebar">
        <ul>
            <li><i class="fa fa-arrows"></i><a href="#">arrows</a></li>
            <li><i class="fa fa-battery-2"></i><a href="#">battery</a></li>
            <li class="active"><i class="fa fa-bell"></i><a href="#">bell</a></li>
            <li><i class="fa fa-bicycle"></i><a href="#">bicycle</a></li>
            <li><i class="fa fa-circle"></i><a href="#">circle</a></li>
            <li><i class="fa fa-crosshairs"></i><a href="#">crosshairs</a></li>
            <li><i class="fa fa-deaf"></i><a href="#">deaf</a></li>
            <li><i class="fa fa-desktop"></i><a href="#">desktop</a></li>
            <li><i class="fa fa-dot-circle-o"></i><a href="#">dot</a></li>
            <li><i class="fa fa-folder"></i><a href="#">folder</a></li>
        </ul>
    </aside>
    <div class="main">
      <h3>masayume - japanese grammar</h3>
    </div>
</div>
-->
<!-- END DYNAMIC SIDEBAR -->

<div class="main">

<div class="ui-group" >
  <div id="pagetitle" style="float: left;">
      masayume - japanese grammar forms N5, N4, N3 (WiP)
  </div>

  <div id="filters" class="button-group" style="float: right;">  
    <button class="button is-checked" data-filter="*">show all</button>
    <button class="button" data-filter=".N5">N5</button>
    <button class="button" data-filter=".N4">N4</button>
    <button class="button" data-filter=".N3">N3</button>
    <button class="button" data-filter=".dictionary">dict.</button>
    <button class="button" data-filter=".masu">masu</button>
    <button class="button" data-filter=".desu">desu</button>
    <button class="button" data-filter=".plain">plain</button>
    <button class="button" data-filter=".te">te</button>
    <button class="button" data-filter=".ta">ta</button>
    <button class="button" data-filter=".meanings">+ means</button>
    <button class="button" data-filter=".negative">neg.</button>
    <button class="button" data-filter=".passive">pass.</button>
    <button class="button" data-filter=".adjective">adj.</button>
    <button class="button" data-filter=".conjunction">conj.</button>
    <button class="button" data-filter=".volitional">volit.</button>

  <!-- EXAMPLES 
    <button class="button" data-filter=":not(.transition)">not transition</button>
    <button class="button" data-filter=".metal:not(.transition)">metal but not transition</button>
    <button class="button" data-filter="numberGreaterThan50">number > 50</button>
    <button class="button" data-filter="not(.arcade)">home - NW</button>
    <button class="button" data-filter="ing">name -ing - NW</button>
  -->
  </div>

<!-- SORTING
  <div id="sorts" class="button-group" style="float: right;">  
    <button class="button is-checked" data-sort-by="original-order">order</button>
    <button class="button" data-sort-by="name">name</button>
    <button class="button" data-sort-by="category">category</button>
  </div>
-->

</div>

<div>
  <br clear="all" />
</div>

<div class="grid">
<?php

include 'pagedata.php';

$data = page("topic.json");
echo $data;

?>
</div>

<!--
data-filter defined in js/index.js
-->


<h3>References</h3>
<div id="references">
  <ul>
    <li><a href='https://isotope.metafizzy.co/'>isotope</a></li>
    <li><a href='https://www.masayume.it/blog/category/categorie/asia'>masayume "asia" category</a></li>
    <li><a href='https://doyouknowjapan.com/'>do you know japan ?</a></li>
    <li><a href='https://www.masayume.it/nihongo/random-kanji-flashcards/kanjipage.php'>masayume - kanji page</a></li>
    <li><a href='https://www.patreon.com/miku_real_japanese'>Miku Real Japanese</a></li>

<!--
    <li><a href='LINK'>link name</a></li>
    <li><a href='LINK'>link name</a></li>
    <li><a href='LINK'>link name</a></li>
    <li><a href='LINK'>link name</a></li>
-->
  </ul>
</div>

    </div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='https://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js'></script>
<script src="js/index.js"></script>

<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-89665-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-89665-1');
</script>

</body>
</html>
