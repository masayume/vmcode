<?php

// TODO
// scenes (type param)

// >>> introduce FLIP horizontal
// >>> :240 write JSON
// >>> :245: array z0N global & scene layers built from this
// >>> facultative/mandatory layers

// particles: http://aerotwist.com/tutorials/creating-particles-with-three-js/
// demon data (power, energy, attack type)
// planet data
// http://stackoverflow.com/questions/667045/getpixel-from-html-canvas
// http://www.pixeljoint.com/pixels/new_icons.asp?q=1&pg=3

// DONE
// http://www.html5rocks.com/en/tutorials/canvas/imagefilters/

// REF.
// http://superpixeltime.com/

// PARAMETERS

$layerdir	= "./img/demons/";
$scenedir	= "./img/scenes/";
$page   = 1; $nextp  = 2; $prevp  = 1; $res_qs = ""; $type = "";

parse_str($_SERVER['QUERY_STRING'], $params);
if ($params['seed']) {
	$master_seed	= $params['seed'];
} else {
	$master_seed	= 100;
}
if ($params['page']) {
	$page	= $params['page']; $nextp = $page+1; $prevp = $page-1;
} else {
	$page	= 1; $nextp	= 2; $prevp	= 1;
}
if (!$params['results']) {
	$results = 12;
} else {
	$results = $params['results'];
	$res_qs  .= "&results=" . $results;
}
if (!$params['type']) {
        $type = "planets";
} else {
        $type = $params['type'];
        $res_qs  .= "&type=" . $type;
}


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
	print " NAVIGATION: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" . "<a href='" .$_SERVER['PHP_SELF'] . "?seed=" . $master_seed . "&page=" . $prevp . $res_qs . "'> &lt;&lt; previous </a> &nbsp;&nbsp;&nbsp; <a href='" . $_SERVER['PHP_SELF'] . "?seed=" . $master_seed . "&page=" .$nextp . $res_qs . "'> next >> </a> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; <a href='" . $_SERVER['PHP_SELF'] . "?seed=" . $master_seed . "&page=" .$nextp . "&type=planets'>PLANETS</a>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; <a href='" . $_SERVER['PHP_SELF'] . "?seed=" . $master_seed . "&page=" .$nextp . "&type=demons&results=3'>DEMONS</a>  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; <a href='" . $_SERVER['PHP_SELF'] . "?seed=" . $master_seed . "&page=" .$nextp . "&type=backs&results=3'>BACKGROUNDS</a>"; 
	print "\n\n\n\n<hr><div style=\"text-align:center;\">";

// PLANETS

	if ($type == "planets") {
		for ($i=1; $i<=$page * $results; $i++) {

// planetary values generation
	                $planet_array = planet_gen();

			if ($i>(($page - 1) * $results)) {
				$img = "/demon/img/" . $planet_array[1];
				$planet_name = strtoupper($planet_array[0]);
				// $planet_img = "<img id=\"planet-$i\" src=\"/demon/img/" .$planet_array[1] . "\" width=\"" . $planet_array[2]. "px\">"; 
				$planet_url = "/demon/img/" . $planet_array[1];
				$planet_img = "<img id=\"planet-$i\" src=\"/demon/img/" .$planet_array[1] . "\" width=0 height=0 \">"; 
				$width		= $planet_array[2];
				$filter		= $planet_array[3];
			
				echo planet($i, $planet_url, $planet_name, $width, $img, $filter);
			}
		}
	} // end planets

// DEMONS 

        if ($type == "demons") {
                for ($i=1; $i<=$page * $results; $i++) {
			$imgpath = "/demon/img/demons/" ;
			$demon_array = demon_gen();

                        if ($i>(($page - 1) * $results)) {

				$demon_name 	= $demon_array[0];
				$demon_url 	= $demon_array[1];
				$width 		= $demon_array[2];
				$filter		= $demon_array[3];
				// echo $demon_img;
				echo demon($i, $imgpath, $demon_url, $demon_name, $width, $filter);

			}
		}
	} // end demons

