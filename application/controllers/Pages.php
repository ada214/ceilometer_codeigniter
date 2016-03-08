<?php
require_once('utility.php');
require_once('conf.php');

class Pages extends CI_Controller{

    public function index(){
#        echo "This is index page in Pages view ";
#        $this->view();
        $data['title'] = "ceilometer based apis";
 #       $this->load->view('templates/header', $data);



        $this->load->view('pages/home');

    

#       $this->load->view('templates/footer', $data);
#        $this->alarmlist();

#        $this->meterlist();
#        $this->createalarm();
#        $this->login();
    }

    public function view($page = 'home'){
        
#        echo "Base url".base_url();
#        echo "In the pages controller";
        $response = getvmlist();

    $this->load->library('table');

    $vm_name=array();
    $zone = array();
    $ipaddress= array();
    $status = array();
    $region = array();

    for($i=0;$i<count($response);$i++){

     array_push($vm_name,$response['items'][$i]['item']['parm']['name']);
     array_push($zone,$response['items'][$i]['item']['availabilityZone']);
     array_push($ipaddress,$response['items'][$i]['item']['parm']['addresses']['demo'][0]['addr']);
     array_push($status,$response['items'][$i]['item']['parm']['status']);
     array_push($region,$response['items'][$i]['item']['region']);

     }
    $data['vm_name']=$vm_name;
    $data['zone']=$zone;
    $data['ipaddress']=$ipaddress;
    $data['status']=$status;
    $data['region']=$region;

        
        if(!file_exists(APPPATH.'/views/pages/'.$page.'.php')){

            show_404();
        }


        $this->load->view('templates/header', $data);
#        $this->load->view('pages/'.$page, $data);
        $this->load->view('pages/vmlist',$data);
        $this->load->view('templates/footer', $data);
    
    }

    public function alarmlist(){

    
    $response = getalarmlist();
#    print_r($response);


 #   var_dump($response);

    $alarm_name = array();
    $alarm_desc = array ();
    $alarm_id = array();
    $alarm_state = array();
    $alarm_meter_name = array();

    for($i=0;$i<count($response);$i++){
     array_push($alarm_name,$response[$i]['name'] );
     array_push($alarm_desc,$response[$i]['description']);
     array_push($alarm_id,$response[$i]['alarm_id']);         
     array_push($alarm_state,$response[$i]['state']);
     array_push($alarm_meter_name,$response[$i]['threshold_rule']['meter_name']);
    }

    $data['alarm_name'] = $alarm_name;
    $data['alarm_desc'] = $alarm_desc;
    $data['alarm_id'] = $alarm_id;
    $data['alarm_state'] = $alarm_state;
    $data['alarm_meter_name']=$alarm_meter_name;



   # print_r($alarm_desc);

    $this->load->view('templates/header', $data);

    $this->load->view('pages/alarmlist_view',$data);
    $this->load->view('templates/footer', $data);

   
#    print_r($response);
    


    }
    public function meterlist(){

    $response = getmeterlist();
    
#    var_dump($response);

    $meter_list = array();
    $resource_list = array();
    $name = array();
    $type = array();
    $unit = array();

    for($i=0;$i<count($response);$i++){
        array_push($meter_list,$response[$i]['name']  );
        array_push($resource_list,$response[$i]['resource_id']);
        array_push($name,$response[$i]['name']);
        array_push($type,$response[$i]['type']);
        array_push($unit,$response[$i]['unit']);
    }
#    echo "Size is ".count($meter_list);
#    echo "Size is".count($resource_list);

    $data['meter_list']=$meter_list;
    $data['resource_list'] = $resource_list;
    $data['name'] = $name;
    $data['type']=$type;
    $data['unit']=$unit;
        
    $data['unique_meter'] = array_unique($meter_list);
    $data['unique_resource'] = array_unique($resource_list);

    $this->load->view('templates/header',$data);
    $this->load->view('pages/meterlist_view',$data);
    $this->load->view('templates/footer',$data);

    return $meter_list;


    }

