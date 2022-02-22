<?php
include("../functions/function.php");

?>

<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <a href="https://icons8.com/icon/83325/roman-soldier"></a>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
</head>
    <style>
        
    

    .myfooter {
        background-color: #292b2c;

        color: goldenrod;
        margin-top: 15px;
    }

    .aligncenter {
        text-align: center;
    }

    a {
        color: goldenrod;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    nav {
        background-color: #292b2c;
    }

    .navbar-custom {
        background-color: #292b2c;
    }

    /* change the brand and text color */
    .navbar-custom .navbar-brand,
    .navbar-custom .navbar-text {
        background-color: #292b2c;
    }

    .navbar-custom .navbar-nav .nav-link {
        background-color: #292b2c;
    }

    .navbar-custom .nav-item.active .nav-link,
    .navbar-custom .nav-item:hover .nav-link {
        background-color: #292b2c;
    }


    .mybtn {
        border-color: green;
        border-style: solid;
    }


    .right {
        display: flex;
    }

    .left {
        display: none;
    }

    .cart {

        margin-right: -9px;
    }

    .profile {
        margin-right: 2px;

    }

    .login {
        margin-right: -2px;
        margin-top: 12px;
        display: none;
    }

    .searchbox {
        width: 60%;
    }

    .lists {
        display: inline-block;
    }

    .moblists {
        display: none;
    }

    .logins {
        text-align: center;
        margin-right: -30%;
        margin-left: 35%;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table td,
    .table th {
        padding: 8px 8px;
        border: 0.5px solid black;
        text-align: center;
        font-size: 16px;
        background-color: white;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 0px solid #dee2e6;
    }

    .table th {
        background-color: #292b2c;
        color: goldenrod;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f5f5f5;
    }

    .add {
        width: 40%;
    }

    @media only screen and (min-device-width:320px) and (max-device-width:480px) {


        .right {
            display: none;
            background-color: #ff5500;

        }


        .left {
            display: flex;
        }

        .moblogo {
            display: none;
        }

        .logins {
            text-align: center;
            margin-right: 35%;
            padding: 15px;
        }

        .searchbox {
            width: 95%;
            margin-right: 5%;
            margin-left: 0%;
        }

        .moblists {
            display: inline-block;
            text-align: center;
            width: 100%;
        }

        .table thead {
            display: none;
            background-color: #292b2c;
            color: goldenrod;
        }

        .table,
        .table tbody,
        .table tr,
        .table td {
            display: block;
            width: 100%;

        }

        .table tr {
            margin-bottom: 15px;

        }

        .table td {
            text-align: right;
            padding-left: 50%;
            text-align: right;
            position: relative;


        }

        .table td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            width: 50%;
            padding-left: 15px;
            font-size: 15px;
            font-weight: bold;
            text-align: left;
            /* background-color: #292b2c;
        color: goldenrod; */
        }

        .add {
            width: auto;
        }

        .emptycart {
            /* margin-left: 20%;
            width:80%;  */
            float: none;
            text-align: center;

        }

        .continueshopping {
            /* margin-top:20%;
            margin-left: 20%;  */
            float: none;
            text-align: center;
            margin-top: -20%;

        }

        .grandtotal {
            /* margin-right: 20%; */
            float: none;
            margin-top: 40%;
        }
    }
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
.table_content{
    display:flex;
    
}
.table_content> div{
    width:200px;
}
.container_details{
    display: flex;
}
.container_details> div{
    width: 200px;
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





<div class="container">

<?php
if (isset($_SESSION['username'])) {
    $temp = totalItems();
    echo   "<div class='text-left'>
                <h3>Your Items :- $temp</h3>
                <hr>";
}
?>

<table class="table">
    <thead>
        <th>S.No</th>
        <th>Item Name</th>
        <th>Unit Price </th>
        <th style="width:25%;">Quantity</th>
        <th>Subtotal</th>
        <th>Delete</th>
    </thead>

    <?php
    $total = 0;
    global $con;
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $sel_price = "select * from cart where username = '$username'";
        $run_price = mysqli_query($con, $sel_price);

        $qtycart = array();
        $i = 0;
        while ($p_price = mysqli_fetch_array($run_price)) {
            $product_id = $p_price['PID'];
            $_SESSION['qtycart'][$i] = $p_price['quantity'];

            $pro_price = "select * from product where PID = $product_id";
            $run_pro_price = mysqli_query($con, $pro_price);
            while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                $product_title = $pp_price['pname'];
                $product_price = $pp_price['pprice'];
                $subtotal = $_SESSION['qtycart'][$i] * $product_price;
                echo"$subtotal";

    ?>



                <!-- <td class="tdy" data-label="quantity"><a style="color:black;margin-right:12px;" href="MinusQty.php?id=<?php echo $product_id; ?>"><label class="add ladd"><i style="padding: 4px;" class=" icon left  fas fa-minus">
                            </label></a></i>
                        <input type="number" oninput="this.value = Math.abs(this.value)" min="1" value='<?php echo $_SESSION['qtycart'][$i]; ?>' name="qty" style="width:40px; "><a style="color:black;margin-left:4px;" href="AddQty.php?id=<?php echo $product_id; ?>"><label class="add radd">
                                <i style="padding: 4px;" class="icon right  fas fa-plus"></label></a></i></td>
                    </td> -->


                <tbody>
                    <tr>
                        <td data-label="S.No" style="font-size:20px;"><?php echo $i + 1; ?></td>
                        <td data-label="Item Name " style="font-size:20px;"><?php echo $product_title; ?></td>
                        <td data-label="Unit Price" style="font-size:20px;"><?php echo $product_price; ?></td>

                        <td data-label="Quantity p-0 " style="padding-top:1.5%;padding-bottom:-2%">
                            <div class="d-flex justify-content-center " style="width:90%;padding-left:10%;">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <a href="AddQty.php?id=<?php echo $product_id; ?>">
                                            <button class="btn btn-outline-secondary" style=" background-color:#292b2c;" type="button" id="button-addon1">
                                                <b style="color:goldenrod"><i class="fas fa-plus"></i></b>
                                            </button>
                                        </a>
                                    </div>
                                    <input type="number" class="form-control" oninput="this.value = Math.abs(this.value)" min="1" value='<?php echo $_SESSION['qtycart'][$i]; ?>' name="qty" placeholder="1" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <div class="input-group-append">
                                        <a href="MinusQty.php?id=<?php echo $product_id; ?>">
                                            <button class="btn btn-outline-secondary" style=" background-color:#292b2c;" type="button" id="button-addon2">
                                                <b style="color:goldenrod"><i class="fas fa-minus"></i></b>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>


                        <?php $subtotal = $_SESSION['qtycart'][$i] * $product_price; ?>
                        <?php
                        $subquery = "update cart set subtotal = $subtotal where PID = $product_id";
                        $run = mysqli_query($con, $subquery);
                        ?>

                        <td data-label="Subtotal" style="font-size:20px;"><?php echo $subtotal; ?></td>
                        <?php $total = $total + $subtotal ?>
                        <td data-label="Delete" style="font-size:20px;"><a href="deleteproduct.php?id=<?php echo $product_id; ?>" id="Deletionlink"><i class="far fa-times-circle"></i></a></td>
                    </tr>
        <?php
            }
            $i++;
        }
    } else {
        echo "<h1 align = center>Please Login First!</h1><br><br><hr>"; 
    } ?>

                </tbody>
