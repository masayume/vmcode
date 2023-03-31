<!DOCTYPE html>
<html >
<head>
<!--
  use ./align2git.sh to sync to ~/git/vmcode/holden
-->

  <meta charset="UTF-8">
  <title>masayume - HOLDEN - random viz browser (WiP)</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

<!------ sidebar ---------->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    document.addEventListener('keyup', function(e){
      if( e.keyCode == 13 || e.keyCode == 32 )
        window.location.reload();
    })
  </script>


</head>

<!--

TO DO: 

-->

<body>

<?php
error_reporting (E_ALL ^ E_NOTICE);
$artists = array(   '/inspire/@CARTOONS/ANTHONY\ HOLDEN/' 
                  , '/inspire/@CARTOONS/altan/'
                  , '/inspire/@CARTOONS/@expressions/'
                  , '/inspire/@CARTOONS/@NIEMANN/'
                  , '/inspire/@CARTOONS/ADAM HUGHES'  // 4
                  , '/inspire/@CARTOONS/arthurdepins'
                  , '/inspire/@CARTOONS/azumanga'
                  , '/inspire/@CARTOONS/BALDAZZINI'
                  , '/inspire/@CARTOONS/bayonetta'
                  , '/inspire/@CARTOONS/bernet'       
                  , '/inspire/@CARTOONS/Boulet'       // 10
// 10
                  , '/inspire/masayume/pub'
                  , '/inspire/@MISC-STYLE'            // 12
                  , '/inspire/@CARTOONS/@gif animations'
                  , '/inspire/@COVERS/retrocovers'
                  , '/inspire/@COVERS/ataricovers'
                  , '/inspire/@CARTOONS/@chibi'
                  , '/inspire/@CARTOONS/chibird'
                  , '/inspire/@CARTOONS/chichoni'
                  , '/inspire/@pixelart/VIDEO'        // 19
                  , '/inspire/@CARTOONS/ciia'         
// 20                  
                  , '/inspire/@CARTOONS/@classic-comic-panels'
                  , '/inspire/@CARTOONS/Craig'
                  , '/inspire/@CARTOONS/dandonfuga'
                  , '/inspire/@CARTOONS/DCWJ'
                  , '/inspire/@CARTOONS/dillon'
                  , '/inspire/@CARTOONS/Elvgren'
                  , '/inspire/@CARTOONS/birault'
                  , '/inspire/@CARTOONS/EVA'
                  , '/inspire/@CARTOONS/@expressions'
                  , '/inspire/@CARTOONS/faboarts'     // 30
// 30
                  , '/inspire/@CARTOONS/fran'
                  , '/inspire/@CARTOONS/gamercat'
                  , '/inspire/@CARTOONS/GIANCOLA'
                  , '/inspire/@CARTOONS/@gif'
                  , '/inspire/@CARTOONS/groening'
                  , '/inspire/@CARTOONS/GUWEIZ'
                  , '/inspire/@CARTOONS/hatsune'
                  , '/inspire/@CARTOONS/hipp'
                  , '/inspire/@CARTOONS/Hogarth'
                  , '/inspire/@CARTOONS/IMAGINISM'    // 40
// 40
                  , '/inspire/@CARTOONS/incidental'
                  , '/inspire/@CARTOONS/inkspinster'
                  , '/inspire/@CARTOONS/JAIME'
                  , '/inspire/@CARTOONS/karioks'
                  , '/inspire/@CARTOONS/Karla'
                  , '/inspire/@CARTOONS/keane'
                  , '/inspire/@CARTOONS/IMAGINISM'
                  , '/inspire/@CARTOONS/incidental'
                  , '/inspire/@CARTOONS/inkspinster'
                  , '/inspire/@CARTOONS/JAIME'        // 50
// 50
                  , '/inspire/@CARTOONS/karioks'
                  , '/inspire/@CARTOONS/Karla'
                  , '/inspire/@CARTOONS/keane'
                  , '/inspire/@CARTOONS/k-on'
                  , '/inspire/@CARTOONS/kristahuot'
                  , '/inspire/@CARTOONS/Kuvshinov'
                  , '/inspire/@CARTOONS/lucky'
                  , '/inspire/@CARTOONS/lucy'
                  , '/inspire/@CARTOONS/mersenne-reference'
                  , '/inspire/@CARTOONS/MAGNUS'      // 60
// 60
                  , '/inspire/@CARTOONS/MANGA'
                  , '/inspire/@CARTOONS/moebius'
                  , '/inspire/@CARTOONS/monchan'
                  , '/inspire/@CARTOONS/monsters'
                  , '/inspire/@CARTOONS/nagato'
                  , '/inspire/@CARTOONS/NAGEL'
                  , '/inspire/@CARTOONS/NENDOROID'
                  , '/inspire/@CARTOONS/@NIEMANN'
                  , '/inspire/@CARTOONS/NOndoroid'
                  , '/inspire/@CARTOONS/Oglaf'       // 70
// 70
                  , '/inspire/@CARTOONS/oji'
                  , '/inspire/@CARTOONS/pixels'
                  , '/inspire/@CARTOONS/presing'
                  , '/inspire/@CARTOONS/RaikoArt'
                  , '/inspire/@CARTOONS/Ross'
                  , '/inspire/@CARTOONS/sakimi'
                  , '/inspire/@CARTOONS/Sandman'
                  , '/inspire/@CARTOONS/satira'      // 78
                  , '/inspire/@CARTOONS/savage'
                  , '/inspire/@CARTOONS/sho'         // 80
// 80
                  , '/inspire/@CARTOONS/shunya yamashita'
                  , '/inspire/@CARTOONS/SIO'                  
                  , '/inspire/@CARTOONS/soffritti'
                  , '/inspire/@CARTOONS/stanley'
                  , '/inspire/@CARTOONS/strip'
                  , '/inspire/@CARTOONS/subnormality'
                  , '/inspire/@CARTOONS/@surreal'
                  , '/inspire/@CARTOONS/TARA'
                  , '/inspire/@CARTOONS/TOM'
                  , '/inspire/@CARTOONS/tron'         // 90
// 90
                  , '/inspire/@CARTOONS/vanillaware'
                  , '/inspire/@CARTOONS/TORIYAMA'
                  , '/inspire/@CARTOONS/wakkawa'
                  , '/inspire/@CARTOONS/yotsuba'
                  , '/inspire/@CARTOONS/Zeronis'
                  , '/inspire/@CARTOONS/Zoma'
                  , '/inspire/@pixelart/frames'
                  , '/inspire/@pixelart/STYLE'
                  , '/inspire/@characters/chun li'    // 99 
// 100
                  , '/inspire/@pixelart/cute'         // 100
                  , '/inspire/@pixelart/backgrounds'  // 101
                  , '/inspire/@pixelart/mockups'
                  , '/inspire/@pixelart/monster-refs'
                  , '/inspire/@pixelart/portraits'
                  , '/inspire/@pixelart/TECH'
                  , '/inspire/@pixelart/ref-TILES'    // 106
                  , '/inspire/@pixelart/workflow'
                  , '/inspire/@pixelart/RETRO'
                  , '/inspire/@pixelart/'             // 109
// 110
                  , '/inspire/@characters/Asuka'
                  , '/inspire/@CARTOONS/bayonetta'    // 111
                  , '/inspire/@pixelart/1bit'
                  , '/inspire/@characters/Lamu'
                  , '/inspire/@characters/MIKU'
                  , '/inspire/@characters/Misato'
                  , '/inspire/@characters/Mona' 
                  , '/inspire/@characters/morrigan'   
                  , '/inspire/@characters/quorra'
                  , '/inspire/@characters/motoko'    // 120
// 120
                  , '/inspire/@characters/'         
                  , '/inspire/@pixelart/backgrounds/landsref' // 121  
                  , '/inspire/@pixelart/backgrounds/others'   // 122  
                  , '/inspire/@REF-poses'                     // 123  
                  , '/inspire/@ALT_POSES'                     // 124  
                  , '/inspire/@backs'                         // 125
                  , '/inspire/@pixelart/ref-TEXT/titles'      // 126  
                  , '/inspire/@pixelart/RETRO/snap'           // 127
                  , '/inspire/@CARTOONS/ALAN DAVIS'           // 128
                  , '/inspire/VOID'                           // 129
// 130
                  , '/inspire/@drawthink/'         
                  , '/inspire/@drawthink/@drawwrite'          // 131  
                  , '/inspire/@TEXTURES'                      // 132  
                  , '/inspire/@drawthink/texturing'         // 133  

                );

