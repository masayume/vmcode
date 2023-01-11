#!/bin/sh

ls -lrS ~/DATA/C/pics/cards/ | head -2500 | cut -c 53- | sed 's/.full.jpg$//' | sed 's/\s/%20/g' | awk '{print "<br><a href=https://magiccards.info/query?q=" $1 "&v=cards&s=cname target=_blank>" $1 "</a>"}' > /home/masayume/DATA/C/pics/cards-new-faster/0-magic2download.htm

dolphin /home/masayume/DATA/C/pics/cards-new-faster/