    public function createalarm(){

   $this->load->helper('form'); 

    $meter_list = array();
    $resource_list = array();
    $response = getmeterlist();

    $meter_list = array();
    for($i=0;$i<count($response);$i++){
        array_push($meter_list,$response[$i]['name']  );

        array_push($resource_list,$response[$i]['resource_id']);
    }    
     

    $data['meterlist']=array_unique($meter_list);
    $data['resourceid'] = array_unique($resource_list);
     $this->load->view('templates/header',$data);
    $this->load->view('pages/alarm_para',$data);
    $this->load->view('templates/footer',$data);

    }


/* This method handles the values retured from form */
    public function saveinput(){
    
    #echo "Inside save input";
    
    if($this->input->post('submit')==true){


      /*  $data['alarmname']=$this->input->post('alarmname');
        $data['description']=$this->input-post('description');
        $data['meter_name']=$this->input->post('meter_name');
        $data['threshold'] = $this->input->post('threshold');

        $data['comparison_operator'] = $this->input->post('comparison_operator');

        $data['statistic'] = $this->input->post('statistic');

        $data['resource_id'] = $this->input->post('resource_id');

*/
        $data['title']="This is title";

        $alarmname=$this->input->post('alarmname');
        $description=$this->input->post('description');
       $meter_name=$this->input->post('meter_name');
        $threshold = $this->input->post('threshold');

        $comparison_operator = $this->input->post('comparison_operator');

        $statistic = $this->input->post('statistic');

        $resource_id = $this->input->post('resource_id');


$try ='{"alarm_actions": ["log:///temp/alarm_log.txt"], "description":"'.$description.'" , "threshold_rule": {"meter_name": "'.$meter_name .'", "evaluation_periods": 3, "period": 600, "statistic": "'.$statistic.'", "threshold":'. $threshold.', "query": [{"field": "resource_id", "type": "", "value": "'.$resource_id.'", "op": "eq"}], "comparison_operator": "'.$comparison_operator .'"}, "repeat_actions": false, "type": "threshold", "name":"'. $alarmname.'"}';

    $response =   createalarm($try);

    $this->load->view('templates/header',$data);
    $this->load->view('pages/success',$data);
    $this->load->view('templates/footer',$data);


/*        if($response){
            Echo "This is tru response";

        }
        else{
                echo "Thjis is calu";           
        }
*/

    }


    }

    public function deletealarm(){

    $this->load->helper('form');

    $response = getalarmlist();

    $alarm_name = array();
    $alarm_id = array();


    for($i=0;$i<count($response);$i++){
     array_push($alarm_name,$response[$i]['name'] );
     array_push($alarm_id,$response[$i]['alarm_id']);         

    } 

#    echo "inside delete alarm function";

    $data['title']="Title is here";

    $data['alarm_name']=$alarm_name;
    $data['alarm_id']=$alarm_id;
    $this->load->view('templates/header',$data);
    $this->load->view('pages/delete_alarm',$data);
    $this->load->view('templates/footer',$data);
    }


/* this script is for dleletion of alarm  */
    public function deletealarm_script(){

#    echo "Inside delete alarm script ";

    if($this->input->post('submit')==true){
        $alarm_id = $this->input->post('alarm_id');
        $data['alarm_id']=$alarm_id;
       
    $response= deletealarm_u($alarm_id);
        $this->index();        
    }

    }

    public function updatealarm(){
    $this->load->helper('form');        
    $response = getalarmlist();

    $alarm_name = array();
    $alarm_id = array();


    for($i=0;$i<count($response);$i++){
     array_push($alarm_name,$response[$i]['name'] );
     array_push($alarm_id,$response[$i]['alarm_id']);         

    } 



    $data['alarm_name']=$alarm_name;
    $data['alarm_id']=$alarm_id;
    $this->load->view('templates/header',$data);
    $this->load->view('pages/updatealarm_view',$data);
    $this->load->view('templates/footer',$data);
    



    }

    public function updatealarm_script(){

        if($this->input->post('submit')==true){

        $alarm_id = $this->input->post('alarm_id');
        $threshold = $this->input->post('threshold');
        $comparision= $this->input->post('comparison_operator');
        $statistic = $this->input->post('statistic');



        $response= updatealarm_u($alarm_id,$threshold,$comparision,$statistic);

        $this->index();        
    }


    }

    public function login(){
            $this->load->helper('html');
            $this->load->helper('form');

        if($this->input->post('submit')==true){
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            echo "This is ".$username." d  ".$password;
            echo "this is voew fr long";

        }
        else{
            $data['title']="This is title";
            $this->load->view('templates/header',$data);
            $this->load->view('pages/simple_login');
            $this->load->view('templates/footer',$data);
        }
    }

}


?>