include 'pagedata.php';

global $data;   $data = "";
global $tag;    $tag = isset($_GET['tag']) ? $_GET['tag'] : ''; // $tag  = $_GET['tag'];
global $tag1;   $tag1 = isset($_GET['tag1']) ? $_GET['tag1'] : '';
global $tag2;   $tag2 = isset($_GET['tag2']) ? $_GET['tag2'] : '';

if ( !isset($_GET['art']) && !isset($_GET['art1']) && !isset($_GET['folder']) && !isset($_GET['vfolder']) ) {
  $data = page($artists[0], $tag);
} else {
  if ( isset($_GET['vfolder']) ) { 
      echo $path;
      $pathF = '/inspire/' . $_GET['vfolder'];
      $data = video($pathF);
  } else if ( isset($_GET['folder']) ) { 
      echo $path;
      $pathF = '/inspire/' . $_GET['folder'];
      $data = page($pathF, $tag);
  } else if (is_numeric( isset($_GET['art']) )) { 
// art è un intero
      echo $artists[$_GET['art']];
      $data = page($artists[$_GET['art']], $tag);
  } else if ( $_GET['art1'] && $_GET['art2'] ) { 
      // echo $path;
      $path1 = ""; $path2 = "";
      if ( is_numeric($_GET['art1']) ) 
      {
        $path1 = $artists[$_GET['art1']];
        $path2 = $artists[$_GET['art2']];
      } else {
        $path1 = '/inspire/@CARTOONS/' . $_GET['art1'];
        $path2 = '/inspire/@CARTOONS/' . $_GET['art2'];
      }

      $data = page2($path1, $path2, $tag1, $tag2);
  } else { 
// art è una stringa
      echo $path;
      $path = '/inspire/@CARTOONS/' . $_GET['art'];
      $data = page($path, $tag);
  } 
}

