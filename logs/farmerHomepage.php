<?php
include("../functions/function.php");
?>

<html>
    <head><title>Home Page</title>
    <script src="https://kit.fontawesome.com/7e66ffa18d.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width initial-scale=1">


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

.tophead{
    display:flex;
    justify-content:space-between; 
   
}
.featurecontainer{
    display:flex;
    min-width: 0;
}
.fcontainer1{
    border:groove;
    border:1px;
    width:300px;
    margin:10px 50px;
}
#status{
    margin-left:120px;
    margin-top: -20px;
    text-decoration-color: red;
}

    </style>
</head>
    <body>

    <div>

           
       <?php
             include("../Template/header.php");
        ?>
    </div>
 
    

</div>
<div class="container3">
    <img src="../images/pears.jpg" height="400px" width="500px"alt="photo">

</div>

<div class="featurecontainer">

<div class="fcontainer1">
    <h2><i class="fas fa-sms">SMS SYSTEM</i></h2>
    <img src="../images/sms.png" width=200px;>
    <p>Upload and Edit your product via SMS</p>
</div>
<div class="fcontainer1">
    <h2> <i class="fas fa-users">BUYER CONNECTION</i></h2>
    <img src="../images/connection.png" width=200px;>
    <p>Get in direct touch with the buyer to satisfy their needs</p>
</div>
<div class="fcontainer1">
    <h2>FARMER GROUP FORMATION </h2>
    <img src="../images/group.png" width=200px;>
    <p>Get in touch with other farmers across the country</p>
</div>



 </div>
        




<?php

include("../Template/footer.php");
?>



    </body>
</html>