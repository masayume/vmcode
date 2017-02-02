<?php

$base_dir = '/bouletmaton/assets/';




$papier_url 	= $base_dir . 'papier/papier.jpg';

$peau 			= 'peau' . mt_rand(1,4);									// peau 		1-4
$tete_url		= $base_dir . $peau . '/tete'. mt_rand(1,54) . '.png';			// 	tete 	1-54
$bou_url		= $base_dir . $peau . '/bou'. mt_rand(1,62) . '.png';			// 	bou 	1-62
$cor_url		= $base_dir . $peau . '/cor'. mt_rand(1,27) . '.png';			// 	cor		1-27
$nez_url		= $base_dir . $peau . '/nez'. mt_rand(1,26) . '.png';			// 	nez		1-26
$ore_url		= $base_dir . $peau . '/ore'. mt_rand(1,7) . '.png';			// 	ore		1-7
$divers_url		= $base_dir . $peau . '/divers'. mt_rand(1,12) . '.png';		// 	divers	1-12

$tache_url		= $base_dir . 'tache/tache'. mt_rand(1,4) . '.png';				// tache	1-4
$yeux_url		= $base_dir . 'yeux/ye'. mt_rand(1,48) . '.png';				// 	ye 		1-48

$sourcils_url	= $base_dir . 'sourcils/so'. mt_rand(1,21) . '.png';			// sourcils	1-21
$lunette_url	= $base_dir . 'lunette/lunette'. mt_rand(1,16) . '.png';		// lunette	1-16

$coul 			= 'coul' . mt_rand(1,12);									// coul 	1-12
$bar_url		= $base_dir . $coul . '/bar'. mt_rand(1,14) . '.png';		 	// 	bar		1-14
$coi_url		= $base_dir . $coul . '/coi'. mt_rand(1,33) . '.png';	 		// 	coi		1-33

$col_url		= $base_dir . 'col' . '/col'. mt_rand(1,11) . '.png';		 	// col		1-11
$chapeau_url	= $base_dir . 'chapeau' . '/chapo'. mt_rand(1,19) . '.png'; 	// 	chapo	1-19

$divs = <<< DIV
	<div id='div0' "><img id="myImage-59-0" width="" src="$papier_url" ></div>		<!-- background -->
	<div id='div1' "><img id="myImage-59-0" width="" src="$cor_url" ></div>			<!-- body -->
	<div id='div3' "><img id="myImage-59-0" width="" src="$tete_url" ></div>		<!-- head -->
	<div id='div11' "><img id="myImage-59-0" width="" src="$bou_url" ></div>		<!-- mouth -->
	<div id='div16' "><img id="myImage-59-0" width="" src="$nez_url" ></div>		<!-- nose -->
	<div id='div16' "><img id="myImage-59-0" width="" src="$ore_url" ></div>		<!-- ears -->
	<div id='div9' "><img id="myImage-59-0" width="" src="$yeux_url" ></div>		<!-- eyes -->
	<div id='div10' "><img id="myImage-59-0" width="" src="$sourcils_url" ></div>	<!-- brows -->
	<div id='div13' "><img id="myImage-59-0" width="" src="$coi_url" ></div>		<!-- hair -->
DIV;


if (mt_rand(1,100) > 75) {
	$divs .= "<div id='div2' \"><img id=\"myImage-59-0\" width=\"\" src=\"$col_url\" ></div>		<!-- scarves -->";	
}
if (mt_rand(1,100) > 75) {
	$divs .= "<div id='div7' \"><img id=\"myImage-59-0\" width=\"\" src=\"$divers_url\" ></div>		<!-- hands -->";
}
if (mt_rand(1,100) > 50) {
	$divs .= "<div id='div8' \"><img id=\"myImage-59-0\" width=\"\" src=\"$tache_url\" ></div>		<!-- face marks -->";
}
if (mt_rand(1,100) > 50) {
	$divs .= "<div id='div11' \"><img id=\"myImage-59-0\" width=\"\" src=\"$lunette_url\" ></div>	<!-- glasses -->";
}
if (mt_rand(1,100) > 60) {
	$divs .= "<div id='div12' \"><img id=\"myImage-59-0\" width=\"\" src=\"$bar_url\" ></div>		<!-- beards -->";
}
if (mt_rand(1,100) > 70) {
	$divs .= "<div id='div17' \"><img id=\"myImage-59-0\" width=\"\" src=\"$chapeau_url\" ></div>	<!-- hats -->";
}

$page = <<< EOP

<html><head>
<title>bouletmaton</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
<style type="text/css">
a:link  { color:#ffffff; } 
a:visited { color:#ffffff; } 
</style>
<link rel="stylesheet" type="text/css" href="/css/overcss.css">
</head>
<body>
<div id="container" class="scene" style="display:inline-block; background-color: #000000; top: -80px; padding-left: 0px;">

$divs

</div>
</body>

EOP;

echo $page;

?>
