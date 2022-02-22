<?php

include("../includes/db.php");
include("../functions/function.php");

?>

<html>

<meta name="viewport" content="width=device-width initial-scale=1">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<script src="https://kit.fontawesome.com/7e66ffa18d.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Yatra+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Yatra+One&display=swap" rel="stylesheet">


<head>
    <title> Homepage</title>

    <style>
    .container10{
        width:250px;
        height:300px;
        margin-left:auto;
        margin-right:auto;
    }

    .container11{
        
        height:80px;
        display:flex;
        justify-content:space-between;
        flex-wrap: wrap;
       
    }
    .container12{
        display:flex;
    }
    

    .upper_container{
        display:flex;
        margin-left:100px;
        flex-wrap: wrap;
    }

    .upper_container >div{
        margin:  20px;
    }
    #menu1{
        width:100px;
        height:30px;
    }
    .image_container{
        display:flex;
        margin-left:50px;
        flex-wrap: wrap;
    }
    .search{
        margin-top:30px;
        
    }
    .icon2{
        margin-top:30px;
    }
    .search input{
        width:200px;
        height:30px;
    }

    .logs{
        margin-top:30px;
    }
    .setting{
        margin-top: 30px;
        display:right;
        margin-left:30px;
    }
    .cartcontainer{
        margin-top:30px;
    }
    #searchbtn{
        height:30px;
        width:80px;
    }
    .container11 >div{
        margin-left:50px;
        flex-wrap: wrap;
    }




    </style>

   
</head>

<body>


<div class="container">
<div class="container11">
    <div class="logo">
        <img src="../images/soko.png" width="200px" height="80px">
    </div>
    <div class="search">
        <form action="search.php" method="get">
        <input type="text" placeholder="vegetable, Cereals or Fruits">
        <input type="submit" id="searchbtn" value="search">

    </form>
    </div>
    <div class="logs">
        <?php
        if(isset($_SESSION['username'])){
            echo"<a href='#'>Home</a>
            <a href='#'>Home</a>
            <a href='#'>Home</a>
            <a href='#'>Home</a>
            <a href='logout.php'>Log out</a>";
        }
        else{
            echo"<a href='#'>Log in</a>";
        }


        ?>
    </div>
    <div class="setting">
        <button type="button">Setting</button>
        <div id="show" style="display:none;">
        <?php

        if(isset($_SESSION['username'])){
            echo"
            <a href='#'>Profile</a>";
            echo"<a href='#'>Transaction</a>";
            echo"<a href='#'>Wishlist</a>";
            echo"<a href='#'>Farmers</a>";
            echo"<a href='#'>Logout</a>";

            
            
        }

        else{
            echo"<a href='#'>Log in</a>";
        }
        ?>
        </div>

    </div>
    <div class="icon2">
                    <a href="CartPage.php"> <img src='../images/carticons.png' height='20px'></a>
                    <span id="icon" style="color:green"> <?php echo totalItems(); ?> </span>
    </div>

</div>
    <div class="upper_container">

    <div class="container12">
        <button id="menu1" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true"> Fruits </button>
        <ul class="dropdown-menu"><?php
        getFruits();
        ?>
        </ul>


    </div>

    <div class="container12">
        <button id="menu1"> Vegetables </button>
        <ul class="dropdown-menu"><?php
        getVegetables();
        ?>

    </ul>


    </div>
    <div class="container12">
        <button id="menu1"> Cereals </button>
       <ul class="dropdown-menu"> <?php
        getCereals();
        ?>

    </ul>


    </div>
    </div>



    <div class="container10">
        <img src="../images/Coconut.jpg" width="300px" height="300px">

    </div>

    

</div>


<h2>Fresh Fruits</h2>

<div class="image_container">
    <?php
    gethomefruits();

    ?>


</div>

<h2> Vegetables</h2>

<div class="image_container">
    <?php
    gethomevegetables();
    ?>


</div>

<h2> Cereals</h2>
<div class="image_container">
    <?php
    gethomecereals();
    ?>


</div>

<div class="products">
    <h2>Products on sale</h2>
    <div class="image_container">
    <?php
    getproductshomepage();
    ?>

    </div>




</div>

<div class="best">
    <h2>Best selling products</h2>
    <div class="image_container">
    <?php
    cart();
    getproducts();
    ?>

    </div>

</div>

<?php

include("../Template/footer.php");

?>
</body>



</html>