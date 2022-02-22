<?php
include("../includes/db.php");
include("../functions/function.php")


?>

<html>
    <head><title>View Farmers</title>
    <style>
        .container1{
            display:inline-flex;
            flex-wrap: wrap;
            margin-left:5px;
            border-bottom:groove 1px;
            
        }
        
        .container2{
            
            width:100px;
        }
        .container3{
            
            width:100px;
        }
        .container4{
            
            width:100px;
        }
        .container5{
            
            width:100px;
        }
        .container8{
            
            width:100px;
        }
        .top{
            display:flex;
            justify-content: space-between;
        }
        #logs{
            margin-top: 10px;
        }
        .container-f1{
            display:flex;
            justify-content: space-evenly;
            background-color: teal;
            height: 50px;
        }
        .container-f1 >div{
            margin-top: 15px;
        }
        .image_container{
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .container-c1{
            display: flex;
        }
        </style>

</head>

<body>
    <div class="top">
        <img src="../Admin/product_images/soko.PNG" width="100px">
        
        <div id="logs">
            <a href="#">Logout</a>
        </div>
        
    </div>

    <div class="container-f1">
        <div>
            <a href="AdminHomepage.php">Home</a>
        </div>
        <div>
            <a href="product.php">View All products</a>
        </div>
        <div>
            <a href="insertproduct.php">Insert Products</a>
        </div>
        <div>
            <a href="orders.php">View Orders</a>
        </div>
        <div>
            <a href="categories.php">Add categories</a>
        </div>
    </div>

    <div class="container-c4">
        <div class="container-c5">hry
            <?php
            category();
            ?>
        </div>

    </div>
    <form action ="categories.php" method="post">
        <div class ="container-c1">
            
                <div class ="container-c2">
                    <span>New category</span>
                </div>
                <div class ="container-c3">
                    <input type="text" name="category" required>
                </div>
                
            
        </div>
        <input type ="submit" name="add" value="Add category" id="add-btn">

    </form>

    

</body>

</html>

<?php
if(isset($_POST['add'])){
    $title = $_POST['category'];
    $sql = "INSERT INTO category (cat_title) Values ('$title')";
    $query = mysqli_query($con, $sql);

    if($query){
        echo"<script>alert('Category Added')</script>";
        echo"<script>window.open('categories.php','_self')</script>";
    
    }
    else{
        echo"<script>alert('Category Not Added')</script>";
    

    }
}
?>