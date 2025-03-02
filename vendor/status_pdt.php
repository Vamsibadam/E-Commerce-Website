<?php


include "../shared/connection.php";
include "../customer/menu.html";
$sql_result=mysqli_query($conn,"select * from status");
$dbrow=mysqli_fetch_assoc($sql_result);
echo "$dbrow[status]";