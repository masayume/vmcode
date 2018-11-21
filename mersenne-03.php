<?php

// TODO
	
//	- values are default_layers/demon_layers
//	- demon wing layers must be coupled (ref. demons.json)

// DONE
//  - load layer type string array from a json in the &dir parameter:
//      JSON FILE DIR: :85 filename = PATH(/var/www...) + basedir(param(dir)) + basedir(param(dir)).json

//   example URL: 
//	http://localhost:8989/keplerion/mersenne-03.php?seed=100&page=9&results=3&dir=./img/demons/
//	http://localhost:8989/keplerion/mersenne-03.php?seed=100&page=7&results=3&dir=./keplerion/img/demons/

// > webGL canvas filter switch
// > parametrize type layer sequence (zNN)

// particles: http://aerotwist.com/tutorials/creating-particles-with-three-js/
// planet data
// http://stackoverflow.com/questions/667045/getpixel-from-html-canvas
// http://www.pixeljoint.com/pixels/new_icons.asp?q=1&pg=3

// DONE
// http://www.html5rocks.com/en/tutorials/canvas/imagefilters/
// :175 modified padding of the elements ( file names containing up, down, left and right pixel adjustments with format: -u15- | -d20- & -r20- | -l15- )

// REF.

// PARAMETERS

// BACKGROUNDS - background layers (chance to appear, type) 
$default_layers	= array(
                "z00" => 100,   //      z00 - skybox (MAND.)
                "z01" => 100,   //      z01 - skyboxfx (OPT.)
                "z02" => 100,   //      z02 - skyline (OPT.)
                "z03" => 100,   //      z03 - atmosphere (OPT. - fog, vapors...)
                "z04" => 100,   //      z04 - foreground (OPT. )
                "z05" => 100,   //      z05 - foreground FX (OPT. )
);
$demon_layers	= array(
                "RW" => 100,   //      z00 - skybox (MAND.)
                "LW" => 100,   //      z00 - skybox (MAND.)
                "LB" => 100,   //      z00 - skybox (MAND.)
                "BO" => 100,   //      z00 - skybox (MAND.)
                "HE" => 100,   //      z00 - skybox (MAND.)
);
$scenedir	= "";
$page   = 1; $nextp  = 2; $prevp  = 1; $res_qs = ""; $type = "";
$results    = 0;

// parse parameters
parse_str($_SERVER['QUERY_STRING'], $params);
if ($params['seed']) { 
	$master_seed	= $params['seed']; 
} else { 
	$master_seed	= 100; 
}
if ($params['page']) { 
	$page	= $params['page']; 
	$nextp = $page+1; 
	$prevp = $page-1; 
} else { 
	$page	= 1; 
	$nextp	= 2; 
	$prevp	= 1; 
}
if (!$params['results']) { $results = 12; } 
else {
	$results = $params['results'];
	$res_qs  .= "&results=" . $results;
}
if (!$params['type']) { $type = "backs"; } 
else {
        $type = $params['type'];
        $res_qs  .= "&type=" . $type;
}

// dir param: directory that holds the files
if (!$params['dir']) { $scenedir = "./demon/img/scenes/"; }
else {
        $scenedir = $params['dir'];
        $res_qs  .= "&dir=" . $scenedir;
}

// read JSON in the image "dir"
$json_file = '/var/www/html/keplerion/img/' . basename($params['dir']) . '/' . basename($params['dir']) . '.json';
$json = file_get_contents($json_file);

$json_data = json_decode($json, true);
$jwidth = $json_data['width'];
$owidth = $json_data['original_width'];

// print "scenedir: " . $scenedir;
// print "<img src='$scenedir/dem_A_BO_3_01.png'><hr>";

// init master seed
mt_srand($master_seed);

// init planet, demon name data
planet_ini();
demon_ini();

$javascript 	= jfunction();
$css		= overcss();

