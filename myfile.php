<?php

include(/Facebook/autoload.php);
$myfile = fopen("newfile1.txt", "w+") or die("Unable to open file!");

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

$txt1 = print_r($graphObject, true);

 $handle = fopen($myfile, "a")
  //fwrite($myfile, $txt);
  fwrite($handle,$txt1);
  fclose($myfile);
  
?>