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
    <?php 
    require('dashboard/_dashboard.php');
    require('partials/_dbconnection.php');
        
?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 py-4">
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
                        $sql='SELECT * FROM `appoinments`';
                        $result =mysqli_query($con, $sql);
                        $a_sl=1;
                        $apointment_no=0;
                        while($row= mysqli_fetch_assoc($result)){
                            $apointment_no=$row['apointment_no'];
                            echo'<tr>
                            <td >'.$row['a_customer_name'].'</td>
                            <td>'.$a_sl.'</td>
                            <td>'.$row['a_customer_email'].'</td>
                            <td>'.$row['a_customer_address'].'</td>
                            <td>'.$row['a_customer_phn_no'].'</td>
                            <td>'.$row['a_customer_pre_time'].'</td>
                            <td>'.$row['a_customer_pre_date'].'</td>
                            <td>'.$row['a_customer_services'].'</td>
                            <td>'.$row['a_service_status'].'</td>
                            <td>
                            <a href="_appoinmentEdit.php?appoinments_no='.$row['apointment_no'].'" id="edit_href"><svg style="height:20px; width:20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"/></svg></a>
                            <div style="display:inline" class="cancel_div" id="'.$row['apointment_no'].'">
                            <button  type="button" class="btn btn-outline-secondary btn-xm" data-bs-toggle="modal"
                            data-bs-target="#appoinmentDeleteModal"><svg style="height:20px; width:20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M160 400C160 408.8 152.8 416 144 416C135.2 416 128 408.8 128 400V192C128 183.2 135.2 176 144 176C152.8 176 160 183.2 160 192V400zM240 400C240 408.8 232.8 416 224 416C215.2 416 208 408.8 208 400V192C208 183.2 215.2 176 224 176C232.8 176 240 183.2 240 192V400zM320 400C320 408.8 312.8 416 304 416C295.2 416 288 408.8 288 400V192C288 183.2 295.2 176 304 176C312.8 176 320 183.2 320 192V400zM317.5 24.94L354.2 80H424C437.3 80 448 90.75 448 104C448 117.3 437.3 128 424 128H416V432C416 476.2 380.2 512 336 512H112C67.82 512 32 476.2 32 432V128H24C10.75 128 0 117.3 0 104C0 90.75 10.75 80 24 80H93.82L130.5 24.94C140.9 9.357 158.4 0 177.1 0H270.9C289.6 0 307.1 9.358 317.5 24.94H317.5zM151.5 80H296.5L277.5 51.56C276 49.34 273.5 48 270.9 48H177.1C174.5 48 171.1 49.34 170.5 51.56L151.5 80zM80 432C80 449.7 94.33 464 112 464H336C353.7 464 368 449.7 368 432V128H80V432z"/></svg></button>
                            </div>
                            </td>
                        </tr>';
                        $a_sl=$a_sl+1;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <?php
        include('dashboard/_dashboard_footer.php');
        include('partials/modal/_appoinmentDeleteModal.php');
        
        ?>
    </div>
    </div>
    <script>
        function deletefun(apointment_no){
            data1={'apointment_no': apointment_no};

            let ts=JSON.stringify(data1);
            console.log(ts);
            $.ajax({
            type:"POST",
            url: "partials/modal/_handleAppoinmentDeleteModal.php",
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
    <script src="bootstrap/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="dashboard/js/scripts.js"></script>
    <!-- <script src="js/script.js"></script> -->

</body>

</html>