
<?php
include("../includes/db.php");


?>

<html>
    <head><title>Password</title>
    <style>
        .container-f1{
            margin-top: 10%;
            margin-left: 30%;
            margin-right: 20%;
            border-style: groove;
            border-radius: 20px;
            padding-left: 30px;
            padding-bottom: 20px;
        }
        .container-f1 input[type = "password"]{
            margin-top: 10px;
            height:30px;

        }
        .container-f1 input[type = "text"]{
            margin-top: 10px;
            height:30px;

        }
        .container-f1 input[type = "submit"]{
            margin-top: 10px;
            height:30px;

        }


    </style>
    
</head>
<form action="forgotpassword.php" method="post">
    <div class = "container-f1">
        <div class="password">
            <div class="details">
            <h1>Forgot password</h1>
        </div>

        <div class="details">
        <input type="password" name="buyer_password" placeholder=" New Password" required>
        </div>

        <div class="details">
        <input type="password" name="confirm_password" placeholder="Confirm password" required>
        </div>

        <div class="details">
        <input type="text" name="username" placeholder="username" required>
        </div>

        <div class="details">
        <input type="submit" name="edit_password" placeholder="Change Password">
        </div>
        </div>
    </div>

</form>
</html>
<?php
if(isset($_POST['edit_password'])){
    include("../includes/db.php");
    $buyer_password = $_POST['buyer_password'];
    $confirm_password =$_POST['confirm_password'];
    $username=$_POST['username'];
    $sql = "SELECT * FROM buyerregistration where username = '$username'";
    $query1 = mysqli_query($con, $sql);
    $user=mysqli_fetch_array($query1);

    

    if($buyer_password !== $confirm_password){
        echo"<script>alert('Passwords do Not Match Try again')</script>";
        echo"<script>window.open('forgotpassword.php','_self')</script>";
    }
    
    else if ($user['username']===$username){
        $change = "update buyerregistration 
        set buyer_password = '$buyer_password', 
        confirm_password = '$confirm_password'
        where username='$username'";
        $query=mysqli_query($con,$change);


        echo"<script>alert('Password successfully changed');</script>";
        echo"<script>window.open('home.php','_self')</script>";
        

    }
    else{
        echo"<script>alert('Account Does not exist');</script>";


    }

    
}

?>
