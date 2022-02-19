<?php
 require('dashboard/_dashboard.php');
?>
<?php
$showerror=false;
$showsuccess=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    require('partials/_dbconnection.php');
    $paid_amount=$_POST['paid_amount'];
    $appoinments_no=$_GET['appoinments_no'];
    if($paid_amount!=null){
        $sql="UPDATE `appoinments` SET `paid_amount` = '$paid_amount' WHERE `apointment_no` = '$appoinments_no';";
        $result=mysqli_query($con,$sql);
        $showsuccess=true;
        $showMgs="Payment has complete.";
    }
    else{
        $showerror=true;
        $showMgs="Please provide payment amount.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahana Nandi's Parler Appoinments</title>
    <link href="dashboard/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/index.css">
    <script src="dashboard/font_awesome/js/all.min.js"></script>
    <script src="dashboard/font_awesome/js/kit.js" crossorigin="anonymous"></script>
    <script src="jquery/jquery-3.5.1.js"></script>
    
</head>

<body>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 py-4">
                <?php 
                require('partials/_dbconnection.php');
                if($showerror==true){
                    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error! </strong> '.$showMgs.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';}
                    if($showsuccess==true){
                        echo'<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Success! </strong> '.$showMgs.'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';}

                $appoinments_no=$_GET['appoinments_no'];
                $sql='SELECT * FROM `appoinments` where `apointment_no`='.$appoinments_no.'';
                $result=mysqli_query($con, $sql);
                $row=mysqli_fetch_assoc($result);
                echo'<h4 id="edit_appoinments">Appoinments of '.$row['a_customer_name'].' </h4>

                <div id="'.$appoinments_no.'">
                <p><label for="">Customer Name:</label> <span><strong>'.$row['a_customer_name'].'</strong></span></p>
                <p><label for="">Address:</label> <span><strong>'.$row['a_customer_address'].'</strong></span></p>
                <p><label for="">Phone Number:</label> <span><strong>'.$row['a_customer_phn_no'].'</strong></span></p>
                <p><label for="">Customer\'s Preferable Date:</label> <span><strong>'.$row['a_customer_pre_date'].'</strong></span></p>

                <p><label for="">Customer\'s Preferable Time:</label> <span><strong>'.$row['a_customer_pre_time'].'</strong></span></p>

                <p><label for="">Appointed Service: </label> <span><strong>'.$row['a_customer_services'].'</strong></span></p>
                <p><label for="">Appoinment Status: </label> <span><strong>'.$row['a_service_status'].'</strong></span></p>
                <p><label for="">Paid_amount: </label> <span><strong>'.$row['paid_amount'].'</strong></span></p>
                <form action="_payment_invoice.php?appoinments_no='.$row['apointment_no'].'" method="POST">
                <label for="">Payment:</label><input type="number" name="paid_amount" id="paid_amount" value="'.$row['a_customer_pre_time'].'">
                <br>
                <br>
                <button type="submit" class="btn btn-primary">Payment</button>
                
                </form>
                </div>
                <br>
                <button><a href="_invoice.php?appoinments_no='.$row['apointment_no'].'" style="text-decoration:none;">Invoice</a></button>
                ';
                ?>

            </div>
        </main>
        <?php require('dashboard/_dashboard_footer.php');?>
    </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="dashboard/js/scripts.js"></script>
    <script src="js/script.js"></script>
</body>

</html>