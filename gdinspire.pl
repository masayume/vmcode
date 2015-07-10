#!/usr/bin/perl

# HTML wrapper for polygen grammar file gdinspire.grm
# TODO:
#	pixelize 	>> http://jsfiddle.net/epistemex/u6apxgfk/
#			>> http://jquery-plugins.net/pixelate-js-jquery-plugin-to-pixelate-images
#	text on canvas 	>> 
#	fonts		
#			>> http://alternativeto.net/software/google-web-fonts/
#			>> http://www.onextrapixel.com/2011/06/29/10-awesome-alternative-free-web-fonts/
#	effects	
#			>> https://developers.google.com/fonts/docs/getting_started
#			>> http://www.w3schools.com/tags/ref_canvas.asp

use List::Util qw(shuffle);

$check = "";
my (%POST, %QUERY);
%QUERY = &parse_args;

$collen = 35;	# column length
$colnum = 4;	# column number
$insnum = $collen * $colnum;

$version 	= "0.76";
$grammar 	= "/home/masayume/git/vmcode/grm/gdinspire.grm";
$polygen 	= "/usr/games/polygen";

$result = `$polygen $grammar -X $insnum`;
$result =~ s/(\[t\d*\])/<span style="color:#aaa;"><small><small>$1<\/small><\/small><\/span>/g;

$matchstring = "t" . $QUERY{'t'} . "";

@inspirelets_raw = split /\n/, $result;

@inspirelets = ();
print "Content-type: text/html \n\n " ;

if ($QUERY{'t'}) {
	foreach $is (@inspirelets_raw) {
		if ( $is =~ m/$matchstring\]/ ) { push(@inspirelets, $is); }
	}
	&singlephrase;

} elsif ($QUERY{'one'})  {
        foreach $is (@inspirelets_raw) {
                push(@inspirelets, $is);
        }
        &maintitle();

} else {
	foreach $is (@inspirelets_raw) {
		push(@inspirelets, $is);
	}
	&mainpage();
}

print $page;

exit(0);

# ===============================================================================================

