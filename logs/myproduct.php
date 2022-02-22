<?php
include("../includes/db.php");

include("../functions/function.php");

?>

<html>
    <head><title>
        Myproducts
</title>
<style>

    .products{
        display:flex;
        margin:20px 20px;
    }
    .productdetails{
        margin-top:5px;
    }
    .myproducts{
        
        
        padding:30px;
        border-radius:5em;
        display:flex;
        flex-wrap:wrap;
    }
    .allproducts{
        width:300px;
        text-align:center;
    }
    .adding_products{
        margin-top:20px;
        width:300px;
    }
    .imagecontainer{
        margin-top:-30px;
        display:flex;
        flex-wrap: wrap;
        padding: 20px;
        
        
       
        
        
    }
    .image1container{
        width:200px;
        margin-left: 20px;
    }
    .pbox{
        height:200px;
        width:200px;
        
    }
    </style>
    </head>
    <body>
        <?php
        include("../Template/header.php");
        ?>
        
<div class="products">
    <div class="allproducts">
        <h3>All products</h3>
        <h5>Click product to edit</h5>
</div>
    <div class="adding_products">
        <?php
        if(isset($_SESSION)){
            echo"<a href='insertproduct.php'><button>Add New Product</button></a>";

        }

        else{ 
            echo "<a href='farmerlogin.php'>";

        }
       

        ?>
    </div>
         
    

</div>

<div class="myproducts">

    <div class="imagecontainer">
        
        <?php
        if(isset($_SESSION['username'])){
            $username=$_SESSION['username'];
            getfarmerproducts();
        }
        else{
            echo"<script>alert('login')</script>";
        }

        ?>
    </div>
        
 </div>
<?php
include("../Template/footer.php");
?>

    </body>
</html>

