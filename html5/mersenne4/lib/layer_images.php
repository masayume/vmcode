<?php

function layer_images($type) {

  $layer_type = array( 
    'BKO' => '/demon/mersenne/mabius/mabius_O_BKO_1_001.png', 
    'BKM' => '/demon/mersenne/mabius/mabius_O_BKM_1_002.png', 
    'VB'  => '/demon/mersenne/mabius/mabius_O_VB_1_017.png', 
    'LW'  => '/demon/mersenne/mabius/mabius_O_LW_1_0251.png', 
    'HE'  => '/demon/mersenne/mabius/mabius_O_HE_1_0042.png',
    'BO'  => '/demon/mersenne/mabius/mabius_O_BO_1_0271.png',
    'LB'  => '/demon/mersenne/mabius/mabius_O_LB_1_0393.png',
    'RW'  => '/demon/mersenne/mabius/mabius_O_RW_1_034.png'
  );

  return $layer_type[$type];
}
