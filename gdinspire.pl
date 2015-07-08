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

my @font_head = (
 	"<link href='http://fonts.googleapis.com/css?family=Orbitron:400,900' rel='stylesheet' type='text/css'>",
	"<link href='http://fonts.googleapis.com/css?family=Fredoka+One:400,900' rel='stylesheet' type='text/css'>",
	"<link href='http://fonts.googleapis.com/css?family=Fontdiner+Swanky:400,900' rel='stylesheet' type='text/css'>",
	"<link href='http://fonts.googleapis.com/css?family=Audiowide:400,900' rel='stylesheet' type='text/css'>"
);
my @font_strong = (
	"strong { font-family: 'Orbitron', sans-serif; font-size: 100px;}",
	"strong { font-family: 'Fredoka One', cursive; font-size: 100px;}", 
	"strong { font-family: 'Fontdiner Swanky', cursive; font-size: 100px;}", 
	"strong { font-family: 'Audiowide', cursive; font-size: 100px;}" 

);
my @font_name = (
	"Orbitron",
	"Fredoka One",
	"Fontdiner Swanky",
	"Audiowide"
);
$range = @font_head;
$fonts_index = int(rand($range));

$page =<<"EOF";
<html>
<head>
<link rel="icon" type="image/png" href="/img/image.png" />
<style type="text/css">
$font_strong[$fonts_index]
#insetBgd {
  background: -moz-linear-gradient(-90deg,#008471,#44aCfB);
  background: -webkit-gradient(linear, left top, left bottom, from(#008471), to(#44ACfB));
}
</style>

$font_head[$fonts_index]
<link href='http://fonts.googleapis.com/css?family=Orbitron:400,900' rel='stylesheet' type='text/css'>

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
		$type = "[" . $type;
                print "\n" . $qqhtml . "&nbsp;&nbsp;" . " <strong>" . $string2show . "</strong> $type $fontname $fonts_index";
        print "</td>";

print "</tr></table><br />";
print "
<script src=\"https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js\"></script>
<script>
  WebFont.load({
    google: {
      families: ['$fontname']
    }
  });
</script>
";
print "<canvas id='myCanvas' width='900' height='250' style='border:1px solid #d3d3d3;'>
Your browser does not support the HTML5 canvas tag.</canvas>";

print "<script>
var c = document.getElementById(\"myCanvas\");
var ctx = c.getContext(\"2d\");
ctx.font = '100px \"$fontname\"';
ctx.fillText(\"$string2show\", 10, 150);
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

