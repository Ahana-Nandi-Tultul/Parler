<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahana's Parlour</title>
    <link href="dashboard/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/index.css">
    <script src="dashboard/font_awesome/js/all.min.js"></script>
    <script src="dashboard/font_awesome/js/kit.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="datatables/css/jquery.dataTables.min.css">
    <script src="jquery/jquery-3.5.1.js"></script>
    <script src="datatables/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#mytable').DataTable();
    });
    </script>
</head>

<body>
    <?php require('dashboard/_dashboard.php');
require('partials/_dbconnection.php');
?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 my-3 mx-3">
                <?php
                            $cno = $_SESSION['no'];
                            $sql1="SELECT * FROM customers WHERE cno='$cno'";
                            $result1=mysqli_query($con, $sql1);
                            $row1= mysqli_fetch_assoc($result1);
                           echo' <p><label for="">Customer Name:</label> <span><strong>'.$row1['cname'].'</strong></span></p>
                            <p><label for="">Email:</label> <span><strong>'.$row1['cmail'].'</strong></span></p>
                            <p><label for="">Address:</label> <span><strong>'.$row1['caddress'].'</strong></span></p>
                            <p><label for="">Phone Number:</label> <span><strong>'.$row1['cphoneNumber'].'</strong></span></p>';
                ?>
                <div class="myTable">
                    <table id="mytable">
                        <thead>
                            <th scope="col">Appoinment No</th>
                            <th scope="col">Time</th>
                            <th scope="col">Date</th>
                            <th scope="col">Service</th>
                            <th scope="col">Status</th>
                            <th scope="col">Paid Amount</th>
                        </thead>
                        <tbody>
                            <?php
                        $sql2="SELECT * FROM appoinments WHERE cno='$cno'";
                        $result2=mysqli_query($con, $sql2);
                        $num2= mysqli_num_rows($result2);
                        if($num2>0){
                            $a_sl=1;
                            while($row2= mysqli_fetch_assoc($result2)){
                                echo'<tr>
                                <td>'.$a_sl.'</td>
                                <td>'.$row2['a_customer_pre_time'].'</td>
                                <td>'.$row2['a_customer_pre_date'].'</td>
                                <td>'.$row2['a_customer_services'].'</td>
                                <td>'.$row2['a_service_status'].'</td>
                                <td>'.$row2['paid_amount'].'</td>
                            </tr>';
                            $a_sl=$a_sl+1;
                        }
                    }
                        ?>
                        </tbody>
                    </table>
                </div>
        </main>
        <?php require('dashboard/_dashboard_footer.php');?>
    </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="dashboard/js/scripts.js"></script>
</body>

</html>