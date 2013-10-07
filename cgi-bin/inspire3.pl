#!/usr/bin/perl

# HTML wrapper for polygen grammar file inspire.grm

use List::Util qw(shuffle);

$check = "";
my (%POST, %QUERY);
%QUERY = &parse_args;

$collen 	= 35;	# column length
$colnum 	= 3;	# column number
$insnum 	= $collen * $colnum;
$maxnum 	= 4 * $collen * $colnum;
$maxtype	= 133;

$version = "0.80";
$grammar = "/home/masayume/polygen/inspire3.grm";

$result = `polygen $grammar -X $maxnum`;
$result =~ s/(\[t\d*\])/<span style="color:#ccc;"><small><small>$1<\/small><\/small><\/span>/g;

$matchstring = "t" . $QUERY{'t'} . "";

@inspirelets_raw = split /\n/, $result;

@inspirelets = ();
print "Content-type: text/html \n\n " ;

if ($QUERY{'t'}) {
	foreach $is (@inspirelets_raw) {
		if ( $is =~ m/$matchstring\]/ ) { push(@inspirelets, $is); }
	}
	&singlephrase;

} else {
	foreach $is (@inspirelets_raw) {
		push(@inspirelets, $is);
	}
	&mainpage;
}

print $page;

exit(0);

# ===============================================================================================

sub templateheader {

$page =<<"EOF";
<head>
<title>inspire title generator</title>
<link rel="icon" type="image/png" href="/img/image.png" />
<link href='http://fonts.googleapis.com/css?family=Cantora+One|Kelly+Slab|Life+Savers|Raleway|Prosto+One|Kavoon|Roboto+Slab|Cinzel+Decorative' rel='stylesheet' type='text/css'>
<style type="text/css">
font-family: 'Cantora One', sans-serif;
font-family: 'Kelly Slab', cursive;
font-family: 'Life Savers', cursive;
font-family: 'Raleway', sans-serif;
font-family: 'Prosto One', cursive;
font-family: 'Kavoon', cursive;
font-family: 'Roboto Slab', serif;
font-family: 'Cinzel Decorative', cursive;
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
  background: -moz-linear-gradient(-90deg,#3377aa,#77ccee);
  background: -webkit-gradient(linear, left top, left bottom, from(#3377aa), to(#77ccee));
}
table {
  height: 18px;
  margin: 0 0 0 0;
  border-spacing: 0px;
  font-family: arial narrow;
}
img { width: 450px; }
h1 {
  color: #fff; font-size: 45px;
}
</style>
</head>
EOF

return $page;

} # end sub templateheader

#===============================================================================================

sub singlephrase {

$pageHeader = &templateheader();

$page =<<"EOF";
<html>
$pageHeader
</head>
<body>
<small>version: $version - grammar: $grammar</small>
<div id="insetBgd">
EOF

print $page;
&header;
print "<br /><br />";

foreach $insp (@inspirelets) { 
	# print "<br> AAA " . $insp; 
        $qstring = $insp; $qstring =~ s/\s/\+/g;
        @keyw = split /\+/, $qstring; $keyw[$#keyw] = '';
        $qstring = join '+',  @keyw; chop $qstring; ($qstring,$NULL) = split /\+</, $qstring;
        $preqstring = 'https://www.google.com/search?q=' . $qstring . '&hl=en&safe=off&tbo=d&source=lnms&tbm=isch&sa=X';
        $qqhtml = "<a href='$preqstring' target='_blank'>GI</a>";
        my $style = "<span style=\"font-family:" . &fontstyle(1) . "\">";
	$insp = ucfirst($insp);
        print "\n" . $qqhtml . " <h2> " . $style . $insp . "</h2>" . "</span>";
} 
# exit(0);

$r = 0;

print "</center>" . "<br /><br /><br /><br /><br /><br /><br /> ";

$page =<<"EOF";

</div>
</body>
</html>
EOF

} # end sub singlephrase 

#===============================================================================================

sub mainpage {

$pageHeader = &templateheader();

$page =<<"EOF";
<html>
$pageHeader
<body>
<div id="insetBgd">
<small><span style="color:#fff">version: $version - grammar: $grammar</span></small>
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
		$qqhtml = "<a href='$preqstring' target='_blank'>GI</a>";
		my $style = "<span style=\"font-family:" . &fontstyle(1) . "\">";
		$string2show = ucfirst($string2show);
                print "\n" . $qqhtml . " <strong> " . $style . $string2show . "</strong>" . "</span>";
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
#===============================================================================================

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
#===============================================================================================

sub header {

	$header = "<center><table style=\"background-color: #aaaaaa; \"><tr><td colspan=$colnum><span style='color:#999;'><a href='/cgi-bin/inspire3.pl'>ALL</a>  ";
	for ($i=1; $i<$maxtype; $i++) {
		$header .= "\n<a href='/cgi-bin/inspire3.pl?t=$i'>T$i</a> ";
	}
	$header .= "</span></td></tr><tr></table>";

	print $header
} # and sub header
#===============================================================================================

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
#===============================================================================================

sub fontstyle {

	my $use = shift;
	my $randomelement;

	if (!$use) {

#	font-family: 'Philosopher';
		my $gfonts=<<"EOF";
.cantora { font-family: 'Cantora One', sans-serif; }
.kelly { font-family: 'Kelly Slab', cursive; }
.life { font-family: 'Life Savers', cursive; }
.raleway { font-family: 'Raleway', sans-serif; }
.prosto { font-family: 'Prosto One', cursive; }
.kavoon { font-family: 'Kavoon', cursive; }
.roboto { font-family: 'Roboto Slab', serif; }
.cinzel { font-family: 'Cinzel Decorative', cursive; }
EOF
		return $gfonts;

	} else {
		# my @array = ('cantora','kelly','life','raleway','prosto','kavoon','roboto','cinzel');
		my @array = ('Cantora One','Kelly Slab','Life Savers','Raleway','Prosto One','Kavoon','Roboto Slab','Cinzel Decorative');
		$randomelement = $array[rand @array];		
		return $randomelement;
	}

	return $gfonts;


}

