<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="dashboard/css/styles.css" rel="stylesheet" />
    <script src="dashboard/font_awesome/js/all.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <?php require('dashboard/_dashboard.php');?>
    <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <?php
                        $user=$_SESSION['user'];
                        //echo $user;
                        if($user=='admin'){
                            $first='Appoinments';
                            $first_link='appoinments.php';
                            $second='Payment and Invoice';
                            $second_link='payment&invoice.php';
                            $third='Customers/ History';
                            $third_link='customer_history.php';
                            $fourth='Notifications';
                            $fourth_link='apoinment_cancel_notification.php';
                            $fifth="Contact Request";
                            $fifth_link="contact_request.php";
                        }
                        if($user=='customer'){
                            $first='Make Appoinmnets';
                            $first_link='_appoinmentForm.php';
                            $second='Pending Appoinments';
                            $second_link='_pendingAppoinments.php';
                            $third= 'Your History';
                            $third_link='_customer_personal_history.php?cno='.$_SESSION['no'].'';
                            $fourth='Notifications';
                            $fourth_link='notification_customer.php';
                        }
                           echo' <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-primary text-white mb-4">
                                        <div class="card-body">'.$first.'</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="'.$first_link.'">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-warning text-white mb-4">
                                        <div class="card-body">'.$second.'</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="'.$second_link.'">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">'.$third.'</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="'.$third_link.'">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-danger text-white mb-4">
                                        <div class="card-body">'.$fourth.'</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="'.$fourth_link.'">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>';
                                if($user=='admin'){
                                    echo '<div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-4">
                                        <div class="card-body">'.$fifth.'</div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <a class="small text-white stretched-link" href="'.$fifth_link.'">View Details</a>
                                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                        </div>
                                    </div>
                                </div>';
                                }
                            echo '</div>';
                            
                        ?>
                    </div>
                </main>
                <?php require('dashboard/_dashboard_footer.php');?>
            </div>
        </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="dashboard/js/scripts.js"></script>

</body>

</html>