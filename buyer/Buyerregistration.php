
<?php
include("../includes/db.php");

?>
<html>
<head><title>Registration</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Yatra+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Yatra+One&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/7e66ffa18d.js" crossorigin="anonymous"></script>
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
margin:0px 16px;
height:550px;

min-width:400px;
}
.freg_image{
margin-top:10px;

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
#facebookbtn:hover{
background-color:gray;
color:red;
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
#googlebtn:hover{
background-color:gray;
color:red;
}
#label{
padding-left:10px;
}

</style>
<body>
    <form action="Buyerregistration.php" method="post" enctype="multipart/form-data">
<div class=" col-11 freg_container">

<div class="col-4 freg_details">
<h2 style="font-family: 'Yatra One', cursive;">Soko</h2>

<h1 style="font-family: 'Yatra One', cursive;"> Create Account</h1>

<input type="text" name="firstname" placeholder="First Name" required></br>
<input type="text" name="lastname" style="margin-top:10px;" placeholder="Last Name" required></br>
<input type="text" name="username" style="margin-top:10px;"placeholder="username" required></br>
<input type="text" name="email" style="margin-top:10px;"placeholder="Email" required></br>
<input type="text" name="buyer_location" style="margin-top:10px;"placeholder="Location" required></br>
<input type="text" name="phone" style="margin-top:10px;"placeholder="Phone Number" required></br>
Profile:  <input type="file"  name="image_filename" required> </br>
<input type="password" name="buyer_password" style="margin-top:10px;"placeholder="password" required></br>
<input type="password" name="confirm_password" style="margin-top:10px;"placeholder="Confirm Password" required></br>
<input type="submit" style="margin-top:10px;"id="submit" name="register" value="continue"></br>
<span style="margin-left:80px;">-or-</span></br>
<button id="facebookbtn"><i class="fab fa-facebook"></i><span id="label">facebook</span></button></br>
<button id="googlebtn"><i class="fab fa-google"></i><span id="label">Google</span></button></br>
</div>
<div class="freg_image">

<img src="../images/store.jpg" alt="soko" width="500px" height="530px">
</div>


</div>

</form>
</body>




</html>

<?php

if(isset($_POST['register'])){

    $firstname=$_POST['firstname'];
    $lastname= $_POST['lastname'];
    $username= $_POST['username'];
    $email= $_POST['email'];
    $buyer_location= $_POST['buyer_location'];
    $phone = $_POST['phone'];
    $buyer_password=$_POST['buyer_password'];
    $confirm_password=$_POST['confirm_password'];
    $image_filename = $_FILES['image_filename']['name'];
    $tempname = $_FILES['image_filename']['tmp_name'];

    $query= "select * from buyerregistration where username= '$username' Limit 1";
    $result= mysqli_query($con, $query);

    $user=mysqli_fetch_array($result);

    if($user['username']===$username){

        echo"<script>alert('User available')</script>";
    }

    else{
      move_uploaded_file($tempname, "../Admin/product_images/$image_filename");
      $status = "Online";
    $sql="INSERT INTO buyerregistration (firstname, lastname, username, email, buyer_location, phone, image_filename, buyer_password, confirm_password, status)
    values('$firstname', '$lastname', '$username', '$email', '$buyer_location', $phone, '$image_filename', '$buyer_password', '$confirm_password', '$status')";
    $run_query=mysqli_query($con, $sql);
    echo"<script>alert('Successful');</script>";
    echo"<script>window.open('login.php','_self');</script>";
    }
}
?>