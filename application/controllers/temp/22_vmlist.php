<?php


$listOfVmsUrl='httpsi://icoset1cs1.ad2lab.com:8443/orchestrator/v2/instancetypes/openstackvms/instances/';
$username = "admin";
$password = "passw0rd";



$curl = curl_init($listOfVmsUrl);


curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_USERPWD, "admin:passw0rd"); //Your credentials goes here
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_HTTPGET, 1);

#curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);


curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //IMP if the url has https and you don't want to verify source certificate

$curl_response = curl_exec($curl);
$response = json_decode($curl_response);

curl_close($curl);

echo "*******************";
echo "$curl_response";
var_dump($response);

?>
