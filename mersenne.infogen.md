# mersenne meta generator v1.4 - v1.5

## Todo List
1. layer type exclusion directive in asset file name (to exclude VB (back hair) for a certain HE (head)) 
  mabius_A_HE_1_006 -> mabius_A_HE_1_???????_00x

2. asset inclusion directive in asset file name (to associate a specific layer image with a specific other layer)
  mabius_A_HE_1_006 -> mabius_A_HE_1_???????_00x

3. fix combinations counter 

## directories

* /var/www/html/mersenne/ 								          UI 
* /home/masayume/DATA/E/Temp/demon/mersenne/ 				DATA
* /home/masayume/DATA/E/PROJECTS/MERSENNE/ 				  DIR

## URL

* [Mabius](http://localhost:8910/mersenne/mersenne.php?seed=100&page=8&results=1&atype=mabius)
* [Uchida](http://localhost:8910/mersenne/mersenne.php?seed=100&page=1&results=1&atype=uchida)
* [Uchida Pixel Art](http://localhost:8910/mersenne/mersenne.php?seed=100&page=1&results=1&atype=uchidapixel)
* [Spelunky](http://localhost:8910/mersenne/mersenne.php?seed=100&page=1&results=1&atype=spelunky)

## Data Dir
* /home/masayume/DATA/E/Temp/demon/mersenne/mabius/ 		Mabius            templates: /home/masayume/Downloads/masayumeP/mabius PSD templates/
* /home/masayume/DATA/E/Temp/demon/mersenne/uchida/ 		Uchida
* /home/masayume/DATA/E/Temp/demon/mersenne/uchidapixel/  ASSETS DIR
* /home/masayume/DATA/E/Temp/demon/mersenne/uchidapixel/uchidapixel.json    cf1 conf file
* /home/masayume/DATA/E/Temp/demon/mersenne/uchidapixel/uchidapixel4js.json  naming conf file
* /home/masayume/DATA/E/Temp/demon/mersenne/spelunky/ 	Spelunky

## Data File
* /home/masayume/DATA/E/Temp/demon/mersenne/spelunky/spelunky.json

## files

- main program. versioned on github. 
```
 /var/www/html/mersenne/mersenne.php -> /home/masayume/git/vmcode/mersenne-03.php     
```

- mersenne main configuration:
```
/var/www/html/mersenne/mersenne-03-config.php   
```

## Process

(mersenne.php & assets)

1 - aggiunta della nuova voce per la nuova directory in /var/www/html/mersenne/mersenne-03-config.php
$contents       = array('uchida', 'uchidapixel', ...
$results_x_page = array('uchida' => 1, 'uchidapixel' => 1, ...

2 - creare la directory degli asset
ASSETS DIR: 	/home/masayume/DATA/E/Temp/demon/mersenne/template2
				cd /home/masayume/DATA/E/Temp/demon/mersenne/
				cp -rp template2 <NEW_NAME>
				cd <NEW_NAME>
				./rename <NEW_NAME>

Es. ASSETS DIR: /home/masayume/DATA/E/Temp/demon/mersenne/uchidapixel/

3 - preparare i file di configurazione
layer conf file: 		/home/masayume/DATA/E/Temp/demon/mersenne/uchidapixel/uchidapixel.json
naming conf file: 		/home/masayume/DATA/E/Temp/demon/mersenne/uchidapixel/uchidapixel4js.json

 PIXELIZE PROCESS (pixatool linux)

1 - Create the palette
	<Import> palette-image with desiderd palette colors (quantized)
	<Palette> Pixatool Tab -> <New> -> <Click Color (first top, up> -> <Pick> and click all the colors in the palette-image
	<Save> palette
2 - Import the image & elaborate
	load palette
	<General> Pixelate W(idth); Pixelate H(eight) (i.e. 4); Set Contrast, Brightness, Exposure
	<Palette> Choose Dither Amount
	<Export>
3 - Load exported image in Photopea; Color Range background and delete to restore transparency; Scale 4x (ALT+CTRL+I) with Nearest Neighbor

 = - = - === Mabius Pixel === = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - 

http://localhost:8910/mersenne/mersenne.php?seed=100&page=2&results=1&atype=mabius

* ASSET DIR:      /home/masayume/DATA/E/Temp/demon/mersenne/mabius/
* PSD DIR:        /home/masayume/Downloads/masayumeP/mabius PSD templates/
* LAYERS control: /home/masayume/DATA/E/Temp/demon/mersenne/mabius/mabius.json

La struct "a" (seguente) è associata ai layer nella *ASSET DIR*: mabius_A_* con "subtypes": ["A"] 
dir: PSD DIR; file: mabius-subtype_A.psd; layer group: subtype:A working 

```
  "structs": {
    "a": {
      "layers": {
        "VB": "100",      <-- back  - (back)hair
        "LW": "100",                - left arm
        "BO": "100",                - body
        "LB": "100",                - legs
        "RW": "100",                - right arm
        "HE": "100"       <-- front - head & front hair
      },
...
      "subtypes": ["A"]
```


 = - = - === Uchida Pixel === = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - 

https://twitter.com/MasayumeP   masayume.pixelart   BRAVE browser alias tts-dev-int@dset.cineca.it 

tags: #pixelart #pixel_art #ドット絵 #NES #palette #scanlines #8bit #uchida_masayasu #内田正泰 

DIR: 			~/DATA/E/Temp/demon/mersenne/masayumeP/
PSD TEMPLATES:	~/DATA/E/Temp/demon/mersenne/masayumeP/Uchida PSD templates
MERSENNE DIR: 	/home/masayume/DATA/E/Temp/demon/mersenne/uchidapixel/
MERSENNE URL: 	http://localhost:8989/mersenne/mersenne.php?seed=102&page=67&results=1&atype=uchidapixel

 TODO (UCHIDA PIXEL)
A - auto border on front layers
B - fix black pixels & missing lines 
C - https://twitter.com/TheOtaking/media 	add front pinups

### UCHIDA parts
- VB: 30 	-> 87
- LB: 5 	-> 27
- BO: 8 	-> 23
- LW: 1  	->  1
- RW: 1 	->  1
- HE: 7 	-> 45

 = - = - === Malika === = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = 

DIR: 			~/DATA/E/Temp/demon/mersenne/masayumeP/
PSD TEMPLATES:	~/DATA/E/Temp/demon/mersenne/masayumeP/???
MERSENNE DIR: 	/home/masayume/DATA/E/Temp/demon/mersenne/malika/
MERSENNE URL: 	http://localhost:8989/mersenne/mersenne.php?seed=100&page=1&results=1&atype=malika

NEXT IDEAS: Malika Favre - /home/masayume/DATA/E/INSPIRE/@CARTOONS/MALIKA/

 = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = - = -  = - = - 

 * MERSENNE *

GENERAL mersenne    -  	http://localhost:8989/mersenne/mersenne.php
						http://localhost:8989/mersenne/mersenne.php?seed=100&page=1&results=1&atype=uchida
						http://localhost:8989/mersenne/mersenne.php?seed=100&page=2&results=1&atype=jaime
						http://localhost:8989/mersenne/mersenne.php?seed=100&page=2&results=1&atype=magnus


> original files DIR: 	uchida 	E:\Desktop\fun\INSPIRE\@masayasu_uchida
> work dir (psd) 		E:\PROJECTS\MERSENNE\WORK\PSD 		(generic-template-01.psd, uchida-template-01.psd, ...)
> layer directories 	
						E:\Temp\demon\mersenne\generic\
						E:\Temp\demon\mersenne\uchida\
						E:\Temp\demon\mersenne\jaime\
						E:\Temp\demon\mersenne\magnus\

> su masayume 			https://www.masayume.it/tools/mersenne/mersenne.php?&page=1&results=1&atype=uchida

### TODO

SUBTYPE HANDLING: show only matching subtype ( "subtypes": ["A"] ) listed in a certain struct
:493 // TODO: in $main_layers_types ci sono i vari tipi (template_A, $template_B)
$scene_elems    = kind_elem($part, $dlayers, $assetmode);
:755 amode
519 kind_elem 4th param (subtype)
if structs define subtype it must match asset_SUBTYPES string 

  HERE !!!
:743 kind_elem() needs $subtype defined to select assets
get back to :381 in scene_layers to read struct allowed subtypes and invoke kind_elem(..., $allowed_subtype ) 

:524 $name_struct è il nome della struttura scelta e non il subtype, 
  occorre ricavare subtype da
:316 if ($structsmode) { 
  da $structs


uncomment :1178, 1259-1264

### DISPLACEMENT 
:785  		// calculate padding displacement from $scene_url[$j] filename sections: up: -uNN- down: -dNN- left: -lNN- right: -rNN- 

### PROMOTE:
						https://pixelation.org/index.php?board=1.0;sort=views
						https://forums.tigsource.com/

### TEST URL: 				http://localhost:8989/keplerion/mersenne-03.php

:247 $scene_array = scene_gen(); scene_gen calcola 
:647 scene_layers($scenedir); CALCOLA QUALI LAYERS

scene(...) mostra una immagine di layer (array scene_url) => occorre intervenire su scene_url per mt_rnd, ma lo so $i ?

DOING: 

E:\Temp\demon\demonfx
id fx associato

info_injection()  	:512
info_read() 		:612

o file demons-attr-in.json con i dati da iniettare va in $dir, insieme ai file da scrivere
o leggere (once) inject.json in info_read
- formattare il json (PART -> num -> attribute -> value)
	search string in page source: 		=> he
	first:  define data for HE 68

- popolare i valori di info_injection
- gestione della modalità mersenne (la generazione del json va fatta solo in casi specifici, da abilitare via configurazione)

aggiornamento advanced features sul doc: 

multi-hit demons: quando vengono colpiti perdono una parte e se non vengono colpiti di nuovo poi ricresce
motion pattern implementation

16) gestione dell'injection non solo per demons ma anche per gli altri tipi di asset. 
		assets/games/demons/demons-attr-in.json
		:528 -> function info_injection()
			array of bullets 	<- json dei bullets
			array of fx 		<- json dei fx
 	inserire l'ID del bullet dentro all'attributo 

 	$jinfo          = info_read($dir);

 	:539 

### TODO:

17) rigenerazione e consolidamento demons-attr-in.json per motion attributes (e general attributes)
17) wordpress article on demon DNA
18) rigenerazione demonbonus without extra attributes e demonbonus-attr-in.json
20) demons: static assets ?
20) controllo integrità demons-attr-in.json e parti effettive
21) explosion attributes
22) togliere dai navigation tabs il prefisso "demon" quando non sono "demons"

