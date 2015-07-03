<?php

$path = "/rory-story/";
$dice = array(); // story-d1-1.jpg
$packs = array("story");

$extr	= 3;
$size	= "250px";

if ($_GET['dice']) {
	$extr = $_GET['dice'];
}

foreach ($packs as $pack) {
	for ($i=1; $i<=9; $i++) { // dices
		for ($j=1; $j<=6; $j++) { //faces
			$die = $pack . "-d" . $i . "-" . $j . ".jpg";
			array_push($dice, $die);
		}
	}
}
// print "<pre>"; print_r($dice);

shuffle($dice);

$dice4page = "";
for ($k=0; $k<$extr; $k++) {
	$dice4page .= "<img src=\"" . $path . array_pop($dice) . "\" style=\"width:$size\">";
}

$page = <<< EOP
	$dice4page

EOP;

print $page;

exit(0);
