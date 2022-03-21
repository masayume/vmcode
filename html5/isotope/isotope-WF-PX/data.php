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

    $books = "";
    if ($item[books]) {
      $books = $item[books] . " vol ";
    } else {
      $books = $item[length] . " min";
    }

    $template =<<<TEM
      <div class="element-item $class overcard" data-category="{$item[data_cat]}" style="background-image: url('img/{$item[img]}'); background-size: 100%;">
        <p class="name"><a href='{$item[url]}'>{$item[name]}</a></p>
        <p class="number">{$item[number]}</p>
        <p class="year">{$item[year]}</p>
        <p class="rating">r:{$item[rating]}</p> 
        <p class="length">{$item[length]}</p>
        <p class="weight">d:{$item[weight]}</p> 
        <p class="book">$books</p>
      </div>

TEM;

    $html_elements .= $template;

  }   

  return $html_elements;

}

