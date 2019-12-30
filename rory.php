<?php

$path = "/VM/rory/story/";		// directory immagini (in realtà /home/masayume/DATA/E/Temp/HTML5/rory/ => )
$dice = array(); // story-d1-1.jpg	// array del dado globale
$rdie = array();
$packs = array("story");		

$extr	= 3;
$size	= "250px";

if ($_GET['dice']) {
	$extr = $_GET['dice'];
}

// DICE DEFINITION LOOP

foreach ($packs as $pack) {
	for ($i=1; $i<=9; $i++) { // dices
		for ($j=1; $j<=6; $j++) { //faces
			$die = $pack . "-d" . $i . "-" . $j . ".jpg";
			array_push($dice, $die);
			array_push($rdie[$i], $die);
		}
	}
}

// SHUFFLE

shuffle($dice);

// DIE PREPARATION

$dice4page = "";
for ($k=0; $k<$extr; $k++) {
	$dice4page .= "<div class=\"_exa\"><img src=\"" . $path . array_pop($dice) . "\" style=\"width:$size\"></div>";
}

// GLOBAL PAGE LAYOUT

$page = <<< EOP
<html>
<head>	
	<style>
.container{ text-align:center; border:1px solid #666; }
._img{ display:inline-block; margin:5px 20px; padding:5px; border:1px solid #CCC; }
._text{ display:inline-block; margin:5px 20px; padding:5px; border:1px solid #CCC; top: 0px; }
._exa{ display:inline-block; margin:5px 6px; padding:5px; border:1px solid #CCC; top: 0px; vertical-align: text-top;}
		
	</style>
</head>
<body>
<div class="container">
	$dice4page
</div>
</body>
</html>
EOP;

print $page;



exit(0);
