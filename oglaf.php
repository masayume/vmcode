<?php

$oglafiledir 	= '/var/www/html/inspire/@CARTOONS/Oglaf/';

$images = glob($oglafiledir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

$randomImage 	= $images[array_rand($images)]; // See comments

$rndImgUrl 	= $randomImage;

$pattern 	= "/\/var\/www\/html/";
$replacement 	= "";
$rndImgUrl 	=  preg_replace($pattern, $replacement, $rndImgUrl);

$html = <<<EOH
<html>
<head>
<style type="text/css">

.cover{
    color: rgb(255, 255, 255);
    position: relative;
    min-height: 700px;
    background: url("$rndImgUrl") no-repeat scroll 0px 100% / cover transparent;
}

nav ul li {
  list-style:none;
  float:left;
  margin-right:50px;

}

}
</style>
</head>
<body>

<div class="cover">
  <div class="clearfix"></div>
   <nav>
    <ul>
	<li>&nbsp;</li>
	<li>&nbsp;</li>
    </ul>
  </nav>
</div>

</body>
</html>
EOH;

print $html;
