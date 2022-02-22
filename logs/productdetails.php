<?php
include("../functions/function.php");
include("../includes/db.php");

?>

<html>
    <head>
        <title>
</title>
<style>
.main_container{
    display:flex;
    margin-top:10px;
    padding:40px ;
    justify-content: space-evenly;
}

.image_container{
    
    
}
.product_details{
    width:500px;
    background-color:#fCffC0;
    margin-left:20px;
    
}
.details{
    border-top:groove 1px;
}
#name{
    text-align:center;
}
</style>
</head>

<body>
    <?php

    include("../Template/header.php");
    ?>

    <div class="maincontainer">

    <div class="container1">

    <?php

    include("../includes/db.php");
    $username= $_SESSION['username'];

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM product where PID= " . $id;
        $sql = mysqli_query($con, $query);
        $result = mysqli_num_rows($sql);

        if($result >0){
            while($row = mysqli_fetch_array($sql)){
                $product_id= $row['PID'];
                $product_name= $row['pname'];
                $product_image= $row['imagename'];
                $product_price= $row['pprice'];
                $product_stock= $row['pstock'];
                $product_delivery= $row['delivery'];

                if($product_stock==0){
                    $str= "Not in stock";
                }
                else{
                    $str="In stock";
                }
                if($product_delivery=='Yes'){
                    $delivery="Delivery Available";
                }
                else{
                    $delivery="Delivery Not available";
                }

                echo"<div class='main_container'>

                <div class='image_container'>
                
                <a href='#'><img src='../Admin/product_images/$product_image' width='200px'></a>
                <div>
                <h1 id='name'>$product_name</h1>

                </div>

                </div>
                

                <div class='product_details'>
                <h2>$product_name</h2>
                <h2>Price: $product_price/= per Kg</h2>
                <div class='details'>
                <h1 id='name'>$str</h1>

                <h3>Product stock : $product_stock kgs </h3>

                </div>
                <div>
                $delivery

                </div>
                <div>
                <a href= 'deleteproduct.php?id=$product_id'><button> Delete Product </button></a>

                <a href='editproduct.php?id=$product_id'><button> Edit Product</button></a>
                <a href='#'><button>My Transactions</button></a>


                </div>

                </div>

                
                
                
                </div>";
            }
        }
    }

    ?>

</div>
</div>

<?php
include('../Template/footer.php');


?>
</body>

</html>
