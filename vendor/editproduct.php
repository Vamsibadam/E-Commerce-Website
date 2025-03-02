<?php

include "../shared/connection.php";

$pdtname=$_GET['name'];
$pdtdetail=$_GET['detail'];
$pdtprice=$_GET['price'];




$sql_result=mysqli_query($conn,"update product set price=$pdtprice, detail='$pdtdetail', name='$pdtname' where pid=$_GET[pid]");


if($sql_result){
    header("location:view.php");
}





?>




















