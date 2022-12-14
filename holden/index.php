<!DOCTYPE html>
<html >
<head>
<!--
  save to ~git/vmcode/holden
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

$artists = array(   '/inspire/@CARTOONS/ANTHONY\ HOLDEN/' 
                  , '/inspire/@CARTOONS/altan/'
                  , '/inspire/@CARTOONS/@expressions/'
                  , '/inspire/@CARTOONS/@NIEMANN/'
                  , '/inspire/@CARTOONS/arthurdepins'
                  , '/inspire/@CARTOONS/azumanga'
                  , '/inspire/@CARTOONS/BALDAZZINI'
                  , '/inspire/@CARTOONS/bayonetta'
                  , '/inspire/@CARTOONS/BEATON'
                  , '/inspire/@CARTOONS/bernet'
                  , '/inspire/@CARTOONS/Boulet'       // 9
// 10
                  , '/inspire/@CARTOONS/brosgol'
                  , '/inspire/@MISC-STYLE'            // 12
                  , '/inspire/@CARTOONS/carroll'
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
                  , '/inspire/@CARTOONS/eriadan'
                  , '/inspire/@CARTOONS/EVA'
                  , '/inspire/@CARTOONS/@expressions'
                  , '/inspire/@CARTOONS/faboarts'     // 29
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
                  , '/inspire/@CARTOONS/IMAGINISM'    // 39
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
                  , '/inspire/@CARTOONS/JAIME'        // 49
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
                  , '/inspire/@CARTOONS/MAGNUS'      // 59
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
                  , '/inspire/@CARTOONS/Oglaf'       // 69
// 70
                  , '/inspire/@CARTOONS/oji'
                  , '/inspire/@CARTOONS/pixels'
                  , '/inspire/@CARTOONS/presing'
                  , '/inspire/@CARTOONS/RaikoArt'
                  , '/inspire/@CARTOONS/Ross'
                  , '/inspire/@CARTOONS/sakimi'
                  , '/inspire/@CARTOONS/Sandman'
                  , '/inspire/@CARTOONS/satira'
                  , '/inspire/@CARTOONS/savage'
                  , '/inspire/@CARTOONS/sho'         // 79
// 80
                  , '/inspire/@CARTOONS/shunya'
                  , '/inspire/@CARTOONS/SIO'                  
                  , '/inspire/@CARTOONS/soffritti'
                  , '/inspire/@CARTOONS/stanley'
                  , '/inspire/@CARTOONS/strip'
                  , '/inspire/@CARTOONS/subnormality'
                  , '/inspire/@CARTOONS/@surreal'
                  , '/inspire/@CARTOONS/TARA'
                  , '/inspire/@CARTOONS/TOM'
                  , '/inspire/@CARTOONS/tron'         // 89
// 90
                  , '/inspire/@CARTOONS/vanillaware'
                  , '/inspire/@CARTOONS/vincenzina'
                  , '/inspire/@CARTOONS/wakkawa'
                  , '/inspire/@CARTOONS/yotsuba'
                  , '/inspire/@CARTOONS/Zeronis'
                  , '/inspire/@CARTOONS/Zoma'
                  , '/inspire/@pixelart/frames'
                  , '/inspire/@pixelart/STYLE'
                  , '/inspire/@characters/chun li'    // 99 
// 100
                  , '/inspire/@pixelart/cute'
                  , '/inspire/@pixelart/backgrounds'
                  , '/inspire/@pixelart/frame'
                  , '/inspire/@pixelart/monster-refs'
                  , '/inspire/@pixelart/portraits'
                  , '/inspire/@pixelart/TECH'
                  , '/inspire/@pixelart/TILES'
                  , '/inspire/@pixelart/workflow'
                  , '/inspire/@pixelart/src-movies'
                  , '/inspire/@pixelart/'             // 109
// 110
                  , '/inspire/@characters/Asuka'
                  , '/inspire/@characters/bayonetta'
                  , '/inspire/@characters/chun li'
                  , '/inspire/@characters/Lamu'
                  , '/inspire/@characters/MIKU'
                  , '/inspire/@characters/Misato'
                  , '/inspire/@characters/Mona'
                  , '/inspire/@characters/morrigan'
                  , '/inspire/@characters/quorra'
                  , '/inspire/@characters/motoko'    // 119
// 120
                  , '/inspire/@characters/'         

                );

include 'pagedata.php';

$data = "";
$tag  = $_GET['tag'];
$tag1 = $_GET['tag1'];
$tag2 = $_GET['tag2'];

if (!$_GET['art'] && !$_GET['art1'] && !$_GET['folder'] && !$_GET['vfolder']) {
  $data = page($artists[0], $tag);
} else {
  if ($_GET['vfolder']) { 
      echo $path;
      $pathF = '/inspire/' . $_GET['vfolder'];
      $data = video($pathF);
  } else if ($_GET['folder']) { 
      echo $path;
      $pathF = '/inspire/' . $_GET['folder'];
      $data = page($pathF, $tag);
  } else if (is_numeric($_GET['art'])) { 
// art è un intero
      echo $artists[$_GET['art']];
      $data = page($artists[$_GET['art']], $tag);
  } else if ($_GET['art1'] && $_GET['art2']) { 
      echo $path;
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

?>

<div class="float-left" style=" position: fixed; margin-top: 10px; top: 10px; transform: translateY(0px); z-index: 1000;">

    <br clear="all" />
    <h3>Refs</h3>
    <div id="references">
      <ul>
        <a href="<?php echo $link_url ?>" type="button" class="btn btn-primary" >RELOAD</a>
        <li>assets: <?php global $glob_res; echo $_GET['tag1'] . " " . $glob_res[$_GET['tag1']] ?>  </li>
        <li><a href='refURL'>ref</a></li>
        <!--
          <pre>
            <?php // system(' cd /home/masayume/inspire/@pixelart/ ; du -a | cut -d/ -f2 | sort | uniq -c | sort -nr | head -25 ')?> 
          </pre>
        -->
      </ul>
      
    </div>
    <br>

</div>


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
