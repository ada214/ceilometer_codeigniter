<?php
#require_once('conf.php');

function gettoken(){

$username = "admin";
$password = "passw0rd";

$head= "{'Content-Type': 'application/json','Accept': 'application/json',}";

$url='http://icoset1cs1.ad2lab.com:5000/v3/auth/tokens';

$body= '{"auth": {"identity": { "methods": ["password"],"password": {"user": {"name": "'.$username.'","domain": { "id": "default" },"password":"'.$password.'"}}}}}';



$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, true);


curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_USERPWD, "$username:$password"); 

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json","Accept: application/json "));
curl_setopt($curl, CURLOPT_POST, true);

curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //curl error SSL certificate problem, verify that the CA cert is OK


$result     = curl_exec($curl);


$header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
$header = substr($result, 0, $header_size);
$token = substr($header,39,32);



print_r($token);


curl_close($curl);

return $token;
}

$res = getToken();
?>
