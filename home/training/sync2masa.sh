#!/bin/bash

HOST='ftp.masayume.it'
USER='222078@aruba.it'
PASSWD='ee48748d86'

ftp -n -v -p $HOST << EOT
ascii
user $USER $PASSWD
cd www.masayume.it/training 
put index.htm
bye
EOT