// BACKGROUNDS - background layers 
// 	skybox
//	skyboxfx
// 	skyline
//	horizon
//	farawaybackground
//	background
//	nearbybackground
//	foreground

        if ($type == "backs") {
      		for ($i=1; $i<=$page * $results; $i++) {
                        $imgpath = "/demon/img/scenes/" ;
			$scene_array = array();
                        $scene_array = scene_gen();

                        if ($i>(($page - 1) * $results)) {

                                $scene_name     = $scene_array[0];
                                $scene_url      = $scene_array[1];
                                $width          = $scene_array[2];
                                $filter         = $scene_array[3];
                                // echo $scene_img;
                                echo scene($i, $imgpath, $scene_url, $scene_name, '', $filter);

                        }
                }

        } // end backgrounds

	print "</div><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><hr>";
	print "ini: " . count($planetname_ini) . "  mid:" . count($planetname_mid) ."  end:" . count($planetname_end);
	print " === " . demon_count($layerdir);
	print "</body></html>";

echo "\n";

exit(0);


// = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = -
// = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = -
// = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = -

function demon_count($dir) {

	$dpart = "";	$dcount = 1;
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

function demon_layers($dir) {

	$dlayers	= array();
	$arr2ret	= array();
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
		$demon_elems	= array();
		$demon_elems 	= kind_elem($part, $dlayers); // elementi di tipo "HE"... 
		array_push($arr2ret, $demon_elems[(mt_rand(1,1000) % count($demon_elems))]); // carico nell'array da tornare l'rt_rnd-esimo elemento
	}

	$arr2ret[0] = $arr2ret[1]; // same right and left wing
	$arr2ret[0] = preg_replace("/RW/", "LW", $arr2ret[1]);

	return $arr2ret;

} // end function demon_layers

function scene_layers($dir) {

        $dlayers        = array();
	$hlayers	= array();
        $arr2ret        = array();
        if ($handle = opendir($dir)) {

            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {

			$file_parts = pathinfo($entry);

// compila il contenuto del JSON
			if (($file_parts['extension'] == 'jpg') || ($file_parts['extension'] == 'png')) {
				// trovare l'elemento zNN 
				$fileparts = explode("-", $entry);
				foreach ($fileparts as $fpart) {		
					if (substr($fpart, 0, 1) == 'z') {
						$zlayer = $fpart;
						#            "layer" => "part" 
						$hl = array( $zlayer => $entry );
						array_push($hlayers, $hl);
					}
				}

                        	array_push($dlayers, $entry);

                        	// echo "$entry\n";
			}
                }
            }
            closedir($handle);
        }

// write JSON with dlayers data
//	$hlayers	= '{backs:[' . $hlayers . ']}';
	$jlayers 	= json_encode($hlayers);
	$jfile		= $dir . "scene.json"; 
	file_put_contents($jfile, $jlayers);

// create various parts 
// BACKGROUNDS - background layers (chance to appear, type) 
	$zlay	= array(
		"z00" => 100,  	//      z00 - skybox (MAND.)
		"z01" => 30,   	//      z01 - skyboxfx (OPT.)
		"z02" => 33,	//      z02 - skyline (OPT.)
		"z03" => 30,	//      z03 - atmosphere (OPT. - fog, vapors...)
		"z04" => 50,	//      z04 - foreground (OPT. )
		"z05" => 25,	//      z05 - foreground FX (OPT. )
	);
	
        foreach (array("z00","z01","z02","z03","z04","z05") as $part) {
                $scene_elems    = array();
                $scene_elems    = kind_elem($part, $dlayers); // elementi di tipo zNN... 
		if (mt_rand(1,100) <= $zlay[$part]) {
                	array_push($arr2ret, $scene_elems[(mt_rand(1,1000) % count($scene_elems))]); // carico nell'array da tornare l'rt_rnd-esimo elemento
		}
        }

        return $arr2ret;

} // end function scene_layers

function kind_elem($kind, $dlayers) {

	$arr2ret  = array();
        foreach ($dlayers as $dlayer) { 
		if (strstr($dlayer, $kind)) { array_push($arr2ret, $dlayer); } }

	return $arr2ret;

} // end function rndret_elem()

