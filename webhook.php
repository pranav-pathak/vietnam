<?php

  $myfile = fopen("log.txt", "w+") or die("Unable to open file!");
  $name = time();
 fwrite($myfile, '\n recive -'.time());
 $challenge = $_REQUEST['hub_challenge'];
 $verify_token = $_REQUEST['hub_verify_token'];
 if ($verify_token == 'abc123') {echo $challenge;}
  $input = json_decode(file_get_contents('php://input'), true);
  error_log(print_r('\nerror data log:'.$input, true)); 
  $leadgen_id = $input['entry'][0]['changes'][0]['value']['leadgen_id'] ;

  fwrite($myfile,'\n lead_id:'. $leadgen_id);
  
  
$app_id ='638113826341564';
$app_secret='8f5d4971c70fe677c9c9b2c44e74aa9b'; 
// $access_token='638113826341564|JwPbpCKEGQpo4Mt8t47LlbpihzA';
$access_token ='EAAJEXHPyArwBAC04RjQrBxeJJj3GJi0kRZBYX1RS2lBNcVwg5yTxHUxTFlPB8LHeAHV6Tk5zVqGPD1hVyiNQWG87ntIboY8IFWxWZBBklyr0VEhXmgjwiOjCaOoTjl4msLtw12pFgmoaAZA4VMHsrJTolISd9oZD';
  
$data = getLead($leadgen_id, $access_token);
fwrite($myfile,'\n lead_data : '. print_r($data, true));
  fclose($myfile);  


function getLead($leadgen_id,$user_access_token) {
    //fetch lead info from FB API
    $graph_url= 'https://graph.facebook.com/v2.5/'.$leadgen_id."?access_token=".$user_access_token;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $graph_url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $output = curl_exec($ch); 
    curl_close($ch);

    // //work with the lead data
    // $leaddata = json_decode($output);
    // $lead = [];
    // for($i=0;$i<count($leaddata->field_data);$i++) {
        // $lead[$leaddata->field_data[$i]->name]=$leaddata->field_data[$i]->values[0];
    // }
    return $output;
} 

 ?>