echo <<< EOT
<html><head>
<title>generator</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
<style type="text/css">
a:link  { color:#ffffff; } 
a:visited { color:#ffffff; } 
</style>
$css
</head>
<body style="background-color:#000000; color: #ffffff; font-family: 'Oswald', sans-serif;">
$javascript
EOT;

// navigation && MAIN div
	print " NAVIGATION: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" . "<a href='" .$_SERVER['PHP_SELF'] . "?seed=" . $master_seed . "&page=" . $prevp . $res_qs . "'> &lt;&lt; previous </a> &nbsp;&nbsp;&nbsp; <a href='" . $_SERVER['PHP_SELF'] . "?seed=" . $master_seed . "&page=" .$nextp . $res_qs . "'> next >> </a> &nbsp;  &nbsp;  &nbsp; <a href='" . $_SERVER['PHP_SELF'] . "?seed=" . $master_seed . "&page=" .$nextp . "&type=backs&results=3'>BACKGROUNDS</a>"; 
	print "\n\n\n\n<hr><div style=\"text-align:center;\">";

// BACKGROUNDS - background layers 
// 	skybox
//	skyboxfx
// 	skyline
//	horizon
//	farawaybackground
//	background
//	nearbybackground
//	foreground

	for ($i=1; $i<=$page * $results; $i++) {
        // $imgpath = "/demon/img/scenes/" ;
        $imgpath = $scenedir ;
		$scene_array = array();
        $scene_array = scene_gen();

//  print "<pre>"; print_r($scene_array);

        if ($i>(($page - 1) * $results)) {

            $scene_name     = $scene_array[0];
            $scene_url      = $scene_array[1];
            $filter         = $scene_array[3];
            // echo $scene_img;
            echo scene($i, $imgpath, $scene_url, $scene_name, $jwidth, $filter);

        }
    }

//        } // end backgrounds

	print "</div>";
//    print "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><hr>";

    print "<div id=\"bottomdiv\">(C) 2018 - masayume design === ";
    print "names ini: " . count($planetname_ini) . "  mid:" . count($planetname_mid) ."  end:" . count($planetname_end);
    print " === " . demon_count($scenedir);

print "dir:" . $scenedir;

    print "</div>";
	print "</body></html>";

echo "\n";

exit(0);


// = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = -
// = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = -
// = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = -


function scene_layers($dir) {

	global		$default_layers;
	global		$demon_layers;
    $dlayers        = array();
    $arr2ret        = array();
    if ($handle = opendir($dir)) {

        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                    array_push($dlayers, $entry);
            }
        }
        closedir($handle);
    }

// load layers type => main_layers
	$main_layers = $demon_layers;

// create various parts 
        foreach (array_keys($main_layers) as $part) {

// loop on main_layers: chosen images MUST have matching string in theirs names

                $scene_elems    = array();
                $scene_elems    = kind_elem($part, $dlayers); // elementi di tipo zNN... 

		if (mt_rand(1,100) <= $main_layers[$part]) {
                	array_push($arr2ret, $scene_elems[(mt_rand(1,1000) % count($scene_elems))]); // carico nell'array da tornare l'rt_rnd-esimo elemento
		}
        }

// print "<pre>"; print_r($arr2ret); print "</pre>";

        return $arr2ret;

} // end function scene_layers


function kind_elem($kind, $dlayers) {

	$arr2ret  = array();
        foreach ($dlayers as $dlayer) { 
		if (strstr($dlayer, $kind)) { array_push($arr2ret, $dlayer); } }

	return $arr2ret;

} // end function rndret_elem()


function scene($i, $imgpath, $scene_url, $scene_name, $width, $filter) {

    global          $default_layers;
    global          $demon_layers;
    global          $owidth;
    global          $results;
    global          $jwidth;

	if (!$filter) { $filter = "&nbsp;"; }
	$divs = "";

	$main_layers = $demon_layers;

    // paired wings => LW (div.1) = RW (div.0)
    $scene_url[1] = preg_replace('/RW/', 'LW', $scene_url[0]);

	for ($j=0; $j<count($main_layers); $j++ ) {

		$padding = "";

		// calculate padding displacement from $scene_url[$j] filename sections: up: -uNN- down: -dNN- left: -lNN- right: -rNN- 
		foreach (array("/-u[0-9]+-/", "/-d[0-9]+-/", "/-l[0-9]+-/", "/-r[0-9]+-/", ) as $pattern) {	
			preg_match($pattern, $scene_url[$j], $matches, PREG_OFFSET_CAPTURE);
			if ($matches[0]) {  
				// print "<br>matches for $pattern: <pre>"; print_r($matches[0][0]); 
				if (substr($matches[0][0],1,1 ) == 'u') { $padding .= "margin-top: -" . substr($matches[0][0],2,2 ) . "; "; }
				if (substr($matches[0][0],1,1 ) == 'd') { $padding .= "margin-top: +" . substr($matches[0][0],2,2 ) . "; "; }
				if (substr($matches[0][0],1,1 ) == 'l') { $padding .= "margin-left: -" . substr($matches[0][0],2,2 ) . "; "; }
				if (substr($matches[0][0],1,1 ) == 'r') { $padding .= "margin-left: +" . substr($matches[0][0],2,2 ) . "; "; }
			}
		}
		// layer div is actually added only if it exists: $scene_url[$j]

		if ($scene_url[$j]) {

            $dwidth = $owidth;
            if ($results == 1) { // scale single demon image
                $dwidth = $owidth*2 ;
            }

			$divs .= "\n<div id='div$j' style=\"$padding \"><img id=\"myImage-$i-$j\" width=\"$dwidth\" src=\"$imgpath$scene_url[$j]\" onload=\"tracescene_$i($j)\" ></div>";
		}
	}

        $scene = <<< EOP

<div id="container" class="scene" style="display:inline-block; width:$width; background-color: #000000; padding-left: 10px;">
        <script>
            function _tracescene_$i(n) {
                // window.alert("scene: $scene_name on canvas $i");   
                var canvas$i            = fx.canvas();
                var name                = 'myImage-' + $i + '-' + n;
                var image$i             = document.getElementById(name);
                var texture$i           = canvas$i.texture(image$i);
                var filter$i            = "canvas$i.draw(texture$i)$filter.update()"; // apply the ink filter
                eval(filter$i);
                image$i.parentNode.insertBefore(canvas$i, image$i);
                image$i.parentNode.removeChild(image$i);
            }
        </script>
	$divs
		<p><div title="$filter">$i</div> $scene_name
</div>
EOP;

        return $scene;

} // end function scene