function scene($i, $imgpath, $scene_url, $scene_name, $width, $filter) {

	if (!$filter) { $filter = "&nbsp;"; }
	$divs = "";
	for ($j=0; $j<6; $j++ ) {

		// non aggiungere un div se non è valorizzato $scene_url[$j]
		if ($scene_url[$j]) {
			$divs .= "\n<div id='div$j' style=\"margin-top: -35px;\"><img id=\"myImage-$i-$j\" width=\"$width\" height=\"$width\" src=\"$imgpath$scene_url[$j]\" onload=\"tracescene_$i($j)\"></div>";
		}
	}

        $scene = <<< EOP

<div id="container" class="scene" style="display:inline-block; width:480px; background-color: #000000; padding-left: 10px;">
        <script>
            function tracescene_$i(n) {
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
		<small><p><small>$i:</small> $scene_name
        	<small><small><br> $filter </small></small></p></small>
</div>
EOP;

        return $scene;

} // end function scene


function demon($i, $imgpath, $demon_url, $demon_name, $width, $filter) {
        $demon = <<< EOP

<div id="container" class="demon" style="display:inline-block; width:250px; background-color: #000000;">
        <script>
            function tracedemon_$i(n) {
                // window.alert("demon: $demon_name on canvas $i");   
                var canvas$i            = fx.canvas();
		var name		= 'myImage-' + $i + '-' + n;
                var image$i             = document.getElementById(name);
                var texture$i           = canvas$i.texture(image$i);
                var filter$i            = "canvas$i.draw(texture$i)$filter.update()"; // apply the ink filter
                eval(filter$i);
                image$i.parentNode.insertBefore(canvas$i, image$i);
                image$i.parentNode.removeChild(image$i);
            }
        </script>
        <div id='div0'><img id="myImage-$i-0" width="$width" height="$width" src="$imgpath$demon_url[0]" onload="tracedemon_$i(0)"></div>
        <div id='div1'><img id="myImage-$i-1" width="$width" height="$width" src="$imgpath$demon_url[1]" onload="tracedemon_$i(1)"></div>
        <div id='div2'><img id="myImage-$i-2" width="$width" height="$width" src="$imgpath$demon_url[2]" onload="tracedemon_$i(2)"></div>
        <div id='div3'><img id="myImage-$i-3" width="$width" height="$width" src="$imgpath$demon_url[3]" onload="tracedemon_$i(3)"></div>
        <div id='div4'><img id="myImage-$i-4" width="$width" height="$width" src="$imgpath$demon_url[4]" onload="tracedemon_$i(4)"></div>
        <p><small>$i:</small> $demon_name
        <br><small><small> $filter </small></small></p>
</div>
EOP;

        return $demon;

} // end function demon

function planet($i, $planet_url, $planet_name, $width, $img, $filter) {

        $planet = <<< EOP

<div class="planet" style="display:inline-block; width:200px;">
<!--    <canvas id="myImage-$i" width="200" height="200" style="border:1px solid #d3d3d3;"></canvas> -->
    	<script>
	    function traceplanet$i() {
		// window.alert("planet: $planet_name on canvas $i");	
		var canvas$i 		= fx.canvas();
    		var image$i 		= document.getElementById('myImage-$i');
    		var texture$i 		= canvas$i.texture(image$i);
    		var filter$i		= "canvas$i.draw(texture$i)$filter.update()"; // apply the ink filter
		eval(filter$i);
    		image$i.parentNode.insertBefore(canvas$i, image$i);
    		image$i.parentNode.removeChild(image$i);
	    }
    	</script>
	<img id="myImage-$i" width="$width" height="$width" src="$planet_url" onload="traceplanet$i()">
	<br clear="all"><small>$i:</small> $planet_name 
	<br><small><small> $filter </small></small>
</div>

EOP;

        return $planet;

} // end function planet

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

function planet_ini() {

	global $planetname_ini, $planetname_mid, $planetname_end, $planet_pic;
	$planetname_ini = array("a","al","bel","ca","car","chal","cyl","da","dei","di","e","en","eu","e","ga","ha","har","he","i","ia","ju","ka","kal","la","le","ly","m","me","mer","mi","mne","mu","ou","pa","pan","pra","pho","pro","rhe","sa","si","ska","spon","tar","tay","the","thy","ti","ve","y");
	$planetname_mid = array("an","bio","bo","ce","cli","cu","de","di","do","dras","e","ga","ge","ger","i","la","le","les","ly","ma","mal","me","mis","mo","nan","ni","no","o","pa","pha","pe","pi","po","ry","ro","si","so","te","the","tla","u","xi");
	$planetname_end = array("a","ars","be","bos","da","de","dus","e","gir","ke","lya","mas","me","mir","mos","ne","nus","on","ops","pe","pso","ra","rix","ros","ry","s","tan","te","ter","thi","ti","tis","tne","to","tur","tus","tyl","us","ve","vi","vos");
	$planet_pic	= array("01.png","02.png","03.png","04.png","05.png","06.png","07.png","08.png","09.png","10.png","11.png","12.png","13.png","14.png","15.png","16.png","17.png","18.png","19.png","20.png",);
	
} // end function planet_ini

function planet_gen() {

	global $planetname_ini, $planetname_mid, $planetname_end, $planet_pic;
	$planet_name = "";
	$planet = array();
	switch(mt_rand(1,10)){
  		case 1:
  		case 2:
    			$planet_name = $planetname_ini[(mt_rand(1,1000) % count($planetname_ini))] . $planetname_end[(mt_rand(1,1000) % count($planetname_end))];
    		break;
        	case 9:
        	case 10:
        	        $planet_name = $planetname_ini[(mt_rand(1,1000) % count($planetname_ini))] . $planetname_mid[(mt_rand(1,1000) % count($planetname_mid))] . $planetname_mid[(mt_rand(1,1000) % count($planetname_mid))] . $planetname_end[(mt_rand(1,1000) % count($planetname_end))];
        	break;
  		default:
                	$planet_name = $planetname_ini[(mt_rand(1,1000) % count($planetname_ini))] . $planetname_mid[(mt_rand(1,1000) % count($planetname_mid))] . $planetname_end[(mt_rand(1,1000) % count($planetname_end))];
	}	

// planet name
	$planet[0] 	= $planet_name;
// planet pic
	$planet[1] 	= $planet_pic[(mt_rand(1,1000) % count($planet_pic))];
// planet size
	$planet[2]	= mt_rand(50,200);

/*
// apply the hue/saturation filter - range: -1:1 ; -1:1
    // canvas3.draw(texture3).huesaturation(-0.83,0).update(); 
// apply the colorHalftone filter - range: 0:1 
    canvas7.draw(texture7).colorHalftone(100,100,0.785,2).update(); 
*/

// planet filter
	$filter = "";
        switch(mt_rand(1,9)){
                case 1:
			$v1	= mt_rand(5,20);
			$filter = ".denoise($v1)"; break;
                case 2:
			$v1	= mt_rand(1,3) / 10;
			$filter = ".noise($v1)"; break;
                case 3:
			$v1	= mt_rand(1,100) / 100;
                        $filter = ".sepia($v1)"; break;
                case 4:
			$v1	= mt_rand(1,5);
			$v2	= mt_rand(1,5);
                        $filter = ".unsharpMask($v1,$v2)"; break;
                case 5:
			$v1	= mt_rand(-10,10) / 10;
                        $filter = ".vibrance($v1)"; break;
                case 6:
			$v1	= mt_rand(1,35) / 10;
			$v2	= mt_rand(1,10) / 10;
			$v3	= mt_rand(1,90);
                        $filter = ".lensBlur($v1,$v2,$v3)"; break;
                case 7:
			$v1	= mt_rand(1,5) / 10;
			$filter = ".ink($v1)"; break;
                case 8:
			$min	= 1; $max = 4;
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
			}
                        $filter = ".curves($curves)"; break;
		default;
		
	}

	$planet[3]	= $filter;

	return $planet;
}