23) aggiungere il seed nel tooltip (altre info ?), accorpare la dir e sottolineare le animazioni 
	+ seed irregolare sulle altre pagine
	attenzione al contatore delle pagine singole
24) riallineare le immagini grandi orizzontali in demonbacks
25) mostrare il count giusto dei layer scelti dalla mt_rnd(struct) .
	:961
26) usare solo i sottotipi della struct decisa a 5
27) parametrizzare lo spostamento a destra per risultati singoli in funzione dei tipi 
	es: http://localhost:8989/keplerion/mersenne-03.php?seed=100&page=1&results=1&atype=demontitle
		http://localhost:8989/keplerion/mersenne-03.php?seed=100&page=1&results=1&atype=demonback
	non deve essere sempre left: 400
28) ADVANCED gestione dei paired assets (capelli davanti e dietro) (:474  // paired wings => LW (div.1) = RW (div.0) )
29) ADVANCED clipping to remove and bring forward
30) ADVANCED  writing in 4js.json PERSISTENT CUSTOM ATTRIBUTES from another static file
	renaming utility (a renamed asset must be renamed in the json too)
31) ambilight: https://codepen.io/saschatoussaine/pen/yaZWmK
32) ADVANCED FAROUT: voxel implementation https://twitter.com/Voxel_Vader


