# mersenne meta generator v1.4 - v1.5

## directories

* /var/www/html/mersenne/ 								          UI 
* /home/masayume/DATA/E/Temp/demon/mersenne/ 				DATA
* /home/masayume/DATA/E/PROJECTS/MERSENNE/ 				  DIR

## URL

* [Uchida](http://localhost:8989/mersenne/mersenne.php?seed=100&page=1&results=1&atype=uchida)
* [Spelunky](http://localhost:8989/mersenne/mersenne.php?seed=100&page=1&results=1&atype=spelunky)
* [Uchida Pixel Art](http://localhost:8989/mersenne/mersenne.php?seed=100&page=1&results=1&atype=uchidapixel)

## Data Dir
* /home/masayume/DATA/E/Temp/demon/mersenne/uchida/ 		Uchida
* /home/masayume/DATA/E/Temp/demon/mersenne/spelunky/ 	Spelunky

## Data File
* /home/masayume/DATA/E/Temp/demon/mersenne/spelunky/spelunky.json

## UCHIDA parts
- VB: 30 	-> 87
- LB: 5 	-> 27
- BO: 8 	-> 23
- LW: 1  	->  1
- RW: 1 	->  1
- HE: 7 	-> 45

## files

- main program. versioned on github. 
```
 /var/www/html/mersenne/mersenne.php -> /home/masayume/git/vmcode/mersenne-03.php
```

- mersenne main configuration:
```
/var/www/html/mersenne/mersenne-03-config.php   
```

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


