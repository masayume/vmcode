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

global $config;

$configfile = file_get_contents("mojs.json");
$config = json_decode($configfile, true);

$burst1 = burst();

$burst2 = <<<"EOB"
var burst2 = new mojs.Burst({
  radius: { 0: 200 },
  count: 12,
  children: {
    shape: 'zigzag',
    points: 8,
    stroke: { 'magenta': 'purple' },
    fill: 'none',
    strokeWidth: { 16: 0 },
    angle: { '-360': 0 },
    radius: { 20: 5 },
    opacity: { 1: 0 },
    duration: 3000
  }
});
EOB;

$burst3 = <<<"EOB"
var burst3 = new mojs.Burst({
  radius: { 0: 250 },
  count: 7,
  children: {
    color: 'green',
    points: 7,
    angle: { '-360': 0 },
    radius: { 10: 5 },
    opacity: { 1: 0 },
    duration: 3000
  }
});

EOB;

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


$js = <<<"EOJ"
'use strict';

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

$burst1

$burst2

$burst3

$circ1

$circ2

var timeline = new mojs.Timeline({
  repeat: 999
}).add(burst, burst2, burst3, circ1, circ2).play();
EOJ;

print $js;

function burst() {

$radius 	= 50 * rand(1,10);
$count 		= 2 * rand(1,10);

$children 	= children();

$burst1 = <<<"EOB"
var burst = new mojs.Burst({
  radius: { 0: $radius },
  count: $count,
  $children
});
EOB;

return $burst1;

}


function children() {

global $config;

$radius1 	= 50 * rand(1,10);
$radius2 	= 50 * rand(1,10);
$duration 	= 600 * rand(1,10);

$shape 		= $config['config']['children']['params']['shape'][array_rand($config['config']['children']['params']['shape'], 1)];

$stroke1 	= stroke1(); 

$children = <<<"EOC"
  children: {
    shape: '$shape',
    $stroke1
    strokeWidth: { 6: 0 },
    angle: { 360: 0 },
    radius: { $radius1: $radius2},
    duration: $duration
  }
EOC;

return $children;

} // end function burst

function stroke1() {
//   stroke: { 'orange': 'yellow' },
global $config;

$stroke1 	= $config['config']['children']['params']['stroke1'][array_rand($config['config']['children']['params']['stroke1'], 1)];

return "stroke: '$stroke1',";

} // end function stroke


function stroke2() {
//   stroke: { 'orange': 'yellow' },
global $config;

$stroke1 	= $config['config']['children']['params']['stroke1'][array_rand($config['config']['children']['params']['stroke1'], 1)];
$stroke2 	= $config['config']['children']['params']['stroke2'][array_rand($config['config']['children']['params']['stroke2'], 1)];

return "stroke: { '$stroke1': '$stroke2' }";

} // end function stroke



?>

</script>

</body>
</html>


