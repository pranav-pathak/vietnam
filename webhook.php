<?php

/*
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
$data = getLead($leadgen_id,'EAAJEXHPyArwBADzR1CGAsG44RBGVNPESFg2t90ZBOuJzQCgSn6YY1i3Q8H4MCZA8Ie8FJwkTQo0jb9h1F7ICoGzhk332JTl9cfjGQyOE35UIr7rDN12lwrdhPrrhwZCZAdBBxucFMlrf8TZApqSgHXAQoGhrAS08ZBnmZA4sKbXFwZDZD');
fwrite($myfile,'\n lead_data : '. print_r($data, true));
  fclose($myfile);  
*/

$lead_str = '[{"full_name": "<test lead: dummy data for full_name>",	"email": "test@fb.com",	"street_address": "<test lead: dummy data for street_address>",	"city": "<test lead: dummy data for city>",	"phone_number": "<test lead: dummy data for phone_number>"}]';
$json_arr = json_decode($lead_str);
//print_r($json_obj[0]);
$json_obj = json_encode($json_arr[0]);


//$ch = curl_init('http://global.enfa.local/wh_post.php');
$ch = curl_init('http://vietnam.test4.meadjohnson.net/webhook/facebook_lead_ads');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_obj);  
curl_setopt($ch, CURLOPT_HEADER, 0);                                                                
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($json_obj))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
print $result;

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