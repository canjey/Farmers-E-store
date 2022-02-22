
<?php

include("../includes/db.php");
include("../functions/function.php");

?>
<html>
<head>
<title> Home</title>
<meta name="viewport" content="width=device-width initial-scale=1">
<script src="https://kit.fontawesome.com/7e66ffa18d.js" crossorigin="anonymous"></script>

<style>
.menu1{

display:flex;
justify-content:center;
justify-content:space-between;
margin-left:-30px;
}
.menu1 a{
margin-top:15px;
margin-left:20px;
color:black;
text-decoration:none;
}

.content{
display:none;
}
.content a{
display:block;
padding:2px;
}
.login-dropdown{
position:relative;
display:inline-block;
margin-top:15px;
}
.login-dropdown:hover .content{
display:block;
}
.menu1 a:link{
color:green;
}

.menu1 a:hover{
color:red;
}
header{
display:flex;
justify-content:space-between;
width:90%;
padding:5px ;
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



@media screen and (max-width:600px)
{

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
}
.main{
display:flex;
padding:30px;
}
.menu2{

width:200px;
}
.menu2 a{
color:black;
text-decoration:none;
}
.menu2 a:hover{
color:red;
}
.welcome{
margin-left:50px;
background-image:url("farmer.jpg");
text-align:center;
background-image:url('../images/pears.jpg');

}
.section2{
margin:10px 10px;
text-align:center;
margin-left:50px ;

}
.products-on-sale{

display:flex;
flex-wrap:wrap;
grid-template-columns:220px 220px 220px 220px;
grid-row-gap:10px;
justify-content:center;

}
.products-on-sale img{
width:200px;
height:200px;
overflow:hidden;
}
.moreproducts{
display:flex;
padding-left:0px;

text-align:center;
height:300px

}
.prod_img{
    position:relative;
    transition: transform 0.5s;

}


.header2{
    background-color:#458B00;
    display:flex;
    flex-wrap:wrap;
    width:100%;
    justify-content:space-between; 

}
.main_header3{
    display:flex;
    justify-content:space-between;
    flex-wrap:wrap;
}
.main_header3> div{
    margin-left:200px;
    flex-wrap:wrap;
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
flex-wrap:wrap;
justify-content:space-between;
margin:20px 30px;
}
.upper_footer{
background-color:#f0f0f0;
}
.product3_head{
text-align:center;
}
#price{
    margin-top: -30px;
    font-weight: 900;
}
.products_3{

display:flex;
margin:20px 50px;
justify-content:center;
}
.main_container3{
background-color:#f0f0f0;
}

@media screen and (max-width:600px){
.products-on-sale{

display:flex;
grid-template-columns:auto auto;
flex-wrap:wrap;


}
}
.image_container{
    display:flex;
    flex-wrap:wrap;
    margin-left: 50px;
}
.image_veg{
    
    display:flex;
    flex-wrap:wrap;
}
.section2{
    display:flex;
    flex-wrap:wrap;
}



.tophead{
    display:flex;
    justify-content:space-between; 
   
}

.setting{
        height:30px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        background-color:#f0ff0f;
        padding:30px;
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

    #details{
        text-align:center;
        border-bottom:groove 1px;
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
    .container-b1{
        display: flex;
        flex-wrap: wrap;
        justify-content: space-evenly;
    }

</style>
</head>
<body>
        <header>
            <div class="logo">
                <img src="../images/soko.png" height="50px" width="200px">
            </div>
            <div class="menu1">
                <a href="../logs/farmerHomepage.php">Farmer</a>
                <a href="home.php">Buyers</a>
                <a href="../drivers/home.php">Delivery</a>
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
    <div class="main">
    <div class="menu2">
    <h3>Categories</h3>

    <?php

    getcat();

    ?>
    </div>
    <div class="welcome">
    
    <h2> Soko is a store where you can sell and shop all farm produce that you would wish to</br>
    have at the comfort of your house</h2>
    <p>With this web application, you need not to go to the store</p>
    </div>
    </div>
    <div class="moreproducts">
    <div class="product1">
    <h3>Vegetables</h3>
    <p>Get fresh vegetables from the farm in wholescale and in small quantity depending on your choice
    <p>
    </div>
    <div class="product2">
    <h3>Fruits</h3>
    <p>Fruits are available at all season and you can get them at the comfort of your house. In both large scale and small scale
    </p>
    </div>
    <div class="product3">
    <h3>Farm Equipments</h3>
    <p>You dont have to worry again while looking for farm equipments. Get them in this store at your convenience
    </p>
    </div>
    <div class="product4">
    <h3>Fertilisers</h3>
    <p>Are you a farmer and are looking for the best place to buy fertilisers??</br>
    Look no more. Shop with us at your conveniency</p> 
    </div>
    </div>

    <h3 id='details'> Products On Sale</h3>
    <div class="section2">
    <?php
        getproductshomepage();
        ?>

    </div>
    <div class="products-on-sale">
    <div class="prod_img">
    <div class="best">
        <h2 id='details'>Best selling products</h2>
        <div class="image_container">
        <?php
        cart();
        getproducts();
        ?>

        </div>

    </div>
    </div>
    </div>

        <h2 id='details'> Vegetables</h2>

    <div class="image_container">
        <div class="image_veg">
        <?php
        gethomevegetables();
        ?>
        </div>
 
    </div>

    <h2 id='details'> Cereals</h2>
    <div class="image_container">
        <div class="image_veg">
        <?php
        gethomecereals();
        ?>

    </div>


    </div>

    <h2 id='details'>Fresh Fruits</h2>

    <div class="image_container">
        <?php
        gethomefruits();

        ?>


    </div>

    <div class="main_container3">
        <div class="product3_head">
            <h3>Soko store</h3>
            <p>Our Store contains fresh foods sold in large scale and also small scale</p>
        </div>

        <div class="products_3">
            <div class="container3">
                <h2>Fresh Vegetables</h2>
                <p>Fresh Vegetables are available</p>
            </div>
            <div class="container3">
                <h2>High Quality</h2>
                <p>This is the best place to get quality products</p>
            </div>
            <div class="container3">
                <h2>Sale</h2>
                <p> We provide variety of products that can be used in the kitchen</p>
            </div>
            <div class="container3">
                <h2>Prices</h2>
                <p>Our prices for the products are pocket friendly</p>
            </div>
            
        </div>
    </div>
    <h2 style="text-align:center;">The blogs</h2>

    <div class ="container-b1">
        <?php
        gethomeblogs()
        ?>
    </div>
    




    <?php
    include("../Template/footer.php");
    ?>

</body>

</html>