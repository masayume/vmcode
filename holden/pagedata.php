<?php


$float = "";



function page2($dir1, $dir2, $tag1, $tag2) {

  global $float;
  $float = "float: left; ";
  $template1 = pagenewtemp($dir1, $tag1);
  $float = "float: right; ";
  $template2 = pagenewtemp($dir2, $tag2);

  $html_elements .= "<div class=\"container\"><div class=\"row\">" . "\n\n" . $template1 . "\n\n" . $template2 . "\n\n" . "</div>";
    
  return $html_elements;

} // end function page2



function pagenewtemp($dir, $tag) {

  global $float; 
  $dir_fullpath   = '/var/www/html' . $dir; 
  
  $files = glob("$dir_fullpath/*$tag*.{jpg,png,gif,webp}", GLOB_BRACE);
  
  $imgnum = rand(1, count($files));
  
    $file = preg_replace('/^\/var\/www\/html/', "", $files[$imgnum]);
    $imagename = explode('/', $file);

    $twitterRaw = end($imagename);
    $twitterRaw2 = preg_replace('/^0-tw-/', "tw-", $twitterRaw);

    print "<br>" . $file . " - " . $tag . "<br>twitterRaw: " . $twitterRaw . "<br>twitterRaw2: " . $twitterRaw2;

    $twitterRaw3 = $twitterRaw2;

    if (preg_match('/^tw-/', $twitterRaw2) ){
      $exploded = explode('-', $twitterRaw2);
      $twitterRaw3 = "<a href='https://twitter.com/" . $exploded[1] . "/media' target='_blank' title='" . $file. "'>" . $exploded[1] . "</a>";
    }  elseif (preg_match('/^sb-/', $twitterRaw2) ){
      $exploded = explode('-', $twitterRaw2);
      // print "<pre>"; print_r($exploded) ;
      $twitterRaw3 = "<a href='https://safebooru.org/index.php?page=post&s=list&tags=" . $exploded[1] . "' target='_blank' title='" . $file . "'> safebooru: " . $exploded[1] . "</a>";
    }

    $template =<<<TEM
      <div class="col" data-category="{$item[data_cat]}" style="$float background-image: url('img/{$item[img]}'); background-size: cover; alt='$file'">
        <img src="$file" style="width: 100%;" title="$file">
          <br />
          twitter: <b>$twitterRaw3</b>
          <br />
          <small><small>$file</small></small>
      </div>
  TEM;
  
    $html_elements .= $template;
      
    return $html_elements;
  
} // end function page


function page($dir, $tag) {

  global $float; 
  $dir_fullpath   = '/var/www/html' . $dir; 

  $files = glob("$dir_fullpath/*.{jpg,png,gif}", GLOB_BRACE);

  $imgnum = rand(1, count($files));

  $file = preg_replace('/^\/var\/www\/html/', "", $files[$imgnum]);

  $template =<<<TEM
    <!-- <div class="element-item $class " data-category="{$item[data_cat]}" style="$float background-image: url('img/{$item[img]}'); background-size: cover; alt='$file'"> -->
    <div class="element-item $class " data-category="{$item[data_cat]}" style="$float; background-size: cover;" alt='$file' >
      <img src="$file">
        <br />
        $file
    </div>
TEM;

  $html_elements .= $template;
    
  return $html_elements;

} // end function page


function video($dir) {

  global $float; 
  $dir_fullpath   = '/var/www/html' . $dir; 

  $files = glob("$dir_fullpath/*.{mp4,mkv,webm}", GLOB_BRACE);

  // print "<pre>"; print_r($files); exit(0);

  $imgnum = rand(1, count($files)) - 1;

  $file = preg_replace('/^\/var\/www\/html/', "", $files[$imgnum]);

  $template =<<<TEM
      <div class="element-item $class ">

	<video width="960" height="480" controls>
	  <source src="$file" type="video/mp4">
	  Your browser does not support the video tag.
	</video>

        <br />
        $file
      </div>
TEM;

  $html_elements .= $template;
    
  return $html_elements;

} // end function video


function pageold($jfile) {

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

    $template =<<<TEM
  <div class="element-item $class " data-category="{$item[data_cat]}" style="background-image: url('img/{$item[img]}'); background-size: 100%;">
    <h3 class="name">{$item[img]}</h3>
    <p class="symbol">{$item[symbol]}</p>
    <p class="express">{$item[express]}</p>
    <p class="example">{$item[example]}</p>
    <p class="translate">{$item[translate]}</p>
    <p class="number">{$item[number]}</p>
    <p class="level">{$item[level]}</p>
  </div>
TEM;

    $html_elements .= $template;

  }   

  return $html_elements;

}

