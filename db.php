<?php
function getSampleDataFromDB()
{

//Verify that mysql has been enabled
if (function_exists('mysqli_connect') == false){
    echo "need to enable mysqli!";
    error_log("need to enable mysqli!", 0);
    return;
}


//Connect with connection info from environemnt variables

$json = getenv('VCAP_SERVICES');
$service_name;
if (strpos($json,'cleardb')){
    $service_name='cleardb'; //service is on PWS

}else if (strpos($json,'p-mysql')){
$service_name='p-mysql'; //service is on pivotal MySQL service
}else {
echo "Error determining service name. Check VCAP_SERVICES";
error_log("Error determining service name. Check VCAP_SERVICES");
return;

}

$arr = json_decode($json, true);
$hostname = $arr[$service_name][0]['credentials']['hostname'];
$username = $arr[$service_name][0]['credentials']['username'];
$password = $arr[$service_name][0]['credentials']['password'];
$dbname = $arr[$service_name][0]['credentials']['name'];

//Connect to database

$mysql = mysqli_connect($hostname, $username, $password, $dbname );
if (mysqli_connect_errno()){
  echo "Failed to connect to mysql: ", mysqli_connect_error();
  error_log("Failed to connect to MySQL: " , mysqli_connect_error());
return;
}else {
 echo "Success connecting to the DB!";
}
   

}
?>
