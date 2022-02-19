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
            <div class="container-fluid px-4">
                <h4>Appoinments</h4>
                <div class="myTable">
                    <table id="mytable">
                        <thead>
                            <th scope="col">Appoinments No</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Preferable Time</th>
                            <th scope="col">Preferable Date</th>
                            <th scope="col">Serviecs</th>
                            <th scope="col">Status</th>
                            <th scope="col">Options</th>
                        </thead>
                        <tbody>
                            <?php
                            $email=$_SESSION['email'];
                        $sql="SELECT * FROM `appoinments` where a_customer_email='$email' and a_service_status='Pending'";
                        $result =mysqli_query($con, $sql);
                        $a_sl=1;
                        $apointment_no=0;
                        while($row= mysqli_fetch_assoc($result)){
    
                            $apointment_no=$row['apointment_no'];
                            echo'<tr>
                            <td>'.$row['a_customer_name'].'</td>
                            <td>'.$a_sl.'</td>
                            <td>'.$row['a_customer_email'].'</td>
                            <td>'.$row['a_customer_address'].'</td>
                            <td>'.$row['a_customer_phn_no'].'</td>
                            <td>'.$row['a_customer_pre_time'].'</td>
                            <td>'.$row['a_customer_pre_date'].'</td>
                            <td>'.$row['a_customer_services'].'</td>
                            <td>'.$row['a_service_status'].'</td>
                            <td><button  type="button" class="btn btn-outline-secondary btn-xm" data-bs-toggle="modal"
                            data-bs-target="#appointmentCancelCustomerModal">Cancel</button></td>
                        </tr>';
                        $a_sl=$a_sl+1;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <script>
        function deletefun(apointment_no){
            data1={'apointment_no': apointment_no};
            let ts=JSON.stringify(data1);
            console.log(ts);
            $.ajax({
            type:"POST",
            url: "partials/modal/_handleAppointmentCancelCustomerModal.php",
            data: ts,
            ContentType:"application/json",

            success:function(data){
                alert('successfully posted');
                console.log(data);
            },
            error:function(error){
            console.log(error)
                alert('Could not be posted');
            }

});
        }
        </script>
        </main>
        <?php require('dashboard/_dashboard_footer.php');
        include('partials/modal/_appointmentCancelCustomerModal.php');
        ?>
    </div>
    </div>
    <script src="bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="dashboard/js/scripts.js"></script>
</body>

</html>