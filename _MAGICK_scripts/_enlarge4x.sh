#!/bin/bash
# convert $1.png -scale 705x1000 $1.2x.png

for i in *.png; do
    [ -f "$i" ] || break
    echo "enlarging 400% " $i
    filename="${i%.*}"

    ## actual command to convert file
    convert $i -interpolate Nearest -filter point -resize 400% $filename.gif

done

# convert $1.png -interpolate Nearest -filter point -resize 300% $1.gif

