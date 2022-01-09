#!/bin/bash

### usage: ./pixelate.sh 0.5 original.jpg pixelated.jpg

MAGICK=/usr/bin/convert

AMOUNT=$(echo "1.001 - $1" | bc -l)
INFILE=$2
OUFILE=$3
OUFILE1=$3.tmp

COEFF1=$(echo "100 * $AMOUNT" | bc -l)
COEFF2=$(echo "100 / $AMOUNT" | bc -l)

# $MAGICK -scale $COEFF1% -scale $COEFF2% $INFILE $OUFILE1

$MAGICK +dither -colors 12 -depth 4 $INFILE $OUFILE

# rm $OUFILE1

