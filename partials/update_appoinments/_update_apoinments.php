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
        

        $appoinment_no=$json_data[0]["appoinment_no"];
        $date=$json_data[0]["date"];
        $time=$json_data[0]["time"];
        $status=$json_data[0]["status"];
        $privious_time=$json_data[0]["privious_time"];
        $privious_date=$json_data[0]["privious_date"];
        

        $sql='UPDATE appoinments SET a_customer_pre_time = "'.$time.'",
        a_customer_pre_date="'.$date.'",
        a_service_status="'.$status.'" WHERE apointment_no = '.$appoinment_no.';';
        mysqli_query($con, $sql);  

        if(($privious_time!="0") || ($privious_date!="0")){
              //  $cno="o";
               $sql1="SELECT * FROM appoinments where apointment_no=".$appoinment_no."";
               $result1=mysqli_query($con, $sql1);
               $row1=mysqli_fetch_assoc($result1);
               $cno=$row1['cno'];
               if($privious_date!="0"){
                      $mgs1="Your appointment date has been change from ".$privious_date." to ".$date."";
                      $sql2="INSERT INTO `notification_customers` (`cno`, `smgs`, `timeStamp`) VALUES ('$cno', '$mgs1', current_timestamp())";
                      $result2=mysqli_query($con, $sql2);
               }
               if($privious_time!="0"){
                     $mgs2="Your appointment time has been change from ".$privious_time." to ".$time."";
                     $sql3="INSERT INTO `notification_customers` (`cno`, `smgs`,`timeStamp`) VALUES ('$cno', '$mgs2',current_timestamp())";
                     $result3=mysqli_query($con, $sql3);
              }
        }
        
        echo json_encode($json_data);
 }
 ?>