?>    

<div class="main">

<?php

  $bytes    = random_bytes(20);
  unset($_GET['rndhash']);
  $link_url = "index.php?". http_build_query($_GET) . "&rndhash=" . bin2hex($bytes);
  
  $NOTAG = $_GET;  $NOTAG['tag1'] = '';   $NOTAG['tag2'] = '';
  $link_url_notags = "index.php?". http_build_query($NOTAG) . "&rndhash=" . bin2hex($bytes);

?>

<div class="float-left" style=" position: fixed; margin-top: 0px; top: 0px; transform: translateY(0px); z-index: 1000;">

    <h4>&nbsp; holden</h4>
    <div id="references" style="position:relative; left: 6px; ">
      <a href="<?php echo $link_url ?>" type="button" class="btn btn-primary" style="width: 104px; " > RELOAD </a><br style="padding-bottom: 8px;"/>
      <a href="<?php echo $link_url_notags ?>" type="button" class="btn btn-secondary" style="width: 104px; " > NO TAGS </a><br />
      <ul style="margin-left:-28px;">
        <li><?php global $glob_res; if (isset($_GET['tag1'])) echo $_GET['tag1'] . " " . $glob_res[$_GET['tag1']] ?>  </li>
      </ul>

        <!-- LEFT SIDE TAGS -->
        <h5>TAGS (<a title='<?php print $artists[$_GET['art1']]; ?>'><?php print $_GET['art1']; ?></a>)</h5><ul style="margin-left:-28px;">
        <!--
        <li><a href='refURL'>ref</a></li>
          <pre>
            <?php // system(' cd /home/masayume/inspire/@pixelart/ ; du -a | cut -d/ -f2 | sort | uniq -c | sort -nr | head -25 ')?> 
          </pre>
        -->

      <!-- LEFT SIDE TAGS 54 -->    
            <?php
              // Read the JSON file; note:  $artists[$_GET['art']] = /inspire/@COVERS/retrocovers
              $jsonfile = '/var/www/html' . $artists[$_GET['art1']] . '/tags.json';
              $json = file_get_contents($jsonfile);
                
              // Decode the JSON file
              $json_data = json_decode($json,true);
              $counter  = 0;
              $limit    = 40;
              if ($json_data) {
                foreach ($json_data['tags'] as $key => $value) {
                  if ($counter <= $limit) {
                    $counter++;
                    $NOTAG = $_GET;  unset($NOTAG['tag1']) ;   unset($NOTAG['tag2']);
                    print "<li style=\"height: 16px; \"> <a href='index.php?" . http_build_query($NOTAG) . "&tag1=" . $key . "&tag2=" . $key . "' title='" . $value . "'>" . $key . "</a> </li>";  
                  }

                }
              }
              // Display data
              // print "<pre>tags"; print_r($json_data['tags']); print "</pre>";  
            ?>


      </ul>
      
    </div>

    <br>

