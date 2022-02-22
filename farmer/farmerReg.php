<html>
<head><title>Registration</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Yatra+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Yatra+One&display=swap" rel="stylesheet">

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
</style>
<body>
  <form action="farmerReg.php" method="post">
<div class=" col-12 freg_container">

<div class="col-4 freg_details">
<h2 style="font-family: 'Yatra One', cursive;">Soko</h2>

<h1 style="font-family: 'Yatra One', cursive;"> Create Account</h1>

<input type="text" name="firstname"placeholder="First Name"></br>
<input type="text" name="lastname"style="margin-top:10px;" placeholder="Last Name"></br>
<input type="text" name="username"style="margin-top:10px;"placeholder="username"></br>
<input type="text" name="email"style="margin-top:10px;"placeholder="Email"></br>
<select name="homeplace" style="margin-top:10px;"onchange="places()" id="place">
  <option value="Nairobi">Nairobi</option>
  <option value="Kiambu">Kiambu</option></select></br>

<select name="location" style="margin-top:10px;" id="location">
<option value="Location">location</option>
</select></br>
<input type="password" name="password"style="margin-top:10px;"placeholder="password"></br>
<input type="password" name="cpassword"style="margin-top:10px;"placeholder="Confirm Password"></br>
<input type="submit" name="register"style="margin-top:10px;"id="submit" value="continue"></br>
<span style="margin-left:70px;">-or-</span></br>
<button id="facebookbtn"><i class="fab fa-facebook"></i><span id="label">facebook</span></button></br>
<button id="googlebtn"><i class="fab fa-google"></i><span id="label">Google</span></button></br>
<a href="#">Log In</a>
</div>
<div class="freg_image">

<img src="../images/farmer.jpg" alt="soko" width="500px" height="530px">
</div>


</div>

</form>
</body>


<script>

  function places(){
    var home=document.getElementById("place").value;
    if(home==="Nairobi"){
      var array=['Kahawa','Embakasi','Roysambu'];
    }
    else if(home==="Kiambu"){
      var array=['Kiambu Town','Juja','Thika'];
    }
    var string = "";
            for (let i = 0; i < array.length; i++) {
                string = string + "<option>" + array[i] + "</option>";

            }
            string = "<select name = 'location'>" + string + "</select>"
            document.getElementById('location').innerHTML = string;
        
}
  </script>


</html>
<?php

include("../includes/db.php");

if (isset($_POST['register'])){

    $firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$username=$_POST['username'];
		$email=$_POST['email'];
  $homeplace=$_POST["homeplace"];
  $location= $_POST["location"];
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];

  $sql= "INSERT INTO farmerregistration (firstname,lastname,username,email,homeplace,location,password) VALUES('$firstname','$lastname','$username','$email','$homeplace','$location','$password')";
  if (mysqli_query($conn, $sql)){

    echo "<script>window.open('home.php','_self')</script>";
  }

}
else{
  echo"wtf";
}


?>


?>