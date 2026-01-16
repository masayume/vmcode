<?php

// use ./align2git.sh to sync to ~/git/vmcode/holden

global $glob_res;

$float = "";

function page2($dir1, $dir2, $tag1, $tag2) {

  global $float;
  global $html_elements;
  $float = "float: left; ";
  $template1 = pagenewtemp($dir1, $tag1);
  $float = "float: right; ";
  $template2 = pagenewtemp($dir2, $tag2);

  $html_elements .= "<div class=\"container\" style=\"max-width: 90%\"><div class=\"row\">" . "\n\n" . $template1 . "\n\n" . $template2 . "\n\n" . "</div>";
    
  return $html_elements;

} // end function page2

function count_assets($dir, $tag) {

  $dir_fullpath   = '/var/www/html' . $dir; 
  
  $files = glob("$dir_fullpath/*$tag*.{jpg,png,gif,webp,mp4}", GLOB_BRACE);

  return count($files);

}


function pagenewtemp($dir, $tag) {

  global $float; 
  global $glob_res;

  $dir_fullpath   = '/var/www/html' . $dir; 
  
  $files = glob("$dir_fullpath/*$tag*.{jpg,png,gif,webp,mp4}", GLOB_BRACE);

  // print "pagenewtemp<br><pre>"; print_r($files); print "</pre>";

  $glob_res[$tag] = count($files);

  $imgnum = rand(1, count($files)) - 1;
  
    $file = preg_replace('/^\/var\/www\/html/', "", $files[$imgnum]);
    $imagename = explode('/', $file);

    $twitterRaw = end($imagename);
    $twitterRaw2 = preg_replace('/^0-tw-/', "tw-", $twitterRaw);

//    print "<br>" . $file . " - " . $tag . "<br>twitterRaw: " . $twitterRaw . "<br>twitterRaw2: " . $twitterRaw2;

    $twitterRaw3 = $twitterRaw2;

    /*  = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
          DECODE EXTERNAL ACCOUNTS 
        = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = */

    //    VaporwaveAesthetics
    if (preg_match('/^tw-/', $twitterRaw2) ){         // calculate TWITTER link
      $exploded = explode('-', $twitterRaw2);
      $twitterRaw3 = "<b>twitter:</b> <a href='https://twitter.com/" . $exploded[1] . "/media' target='_blank' title='" . $file. "'>" . $exploded[1] . "</a>";
    }
    elseif (preg_match('/^sp-/', $twitterRaw2) ){     // calculate SPOTIFY ALBUM link - https://open.spotify.com/album/4nEgdO6tkE2v5LO3mpUEe9
      $exploded = explode('-', $twitterRaw2);
      $twitterRaw3 = "<b>spotify:</b> <a href='https://open.spotify.com/album/" . $exploded[1] . "' target='_blank' title='" . $file. "'>" . $exploded[1] . "</a>";
    } 
    elseif (preg_match('/^spr-/', $twitterRaw2) ){     // calculate SPOTIFY SONG RADIO link - https://open.spotify.com/playlist/4nEgdO6tkE2v5LO3mpUEe9
      $exploded = explode('-', $twitterRaw2);
      $twitterRaw3 = "<b>spotify:</b> <a href='https://open.spotify.com/playlist/" . $exploded[1] . "' target='_blank' title='" . $file. "'>" . $exploded[1] . "</a>";
    }     
    elseif (preg_match('/^ba-/', $twitterRaw2) ){     // calculate BANDCAMP ALBUM link - https://stphanepicq.bandcamp.com/album/dune=spice=opera=2024=remaster=lp
      $exploded = explode('-', $twitterRaw2);
      $twitterRaw3 = "<b>bandcamp:</b> <a href='https://" . $exploded[1] . ".bandcamp.com/album/" . strtr($exploded[2], "=", "-") . "' target='_blank' title='" . $file. "'>" . strtr($exploded[2], "=", "-") . "</a>";
    } 
    elseif (preg_match('/^pf-/', $twitterRaw2) ){     // calculate PIXELFED link - https://pixelfed.social/i/web/profile/512153585210633987
      $exploded = explode('-', $twitterRaw2);
      $twitterRaw3 = "<b>pixelfed:</b> <a href='https://pixelfed.social/i/web/profile/" . $exploded[1] . "' target='_blank' title='" . $file. "'>" . $exploded[1] . "</a>";
    } 
    elseif (preg_match('/^in-/', $twitterRaw2) ){     // calculate INSTAGRAM link
      $exploded = explode('-', $twitterRaw2);
      $twitterRaw3 = "<b>instagram:</b> <a href='https://www.instagram.com/" . $exploded[1] . "' target='_blank' title='" . $file. "'>" . $exploded[1] . "</a>";
    } 
    elseif (preg_match('/^im-/', $twitterRaw2) ){     // calculate IMDB link
      $exploded = explode('-', $twitterRaw2);
      $twitterRaw3 = "<b>imdb:</b> <a href='https://www.imdb.com/title/" . $exploded[1] . "' target='_blank' title='" . $file. "'>" . $exploded[1] . "</a>";
    } 
    elseif (preg_match('/^ar-/', $twitterRaw2) ){     // calculate ARTSTATION link
      $exploded = explode('-', $twitterRaw2);
      $twitterRaw3 = "<b>artstation:</b> <a href='https://www.artstation.com/" . $exploded[1] . "' target='_blank' title='" . $file. "'>" . $exploded[1] . "</a>";
    } 
    elseif (preg_match('/^bs-/', $twitterRaw2) ){     // calculate BLUESKY link
      $exploded = explode('-', $twitterRaw2);
      $twitterRaw3 = "<b>bluesky:</b> <a href='https://bsky.app/profile/" . $exploded[1] . ".bsky.social" . "' target='_blank' title='" . $file. "'>" . $exploded[1] . "</a>";
    } 
    elseif (preg_match('/^ca-/', $twitterRaw2) ){     // calculate CARA link
      $exploded = explode('-', $twitterRaw2);
      $twitterRaw3 = "<b>instagram:</b> <a href='https://cara.app/" . $exploded[1] . "' target='_blank' title='" . $file. "'>" . $exploded[1] . "</a>";
    }     
    elseif (preg_match('/^it-/', $twitterRaw2) ){     // calculate ITCH.IO link
      $exploded = explode('-', $twitterRaw2);
      $twitterRaw3 = "<b>instagram:</b> <a href='https://" . $exploded[1] . ".itch.io" . "' target='_blank' title='" . $file. "'>" . $exploded[1] . ".itch.io</a>";
    } 
    elseif (preg_match('/^fb-/', $twitterRaw2) ){     // calculate facebook link
      $exploded = explode('-', $twitterRaw2);
      $twitterRaw3 = "<b>facebook:</b> <a href='https://www.facebook.com/" . $exploded[1] . "' target='_blank' title='" . $file. "'>" . $exploded[1] . "</a>";
    } 
    elseif (preg_match('/^fbg-/', $twitterRaw2) ){     // calculate facebook GROUP link
      $exploded = explode('-', $twitterRaw2);
      $twitterRaw3 = "<b>facebook:</b> <a href='https://www.facebook.com/groups/" . $exploded[1] . "' target='_blank' title='" . $file. "'>" . $exploded[1] . "</a>";
    } 
    elseif (preg_match('/^fbp-/', $twitterRaw2) ){     // calculate facebook PROFILE link
      $exploded = explode('-', $twitterRaw2);
      $twitterRaw3 = "<b>facebook:</b> <a href='https://www.facebook.com/profile?id=" . $exploded[1] . "' target='_blank' title='" . $file. "'>" . $exploded[1] . "</a>";
    } 
    elseif (preg_match('/^tu-/', $twitterRaw2) )  // calculate TUMBLR link
    {    
      $exploded = explode('-', $twitterRaw2);
      // print "<pre>"; print_r($exploded) ;
      $twitterRaw3 = "<b>tumblr:</b> <a href='https://www.tumblr.com/" . $exploded[1] . "' target='_blank' title='" . $file . "'> " . $exploded[1] . "</a>";
    }

    elseif (preg_match('/^st-/', $twitterRaw2) )  // calculate SHADERTOY link (shadertoy.com/view/wXSfzK)
    {    
      $exploded = explode('-', $twitterRaw2);
      // print "<pre>"; print_r($exploded) ;
      $twitterRaw3 = "<b>shadertoy:</b> <a href='https://shadertoy.com/view/" . $exploded[1] . "' target='_blank' title='" . $file . "'> " . $exploded[1] . "</a>";
    }
    elseif (preg_match('/^sl-/', $twitterRaw2) )  // calculate SLEDITOR link (sleditor.com/#id=o9u3b6oo9)
    {    
      $exploded = explode('-', $twitterRaw2);
      // print "<pre>"; print_r($exploded) ;
      $twitterRaw3 = "<b>sleditor:</b> <a href='https://sleditor.com/#id=" . $exploded[1] . "' target='_blank' title='" . $file . "'> " . $exploded[1] . "</a>";
    }


    elseif (preg_match('/^site-/', $twitterRaw2) )  // calculate SITE link (must decode | (in file name) as / (URL) and = (in file name) as - (URL) )
    {    
      $exploded = explode('-', $twitterRaw2);
      // print "<pre>"; print_r($exploded) ;
      $path2dec = explode('|', $exploded[1]);
      $path   = implode('/', $path2dec);
      $path   = str_replace('=', '-', $path); 

      $twitterRaw3 = "<b>site:</b> <a href='https://" . $path . "' target='_blank' title='" . $file . "'> " . mb_strimwidth($path, 0, 89, "!!") . "</a>";
    }
    elseif (preg_match('/^fl-/', $twitterRaw2) )  // calculate FLICKR link
    {    
      $exploded = explode('-', $twitterRaw2);
      // print "<pre>"; print_r($exploded) ;
      $twitterRaw3 = "<b>flickr:</b> <a href='https://www.flickr.com/photos/" . $exploded[1] . "' target='_blank' title='" . $file . "'> " . mb_strimwidth($exploded[1], 0, 89, "!!") . "</a>";
    }
    elseif (preg_match('/^re-/', $twitterRaw2) )  // calculate REDDIT link
    {    
      $exploded = explode('-', $twitterRaw2);
      // print "<pre>"; print_r($exploded) ;
      $twitterRaw3 = "<b>reddit:</b> <a href='https://reddit.com/r/" . $exploded[1] . "' target='_blank' title='" . $file . "'> " . mb_strimwidth($exploded[1], 0, 89, "!!") . "</a>";
    }
    elseif (preg_match('/^ma-/', $twitterRaw2) )  // calculate MASTODON link (i.e. https://toot.community/@LordArse)
    {    
      $exploded = explode('-', $twitterRaw2);
      // print "<pre>"; print_r($exploded) ; print "/<pre>";
      $mastodon = explode('@', $exploded[1]);
      $twitterRaw3 = "<b>mastodon:</b> <a href='https://" . $mastodon[2] . "/@" . $mastodon[1].  "' target='_blank' title='" . $file . "'> " . $exploded[1] . "</a>";
    }
    elseif (preg_match('/^sb-/', $twitterRaw2) )  // calculate SAFEBOORU link
    {    
      $exploded = explode('-', $twitterRaw2);
      // print "<pre>"; print_r($exploded) ;
      $twitterRaw3 = "<b>safebooru:</b> <a href='https://safebooru.org/index.php?page=post&s=list&tags=" . $exploded[1] . "' target='_blank' title='" . $file . "'> " . $exploded[1] . "</a>";
    }
    elseif (preg_match('/^da-/', $twitterRaw2) )  // calculate DEVIANTART link
    {    
      $exploded = explode('-', $twitterRaw2);
      // print "<pre>"; print_r($exploded) ;
      $twitterRaw3 = "<b>deviantart:</b> <a href='https://deviantart.com/" . $exploded[1] . "' target='_blank' title='" . $file . "'> " . $exploded[1] . "</a>";
    }

    $embed_asset = "<img src=\"$file\" style=\"width: 100%;\" title=\"$file\">";

    if (preg_match('/.mp4$/', $file)) {
      $embed_asset = "
        <div class=\"embed-responsive embed-responsive-16by9\">
          <div style=\"float: left; padding-right: 5px;\">
          <video style=\"vertical-align:middle\" vspace=\"5\" hspace=\"5\" align=\"left\" alt=\"$file\" controls autoplay >
            <source src=\"$file\" type=\"video/mp4\">
            $file
          </video>
          </div>
        </div>
      ";
    }

    $file2check = '/home/masayume' . $file; 
    $filedate   = $file2check; // "no data"; 
    $filesize   = filesize($file2check);
    if (file_exists($file2check)) {
      $filedate = date('d F Y h:i', filemtime($file2check) );
    }

    $pixelate_limit = 50000;
    $pixelate   = '';
    /*
    */
    if ($filesize < $pixelate_limit) {
      $pixelate = "image-rendering: pixelated;";
    }

    // TAGS DIV
    // calculate image file TAGS and print links

    $tags     = findtags($twitterRaw2);
    $thtmlrow = "";
    $toppx    = -20;
    $butmagw  = 66;
    foreach ($tags as $t) {
      $toppx    += 36;
      $tagcode   = "";
      if ( preg_match('/^TITLE/', $t) ) {
        $tit = explode(':', $t);
        $tagcode = "<a href=\"https://www.youtube.com/results?search_query=" . $tit[1] . "\"> 🎥 </a>";
        $t = "🎥";
      } else {
        $tagcode = "<a href=\"" . $_SERVER['REQUEST_URI'] . "&tag1=$t&tag2=$t\"> <b> $t </b> </a>";
      }
      $toolong = 0; if ( strlen($t) > 16 ) { $toolong = 50; }
      $width     = max($butmagw, ( (12*strlen($t)) - $toolong) );

      $thtmlrow .= "<div style=\"width: ${width}px; position: absolute; top: ${toppx}px; right: -8px; text-align: center; padding-right: 2px; padding-left: 2px; padding-top: 4px; padding-bottom: 4px; background-color: #ccc; vertical-align: middle; border-radius: 5px; border:1px solid black;\">";
      $thtmlrow .= $tagcode; 
      $thtmlrow .= "</div>";

    }

    // add FILE tag if exists
    $txtfile = preg_replace('/\.(\w+)$/', '.txt', $file);
    $txtfilepath = '/var/www/html' . $txtfile;
    if (file_exists($txtfilepath)) {
      $toppx    += 36;
      $thistag   = "WF-FILE";
      $width     = max($butmagw, (13*strlen($thistag)) );

      $thtmlrow .= "<div style=\"width: ${width}px; position: absolute; top: ${toppx}px; right: -8px; text-align: center; padding-right: 2px; padding-left: 2px; padding-top: 4px; padding-bottom: 4px; background-color: #ccc; vertical-align: middle; border-radius: 5px; border:1px solid black;\">";
      $thtmlrow .= '<a href=\'' . $txtfile . '\' target=_blank><span style="color:#009000"><b>' . $thistag . '</b></span></a>';   // add FILE txt link
      $thtmlrow .= "</div>";
      // print "txtfilepath: $txtfilepath";
    }


    $tagshtml =<<<TGHT
$thtmlrow
TGHT;


    $template =<<<TEM
      <div class="col" data-category="" style="$float background-image: url('img/'); background-size: cover; alt='$file'; $pixelate">
          $embed_asset
          <!-- <img src="$file" style="width: 100%;" title="$file"> -->
          <br />
          <b>$twitterRaw3</b>
          <br />
          <small><small>$file</small></small>
          <br />
          <small><small>downloaded: $filedate - $filesize bytes </small></small>

          $tagshtml

      </div>
TEM;
  
//    $html_elements .= $template;      
//    return $html_elements;

    return $template;

} // end function page


