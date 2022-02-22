<?php
include("../includes/db.php");

?>


<html>
    <head>
        <title>

        </title>

    </head>
    <style>
        .container-b1{
            display: flex;
            margin-left:30%;
            margin-top: 10px;

        }
        .container-b2{
            width:100px;
            background-color: yellowgreen;
            margin-top: 10px;
            height:30px;
        }
        .container-b3{
            margin-top: 10px;
        }
        .container-b3 > input[type="text"]{
            height:30px;
        }
        .container-b3 > input[type="file"]{
            height:30px;
        }
        .container-b3 > textarea{
            height: 30px;
        }
        #blog{
            text-align:center;
        }
        body{
            background-image: url("../Admin/product_images/forgotpassword.jpg");
        }
    </style>

    <body>
        <?php
        include("header.php");
        ?>
        
        
        <form action="insertblogs.php" method ="post" enctype="multipart/form-data">
                <p id="blog">Insert Blog</p>
            <div class = container-b1>     
                
                <div class = "container-b2">
                        <span>Title</span>

                    </div>
                    <div class ="container-b3">
                        <input type="text" name="title" placeholder="blog-title">

                    </div>
            </div>
            <div class = container-b1>
                    <div class = "container-b2">
                        <span>Image</span>

                    </div>
                    <div class ="container-b3">
                        <input type ="file" name="image">

                    </div>


                

            </div>
            <div class="container-b1">
                <div class="container-b2">
                    <span>Description</span>

                </div>
                <div class ="container-b3">
                    <textarea name="description" placeholder="blog-about">
                    </textarea>
                </div>

            </div>
            <div class="container-b1">
                <input  type="submit" name="insert" id="insert-btn" value="insert">

            </div>

        </form>
    </body>


</html>

<?php

        if(isset($_POST['insert'])){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $image = $_FILES['image']['name'];
            $image_tempname = $_FILES['image']['tmp_name'];
            
            if(isset($_SESSION['username'])){

                move_uploaded_file($image_tempname,"../Admin/product_images/$image");
                

                $sql1 = "INSERT INTO blogs (blog_title, image, description) values ('$title','$image','$description')";
                $query1 = mysqli_query($con, $sql1);
                if($query1){
                    echo"<script>alert('blog added')</script>";
                    echo"<script>window.open('blogs.php','_self')</script>";
                    }
                else{
                    echo"check connections";
                }
            }
            else{
                echo"login";
            }

        }
        

           

?>