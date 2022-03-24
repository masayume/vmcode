#!/bin/bash

for i in *.png; do
    [ -f "$i" ] || break
    echo "desaturate and flip horizontal a list of images " $i
    filename="${i%.*}"
    modfilename=${filename//_A_/_S_}

    ## actual command to convert file
    convert $i \
        -define morphology:compose=Lighten \
        -morphology Convolve 'Roberts:@' \
        -negate \
        -alpha on \
    $modfilename.png

## Options
#        -define morphology:compose=Lighten \
#        -define morphology:compose=None \

#        -gaussian-blur 1x1 \


done


