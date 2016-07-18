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

  fwrite($myfile,'\n lead_id: '$leadgen_id);
$data = getLead($leadgen_id,'EAAJEXHPyArwBADzR1CGAsG44RBGVNPESFg2t90ZBOuJzQCgSn6YY1i3Q8H4MCZA8Ie8FJwkTQo0jb9h1F7ICoGzhk332JTl9cfjGQyOE35UIr7rDN12lwrdhPrrhwZCZAdBBxucFMlrf8TZApqSgHXAQoGhrAS08ZBnmZA4sKbXFwZDZD');
fwrite($myfile,'\n lead_data : '$data);
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

    //work with the lead data
    $leaddata = json_decode($output);
    $lead = [];
    for($i=0;$i<count($leaddata->field_data);$i++) {
        $lead[$leaddata->field_data[$i]->name]=$leaddata->field_data[$i]->values[0];
    }
    return $lead;
} 

 ?>