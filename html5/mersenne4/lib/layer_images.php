<?php

// $atype   = 'mabius'
// $type    = 'BKO'
// $subtype = 'D'

function find_layer_images($atype, $subtype, $type, $workdir) { 
  
  // Find all files in the directory that contain the substring in their name
  // NAME: /demon/mersenne/mabius/ mabius . _  .    D     . _  .  BKO  .  * 

  $files = glob($workdir . '/' . $atype . '_' . $subtype . '_' . $type . '*');

  if (empty($files)) {
    print "workdir: " . $workdir . "<br><pre>"; print_r($files);
    print "Couldn't retrieve any image from: " . $workdir . '/' . $atype . '_' . $subtype . '_' . $type . '*';
    exit(1);
  }

  // Select a random file from the list
  $rndFile = $files[array_rand($files)];

  // $randomfile = preg_replace('/\/var\//', '', $randomfile);  
  $rndFile = str_replace('/var/www/html', '', $rndFile);
  
  // return $layer_type[$type];
  return $rndFile;

}
