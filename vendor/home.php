<?php
session_start();

if($_SESSION['login_status']==false){
    echo "forbidden access";
    die;
}

if($_SESSION['usertype']!="Vendor"){
    echo "Unauthorised access";
    die;
}

include "menu.html";
?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .container_addpdt{
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
           
        }
      .form1{
            
            width: 460px;
            height:380px;
            background-color: black;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
           
            border-radius: 20px;
            
        }
        .addpdt_txt{
            display: flex;
            align-items: center;
            justify-content: center;
            height:380px;
            border-right: 1px solid white;
        }
        h1{
        
            margin-top: 20px;
            font-size: 34px;
          
            background-size: 200% auto;
            padding-right: 10px;
            
            color:  #ffffff;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            font-weight: 550;
            text-shadow: 0 0 7px #00aeff,
                        0 0 10px #7e99a6,
                        0 0 21px #7694a1,
                        0 0 42px #4a616c,
                        0 0 82px #297496,
                        0 0 92px #297496,
                        0 0 102px #297496,
                        0 0 151px #297496;
            width: fit-content;
            height: fit-content;
        }
        form input:not(.file){
           height: 50px;
           width: 340px;
           border-radius: 5px;
           padding-left: 10px;
           margin-left: 20px;
           margin-top: 20px;
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
            margin-left: 20px;
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
        input[type="file"]::file-selector-button {
            border-radius: 4px;
            padding: 0 16px;
            height: 40px;
            cursor: pointer;
            background-color: white;
            border: 1px solid rgba(0, 0, 0, 0.16);
            box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.05);
            margin-right: 16px;
            border:none;
            margin-left:20px;
            margin-top:15px;
            }
        .btn_addpdt{
            display:flex;
            justify-content:center;
            align-items: center;
            margin-top: 20px;
            height: 30px;
        }
        .btn_addpdt button{
            height: 50px;
            width: 100px;
            border:none;
            border-radius: 20px;
           
           
        }

    </style>
</head>
<body>
     <div class="container_addpdt">
        <div class="form1">
            <div class="addpdt_txt"><h1>Add Product </h1></div>
                <form enctype="multipart/form-data"   action="upload.php" method="post">
                    
                    <input required type="text" placeholder="Product Name" name="name">
                    <input required type="number" min="1" placeholder="Product Price" name="price">
                    <textarea required placeholder="Product Description" name="detail"  cols="30" rows="5" ></textarea>
                    <input required type="file" name="pdtimg" accept=".jpg,.png" class="file">
                        <div class="btn_addpdt">
                            <button>Add Product</button>
                        </div>
           </form>
        </div>  
    </div>
</body>
</html>