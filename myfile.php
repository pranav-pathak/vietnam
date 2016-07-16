<?php

$myfile = fopen("newfile1.txt", "w+") or die("Unable to open file!");

$myfile = fopen("leadgen.txt", "r") or die("Unable to open file!");
echo $leadgen_id =  fread($myfile,filesize("leadgen.txt"));
fclose($myfile);

use FacebookAds\Api;

$app_id ='638113826341564';
$app_secret='8f5d4971c70fe677c9c9b2c44e74aa9b'; 
$access_token='638113826341564|JwPbpCKEGQpo4Mt8t47LlbpihzA';
// Initialize a new Session and instanciate an Api object
Api::init($app_id, $app_secret, $access_token);

// The Api object is now available trough singleton
$api = Api::instance();

echo"api";
print_r($api);
echo "<br/>";

use FacebookAds\Object\Lead;

$form = new Lead($leadgen_id);
$form->read();


// use FacebookAds\Api;

// $accounts = Api::instance()->call('/me/accounts');

?>
