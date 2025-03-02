<?php
session_start();
include "../shared/connection.php";
include "../customer/menu.html";
include "../customer/index.html";
$source=$_FILES['pdtimg']['tmp_name'];
$target="../shared/images/".$_FILES['pdtimg']['name'];
move_uploaded_file($source,$target);
$mop=$_POST['mop'];
$address=$_POST['address'];
$sql_result1=mysqli_query($conn,"select * from cart join product on product.pid=cart.pid where userid=$_SESSION[userid]");
$sql_result2=mysqli_query($conn,"select * from product");

$userid=$_SESSION['userid'];

$dbrow1=mysqli_fetch_assoc($sql_result1);

$pid=$dbrow1['pid'];
$owner=$dbrow1['owner'];
$username=$dbrow3['username'];


$sql_result3=mysqli_query($conn,"insert into orders(mop,userid,pid,address,impath,owner) values('$mop',$userid,$pid,'$address','$target',$owner)");
echo "Order placed sucessfully";
?>