<?php


$pid=$_GET['pid'];
session_start();
$_SESSION['userid'];
$source=$_FILES['pdtimg']['tmp_name'];
$target="../shared/images/".$_FILES['pdtimg']['name'];

include "../shared/connection.php";
move_uploaded_file($source,$target);
$sql_status=mysqli_query($conn,"insert into cart(userid,pid,impath) values($_SESSION[userid],$pid,'$target')");

if($sql_status){
    header("location:home.php");
}
?>