sub singlephrase {

$page =<<"EOF";
<html>
<head>
<link rel="icon" type="image/png" href="/img/image.png" />
<style type="text/css">
@media screen {
@font-face {
  font-family: 'Philosopher';
  font-style: normal;
  font-weight: normal;
  src: local('Philosopher'), url('http://127.0.1.1/philosopher.ttf') format('truetype');
}
}
strong { font-family: 'Philosopher', arial, serif; }
#insetBgd {
  background: -moz-linear-gradient(-90deg,#008471,#44aCfB);
  background: -webkit-gradient(linear, left top, left bottom, from(#008471), to(#44ACfB));
}
img { width: 450px; }
h1 {
  color: #fff; font-size: 45px;
}
</style>
</head>
<body>
<small>version: $version - grammar: $grammar</small>
<div id="insetBgd">
EOF

print $page;
&header;
print "<br /><br />";

foreach $insp (@inspirelets) { 
	print "<br>" . $insp; 
} 
# exit(0);

$r = 0;

### calculate companion inspire IMAGE 
# my @images = &image();
# $images[1] =~ s/\n$//;
# print "<img float='left' src='/inspire/" . $images[1] . "'><br clear='all'>";

### calculate companion inspire TEXT
# $unok = 1; 
# for ($j=0; $j<$colnum; $j++) {
#         for ($k=0; $k<$collen; $k++) {
#                 $r++;
# 		if ($inspirelets[$j*$collen+$k] && $unok) {
 #                	print "\n<h1><strong> " . $inspirelets[$j*$collen+$k] . "</strong></h1><br />";
# 			$unok = 0;
# 		}
#         }
# }

### calculate companion inspire image

print "</center>" . "<br /><br /><br /><br /><br /><br /><br /> ";

$page =<<"EOF";

</div>
</body>
</html>
EOF

} # end sub singlephrase 

sub maintitle {

my @font_name = (
#	"Orbitron",
#	"Exo",
#	"Skranji",
#	"Iceland",
#	"Kranky",
#	"Monoton",
	"Playball",
	"Chewy",
	"Codystar",
	"Bangers",
	"Press Start 2P",
#	"Quantico",
#	"Black Ops One",
#	"Damion",
#	"Fredoka One",
#	"Seaweed Script",
#	"Fontdiner Swanky",
	"Audiowide"
);

# cfr. http://www.w3schools.com/cssref/css_colornames.asp
@gradients	= (
	"gradient.addColorStop(\"0\", \"magenta\"); gradient.addColorStop(\"0.5\", \"blue\"); gradient.addColorStop(\"1.0\", \"red\");",
	"gradient.addColorStop(\"0\", \"blue\"); gradient.addColorStop(\"0.5\", \"white\"); gradient.addColorStop(\"1.0\", \"blue\");",
	"gradient.addColorStop(\"0\", \"blue\"); gradient.addColorStop(\"1.0\", \"red\");",
	"gradient.addColorStop(\"0\", \"blue\"); gradient.addColorStop(\"1.0\", \"aqua\");",
	"gradient.addColorStop(\"0\", \"aqua\"); gradient.addColorStop(\"1.0\", \"red\");",
	"gradient.addColorStop(\"0\", \"blue\"); gradient.addColorStop(\"1.0\", \"orange\");",
	"gradient.addColorStop(\"0\", \"green\"); gradient.addColorStop(\"1.0\", \"red\");",
	"gradient.addColorStop(\"0\", \"green\"); gradient.addColorStop(\"1.0\", \"yellow\");",
	"gradient.addColorStop(\"0\", \"blue\"); gradient.addColorStop(\"1.0\", \"yellow\");",
	"gradient.addColorStop(\"0.2\", \"yellow\"); gradient.addColorStop(\"0.5\", \"orange\"); ; gradient.addColorStop(\"0.8\", \"yellow\");"
);
@font_strong 	= ();
@font_head 	= ();

$font_weight 	= ":500,900";
$titlesize	= "120px";
foreach $fn (@font_name) {
	$fns = "strong { font-family: '" . $fn . "', cursive; font-size: 100px;}";
	$fnp = $fn; $fnp =~ s/\s/\+/g;
	$fnh = "<link href='http://fonts.googleapis.com/css?family=" . $fnp . $font_weight . "' rel='stylesheet' type='text/css'>";
	push @font_strong, $fns;
	push @font_head, $fnh;
}


$range 		= @font_head;
$grange		= @gradients;
$fonts_index 	= int(rand($range));
$gradient_index	= int(rand($grange));
$page =<<"EOF";
<html>
<head>
<link rel="icon" type="image/png" href="/img/image.png" />
<style type="text/css">
$font_strong[$fonts_index]
#insetBgd {
//  	background: -moz-linear-gradient(-90deg,#008471,#44aCfB);
//  	background: -webkit-gradient(linear, left top, left bottom, from(#008471), to(#44ACfB));
	background-color: #444;

}
canvas {
    	image-rendering: optimizeSpeed;
    	image-rendering: -moz-crisp-edges;
    	image-rendering: -webkit-optimize-contrast;
    	image-rendering: -o-crisp-edges;
    	image-rendering: crisp-edges;
    	-ms-interpolation-mode: nearest-neighbor;
	background-color: #000;
}
</style>

$font_head[$fonts_index]

<title>videogame title generator</title>
</head>
<body>
<small>version: $version - grammar: $grammar</small>
<div id="insetBgd">
EOF

print $page;
$r = 0;

&header;
$fontname = $font_name[$fonts_index]; 

print "<hr><table>";

        print "<td>";
                $r++;
                $string2show = $inspirelets[$j*$collen+$k];
                $qstring = $string2show; $qstring =~ s/\s/\+/g;
                @keyw = split /\+/, $qstring; $keyw[$#keyw] = '';
                $qstring = join '+',  @keyw; chop $qstring; ($qstring,$NULL) = split /\+</, $qstring;
                $preqstring = 'https://www.google.com/search?q=' . $qstring . '&hl=en&safe=off&tbo=d&source=lnms&tbm=isch&sa=X';
                $qqhtml = "<a href='$preqstring' target='_blank'>GQ</a>";
		($string2show, $type) = split /\[/, $string2show;
		($string2show, $dummy) = split /</, $string2show;
		$xoff = 600 - int(length($string2show)/2) * 54;
		$type = "[" . $type;
                print "\n" . $qqhtml . "&nbsp;&nbsp;" . " " . $string2show . " type: $type - font: $fontname - index: $fonts_index - xoff: $xoff - gradient: $gradient_index";
        print "</td>";

print "</tr></table><br />";
print "
<script src=\"https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js\"></script>
<script>
  WebFont.load({
    google: { families: ['$fontname'] }
  });
</script>
";
print "<canvas id='myCanvas' width='1200' height='250'>
Your browser does not support the HTML5 canvas tag.</canvas>";

print "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>";
print "<script src='http://www.jqueryscript.net/demo/jQuery-Plugin-To-Pixelate-Images-Using-Html5-Canvas/src/jquery.pixelate.js'></script>";

print "<script>
var c = document.getElementById(\"myCanvas\");
var ctx = c.getContext(\"2d\");
ctx.font = '$titlesize \"$fontname\"';

var gradient = ctx.createLinearGradient(0, 0, c.width, 0);
" . $gradients[$gradient_index] . "
// Fill with gradient
ctx.fillStyle = gradient;
// ctx.pixelate({ 'focus' : 0.05 });

ctx.fillText(\"$string2show\", $xoff, 150);
</script>
";
print "</center><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /> ";

$page =<<"EOF";
</div>
</body>
</html>
EOF

} # end sub maintitle



sub mainpage {

$page =<<"EOF";
<html>
<head>
<link rel="icon" type="image/png" href="/img/image.png" />
<style type="text/css">
@media screen {
@font-face {
  font-family: 'Philosopher';
  font-style: normal;
  font-weight: normal;
  src: local('Philosopher'), url('http://127.0.1.1/philosopher.ttf') format('truetype');
}
}
strong { font-family: 'Philosopher', arial, serif; }
#insetBgd {
  background: -moz-linear-gradient(-90deg,#008471,#44aCfB);
  background: -webkit-gradient(linear, left top, left bottom, from(#008471), to(#44ACfB));
}
</style>
</head>
<body>
<small>version: $version - grammar: $grammar</small>
<div id="insetBgd">
EOF

print $page;

$r = 0;

&header;
print "<hr><table>";

for ($j=0; $j<$colnum; $j++) {
        print "<td>";
        for ($k=0; $k<$collen; $k++) {
#       foreach $i (@inspirelets) {
                $r++;
		$string2show = $inspirelets[$j*$collen+$k];
		$qstring = $string2show; $qstring =~ s/\s/\+/g;
		@keyw = split /\+/, $qstring; $keyw[$#keyw] = '';
		$qstring = join '+',  @keyw; chop $qstring; ($qstring,$NULL) = split /\+</, $qstring;
		$preqstring = 'https://www.google.com/search?q=' . $qstring . '&hl=en&safe=off&tbo=d&source=lnms&tbm=isch&sa=X';
		$qqhtml = "<a href='$preqstring' target='_blank'>GQ</a>";
                print "\n" . $qqhtml . " <strong> " . $string2show . "</strong>";
                if ($r % 5 == 0) {
                        print "<hr>";
                } else {
                        print "<br>";
                }
        }
        print "</td>";

}
print "</tr></table></center><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /> ";

$page =<<"EOF";

</div>
</body>
</html>
EOF

} # end sub mainpage

sub parse_args {

	if ($ENV{GATEWAY_INTERFACE}) {

	        local *urlsplit = sub {
	                my %m = ();
	                foreach my $i (split($_[0], $_[1])) {
	                        my ($k, $v) = (split(/=/, $i, 2));
	                        $k =~ y/+/ /; $v =~ y/+/ /;
	                        $k =~ s/\%([a-fA-F0-9]{2})/pack('C', hex($1))/seg;
	                        $v =~ s/\%([a-fA-F0-9]{2})/pack('C', hex($1))/seg;
	                        $m{$k} = $v;
	                }

	                return (%m);
	        };

	        if ($ENV{REQUEST_METHOD} eq 'POST' && $ENV{CONTENT_TYPE} eq 'application/x-www-form-urlencoded') {
	                my $line;
	                my $dos = $ENV{CONTENT_LENGTH};
	                if ($dos > 0x100000) {
	                        $dos = 0x100000;
	                }

	                read(STDIN, $line, $dos);
	                %POST = &urlsplit('&', $line);
	        }

	        %QUERY = &urlsplit('[&;]', $ENV{QUERY_STRING});
	}

	return %QUERY;

} # end sub parse_args

sub header {

	$header = "<center><table style=\"background-color: #aaaaaa; \"><tr><td colspan=$colnum><span style='color:#999;'><a href='/cgi-bin/gdinspire.pl'>ALL</a>  ";
	for ($i=1; $i<22; $i++) {
		$header .= "\n<a href='/cgi-bin/gdinspire.pl?t=$i'>T$i</a> ";
	}
	$header .= "<a href='/cgi-bin/gdinspire.pl?one=1'>one</a>";
	$header .= "</span></td></tr><tr></table>";

	print $header
} # and sub header

sub image {
	$ifile = '/tmp/inspire_images_list.txt';

	my @cards;
	my @rcards;

	if (!-f $ifile) {
	        @cards = &prepare_array($dir);
	        open (IFILE, ">" . $ifile) or die "cannot write file $ifile: $!";
	        foreach $ii (@cards) { print IFILE $ii . "\n"; }
	        @cards = <IFILE>;
	        close IFILE;
	} else {
	        open (IFILE, "<" . $ifile) or die "cannot read file $ifile: $!";
	        @cards = <IFILE>;
	        close IFILE;
	}

	@rcards = shuffle @cards;

	return @rcards;
} # end sub 

