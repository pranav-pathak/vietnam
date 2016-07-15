<?php

  $myfile = fopen("newfile.txt", "w+") or die("Unable to open file!");
  $name = time();
 fwrite($myfile, '\n recive -'.time());
 $challenge = $_REQUEST['hub_challenge'];
 $verify_token = $_REQUEST['hub_verify_token'];
 if ($verify_token == 'abc123') {echo $challenge;}

 //you can output the below to your error log and tail -f it to see them
 //feed in live, once you see them hit your error log you know your
 //listener works, then you can change the below code to handle the
 //array and grab the leadgen ID for a further GET request of that real-time entry;

  $input = json_decode(file_get_contents('php://input'), true);
  error_log(print_r($input, true));
  
 
  $txt = print_r($input, true);
  $handle = fopen($myfile, "a")
  //fwrite($myfile, $txt);
  fwrite($handle,$txt);
  fclose($myfile);
  $leadgen_id = $input['entry'][0]['changes'][0]['value']['leadgen_id'] ;
  $handle = fopen("leadgen.txt", "w+");
  fwrite($handle,$leadgen_id);
  fclose($myfile);  

  
// header("Location:http://vietnam.test4.meadjohnson.net/fb_lead_ads?leadgen_id={$leadgen_id}"); 


// // include(/Facebook/autoload.php);


// /* PHP SDK v5.0.0 */
// /* make the API call */
// $request = new FacebookRequest(
  // $session,
  // 'GET',
  // '/638113826341564/'.$leadgen_id
// );
// $response = $request->execute();
// $graphObject = $response->getGraphObject();
// /* handle the result */

// $txt1 = print_r($graphObject, true);

 // $handle = fopen($myfile, "a")
  // //fwrite($myfile, $txt);
  // fwrite($handle,$txt1);
  // fclose($myfile);
  

 ?>