### DONE: 
1) 	rilevare se il json contiene "structs" e se si parsarlo. set global structs_mode = 1
2) 	trovare tutte le structs e usare mt_rnd(seed,page,i) per decidere quale struct usare 		array_keys($structs)
3) 	usare i layer definiti nella struct 														$structs["a"]["layers"]
4) 	scene loop: definire lo scene_seed ed usarlo per la generazione di tutta la scene 			
5) 	mt_rnd di che struct usare da array_keys($structs) dove avviene la scelta dei layers :408
6) 	usare i layer della struct decisa a 5) :408	verificato con uchida
7) 	usare il naming specifico della struct decisa a 5)
8) 	click on an asset in multiasset page and go to single view ( :627 come :281 ) 
9) 	ADVANCED implementazione delle animazioni :601 - :618 con https://codepen.io/masayume/pen/aXeRaX?editors=1100
10) tooltip mostrare per ciascun quadro le info di quale struct è in uso e i layers scelti		
11) fix zoom view ( :627 come :281 ) 
12) nomi delle animazioni (+ altre info) nel JSON 4js	:480 inserire il nome giusto dell'immagine (+ subpath "anims")
13) generazione dei nomi puliti delle animazioni 
14) no random on bullets 	:504 (config variable $norandomize['demonbull'])
15) generazione nomi puliti di demonbull & demonfx in dir animjs
	:466  	nuova config var generatejsfile[$atype]
16) motion attributes (see opera js lib)


