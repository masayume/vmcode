<?php

// 1. add https://bootsnipp.com/snippets/featured/3d-buttons-effects-fix

function gamepage($jfile) {

  $string = file_get_contents($jfile);
  $json_a = json_decode($string, true);
  $gdata = $json_a['data'];
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

    $score  = str_replace('%', '', $item['score']);

    $cast   = implode(', ', $item['cast']);

    $author = implode(', ', $item['author']);

    $genre  = implode(' ', $item['theme']);

    $urlWF = "";
    if ( isset($item['url_WF']) ) {
      $urlWF = "<a href=" . $item['url_WF'] . " target='_blank'>WF Page</a>";
    } 

    $template =<<<TEM
      <div class="element-item $class $genre overcard" data-category="{$item['data_cat']}" style="background-image: url('img/{$item['img']}'); background-size: 100%;">
        <p class="name" title="{$item['tagline']}"><a href='{$item['url']}'>{$item['name']}</a></p>
        <p class="year">{$item['year']}</p>
        <p class="author" title="cast: $cast">{$author}</p>
        <p class="length">{$item['length']}</p>
        <p class="minutes">{$item['minutes']}</p>
        <p class="perc">{$item['score']}</p>
        <p class="score">{$score}</p>
        <p class="genre" title="{$item['overview']}">{$genre}</p>
      </div>

TEM;

    $html_elements .= $template;

  }   

  return $html_elements;

}

