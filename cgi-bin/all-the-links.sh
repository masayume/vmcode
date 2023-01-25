#!/bin/bash

# xmllint: sudo apt-get install libxml2-utils
#
#

URL='https://askubuntu.com/questions/1382254/i-need-to-install-xmllint-but-dont-know-how-to'

curl -sS "$URL" | xmllint --html --xpath '//a[starts-with(@href, "http")]/@href' 2>/dev/null - | sed 's/^ href="\|"$//g' | sort | uniq


