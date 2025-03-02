<?php

$name=$_POST['username'];
$password=$_POST['password'];
$utype=$_POST['usertype'];

$cipher_password=md5($password);//md5 is used for encrypting,it is a algorithm

$conn=new mysqli("localhost","root","","signup",3306);
include "../shared/index.html";

mysqli_query($conn,"insert into user(username,password,usertype) values('$name','$cipher_password','$utype')");

?>