<?php

include("../includes/db.php");


?>
<html>
    <head>
        <title>
            Blogs
        </title>
    </head>
    <style>
        .container-b1{
            display:flex;
            margin-left:50px;
        }
        .container-b1 > div{
            margin-top: 50px;
        }

    </style>

    <body>
        <?php
        include("header.php");
        ?>
        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM blogs where blog_id = $id ";
            $query = mysqli_query($con, $sql);
            while($row = mysqli_fetch_array($query)){
                $image = $row['image'];
                $description = $row['description'];
                $title = $row['blog_title'];
                echo "<div class = 'container-b1'>
                $title 
                <div>
                <img src = '../Admin/product_images/$image' width = '200px'>
                </div>
                <div>
                $description
                </div>
                </div>";

            }
        }
        
        ?>

        <?php
        include("../Template/footer.php");
        ?>
    </body>
</html>