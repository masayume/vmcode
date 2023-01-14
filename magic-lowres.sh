#!/bin/sh

# check hostname nmcorradi204859

HOSTNAME=`hostname`

if [ "$HOSTNAME" = "nmcorradi204859" ]; then
    printf '%s\n' "on the right host"
else
    printf '%s\n' "Sorry, script must be run on nmcorradi204859"
    exit 1
fi

echo "Download higher resolution cards from the following links."
echo "CTRL+w to close tab"
echo "target directory to save: /home/masayume/DATA/C/pics/cards-new-faster/"
echo "use script 0-2full.sh to change file extension from .jpg to .full.jpg"

ls -lrS ~/DATA/C/pics/cards/ | head -2500 | cut -c 53- | sed 's/.full.jpg$//' | sed 's/\s/%20/g' | awk '{print "<br><div style=\"height: 0px; \"><a href=https://magiccards.info/query?q=" $1 "&v=cards&s=cname target=_blank ><h3>" $1 "</h3></a></div>"}' > /home/masayume/DATA/C/pics/cards-new-faster/0-magic2download.htm

dolphin /home/masayume/DATA/C/pics/cards-new-faster/


