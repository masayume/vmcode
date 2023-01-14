#!/bin/sh

for filename in /home/masayume/DATA/C/pics/cards-new-faster/*.jpg; do
#    echo $filename
    mv -- "$filename" "${filename%.jpg}.full.jpg"
done
