<?php 
$boole=false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    require('../_dbconnection.php');
    $email=$_POST['customeremail'];
    $customerPass=$_POST['customerPass'];
    $customerConPass=$_POST['customerConPass'];
    if($customerPass==$customerConPass){
        $sql="SELECT * FROM `customers` WHERE cmail='$email' and cpassword='$customerPass'";
        $result=mysqli_query($con, $sql);
        $num=mysqli_num_rows($result);
        if($num==1){
            $row=mysqli_fetch_assoc($result);
            $cno=$row['cno'];
            $cname=$row['cname'];
            $caddress=$row['caddress'];
            $cphoneNumber=$row['cphoneNumber'];
            session_start();
            $_SESSION['no']=$cno;
            $_SESSION['name']=$cname;
            $_SESSION['email']=$email;
            $_SESSION['address']=$caddress;
            $_SESSION['phn_number']=$cphoneNumber;
            $_SESSION['loggedIn']=true;
            $_SESSION['page']='dashboard.php';
            $_SESSION['user']='customer';
            $boole=true;
            header('location: ../../dashboard.php?loginsuccess='.$boole.'');
        }
        else{
            $boole=false;
            $showerror="Please Provide the correct password.";
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