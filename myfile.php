<?php

$myfile = fopen("newfile1.txt", "w+") or die("Unable to open file!");

$myfile = fopen("leadgen.txt", "r") or die("Unable to open file!");
echo $leadgen_id =  fread($myfile,filesize("leadgen.txt"));
fclose($myfile);

// echo $leadgen_id = 1043685219000436;


// echo "facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php";

// require_once __DIR__ . '/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';

require_once __DIR__ . '/Facebook/autoload.php';
 
echo"required!";

$fb = new Facebook\Facebook([
  'app_id' => '638113826341564',
  'app_secret' => 'abc123',
  'default_graph_version' => 'v2.5',
]);


// include("/Facebook/autoload.php");
/* PHP SDK v5.0.0 */
/* make the API call */
$request = new FacebookRequest(
  $session,
  'GET',
  '/638113826341564/'.$leadgen_id
);
echo"request";
print_r($request);
$response = $request->execute();

echo "respose";
print_r($response);
$graphObject = $response->getGraphObject();
/* handle the result */
print_r($graphObject);

echo "PPPPPPPPP!!!!";
?>