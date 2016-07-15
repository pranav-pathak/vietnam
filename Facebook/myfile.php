<?php

$myfile = fopen("newfile1.txt", "w+") or die("Unable to open file!");

$myfile = fopen("leadgen.txt", "r") or die("Unable to open file!");
echo $leadgen_id =  fread($myfile,filesize("leadgen.txt"));
fclose($myfile);

$fb = new Facebook\Facebook([
  'app_id' => '638113826341564',
  'app_secret' => '8f5d4971c70fe677c9c9b2c44e74aa9b',
  'default_graph_version' => 'v2.5',
]);
$response = $fb->get('/me');

use FacebookAds\Object\Lead;

$form = new Lead($leadgen_id);
$form->read();


// use FacebookAds\Api;

// $accounts = Api::instance()->call('/me/accounts');

?>
