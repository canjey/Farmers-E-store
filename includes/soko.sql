
DROP TABLE if exists farmerRegistration;
DROP TABLE IF exists admin;

CREATE TABLE farmerRegistration(
    farmersID int PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR (50),
    lastname VARCHAR (50),
    username VARCHAR (50),
    email VARCHAR (20),
    homeplace varchar (20),
    location VARCHAR (20),
    password VARCHAR (20)
);

CREATE TABLE admin(
    adminID int(50) PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR (50),
    password VARCHAR (50)
);

INSERT INTO admin('adminID','username','password') VALUES
(1,'canjey','123456');








if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    $get_ID="SELECT * FROM admin where username=$username ";
    $run=mysqli_query($con, $get_ID);
    $row=mysqli_fetch_array($run);
    $ID=$row['adminID'];
    $sql="INSERT INTO product(admin_fk,pname, pcategory,pexpiry,pstock,pprice,pdescription,delivery,farmer_fk)VALUES 
('$ID','$pname','$pcategory','$pexpiry', '$pfile','$pstock', '$pprice','$pdescription','$delivery')";

}




$insert_product=mysqli_query($con, $sql);

if($insert_product){
    echo"<script>alert('Successful')</script>";
}
else {echo "<script>alert('Error')</script>";
echo"<script>window.open('AdminHomepage.php',_self)</script>";

}

}
else echo"Not working";

<?php

if(isset($_POST['insert_product'])){
$pname=$_POST['pname'];
$pcategory=$_POST['pcategory'];
$pexpiry=$_POST['pexpiry'];
$pstock=$_POST['pstock'];
$pprice=$_POST['pprice'];
$pdescription=$_POST['pdescription'];
$delivery=$_POST['delivery'];



$insert= "INSERT INTO product(pname,pcategory,pexpiry,pstock,pprice,pdescription,delivery)VALUES('$pname','$pcategory','$pexpiry','$pstock','$price','$pdescription','$delivery')";

$check_query=mysqli_query($con,$insert);
echo"<script>console.log('Successful');</script>";
echo "<script>window.open('Admin.php','_self')</script>";

}
else{
    echo"<script>alert('button not set');</script>";
}
?>




<?php

if(isset($_POST['insert_product'])){
$pname=$_POST['pname'];
$pcategory=$_POST['pcategory'];
$pexpiry=$_POST['pexpiry'];
$pstock=$_POST['pstock'];
$pprice=$_POST['pprice'];
$pdescription=$_POST['pdescription'];

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $getting_id = "select * from admin where username = $username";
    $run = mysqli_query($con, $getting_id);
    $row = mysqli_fetch_array($run);
    $id = $row['adminID'];
    $insert= "INSERT INTO product(adminID,pname,pcategory,pexpiry,pstock,pprice,pdescription,delivery)
    VALUES('$id',$pname','$pcategory','$pexpiry','$pstock','$price','$pdescription','$delivery')";

$check_query=mysqli_query($con,$insert);
if($check_query){
echo"<script>console.log('Successful');</script>";
echo"<script>window.open('Admin.php','_self');</script>";
}
else{
    echo"<script>alert('Error');</script>";

}
}
else{
    echo"<script>alert('not working');</script>";
}
}
else{
    echo"<script>alert('button not set');</script>";
}
?>
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

<select name="flocation" style="margin-top:10px;" id="location">
<option value="Location">location</option>
</select></br>
<input type="password" name="fpassword"style="margin-top:10px;"placeholder="password"></br>
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



if (isset($_POST['register'])){

    $firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$username=$_POST['username'];
		$email=$_POST['email'];
  $homeplace=$_POST['homeplace'];
  $flocation= $_POST['flocation'];
  $fpassword=$_POST['fpassword'];
  $cpassword=$_POST['cpassword'];

  $sql= "INSERT INTO farmerregistration (firstname,lastname,username,email,homeplace,flocation,fpassword) 
  VALUES('$firstname','$lastname','$username','$email','$homeplace','$flocation','$fpassword')";
  if ($sql){

    echo "<script>window.open('farmerHomepage.php','_self')</script>";
  }

}
else{
  echo"wtf";
}


?>