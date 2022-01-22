#!/bin/bash

### trims the first horizontal line from a bundle of pix
### and saves the results in the "chopped" directory

for i in *.png; do
    [ -f "$i" ] || break
    echo "trimming 1st line " $i
    filename="${i%.*}"

    convert $i -chop 0x1 chopped/${i}

done