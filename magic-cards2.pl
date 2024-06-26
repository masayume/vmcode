#!/usr/bin/perl

use lib qw(.);

### /cgi-bin/magic-cards2.pl?smartread2=1							READS card list file above
### /cgi-bin/magic-cards2.pl?smartread2=1&seed=999999&filter=sepia	
### /cgi-bin/magic-cards2.pl?cardname=indreaver 					SPECIFIC CARD
### /cgi-bin/magic-cards2.pl?l=1#top
### /cgi-bin/magic-cards2.pl?wordnet=1
### /cgi-bin/magic-cards2.pl?lowfi=1
### /cgi-bin/magic-cards2.pl?dbxtract=1
### /cgi-bin/magic-cards2.pl?smartwrite2=1			WRITES card list file from TEXT card files in forge/res/cardsfolder
### /cgi-bin/magic-cards2.pl?filter=random			applies a random filter to card images

### functions
#	page_footer: 

### TOCHECK (next release)
# smartwrite2 da cardlist deve 
# 	 - RIMUOVERE la vecchia copia del file .old
# 	 - SALVARE una copia del file attuale come /usr/lib/cgi-bin/mtglsfile2.list.old
# 	 - GENERARE la nuova versione del file /usr/lib/cgi-bin/mtglsfile2.list
#  	 - ESEGUIRE il diff per avere la lista delle nuove carte

### TODO NEXT:
#   select only cardtype (lands etc.) (use DB or mtglsfile23.list)

### TODO:
### :631 (cardimage) image url image.full.jpg may be image1.full.jpg/image2.full.jpg in some cases 
### :570 card type/skill tokens => what happens
### :??? auto generate cardlist files by type 
### alternative card names
### smartread3: read from MTG Cardsmith archive http://mtgcardsmith.com/#
### card tags: type/subtype/environment/details
###	-> occorrerebbe una modalità di accesso a serie di parole dei nomi delle carte e relativo calcolo del wordtype
### 		sub: calculate_level - includere le K: (flying, trample, lifelink, vigilance, protections...) 
### 		definire la struttura dati per rappresentare il labirinto di terre
### 		trattare le creature con P/T 0/0
### DONE 13/08/11 sub: wordnet - calcolare i verbi, gli aggettivi e le parole composte

### HD image pack download: http://octgngames.com/mtg/download-links/ 
### wordnet dox: http://wordnet.princeton.edu/wordnet/man/wn.1WN.html

use File::Finder; ## (cfr. http://search.cpan.org/~merlyn/File-Finder-0.53/lib/File/Finder.pm)
use List::Util qw(shuffle);
use DBI;
use MyCompound; # custom module for wordnet v2 analysis (check compounds and word types (verb, name, adj.) based on frequency (polysemy count))
use Config::Simple;
use URI::Escape;

my $cfg 	= new Config::Simple('magic-app.ini');
my $Config 	= $cfg->vars();

### SCRIPT CONFIGURATION

my 	$enable_wordnet = 0; ### 1: ENABLE WORDNET - 0: DISABLE WORDNET

my (%POST, %QUERY, @cards);
&parse_args;

$cardsnum 		= 4;
$dir 			= $Config->{ImageDir}; 	# IMAGE cards directory
$dir2			= $Config->{CardDir}; 	# TEXT cards directory 
$version		= $Config->{Version}; 	# TEXT cards directory 
$lsfile			= 'mtglsfile.list';
$lsfile2		= 'mtglsfile2.list';
$lsfile_prefx 	= 'mtgls-';
$lsfile_sufx 	= '.list';

print "Content-type: text/html \n\n";

my @cards;
my $smartread_url;
my $seed;

if ($QUERY{'seed'}) {
	$seed = $QUERY{'seed'};
} else {
	$seed = srand(100);
}

if ($QUERY{'smartread2'}) {
		@cards = &smartread($dir, $lsfile2); 	
		$nextseed = int(rand(1000000))+1;
		$smartread_url = "?smartread2=1&seed=$nextseed"
} else {
		@cards = &smartread($dir, $lsfile); 
}


# $cardsfolder	= '/media/sf_forge/res/cardsfolder/';
$cardsfolder	= $dir2;
$cardtextfile 	= "cardsfolder.zip"; 
@rcards = shuffle @cards;


if ($QUERY{'l'}) { # image list with low resolution in evidence
	print &list;
} elsif ($QUERY{'wordnet'}) {
	print &listwordnet;
} elsif ($QUERY{'dbupdate'}) {
	&createdb;
	&updatedb;
} elsif ($QUERY{'wtt'}) {
        &wordtypetest;
} elsif ($QUERY{'smartwrite'}) { # reads cards IMAGE directory
        &smartwrite($dir, $lsfile);
} elsif ($QUERY{'smartwrite2'}) { # reads cards TEXT directory
        &smartwrite2($dir2, $lsfile2);
} elsif ($QUERY{'autowrite'}) { # reads cards IMAGE directory
        &autowrite($dir, $lsfile_prefx, $lsfile_sufx);
} elsif ($QUERY{'realimagelist'}) { # check new missing images from the cards.diff file after Forge version upgrade
        &realimagelist('/home/masayume/cgi-bin/cards.diff');
} elsif ($QUERY{'lowfi'}) {
        &lowficardread();
} elsif ($QUERY{'dbxtract'}) {
	my @rarray = &db_extract($QUERY{'q'});
	print "<hr>" . $QUERY{'q'} . "<hr>";
	foreach $r (@rarray) { print "" . $r; }
} else {

	if ($QUERY{'cardname'}) { 
		@cards = (); @rcards = (); @cards = `ls $dir | grep -i $QUERY{'cardname'}`;  
		@rcards = shuffle @cards;	
	}

	my $filter = '';
	if ($QUERY{'filter'}) { 
		$filter = $QUERY{'filter'};
	}

	print &page_header;

	print &cards($filter);

	print &page_footer($lsfile);

}

exit(0);

# ==========================================================================
# ==========================================================================
# ==========================================================================

sub smartwrite {

	my @cards = ();
	my ($dir, $lsfile) = @_;

	$lsfile = '/home/masayume/cgi-bin/' . $lsfile;

# writes card list file
	opendir DIR, $dir or die "cannot open dir $dir: $!"; 
	my @cards= readdir DIR; 
#	my @cards = glob ( "$dir" . "*.jpg" ); 
	closedir DIR;
	@cards = sort(@cards);
	shift(@cards); shift(@cards);

	open (FILE, "> $lsfile") or print "Could NOT write file $lsfile."; 
	$numcards = $#cards;
	$cards = join("\n", @cards);
	print FILE $cards;
	close FILE;

	print "written file <b>$lsfile</b> containing <b>" . $numcards . "</b> cards";
	exit(0);

}

