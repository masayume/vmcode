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

#                                                     target color      source color
# convert "$filename"                   -channel rgba -alpha set -fill '#ef6f76' -opaque '#9d5e57' "$targetdir/$FILENOEXT.1.png"
# convert "$targetdir/$FILENOEXT.1.png" -channel rgba -alpha set -fill '#f8a6a2' -opaque '#ec9c7d' "$targetdir/$FILENOEXT.2.png"
# convert "$targetdir/$FILENOEXT.2.png" -channel rgba -alpha set -fill '#ffc5c3' -opaque '#ffcea1' "$targetdir/$FILENOEXT.png"
# 
# rm "$targetdir/$FILENOEXT.1.png"
# rm "$targetdir/$FILENOEXT.2.png"

# target 	 source
# #fed5c7	#ffdb94
# #f48799	#ff9560
# #c65566	#d96042
# #84333f	#201118

#                                                                   target color      source color
convert "$filename"                   -channel rgba -alpha set -fill '#84333f' -opaque '#331826' "$targetdir/$FILENOEXT.1.png"
convert "$targetdir/$FILENOEXT.1.png" -channel rgba -alpha set -fill '#c65566' -opaque '#995a62' "$targetdir/$FILENOEXT.2.png"
convert "$targetdir/$FILENOEXT.2.png" -channel rgba -alpha set -fill '#f48799' -opaque '#b47271' "$targetdir/$FILENOEXT.3.png"
convert "$targetdir/$FILENOEXT.3.png" -channel rgba -alpha set -fill '#f5a79f' -opaque '#da948d' "$targetdir/$FILENOEXT.4.png"
convert "$targetdir/$FILENOEXT.4.png" -channel rgba -alpha set -fill '#f9beb3' -opaque '#f9beb3' "$targetdir/$FILENOEXT.png"

rm "$targetdir/$FILENOEXT.1.png"
rm "$targetdir/$FILENOEXT.2.png"
rm "$targetdir/$FILENOEXT.3.png"
rm "$targetdir/$FILENOEXT.4.png"

echo "convert file: $targetdir/$FILENOEXT.png"

exit
