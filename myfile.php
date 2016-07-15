<?php

$myfile = fopen("newfile1.txt", "w+") or die("Unable to open file!");

$myfile = fopen("leadgen.txt", "r") or die("Unable to open file!");
echo $leadgen_id =  fread($myfile,filesize("leadgen.txt"));
fclose($myfile);


use FacebookAds\Object\Lead;

$form = new Lead($leadgen_id);
$form->read();


// use FacebookAds\Api;

// $accounts = Api::instance()->call('/me/accounts');

?>
