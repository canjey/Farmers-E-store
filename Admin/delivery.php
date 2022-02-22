<?php
include("../includes/db.php");
include("../functions/function.php");


?>

<html>
    <head>
        <title>
            Delivery
        </title>
    </head>
    <style>
        .container-d1{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            background-color: teal;
            height:50px;
        }
        .container-d1 >div{
            margin-top: 15px;
        }
        .container-d1 >div >a{
            text-decoration: none;

        }
        </style>
    <body>
    <div class="top">
        <img src="../Admin/product_images/soko.PNG" width="100px">
        
        
        
    </div>
        <?php
        if(isset($_SESSION['username'])){
            echo"<div class = 'container-d1'>";
            echo"<div><a href='AdminHomepage.php'>Home</a></div>";
            echo"<div><a href='newdrivers.php'>Insert Drivers</a></div>";
            echo"<div><a href='view.php'>View Drivers</a></div>";
            echo"<div><a href='delete.php'>Delete Drivers</a></div>";
            echo"<div><a href='activity.php'>View Activity</a></div>";
            echo"</div>";
        }
        else{
            echo"<div><a href='logout.php'>logout</a></div>";
        }
        
        ?>
        

        <?php
        include("../Template/footer.php");
        ?>
    </body>
</html>