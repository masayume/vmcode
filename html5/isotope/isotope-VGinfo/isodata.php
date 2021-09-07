<?php

// 1. add https://bootsnipp.com/snippets/featured/3d-buttons-effects-fix

function gamepage($jfile) {

  $string = file_get_contents($jfile);
  $json_a = json_decode($string, true);
  $gdata = $json_a[data];
  $html_elements = "";

// print "<pre>"; print_r($json_a);
  $i = 0;

  foreach($gdata as $key=>$item) {
//    print "<h2>" . $i++ . " " .  $key . "</h2>";
//    print "<pre>"; print_r($item); exit(0);

    $class = "";
    foreach($item['class'] as $cl) {
      $class .= $cl . " ";
    }

    $game= "";
    if (isset($item[url])){
      $game="<p class=\"game\"><a href=\"{$item[url]}\" target=\"_blank\">{$item[game]}</a></p>";
    } else {
      $game="<p class=\"game\">{$item[game]}</p>";
    }

    $template =<<<TEM
  <div class="element-item $class " data-category="{$item[data_cat]}" style="background-image: url('img/{$item[img]}'); background-size: 100%;">
<!--    <h3 class="name">$key</h3> -->
<!--    <p class="symbol">{$item[symbol]}</p> -->
    $game
    <p class="number">{$item[number]}</p>
    <p class="year">{$item[year]}</p>
  </div>

TEM;

    $html_elements .= $template;

  }   

  return $html_elements;

}

