<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title> BOOKS - masayume - isotope</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

</head>

<body>

<div id="pagetitle" style="float: left;">  
  masayume's BOOKS
</div>

<div id="sorts" class="button-group" style="float: right;">  <button class="button is-checked" data-sort-by="original-order">original order</button>
  <button class="button" data-sort-by="name">name</button>
  <button class="button" data-sort-by="year">year</button>
  <button class="button" data-sort-by="number">number</button>
  <button class="button" data-sort-by="length">duration</button>
  <button class="button" data-sort-by="weight">complexity</button>
<!--
  <button class="button" data-sort-by="category">category</button>
-->
</div>

<div class="button-group" style="float: right;">  
  &nbsp;  &nbsp;
</div>

<div id="filters" class="button-group" style="float: right;">  
  <button class="button is-checked" data-filter="*">show all</button>
  <button class="button" data-filter=".narrativa">lit</button>
  <button class="button" data-filter=".tools">tools</button>
  <button class="button" data-filter=".comics">comix</button>
  <button class="button" data-filter=".books">books</button>
  <button class="button" data-filter=".artworks">artworks</button>
  <button class="button" data-filter=".magazines">mags</button>
  <button class="button" data-filter=".gamedesign">game design</button>
  <button class="button" data-filter=".design">design</button>
  <button class="button" data-filter=".reference">refs</button>
  <button class="button" data-filter=".cinema">cinema</button>
  <button class="button" data-filter=".digital">digital</button>
  <button class="button" data-filter=".nihongo">nihongo</button>
  <button class="button" data-filter=".psychology">psych/creat</button>
  <button class="button" data-filter=".meditation">meditation</button>
  <button class="button" data-filter=".knowledge">knowledge</button>
  <button class="button" data-filter=".vintage">vintage</button>
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




<div>
<br clear="all"/>
</div>

<div class="grid">
<?php

include 'bookdata.php';
// read gamedata.htm
// $gamedata = gamepage();
$gamedata = gamepage("books.json");
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
