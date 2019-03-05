<?php

// TODO

// :??? planet names different from demon names
// :200 START JSON info CREATE & WRITE (json layers & info generation)

// DONE
// :458 calcolo del nome del demone con split sul numero dei scene[1]   
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

// phpinfo(); exit(0);

$version    = '1.31';

$configfile = basename(__FILE__, '.php') . '-config.php'; 
// include 'mersenne-config.php';
include $configfile;

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

// default JSON file name
$demonsfile     = $main_path_dir . 'demons/demons4js.json';

$json = "";
$scenedir	= "";
$page   = 1; $nextp  = 2; $prevp  = 1; $res_qs = ""; $type = ""; $atype = ""; $results    = 0;

$assetmode      = "mixed";
$structsmode    = 0;

// parse parameters
parse_str($_SERVER['QUERY_STRING'], $params);
if (isset($params['seed'])) { 
	$master_seed	= $params['seed']; 
} else { 
	$master_seed	= 100; 
}
if (isset($params['page'])) { 
	$page	= $params['page']; 
	$nextp = $page+1; 
	$prevp = $page-1; 
} else { 
	$page	= 1; 
	$nextp	= 2; 
	$prevp	= 1; 
}
if (!isset($params['results'])) { $results = 24; } 
else {
	$results = $params['results'];
	$res_qs  .= "&results=" . $results;
}
if (!isset($params['type'])) { $type = "backs"; } 
else {
        $type = $params['type'];
        $res_qs  .= "&type=" . $type;
}

$atype = '';
if (isset($params['atype'])) { 
    $atype = $params['atype'];
    $scenedir = $main_path_dir . $atype . '/'; 
} else {
    $atype = 'demons';
    $scenedir = $main_path_dir . $atype . '/'; 
    $params['atype'] = 'demons';
}
$sseed = 0;
if (isset($params['sseed'])) { 
    $sseed = $params['sseed'];
}

// define JSON destination directory and file (...4js.json) & layers info file (.json)
$demonsfile     = $main_path_dir . $params['atype'] . '/' . $params['atype'] . '4js.json';

// read JSON in the image "dir"
$json_file      = $main_path_dir . $params['atype'] . '/' . $params['atype'] . '.json';

set_error_handler(function ($err_severity, $err_msg, $err_file, $err_line, array $err_context)
{
    throw new ErrorException( $err_msg, 0, $err_severity, $err_file, $err_line );
}, E_WARNING);

try {
    $json = file_get_contents($json_file);
}
catch (Exception $e) {
    echo "ERROR: file <b>" . $json_file . "</b> MUST EXIST in directory <b>" . $main_path_dir . $params['atype'] . "</b>";
    exit(1);
}

restore_error_handler();

// JSON import values
$json_data          = json_decode($json, true);
$jwidth             = $json_data['width'];
$owidth             = $json_data['original_width'];
$jheight            = $json_data['height'];
$demon_layers       = $json_data['layers'];
$demon_names        = $json_data['names'];          // ES. $demon_names["BO"][1] ...
$demon_namestruct   = $json_data['name_struct'];   
$font_size          = $json_data['font_size'];
$structs            = array();

if (isset($json_data['structs'])) {
    $structs = $json_data['structs'];
    $structsmode = 1;
}


$font_size          = "";
if ($json_data['font_size']) {
    $font_size      = $json_data['font_size'];
} else {
    $font_size      = "20px";
}


// print "<pre>"; print_r($structs["a"]["layers"]); exit(0);

// init master seed
mt_srand($master_seed);

// init planet, demon name data
planet_ini();
demon_ini();

$javascript   = jfunction();
$css		  = overcss();

echo <<< EOT
<html><head>
<title>$title_header - v. $version</title>
 
    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <meta charset="UTF-8">
