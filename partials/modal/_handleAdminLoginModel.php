<?php 
$boole=false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    require('../_dbconnection.php');
    $email=$_POST['adminlogin'];
    $adminPass=$_POST['adminPass'];
    $adminConPass=$_POST['adminConPass'];
    if($adminPass==$adminConPass){
        $sql="SELECT * FROM `admin` WHERE admin_email='$email' and admin_password='$adminPass'";
        $result=mysqli_query($con, $sql);
        $num=mysqli_num_rows($result);
        if($num==1){
            $row=mysqli_fetch_assoc($result);
            $admin_name=$row['admin_name'];
            $admin_address=$row['admin_address'];
            $admin_phn_number=$row['admin_phn_number'];
            $ano=$row['admin_id'];
            session_start();
            $_SESSION['no']=$ano;
            $_SESSION['name']=$admin_name;
            $_SESSION['address']=$admin_address;
            $_SESSION['phn_number']=$admin_phn_number;
            $_SESSION['loggedIn']=true;
            $_SESSION['page']='dashboard.php';
            $_SESSION['user']='admin';
            $boole=true;
            header('location: ../../dashboard.php?loginsuccess='.$boole.'');
        }
        else{
            $boole=false;
            $showerror="Sorry! password is wrong. Please contact with authority";
            header('location: ../../index.php?loginsuccess='.$boole.'&error='.$showerror.'');
        }
    }
    else{
        $boole=false;
        $showerror="Password doesn't match";
        header('location: ../../index.php?loginsuccess='.$boole.'&error='.$showerror.'');
    }
}
?>