</table>

</div>

</div>


<div class="container">
<div class="float-none float-sm-none float-md-none float-lg-left float-xl-left  emptycart">
    <a href="emptycart.php">
        <button type="button" class="btn btn-lg  border border-dark " style="font-size:22px;color:black;background-color:#FFD700">Empty Cart
            <i class="fas fa-shopping-cart ml-1"></i></button>
    </a>
</div>
<!-- <div class="grandtotal  float-none float-sm-none float-md-none float-lg-right float-xl-right"></div><br> -->
<br>
<div class=" float-none float-sm-none float-md-none float-lg-right float-xl-rightcheckout mr-0 p-2 border border-dark  " style="border-radius:5%;">

    <h2>Grand total = <?php echo $total; ?> </h2>




    <?php
    if (isset($_SESSION['username'])) {
        $sel_price = "select * from cart where username = '$username'";
        $run_price = mysqli_query($con, $sel_price);
        $count = mysqli_num_rows($run_price);
        if ($count > 0) {
            echo "<a href='checkout.php'>
                        <button type='button' class='btn btn-lg border border-dark d-flex mx-auto' style='font-size:22px;color:black;background-color:#FFD700'>
                            Checkout<i class='fas fa-arrow-right ml-2 mt-2 mb-1'></i>
                        </button>
                    </a>";
        } else {

            echo "<a href='Includes/alert.php'>
                        <button type='button' class='btn btn-lg border border-dark d-flex mx-auto' style='font-size:22px;color:black;background-color:#FFD700'>
                            Checkout<i class='fas fa-arrow-right ml-2 mt-2 mb-1'></i>
                        </button>
                    </a>";
        }
    } else {

        echo "<a href='../auth/BuyerLogin.php'>
                        <button type='button' class='btn btn-lg border border-dark d-flex mx-auto' style='font-size:22px;color:black;background-color:#FFD700'>
                            Checkout<i class='fas fa-arrow-right ml-2 mt-2 mb-1'></i>
                        </button>
                    </a>";
    }

    ?>

</div>


















<?php $_SESSION['grandtotal'] = $total; ?>
<br>
<br>
<div class=" float-none float-sm-none float-md-none float-lg-left float-xl-left continueshopping mt-5">
    <a href="home.php"><button type="button" class="btn btn-lg  border border-dark " style="font-size:22px;color:black;background-color:#FFD700">Continue Shopping
            <i class="fas fa-shopping-bag ml-1"></i></button></a>
</div>
    </body>

</html>