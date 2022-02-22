<?php


$con=mysqli_connect("localhost","root","","soko");

if(mysqli_connect_errno()){
	echo "couldnt connect".mysqli_connect_error();
}
?>



<html>
<head><title>Registration</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<script src="https://kit.fontawesome.com/7e66ffa18d.js" crossorigin="anonymous"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Yatra+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Yatra+One&display=swap" rel="stylesheet">
<meta name="google-signin-client_id" content="1090075603131-npff2sntj3115iikqnbe7m5dadacopbk.apps.googleusercontent.com">

</head>
<style>
[class*="col-"] {
  float: left;
  padding: 15px;
}
@media only screen and (min-width: 768px) {
  /* For desktop: */
  .col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
  .col-3 {width: 25%;}
  .col-4 {width: 33.33%;}
  .col-5 {width: 41.66%;}
  .col-6 {width: 50%;}
  .col-7 {width: 58.33%;}
  .col-8 {width: 66.66%;}
  .col-9 {width: 75%;}
  .col-10 {width: 83.33%;}
  .col-11 {width: 91.66%;}
  .col-12 {width: 100%;}
}

.freg_container{

padding:0px 150px;
margin-top:0px;
height:500px;
}
.freg_details{
 width:40%;
 margin-left:40px;
}

#submit{
background-color:#F08080;
width:170px;
height:40px;
border-style:none;
border-radius:5px;
cursor:pointer;
}
#submit:hover{
background-color:#20639B;
color:white;
}
#facebookbtn{
background-color:#20639B;
width:170px;
height:40px;
border-style:none;
border-radius:5px;
cursor:pointer;
}
#googlebtn{
background-color:#FFA500;
width:170px;
height:40px;
border-style:none;
border-radius:5px;
cursor:pointer;
margin-top:5px;
}
#label{
padding-left:10px;
}
select{
  width: 170px;
  height:30px;
  
}
.container{
  padding:20px;
  display:flex;
  
}
#farmerform{
  margin:10px 10px;
  
  
}
</style>
<body>
  <form action="farmerReg.php" method="post" enctype="multipart/form-data">
    <div class="container">

    <div class=" freg_details">
        <h2 style="font-family: 'Yatra One', cursive;">Soko</h2>

        <h1 style="font-family: 'Yatra One', cursive;"> Create Account</h1>


<div class=" details">
  <div id="farmerform">
    <input type="text" id="firstname" name="firstname" placeholder="firstname" required> 
</div>
<div id="farmerform">
    <input type="text" id="lastname" name="lastname" placeholder="lastname" required> 
</div>
<div id="farmerform">
    <input type="text" id="username" name="username" placeholder="username" required> 
</div>
<div id="farmerform">
    <input type="text" id="email" name="email" placeholder="Email"required> 
</div>

<div id="farmerform">
    <input type="text" id="location" name="farmer_location" placeholder="location" required> 
</div>
<div id="farmerform">
  Profile:  <input type="file"  name="image_filename" required> 
</div>
<div id="farmerform">
    <input type="text" id="number" name="phone" placeholder="Phone Number" required> 
</div>
<div id="farmerform">
    <input type="password" id="password" name="farmer_password" placeholder="password"> 
</div>
<div id="farmerform">
    <input type="password" id="cpassword" name="confirm_password" placeholder="confirm password"> 
</div>
<div id="farmerform">
<input type="submit" id="submit" name="register" value="Register">
</div>

<div id="farmerform">
<span style="margin-left:80px;">-or-</span></br>
<button id="facebookbtn"><i class="fab fa-facebook"></i><span id="label">facebook</span></button></br>
<button class="g-signin2" id="googlebtn"  data-onsuccess="onSignIn"><i class="fab fa-google"></i><span id="label">Google</span></button></br>
</div>
</div>
</div>

<div class="freg_image">

<img src="../images/farmer.jpg" alt="soko" width="500" height="530px">
</div>
</div>
</form>
</body>

</html>

<?php

$error=array();
if(isset($_POST['register'])){

  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $username=$_POST['username'];
  $email=$_POST['email'];
  $farmer_location=$_POST['farmer_location'];
  $phone= $_POST['phone'];
  $farmer_password=$_POST['farmer_password'];
  $confirm_password=$_POST['confirm_password'];

  $image_filename = $_FILES['image_filename']['name'];
  $image_filename_tmp = $_FILES['image_filename']['tmp_name'];
  
  

  $sql="select * from farmerregistration where username='$username' LIMIT 1 ";
  $query=mysqli_query($con,$sql);
  $user=mysqli_fetch_array($query);
  

  
  // if user exists
    if ($user['username'] === $username)
{
   echo"<script>alert('user registered')</script>";

  }
  
  elseif ($farmer_password!==$confirm_password){
    echo"<script>alert('passwords do not match')</script>";
  }

else{
 
  move_uploaded_file($tempname, "../Admin/product_images/$image_filename");
  $status = "Online";
  $encrypt_pass = md5($farmer_password);
  $encrypt_cpass = md5($confirm_password);
  $insert="INSERT INTO farmerregistration(firstname,lastname,username,email,farmer_location,phone,farmer_password,confirm_password,image_filename,status) 
  VALUES('$firstname','$lastname','$username','$email','$farmer_location',$phone,'$farmer_password','$confirm_password','$image_filename','$status')";

  $check_query=mysqli_query($con,$insert);
  echo"<script>alert('Successful log in');</script>";
  echo "<script>window.open('farmerlogin.php','_self')</script>";
  
}
}

?>

<script>
  function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
}
  </script>