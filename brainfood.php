<?php

$brainfoodFile  = '/home/masayume/git/vmcode/brainfood.infogen.txt';
$handle         = fopen($brainfoodFile, "r") or die("Unable to open file $brainfoodFile !");
$bfcontent      = fread($handle,filesize($brainfoodFile));
fclose($handle);

$brainfoods      = explode('===', $bfcontent);

echo $brainfoods[array_rand($brainfoods)];
echo "";

?>