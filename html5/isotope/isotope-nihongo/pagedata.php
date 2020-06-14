<?php

// grammar reference N5: https://en.wikibooks.org/wiki/JLPT_Guide/JLPT_N5_Grammar

function page($jfile) {

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

    $video = "";
    $vid_i = 0;
    if ( !empty($item['video']) ) {
      foreach($item['video'] as $vid) {
        $vid_i++;
        $video .=  "<p class='video{$vid_i}'><a href=$vid target='_blank'>video $vid_i</a></p>";
      }

    } 

    $meanings = "";
    if ( !empty($item['meanings']) ) {
      $meanings = $item['meanings'];
    } 


    $template =<<<TEM
  <div class="element-item $class " data-category="{$item['data_cat']}" style="background-image: url('img/{$item['img']}'); background-size: 100%;">
    <h3 class="name">$key $meanings</h3>
    <p class="symbol">{$item['symbol']}</p>
    <p class="express">{$item['express']}</p>
    <p class="example">{$item['example']}</p>
    <p class="translate">{$item['translate']}</p>
    <p class="number">{$item['number']}</p>
    $video
    <p class="level">{$item['level']}</p>
  </div>
TEM;

    $html_elements .= $template;

  }   

  return $html_elements;

}

