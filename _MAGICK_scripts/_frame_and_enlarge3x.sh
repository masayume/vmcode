#!/bin/bash
# convert $1.png -scale 705x1000 $1.2x.png

for i in *.png; do
    [ -f "$i" ] || break
    echo "enlarging 300% " $i
    filename="${i%.*}"

    ## actual command to convert file

    convert _frame-273x179.png $i -gravity Center -geometry +0+0 -composite ${i}framed.png
    convert ${i}framed.png -interpolate Nearest -filter point -resize 300% framed/$filename.gif

done

# convert $1.png -interpolate Nearest -filter point -resize 300% $1.gif

