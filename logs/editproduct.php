<?php

include("../includes/db.php");
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM product where PID =" . $id;
    $query = mysqli_query($con, $sql);
    if ($query) {
        while ($row = mysqli_fetch_array($query)) {

            $pname = $row['pname'];
            $pprice = $row['pprice'];
            $pstock = $row['pstock'];
            $category = $row['pcategory'];
            $pexpiry = $row['pexpiry'];
            $pdescription = $row['pdescription'];
            $pimage = $row['imagename'];
            $delivery = $row['delivery'];
        }
    }
}

?>

<html>

<head>
    <title>


    </title>
</head>

<body>
    <div class="product_form">
        <form  action="<?php echo "editproduct.php?id=$id" ?>" method="post" enctype="multipart/form-data">
            <div class="header">
                <h2>Insert your products</h2>
            </div>
            <div class="main_body">
                <div class="name">
                    <span> Product Name
                </div>
                <div class="product">
                    <input type="text" value="<?php echo $pname; ?>" name="pname">
                </div>

            </div>
            <div class="main_body">
                <div class="name">
                    <span> Product Category
                </div>
                <div class="product">
                    <select name="pcategory"  required>
                        <option>Select a category</option>
                        <option value="<?php echo $category; ?>" selected ><?php echo $category; ?></option>
                        <?php
                        $get_cat = "select *from category";
                        $run_cat = mysqli_query($con, $get_cat);
                        while ($row_cat = mysqli_fetch_array($run_cat)) {
                            $cat_id = $row_cat['cat_id'];
                            $cat_title = $row_cat['cat_title'];
                            if($cat_title != $category){
                                echo "<option value='$cat_title'>$cat_title</option>";
                            }
                            
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
                    <input type="date"  name="pexpiry" value="<?php echo $pexpiry?>">
                </div>

            </div>

            <div class="main_body">
                <div class="name">
                    <span> Product Stock
                </div>

                <div class="product">
                    <input type="text" placeholder="Product Stock (In Kg)" value="<?php echo $pstock?>"name="pstock">
                </div>
            </div>

            <div class="main_body">
                <div class="name">
                    <span> Product Price
                </div>
                <div class="product">
                    <input type="text" placeholder="Product Price" name="pprice" value="<?php echo $pprice?>">
                </div>
            </div>

            <div class="main_body">
                <div class="name">
                    <span> Product Desription
                </div>
                <div class="product">
                    
                    <textarea  name="pdescription" ><?php echo"$pdescription"?></textarea>
                </div>
            </div>
            <div class="product">
                <h3>Delivery</h3>
                <input type="radio" id="yes" name="delivery" value="Yes"  
                <?php echo $delivery == 'Yes' ?  'checked' :  ''; ?>>Yes
                <input type="radio" id="no" name="delivery" value="No" 
                <?php echo $delivery == 'No' ?  'checked' :  ''; ?>>No
            </div>
            

            <input type="submit" id="inproduct" name="edit_product" value="Edit Product">

        </form>

</body>

</html>

<?php

    if(isset($_POST['edit_product'])){
        
        $pname=$_POST['pname'];
        $pcategory=$_POST['pcategory'];
        $pexpiry=$_POST['pexpiry'];
        $pstock=$_POST['pstock'];
        $pprice=$_POST['pprice'];
        $pdescription=$_POST['pdescription'];
        $delivery=$_POST['delivery'];


        
        if(isset($_SESSION['username'])){
           

            $insert= "UPDATE  product SET pname ='$pname', pcategory ='$pcategory',pexpiry ='$pexpiry'
            ,pstock = '$pstock', pprice ='$pprice', pdescription ='$pdescription', delivery ='$delivery' WHERE PID = $id";

            $check_query=mysqli_query($con,$insert);
            echo"<script>alert('Successful edited');</script>";
            echo "<script>window.open('ProductDetails.php?id=$id','_self')</script>";


        }
        else {
            echo"<script>alert('Error');</script>";
        }
    }
?>
