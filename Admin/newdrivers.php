<?php
include("../includes/db.php");
include("../functions/function.php");


?>

<html>
    <head>
        <title>
            Delivery
        </title>
    </head>
    <style>
        .container-d1{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            background-color: teal;
            height:50px;
        }
        #title{
            text-align: center;
        }
        .container-d1 >div{
            margin-top: 15px;
        }
        .container-d1 >div >a{
            text-decoration: none;

        }
        .freg_container{

padding:0px 150px;
margin-top:0px;
height:500px;
}
.freg_details{
width:40%;
margin-left:40px;
display: flex;
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
.details input[type="text"]{
    height:30px;
}
.details input[type="password"]{
    height:30px;
}
        </style>
    <body>
                <div class="top">
                    <img src="../Admin/product_images/soko.PNG" width="100px">
                    
                    
                    
                </div>
                    <?php
                    if(isset($_SESSION['username'])){
                        echo"<div class = 'container-d1'>";
                        echo"<div><a href='AdminHomepage.php'>Home</a></div>";
                        echo"<div><a href='newdrivers.php'>Insert Drivers</a></div>";
                        echo"<div><a href='view.php'>View Drivers</a></div>";
                        echo"<div><a href='delete.php'>Delete Drivers</a></div>";
                        echo"<div><a href='activity.php'>View Activity</a></div>";
                        echo"</div>";
                    }
                    else{
                        echo"<div><a href='logout.php'>logout</a></div>";
                    }
                    
                    ?>
                    <div class ="container-d2">
                    <form action="newdrivers.php" method="post" enctype="multipart/form-data">
                    <h2 id="title" style="font-family: 'Yatra One', cursive;">Soko</h2>

                        <h1 id="title"style="font-family: 'Yatra One', cursive;"> Create Account</h1>

                <div class="container">
                    

                    <div class=" freg_details">
                        

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
                                Profile:  <input type="file"  name="image_filename" > 
                                </div>
                                <div id="farmerform">
                                    <input type="text" id="number" name="phone" placeholder="Phone Number" required> 
                                </div>
                                <div id="farmerform">
                                    <input type="password" id="password" name="password" placeholder="password"> 
                                </div>
                                <div id="farmerform">
                                    <input type="password" id="cpassword" name="cpassword" placeholder="confirm password"> 
                                </div>
                                <div id="farmerform">
                                    <input type="submit" id="submit" name="register" value="Register">
                                </div>

                                <div id="farmerform">
                                    <span style="margin-left:80px;">-or-</span></br>
                                    <button id="facebookbtn"><i class="fab fa-facebook"></i><span id="label">facebook</span></button></br>
                                    <button id="googlebtn"><i class="fab fa-google"></i><span id="label">Google</span></button></br>
                                </div>

                        </div>

                        <div class="freg_image">

                            <img src="../Admin/product_images/delivery.jpeg" alt="soko" width="500" height="530px">
                        </div>
                    </div>
                </form>
                    </div>
                    

                    <?php
                    include("../Template/footer.php");
                    ?>
    </body>
</html>

<?php
if(isset($_POST['register'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if($password !== $cpassword){
        echo"<script>alert('Passwords do not match')</script>";
    }
    else{
        $sql = "INSERT INTO drivers(driver_firstname, driver_lastname, email, username, phone, password, cpassword) VALUES
         ('$firstname', '$lastname', '$email','$username','$phone', '$password', '$cpassword')";
         $query = mysqli_query($con, $sql);
         if($query){
             echo"<script>alert('Insert Successful')</script>";
             echo"<script>window.open('view.php','_self')</script>";
         }
         else{
             echo"<script>alert('Try Again Later')</script>";
         }
         $_SESSION['username'] = $username;
    }
}
?>