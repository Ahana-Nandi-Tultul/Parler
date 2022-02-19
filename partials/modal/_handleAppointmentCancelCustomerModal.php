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
        

        $sql1="SELECT * FROM appoinments WHERE apointment_no='$appoinment_no'";
        $result1=mysqli_query($con, $sql1);
        $row1=mysqli_fetch_assoc($result1);

        $cname= $row1['a_customer_name'];
        $cmail= $row1['a_customer_email'];
        $mgs='Customer: '.$cname.' bearing Email: '.$cmail.' cancel her appointment.';
        $ano=$_SESSION['no'];

        $sql2="INSERT INTO `notification_admin` (`ano`, `smgs`, `cancelingTime`) VALUES ('$ano', '$mgs', current_timestamp());";
        $result2=mysqli_query($con, $sql2);

        $sql="DELETE FROM `appoinments` WHERE apointment_no = '$appoinment_no'";
        mysqli_query($con, $sql);
        
        echo json_encode($mgs);
 }
 ?>