function findtags($tw) {

  // print "TW parameter: " . $tw;
  $tw = preg_replace('/^ar\-(\w+)\-/', '', $tw);                    // clears artstation prefix
  $tw = preg_replace('/^ba\-(\w+)\-/', '', $tw);                    // clears bandcamp prefix
  $tw = preg_replace('/^bs\-(\w+)\-/', '', $tw);                    // clears bluesky prefix
  $tw = preg_replace('/^da\-(\w+)\-/', '', $tw);                    // clears deviantart prefix
  $tw = preg_replace('/^fb\-(\w+)\-/', '', $tw);                    // clears facebook prefix
  $tw = preg_replace('/^fbg\-(\w+)\-/', '', $tw);                    // clears facebook group prefix
  $tw = preg_replace('/^fbp\-(\w+)\-/', '', $tw);                    // clears facebook profile prefix
  $tw = preg_replace('/^fl\-(\w+)\-/', '', $tw);                    // clears flickr prefix
  $tw = preg_replace('/^in\-(\w+)\-/', '', $tw);                    // clears instagram prefix
  $tw = preg_replace('/^im\-(\w+)\-/', '', $tw);                    // clears imdb prefix
  $tw = preg_replace('/^it\-(\w+)\-/', '', $tw);                    // clears itch prefix
  $tw = preg_replace('/^ma\-\@(\w+)\@(\w+)\.?(\w+)\-/', '', $tw);   // clears mastodon prefix - ma-@LordArse@toot.community-
  $tw = preg_replace('/^none-/', '', $tw);                          // clears none (dummy) prefix
  $tw = preg_replace('/^pf\-(\w+)\-/', '', $tw);                    // clears pixelfed prefix
  $tw = preg_replace('/^pi\-/', '', $tw);                           // clears pinterest prefix
  $tw = preg_replace('/^re\-(\w+)\-/', '', $tw);                    // clears reddit prefix
  $tw = preg_replace('/^sb\-(\w+)\-/', '', $tw);                    // clears safebooru prefix
  $tw = preg_replace('/^site\-([^-]+)\-/', '', $tw);                // clears site prefix
  $tw = preg_replace('/^sp\-(\w+)\-/', '', $tw);                    // clears spotify prefix
  $tw = preg_replace('/^spr\-(\w+)\-/', '', $tw);                   // clears spotify song radio prefix
  $tw = preg_replace('/^tu\-(\w+)\-/', '', $tw);                    // clears tumblr prefix
  $tw = preg_replace('/^st\-(\w+)\-/', '', $tw);                    // clears shadertoy prefix
  $tw = preg_replace('/^sl\-(\w+)\-/', '', $tw);                    // clears sleditor prefix
  $tw = preg_replace('/^tw\-(\w+)\-/', '', $tw);                    // clears twitter prefix
  $matches = explode('-', $tw);
  $title = "";

  if ( strlen(end($matches)) > 8 && strlen(prev($matches)) > 8 ) { // there is a title as last array element
    $tit = explode('.', end($matches));
    $title = "TITLE:" . str_replace('_', " ", $tit[0]);  //  print $title . " | " ;
    array_pop($matches);
    array_pop($matches);
    array_push($matches, $title);
  } else if ( strlen(end($matches)) > 8 ) {
    array_pop($matches);    
  }

  /*
  preg_match("/\-(\w+)\-/g", $tw, $matches);
  print "<pre>";
  print_r($matches);
  print "</pre>";

  $found = ["PS2", "JAP"];
  */ 

  return $matches;

} // end function findtags


function page($dir, $tag) {

  global $float; 
  $dir_fullpath   = '/var/www/html' . $dir; 

  $files = glob("$dir_fullpath/*.{jpg,png,gif,webp,mp4}", GLOB_BRACE);

  $imgnum = rand(1, count($files)) - 1;

  $file = preg_replace('/^\/var\/www\/html/', "", $files[$imgnum]);

  $template =<<<TEM
    <!-- <div class="element-item $class " data-category="{$item['data_cat']}" style="$float background-image: url('img/{$item['img']}'); background-size: cover; alt='$file'"> -->
    <div class="element-item $class " data-category="{$item['data_cat']}" style="$float; background-size: cover;" alt='$file' >
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

<!--  <video width="960" height="480" controls> -->
  <video width="95%" height="95%" controls>
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

