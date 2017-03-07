<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Mo.js app</title>
      <link rel="stylesheet" href="css/style.css">
</head>
<body>

<a href="http://mojs.io/tutorials/shape/">tut</a>
  <script src='js/mo.min.js'></script>
  <script type="text/javascript">

<?php

/*
REFERENCE:
https://css-tricks.com/introduction-mo-js/
*/

global $config;

$configfile = file_get_contents("mojs.json");
$config = json_decode($configfile, true);

$burst1 = burst(1);

$burst2 = burst(2);

$burst3 = burst(3);

$circ1 = <<<"EOC"
var circ_opt = {
  radius: { 0: 100 },
  fill: 'grey',
  stroke: { 'orange': 'yellow' },
  opacity: { 1: 0 },
  duration: 3500
};

var circ1 = new mojs.Shape(_extends({}, circ_opt, {
  delay: 1000
}));
EOC;

$circ2 = <<<"EOC"
var circ_opt2 = {
  radius: { 0: 300 },
  fill: 'none',
  stroke: { 'white': 'green' },
  opacity: { 1: 0 },
  duration: 3500
};

var circ2 = new mojs.Shape(_extends({}, circ_opt2, {
  delay: 500
}));
EOC;

$burstchance    = rand(1,100);
$burststr       = "";

if ($burstchance < 33) {
  $burststr = "burst1, ";
} else if ($burstchance < 66) {
  $burststr = "burst1, burst2, ";
} else {
  $burststr = "burst1, burst2, burst3, ";
}

$js = <<<"EOJ"
'use strict';

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

$burst1

$burst2

$burst3

$circ1

$circ2

var timeline = new mojs.Timeline({ repeat: 999 }).add($burststr circ1, circ2).play();
EOJ;

print $js;




function burst($type) {

  $radius 	 = 50 * rand(1,10);
  $count 		 = 2 * rand(1,10);

  $children  = ""; 
  if ($type == 1) {
    $children   = children($type);
  } else {
    $children   = children($type);
  }

  $burst1 = <<<"EOB"
  var burst$type = new mojs.Burst({
    radius: { 0: $radius },
    count: $count,
    $children
  });
EOB;

  return $burst1;

}


function children() {

global $config;

$radius1 	  = 50 * rand(1,10);
$radius2 	  = 50 * rand(1,7);
$duration 	= 600 * rand(1,10);
$points     = 4 * rand(1,5);

$shape 		  = $config['config']['children']['params']['shape'][array_rand($config['config']['children']['params']['shape'], 1)];
$color      = $config['config']['children']['params']['stroke1'][array_rand($config['config']['children']['params']['stroke1'], 1)];

$stroke1 	  = stroke1(); 
$stroke2    = stroke2(); 

$strokeWidth 	= 6 * rand(1,3);
$angle 		 = 60 * rand(1,6);

$children = "";

if ($type == 1) {
  $children = <<<"EOC"
    children: {
      shape: '$shape',
      $stroke1,
      strokeWidth: { $strokeWidth: 0 },
      angle: { $angle: 0 },
      radius: { $radius1: $radius2},
      duration: $duration
    }
EOC;

  } else if ($type == 2) {

  $children = <<<"EOC"
    children: {
      shape: '$shape',
//      points: $points,
      $stroke2, 
      fill: 'none',
      strokeWidth: { $strokeWidth: 0 },
      angle: { '-$angle': 0 },
      radius: { $radius1: $radius2 },
      opacity: { 1: 0 },
      duration: $duration
    }
EOC;

  } else if ($type == 3) {

  $children = <<<"EOC"
    children: {
      color: '$color',
      points: $points,
      angle: { '-$angle': 0 },
      radius: { $radius1: $radius2 },
      opacity: { 1: 0 },
      duration: $duration
    }

EOC;

  } else {

  $children = <<<"EOC"
    children: {
      shape: '$shape',
//      points: $points,
      $stroke2, 
      fill: 'none',
      strokeWidth: { $strokeWidth: 0 },
      angle: { '-$angle': 0 },
      radius: { $radius1: $radius2 },
      opacity: { 1: 0 },
      duration: $duration
    }
EOC;

  }



return $children;

} // end function children1


function stroke1() {
//   stroke: { 'orange': 'yellow' },
global $config;

$stroke1 	= $config['config']['children']['params']['stroke1'][array_rand($config['config']['children']['params']['stroke1'], 1)];

return "stroke: '$stroke1',";

} // end function stroke1


function stroke2() {
//   stroke: { 'orange': 'yellow' },
global $config;

$stroke1 	= $config['config']['children']['params']['stroke1'][array_rand($config['config']['children']['params']['stroke1'], 1)];
$stroke2 	= $config['config']['children']['params']['stroke2'][array_rand($config['config']['children']['params']['stroke2'], 1)];

return "stroke: { '$stroke1': '$stroke2' }";

} // end function stroke2



?>

</script>

</body>
</html>


