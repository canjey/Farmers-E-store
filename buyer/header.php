<?php
include("../includes/db.php");
include("../functions/function.php");

?>


<html>
    <head><title>Header
</title>
<style>
    .container1{
        display:flex;
        justify-content:space-between;
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
        
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        text-align:center;
        font-weight: 100px;
        min-width: 0;
    }
.setting a{
        text-decoration:none;
        
        margin-top:10px;
        text-align:center;
        
    }
    .menu1 a:link{
color:green;
}

.menu1 a:hover{
color:red;
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

<body>

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
            <a href="cartpage.php"><img src="../images/carticons.png"><?php $temp = totalItems(); echo" $temp "?></a>
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
                echo"<div> <a href='message.php' class='dropdown_item'>Messages</a> </div>";
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


</body>


</html>