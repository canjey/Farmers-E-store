<?php


include("../functions/function.php");
include("../includes/db.php");


$username=$_SESSION['username'];
$sql="select * from buyerregistration where username='$username' ";
$query=mysqli_query($con,$sql);
while ($row = mysqli_fetch_array($query)) {
    $firstname=$row['firstname'];
    $email=$row['email'];
    $buyer_location=$row['buyer_location'];
    $phone = $row['phone'];
}
?>
<html>
    <head><title>EditProfile</title>
    <style>
        body{
            background-image:url("../images/coinoil.jpg");
        }
        .maincontainer{
            
    height:200px;
    border-style:groove;
    border-radius:5em;
    padding:60px;
    background-color:#f0ffff;
    margin: auto;
    width: 60%;
   
        }
        .container1{
            display:flex;
            margin:20px;
        }
        .name{
            width:150px;
        }
        #editprofile{
            margin-left:100px;
        }

        </style>

</head>
<body>
    <form action="Editprofile.php" method="post">
    <div class="maincontainer">
        <div class="container1">
            <div class="name">
            <label>First Name</label>

            </div>
            <div>
            <input type="text" name="firstname" value="<?php echo"$firstname"?>" >

            </div>

        </div>

        <div class="container1">
        <div class="name">
            <label>Email</label>

            </div>
            <div>
            <input type="text" name="email" value="<?php echo"$email"?>" >

            </div>

        </div>

        <div class="container1">
        <div class="name">
            <label>Location </label>

            </div>
            <div>
            <input type="text" name="buyer_location" value="<?php echo"$buyer_location"?>" >

            </div>

        </div>

        <div class="container1">
        <div class="name">
            <label>Phone Number </label>

            </div>
            <div>
            <input type="text" name="phone" value="<?php echo"$phone"?>" >

            </div>

        </div>

        <div class="container1">
        <div class="name">
            <label>Username</label>

            </div>
            <div>
            <input type="text" name="username" value="<?php echo"$username"?>" >

            </div>

        </div>


            
            
                <div class="container1">
                    <input type="submit" name="edit" id="editprofile" value="Edit Profile">
</div>
</div>
</form>
</body>
</html>
<?php
if(isset($_POST['edit'])){
    $_SESSION['username'] = $username;

    $firstname=$_POST['firstname'];
    $email=$_POST['email'];
    $phone = $_POST['phone'];
    $buyer_location=$_POST['buyer_location'];
    $username=$_POST['username'];

    $query = "update buyerregistration 
              set firstname = '$firstname', email = '$email',
              buyer_location = '$buyer_location', phone = $phone, username = '$username'
              where buyer_id 
              in (select buyer_id from buyerregistration 
              where username='$username')";
    $run = mysqli_query($con, $query);
    
    
    echo "<script>window.open('buyerprofile.php','_self')</script>";


}
?>