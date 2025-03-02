<?php

$orderid=$_GET['orderid'];
include "../shared/connection.php";
$deliver='Your order has been delivered';

mysqli_query($conn,"INSERT INTO status(status, orderid) SELECT '$deliver', orders.orderid FROM orders; ");

echo"Order has been delivered";
?>