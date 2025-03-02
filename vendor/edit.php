<?php
session_start();

include "../shared/connection.php";
include "menu.html";


$sql_result=mysqli_query($conn,"select * from product where owner=$_GET[owner] and pid=$_GET[pid]");

$dbrow=mysqli_fetch_assoc($sql_result);
      
     

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product</title>
    <style>
        .edit_container{
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }
        .form_edit{
            width: 400px;
            height:300px;
            background-color: black;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
        }
        form input{
            height: 50px;
           width: 340px;
           border-radius: 5px;
           padding-left: 10px;
           margin-left: 10px;
           margin-top: 10px;
           border: none;
           background: transparent;
           border: 1px rgb(160, 160, 160) solid;
           transition: 0.25s all ease-in-out;
        }
        form input::placeholder{
            font-size: 10px;
            font-style: impact;
            color: rgba(207, 207, 207, 0.808); 
            font-weight: 600;
        }
        form input[type="text" i] {
            font-size: 15px;
            font-style: impact;
            color: rgba(207, 207, 207, 0.808); 
            font-weight: 600;
        }
        form input[type="number" i] {
            font-size: 15px;
            font-style: impact;
            color: rgba(207, 207, 207, 0.808); 
            font-weight: 600;
        }
        form textarea{
            max-height: 100px;
            max-width: 340px;
            
            border-radius: 5px;
            padding-left: 10px;
            margin-left: 10px;
            margin-top: 20px;
            border: none;
            background: transparent;
            border: 1px rgb(160, 160, 160) solid;
            transition: 0.25s all ease-in-out;
        }
        form textarea::placeholder{
            font-size: 15px;
            font-style: impact;
            color: rgba(207, 207, 207, 0.808); 
            font-weight: 600;
        }
        textarea{
            color:white;
            font-size: 15px;
            font-style: impact;
            color: rgba(207, 207, 207, 0.808); 
            font-weight: 600;
        }
        .edit_btn{
            display:flex;
            justify-content:center;
            align-items: center;
            margin-top: 25px;
            height: 30px;
        }
        button{
            height: 50px;
            width: 100px;
            border:none;
            border-radius: 20px;
           
        }
    </style>
</head>
<body>
  


</body>
</html>
<?php
 echo "
    <div class='edit_container'>            
    <div class='form_edit'>        
    <form action='editproduct.php' method='get'>   
    <input required type='text' name='name' placeholder='Enter Name' >
    <input required type='number' name='price' placeholder='Enter Price'>
    <textarea required type='text' name='detail' placeholder='Enter details'  cols='30' rows='5'></textarea>
    <input type='hidden' name='pid' value='$dbrow[pid]'>
    <input type='hidden' name='owner' value='$dbrow[owner]'>

<div class='edit_btn'>  
 <a href='editproduct.php?pid=$dbrow[pid]&owner=$dbrow[owner]'>
 <button>Edit Product</button>
 </a>
 </div>
 </form>  </div></div>


</div>";
?>