function overcss() {

	$overcss = '<link rel="stylesheet" type="text/css" href="./overcss.css">';
	return $overcss;

} // end function overcss

function jfunction() {

	$jfun = "<script src=\"./glfx.js\"></script>"; 
	return $jfun;

} // end function jfunction 


function myrand ($lo, $hi, $consume) {

	for ($i=1; $i<$consume; $i++) {
		mt_rand(1,1);
	}
	return mt_rand($lo, $hi);
}

function scene_gen() {

        global $scenename_ini, $scenename_mid, $scenename_end, $scene_pic, $scenedir;
        $scene_name = "";
        $scene = array();

// scene filter
        $filter = "";
        $filter_index = mt_rand(1,12);
        switch($filter_index){
                case 1:
                        $v1     = mt_rand(5,20);
                        $filter = ".denoise($v1)"; break;
                case 2:
                        $v1     = mt_rand(1,3) / 10;
                        $filter = ".noise($v1)"; break;
                case 3:
                        $v1     = mt_rand(1,100) / 100;
                        $filter = ".sepia($v1)"; break;
                case 4:
                        $v1     = mt_rand(-3,3) / 10;
                        $filter = ".vibrance($v1)"; break;
                case 5:
                        $v1     = mt_rand(1,35) / 10;
                        $v2     = mt_rand(1,10) / 10;
                        $v3     = mt_rand(1,90);
                        $filter = ".lensBlur($v1,$v2,$v3)"; break;
                case 6:
                case 7:
                case 8:
                case 9:
/*
                        $min    = 1; $max = 7;
                        $v1a    = mt_rand($min,$max) / 10;
                        $v1b    = mt_rand($min,$max) / 10;
                        $v2a    = mt_rand($min,$max) / 10;
                        $v2b    = mt_rand($min,$max) / 10;
                        $v3a    = mt_rand($min,$max) / 10;
                        $v3b    = mt_rand($min,$max) / 10;
                        $curves = "";

                        switch(mt_rand(1,3)){
                                case 1:
                                        $curves = "[[$v1a,$v1b],[$v2a,$v2b]],[[0,0],[1,1]],[[0,0],[1,1]]"; break;
                                case 2:
                                        $curves = "[[0,0],[1,1]],[[$v1a,$v1b],[$v2a,$v2b]],[[0,0],[1,1]]"; break;
                                case 3:
                                        $curves = "[[0,0],[1,1]],[[0,0],[1,1]],[[$v1a,$v1b],[$v2a,$v2b]]"; break;
*/

			// SCENE curves adjust
                                $carray = array(
                                                "[[0,0],[1,1]],[[0,0],[1,1]],[[0.1,0.4],[0.6,0.6]]",
                                                "[[0,0],[1,1]],[[0,0],[1,1]],[[0.1,0.1],[0.3,0.6]]",
                                                "[[0,0],[1,1]],[[0,0],[1,1]],[[0.2,0.2],[0.5,0.2]]",
                                                "[[0,0],[1,1]],[[0,0],[1,1]],[[0.3,0.1],[0.3,0.2]]",
                                                "[[0,0],[1,1]],[[0,0],[1,1]],[[0.4,0.2],[0.1,0.4]]",
                                                "[[0,0],[1,1]],[[0,0],[1,1]],[[0.5,0.4],[0.7,0.2]]",
                                                "[[0,0],[1,1]],[[0,0],[1,1]],[[0.6,0.1],[0.4,0.5]]",
                                                "[[0,0],[1,1]],[[0.3,0.5],[0.3,0.7]],[[0,0],[1,1]]",
                                                "[[0,0],[1,1]],[[0.3,0.1],[0.7,0.4]],[[0,0],[1,1]]",
                                                "[[0,0],[1,1]],[[0.4,0.5],[0.3,0.1]],[[0,0],[1,1]]",
                                                "[[0.3,0.2],[0.3,0.7]],[[0,0],[1,1]],[[0,0],[1,1]]",
                                                "[[0.4,0.6],[0.6,0.7]],[[0,0],[1,1]],[[0,0],[1,1]]",
                                                "[[0.6,0.2],[0.5,0.1]],[[0,0],[1,1]],[[0,0],[1,1]]",
                                                "[[0.6,0.1],[0.6,0.4]],[[0,0],[1,1]],[[0,0],[1,1]]",
                                                "[[0.6,0.1],[0.4,0.4]],[[0,0],[1,1]],[[0,0],[1,1]]",
                                                "[[0,0],[1,1]],[[0.6,0.1],[0.4,0.4]],[[0.3,0.5],[0.3,0.7]]",
                                                "[[0.6,0.1],[0.4,0.4]],[[0,0],[1,1]],[[0.3,0.5],[0.3,0.7]]",
                                                "[[0.6,0.1],[0.4,0.4]],[[0.3,0.5],[0.3,0.7]],[[0,0],[1,1]]",
                                                );

                                $curves = $carray[(mt_rand(1,1000) % count($carray))];
                        // }
                        $filter = ".curves($curves)"; break;
                default;
                        $filter = ""; break;
        }

        $scene[3]      = $filter;

// scene name
        $scene[0]      = $scene_name;

// scene pic
        $scene[1]      = scene_layers($scenedir); // 5 mt_rand

// scene size
        $scene[2]      = mt_rand(120,136);

        return $scene;

} // end function scene_gen