function demon_ini() {

        global $demonname_ini, $demonname_mid, $demonname_end, $demon_pic;
        $demonname_ini = array("a","an","as","az","ba","bal","be","bel","del","dra","du","e","go","gri","hex","i","lu","ka","kar","kor","me","mel","mor","nar","ra","sa");
        $demonname_mid = array("bad","bi","bra","ci","da","de","fa","fri","for","gi","gra","gri","hu","la","las","li","mai","mo","mu","phis","pho","ra","su","ta","tel","va","vi","yan","za");
        $demonname_end = array("al","bam","bi","bub","bus","den","don","el","gor","goth","jag","ka","kor","ku","lak","leth","lia","mat","met","mon","moth","ra","riel","rog","roth","s","t","tan","th","tor","xas","zal","zel","zer","zo");

} // end function demon_ini

function demon_gen() {

        global $demonname_ini, $demonname_mid, $demonname_end, $demon_pic, $layerdir;
        $demon_name = "";
        $demon = array();
        switch(mt_rand(1,10)){
                case 1:
                case 2:
                        $demon_name = $demonname_ini[(mt_rand(1,1000) % count($demonname_ini))] . $demonname_end[(mt_rand(1,1000) % count($demonname_end))];
                break;
                case 9:
                case 10:
                        $demon_name = $demonname_ini[(mt_rand(1,1000) % count($demonname_ini))] . $demonname_mid[(mt_rand(1,1000) % count($demonname_mid))] . $demonname_mid[(mt_rand(1,1000) % count($demonname_mid))] . $demonname_end[(mt_rand(1,1000) % count($demonname_end))];
                break;
                default:
                        $demon_name = $demonname_ini[(mt_rand(1,1000) % count($demonname_ini))] . $demonname_mid[(mt_rand(1,1000) % count($demonname_mid))] . $demonname_end[(mt_rand(1,1000) % count($demonname_end))];
        }

// demon filter
        $filter = "";
        switch(mt_rand(1,12)){
                case 2:
                        $v1     = mt_rand(10,100) / 100;
                        $filter = ".sepia($v1)"; break;
                case 3:
                        $v1     = mt_rand(1,5);
                        $v2     = mt_rand(1,5);
                        $filter = ".unsharpMask($v1,$v2)"; break;
                case 4:
                        $v1     = mt_rand(-10,10) / 10;
                        $filter = ".vibrance($v1)"; break;
                case 1:
                case 5:
                case 6:
                case 7:
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

        $demon[3]      = $filter;

// demon name
        $demon[0]      = $demon_name;

// demon pic
        $demon[1]      = demon_layers($layerdir); // 5 mt_rand

// demon size
        $demon[2]      = mt_rand(120,136);

	return $demon;

} // end function demon_gen

// 

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
			// SCENE curves adjust
                                $carray = array(
                                                "[[0,0],[1,1]],[[0,0],[1,1]],[[0.1,0.4],[0.6,0.6]]",
                                                "[[0,0],[1,1]],[[0,0],[1,1]],[[0.1,0.1],[0.3,0.6]]",
                                                "[[0,0],[1,1]],[[0,0],[1,1]],[[0.2,0.2],[0.5,0.2]]",
                                                "[[0,0],[1,1]],[[0,0],[1,1]],[[0.3,0.1],[0.3,0.2]]",
                                                "[[0,0],[1,1]],[[0,0],[1,1]],[[0.4,0.2],[0.1,0.4]]",
                                                "[[0,0],[1,1]],[[0,0],[1,1]],[[0.5,0.4],[0.7,0.2]]",
                                                "[[0,0],[1,1]],[[0,0],[1,1]],[[0.6,0.1],[0.3,0.1]]",
                                                "[[0,0],[1,1]],[[0.3,0.5],[0.3,0.7]],[[0,0],[1,1]]",
                                                "[[0,0],[1,1]],[[0.3,0.1],[0.7,0.4]],[[0,0],[1,1]]",
                                                "[[0,0],[1,1]],[[0.4,0.5],[0.3,0.1]],[[0,0],[1,1]]",
                                                "[[0.3,0.2],[0.3,0.6]],[[0,0],[1,1]],[[0,0],[1,1]]",
                                                "[[0.4,0.6],[0.6,0.7]],[[0,0],[1,1]],[[0,0],[1,1]]",
                                                "[[0.6,0.2],[0.5,0.1]],[[0,0],[1,1]],[[0,0],[1,1]]",
                                                "[[0.6,0.1],[0.6,0.4]],[[0,0],[1,1]],[[0,0],[1,1]]",
                                                "[[0.6,0.1],[0.4,0.4]],[[0,0],[1,1]],[[0,0],[1,1]]",
//                                                "[[0,0],[1,1]],[[0.6,0.1],[0.4,0.4]],[[0.3,0.5],[0.3,0.7]]",
//                                                "[[0.6,0.1],[0.4,0.4]],[[0,0],[1,1]],[[0.3,0.5],[0.3,0.7]]",
                                                "[[0.6,0.1],[0.3,0.2]],[[0.3,0.5],[0.3,0.6]],[[0,0],[1,1]]",
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



?>
