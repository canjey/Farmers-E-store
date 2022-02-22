<?php
include("../includes/db.php");
include("../functions/function.php");
?>

<html>
    <head><title>View Buyers</title>
    <style>
        .container1{
            display:inline-flex;
            flex-wrap: wrap;
            margin-left:5px;
            border-bottom:groove 1px;
            
        }
        
        .container2{
            
            width:100px;
        }
        .container3{
            
            width:100px;
        }
        .container4{
            
            width:100px;
        }
        .container5{
            
            width:100px;
        }
        .container8{
            
            width:100px;
        }
        .top{
            display:flex;
            justify-content: space-between;
        }
        #logs{
            margin-top: 10px;
        }
        .container-f1{
            display:flex;
            justify-content: space-evenly;
            background-color: teal;
            height: 50px;
        }
        .container-f1 >div{
            margin-top: 15px;
        }
        body{
            background-image: url("../Admin/product_images/farmers.jpeg");
        }
        </style>

</head>

<body>
    <div class="top">
        <img src="../Admin/product_images/soko.PNG" width="100px">
        
        <div id="logs">
            <a href="#">Logout</a>
        </div>
        
    </div>

    <div class="container-f1">
        <div>
            <a href="AdminHomepage.php">home</a>
        </div>
        <div>
            <a href="buyers.php">View Buyers</a>
        </div>
        <div>
            <a href="addbuyers.php">Add Buyers</a>
        </div>
        <div>
            <a href="deletebuyers.php">Delete Buyers</a>
        </div>
        <div>
            <a href="updatebuyers.php">Update Buyers</a>
        </div>
    </div>
<div class="admin-container">
    <div class="container1">
        <div class="container2">
            <p>FirstName</p>
        </div>
        <div class="container3">
            <p>LastName</p>
        </div>
        <div class="container4">
            <p>Username</p>
        </div>
        <div class="container5">
            <p>Home Location</p>
        </div>
        <div class="container7">
            <p>Delete</p>
        </div>
        
        
        

    </div >
    <div class="container6">
        <?php
        getbuyersdetails();
        ?>
        </div>
        
</div>
</body>

</html>