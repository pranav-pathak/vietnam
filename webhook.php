<?php
echo"Hi webhook!";
 $challenge = $_REQUEST['hub_challenge'];
 $verify_token = $_REQUEST['hub_verify_token'];
 if ($verify_token == 'abc123') {echo $challenge;}

 //you can output the below to your error log and tail -f it to see them
 //feed in live, once you see them hit your error log you know your
 //listener works, then you can change the below code to handle the
 //array and grab the leadgen ID for a further GET request of that real-time entry;

  $input = json_decode(file_get_contents('php://input'), true);
  error_log(print_r($input, true));
  $name = mktime();
  $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
  $txt = print_r($input, true);
  fwrite($myfile, $txt);
  fclose($myfile);
 
 
 ?>