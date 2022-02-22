<?php


include("../functions/function.php");
include("../includes/db.php");


$username=$_SESSION['username'];
$sql="select * from drivers where username='$username' ";
$query=mysqli_query($con,$sql);
while ($row = mysqli_fetch_array($query)) {
    $firstname=$row['driver_firstname'];
    $email=$row['email'];
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
<?php
             include("header.php");
        ?>

     
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