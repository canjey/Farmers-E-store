<?php
include("../functions/function.php");
include("../includes/db.php");

?>

<html>
            <head>
                <title>Admin Homepage</title>

                <style>
                    .container-a1{
                        display: flex ;
                        justify-content: space-evenly;
                        background-color: teal;
                        height: 50px;
                        
                    }
                    .container-a1 >div{
                        margin-top: 15px;
                        
                    }
                    .tops{
                        display: flex;
                        justify-content: space-between;
                    }
                    
                </style>

            </head>
            <body>
                <div class="tops">
                    <a href="AdminHomepage.php"><img src="../Admin/product_images/soko.PNG" width="100px">
                    
                    
                </div>

                <?php
                if(isset($_SESSION['username'])){
                    echo"<div class='container-a1'>";
                    echo"<div><a href='blogs.php'>Blogs</a></div>";
                    echo"<div><a href='farmers.php'>Farmers</a></div>";
                    echo"<div><a href='buyers.php'>Buyers</a></div>";
                    echo"<div><a href='delivery.php'>Delivery</a></div>";
                    echo"<div><a href='product.php'>Product</a></div>";
                    echo"<div><a href='message.php'>Messages</a></div>";
                    echo"<div><a href='logout.php'>Logout</a></div>";
                    echo"</div>";
                }
                else{
                    echo"<div class='container-a1'>";
                    echo"<div><a href='login.php'>Blogs</a></div>";
                    echo"<div><a href='login.php'>Farmers</a></div>";
                    echo"<div><a href='login.php'>Buyers</a></div>";
                    echo"<div><a href='login.php'>Product</a></div>";
                    echo"<div><a href ='login.php'>login</a></div>";
                    echo"</div>";
                    }
                
                ?>

           
                
            </body>
</html>

    