#!/bin/bash 


### swap two colors in the image specified
###
### cfr. https://legacy.imagemagick.org/Usage/color_basics/#replace

filename=$1
targetdir='converted'

echo "convert $1 colors."

if [ ! -f "$1" ]; then
   echo "$1 does not exists."
   echo
   exit
fi

FILENOEXT=`basename "${1%.*}"`

# convert img/dummy.png -alpha off -level-colors '#9d535f', '#ef6f76' -alpha on -format png img/dummyNEW.png
# convert $1 xc:"#ff0000" -fill '#ef6f76' -opaque '#9d535f' "$targetdir/$FILENOEXT.png"
# convert $1 -alpha off  -fill '#9d535f' -opaque '#ef6f76' -alpha on -format png "$targetdir/$FILENOEXT.png"

#                                                     target color      source color
convert "$filename"                   -channel rgba -alpha set -fill '#ef6f76' -opaque '#9d5e57' "$targetdir/$FILENOEXT.1.png"
convert "$targetdir/$FILENOEXT.1.png" -channel rgba -alpha set -fill '#f8a6a2' -opaque '#ec9c7d' "$targetdir/$FILENOEXT.2.png"
convert "$targetdir/$FILENOEXT.2.png" -channel rgba -alpha set -fill '#ffc5c3' -opaque '#ffcea1' "$targetdir/$FILENOEXT.png"

rm "$targetdir/$FILENOEXT.1.png"
rm "$targetdir/$FILENOEXT.2.png"

echo "convert file: $targetdir/$FILENOEXT.png"

exit
