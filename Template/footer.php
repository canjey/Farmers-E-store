<?php
    
    include("../includes/db.php");

?>
<html>
    <head><title>Footer</title>
</head>
<style>
    




footer{

background-color:#666666;
text-align:center;
margin-bottom:0;
height:20px;
}
.upper_footer{
display:flex;
margin-bottom:0;
}

.footer1{
 width:400px;
 margin-left:20px;
 line-height:8px;
}
.footer2{
margin-left:100px;
width:400px;
}
#subscribe{
display:flex;
flex-direction:column;
width:200px;
margin-left:50px;
justify-content:right;
}


.upper_footer{
background-color:#f0f0f0;
}


@media screen and (max-width:600px){
.products-on-sale{

display:grid;
grid-template-columns:auto auto;

}
}
    </style>
<body>
<div class="upper_footer">
<div class="footer1" style="text-align:center;">
<p>Contact Us</p>
<h3>Address Information</h3>
<h5>Nairobi Store</h5>
<p>IMF Building</p>
<p>Ground floor</p>
<p>Kenyatta Avenue</p>
<p>Monday-Friday:9am to 5pm</p>
</div>
<div class="footer2">
<p>Talk to Us</p>
<h3>Get In Touch</p>

<p>The purpose of the store is to provide farm products to you at your convenience
</p>
<p id="subscribe">
<form action = "<?php echo"../Template/footer.php"?>" method ="post">
    <p><input type="text" placeholder="Name" name = "name"></p>
    <p><input type="text" placeholder="Phone Number" name = "phone"></p>
    <p><input type="text" placeholder="Email"  name = "email"></p>
    <p><input type="textbox" placeholder="Message" name ="message"></p>
    <p><input type="submit" value="SUBMIT" name ="send"></p>
</form>
</p>
</div>
<div class="footer3">
<h3>Our social Handles</h3>
<p><a href="#">Twitter</a></p>
<p><a href="#">Instagram</a></p>
<p><a href="#">facebook</a></p>
</div>
</div>
<footer>
<p>copyright 2021 Carol- All rights reserved</p>
</footer>
</body>
</html>

<?php
if(isset($_POST['send'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $sql = "INSERT INTO information (name,email,phone,message) VALUES
    ('$name','$email','$phone','$message')";
    $query = mysqli_query($con, $sql);
    echo $name. $phone. $email. $message;
    if($query){
        echo"<script>alert('Message Sent')</script>";
        echo"<script>window.open('../buyer/home.php')</script>";
    }
    else{
        echo"check internet connection";
    }
}

?>