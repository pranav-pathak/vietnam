<?php

use FacebookAds\Api;


include('vendor/autoload.php');
include('vendor/src/FacebookAds/Api.php');
include('vendor/src/FacebookAds/ApiConfig.php');
include('vendor/src/FacebookAds/ApiRequest.php');
include('vendor/src/FacebookAds/Cursor.php');
include('vendor/src/FacebookAds/Session.php');
include('vendor/src/FacebookAds/TypeChecker.php');



$app_id = '638113826341564';
$app_secret = '8f5d4971c70fe677c9c9b2c44e74aa9b';
$access_token = '638113826341564|JwPbpCKEGQpo4Mt8t47LlbpihzA';

// Initialize a new Session and instanciate an Api object
Api::init($app_id, $app_secret, $access_token);

// The Api object is now available trough singleton
$api = Api::instance();

// echo"api";
// print_r($api);
// echo "<br/>";

$request = new FacebookRequest(
  $session,
  'GET',
  '/638113826341564/1045432815492343'
);
$response = $request->execute();
$graphObject = $response->getGraphObject();

echo "$graphObject";
print_r($graphObject);

?>