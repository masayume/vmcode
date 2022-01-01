#!/bin/bash

## resize canvas of all .png images to 512x512 with transparent background

canvasResize=512
canvasResizeCmd="${canvasResize}x${canvasResize}"

for i in *.png; do
    [ -f "$i" ] || break
    echo "resizing canvas to 512 " $i
    filename="${i%.*}"
    filenameOut="${filename}-512.png" 

    ## actual command to convert file
    convert $i -background transparent -gravity center -extent $canvasResizeCmd $filenameOut
done

## to rename to the original files use in sublime:

# ls mabius_* | awk '{print "mv " $1 " " $1} '
