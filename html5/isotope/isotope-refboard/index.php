<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>masayume boardgames</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

</head>

<body>
  <h3>masayume's Boardgames</h3>

<div id="filters" class="button-group" style="float: left;">  <button class="button is-checked" data-filter="*">show all</button>
<!--
  <button class="button" data-filter=".arcade">arcade</button>
-->
  <button class="button" data-filter=".cards">cards</button>
  <button class="button" data-filter=".checkerboard">grid</button>
  <button class="button" data-filter=".dice">dice</button>
  <button class="button" data-filter=".player">player</button>
<!--
  <button class="button" data-filter=".interaction">interaction</button>
  <button class="button" data-filter=".alkali, .alkaline-earth">alkali and alkaline-earth</button>
  <button class="button" data-filter=":not(.transition)">not transition</button>
  <button class="button" data-filter=".metal:not(.transition)">metal but not transition</button>
  <button class="button" data-filter="numberGreaterThan50">number > 50</button>
  <button class="button" data-filter="not(.arcade)">home - NW</button>
  <button class="button" data-filter="ing">name -ing - NW</button>
-->
</div>

<div id="sorts" class="button-group" style="float: right;">  <button class="button is-checked" data-sort-by="original-order">original order</button>
  <button class="button" data-sort-by="game">name</button>
  <button class="button" data-sort-by="symbol">symbol</button>
  <button class="button" data-sort-by="number">number</button>
  <button class="button" data-sort-by="length">length</button>
  <button class="button" data-sort-by="category">category</button>
</div>



<div>
<br clear="all"/>
</div>

<div class="grid">
<?php

include 'gamedata.php';
// read gamedata.htm
// $gamedata = gamepage();
$gamedata = gamepage("boardgames.json");
echo $gamedata;

?>
</div>

<!--
data-filter defined in js/index.js
-->

<h3>References</h3>
<div id="references">
  <a href='https://www.giantbomb.com/concepts/'>giantbomb concepts</a>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='http://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js'></script>
<script src="js/index.js"></script>

</body>
</html>