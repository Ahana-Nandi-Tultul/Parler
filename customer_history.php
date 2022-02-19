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
            <h4>Customer List</h4>
                <div class="myTable">
                    <table id="mytable">
                        <thead>
                            <th scope="col">Customer No</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Account Creating Time</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            <?php
                        $sql="SELECT * FROM `customers`";
                        $result =mysqli_query($con, $sql);
                        $c_sl=1;
                        while($row= mysqli_fetch_assoc($result)){
                            echo'<tr>
                            <td>'.$c_sl.'</td>
                            <td>'.$row['cname'].'</td>
                            <td>'.$row['cmail'].'</td>
                            <td>'.$row['caddress'].'</td>
                            <td>'.$row['cphoneNumber'].'</td>
                            <td>'.$row['TimeStmp'].'</td>
                            <td><button><a href="_customer_history.php?customer_no='.$row['cno'].'" style="text-decoration:none;">History</a></button></td>
                        </tr>';
                        $c_sl=$c_sl+1;
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