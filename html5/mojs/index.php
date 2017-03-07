<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Intro to Mo.js</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <script src='js/mo.min.js'></script>

  <script type="text/javascript">

<?php

$js = <<<"EOJ"
'use strict';

var _extends = Object.assign || function (target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i]; for (var key in source) { if (Object.prototype.hasOwnProperty.call(source, key)) { target[key] = source[key]; } } } return target; };

var burst = new mojs.Burst({
  radius: { 0: 150 },
  count: 20,
  children: {
    shape: 'cross',
    stroke: 'red',
    strokeWidth: { 6: 0 },
    angle: { 360: 0 },
    radius: { 50: 5 },
    duration: 3000
  }
});

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

var circ_opt = {
  radius: { 0: 100 },
  fill: 'grey',
  stroke: { 'orange': 'yellow' },
  opacity: { 1: 0 },
  duration: 3500
};

var circ_opt2 = {
  radius: { 0: 300 },
  fill: 'none',
  stroke: { 'white': 'green' },
  opacity: { 1: 0 },
  duration: 3500
};

var circ1 = new mojs.Shape(_extends({}, circ_opt, {
  delay: 1000
}));

var circ2 = new mojs.Shape(_extends({}, circ_opt2, {
  delay: 500
}));

var timeline = new mojs.Timeline({
  repeat: 999
}).add(burst, burst2, burst3, circ1, circ2).play();
EOJ;

print $js;

?>

</script>

</body>
</html>


