TODO:
    mostrare atype, type e subtype (decodifica del significato di O, D ecc.)
    verificare il contenuto di atype.json
    aggiungere le modifiche direzionali per layer
    importare il descrittore JSON (mabius4js.json, template4js.json)
    salvare l'immagine

versione 0.5


versione 0.4
    implementate le funzioni layer_images($type) in lib/layer_images.php
    aggiunte le icone direzionali per muovere i layer

versione 0.3
    gestione dei parametri della querystring: atype=mabius
    gestione della directory (guest dir: /var/www/html/demon/mersenne/)
    controllo sull'esistenza della directory degli asset
    controllo sull'esistenza del file atype.json
    importare il descrittore JSON (/home/masayume/DATA/E/Temp/demon/mersenne/mabius/mabius.json)
    derivare layer_type in mersenne4.php dal descrittore JSON
    toggleDiv cambia anche l'immagine dell'interruttore

versione 0.2 <- current
    mostrare i nomi dei layer
    mostrare i nomi delle immagini caricate
    anteprima del layer come thumbnail e in originale con click
    toggle layer visibility
    controlli per lo scambio di z-index e implementazione del comportamento
    migrate le funzioni js in js/functions.js

versione 0.1
    implementazione del layout principale della pagina con chatGPT
    uso dei template twig di symfony per i blocchi dei layer + controlli
    implementazione funzionale con separazione in vari file
    predisposizione style.css fino a 15 layer diversi

