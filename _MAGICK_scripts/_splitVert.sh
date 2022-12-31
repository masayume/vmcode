#!/bin/bash

    echo "use $0 filename(string) scale percent(integer) \n"

    echo "scaling $2% file $1 "  
    DIR="$(dirname "${1}")"  
    FILE="$(basename "${1}")".scaled
    FILE2DEL="$(basename "${1}")".2delete

#    echo $DIR  
#    echo $FILE  
    fileconv="${DIR}/${FILE}"
    file2del="${DIR}/${FILE2DEL}"
    fileorig=$1
    echo $fileconv

    # filename="${i%.*}"

    ## actual command to convert file
    convert $1 -interpolate Nearest -filter point -resize $2% $fileconv

    mv $1 $file2del
    mv $fileconv $fileorig

    echo "remember to delete files with .2delete extension"
    echo