<?php
session_start();

include "../shared/connection.php";
include "../customer/menu.html";
$sql_result1=mysqli_query($conn,"select * from status");
$dbrow1=mysqli_fetch_assoc($sql_result1);
$sql_result2=mysqli_query($conn,"select * from orders");
$dbrow2=mysqli_fetch_assoc($sql_result2);
$sql_result=mysqli_query($conn,"select * from cart join product on product.pid=cart.pid where userid=$_SESSION[userid]");
while($dbrow=mysqli_fetch_assoc($sql_result)){

     
     echo "<div class='card'>
              <div class='name'>$dbrow[name]</div>
               
              <div class='pdt-img-parent'>
                 <img class='pdtimg' src='$dbrow[impath]'>
               </div>
               <div class='price'>$dbrow[price]</div>
               <div class='detail'>
               $dbrow[detail]
               </div>
               <div class='status'>
                    Order Status : $dbrow1[status] to $dbrow2[address]
               </div>
               
     
     
     
     </div>";
}
?>
<html>
    <head>
        <style>
           .card{
                 width:220px;
                 height:fit-content;
                 padding-bottom:15px;
                 background-color:#C0D6E8;
                 display: inline-block !important;
                 margin:5px;
                 border-radius: 10px;
                 border:1px solid #C0D6E8;

            }
            .name{
                width:170px;
                margin-left:20px;
                font-size: 24px;
                text-align: center;
                color: #A34343;
                padding:3px;
                margin-top: 10px;
                border-bottom: 1px solid #A34343;
            }
            .price{
                margin-top:5px;
                font-weight: bold;
                color: #008DDA;
                font-size: 15px;
                margin-left:3px;
            }
            .price::before{
                content:" Rs :";
                color: #008DDA;
                font-size: 15px;
                
            }
            .detail{
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                margin-left: 3px;
                margin-top: 3px;
                color: black;
                font-size: 10px;
            }
            .pdt-img-parent,.pdtimg{
                width: 100%;
                height: 200px;
                margin-top:3px;
            }
            .status{
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                background-color:#F1EEDC;
                margin-top:5px;
                font-size: 13px;
                border-radius:5px;
                border:none;
                height:fit-content;
                padding:5px;
            }
            
        </style>
    </head>
</html>


