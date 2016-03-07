<?php
require_once('gettoken.php');
include('conf.php');

$endpoints= array("username"=>"admin",
                    "password"=>"passw0rd",
                    "listofvms" =>"https://icoset1cs1.ad2lab.com:8443/orchestrator/v2/instancetypes/openstackvms/instances/",
                    "alarmlist"=>"http://icoset1cs1.ad2lab.com:8777/v2/alarms",
                    "meterlist"=>"http://icoset1cs1.ad2lab.com:8777/v2/meters",
                    "createalarm"=>"http://icoset1cs1.ad2lab.com:8777/v2/alarms",
                    "deletealarm"=>"http://icoset1cs1.ad2lab.com:8777/v2/alarms/",
                    "updatealarm"=>"http://icoset1cs1.ad2lab.com:8777/v2/alarms/"

                    );


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

#echo " Lisy ".$listOfVmsUrl;

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


function getalarmlist(){
    global $endpoints;
    $token = gettoken();
    
#    echo "The token is    ".$token."\n\n";

    $url = $endpoints['alarmlist'];    
 #   echo "Url is ".$url;
    
    $x_auth = "X-Auth-Token: $token";

  #  echo "Headeri ".$x_auth;

    $headers = array('Accept: application/json',$x_auth);
    
#    $head = Array("Accept"


    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPGET, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
    
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $curl_response = curl_exec($curl);
    
   # echo "curl response : : ";
#    print_r($curl_response);
  #  echo "\n\n";
    $response = json_decode($curl_response,true);

   # print_r($response);
   # echo "Response from server is ";
#    var_dump($response);

    return $response;    



}

function getmeterlist(){
    global $endpoints;
    $url = $endpoints['meterlist'];
    $token = gettoken();

    $x_auth = "X-Auth-Token: $token";

    $headers = array('Accept: application/json',$x_auth);

    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPGET, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $curl_response = curl_exec($curl);

    $response = json_decode($curl_response,true);
#    var_dump($response);

    return $response;

}

function createalarm($json){
    global $endpoints;
    $token = gettoken();
    
#    echo "The token is    ".$token."\n\n";

    $url = $endpoints['alarmlist'];    
    
    $x_auth = "X-Auth-Token: $token";


    $headers = array("Accept: application/json","Content-type: application/json",$x_auth);

#$desc= "thi sis msaple desctiption";
#$name = "The is new name";

#$try ='{"alarm_actions": ["log://"], "description":"'.$desc.'", "threshold_rule": {"meter_name": "cpu_usage_high", "evaluation_periods": 3, "period": 600, "statistic": "avg", "threshold": 40.0, "query": [{"field": "resource_id", "type": "", "value": "500a1594-4972-7968-2914-c333201585bd", "op": "eq"}], "comparison_operator": "gt"}, "repeat_actions": false, "type": "threshold", "name": "'.$name.'"}';



#$tryy ='{"alarm_actions": ["log://"], "description": " Test of CPU usage high", "threshold_rule": {"meter_name": "cpu_usage_high", "evaluation_periods": 3, "period": 600, "statistic": "avg", "threshold": 40.0, "query": [{"field": "resource_id", "type": "", "value": "500a1594-4972-7968-2914-c333201585bd", "op": "eq"}], "comparison_operator": "gt"}, "repeat_actions": false, "type": "threshold", "name": "cpu_high_alarm_ada9009"}';


$curl = curl_init($url);
#curl_setopt($curl, CURLOPT_HEADER, true);
#curl_setopt($curl, CURLOPT_RETURNTRANSFER, false);
curl_setopt($curl, CURLOPT_HTTPHEADER,$headers );
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS,$json);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);


$result     = curl_exec($curl);


return $result;

}

function deletealarm_u($alarm_id){

    global $endpoints;
    $token = gettoken();
    
#    echo "The token is    ".$token."\n\n";

 #   echo "alarm is ".$alarm_id;
    $url = $endpoints['deletealarm'].$alarm_id;
 #   echo "End point is ".$endpoints['deletealarm'];
 #   echo "Url is ".$url;



 #   echo "Url is ".$url;
    
    $x_auth = "X-Auth-Token: $token";

  #  echo "Headeri ".$x_auth;

    $headers = array('Accept: application/json',$x_auth);
    
#    $head = Array("Accept"


    $curl = curl_init($url);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST,"DELETE");
    curl_setopt($curl, CURLOPT_HEADER, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);

    $response = curl_exec($curl);
#var_dump($response);

    return $response;

}

function updatealarm_u($alarm_id,$threshold,$comparison,$statistic){

#function test(){
    
#    $alarm_id="2cc3d700-dbc3-40b8-b53f-d81e0bc4473b";

    global $endpoints;
    $url = $endpoints['updatealarm'];

    $token = gettoken();
    
    $url = $endpoints['updatealarm'].$alarm_id;
    
    $x_auth = "X-Auth-Token: $token";

    $headers = array("Accept: application/json","Content-type: application/json",$x_auth);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPGET, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $curl_response_get = curl_exec($curl);


    
    $response = json_decode($curl_response_get,true);


    $response['threshold_rule']['threshold']= $threshold;
    $response['threshold_rule']['comparison_operator'] = $comparison;
    $response['threshold_rule']['statistic']=$statistic;


    $update_para = json_encode($response);

    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl,CURLOPT_CUSTOMREQUEST,"PUT");
    curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl,CURLOPT_POSTFIELDS,$update_para);
    $curl_response = curl_exec($curl);
   
    
    return $curl_response;


}



#createalarm();

#getalarmlist();
#getvmlist();

#getmeterlist();
 ?>
