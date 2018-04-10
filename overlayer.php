<?php

/* TODO:
	use magic lands as background
	delete borders of images below 
*/

global $config;

$config 	= read_json("overlayer.json");
// print "<pre>";	print_r($config);

if ($_GET["theme"]) {
	$switchdir = $_GET["theme"];
} else {
	$switchdir = $config[0]['switchdir'];
}

$switchdir .= '.style';

$backdir 	= $config[0]['basedir'] . $switchdir . $config[0]['backdir'];
$chardir 	= $config[0]['basedir'] . $switchdir . $config[0]['chardir'];
$back 		= random_pic($backdir);
$char 		= random_pic($chardir);

$charclassrotate = rand(-180, 180);
$charclass	= ".charclass {-webkit-filter: hue-rotate(" . $charclassrotate . "deg); filter: hue-rotate(" . $charclassrotate . "deg);}";
$blurred 	= ".blurred {-webkit-filter: blur(1px); filter: blur(1px);}";
print $page 	= read_template($back, $blurred, $char, $charclass);



exit(0);

// ================================================

function random_pic($dir) {
    $files 	= glob($dir . '/*.*');
    $file 	= array_rand($files);

    $fpieces	= explode("/", $files[$file]);

    $file_url 	= "/" . $fpieces[count($fpieces) - 5] . "/" . $fpieces[count($fpieces) - 4] . "/" . $fpieces[count($fpieces) - 3] . "/" . $fpieces[count($fpieces) - 2] . "/" . $fpieces[count($fpieces) - 1];
    return $file_url;
}

function read_json($file_json) {

    $jconfig 	= json_decode(file_get_contents($file_json), true);

    return $jconfig;
}

function read_template($back, $blurred, $char, $charclass) {

global $config;
$version = $config[0]['version'];

$htmldir = "";
$dirs           = array_filter(glob('/var/www/html/demon/overlayer/*.style'), 'is_dir');
foreach ($dirs as $key => $value) {
        $dirs[$key] = preg_replace('/\.style$/i', '', $dirs[$key]);
        $dirs[$key] = preg_replace('/^\/var\/www\/html\/demon\/overlayer\//i', '', $dirs[$key]);
	$htmldir .= "<li><a href='/cgi-bin/overlayer.php?theme=" . $dirs[$key] . "'>" . $dirs[$key] . "</a>";
}


$page = <<<EOF
<html>
<head>
<title>overlayer - $version</title>
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css" />
<style>

#subcontainer{
    position: relative;
    width: 529px;
    height: 699px;
}
#overlay_image{
    position: absolute;
    bottom: 10px;
    right: 10px;
}
#main_image{
    position: absolute;
    bottom: 10px;
    right: 10px;
}
#card_image{
    position: absolute;
    top: 0px;
    left: 0px;
}

$charclass

.cardimage{
    width: 529px;
    height: 699px;
}
</style>

    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>


    <div class="container">


      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">



			<div id="subcontainer">
			    <div id="farback_image"> <img src="$back" class="blurred"> </div>
			    <div id="back_image"></div>
			    <div id="fore_image"></div>
			    <div id="main_image"><img src="$char" class="charclass"></div>
			    <div id="overlay_image"></div>
			    <div id="card_image"><img src="/demon/overlayer/card.png" class="cardimage"></div>
			</div>

            <h2 class="blog-post-title">CARD TITLE</h2>
            <p class="blog-post-meta">February 1, 2017 by <a href="#">Mark</a></p>


<!--
            <p>This blog post shows a few different types of content that's supported and styled with Bootstrap. Basic typography, images, and code are all supported.</p>
            <hr>
            <h2>Heading</h2>
            <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
            <h3>Sub-heading</h3>
            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            <pre><code>Example code block</code></pre>
            <h3>Sub-heading</h3>
            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <ul>
              <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
              <li>Donec id elit non mi porta gravida at eget metus.</li>
            </ul>
            <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
            <ol>
              <li>Vestibulum id ligula porta felis euismod semper.</li>
            </ol>
            <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>
-->
		</div>

          <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav>

        </div><!-- /.blog-main -->

<!-- /.blog-sidebar -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">

	      <div class="blog-header">
	        <h1 class="blog-title">Overlayer</h1>
	        <p class="lead blog-description">by <a href="http://www.masayume.it">masayume</a></p>
	      </div>

          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>It's a system to create images with overlapping elements.</p>
          </div>

<!--
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
-->
          <div class="sidebar-module">
            <h4>Styles</h4>
            <ol class="list-unstyled">
$htmldir
            </ol>
          </div>

          <div class="sidebar-module">
            <h4>Info</h4>
            <ol class="list-unstyled">
              <li><a href="/demon/overlayer/overlayer.infogen.txt">infogen</a></li>
            </ol>
          </div>

        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>



</div>
</body>
</html>
EOF;

return $page;

}

?>
