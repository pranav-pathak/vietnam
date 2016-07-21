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
$access_token ='EAAJEXHPyArwBAPlUz0JiQL2da5Fz6roaVT8mtASOTF4Bi14p30kWzEqcVNac2Pa2J5bSJKfyyERHo67PZASD6D4IUxrWeEERLkGgrDsln48V7ZB4gDDsYrXR8hPVtTkoVLcdS19j2sQj1DvIhaB6Xv6bqworsZD';
  
 //for user access token goto https://developers.facebook.com/tools/accesstoken/ and click on user access token for your apropriate app section and then in next page clcik on Extend access token, bottom (https://developers.facebook.com/tools/debug/accesstoken?q=EAAJEXHPyArwBACs0kLDEanSLALLk3jGTPhm497VZC81mR6chMTkZCG2RDWilK0s1RLssZCdz2bPy1xbMmJED87ZCjmxxqcHKUZA5UTbMTZBSm0VVN9YC9teaIypyc8pAThGOsP5XHvAAP0ZCLpj2ZBDxdCZCnSzF4lFrl3lztzr9uUAZDZD)
 
if($input['entry'][0]['changes'][0]['value']['form_id'] == "1042356555799969"){
  $data = getLead($leadgen_id, $access_token);
  fwrite($myfile,'\n lead_data : '. print_r($data, true));

// $lead_str = '[{"full_name": "<test lead: dummy data for full_name>",	"email": "test@fb.com",	"street_address": "<test lead: dummy data for street_address>",	"city": "<test lead: dummy data for city>",	"phone_number": "<test lead: dummy data for phone_number>"}]';
// $json_arr = json_decode($lead_str);
// //print_r($json_obj[0]);
$json_obj = json_encode($data);


//$ch = curl_init('http://global.enfa.local/wh_post.php');
$ch = curl_init('http://vietnam.test4.meadjohnson.net/webhook/facebook_lead_ads?t='.time());                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_obj);  
curl_setopt($ch, CURLOPT_HEADER, 0);                                                                
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($json_obj))                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
fwrite($myfile, print_r($result, true));
fclose($myfile);  
}
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