sub smartwrite2 { # writes mtglsfile2.list

	my @cards = ();
	my ($dir, $lsfile2) = @_;

	$lsfile = '/home/masayume/cgi-bin/' . $lsfile2;
	$lsfileold = '/home/masayume/cgi-bin/' . $lsfile2 . '.old';
	$lsfileold = '/home/masayume/cgi-bin/' . $lsfile2 . '.vold';
	$difffile = '/home/masayume/cgi-bin/' . 'cards.diff';

# ENABLEME
	`rm $difffile`;

#	`rm $lsfile`;
#	`cp $lsfile $lsfileold`;

	`cp $lsfileold $lsfilevold`;
	`cp $lsfile $lsfileold`;

	$retval = `head -1 $dir2/?/*.txt | grep Name: | sed s/^Name:// > /tmp/tempfile`;
	# `cp $lsfile /tmp/tempfile; dos2unix /tmp/tempfile;`;
	`dos2unix /tmp/tempfile;`;
 	$retval2 = `cat /tmp/tempfile | sed s/\$/.full.jpg/`;

	open (FILE, "> $lsfile") or print "Could NOT write file $lsfile."; 
	print FILE $retval2;
	close FILE;

	print "<br>written (cardsfolder) file <b>$lsfile</b>";
	print "<br>old version written (cardsfolder) file <b>$lsfileold</b>";

	$diff = `diff $lsfileold $lsfile `;
	print "<br><br><br><br><hr><pre>" . $diff;

# ENABLEME
	open (FILE, "> $$difffile") or print "Could NOT write file $$difffile."; 
	print FILE $diff;
	close FILE;

	# "diff" cards have a "> " prefix 
	&realimagelist($difffile); 

	exit(0);

} # end sub smartwrite2


sub realimagelist {

	my @cards = ();
	my ($difffile) = @_;

	open (FILE, "< $difffile") or print "Could NOT READ file $lsfile."; 
	@cards = <FILE>;
	close FILE;

	$i = 0;
	print "<h2>$dir</h2>";
	print "<table border=1>";

	$existing = "\n\n<br><h1>EXISTING FILES:</h1>";
	foreach $image (@cards) {
		if ($image =~ /^>/) {
			$image =~ s/^> //;

			$filename = $dir . $image;
			chomp $filename;


#			print "<br> check filename <b>" . $filename . "</b>";

			if (-e "$filename") {
					$existing .= "<br>" . $image . 'exists';
			} else {
				print "\n<tr><td> " . $i++ ." </td><td> " ;
				$image2src = uri_escape($image);
				$image2src =~ s/.full.jpg%0A//;
				print " <a href='http://magiccards.info/query?q=" . $image2src . "&v=card&s=cname' target='_blank'>$image</a> </td><td> " . " <a href='/cards2/$image' target='_blank'>local image</a> </td></tr>";

			}

			# image directory 

		}
	}

	print "</table>";
	print $existing;

} # end sub realimagelist

sub autowrite { # writes mtglsfile2.list

	my @cards = ();
	my ($dir, $prefix, $suffix) = @_;

	@cardtypes = ("land");

	foreach $ctype (@cardtypes) {

		$lsfile = '/home/masayume/cgi-bin/' . $prefix . $ctype . $suffix;

		$retval = `head -3 $dir2/?/*.txt | grep -E "Name:|Types:"`;
		# `cp $lsfile /tmp/tempfile; dos2unix /tmp/tempfile;`;
		`dos2unix /tmp/tempfile;`;
	 	$retval2 = `cat /tmp/tempfile | sed s/\$/.full.jpg/`;

		open (FILE, "> $lsfile") or print "Could NOT write file $lsfile."; 
		print FILE $retval;
		close FILE;

		print "<br>written file <b>$lsfile</b>";

	}

	exit(0);

}

sub lowficardread {

# should read a file if it exists

	my @cards = ();
	my ($dir, $lsfile) = @_;

	$lsfile = '/home/masayume/down/demon/lowmtgimg2.txt';

	if (-e $lsfile) {
		open (FILE, "< $lsfile") or print "Could NOT READ file $lsfile."; 
		# open my $handle, '<', $lsfile;
#		chomp(my @cards = <FILE>);
		@cards = <FILE>;
		close FILE;
	} else {
		print "il file <b>$lsfile</b> non esiste. Vuoi <a href=\"/cgi-bin/magic-cards2.pl?smartwrite=1\">crearlo</a> ?";
		exit(0);
	}

	$page;
	foreach $c (@cards) {
		$query = $c;
		chop $query;
		$queryimg = $query . ".full.jpg";
		$page .= "<br><a href='http://magiccards.info/query?q=$query&v=card&s=cname' target='_blank'>$c</a> - <a href='file:///C:/Users/mcorradi/AppData/Local/Forge/Cache/pics/cards/$queryimg'>" . $query . "</a>";
	}

	print $page;

} # end sub lowficardread

sub smartread {

# should read a file if it exists

	my @cards = ();
	my ($dir, $lsfile) = @_;

	$lsfile = '/usr/lib/cgi-bin/' . $lsfile;

	if (-e $lsfile) {
		open (FILE, "< $lsfile") or print "Could NOT READ file $lsfile."; 
		# open my $handle, '<', $lsfile;
#		chomp(my @cards = <FILE>);
		@cards = <FILE>;
		close FILE;
	} else {
		print "il file <b>$lsfile</b> non esiste. Vuoi <a href=\"/cgi-bin/magic-cards2.pl?smartwrite=1\">crearlo</a> ?";
		exit(0);
	}

#	opendir DIR, $dir or die "cannot open dir $dir: $!"; 
#	my @cards= readdir DIR; 
#	closedir DIR;

	return @cards;
}

sub db_extract {

	my ($key) = @_;

	my @piperecs = ();

        my $dbh = &connect;

	$query{'types'} = "SELECT distinct types, count(*) FROM `cards` WHERE 1 group by types order by 1 "; ### card numbers per type
	$query{'lands'}	= "SELECT * FROM `cards` WHERE types like 'Land'"; ### lands
	$query{'lands3'} = "SELECT * FROM `cards` WHERE types like 'Land' AND level = 3"; ### lands of level 3 (rare)
	$query{'lands2'} = "SELECT * FROM `cards` WHERE types like 'Land' AND level = 2"; ### lands of level 2 (uncommon)
	$query{'lands1'} = "SELECT * FROM `cards` WHERE types like 'Land' AND level = 0"; ### lands of level 1 (common)
	$query{'creature5'} = "SELECT * FROM `cards` WHERE types like '%Creature%' AND level > 5"; ### creature more than level 5 (common)
	$query{'creatureW'} = "SELECT * FROM `cards` WHERE types like '%Creature%' AND manacost like '%W%'"; ### white creatures


	my $sth = $dbh->prepare($query{$key});  # prepare the query
	$sth->execute(); # execute the query
	my @row;
	$i = 1;

	while (@row = $sth->fetchrow_array) { # retrieve one row
	    	$result = $i++ . "|" . join("|", @row) . "";
		push(@piperecs, $result);
	}

        $dbh->disconnect();

	return @piperecs;

} # end sub db_extract

