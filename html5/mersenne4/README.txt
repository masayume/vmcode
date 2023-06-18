code index.php lib/mersenne4.php js/functions.js css/style.css templates/layer.twig README.txt lib/template_functions.php lib/layer_images.php config.php

TODO:
    mostrare atype, type e subtype (decodifica del significato di O, D ecc.)
    verificare il contenuto di atype.json
    importare il descrittore JSON (mabius4js.json, template4js.json)
    salvare l'immagine
    link delle altre directory (uchida)
    lista delle altre directory
    miglioramento del funzionamento di zoom out e zoom in
    Mostrare errori chiari quando l'array images è vuoto

versione 0.6
    -

versione 0.5
    aggiunte le modifiche direzionali per layer; funzionanti
    aggiunte le icone edit, opacityUp, opacityDown; funzionanti
    gestione delle struct implicita (se non specificata usare il default jstruct = lower(subtype))
    verifica con altre directory (uchida, uchidapixel ecc.)
    textarea per eventi e popolata da eventi (click su icona edit: comando per invocare aseprite sul file del layer scelto)
    
versione 0.4
    implementate le funzioni layer_images($type) in lib/layer_images.php
    aggiunte le icone direzionali per muovere i layer

versione 0.3
    gestione dei parametri della querystring: atype=mabius
    gestione della directory (guest dir: /var/www/html/demon/mersenne/)
    controllo sull'esistenza della directory degli asset
    controllo sull'esistenza del file atype.json
    importato il descrittore JSON (/home/masayume/DATA/E/Temp/demon/mersenne/mabius/mabius.json)
    derivare layer_type in mersenne4.php dal descrittore JSON
    toggleDiv cambia anche l'immagine dell'interruttore

versione 0.2 <- current
    mostrati i nomi dei layer
    mostrati i nomi delle immagini caricate
    anteprima del layer come thumbnail e in originale con click
    toggle layer visibility
    controlli per lo scambio di z-index e implementazione del comportamento
    migrate le funzioni js in js/functions.js

versione 0.1
    implementato del layout principale della pagina con chatGPT
    uso dei template twig di symfony per i blocchi dei layer + controlli
    implementazione funzionale con separazione in vari file
    predisposto style.css fino a 15 layer diversi

