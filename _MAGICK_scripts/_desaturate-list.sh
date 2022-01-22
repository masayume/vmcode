#!/bin/bash

for i in *.png; do
    [ -f "$i" ] || break
    echo "desaturate and flip horizontal a list of images " $i
    filename="${i%.*}"
    modfilename=${filename//_A_/_D_}

    ## actual command to convert file
    # convert $i -interpolate Nearest -filter point -resize 400% $filename.gif
    convert $i -set colorspace Gray -separate -flop -average -alpha on $modfilename.png

done


