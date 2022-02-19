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
    <?php
    require('dashboard/_dashboard.php');
    require('partials/_dbconnection.php');
    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 py-4">
                <?php 
                $appoinments_no=$_GET['appoinments_no'];
                $sql='SELECT * FROM `appoinments` where `apointment_no`='.$appoinments_no.'';
                $result=mysqli_query($con, $sql);
                $row=mysqli_fetch_assoc($result);
                echo'<h4 id="edit_appoinments">Appoinments of '.$row['a_customer_name'].' </h4>

                <div id="'.$appoinments_no.'">
                <p><label for="">Customer Name:</label> <span><strong>'.$row['a_customer_name'].'</strong></span></p>
                <p><label for="">Address:</label> <span><strong>'.$row['a_customer_address'].'</strong></span></p>
                <p><label  for="">Phone Number:</label> <span><strong>'.$row['a_customer_phn_no'].'</strong></span></p>
                <p><label for="">Customer\'s Preferable Date:</label> <span><strong id="privious_date">'.$row['a_customer_pre_date'].'</strong></span></p>

                <p><label for="">Update Date:</label><input type="date" name="update_date" id="update_date" value="'.$row['a_customer_pre_date'].'">
                <button class="btn btn-primary px-4 mx-4" id="update_date_button" name="update_date_button">Edit</button></p>

                <p><label for="">Customer\'s Preferable Time:</label> <span><strong id="privious_time">'.$row['a_customer_pre_time'].'</strong></span></p>

                <label for="">Update Time:</label><input type="time" name="update_time" id="update_time" value="'.$row['a_customer_pre_time'].'">
                <button class="btn btn-primary px-4 mx-4" id="update_time_button" name="update_time_button">Edit</button>

                <p><label for="">Appointed Service: </label> <span><strong>'.$row['a_customer_services'].'</strong></span></p>
                <p><label for="">Appoinment Status: </label> <span><strong>'.$row['a_service_status'].'</strong></span></p>

                <p><label for="">Update Appoinment Status:  </label><select name="update_status" id="update_status">
                <option value="Pending">Pending</option>
                <option value="Complete">Complete</option>
                </select> <button class="btn btn-primary px-4 mx-4" id="update_status_button" name="update_status_button">Edit</button></p>
                </div>
                ';
                ?>
                <button class="btn btn-primary" id="apointment_update_save_button"
                    name="apointment_update_save_button">Save Changes</button>
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