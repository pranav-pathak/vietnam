<?php

namespace FacebookAdsTest;

use FacebookAds\Api;
use FacebookAds\Http\Adapter\CurlAdapter;
use FacebookAds\Http\Client;
use FacebookAds\Http\Exception\RequestException;
use FacebookAds\Logger\CurlLogger;
use FacebookAds\Logger\LoggerInterface;
use FacebookAds\Logger\NullLogger;
use FacebookAds\Session;
use FacebookAdsTest\Exception\PHPUnitRequestExceptionWrapper;


$app_id = '638113826341564';
$app_secret = '8f5d4971c70fe677c9c9b2c44e74aa9b';
$access_token = '638113826341564|JwPbpCKEGQpo4Mt8t47LlbpihzA';

Api::init($app_id, $app_secret, $access_token);

use FacebookAds\Object\AdAccount;

$account = new AdAccount($account_id);
$account->read();