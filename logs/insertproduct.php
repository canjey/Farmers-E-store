<?php
session_start();
$username=$_SESSION['username'];

$con=mysqli_connect("localhost","root","","soko");

if(mysqli_connect_errno()){
    echo"could not connect".mysqli_connect_error();
}
?>

<html>
    <head><title>Admin Homepage</title>

    <style>
    .product{
        margin-top:5px;
        width: 200px;
        margin: 20px 50px;
       
        height: 40px;
    }
        .product_form{
            
    
    margin-left:20%;
    margin-right:auto;
   
    
    border-radius:.5em;
        }

.product_form select{
    height:40px;
    width: 200px;
}


    .product_form input[type="text"]{

        
        width:100%;
        height:30px;
    }
    .product_form input[type="date"]{

margin:10px -2px;
width:100%;
height:30px;
}

    .header{
        border-style:groove;
        border-radius:5em;
        background-color:#f0f0ff;
        text-align:center;
    }
    .main_body{
        display: flex;

    }
    .name{
        width: 200px;
        margin: 20px 50px;
        background-color: #80F0C0;
        height: 40px;
        text-align:center;
    }
    #inproduct{
        width: 100px;
        height:30px;
        margin-left:50%;
        margin-right:50%;
    }
        </style>

</head>
    <body>
        



<div class="product_form">
    <form action="insertproduct.php" method="post" enctype="multipart/form-data">
        <div class="header">
        <h2>Insert your products</h2>
</div>
    <div class="main_body">
        <div class="name">
            <span> Product Name
</div>
        <div class="product">
         <input type="text"placeholder="Product Name" name="pname">
</div>

</div>
<div class="main_body">
        <div class="name">
            <span> Product Category
</div>
<div class="product">
        <select name="pcategory" required>
            <option>Select a category</option>

            <?php
            $get_cat="select *from category";
            $run_cat=mysqli_query($con,$get_cat);
            while($row_cat=mysqli_fetch_array($run_cat)){
                $cat_id=$row_cat['cat_id'];
                $cat_title=$row_cat['cat_title'];
                echo"<option value='$cat_title'>$cat_title</option>";
            }

            ?>
        </select>
</div>
        </div>

        <div class="main_body">
        <div class="name">
            <span> Expiry Date
</div>
<div class="product">
        <input type="date"placeholder="Product Expiry" name="pexpiry">
</div>

        </div>

        <div class="main_body">
        <div class="name">
            <span> Product Stock
</div>

<div class="product">
        <input type="text"placeholder="Product Stock (In Kg)" name="pstock">
</div>
        </div>

        <div class="main_body">
        <div class="name">
            <span> Product Price
</div>
<div class="product">
        <input type="text"placeholder="Product Price" name="pprice">
</div>
        </div>

        <div class="main_body">
        <div class="name">
            <span> Product Desription
</div>
<div class="product">
        <textarea  placeholder="Product Description" name="pdescription"></textarea>
</div>
        </div>
<div class="product">
    <h3>Delivery</h3>
<input type="radio" id="yes" name="delivery" value="Yes">Yes
<input type="radio" id="no"name="delivery" value="No">No
        </div>
        <div class="main_body">
        <div class="name">
            <span> Product Image
</div>
        <div class="product">
    <input type= "file" name="imagename" value=""/>
        </div>
        </div>

<input type="submit" id="inproduct"name="insert_product" value="Add Product">
 
</form>
</div>
</body>

<script>
   
    </script>

</html>

<?php

    if(isset($_POST['insert_product'])){
        $pname=$_POST['pname'];
        $pcategory=$_POST['pcategory'];
        $pexpiry=$_POST['pexpiry'];
        $pstock=$_POST['pstock'];
        $pprice=$_POST['pprice'];
        $pdescription=$_POST['pdescription'];
        $delivery=$_POST['delivery'];


        $imagename = $_FILES['imagename']['name'];
        $tempname = $_FILES['imagename']['tmp_name'];  // for server


        if(isset($_SESSION['username'])){
            move_uploaded_file($tempname, "../Admin/product_images/$imagename");

            
            $username=$_SESSION['username'];
            $get_id="select * from farmerregistration where username='$username'";
            $run=mysqli_query($con,$get_id);
            $row=mysqli_fetch_array($run);
            $id=$row['farmersID'];
        
            $insert= "INSERT INTO product(farmer_fk,pname,pcategory,pexpiry,pstock,pprice,pdescription,delivery,imagename)VALUES
            ('$id','$pname','$pcategory','$pexpiry','$pstock','$pprice','$pdescription','$delivery','$imagename')";

            $check_query=mysqli_query($con,$insert);
            echo"<script>alert('Successful inserted');</script>";
            echo "<script>window.open('myproduct.php','_self')</script>";


        }
        else {
            echo"<script>alert('Error');</script>";
        }
    }
?>




