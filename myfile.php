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
  'default_graph_version' => 'v2.7',
]);

print_r($fb);

// $fbApp = new Facebook\FacebookApp('638113826341564', $leadgen_id);
// $request = new Facebook\FacebookRequest($fbApp, 'abc123', 'GET', $leadgen_id);

// $fb = new Facebook\Facebook(/* . . . */);
$request = $fb->request('GET', $leadgen_id);
// Send the request to Graph
try {
  $response = $fb->getClient()->sendRequest($request);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();

print_r($response);
echo 'User name: ' . $graphNode['name'];


// include("/Facebook/autoload.php");
/* PHP SDK v5.0.0 */
/* make the API call */
// $request = new FacebookRequest(
  // $session,
  // 'GET',
  // '/638113826341564/'.$leadgen_id
// );
// echo"request";
// print_r($request);
// $response = $request->execute();

// echo "respose";
// print_r($response);
// $graphObject = $response->getGraphObject();
// /* handle the result */
// print_r($graphObject);

// echo "PPPPPPPPP!!!!";
?>

GET /v2.7/638113826341564/1043743585661266 HTTP/1.1
Host: graph.facebook.com