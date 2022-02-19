<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');


 include ('../_dbconnection.php');
 session_start();

 if($_SERVER['REQUEST_METHOD']=='POST'){
        $json = file_get_contents('php://input');
        $json_data=json_decode($json,true);
        
        $appoinment_no=$json_data["apointment_no"];
        $sql="DELETE FROM `appoinments` WHERE apointment_no = '$appoinment_no'";
        
        mysqli_query($con, $sql);  
        
        echo json_encode($json_data);
 }
 ?>