??) ADVANCED gestione dei multi tipi asset_A_... asset_B_... 
	nella dir di asset, in presenza di più tipi diversi, occorre decidere quali tipi di asset mettere insieme, genericamente. 
	P: ogni pagina resetta tutte le filiere di generazione random in modo deterministico e sceglie: 
		*** UN TIPO di asset  (associato a ) UNA STRUTTURA di LAYER (associata a ) UNA struttura di NAMING e le sue PARTI ***

	> generare un nuovo tipo di json in "template" da  *** https://jsoneditoronline.org/ ***
	> :401 verificare la funzione kind_elem(
	 	- mixed assets asset_AB_ should be able to match

- mersenne shuffle & other random entities - external mersenne rnd value generation (beyond shuffle) => random asset type, 	
	INPUT: (seed -> $master_seed; page number; element n of total page elements ) => 	gestione di più strutture diverse come array nel JSON
		usare un array seeds per le varie inizializzazioni secondarie ? 
		generazioni successive possono essere accodate limitando effetti collaterali all'introduzione di nuovi elementi


### JSON REFERENCE

```
"structs" contiene la descrizione della struttura dei tipi e sottotipi di layer per una determinata "scene": 
	layers: 		quali layer compaiono in quella struttura ed in che ordine
	name_struct:  	struttura di naming per quella struct/scene 
	subtypes: 		sottotipi di asset ammessi (per quel layer ?)
				NOTA: 	specificandolo a questo livello (child di struct) i sottotipi valgono per tutti i layer.
						sarebbe eventualmente possibile specificare quali sottotipi valgono per un layer specifico in "layers" (sopra)
```

```
{
  "data": "template",
  "width": 230,
  "height": 400,
  "original_width": 230,
  "font_size": "20px",
  "layers": {
    "BO": "100",
    "LB": "100",
    "LW": "100",
    "RW": "100",
    "HE": "100"
  },
  "names": {
    "BO":   ["","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""],
    "HE":   ["","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""],
    "LB":   ["","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""]
  },
  "name_struct": {
    "HE": "",
    "BO": "",
    "LB": ""
  },
  "structs": {
    "a": {
      "layers": {
        "BO": "100",
        "LB": "100",
        "LW": "100",
        "RW": "100",
        "HE": "100"
      },
      "name_struct": {
        "HE": "",
        "BO": "",
        "LB": ""
      },
      "subtypes": ["A", "B"]
    },
    "b": {
      "layers": {
        "BO": "100",
        "LB": "100",
        "LW": "100",
        "RW": "100",
        "HE": "100"
      },
      "name_struct": {
        "HE": "",
        "BO": "",
        "LB": ""
      },
      "subtypes": ["A", "B"]
    }

  }

  
}
```

## Other info

Shows the types of generators in the $contents array. Each value must have a directory that contains the files for the various layers.
For each generator the $results_x_page controls how many images to show.
```
$contents 	= array('uchida', 'template', 'pacman', 'baldazzini', 'jaime', 'magnus', 'paz', 'sfcover', 'kamon', 'chow', 'cards', 'spelunky');
$results_x_page = array('uchida' => 1, 'template' => 3, 'pacman' => 1, 'baldazzini' => 1, 'jaime' => 1, 'magnus' => 1, 'paz' => 1, 'sfcover' => 1, 'kamon' => 1, 'chow' => 1, 'cards' => 1, 'spelunky' => 1,);	
```

- assets   
```
/home/masayume/DATA/E/Temp/demon/mersenne/uchida/
```
-/ reference paintings 
```
/home/masayume/DATA/E/INSPIRE/@masayasu_uchida/
```

- directory configuration: 

## <directory>.json: 
```
/home/masayume/DATA/E/Temp/demon/mersenne/uchida/uchida.json
```
### contains which layers are defined for that directory
```
  "layers": {
    "VB": "100",
    "LB": "100",
    "BO": "100",
    "LW": "100",
    "RW": "100",
    "HE": "100"
```
### structs
Structs describes the types of images that can be built
Each image is build from a set of layers that are created for precise overlap.
subtypes ??
```
  "structs": {
    "a": {
      "layers": {
        "VB": "100",
        "LB": "100",
        "BO": "100",
        "LW": "100",
        "RW": "100",
        "HE": "100"
      },
      "name_struct": {
        "HE": "",
        "BO": "",
        "LB": ""
      },
      "subtypes": ["A", "B"]
    },
```

## <directory>4js.json: 

### name control for images
```
        "003": {
            "type": "body",
            "img": "uchida_A_BO_1_003.png",
            "partname": "ol",
            "effect": "energy:K"
        },
```

- file css for the layout
```
/var/www/html/mersenne/overcss.css
```


