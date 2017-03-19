<?php 

$THEME = [];
$OPT = $this->options;

if (empty($OPT['logo'])){
  $THEME['logo'] = 'templates/' . $this->name . '/images/logo.png';
} else {
  $THEME['logo'] = $config->upload_root . $OPT['logo']['original'];
}

if (empty($OPT['logo_menu'])){
  $THEME['logo_menu'] = 'templates/' . $this->name . '/images/logo_menu.png';
} else {
  $THEME['logo_menu'] = $config->upload_root . $OPT['logo_menu']['original'];
}

if (empty($OPT['favicon'])){
  $THEME['favicon'] = 'templates/' . $this->name . '/images/favicon.png';
} else {
  $THEME['favicon'] = $config->upload_root . $OPT['favicon']['original'];
}