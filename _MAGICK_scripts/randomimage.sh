#!/bin/bash

FILENAME=`find ./ -type f | shuf | tail -1`
FILENAMEQ=$(printf %q "$FILENAME")

# feh `find ./ -type f | shuf | tail -1`

echo "$FILENAME"
feh "$FILENAME"

exit 0


