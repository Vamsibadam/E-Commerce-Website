<?php

$orderid=$_GET['orderid'];
include "../shared/connection.php";
$delete='Your order has been cancelled';
$status=mysqli_query($conn,"delete from orders where orderid=$orderid");
mysqli_query($conn,"INSERT INTO status(status, orderid) SELECT '$delete', orders.orderid FROM orders; ");
if($status){
    header("location:view orders.php");
    
}

?>