<?php
include("../includes/db.php");

?>


<html>
    <head>
        <title>

        </title>

    </head>
    <style>
        .container-ah1{
            margin-top: 50px;
        }
        .container-ah2{
            margin-left: 30%;
        }
        .container-ah3{
            display:flex;
            background-color: antiquewhite;
        }
        .container-ah5{
            display: flex;
        }
     
    </style>

    <body>
        <?php
        include("header.php");
        ?>
        <div class="container-ah1">
            <div class="container-ah2">
                <img src="../Admin/product_images/garlic.jpg" width="300px">
            </div>
        </div>
        

        <div class ="container-ah3">
        
            <div class ="container-ah4">
            <h3> Monitor Farmers</h3>
                <p>
                    As the admin you can monitor activities done by the farmer which include their details,
                    products, orders and transactions.
                    No activity done by the farmers on the web app will escape you
                </p>


            </div>
            <div class ="container-ah4">
            <h3> Monitor Buyers</h3>
                <p>
                    In order to have a trusted web app, we need to track activities of the buyers to prevent non-repudiation and
                    facilitate a secure platform of trade and communiation between the vendors and the buyers
                </p>


            </div>
            <div class ="container-ah4">
            <h3> Monitor Drivers</h3>
                <p>
                    Delivery is one important factor in any company and its only by close monitor are we able to know if our clients needs are catered for.

                </p>


            </div>
            <div class ="container-ah4">
            <h3> Blogs</h3>
                <p>
                   Frequently update the blogs on the web app in order to provide the users with correct and up-to-date Information
                </p>


            </div>
        </div> 
        <div class= "container-ah5">
            <div class ="container-ah6">
                <img src="../Admin/product_images/farmer.png" width="400px">
            </div>
            <div class ="container-ah6">
                <img src="../Admin/product_images/vegetables.jpg" width="400px">
            </div>
            <div class ="container-ah6">
                <img src="../Admin/product_images/delivery.jpeg" width="400px">
            </div>
        </div>

        <?php
        include("../Template/footer.php")
        
        ?>
    </body>


</html>

