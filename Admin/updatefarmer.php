<?php
include("../includes/db.php");
include("../functions/function.php");

?>
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "select * from farmerregistration where farmersID = $id ";
        $query = mysqli_query($con, $sql);
        if($query){
            while($row = mysqli_fetch_array($query)){
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $username = $row['username'];
                $password = $row['farmer_password'];
                $cpassword = $row['confirm_password'];
            }
        }
    }
?>

<html>
    <head>
        <title>
        </title>
    </head>
        <style>
            .container-u2{
                display:flex;
            }
            .container-u3{
                width:140px;
                height:40px;
                background-color: teal;
                margin-top: 20px;
            }
            .container-u4{
                margin-top: 20px;
            }
            .container-u4 input[type= "text"]{
                height:40px;
            }
            .container-u4 input[type= "password"]{
                height:40px;
            }
            body{
            background-image: url("../Admin/product_images/forgotpassword.jpg");
        }
        </style>
    <body>
        <div class = "container-u1">
            <h3>Update Farmers Password</h3>
            <form action = "<?php echo "updatefarmer.php?id=$id" ;?>" method ="post">
                <div class = "container-u2">
                    <div class = "container-u3">
                        <span>Firstname</span>
                    </div>
                    <div class = "container-u4">
                        <input type = "text" value = <?php echo $firstname;?> disabled>
                    </div>

                </div>
                <div class = "container-u2">
                    <div class = "container-u3">
                        <span>Lastname</span>
                    </div>
                    <div class = "container-u4">
                        <input type = "text" value = <?php echo $lastname;?> disabled>
                    </div>

                </div>
                <div class = "container-u2">
                    <div class = "container-u3">
                        <span>Username</span>
                    </div>
                    <div class = "container-u4">
                        <input type = "text" value = <?php echo $username;?> disabled>
                    </div>

                </div>
                <div class = "container-u2">
                    <div class = "container-u3">
                        <span>Password</span>
                    </div>
                    <div class = "container-u4">
                        <input type = "password" name = "password" value = <?php echo $password;?> >
                    </div>

                </div>
                <div class = "container-u2">
                    <div class = "container-u3">
                        <span>Confirm Password</span>
                    </div>
                    <div class = "container-u4">
                        <input type = "password" name= "cpassword" value = <?php echo $cpassword;?> >
                    </div>

                </div>
                <input type ="submit" name ="update" id ="update-btn">

            </form>
        </div>
    </body>

</html>

<?php
if(isset($_POST['update'])){
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if($password == $cpassword){
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql1 = "UPDATE farmerregistration set farmer_password = '$password', confirm_password = '$cpassword' where farmersID = $id ";
            $query1 = mysqli_query($con, $sql1);
            if($query1){
                echo"<script>alert('password changed')</script>";
                echo"<script>window.open('updatefarmers.php','_self')</script>";
            }
    
    
        }
    }
    else{
        echo"<script> alert('passwords do not match')</script>";
    }
    
}

?>