function demon_ini() {

        global $demonname_ini, $demonname_mid, $demonname_end, $demon_pic;
        $demonname_ini = array("a","an","as","az","ba","bal","be","bel","del","dra","du","e","go","gri","hex","i","lu","ka","kar","kor","me","mel","mor","nar","ra","sa");
        $demonname_mid = array("bad","bi","bra","ci","da","de","fa","fri","for","gi","gra","gri","hu","la","las","li","mai","mo","mu","phis","pho","ra","su","ta","tel","va","vi","yan","za");
        $demonname_end = array("al","bam","bi","bub","bus","den","don","el","gor","goth","jag","ka","kor","ku","lak","leth","lia","mat","met","mon","moth","ra","riel","rog","roth","s","t","tan","th","tor","xas","zal","zel","zer","zo");

} // end function demon_ini

function planet_ini() {

    global $planetname_ini, $planetname_mid, $planetname_end, $planet_pic;
    $planetname_ini = array("a","al","bel","ca","car","chal","cyl","da","dei","di","e","en","eu","e","ga","ha","har","he","i","ia","ju","ka","kal","la","le","ly","m","me","mer","mi","mne","mu","ou","pa","pan","pra","pho","pro","rhe","sa","si","ska","spon","tar","tay","the","thy","ti","ve","y");
    $planetname_mid = array("an","bio","bo","ce","cli","cu","de","di","do","dras","e","ga","ge","ger","i","la","le","les","ly","ma","mal","me","mis","mo","nan","ni","no","o","pa","pha","pe","pi","po","ry","ro","si","so","te","the","tla","u","xi");
    $planetname_end = array("a","ars","be","bos","da","de","dus","e","gir","ke","lya","mas","me","mir","mos","ne","nus","on","ops","pe","pso","ra","rix","ros","ry","s","tan","te","ter","thi","ti","tis","tne","to","tur","tus","tyl","us","ve","vi","vos");
    $planet_pic = array("01.png","02.png","03.png","04.png","05.png","06.png","07.png","08.png","09.png","10.png","11.png","12.png","13.png","14.png","15.png","16.png","17.png","18.png","19.png","20.png",);
    
} // end function planet_ini


function demon_count($dir) {

    $dpart = "";    $dcount = 1;
    $dlayers        = array();
    $arr2ret        = array();
    if ($handle = opendir($dir)) {

        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                    array_push($dlayers, $entry);
                    // echo "$entry\n";
            }
        }
        closedir($handle);
    }

// create various parts 
    foreach (array("LW", "RW", "LB", "BO", "HE") as $part) {
        $demon_elems    = array();
        $demon_elems    = kind_elem($part, $dlayers); // elementi di tipo "HE"... 
        if (in_array($part, array("RW", "BO", "LB", "HE"))) { $dpart .= " $part: " . count($demon_elems); $dcount *= count($demon_elems); }
    }

    $demoncount = "demons: " . $dcount . " parts: " . $dpart;

    return $demoncount;

} // end function demon_count

?>
