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
    <head><title>
        Farmer profile
</title>
<style>
    .setting{
        height:30px;
        background-color:#f0ff0f;
        padding:30px;
        text-align:center;
        font-weight: 100px;
    }
    .setting a{
        text-decoration:none;
        margin:50px 30px;
        margin-top:10px;
        text-align:center;
        
    }
    .container3{
width:250px;
height:400px;
margin-left:auto;
margin-right:auto;
margin-top:10px;
}

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

.blogs{
display:flex;
justify-content:space-between;
margin:20px 30px;
}
.upper_footer{
background-color:#f0f0f0;
}
.container4{
    display:flex;
    margin-left:200px;
}
.features1{
    width:300px;
    border-style:groove;
}
.features2{
    width:300px;
    border-style:groove;
}
.features3{
    width:300px;
}
.tophead{
    display:flex;
    justify-content:space-between; 
   
}
.productmain {
    height:200px;
    border-style:groove;
    border-radius:5em;
    padding:60px;
    background-color:#f0ffff;
    margin: auto;
    width: 60%;
    
}
.details{
    margin-top:10px;
}
.details input[type="text"]{
    width: 200px;
    height:30px;
    border-radius:5em;
    
}
#edit{
    border-radius:5em;
    height:40px;
    width:150px;
    cursor:pointer;
}
#edit:hover{
background-color:#20639B;
}
    </style>
</head>
<body>
    <form action="farmerEditprofile.php" action="post">
<div class="tophead">
    <div class="logo">
            <img src="../images/soko.png" height="50px" width="200px">
    </div>
</div>
<div class="setting"> 
           
             <?php
             if(isset($_SESSION['username'])){
                         echo"<a href='farmerHomepage.php' class='dropdown_item'>Home</a>";
                          echo"<a href='farmerprofile.php' class='dropdown_item'>Profile</a>";
                          echo"<a href='farmerTransaction.php' class='dropdown_item'>Transactions</a>";
                          echo"<a href='myproduct.php' class='dropdown_item'>Product</a>";
                         echo"<a href='logout.php' class='dropdown_item'>Log out</a>";
        
    }
    else{
        echo"<a href='farmerHomepage.php' class='dropdown_item'>Home</a>";
         echo"<a href='farmerlogin.php' class='dropdown_item'>Profile</a>";
        echo"<a href='farmerlogin.php' class='dropdown_item'>Transactions</a>";
        echo"<a href='farmerlogin.php' class='dropdown_item'>Product</a>";
        echo"<a href='farmerlogin.php' class='dropdown_item'>Log In</a>";
            }
    ?>
</div>
     
<div class="productmain">
    <div class="details">
      <label>Name:</label>
      <input type="text" value="<?php echo $firstname; ?>" disabled>
    </div> 
    <div class="details">
      <label>Email:</label>
      <input type="text" value="<?php echo $email; ?>" disabled>
    </div>
<div class="details">
      <label>Location:</label>
      <input type="text" value="<?php echo $farmer_location; ?>" disabled>
</div>
<div class="details">
      <label>Phone Number:</label>
      <input type="text" value="<?php echo $phone; ?>" disabled>
</div>
<div class="details">
      <label>username:</label>
      <input type="text" value="<?php echo $username; ?>" disabled>
</div> 
<div class="details">
    <input type="submit" id="edit" value="Edit profile">

        </div>

        </div>
<?php
include("../Template/footer.php");
?>
</form>
</body>
</html>