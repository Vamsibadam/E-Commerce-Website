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
         
            .deletepdt button{
                width:100px;
                height:30px;
                border:none;
                border-radius:10px;
                margin-top:10px;
                margin-left: 5px;
            }
            .deletepdt a{
                text-decoration:none;
            }
            .btn1_dlt{
                background-color: #D20062;
                color:white;
                transition: 0.25s all ease-in-out;
            }
            .btn1_dlt:hover{
                background-color: red;
                transform: scale(1.05);
            }
            .btn2_edit{
                background-color: #7AA2E3;
                color:white;
                transition: 0.25s all ease-in-out;
            }
            .btn2_edit:hover{
                background-color: #8B93FF;
                transform: scale(1.05);
            }
           
        </style>
    </head>
</html>









<?php
session_start();

include "../shared/connection.php";
include "menu.html";

$sql_result=mysqli_query($conn,"select * from product where owner=$_SESSION[userid]");

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
                <div class='deletepdt'>
                <a href='edit.php?pid=$dbrow[pid]&owner=$dbrow[owner]'>
                <button class='btn2_edit'>Edit Product</button>
                </a>
                <a href='deleteproduct.php?pid=$dbrow[pid]'>
                <button class='btn1_dlt'>Delete Product</button>
                </a>
                
                
              
                </div>
      
      
      
      </div>";
}
?>