</div>

  <!-- RIGHT SIDE TAGS next 55 -->
    <div id="references" style="width: 90px; position:absolute; right: 0px;">
        <h5 style="position:relative; right: -0px; ">TAGS <a title='<?php print $artists[$_GET['art1']]; ?>'><?php print $_GET['art1']; ?></a></h5>
        
        <ul>
        
          <?php
                // Read the JSON file; note:  $artists[$_GET['art']] = /inspire/@COVERS/retrocovers
                $jsonfile = '/var/www/html' . $artists[$_GET['art1']] . '/tags.json';
                $json = file_get_contents($jsonfile);
                  
                // Decode the JSON file
                $json_data = json_decode($json,true);
                $counter  = 0;
                $limit    = 40;  
                if ($json_data) {
                  foreach ($json_data['tags'] as $key => $value) {
                    if ($counter > $limit) {
                      $counter++;
                      $NOTAG = $_GET;  unset($NOTAG['tag1']) ;   unset($NOTAG['tag2']);
                      print "<li style=\"height: 16px; margin-left: -24px;\"> <a href='index.php?" . http_build_query($NOTAG) . "&tag1=" . $key . "&tag2=" . $key . "' title='" . $value . "'>" . $key . "</a> </li>";
                    } else {
                      $counter++;
                    }
                  }
                }
                // Display data
                // print "<pre>tags"; print_r($json_data['tags']); print "</pre>";  
          ?>

      </ul>

      <!-- RIGHT SIDE URLS (conditional) -->
      <?php

                $jsonfile = '/var/www/html' . $artists[$_GET['art1']] . '/tags.json';
                $json = file_get_contents($jsonfile);

                if ( isset($json_data['urls']) ) {

                  echo "<h5 style=\"position:relative; right: -0px; \">URLS</h5>       ";
                  echo "<ul>";

                  // Decode the JSON file
                  $json_data = json_decode($json,true);
                  if ($json_data) {
                    foreach ($json_data['urls'] as $key => $value) {
                        $counter++;
                        print "<li style=\"margin-left: -34px;\"> <a href='" . $value . "' target='_blank'>" . $key . "</a> </li>";
                    }
                  }

                  echo "</ul>";
                }

      ?>   <!-- end right side URLS -->


      

    </div> <!-- END right side tags & urls-->


  <div class="grid">

<?php

echo $data;

?>
</div>


</div>

<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-89665-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-89665-1');
</script>

</body>
</html>

