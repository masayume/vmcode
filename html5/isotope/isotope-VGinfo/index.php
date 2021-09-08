<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>masayume boardgames</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="css/style.css">
  <style>@import url("https://fonts.googleapis.com/css?family=Press+Start+2P");.post .post-title {  font-family: 'Press Start 2P', cursive;  font-size: 3em;  color: #470A6C;  text-shadow: 4px 4px 0 #A42C9A;  text-transform: uppercase;  line-height: 1.3em;  font-size: 4em;  padding-right: 0;  text-align: center;}.post-header .content-author {  border-bottom: 0;}.post-header .content-author.user {  text-align: center;  color: #470A6C;}.mega-header .content-author .author-link {  color: #470A6C;  border-color: rgba(71, 10, 108, 0.5);}.mega-header {  background: #FFBF2F;}.blog-post {  background-image: linear-gradient(-180deg, #FFBF2F 0%, #FF9F00 98%);  padding-bottom: 160px;  margin-top: -120px;}.blog-post .post-content {  box-shadow: 4px 4px 0 #C93CBD, 8px 8px 0 #A42C9A, 12px 12px 0 #C93CBD, 16px 16px 0 #A42C9A, 20px 20px 0 #C93CBD, 24px 24px 0 #A42C9A, 28px 28px 0 #C93CBD, 32px 32px 0 #A42C9A, 36px 36px 0 #C93CBD, 40px 40px 0 #A42C9A, 44px 44px 0 #C93CBD, 48px 48px 0 #A42C9A, 52px 52px 0 #C93CBD, 56px 56px 0 #A42C9A, 60px 60px 0 #C93CBD, 64px 64px 0 #A42C9A, 68px 68px 0 #C93CBD, 72px 72px 0 #A42C9A, 76px 76px 0 #C93CBD, 80px 80px 0 #A42C9A, 84px 84px 0 #C93CBD, 88px 88px 0 #A42C9A;}.comment-out {  display: none;}
  </style>
</head>

<body>

<div id="pagetitle" style="float: left;">  
  &nbsp; masayume's<br/> &nbsp; VG info
</div>

<div id="sorts" class="button-group" style="float: right;">  <button class="button is-checked" data-sort-by="original-order">order</button>
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
  <button class="button" data-filter=".1977">1977</button>
  <button class="button" data-filter=".1978">1978</button>
  <button class="button" data-filter=".1979">1979</button>
  <button class="button" data-filter=".1980">1980</button>
  <button class="button" data-filter=".1981">1981</button>
  <button class="button" data-filter=".1982">1982</button>
  <button class="button" data-filter=".1983">1983</button>
  <button class="button" data-filter=".1984">1984</button>
  <button class="button" data-filter=".1985">1985</button>
  <button class="button" data-filter=".1986">1986</button>
  <button class="button" data-filter=".1987">1987</button>
  <button class="button" data-filter=".1988">1988</button>
  <button class="button" data-filter=".1989">1989</button>
  <button class="button" data-filter=".1990">1990</button>
  <button class="button" data-filter=".1991">1991</button>
  <button class="button" data-filter=".1992">1992</button>
  <button class="button" data-filter=".console">console</button>
  <button class="button" data-filter=".computer">computer</button>
  <button class="button" data-filter=".arcade">arcade</button>
  <button class="button" data-filter=".hardware">HW</button>
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

include 'isodata.php';
// read gamedata.htm
// $gamedata = gamepage();
$isodata = gamepage("vg-info.json");
echo $isodata;

?>
</div>

<!--
data-filter defined in js/index.js
-->

<h3>References</h3>
<div id="references">
  <a href='https://en.wikipedia.org/wiki/1980_in_video_games'>1980_in_video_games</a>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='https://npmcdn.com/isotope-layout@3/dist/isotope.pkgd.js'></script>
<script src="js/index.js"></script>

</body>
</html>
