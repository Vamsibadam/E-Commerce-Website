<?php
session_start();

if($_SESSION['login_status']==false){
    echo "forbidden access";
    die;
}

if($_SESSION['usertype']!='Customer'){
    echo "Unauthorised access";
    die;
}
include "../customer/menu.html";




include "../shared/connection.php";



$sql_result=mysqli_query($conn,"select * from product");

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
                <div class='addcart_btn'>
                     <a href='addcart.php?pid=$dbrow[pid]'>
                         <button>Add to cart </button>
                     </a>
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
            .addcart_btn{
                width:320px;
                height:30px;
                margin-top:10px;
                margin-left: 55px;
            }
            .addcart_btn button{
                width:100px;
                height:30px;
                border:none;
                border-radius:10px;
                background-color: #8B93FF;
                color:white;
                transition: 0.2s all ease-in-out;
            }
            .addcart_btn button:hover{
                background-color: #5755FE;
                transform: scale(1.05);
            }
        </style>
    </head>
</html>


