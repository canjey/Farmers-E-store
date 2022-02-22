<?php
include("../functions/function.php");
include("../includes/db.php");
?>

<html>
    <head>

    </head>
    <style>
        #profile{
            height:150px;
            border-radius: 50%;
        }

    </style>

    <body>
        <?php
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM farmerregistration where username = '$username'  ";
            $query = mysqli_query($con, $sql);
            while($row = mysqli_fetch_array($query)){
                $image = $row['image_filename'];
                $status = $row['status'];

            }
        }

        ?>
       

        <div class="profile" >
            <?php
            echo"<img src = '../Admin/product_images/$image' id='profile'> <p>$status";
            ?>


        </div>
        <form action = "profilepic.php" method = "post" enctype="multipart/form-data">
        <div>
            <input type ="file" name = "image_filename">
            <input type = "submit" name = "update" value ="Change profile pic">


        </div>
        
        </form>
       
        <a href="farmerHomepage.php"><button>Home</button></a>

    </body>

</html>

<?php
    if(isset($_POST['update'])){
        
        $image_filename = $_FILES['image_filename']['name'];
        $tempname = $_FILES['image_filename']['tmp_name'];
        move_uploaded_file($tempname, "../Admin/product_images/$image_filename");

        $sql2 = "UPDATE farmerregistration set image_filename = '$image_filename' where username = '$username'";
        $query2 = mysqli_query($con, $sql2);
        
        echo"<script>window.open('farmerHomepage.php','_self')</script>";
           
            
    
        
    }