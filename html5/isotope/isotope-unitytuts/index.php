<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title> UNITY3D tutorials list - masayume - isotope</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

</head>

<body>

<div id="pagetitle" style="float: left;">  
  masayume's UNITY tutorials list
</div>

<div id="sorts" class="button-group" style="float: right;">  <button class="button is-checked" data-sort-by="original-order">original order</button>
  <button class="button" data-sort-by="name">name</button>
  <button class="button" data-sort-by="year">year</button>
  <button class="button" data-sort-by="number">#</button>
  <button class="button" data-sort-by="length">length</button>
<!--
  <button class="button" data-sort-by="category">category</button>
-->
</div>

<div class="button-group" style="float: right;">  
  &nbsp;  &nbsp;
</div>

<div id="filters" class="button-group" style="float: right;">  
  <button class="button is-checked" data-filter="*">show all</button>
  <button class="button" data-filter=".project">project</button>
  <button class="button" data-filter=".2D">2D</button>
  <button class="button" data-filter=".pixelart">pixelart</button>
  <button class="button" data-filter=".arcade">arcade</button>
  <button class="button" data-filter=".movement">movement</button>
  <button class="button" data-filter=".prefab">prefab</button>
  <button class="button" data-filter=".types">types</button>
  <button class="button" data-filter=".audio">audio</button>
  <button class="button" data-filter=".automation">automation</button>
  <button class="button" data-filter=".scripting">scripting</button>
  <button class="button" data-filter=".shader">shader</button>
  <button class="button" data-filter=".assetstore">ASSETS</button>
  <button class="button" data-filter=".GUI">GUI</button>
  <button class="button" data-filter=".DONE">DONE</button>
  <button class="button" data-filter=".NOTYET">not yet</button>
<!--
  <button class="button" data-filter=".reference">refs</button>
  <button class="button" data-filter=".nihongo">nihongo</button>
  <button class="button" data-filter=".interaction">interaction</button>
  <button class="button" data-filter=".alkali, .alkaline-earth">alkali and alkaline-earth</button>
  <button class="button" data-filter=":not(.transition)">not transition</button>
  <button class="button" data-filter=".metal:not(.transition)">metal but not transition</button>
  <button class="button" data-filter="numberGreaterThan50">number > 50</button>
  <button class="button" data-filter="not(.arcade)">home - NW</button>
  <button class="button" data-filter="ing">name -ing - NW</button>
-->
</div>




<div>
<br clear="all"/>
</div>

<div class="grid">
<?php

include 'data.php';
// read gamedata.htm
// $gamedata = gamepage();
$gamedata = gamepage("unitytuts.json");
echo $gamedata;

?>
</div>

<!--
data-filter defined in js/index.js
-->

<!--
<h3>References</h3>
<div id="references">
  <a href='https://www.giantbomb.com/concepts/'>giantbomb concepts</a>
</div>
-->

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='https://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js'></script>
<script src="js/index.js"></script>

</body>
</html>
