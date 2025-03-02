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


$total=0;
$count=0;
$sql_result=mysqli_query($conn,"select * from cart join product on product.pid=cart.pid where userid=$_SESSION[userid]");
$sql_result1=mysqli_query($conn,"select * from product join cart where cart.pid=product.pid");

$sql_result2=mysqli_query($conn,"select * from product");
$dbrow2=mysqli_fetch_assoc($sql_result2);
$dbrow1=mysqli_fetch_assoc($sql_result1);

while($dbrow=mysqli_fetch_assoc($sql_result)){
     $total=$total+$dbrow['price'];
     $count++;
      
      echo "<div class='card'>
               <div class='name'>$dbrow[name]</div>
                
               <div class='pdt-img-parent'>
                  <img class='pdtimg' src='$dbrow[impath]'>
                </div>
                <div class='price'>$dbrow[price]</div>
                <div class='detail'>
                $dbrow[detail]
                </div>
                <div class='removecart_btn'>
                     <a href='deletecart.php?cartid=$dbrow[cartid]'>
                         <button class='btn btn-danger'>Remove From cart </button>
                     </a>
                </div>
                
      
      
      
      </div>";
}


    echo "<div class='bottom_navbar'>
             
              <div class='txt45'> 
              Total items : $count<br>
              Total Amount : $total </div>
              <div class='placeorder_btn1'><a href='placeorder.php?userid=$_SESSION[userid]&pid=$dbrow1[pid]'>
              <button class='placebtn'> Place order  </button>
              </a>
              </div>
         </div>";
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
            .removecart_btn{
                width:320px;
                height:30px;
                margin-top:10px;
                margin-left: 50px;
            }
            .removecart_btn button{
                width:110px;
                height:30px;
                border:none;
                border-radius:10px;
                background-color: #D6589F;
                color:white;
                transition: 0.2s all ease-in-out;
            }
            .removecart_btn button:hover{
                background-color: #D20062;
                transform: scale(1.05);
            }
    
            .bottom_navbar{
                background: linear-gradient(to right,#F5E8DD 70%,#EED3D9);
                height: 70px;
                width:96%;
                position:absolute;
                bottom:0;
                border-top-right-radius: 15px;
                border-top-left-radius: 15px;
                margin-top: 20px;
                backdrop-filter: blur(15px);
                display: flex;
                justify-content: space-between; 
                align-items: center; 
                padding: 0 20px; 
                border: rgba(99, 99, 99, 0.767) 1px solid;
                box-shadow: 0px 0px 20px 2px #dfe9f3;
                border: none;
            }
            .txt45{
                color: rgb(30, 55, 62);
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                margin-right: 5px;
                text-decoration: none;
                color: black; 
                padding: 10px;
                
                transition: 0.25s all ease-in;
            }
            .placeorder_btn1 button{
                height:30px;
                width:100px;
                border:none;
                border-radius:5px;
                background-color: #8B93FF;
                color:white;
                transition: 0.2s all ease-in-out;
            }
            .placeorder_btn1 button:hover{
                background-color:#5755FE;
                transform: scale(1.09);
            }
        </style>
    </head>
</html>


