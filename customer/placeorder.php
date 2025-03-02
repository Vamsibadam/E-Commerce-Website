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



$pid=$_GET['pid'];

$total=0;
$count=0;

$sql_result=mysqli_query($conn,"insert into placeorder1(userid,pid) values($_SESSION[userid],$pid)");
$sql_result1=mysqli_query($conn,"select * from cart join product on product.pid=cart.pid where userid=$_SESSION[userid]");
$sql_result2=mysqli_query($conn,"select * from product");
$dbrow1=mysqli_fetch_assoc($sql_result2);
while($dbrow=mysqli_fetch_assoc($sql_result1)){
     $total=$total+$dbrow['price'];
     $count++;
      
      

      
      
      
      
}
echo"
<div class='address_container'><div class='address'><form action='orders.php' method='post'> 

<textarea required placeholder='Add Address' name='address'  cols='30' rows='5'></textarea>
<div class='select_payment'><select name='mop' class='select_box';>
<option value='upi'>UPI payments</option>
<option value='cards'>Debit/Credit Cards</option>
<option value'netbanking'>Net Banking</option>
<option value='COD'>Cash on Delivery</option>




</select>
</div>
</div>
</div>


<div class='bottom_navbar'>
             
<div class='txt45'> 
Total items : $count<br>
Total Amount : $total </div>
<div class='txt46'>You made a right choice! </div>
<button class='confirmorder_btn'>Confirm Order</button></form>
</div>";
    
             
             
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Place Order</title>
    <style>
        .address_container{
            display:flex;
            justify-content:center;
            align-items:center;
            margin-top:150px;
        }
        .address{
            width: 250px;
            height:250px;
            background-color: lightgrey;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
           
            border-radius: 20px;
            
        }
        form textarea{
            height: 170px;
            width: 200px;
            
            border-radius: 5px;
            padding-left: 10px;
            margin-left: 5px;
            margin-top: 5px;
            border: none;
            background: transparent;
            border: 3px rgb(160, 160, 160) solid;
            transition: 0.25s all ease-in-out;
        }
        form textarea::placeholder{
            font-size: 12px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: tgrey; 
            font-weight: 600;
        }
        textarea{
            outline:none;
            font-size: 15px;
            font-style: impact;
            color: black; 
            font-weight: 600;
        }
        .select_payment{
            display: flex;
            justify-content: center;
            position: relative;
            width: 170px;
            height: 50px;
            outline:none;
            margin-left: 10px;
        }
        .select_box{
           border: none;
           appearance: none;
           padding: 0 30px 0 15px;
           width: 3400px;
           outline:none;
           color: rgb(255, 255, 255);
           background-color: rgb(177, 174, 174);
           font-size: 15px;
           border-radius: 5px;
           margin-top: 10px;
          color:black;
        }
        .box1_po{
            width: 300px;
            height: 200px;
            background-color: rgb(184, 72, 72);
            border-radius: 10px;
           

        }
        .txt1{
            font-size: 30px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            background-color: rgb(46, 153, 215);
            height: 50px;
            color: white;
            padding: 5px;
            
        }
        .txt2{
            font-size:20px;
            color:white;
            margin-top: 20px;
            margin-left: 10px
        }
        .btn22{
            display: flex;
            justify-content: end;
          
        }
        .btncontinue{
            border-radius: 7px;
            height: 40px;
            width: 100px;
            border: none;
            background-color: rgb(231, 231, 29);
            font-size: 15px;
            margin-top: 20px;
            margin-right: 10px;
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
            }
            .txt46{
            color: rgb(30, 55, 62);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 15px;
            }
        .confirmorder_btn{
            height:30px;
            width:100px;
            border:none;
            border-radius:5px;
            background-color: #8B93FF;
            color:white;
            transition: 0.2s all ease-in-out;
        }
        .confirmorder_btn:hover{
            background-color:#5755FE;
            transform: scale(1.09);
        }
        .txt46::after{
            content:"😉";
           
        }
       
    </style>
</head>
<body>
 
</body>
</html>