# ==========================================================================

sub wordtypetest {

	my $wordnum = shift;

	my $dbh = &connect;

        my $query = "SELECT name FROM cards ORDER BY RAND() LIMIT 10"; ### card numbers per type

        my $sth = $dbh->prepare($query);  # prepare the query
        $sth->execute(); # execute the query
        my @row;
        $i = 1;

        while (@row = $sth->fetchrow_array) { # retrieve one row
                $result = $i++ . "|" . join("|", @row) . "";
                push(@piperecs, $result);
        }

        $dbh->disconnect();

	print "OK";

} # end sub wordtypetest

# ==========================================================================

sub textfile {

	my $tf = shift;
	my $newtf;

        # $newtf = lc($textfile2);
        $newtf  = lc($tf);
        # $newtf  =~ s/'s?//g;
        $newtf 	=~ s/[',]//g;

        $newtf  =~ s/\s$//g;
        $newtf  =~ s/\s$//;
        $newtf  =~ s/\s/_/g;
        $newtf  =~ s/\-/_/g;
        $newtf  =~ s/\?//g;
        $newtf  =~ s/\!//g;
        $newtf  =~ s/[:]//g;
        $newtf  =~ s/full\.//;
        $newtf 	=~ s/\.jpg$/\.txt/;
#	print "<br><b>tf: $tf</b><br><b>newtf: $newtf</b>";
        $newtf  =~ s/\d(\.txt)$/$1/;
        $newtf  =~ s/_avatar(\.txt)$/$1/;

	return $newtf;

} # end sub textfile

# ==========================================================================

sub createdb {

	my $dbh = &connect;

# "cards" table structure
	$query = "Drop TABLE if exists `cards` ";

	$dbh->do($query);

	$query = "CREATE TABLE `cards` ( `name` varchar(255) COLLATE utf8_bin NOT NULL, `types` varchar(255) COLLATE utf8_bin NOT NULL, `manacost` varchar(55) COLLATE utf8_bin NOT NULL, `text` varchar(512) COLLATE utf8_bin NOT NULL, `rarity` varchar(55) COLLATE utf8_bin NOT NULL, `set` varchar(55) COLLATE utf8_bin NOT NULL, `image` varchar(55) COLLATE utf8_bin NOT NULL, `external_image` varchar(55) COLLATE utf8_bin NOT NULL, `power` varchar(55) COLLATE utf8_bin NOT NULL, `toughness` varchar(55) COLLATE utf8_bin NOT NULL, `level` varchar(55) COLLATE utf8_bin NOT NULL, `note` varchar(512) COLLATE utf8_bin NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";

	$dbh->do($query);

	if ($@) {
		$| = 1; # autoflush on
	     	$MESSAGE = "<br><b>ERROR</b>: dbh->do($query) failed. $@";
	     	print  "<br ><b>$nome</b> $i failed - $MESSAGE\n\n";					
	}
	

    $dbh->disconnect();

} # end sub createdb

sub updatedb {

		# Execute anytime before the <STDIN>.
		# Causes the currently selected handle to be flushed after every print.
	$| = 1;

        # Connessione al database
	my $dbh = &connect;

	$i = 0;
        foreach $card (reverse(@cards)) {
		$i++;

        	# $textfile = '/home/masayume/forge/cards/' . substr($card,0,1) . "/" . $card;
        $textfile = $cardsfolder . lc(substr($card,0,1)) . "/" . $card;

        $imagefile = '/var/www/cards2/' . $card; # image file path
        ($dev,$ino,$mode,$nlink,$uid,$gid,$rdev,$size, $atime,$mtime,$ctime,$blksize,$blocks) = stat($imagefile);
		
        $textfile2 = &textfile($textfile);

        $cardtitle      = $textfile2;
        $ltext          = `cat $textfile2`;

		($setc, $rarity, $image, $nome, $manacost, $type, $text3, $text2, $set, $power, $toughness, $allskills, $k) = &parsefile($textfile2);

		$level = &calculate_level($manacost, $rarity, $type, $text, $text2);
		$note = "-";

		if ( $card !~ /png$/ ) {
		        eval {
				$card =~ s/'/\\'/g;
				$image =~ s/'/\\'/g;
				$nome =~ s/\\+/\\/g;
				$intype = lc($k);
				$intype =~ s/'/\\'/g;
				
	       	         	$query = "INSERT INTO cards (name, types, manacost, `text`, rarity, `set`, image, external_image, power, toughness, level, note) VALUES ('$nome', '$type', '$manacost', '$text3', '$rarity', '$set', '$card', '$image', '$power', '$toughness', $level, '$intype')";

	                	$dbh->do($query);
	        	};
			if ($@) {
				$| = 1; # autoflush on
	      		$MESSAGE = "<br><b>ERROR</b>: dbh->do($query) failed. $@";
				if ($MESSAGE !~ /Duplicate entry/) {
	      				print  "<br ><b>$nome</b> $i failed - $MESSAGE\n\n";
				} else {
	      				print  "<br ><b>$nome</b> $i failed - $MESSAGE\n\n";					
				}
	      	}
      	}


# if ($i > 100) { last; }

	} # card loop

    $dbh->disconnect();


} # end sub updatedb

sub parsefile {

# pulire dai caratteri speciali i tag e fare parsing per funzionalità, meta parole chiave per l'uso e valori e skill 

    my $textfile = $_[0];

	$text = `cat $textfile`;

	@forgetext = ();
	@forgetext = split /\n/, $text;
	my ($pt, $oracle, $allsk, $setc, $rarity, $image, $k);

	foreach $ft (@forgetext) { 
		if ($ft =~ /^Name:/) { $ft =~ s/Name://; $nome = $ft; } 
		if ($ft =~ /^ManaCost:/) { $ft =~ s/ManaCost://; $manacost = $ft; } 
		if ($ft =~ /^Types:/) { $ft =~ s/Types://; $type = $ft; } 
		if ($ft =~ /^PT:/) { $ft =~ s/PT://; $pt = $ft; } 
		if ($ft =~ /^Oracle:/) { $ft =~ s/Oracle://; $oracle = $ft; } 
		if ($ft =~ /^SVar:/) { $ft =~ s/SVar://; $allsk .= $ft; } 
		if ($ft =~ /^K:/) { $ft =~ s/K://; $ft =~ s/\s*$//; $k .= $ft . "|"; } 
		if ($ft =~ /^SVar:Picture:/) { $ft =~ s/SVar:Picture://; $image = $ft; } 
	}
	
#	($setc, $rarity, $image) = split /\|/, $forgetext[-3];
	($dummy, $text2) = split /:/, $forgetext[-2];
	($dummy,$set) = split /:/, $setc;

    $nome 	=~ s/'/\\'/g;
    $type 	=~ s/'/\\'/g;
    $oracle =~ s/'/\\'/g;
    $text2 	=~ s/'/\\'/g;
    $allsk 	=~ s/'/\\'/g;

    $nome =~ s/\s$//;
    $type =~ s/\s$//;
    $image =~ s/\s$//;
    $manacost =~ s/\s$//;

	$power = "-1"; 
	$toughness = "-1";
	if ($type =~ /Creature/) { ($power, $toughness) = split /\//, $pt; }

	return ($setc, $rarity, $image, $nome, $manacost, $type, $oracle, $text2, $set, $power, $toughness, $allsk, $k);

} # end sub parsefile

# ==========================================================================

sub connect {

        my $port="3306";
        my $hostname="localhost";
        my $database="magic";
        my $dsn="DBI:mysql:database=$database;host=$hostname;port=$port";
#        my $userdb="masayume";
#        my $passdb="m4s4yum3";
	
        my $userdb="root";
        my $passdb="lordyupa";

        # Connessione al database
        my $dbh = DBI->connect($dsn, $userdb, $passdb, {RaiseError => 1});

	return $dbh;

} #end sub connect

# ==========================================================================

sub listwordnet {

        $minsize = 50000;
        $maxpaging = 50;

        $i = 1;
        $table = "<table border='1'>";

        foreach $card (@rcards) {

                $textfile = $Config->{CardDir} . lc(substr($card,0,1)) . '/' . $card;
                $imagefile = '/var/www/cards2/' . $card; # image file path
                ($dev,$ino,$mode,$nlink,$uid,$gid,$rdev,$size, $atime,$mtime,$ctime,$blksize,$blocks) = stat($imagefile);

		$textfile = &textfile($textfile);
                $text = `cat $textfile`;

                @forgetext = ();
                @forgetext = split /\n/, $text;
                ($set, $rarity, $image) = split /\|/, $forgetext[-2];

                $sizehtml = "<b>" . $size . "</b>";
                $imagehtml = "<td><a href='/cards2/$card'><img src='/cards2/$card' style='width:100px;' border=0></a></td>";
                
                $table .= "\n\n<tr><td>  $i </td><td>"  . $card . "</td><td><pre>" . $image . "</pre></td><td>$sizehtml</td>$imagehtml</tr>";

                if ($i++ >= $maxpaging) { last; }
        }

        $table .= "</table>";

        return $table;

} # end sub listwordnet


# ==========================================================================

sub list {

	$minsize = 50000;
	$maxpaging = 320;

	$i = 1;
	$table = "<table border='1'>";

	foreach $card (@rcards) {

        $textfile = '/home/masayume/forge2/cards/' . lc(substr($card,0,1)) . '/' . $card;
        $imagefile = '/var/www/cards2/' . $card; # image file path
        ($dev,$ino,$mode,$nlink,$uid,$gid,$rdev,$size, $atime,$mtime,$ctime,$blksize,$blocks) = stat($imagefile);

        $textfile = &textfile($textfile);
        $text = `cat $textfile`;

		@forgetext = ();
		@forgetext = split /\n/, $text;
		# $text =~ s/\n/ /gm;
		($set, $rarity, $image) = split /\|/, $forgetext[-3];

		$sizehtml = $size; 
		$imagehtml = "<td></td>";
		if ($size < $minsize) {
			$sizehtml = "<b>" . $size . "</b>";
			$imagehtml = "<td><a href='$image'><img src=" . $image. " style='width:200px;' border=0></a></td>";

			$cardname = lc $forgetext[0];
			$cardname =~ s/^name://;
			$cardname =~ s/\s/\+/;

			$hqimgurl = 'http://magiccards.info/query?q=' . $cardname . '&v=card&s=cname';
			$imagehtml .= "<td><a href='$hqimgurl' target='_blank'>card at magic cards</a></td>";

			# $table .= "\n\n<tr><td>$i</td><td>"  . $card . "</td><td><pre>" . $image . "</pre></td><td>$sizehtml</td>$imagehtml</tr>";
			# $i++;$text
		}

		$table .= "\n\n<tr><td>$i </td><td>"  . $card . "</td><td><pre>" . $image . "</pre></td><td>$sizehtml</td>$imagehtml</tr>";
		$table .= "\n <!-- QQ -->";

#		print "<pre>" . $forgetext[0] ; exit(0);
#		print "<pre>" . $text ; exit(0);

		if ($i++ >= $maxpaging) { last; } 
	}

	$table .= "</table><br><br><a href='#top'> - [[[ BACK UP ]]] - </a>";
	
	return $table;

} # end sub list

# ==========================================================================

sub cards { # imposta il layout principale per mostrare le carte

	my $filter = $_[0];

	my $size;
	$selected = "";
	$cards_html = "\n<!-- SHOW CARDS -->\n\n\n<center><table border='1'>\n<tr>";

	for ($i=0; $i<$cardsnum; $i++) {


		$imagefile = '/var/www/html/cards2/' . $rcards[$i]; # image file path

		$imagefile =~ s/\n//g; 
		($dev,$ino,$mode,$nlink,$uid,$gid,$rdev,$size, $atime,$mtime,$ctime,$blksize,$blocks) = stat($imagefile);
		
		$textfile2 = &textfile($rcards[$i]);
		$textfile2 =~ s/_\.txt/\.txt/;

		$cardtitle	= $textfile2;
		$textfile2 	= $cardsfolder . lc(substr($rcards[$i],0,1)) . '/' . $textfile2;
	    $ltext 		= `cat $textfile2`;

# calcolo dei testi & parse card data 
        $ltext =~ s/http:\/\/(.+)jpg/<a href='http:\/\/${1}jpg' target='_blank'>${1}jpg<\/a>/g;

        %carddata = &parsedata($ltext); ### ex: $carddata{'Name'}; keys: Types, ManaCost, Rarity

### thesaurus analysis I

   	 	$wordnet_an = "";
		$wordnet_an = &prethesaurus($carddata{'Name'});

		($setc, $rarity, $image, $nome, $manacost, $type, $text3, $text2, $set, $power, $toughness, $allskill, $k) = &parsefile($textfile2);

		$pt = "";
		if ($power != 0 || $toughness != 0) { $pt = $power. "/". $toughness; }

		my ($skills, $picurl) = split /Picture:/, $allskills;

		$cssmanastyle = &manacost2style($carddata{'ManaCost'});

		$sizeStr = "<br>Size: $size  </small>";
		if ($size < 110000) {
			$sizeStr = "<br></small><b>Size: <strong>$size</strong></b>  ";
		} else {
			$sizeStr = "<br>Size: $size  </small>";
		}

		$cddata		=<<"EOF";
<!-- The text field -->
<input type="text" value="$carddata{'Name'}.full.jpg" id="myInput$i" size="42">
<!-- The button used to copy the text -->
<button onclick="myFunction$i()">Copy Card Name to Clipboard</button>
<br><small>Imagefile: $imagefile
<br>image filename: $cdname
<br >textfile2: $textfile2 
<!-- <br>Size: $size  </small> -->
$sizeStr
<script type='text/javascript'>
function myFunction$i() {
  /* Get the text field */
  var copyText = document.getElementById("myInput$i");

  /* Select the text field */
  copyText.select();

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
//  alert("Copied the text: " + copyText.value);
}
</script>
EOF

		my ($clevel, $klevel) = &calculate_level($carddata{'ManaCost'}, $carddata{'Rarity'}, $type, $text3, $text2, $k);

		$ltext =~ s/[\|\n]/<br>/g; 		# $ltext =~ s/\n/<br>/g;

#####################################
### card tokens
#####################################

		my $strenght = ""; my $life = ""; my $level = "";
		if ($power > 0) {
			$strenght = "<div class='strenght'>" . "" . $power . "</div>";
		}
		if ($toughness > 0) {
			$life = "<div class='life'>" . "" . $toughness . "</div>";
		}
		if ($clevel > 0) {
			$level = "<div class='level'>" . "" . $clevel . "</div>";
		}

#####################################
### skill icons calculation ($k)
#####################################

		$skillicons_html 	= "";
		@skills 			= split /\|/, $k;
		foreach $skill (@skills)
		{
			@skillraw			= split /[\:,\.]/, $skill;
			$skill 				= $skillraw[0]; 
			$skillicon_path 	= "/cards2/skillicons/";
			$skill 				= &skillmapper($skill);
			$skill 				.= ".png";
			$skillicons_html 	.= "<div class='skillicon'><img class='skilliconimg' src='" . $skillicon_path . $skill . "'></div>";

			#card image path ?
		}


		$titlelength = length $carddata{'Name'};
		$cssTitleStyle = "title";
		if ($titlelength > 26) {
			$cssTitleStyle = "longtitle";
		}

		$ptstring = "";
		if ($power > 0 && $toughness > 0) {
			# $ptstring = "<br>power/thoughness: $pt";
			$ptstring = " (" . $pt . ")";
		} 

		$specialstring = "";
		if ($k) {
			# $ptstring = "<br>power/thoughness: $pt";
			$specialstring = "<br><span style='word-break: break-all;'>Special: <b>$k</b></span>";
		} 

#####################################
### card panel main template
#####################################

	    $selected .= "\n<td>\n\n<!-- COLUMN NUMBER $i -->\n\n<div id=\"selectable$i\" onclick=\"selectText('selectable$i')\" class='$cssmanastyle $cssTitleStyle' ><h2>" . $carddata{'Name'}. "</h2></div>\n\n" . 
	    	"<hr>" .

	    	"&nbsp;" . $level . $skillicons_html . $life . $strenght .  

	    	"<hr><div class='info'>" .  
	    	# "color: $cssmanastyle" . 
	    	"type(s): <b>" . ucfirst($cssmanastyle) . " " . $carddata{'Types'} .  $ptstring . "</b>" . 
	    	# "<br>power/thoughness: $pt" .
	    	# "<br><span style='word-break: break-all;'>Special: <b>$k</b></span>" . 
	    	$specialstring . 
	    	"<br>mana cost: <b>" . $carddata{'ManaCost'} . "</b>" . 
	    	"<br>Level: $clevel (kl: $klevel )<br><hr>$cddata</hr>$skills<hr>" . 
	        "</div><div class='wordnet'>" . 
	        "\n\n<div class='magicpre'><small>$ltext<hr>$wordnet_an</small></div></td></div>";

# calcolo delle immagini
	    my ($chtml,$cdname) = &cardimage($i,$type,$filter);
	    $cards_html .= $chtml;

	}

	# tool column
	$cards_html .= &extracardcol();

	$cards_html .= "\n\n</tr><tr> $selected </tr></table></center>";

	return $cards_html;

} #end sub cards


sub extracardcol {

	$col_html 	= "<td rowspan=\"2\" style=\"width: 130px; \">";

	$tddata		=<<"EOF";
<h2> &nbsp; Version</h2>
&nbsp; $version
<h2> &nbsp; img-tools</h2>
<ul style="padding-inline-start: 20px; ">
<li><a href="https://www.restorephotos.io/restore" target="_blank" title="AI upscale and sharpen image tool">restorephoto</a></li>
<li><a href="https://cloudconvert.com/webp-to-jpg" target="_blank" title="convert from webp to jpg or other formats">webp2jpg</a></li>
<li><a href="link" target="_blank"><i>text</i></a></li>
<li><a href="link" target="_blank"><i>text</i></a></li>
<li><a href="https://huggingface.co/spaces/fffiloni/stable-diffusion-img2img" target="_blank" title="transform image">img2img</a></li>
</ul>
<h2> &nbsp; scripts</h2>
<ul style="padding-inline-start: 20px; ">
<li> <a title="script in vmcode dir to be run via CLI: creates an html page with a list of low size card images in /home/masayume/DATA/C/pics/cards-new-faster/ directory">magic-lowres.sh</a> </li>
<li> <a title="script to change image.jpg to image.full.jpg in /home/masayume/DATA/C/pics/cards-new-faster/ directory"><i>0-2full.sh</i></a> </li>
<li> <i>text text</i> </li>
</ul>

<h2> &nbsp; links</h2>
<ul style="padding-inline-start: 20px; ">
<li> <a href="https://www.mtgpics.com/" title="" target="_blank">mtgpics</a> </li>
<li> <a href="https://www.artofmtg.com/" title="" target="_blank">artofmtg</a> </li>
<li> <a href="https://scryfall.com/" title="" target="_blank">scryfall</a> </li>
<li> <a href="https://www.cardmarket.com/en/Magic/" title="" target="_blank">cardmarket</a> </li>
<li> <a href="https://www.cardkingdom.com/" title="" target="_blank">cardkingdom</a> </li>
<li> <a href="#" title="" target="_blank">link</a> </li>
</ul>

EOF
	$col_html .= $tddata;
	$col_html .= "</td>";

	return $col_html;

} # end extracardcol

sub skillmapper {
		my $skill2map = $_[0];
		
		%mapper = (
		    "You may exert CARDNAME as it attacks"  	=> "Vary",
		    "Fuse"  	=> "Vary",
		    "Hidden agenda"  	=> "Vary",
		    "Provoke"  	=> "Vary",
		    "If CARDNAME would be put into a graveyard from anywhere, reveal CARDNAME and shuffle it into its owner's library instead"  	=> "Reveal",		    
		    "CARDNAME enters the battlefield tapped"  	=> "Entertapped",
		    "Hideaway"  	=> "Entertapped",
		    "Awaken"  		=> "Summon",
		    "Creatures with power less than CARDNAME's power can't block it" => "Powerunblock",
		    "Enchant artifact" 				=> "Enchant item",
		    "Enchant artifact you control" 	=> "Enchant item",
		    "Enchant creature an opponent controls" 	=> "Enchant creature",
		    "Enchant creature card in a graveyard" 		=> "Enchant creature",
		    "Enchant creature without flying"			=> "Enchant creature",
		    "Enchant Creature" 				=> "Enchant creature",
		    "Enchant creature you control" 	=> "Enchant creature",
		    "Enchant nonblack creature" 	=> "Enchant creature",
		    "Enchant black creature" 		=> "Enchant creature",
		    "Enchant red or green creature"	=> "Enchant creature",
		    "Enchant artifact or creature" 	=> "Enchant item",
		    "Enchant artifact an opponent controls" 	=> "Enchant item",
		    "Enchant non-Wall creature"  	=> "Enchant creature",
		    "Enchant creature or Vehicle"  	=> "Enchant land",
		    "Enchant nonbasic land"  		=> "Enchant land",
		    "Enchant Mountain"  			=> "Enchant land",
		    "Enchant Swamp"  			=> "Enchant land",
		    "Enchant Plains"  			=> "Enchant land",
		    "Enchant Island"  			=> "Enchant land",
		    "Enchant Forest"  			=> "Enchant land",
		    "Enchant enchantment"  			=> "Enchant item",
		    "Enchant permanent"  			=> "Enchant item",
		    "CARDNAME can't be countered"  	=> "Nocounter",
		    "CARDNAME attacks each combat if able" => "Rage",
		    "CARDNAME can block an additional creature each combat"  => "Blocker",
		    "All creatures able to block CARDNAME do so"	=> "Blocker",
		    "CARDNAME can block any number of creatures"  	=> "Bushido",
		    "CARDNAME can block only creatures with flying"	=> "Blockflying",
		    "Skulk"			=> "Unblockable",
		    "Exploit"  		=> "Pick",
		    "Transmute"  	=> "Pick",
		    "Dash"  		=> "Haste",
		    "Ninjutsu"  	=> "Haste",
		    "Double Strike"	=> "First Strike",
		    "MayFlashCost" 	=> "Flash",
		    "Afterlife"  	=> "Flashback",
		    "Buyback"  		=> "Flashback",
		    "Dredge"  		=> "Flashback",
		    "Persist"  		=> "Flashback",
		    "Recover"  		=> "Flashback",
		    "Soulshift"  	=> "Flashback",
		    "Unearth"  		=> "Flashback",
		    "Cipher"  		=> "Champion",
		    "Embalm"  		=> "Champion",
		    "Externalize"  	=> "Champion",
		    "Jump-start"  	=> "Champion",
		    "Retrace"  		=> "Champion",
		    "Transfigure"  	=> "Champion",
			"Split second" 	=> "Extirpate",
		    "CARDNAME doesn't untap during your untap step"  => "UpkeepCost",
		    "AlternateAdditionalCost"  => "UpkeepCost",
		    "Cumulative upkeep"  => "UpkeepCost",
		    "Emerge"  		=> "UpkeepCost",
		    "Miracle"  		=> "UpkeepCost",
		    "Splice"  		=> "UpkeepCost",
		    "ETBReplacement:Other:ChooseColor" 	=> "Color",
		    "ETBReplacement:Other:LandTapped"  	=> "Color",
		    "ETBReplacement"  					=> "Color",
		    "MayEffectFromOpeningHand"  		=> "Color",
		    "Storm"  		=> "Cast",
		    "You may choose not to untap CARDNAME during your untap step"  => "Buff",
		    "Ascend"  		=> "Buff",
		    "Amplify"  		=> "Buff",
		    "Bloodthirst"  	=> "Buff",
		    "Devour"  		=> "Buff",
		    "Evolve"  		=> "Buff",
		    "etbCounter"  	=> "Buff",
		    "Escalate"  	=> "Buff",
		    "Exalted"  		=> "Buff",
		    "Fabricate"  	=> "Buff",
		    "Graft"  		=> "Buff",
		    "Level up"  	=> "Buff",
		    "Melee"  		=> "Buff",
		    "Mentor"  		=> "Buff",
		    "Modular"  		=> "Buff",
		    "Monstrosity"  	=> "Buff",
		    "Outlast"  		=> "Buff",
		    "Reinforce"  	=> "Buff",
		    "Renown"  		=> "Buff",
		    "Riot"  		=> "Buff",
		    "Scavenge"  	=> "Buff",
		    "Sunburst"  	=> "Buff",
		    "Tribute"  		=> "Buff",
		    "Unleash"  		=> "Buff",
		    "CARDNAME can't attack alone" 	=> "Shrug",
		    "CantBeBlockedBy Artifact" 	=> "Shrug",
		    "CARDNAME can't block" 	=> "Shrug",
		    "CantBlock Artifact" 	=> "Shrug",
		    "Extort"  		=> "Lifelink",
		    "Plainswalk"  	=> "Islandwalk",
		    "Forestwalk"  	=> "Islandwalk",
		    "Damage that would be dealt by CARDNAME can't be prevented"  		=> "Wither",
		    "Infect"  		=> "Wither",
		    "Annihilator"  	=> "Destroy",
		    "Rebound"  		=> "Changetype",
		    "ETBReplacement:Other:ChooseCT" 	=> "Cost",
		    "Affinity"  	=> "Cost",
		    "Cascade"  		=> "Cost",
		    "Convoke"  		=> "Cost",
		    "Echo"  		=> "Cost",
		    "Evoke"  		=> "Cost",
		    "Improvise"  	=> "Cost",
		    "Kicker"  		=> "Cost",
		    "Madness"  		=> "Cost",
		    "Multikicker"  	=> "Cost",
		    "Prowl"  		=> "Cost",
		    "Spectacle"  	=> "Cost",
		    "Strive"  		=> "Cost",
		    "Surge"  		=> "Cost",
		    "Prevent all damage that would be dealt to CARDNAME"  => "Indestructible",  
		    "ETBReplacement:Other:DBNameCard"  => "Indestructible",
		    "Prevent all combat damage that would be dealt to CARDNAME"  => "Prevent",
		    "Protection from black"  	=> "Protection",
		    "Protection from green"  	=> "Protection",
		    "Protection from blue"  	=> "Protection",
		    "Protection from red"  		=> "Protection",
		    "Protection from white"  	=> "Protection",
		    "Protection from creatures"	=> "Protection",
		    "Protection from artifacts"	=> "Protection",
		    "Protection from Dragons"	=> "Protection",
		    "Protection from Demons"	=> "Protection",
		    "Protection from Goblins"	=> "Protection",
		    "Totem armor"  	=> "Prevent",
		    "Dethrone"  	=> "Attack",
		    "CantBeBlockedByAmount"  	=> "Menace",
		    "Intimidate"  	=> "Menace",
		    "Megamorph"  	=> "Morph",
		    "Phasing"  		=> "Fading",
		    "MayFlashSac"  	=> "Changetype",
		    "Aftermath"  	=> "Changetype",
		    "TypeCycling"  	=> "Cycling",
		    "Ingest"  		=> "Discard",
		    "Delve"  		=> "Discard",
		    "Flanking"  	=> "Banding",
		    "Soulbond"  	=> "Banding",
		    "Living Weapon"	=> "Living",
		    "Vanishing" 	=> "Suspend",
		    "Conspire"		=> "Multiply"

		);

		$mapped = $mapper{$skill2map};

		if (!$mapped) {
			$mapped = $skill2map;
		}

		return $mapped;
}

sub manacost2style {
	my $manacost = $_[0];

	my $style = "";
	my %mana;
	$coloredmana = 0;
	@manacost = split /\s/, $manacost;
	foreach $mc (@manacost) {
		if ($mc eq 'B') {
			$mana{'black'} = 1; $coloredmana = 1;
		} elsif ($mc eq 'U') {
			$mana{'blue'} = 1; $coloredmana = 1;
		} elsif ($mc eq 'W') {
			$mana{'white'} = 1; $coloredmana = 1;
		} elsif ($mc eq 'G') {
			$mana{'green'} = 1; $coloredmana = 1;
		} elsif ($mc eq 'R') {
			$mana{'red'} = 1; $coloredmana = 1;
		} 
	}

	if ($coloredmana) { 
		foreach $k (keys(%mana)) {
			$style .= $k . " " ; 
		}
	} else { $style = "colorless"; }
	if (keys(%mana) > 1) { $style = "gold"; }

	return $style;

} # end sub manacost2style

sub cardimage {

	my $i 			= $_[0];
	my $type 		= $_[1];
	my $filter 		= $_[2];
	my $cardimage 	= "";

	$cardtitle 	= $rcards[$i];
	$cardtitle 	=~ s/\.full\.jpg$//;
	$cardtitle 	=~ s/_/\+/;
	$cardurl 	= 'http://magiccards.info/query?q=' . $cardtitle . '&v=card&s=cname';
	$cardurl2	= 'https://magidex.com/search?q=' . $cardtitle; 
	$cardurl3	= 'https://www.facetofacegames.com/search/?keyword=' . $cardtitle; # https://www.facetofacegames.com/search/?keyword=syphon%20mind
	my $enc_img = $cardtitle;

	$imageurl = $rcards[$i]; $imageurl =~ s/[:"\?]//g;
	chomp $imageurl;

	$id = "card";
	if ($type =~ /Plane /) {
		$id = "Plane";
	}
	if ($type =~ /Planeswalker/) {
		$id = "Planeswalker";
	}
	if ($type =~ /Phenomenon/) {
		$id = "Phenomenon";
	}

#	$cardclass = "cardimage";
	$cardclass = $type;

	if ($filter eq 'random') {
		if (int(rand(100)) > 80) { $cardclass .= " grayscale"; $smartread_url .= '&filter=grayscale'; }
		elsif (int(rand(100)) > 60) { $cardclass .= " saturate"; $smartread_url .= '&filter=saturate'; }
		elsif (int(rand(100)) > 40) { $cardclass .= " sepia"; $smartread_url .= '&filter=sepia'; }
		elsif (int(rand(100)) > 20) { $cardclass .= " huerotate"; $smartread_url .= '&filter=huerotate'; }
	} elsif ($filter eq 'sepia') {
		$cardclass .= " sepia";
		$smartread_url .= '&filter=sepia';
	} elsif ($filter ne '') {
		$cardclass .= " " . $filter;		
	}

	
	
	$cardimage .= "<a href=\"/cards2/" . $rcards[$i] . "\" target='_blank'><small> $rcards[$i] </small></a> 
		<a href=\"$cardurl\" target=\"_blank\">[MtGC]</a> 
		<a href=\"$cardurl2\" target=\"_blank\">[magidex]</a> 
		<a href=\"$cardurl3\" target=\"_blank\">[face2face]</a> 
		--- <td style='height:300px; width:380px; table-layout:fixed;'>" . 
		"<a href=\"/cgi-bin/magic-cards2.pl$smartread_url\">" . 
		"\n" . 
		"\n<!-- CARD -->" . 
		"\n<div id='$id' style='float:left; position: relative;' >" . 
		"<img id='$id' class='$cardclass' src=\"/cards2/" . $imageurl . "\" title='" . $rcards[$i] . "' border='0' style='float:left;'></a>" . 
		"<br clear='all'/></div></td>";

	return ($cardimage,$cardtitle);

} #end sub cardimage

# ==========================================================================

sub prethesaurus { # prepara il nome della carta per l'analisi con il thesauro

	my $cardname = $_[0];

	$cardname =~ s/-/ /g;
	$cardname =~ s/,//g;
	$cardname =~ s/'s//g;
	
	@cardname = split /\s/, lc($cardname);
    $wordnet_an = "";

    if ($enable_wordnet) {
	    foreach $cn (@cardname) { 
			if ($cn eq 'the' || $cn eq 'of' || $cn eq 'to' || $cn eq 'and' || $cn eq 'for') { next; }
			$wordnet_an .= "<hr><h1>$cn</h1><hr><small>" . &wordnet($cn) . "</small>"; 
		}
	}

	return $wordnet_an;

} # end sub prethesaurus

# ==========================================================================

sub wordnet { # analisi con il thesauro
	my $word = $_[0];
	my $wndata_log;
	my $wndata = '';
	
	my ($compounds, %words) = MyCompound::find_matches($word);

	foreach $cps (@$compounds) {
	        foreach $k (@$cps) {
	                # print "\n '" . $k . "' score: " . $words{$k}{'score'};
	                # print "\n '" . $k . "' type: " . $words{$k}{'type'};
	
			$wndata .= `wordnet $k $words{$k}{'type'}`;
			my @senses = split /Sense/, $wndata;
			my $wordtype = "";
			# foreach my $sraw (@senses) {
			my $sraw = $senses[1];
				my @slist = split /\n/, $sraw;
				$wordtype = $slist[$#slist-2];
				$wordtype =~ s/\s+[^\=\>]//;
			# }
			$wndata .= "\nword type: " . $wordtype;
	
			# $wndata_log .= '<br>compound: ' . $word . " - word: " . $k . " - type: " . $words{$k}{'type'} ;
	        }
	}

	return $wndata . "<hr>" . $wndata_log;

} # end sub wordnet

sub wordnet_old { # analisi con il thesauro

	my $word = $_[0];
	$wndata = `wordnet $word -hypen`;
	$wndata_log = "";

	if (!$wndata) {
		$wndata_log .= "<br />test verb";
		$wndata = `wordnet $word -hypev`;	
	}

        if (!$wndata) {
		$wndata_log .= "<br />test chopped verb";
		chop $word;
                $wndata = `wordnet $word -hypev`;
        }

	if ($wndata) {
# 1 -
#		use WordNet::SenseRelate::Preprocess::Compounds;
#  		$preprocess = WordNet::SenseRelate::Preprocess::Compounds->new($wntools);
#  		$newInstance = $preprocess->preprocess($word);

#		$wndata = $newInstance;

# 2 -
#		use WordNet::QueryData;
#  		use WordNet::Tools;

#  		my $wn = WordNet::QueryData->new;
#  		my $wntools = WordNet::Tools->new($wn);
#  		my $wnHashCode = $wntools->hashCode();
#  		my $newstring = $wntools->compoundify("find compound words like new york city in this text");

#		$wndata = $newstring;

# 3 - OK
#		use WordNet::QueryData;
#		my $wn = WordNet::QueryData->new("/usr/share/wordnet/");

	}

	return $wndata . "<hr>" . $wndata_log;

} # end sub wordnet_old

# ==========================================================================

sub parsedata { # prepara la struttura dati dal contenuto del file forge-text

	my $data = $_[0];
	my @data = split /\n/, $data;
	my %data;

	foreach $dd (@data) {
		my ($key, $value, $extra) = split /:/, $dd;
		$data{$key} = $value;
		if ($value eq 'Rarity') { $data{'Rarity'} = $extra; }
	}

	return %data;
	
} # end sub parsedata

# ==========================================================================

sub calculate_k {

	my $k = shift;
        $kbonustot = 0;

        $kbonus{'convoke'}			= 1;
        $kbonus{'defender'}			= 0;
        $kbonus{'double strike'}	= 2;
        $kbonus{'enchant creature'} = 1;
        $kbonus{'fear'} 			= 2;
        $kbonus{'flash'} 			= 1;
        $kbonus{'first strike'}		= 2;
        $kbonus{'flashback'} 		= 2;
        $kbonus{'flying'} 			= 2;
        $kbonus{'forestwalk'} 		= 1;
        $kbonus{'graft'} 			= 1;
        $kbonus{'haste'} 			= 1;
        $kbonus{'indestructible'}	= 1;
        $kbonus{'lifelink'} 		= 1;
        $kbonus{'mountainwalk'}		= 1;
        $kbonus{'miracle'}			= 1;
        $kbonus{'morph'}			= 1;
        $kbonus{'persist'}			= 1;
        $kbonus{'protection'}		= 1;
        $kbonus{'protection from black'}= 1;
        $kbonus{'protection from red'}	= 1;
        $kbonus{'shroud'} 			= 2;
        $kbonus{'shadow'} 			= 1;
        $kbonus{'swampwalk'} 		= 1;
        $kbonus{'trample'} 			= 2;
        $kbonus{'vigilance'} 		= 2;
        $kbonus{'wither'} 		 	= 1;
        foreach $sk (split /\|/, $k) {
		if ($sk =~ /^Graft/) { $sk = "Graft"; }
		if ($sk =~ /^Protection from/) { $sk = "Protection"; }
		if ($sk =~ /^Enchant creature/) { $sk = "Enchant creature"; }
		if ($sk =~ /^Miracle/) { $sk = "Miracle"; }
		if ($sk =~ /^Morph/) { $sk = "Morph"; }
		if ($sk =~ /^Flashback/) { $sk = "Flashback"; }
                $kbonustot += $kbonus{lc($sk)};
        }

        return $kbonustot;

} # end sub calculate_k

sub calculate_level { # calcola il livello di potenza della carta

	my ($mana, $rarity, $type, $text, $text2, $k) = @_;
	my $level = 0;
	$rarity=~ s/\s//g;

	@costs = split /\s/, $mana;
	foreach $c (@costs) {
		if (int($c)) { $level += $c; }
		elsif ($c eq 'no' || $c eq 'cost') { $level += 0; }
		else { $level += 2; }
	}

	$kbonustot = &calculate_k($k);
	
	$bonus{'Common'} = 1;
	$bonus{'Uncommon'} = 2;
	$bonus{'Rare'} = 3;
	$bonus{'Mighty'} = 5;

	$level += $bonus{$rarity} + $kbonustot; 

	return $level, $kbonustot;

} # end sub calculate_level

# ==========================================================================

sub page_header {

	my $page =<<"EOF";
<html>
<head>
<style type="text/css">
</style>
<link href='//fonts.googleapis.com/css?family=Lato:300,400,700,900,400italic' rel='stylesheet' type='text/css'>
<link href="/css/magic-cards.css" media="all" rel="stylesheet" type="text/css"/>
<title>magic-cards</title>
<script type="text/javascript">
    function selectText(containerid) {
        if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById(containerid));
            range.select();
        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(range);
        }
    }
</script>
</head>
<body id="top">
EOF

	return $page;
	
} # end sub page_header

# ==========================================================================

sub page_footer {

	use POSIX 'strftime';

	my ($lsfile) = @_;

	my ($dev,$ino,$mode,$nlink,$uid,$gid,$rdev,$size,$atime,$mtime,$ctime,$blksize,$blocks) = stat($lsfile) if -e $lsfile ;
	my $filestats = "card list file name: <a href='/css/$lsfile' target='_blank'>$lsfile</a> - size: <b>$size</b> - last mod: <b>" . strftime('%d/%m/%Y', localtime($mtime)) . 
		"</b><br> - <a href='/cgi-bin/magic-cards2.pl?smartwrite=1'><b>generate card list file</b></a> (from images) - <a href='/cgi-bin/magic-cards2.pl?smartwrite2=1'>generate card list file</a> (from cardsfolder) ";

    my $page =<<"EOF";

<div style="padding-left: 20px; width: 520px;">
<small>
<br><br>
<b>$#cards cards in directory: $dir (VM) </b> - <a href="file:///home/masayume/DATA/C/pics/cards/" target="_blank">file:///home/masayume/DATA/C/pics/cards/</a> (locale) 
<br>$filestats

<br><b>1. save new card images to:</b> <code>/home/masayume/DATA/C/pics/cards-new-faster/</code>
<br><b>2. move new card images saved from previous dir to:</b> <code>/home/masayume/DATA/C/pics/cards/</code>

<br><a href="/cgi-bin/magic-missing.pl" target="_blank">missing cards (use this script and please wait)</a> 
<br><a href="/cgi-bin/magic-cards2.pl?realimagelist=1" target="_blank">missing cards (by cards.diff)</a> 
<br><a href="/css/magic-cards.css" target="_blank">magic-cards.css</a> in /var/www/html/css/
<br><a href="/js/" target="_blank">javascript libraries</a> in /var/www/html/js/
<br><br><hr><br><b>Come si aggiorna il file delle carte lo-fi</b>: 
<br>il file è in ~/down/demon/lowmtgimg2.txt</body>, e si genera andando su
<br>file:///C:/Users/mcorradi/AppData/Local/Forge/Cache/pics/cards/ 
<br>e ordinando per "size", poi creando il nuovo file con il comando: 
<pre>cat /tmp/lowmtgimg.txt | awk -F"|" '{print \$1}' > ~/down/demon/lowmtgimg2.txt</pre>
ed infine andando su <a href='/cgi-bin/magic-cards2.pl?lowfi=1'>/cgi-bin/magic-cards2.pl?lowfi=1</a>
</div>
</html>
EOF

	return $page;
} # end sub page_footer

# ==========================================================================
# ==========================================================================
# ==========================================================================

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

} # end sub parse_args


