<?php


session_start();
$_SESSION['login_status']=false;
$uname=$_POST['username'];
$password=$_POST['password'];

$hostname="localhost";
$user="root";
$pwd="";
$dbname="signup";
$port=3306;

$conn=new mysqli($hostname,$user,$pwd,$dbname,$port);

$cipher_password=md5($password);

$query="select * from user where username='$uname' and password='$cipher_password'";


$sql_result=mysqli_query($conn,$query);

if(mysqli_num_rows($sql_result)>0){
    echo "Login success";
    $dbrow=mysqli_fetch_assoc($sql_result);
    print_r($dbrow);

    $_SESSION['login_status']=true;
    $_SESSION['usertype']=$dbrow['usertype'];
    $_SESSION['userid']=$dbrow['userid'];
    if($dbrow['usertype']=="Vendor"){
        header("location:../vendor/home.php");
    }
    else if($dbrow['usertype']=="Customer"){
        header("location:../customer/home.php");
    }
}
else{
    echo "Login failed";
}


?>