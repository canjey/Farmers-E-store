<?php


include("../functions/function.php");
include("../includes/db.php");


$username=$_SESSION['username'];
$sql="select * from buyerregistration where username='$username' ";
$query=mysqli_query($con,$sql);
while ($row = mysqli_fetch_array($query)) {
    $firstname=$row['firstname'];
    $email=$row['email'];
    $buyer_location=$row['buyer_location'];
    $phone = $row['phone'];
}

?>

<html>
    <head><title>
        Farmer profile
</title>
<style>
    .container1{
        display:flex;
        
    }
    .tophead{
    display:flex;
    justify-content:space-between; 
   
}
header{
display:flex;
justify-content:space-between;
flex-wrap:wrap;
}
.search{
justify-content: flex-right;
margin-right:50px;
margin-top:15px;
}
#search_btn{
width:60px;
height:20px;
cursor:pointer;
background-color:#f000f0;
border:none;
border-radius:5px;
outline:none;

}
#search_btn:hover{
background-color:blue;
color:white;
}
#search_text{
border:none;
border-left:groove;
border-right:groove;
}
.setting{
        height:30px;
        background-color:#f0ff0f;
        padding:30px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        text-align:center;
        font-weight: 100px;
        min-width: 0;
    }
.setting a{
        text-decoration:none;
        margin:50px 30px;
        margin-top:10px;
        text-align:center;
        
    }
    .menu1 a:link{
color:green;
}

.menu1 a:hover{
color:red;
}
    

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
.container1{
            display:flex;
            margin:20px;
        }
        .container input[text]{
            height:30px;
        }
        .name{
            width:150px;
            background-color:#f000c0;
            height:30px;
        }
        #editprofile{
            margin-left:100px;
        }
        .container1{
            margin-left:100px;
        }
        #profile{
        width:60px;
        height:50px;
        border-radius:50%;
    }
    #status{
        margin-left:120px;
        margin-top: -20px;
    }
    </style>
</head>
<header>
<div class="logo">
<img src="../images/soko.png" height="50px" width="200px">
</div>
<div class="menu1">
<a href="#">Home</a>
<a href="#">About Us</a>
<a href="#">Blog</a>
</div>

<div class="search">
<form action="search.php" method="get">

<input type="text" placeholder="search product" id="search_text" name="search">
<input type="submit" id="search_btn" value="Search">
</form>
</div>
<div>
<i class="fas fa-shopping-cart"></i><a href="#">0</a>
</div>

<div class="greetings">
            <h2>    <?php getbuyerusername();
                ?>
                </h2>
    </div>

</div>
</header>


</div>
<div class="setting"> 
           
             <?php
             if(isset($_SESSION['username'])){
                echo"<div><a href='home.php' class='dropdown_item'>Home</a></div>";
                echo"<div> <a href='buyerprofile.php' class='dropdown_item'>Profile</a> </div>";
                echo"<div> <a href='transaction.php' class='dropdown_item'>Transactions</a> </div>";
                echo"<div> <a href='farmers.php' class='dropdown_item'>Farmer</a> </div>";
                echo"<div> <a href='#' class='dropdown_item'>Messages</a> </div>";
                echo"<div> <a href='logout.php' class='dropdown_item'>Log out</a> </div>";

    }
    else{
        echo"<a href='home.php' class='dropdown_item'>Home</a>";
         echo"<a href='login.php' class='dropdown_item'>Profile</a>";
        echo"<a href='login.php' class='dropdown_item'>Transactions</a>";
        echo"<a href='login.php' class='dropdown_item'>Product</a>";
        echo"<a href='login.php' class='dropdown_item'>Log In</a>";
            }
    ?>
</div>
</div>
</div>


</div>
</div>
<form action ="editprofile.php" method="post">
<div class="maincontainer">
        <div class="container1">
            <div class="name">
            <label>First Name</label>

            </div>
            <div>
            <input type="text" name="firstname" value="<?php echo"$firstname"?>" disabled >

            </div>

        </div>

        <div class="container1">
        <div class="name">
            <label>Email</label>

            </div>
            <div>
            <input type="text" name="email" value="<?php echo"$email"?>" disabled >

            </div>

        </div>

        <div class="container1">
        <div class="name">
            <label>Location </label>

            </div>
            <div>
            <input type="text" name="buyer_location" value="<?php echo"$buyer_location"?>" disabled>

            </div>

        </div>

        <div class="container1">
        <div class="name">
            <label>Phone Number </label>

            </div>
            <div>
            <input type="text" name="phone" value="<?php echo"$phone"?>" disabled>

            </div>

        </div>

        <div class="container1">
        <div class="name">
            <label>Username</label>

            </div>
            <div>
            <input type="text" name="username" value="<?php echo"$username"?>" disabled>

            </div>

        </div>


            
            
                <div class="container1">
                    <input type="submit"  id="editprofile" value="Edit Profile">
</div>
</div>
        
<?php
include("../Template/footer.php");
?>
</form>
</body>
</html>