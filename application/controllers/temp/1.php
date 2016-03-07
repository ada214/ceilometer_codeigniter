<?php

$endpoints= array("username"=>"admin",
                    "password"=>"passw0rd",
                    "listofvms" =>"https://icoset1cs1.ad2lab.com:8443/orchestrator/v2/instancetypes/openstackvms/instances/");


function getvmlist(){

   $vm_name = array();
   $zone = array();
   $ipaddress = array();
   $status = array();
   $region = array();

 
 global $endpoints;
 $listOfVmsUrl=$endpoints['listofvms'];
 $username = $endpoints['username'];
 $password = $endpoints['password'];



 $curl = curl_init($listOfVmsUrl);


 curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 curl_setopt($curl, CURLOPT_USERPWD, "$username:$password"); //Your credentials goes here
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($curl, CURLOPT_HTTPGET, true);
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //IMP if the url has https and you don't want to verify source certificate
 $curl_response = curl_exec($curl);
 $response = json_decode($curl_response,true);

/*
for($i=0;$i<count($response);$i++){



 #   echo  "\n\n*********************".$response['items'][$i]['item']['parm']['name']."\n";
    array_push($vm_name,$response['items'][$i]['item']['parm']['name']);
 #   echo "\n Zone ".$response['items'][$i]['item']['availabilityZone'];
    array_push($zone,$response['items'][$i]['item']['availabilityZone']);
 #   echo "\n Ip address".$response['items'][$i]['item']['parm']['addresses']['demo'][0]['addr'];
    array_push($ipaddress,$response['items'][$i]['item']['parm']['addresses']['demo'][0]['addr']);
 #   echo "\n Status ".$response['items'][$i]['item']['parm']['status'];
    array_push($status,$response['items'][$i]['item']['parm']['status']);
 #   echo "\n Region ".$response['items'][$i]['item']['region'];
    array_push($region,$response['items'][$i]['item']['region']);


}

 $data['vm_name']=$vm_name;
 $data['zone']=$zone;
 $data['ipaddress']=$ipaddress;
 $data['status']=$status;
 $data['region']=$region;

*/
    
 curl_close($curl);

# var_dump($curl_response);
# var_dump($response);
 return $response;

}
#$res = getvmlist();


function getToken(){


}


 ?>
