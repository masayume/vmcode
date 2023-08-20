<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>masayume projects</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

</head>

<body>

<div id="pagetitle" style="float: left;">  
  masayume's AI page
</div>

<div id="sorts" class="button-group" style="float: right;">  <button class="button is-checked" data-sort-by="original-order">original order</button>
  <button class="button" data-sort-by="name">name</button>
  <button class="button" data-sort-by="year">year</button>
  <button class="button" data-sort-by="status">status</button>
  <button class="button" data-sort-by="length">time</button>
  <button class="button" data-sort-by="weight">complex</button>
<!--
  <button class="button" data-sort-by="category">category</button>
-->
</div>

<div class="button-group" style="float: right;">  
  &nbsp;  &nbsp;
</div>

<div id="filters" class="button-group" style="float: right;">  
  <button class="button is-checked" data-filter="*">show all</button>
  <button class="button" data-filter=".pixelart">pixelart</button>
  <button class="button" data-filter=".workflow">workflow</button>
  <button class="button" data-filter=".tool">tools</button>
  <button class="button" data-filter=".resources">resources</button>
  <button class="button" data-filter=".style">style</button>
  <button class="button" data-filter=".animation">animation</button>
  <button class="button" data-filter=".now">NOW!</button>
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

include 'topicdata.php';
// read gamedata.htm
// $gamedata = gamepage();
$topicdata = gamepage("topic.json");
echo $topicdata;

?>
</div>

<!--
data-filter defined in js/index.js
-->

<h3>References</h3>
<div id="references">
  <a href='https://www.giantbomb.com/concepts/'>giantbomb concepts</a>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='https://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js'></script>
<script src="js/index.js"></script>

</body>
</html>
