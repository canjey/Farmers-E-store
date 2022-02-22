<?php


include("../functions/function.php");
include("../includes/db.php");


$username=$_SESSION['username'];
$sql="select * from farmerregistration where username='$username' ";
$query=mysqli_query($con,$sql);
while ($row = mysqli_fetch_array($query)) {
    $firstname=$row['firstname'];
    $email=$row['email'];
    $farmer_location=$row['farmer_location'];
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

        </style>

</head>
<body>
    <form action="farmerEditprofile.php" method="post">
    <div class="maincontainer">
        <div class="container1">
            <label>First Name</label><br/>
            <input type="text" name="firstname" value="<?php echo"$firstname"?>" >
            <div>
            <div class="container1" >
            <label>Email</label></br>
            <input type="text" name="email" value="<?php echo"$email"?>">
            </div>
            <div class="container1">
            <label>Location</label></br>
            <input type="text" name="farmer_location" value="<?php echo"$farmer_location"?>">
            </div>
            <div class="container1">
            <label>Phone Number</label></br>
            <input type="text" name="phone" value="<?php echo"$phone"?>">
            </div>
            <div class="container1">
            <label>username</label></br>
            <input type="text" name="username" value="<?php echo"$username"?>">
            <div></br>
                <div class="container1">
                    <input type="submit" name="edit" value="Edit Profile">
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
    $farmer_location=$_POST['farmer_location'];
    $username=$_POST['username'];

    $query = "update farmerregistration 
              set firstname = '$firstname', email = '$email',
              farmer_location = '$farmer_location', phone = $phone, username = '$username'
              where farmersID 
              in (select farmersID from farmerregistration 
              where username='$username')";
    $run = mysqli_query($con, $query);
    
    
    echo "<script>window.open('FarmerProfile.php','_self')</script>";


}
?>