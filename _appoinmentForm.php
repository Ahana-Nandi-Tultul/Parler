<?php require('dashboard/_dashboard.php');?>
<?php
$showerror=false;
$showSucces=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
require('partials/_dbconnection.php');
 $name=$_SESSION['name'];
 $email=$_SESSION['email'];
 $address=$_SESSION['address'];
 $phn_number=$_SESSION['phn_number'];
 $time=$_POST['ctime'];
 $date=$_POST['cdate'];
 $service=$_POST['stype'];
 $status='Pending';
 $cno=$_SESSION['no'];
 if($service=='selectany'){
    $showerror=true;
    $showMgs="Please mention which service you want.";
 }
 else{
 $sql="INSERT INTO `appoinments` (`cno`,`a_customer_name`, `a_customer_email`, `a_customer_address`,`a_customer_phn_no`, `a_customer_pre_time`, `a_customer_pre_date`, `a_customer_services`,`a_service_status`) VALUES 
 ('$cno','$name', '$email', '$address', '$phn_number', '$time','$date' ,'$service','$status')";
 $result=mysqli_query($con, $sql);
 if($result==null){
    $showerror=true;
    $showMgs="Sorry! Have some technical problem.We will try to solve. Please contact with us.";
 }
 else{
     $showSucces=true;
     $showMgs="Your appoinment is complete.";
 }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahana's Parlour</title>
    <link href="dashboard/css/styles.css" rel="stylesheet" />
    <script src="dashboard/font_awesome/js/all.min.js"></script>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <?php 
                    if($showerror==true){
                    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error! </strong> '.$showMgs.'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';}
                    if($showSucces==true){
                        echo'<div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Success! </strong> '.$showMgs.'
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
                ?>
                <div class="cform">
                    <div class="card form_card" style="width: 30rem;">
                        <div class="inside_card_index">
                            <h5 class="card-title">Apoinment Form</h5>
                            <p class="card-text">Dear Customer, please make your apoinment here.</p>
                            <form action="_appoinmentForm.php" method="POST">
                                <div class="mb-3">
                                    <label for="time" class="form-label">Preferable Time*</label>
                                    <input type="time" class="form-control" id="ctime" name="ctime"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Preferable date*</label>
                                    <input type="date" class="form-control" id="cdate" name="cdate"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="stype" class="form-label">Available Services*</label>
                                    <select name="stype" id="stype" required>
                                        <option value="selectany">Select Any</option>
                                        <option value="skin health">skin health</option>
                                        <option value="facial aesthetics">facial aesthetics</option>
                                        <option value="foot care">foot care</option>
                                        <option value="nail manicures">nail manicures</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php require('dashboard/_dashboard_footer.php');?>
    </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="dashboard/js/scripts.js"></script>
</body>

</html>