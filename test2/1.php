<h2>My Platform</h2>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '638113826341564',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  function subscribeApp(page_id, page_access_token) {
    console.log('Subscribing page to app! ' + page_id);
    FB.api(
      '/' + page_id + '/subscribed_apps',
      'post',
      {access_token: page_access_token},
      function(response) {
      console.log('Successfully subscribed page', response);
    });
  }

  // Only works after `FB.init` is called
  function myFacebookLogin() {
    FB.login(function(response){
      console.log('Successfully logged in', response);
      FB.api('/me/accounts', function(response) {
        console.log('Successfully retrieved pages', response);
        var pages = response.data;
        var ul = document.getElementById('list');
        for (var i = 0, len = pages.length; i < len; i++) {
          var page = pages[i];
          var li = document.createElement('li');
          var a = document.createElement('a');
          a.href = "#";
          a.onclick = subscribeApp.bind(this, page.id, page.access_token);
          a.innerHTML = page.name;
          li.appendChild(a);
          ul.appendChild(li);
        }
      });
    }, {scope: 'manage_pages'});
  }
</script>
<button onclick="myFacebookLogin()">Login with Facebook</button>
<ul id="list"></ul>

<?php

$ch = curl_init(); 

$url = "https://graph.facebook.com/2.7/429300583784286/leadgen_whitelisted_users";

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_POST,1);

//curl_setopt($ch,CURLOPT_POSTFIELDS, 'user_id=100006093332375');   

        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch);      
        
 



use FacebookAds\Api;


include('vendor/autoload.php');
include('vendor/src/FacebookAds/Api.php');
include('vendor/src/FacebookAds/ApiConfig.php');
include('vendor/src/FacebookAds/ApiRequest.php');
include('vendor/src/FacebookAds/Cursor.php');
include('vendor/src/FacebookAds/Session.php');
include('vendor/src/FacebookAds/TypeChecker.php');

echo "1 \n";

$app_id = '638113826341564';
$app_secret = '8f5d4971c70fe677c9c9b2c44e74aa9b';
$access_token = '638113826341564|JwPbpCKEGQpo4Mt8t47LlbpihzA';

// Initialize a new Session and instanciate an Api object
Api::init($app_id, $app_secret, $access_token);

// The Api object is now available trough singleton
$api = Api::instance();

echo"api -- 2 \n";
// print_r($api);
echo "<br/>"; 

use FacebookAds\Object\LeadgenForm;

$form = new LeadgenForm('1042356555799969');
$form->read();
print_r($form);
echo"api -- 2.5 \n";

// use FacebookAds\Object\Lead;

// $form = new Lead('1045432815492343');
// $form->read();

// echo"api -- 3\n"; 
// print_r($form);

// $request = new FacebookRequest(
  // $session,
  // 'GET',
  // '/638113826341564/1045432815492343'
// );
// $response = $request->execute();
// $graphObject = $response->getGraphObject();

// echo "$graphObject";
// print_r($graphObject);

?>