<style type="text/css">
a:link  { color:#aaaaaa; } 
a:visited { color:#aaaaaa; } 
</style>
$css
</head>
<body style="background-color:#000000; color: #cccccc; font-family: 'arcadeclassic', sans-serif; font-size: 20px;">
$javascript

EOT;

$listul_start = ""; $listul_end = ""; $listli_start = ""; $listli_end = "";
if (isset($layout_orient)) {
    $listul_start = "<ul>";    $listul_end = "</ul>";    $listli_start = "<li>";    $listli_end = "</li>";
}

// NAV LINKS
$QURL       = "\n  $listli_start <a href='" .$_SERVER['PHP_SELF'] . "?seed=" . $master_seed . "&page=1";
$URL        = Array();

$allURLs    = $listul_start;
foreach ($contents as $cont) {
    $URL[$cont]     = $QURL . "&results=" . $results_x_page[$cont] . "&atype=$cont'>$cont</a>   $listli_end";
    $allURLs        .= $URL[$cont];
}

$allURLs    .= $listul_end;

$res_qs  .= "&atype=" . $atype;
// $res_qs  .= "&results=" . $results_x_page[$atype];

// navigation && MAIN div

$vspacer = "";

    if (isset($layout_orient) && $layout_orient == 'vertical') {    // LAYOUT VERTICALE

        $vspacer = "<br />";

        print "\n\n<div id='topdiv'>";
//        print " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";
     
        if ($prevp > 0) {
            print "<button type=\"button\" class=\"btn btn-primary\">";
            print "<a href='" .$_SERVER['PHP_SELF'] . "?seed=" . $master_seed . "&page=" . $prevp . $res_qs . "'> &lt;&lt;&lt;&lt; </a>";
            print "</button>";        
        
        } else {
            print "<button type=\"button\" class=\"btn btn-primary\">";
            print " &lt;&lt;&lt;&lt; ";                
            print "</button>";        
        }
    
     
        // print "&nbsp;&nbsp;&nbsp;" 
            print "<button type=\"button\" class=\"btn btn-primary\">";
            print  "<a href='" . $_SERVER['PHP_SELF'] . "?seed=" . $master_seed . "&page=" .$nextp . $res_qs . "'> >>>> </a>";
            // print " &nbsp;  &nbsp;  &nbsp;"; 
    //    print $URL["demons"] . $URL["demonship"] . $URL["demonback"] . $URL['demonbadge'];
            print "</button>";        

    } else {                                                       // LAYOUT STANDARD (ORIZZONTALE)

        $vspacer = " - ";

        print "\n\n<div id='topHdiv'>";
    	print " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";
    
        if ($prevp > 0) {
            print "<button type=\"button\" class=\"btn btn-primary\">";
            print "<a href='" .$_SERVER['PHP_SELF'] . "?seed=" . $master_seed . "&page=" . $prevp . $res_qs . "'> &lt;&lt;&lt;&lt; </a>";
            print "</button>";        
        } else {
            print " &lt;&lt;&lt;&lt; ";                
        }
    
     
        print "&nbsp;&nbsp;&nbsp;" 
            . "<a href='" . $_SERVER['PHP_SELF'] . "?seed=" . $master_seed . "&page=" .$nextp . $res_qs . "'> >>>> </a> &nbsp;  &nbsp;  &nbsp;"; 
    //    print $URL["demons"] . $URL["demonship"] . $URL["demonback"] . $URL['demonbadge'];

    }

    // PAGE INFO
    print $allURLs;    
    print "\n\n\n\n<hr>";
    print "$vspacer"  . $atype ;    
    print "$vspacer page "   . $page . " / ∞" ;    

    print "\n</div>";

    $elem_pos  = "";

    if ($results == 1) {
        $elem_pos  = " left: 400px; ";
    }

    print "\n\n<div id=\"layers\" style=\"position: relative; $elem_pos \">";

/*  =============================
        START MAIN SCENE LOOP 
    =============================
*/
    
    for ($i=1; $i<=$page * $results; $i++) {

    $scene_seed = 0;
    //  define scene_seed
    if (isset($sseed) && $sseed != 0) {
        $scene_seed     = $sseed;
    } else {
        $scene_seed     = $page * 100 + $i;
    }

        $imgpath        = $main_path . $atype . '/';
    
    //  print "<pre>"; print_r($scene_array);
    
        if ($i>(($page - 1) * $results)) {

            mt_srand($scene_seed); // uses a specific scene seed to generate all the other pseudo-random resources

            $main_layers = array();
            $name_struct = array();
            if ($structsmode) {     // when "structs" is defined in TPL.json use layers defined
                // numero di elementi max da cui estrarre il mt_rnd: count(array_keys($structs)); 
                // print "structmode !";
                $structkeys     = array_keys($structs);
                $mt_struct_i    = mt_rand(1,count($structkeys));
                // print "mt_struct:" . $mt_struct_i; print_r( $structkeys[$mt_struct_i-1] );

                $main_layers    = $structs[$structkeys[$mt_struct_i-1]]["layers"]; // struct scelta con mr_rand
                $name_struct    = $structs[$structkeys[$mt_struct_i-1]]["name_struct"]; 
            } else {
                // print "no structmode";
                $main_layers       = $demon_layers;
            }

            $scene_array    = array();
            $scene_array    = scene_gen($i, $main_layers, $name_struct);
    
            $scene_name     = $scene_array[0];
            $scene_url      = $scene_array[1];
            $filter         = $scene_array[3];

            $struct2show    = "";
            if (isset($mt_struct_i)) {
                    $struct2show = $structkeys[$mt_struct_i-1];
            }

            // echo $scene_img; $sseed
            echo scene($i, $imgpath, $scene_url, $scene_name, $jwidth, $jheight, $font_size, $filter, $atype, $scene_seed, $main_layers, $struct2show);
    
        }
    }

/*  ===========================
        END MAIN SCENE LOOP 
    ===========================
*/


	print "</div>";


    print "<div id=\"bottomdiv\">";
    print "$vspacer v.$version - 2018-2019 - by masayume ";
//    print "$vspacer NAME HE: " . count($demonname["HE"]) . " BO:" . count($demonname["BO"]) ." LB:" . count($demonname["LB"]);
    print "$vspacer  " . demon_count($scenedir, $atype);
    print "$vspacer  DIR:" . $imgpath;
    print "</div>";

    print $tracking_code;

	print "</body></html>";

echo "\n";

// if !exists demons file create it

exit(0);


// = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = -
// = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = -
// = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = -


// carica i layer di un certo tipo dal file system e calcola quali sono i layer che comporranno una singola immagine
// genera anche il contenuto di file "4js.json"
function scene_layers($dir, $i, $layers) {

	global		$default_layers;
	global		$demon_layers;
    global      $demon_names;
    global      $demonsfile;
    global      $demonname, $demonname_ini, $demonname_mid, $demonname_end;
    global      $page;
    global      $assetmode;
    global      $structs;
    global      $structsmode;
    global      $results;
    global      $atype;
    global      $main_path_dir;

    $dlayers            = array();
    $jslayers           = array();
    $arr2ret            = array();
    $main_layers_types  = array(); 

    if ($handle = opendir($dir)) {
        // print "<br>" . $dir;

        // load layers type => main_layers
        $main_layers    = array();
        $mt_struct_i    = 0;

        $main_layers    = $layers;
        // print "<pre>"; print_r($main_layers); print "</pre>";

        while (false !== ($entry = readdir($handle))) {
        // foreach (glob("$handle*.{jpg,png,webp}", GLOB_BRACE) as $entry) {

            $fileinfo = pathinfo($entry);

            if ( isset($fileinfo["extension"]) ) {            

                if (  $fileinfo["extension"] == "jpg" || $fileinfo["extension"] == "png" || $fileinfo["extension"] == "webp"  ) { 

                    array_push($dlayers, $entry);
                    $nameparts  = explode("_", $entry);
                    $extparts   = explode(".",$nameparts[4]);
                    $numpart    = ltrim($extparts[0], '0');

                    if (!in_array($nameparts[1], $main_layers_types) ) {
                        array_push($main_layers_types, $nameparts[1]);
                    }


// START JSON info injection

                    $partname   = "";
                    $effect     = "";
                    $dtype      = "";
                    if ($nameparts[2] == "HE") {                    // HEAD definition (pattern)
                        if (isset($demonname["HE"][$numpart])) {
                            $partname   = $demonname["HE"][$numpart];                            
                        } else {
                            $partname   = "2bdef";
                        }
                        $dtype      = "head";
                        $effect     = "pattern:M";
                    } 
                    else if ($nameparts[2] == "BO") {               // BODY definition (energy)
                        if (isset($demonname["BO"][$numpart])) {
                            $partname   = $demonname["BO"][$numpart];                            
                        } else {
                            $partname   = "2bdef";
                        }
                        $dtype      = "body";
                        $effect     = "energy:K";
                    } 
                    else if ($nameparts[2] == "LB") {               // LOWER BODY definition (weapon)
                        if (isset($demonname["LB"][$numpart])) {
                            $partname   = $demonname["LB"][$numpart];                            
                        } else {
                            $partname   = "2bdef";
                        }
                        $dtype      = "lowerbody";
                        $effect     = "weapon:Q";
                    }
                    else if ($nameparts[2] == "LW") {               // LOWER BODY definition (weapon)
                        $partname   = "";   //$demonname_ini[$numpart];
                        $dtype      = "leftwing";
                        $effect     = "var:A";
                    }
                    else if ($nameparts[2] == "RW") {               // LOWER BODY definition (weapon)
                        $partname   = "";   // $demonname_ini[$numpart];
                        $dtype      = "rightwing";
                        $effect     = "";
                    }

/*
CALL: /home/masayume/down/demon/demons/anims/dem_A_LW_1_41, /keplerion/img/demons/, 256, 1, 0
CALL: /home/masayume/down/demon/demons/anims/dem_A_RW_1_41, /keplerion/img/demons/, 256, 1, 1
CALL: /home/masayume/down/demon/demons/anims/dem_A_LB_2_38, /keplerion/img/demons/, 256, 1, 2
*/

                    $scene_url_noext    = preg_replace('/\\.[^.\\s]{3,4}$/', '', $entry);
                    $scene_spritesheet  = $main_path_dir . $atype . "/anims/" . $scene_url_noext;

                    $spshda = glob_spritesheet($scene_spritesheet, '/keplerion/img/demons/', 128, 0, 0);

                    $keyval = Array(
                            "type" => $dtype, 
                            "img" => $entry, 
                            "partname" => $partname, 
                            "effect" => $effect
                    );

                    if (!empty($spshda)) {
                        $spritesheetname    = explode('/', $spshda["spritesheet"]);
                        $urlanim            = $spshda["urlanim"];
                        $keyval["frames"]   = $spshda["frames"];
                        $keyval["time"]     = $spshda["time"];
                        $animg              = explode('/', $spshda["urlanim"]);
                        $keyval["img"]      = $animg[count($animg)-2] . '/' . $animg[count($animg)-1];    
                    }


                    $jslayers[$nameparts[2]][$extparts[0]] = $keyval;

//                    print "\n<!-- keyval: "; print_r($keyval); print "\n-->" ;

// END JSON info injection

                

                } // end handling only files with proper extensions (image assets)
            } // if !is_dir

        }
        closedir($handle);
    }

// on page 1 encode & write for javascript layer images to $demonsfile 
if ($page==1 && $results == 1) {
    file_put_contents($demonsfile, json_encode($jslayers, JSON_PRETTY_PRINT));    
    echo "wrote $demonsfile .<br>";
}

// TODO: in $main_layers_types ci sono i vari tipi (template_A, $template_B)
    // 0) randomizzazione della singola immagine funzione dei tre parametri: $seed, $page, $i
        // calcolare i vari tipi di asset _A_ _B_ (_AB_ ?)
        // considerare solo i tipi di asset che possono andare insieme (template.json ? )
    // 1) occorre definire la randomizzazione mersenne su quale tipo ($main_layers_types) usare per questa generazione 
    //      - siamo in un loop di 24 elementi ? -
    // 2) usare kind_elem per forzare la selezione di solo un certo tipo di elemento

    // DATA:    $dlayers[0] => template_A_BO_1_001.png
    //          $dlayers[1] => template_A_HE_1_001.png
    //          $dlayers[2] => template_B_LB_1_001.png
    //          $dlayers[3] => template_B_LW_1_001.png
    //          $dlayers[4] => template_C_RW_1_001.png
    //          $assetmode  = mixed

//
// MAIN MT_RND LOOP
// 


    foreach (array_keys($main_layers) as $part) { // loop sul tipo di layer ($part = BO, LB, LW, RW, HE)

// loop on main_layers: chosen images MUST have matching string in their names

        $scene_elems    = array();
        $scene_elems    = kind_elem($part, $dlayers, $assetmode); // tutti gli elementi di tipo zNN... 

//        print "<br> viz chance per $part: " . $main_layers[$part]; 

        // SI PUO' randomizzare l'elemento $i della pagina $page in FUNZIONE di $page, $i.

        // se l'mt_rnd è da visualizzare secondo il valore di possibilità ($main_layers[$part]) di quel tipo di layer
        // carica nell'array da restituire "arr2ret" UN elemento preso con mt_rnd dalla lista di tutti gli asset di quel tipo
    	if (mt_rand(1,100) <= $main_layers[$part]) {

            // carico nell'array da tornare l'rt_rnd-esimo elemento
            array_push($arr2ret, $scene_elems[(mt_rand(1,1000) % count($scene_elems))]); 

    	}
    }

//  print "<pre>"; print_r($arr2ret); print "</pre>";

        return $arr2ret;

} // end function scene_layers


function kind_elem($kind, $dlayers, $amode) {

	$arr2ret  = array();

    if ($amode == 'mixed') { // mixes all asset types together 
        foreach ($dlayers as $dlayer) { 
    		if (strstr($dlayer, $kind)) { 
                array_push($arr2ret, $dlayer); 
                // print "<br>DLAYER: " . $dlayer . " KIND " . $kind;
            } 
        }
    } else { // separates asset_A from asset_B
        foreach ($dlayers as $dlayer) { 
            if (strstr($dlayer, $kind)) { 
                array_push($arr2ret, $dlayer); 
                // print "<br>DLAYER: " . $dlayer . " KIND " . $kind;
            } 
        }
    }

	return $arr2ret;

} // end function rndret_elem()

// a scene show a single image composed by the various types of layers stored in $scene_url array
function scene($i, $imgpath, $scene_url, $scene_name, $width, $height, $font_size, $filter, $atype, $sseed, $main_layers, $name_struct) {

    global          $default_layers;
    global          $demon_layers;
    global          $owidth;
    global          $results;
    global          $jwidth;
    global          $js_filters;
    global          $master_seed;
    global          $main_path_dir;

	if (!$filter) { $filter = "&nbsp;"; }
	$divs = "\n<!-- image layers -->\n";

    // paired wings => LW (div.1) = RW (div.0)
    if ($atype == 'demons' || $atype == 'demonship') {
        $scene_url[1] = preg_replace('/LW/', 'RW', $scene_url[0]);
    }

// $atype (values: demonback, demons, demonship ) allows to discriminate scene rules by element type

    $tooltiptext = "";
	for ($j=0; $j<count($main_layers); $j++ ) {

		$padding = "";

		// calculate padding displacement from $scene_url[$j] filename sections: up: -uNN- down: -dNN- left: -lNN- right: -rNN- 
		foreach (array("/-u[0-9]+-/", "/-d[0-9]+-/", "/-l[0-9]+-/", "/-r[0-9]+-/", ) as $pattern) {	
			preg_match($pattern, $scene_url[$j], $matches, PREG_OFFSET_CAPTURE);
			if (isset($matches[0])) {  
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

        // enable js filter functions ($js_filters var in config file)
            $onload = "";
            if ($js_filters) {
                $onload = " onload=\"tracescene_$i($j)\" ";
            }
/*
    SPRITESHEETS
*/
            
        // CHECK if ANIMATION SPRITESHEET EXISTS for this layer (name: src="/keplerion/img/demons/anims/dem_A_LW_1_51...)
            $scene_url_noext    = preg_replace('/\\.[^.\\s]{3,4}$/', '', $scene_url[$j]);
            $scene_spritesheet  = $main_path_dir . $atype . "/anims/" . $scene_url_noext;

        // finds spritesheet assets starting with a specific name, followed by animation data (es: ...-f=4-t=0.8)
            $spritesheetdiv = "";
            $spshda = glob_spritesheet($scene_spritesheet, $imgpath, $dwidth, $i, $j);

            if (!empty($spshda)) {
                $spritesheetname = explode('/', $spshda["spritesheet"]);
                $urlanim    = $spshda["urlanim"];
                $frames     = $spshda["frames"];
                $time       = $spshda["time"];

                $divId      = $spshda["divId"];
                $anidivId   = $spshda["anidivId"];
                $abpos      = $spshda["abpos"];        // 4 when 128px, 2 when 256px
                $toppos     = $spshda["toppos"];
                $animcss    = <<< EOCSS
<style type="text/css">                
.$anidivId  { 
    position: absolute; top: {$toppos}px; left: 0; width: {$dwidth}; height: {$dwidth}; margin: 0% auto; background: url('$urlanim') left center; background-repeat: no-repeat; animation: play$i$j {$time}s steps($frames) infinite; z-index: $j; 
}

@keyframes play$i$j { 100% { background-position: -{$abpos}px; }
}
</style>
EOCSS;

               if ($results == 1) {    // correzioni quando c'è lo zoom su 1 solo risultato
                    $dwidth2    = $dwidth / 2;
                    $abpos2     = $abpos / 2;
                    $divId      = "";
                    $toppos     = 40;
                    $animcss    = <<< EOCSS
<style type="text/css">                
.$anidivId  { 
    position: absolute; top: {$toppos}px; left: 64px; width: {$dwidth2}; height: {$dwidth}; margin: 0% auto; background: url('$urlanim') left center; background-repeat: no-repeat; animation: play$i$j {$time}s steps($frames) infinite; z-index: $j; 
}

@keyframes play$i$j { 
    0% { transform: scale(2); }
    100% { background-position: -{$abpos2}px; transform: scale(2); }
}
</style>
EOCSS;

                }

                $spritesheetdiv = "\n$animcss\n<div id=\"$divId\" class=\"$anidivId\"> </div> \n<!-- dwidth: $dwidth ; results = $results --> ";
            } // end if ! empty $spshda

            // SCENE LAYERS - IMAGES of scene $i
            $divId  = "div" . $j;
//            $tooltiptext .= "\n<br><a href='" . $imgpath . $scene_url[$j] . "' target='_blank'>" . $scene_url[$j] . "</a>";
            $tooltiptext .= "\n$imgpath . $scene_url[$j] ";

            if ($spritesheetdiv != "") {
			  $divs .= "$spritesheetdiv \n <!-- spritesheet enabled -->\n";
            } else {
              $divs .= "\n<div id='$divId' style=\"$padding \"><img id=\"myImage-$i-$j\" width=\"$dwidth\" src=\"$imgpath$scene_url[$j]\" $onload > </div>\n\n";                

            }

		} // if

	} // for on main layers

    $height += 20;

    $scene_name2print = ucfirst($scene_name);
    // show scene_seed        $scene_name2print .= " " . $sseed;       

    $trace = <<< EOT
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
EOT;

    if (!$js_filters) {
        $trace = "  ";
    }

    if (!isset($name_struct) || $name_struct == "") { 
        $name_struct = "0";
    }

    // $scene_seed     = $page * 100 + $i; => 101, 102, 103

    $elem_link = $_SERVER['PHP_SELF'] . "?sseed=" . $sseed . "&results=1&atype=" . $atype;

    $tooltiphtml = <<< EOTP
        <div class="scenetitle" style="position: relative;">

<span  id="bottomtip" class="btn-primary .btn-xs " data-toggle="tooltip" data-html="true" title="\n struct: $name_struct \n name: $scene_name2print \n$tooltiptext">
                <a href="$elem_link">$name_struct - $scene_name2print </a>
</span>

        </div>
EOTP;

/*
    MAIN ELEMENT SCENE
*/

    $scene = <<< EOP
<div id="container" class="scene" style="display:inline-block; width:$width; background-color: #000000; padding-left: 10px; display: inline-block; vertical-align: top;">

<!--    $trace  -->

    $tooltiphtml
	$divs

</div>
EOP;

    return $scene;

} // end function scene

function glob_spritesheet($spritesheetpath, $imgpath, $dwidth, $i, $j) {

    $spritesheetdata = Array();

    foreach (glob("$spritesheetpath*") as $spritesheet) {

        print "\n<!-- spritesheet - " . $spritesheet . " -->";

        $spritesheetname    = explode('/', $spritesheet);
        $animdata           = explode('-', $spritesheet);
        $frames_raw         = $animdata[1];
        $time_raw           = $animdata[2];
        $frames_arr         = explode('=', $frames_raw);
        $time_arr           = explode('=', $time_raw);

        $spritesheetdata["urlanim"]     = "$imgpath" . "anims/" . $spritesheetname[sizeof($spritesheetname)-1];
        $spritesheetdata["frames"]      = $frames_arr[1];
        $spritesheetdata["time"]        = $time_arr[1];
        $spritesheetdata["divId"]       = "div" . $j;
        $spritesheetdata["anidivId"]    = "anidiv" . $i . $j;
        $spritesheetdata["abpos"]       = $dwidth*$frames_arr[1];        // 4 when 128px, 2 when 256px
        print "<!-- dwidth: $dwidth - abpos: " . $spritesheetdata["abpos"] . " -->";
        $spritesheetdata["toppos"]      = 10; // $dwidth/4;
        $spritesheetdata["spritesheet"] = $spritesheet;

    }

    return $spritesheetdata; 

} // end function glob_spritesheet

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


// genera le informazioni di una scene (una immagine) fatta di layer sovrapposti.
function scene_gen($i, $layers, $name_struct) {

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

        $scene[3]      = $filter;                       // curves

// scene pic
        $scene[1]      = scene_layers($scenedir, $i, $layers);       // image layers

// scene name
        $scene[0]      = calc_scene_name($scene[1], $name_struct);   // name (after scene_layers)

// scene size
        $scene[2]      = mt_rand(120,136);


        return $scene;

} // end function scene_gen


// NAMES div
function calc_scene_name($scenep, $name_struct) {

    global      $demonname;
    global      $demon_names;
    global      $demon_namestruct;
    global      $structsmode;

// print "<pre>"; print_r($scenep); exit(0);
// HE:$scenep[4] BO:$scenep[3] LB:$scenep[2]

// se structs è definito occorre gestire la struttura di naming della mt_rnd(struct). 

// decode array of scene elements (i.e. from "badge_A_LB_2_04.png" to LB,4 - layername, layerindex)

    $decoded_scene_elems = array();
    foreach ($scenep as $slayer) {

//        print "<br>slayer:" . $slayer . " ";
        preg_match("/([0-9]+)\.[a-z]+/", $slayer, $layerindexraw);       
        $layerindex     = ltrim($layerindexraw[1], '0');
        $scene_elems    = explode('_', $slayer);
        $layername      = $scene_elems[2];    
        $decoded_scene_elems[$layername] = $layerindex;
    }

/*
    preg_match("/([0-9]+)\.png/", $scenep[4], $head);       // HE
    preg_match("/([0-9]+)\.png/", $scenep[3], $body);       // BO
    preg_match("/([0-9]+)\.png/", $scenep[2], $lowerbody);  // LB
*/

// compose final scene name
    $demname = "";

    if (!$structsmode) {
        foreach ($demon_namestruct as $nskey => $nsval) {
//            print "<br>nskey:" . $nskey . " decoded:" . $decoded_scene_elems[$nskey];
            $demname .= $demon_names[$nskey][$decoded_scene_elems[$nskey]] . $nsval;
        }        
    } else {
        foreach ($name_struct as $nskey => $nsval) {
//            print "<br>nskey:" . $nskey . " decoded:" . $decoded_scene_elems[$nskey];
            $demname .= $demon_names[$nskey][$decoded_scene_elems[$nskey]] . $nsval;
        }                
    }


/*
    $demname =      $demon_names["HE"][ltrim($head[1], '0')] . " "
                .   $demon_names["BO"][ltrim($body[1], '0')] 
                .   $demon_names["LB"][ltrim($lowerbody[1], '0')];
*/

    return $demname;

}

function demon_ini() {

        global $demonname, $demonname_ini, $demonname_mid, $demonname_end, $demon_pic;
        $demonname_ini = array("a","an","as","az","ba","bal","be","bel","del","dra","du","e","go","gri","hex","i","lu","ka","kar","kor","me","mel","mor","nar","ra","sa");
        $demonname_mid = array("bad","bi","bra","ci","da","de","fa","fri","for","gi","gra","gri","hu","la","las","li","mai","mo","mu","phis","pho","ra","su","ta","tel","va","vi","yan","za");
        $demonname_end = array("al","bam","bi","bub","bus","den","don","el","gor","goth","jag","ka","kor","ku","lak","leth","lia","mat","met","mon","moth","ra","riel","rog","roth","s","t","tan","th","tor","xas","zal","zel","zer","zo");
        $demonname["BO"] = array("ba","bal","bav","ol","bam","ci","bat","cih","da","ske","ste","cil","om","de","civ","do","dov","dok","mah","mal","mo","moh","mol","mov","mok","mog","mogg","me","mu","mi","mih","miv","nol","nov","pa","pav","nog","og","qo","pav", "ba","bal","bav","ol","bam","ci","bat","cih","da","ske","ste","cil","om","de","civ","do","dov","dok","mah","mal","mo","moh","mol","mov","mok","mog","mogg","me","mu","mi","mih","miv","nol","nov","pa","pav","nog","og","qo","pav");
        $demonname["HE"] = array("ah","ahl","ahn","ahv","an","anl","anv","as","az","ba","be","de","du","bal","ang","bav","dul","ban","bav","ank","ant","eh","akh","el","elh","fel","fen","pah","pal","dun","bra","brah","dum","dug","duc","duq","dugh","hec","dur","hek","doc","doq","dugr","ih","il","lu","ka","kah","keh","kev","mih","mil","moh","mor","nak","nat", "ah","ahl","ahn","ahv","an","anl","anv","as","az","ba","be","de","du","bal","ang","bav","dul","ban","bav","ank","ant","eh","akh","el","elh","fel","fen","pah","pal","dun","bra","brah","dum","dug","duc","duq","dugh","hec","dur","hek","doc","doq","dugr","ih","il","lu","ka","kah","keh","kev","mih","mil","moh","mor","nak","nat");
        $demonname["LB"] = array("ah","an","as","ash","tl","ask","ba","bub","buv","gra","del","isk","eg","gor","las","nal","el","eh","lac","lah","ehl","ehk","leth","lekh","lev","leh","roh","sh","l","lak","ehr","meh","mel","moh","mok","ron","ah","an","as","ash","tl","ask","ba","bub","buv","gra","del","isk","eg","gor","las","nal","el","eh","lac","lah","ehl","ehk","leth","lekh","lev","leh","roh","sh","l","lak","ehr","meh","mel","moh","mok","ron");

} // end function demon_ini

function planet_ini() {

    global $planetname_ini, $planetname_mid, $planetname_end, $planet_pic;
    $planetname_ini = array("a","al","bel","ca","car","chal","cyl","da","dei","di","e","en","eu","e","ga","ha","har","he","i","ia","ju","ka","kal","la","le","ly","m","me","mer","mi","mne","mu","ou","pa","pan","pra","pho","pro","rhe","sa","si","ska","spon","tar","tay","the","thy","ti","ve","y");
    $planetname_mid = array("an","bio","bo","ce","cli","cu","de","di","do","dras","e","ga","ge","ger","i","la","le","les","ly","ma","mal","me","mis","mo","nan","ni","no","o","pa","pha","pe","pi","po","ry","ro","si","so","te","the","tla","u","xi");
    $planetname_end = array("a","ars","be","bos","da","de","dus","e","gir","ke","lya","mas","me","mir","mos","ne","nus","on","ops","pe","pso","ra","rix","ros","ry","s","tan","te","ter","thi","ti","tis","tne","to","tur","tus","tyl","us","ve","vi","vos");
    $planet_pic = array("01.png","02.png","03.png","04.png","05.png","06.png","07.png","08.png","09.png","10.png","11.png","12.png","13.png","14.png","15.png","16.png","17.png","18.png","19.png","20.png",);
    
} // end function planet_ini


function demon_count($dir, $type) {

    global $demon_layers;
    global $assetmode;
    $dpart = "";    $dcount = 1;
    $dlayers        = array();
    $arr2ret        = array();
    if ($handle = opendir($dir)) {

        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                    array_push($dlayers, $entry);
                    // echo "<br> $entry\n";
            }
        }
        closedir($handle);
    }

/*  ===================================
        count various parts 
    =================================== */
// todo 
//      1) loop on structs
//      2) sum total value of any struct

// print "<pre>";print_r(array_keys($demon_layers));

    if ($type == 'demons' || $type == 'demonship') {
        foreach (array("RW", "BO", "LB", "HE") as $part) {
            $demon_elems    = array();
            $demon_elems    = kind_elem($part, $dlayers, $assetmode); // elementi di tipo "HE"... 
            if (in_array($part, array("RW", "BO", "LB", "HE"))) { 
                $dpart .= " $part: " . count($demon_elems); 
                $dcount *= count($demon_elems); 
            } 
        }
    } else {

        foreach (array_keys($demon_layers) as $part) {
            $demon_elems    = array();
            $demon_elems    = kind_elem($part, $dlayers, $assetmode); // elementi di tipo "HE"... 
            if (in_array($part, array_keys($demon_layers) )) { 
                $dpart .= " $part: " . count($demon_elems); 
                $dcount *= count($demon_elems); 
            } 
        }        

    } 
    
    $demoncount = strtoupper($type) . ": " . $dcount . " parts: " . $dpart;

    return $demoncount;

} // end function demon_count

?>
