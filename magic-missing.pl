#!/usr/bin/perl

use List::Util qw(shuffle);
$| = 1;

print "Content-type: text/html \n\n";

$dir = '/home/masayume/forge2/cards';
opendir DIR, $dir or die "cannot open dir $dir: $!";
my @cards= readdir DIR;
closedir DIR;

%texts = ();

$counter = 0;
@subdirs = ('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'x', 'w', 'y', 'z' );
foreach $sd (@subdirs) {
	# @texts = ();
	$dir = "/home/masayume/forge/res/cardsfolder/$sd";
	opendir DIR, $dir or die "cannot open dir $dir: $!";
	my @texts= readdir DIR;
	closedir DIR;

	foreach $t (@texts) {

		# if ($counter > 100) { exit(1); }

		$cardrawname = `head -1 /home/masayume/forge/res/cardsfolder/$sd/$t`;
		$cardrawname =~ s/Name://; $tname = $cardrawname;
		chomp $tname;

#	    ($tname, $null) = split /\./, $t;
#		$tname =~ s/_/ /g;
#		$tname = uc($tname);

#		print "\n<br> TEXT: " . $tname ;
	    $texts{$tname} = 1;

	    ### check if exists file
		$imagefilename = '/home/masayume/forge2/cards/' . $tname . '.full.jpg';	    
		if (! -e $imagefilename ) {
			$cardlink = "http://magiccards.info/query?q=" . $tname . "&v=card&s=cname";
			print "\n<br>missing: <a href='$cardlink' target='_blank'>$tname</a> ($imagefilename)";
			$counter++;
		}
	}

### http://magiccards.info/query?q=Yawgmoth,%20Thran%20Physician&v=card&s=cname

}

exit(0);



$i=1;
$missing_cards = "";
$downloading_site = 'http://www.google.com/images?q=magic+gathering+' . 'MARKER' . '&hl=it&biw=1506&bih=936&tbs=isch:1,isz:m&prmd=ivns&source=lnt&sa=X&ei=OxhxTYvWG4O0tAa115yIDg&ved=0CAgQpwUoAg';
# $downloading_site = "http://www.downloadingcardssite.com/directory/";
foreach $m (sort @missing) {
# 	print "\n " . $i++ . " missing: " . $m;
	$string = $m;
	$string =~ s/\s/\+/g;
	$site = $downloading_site;
	$site =~ s/MARKER/$string/;
	$missing_cards .= "<br />" . $i++ . ") <a href='" . $site . "' target='_blank'>" . $m. "</a>";
}

$page =<<"EOF";
<html>
<head>
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
img { width: 300px; }
small { font-size: 10px; }
</style>
</head>
<body>
EOF

print $missing_cards;

$page =<<"EOF";

<small>
<br><br>
<b>$#cards cards in directory: $dir </b>
$selected
</body>
</html>
EOF

print $page;

exit(0)
