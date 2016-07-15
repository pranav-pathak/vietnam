<?php

$myfile = fopen("newfile1.txt", "w+") or die("Unable to open file!");

// $myfile = fopen("leadgen.txt", "r") or die("Unable to open file!");
// echo $leadgen_id =  fread($myfile,filesize("leadgen.txt"));
// fclose($myfile);

echo $leadgen_id = 1043685219000436;

require_once __DIR__ . '/Facebook/autoload.php';
// include("/Facebook/autoload.php");
/* PHP SDK v5.0.0 */
/* make the API call */
$request = new FacebookRequest(
  $session,
  'GET',
  '/638113826341564/'.$leadgen_id
);
$response = $request->execute();
$graphObject = $response->getGraphObject();
/* handle the result */
print_r($graphObject);

// $txt1 = $graphObject;

 // $handle = fopen($myfile1, "a")
  // //fwrite($myfile, $txt);
  // fwrite($handle,$txt1);
  // fclose($myfile);
  
?>