<?php

include("../includes/db.php");

?>


<html>
<head>
    <title>search</title>


</head>

<body>

<?php
include("header.php");

?>
<div class="container">

<?php

if (isset($_GET['search'])){
    $search_sql = $_GET['search'];

    $search_sql = "SELECT * FROM product where pname like '%$search_sql'";
    $query = mysqli_query($con, $search_sql);
    $count = mysqli_num_rows($query);

    if($count > 0){
        while($row=mysqli_fetch_array($query)){
            $product_id= $row['PID'];
            $product_price= $row['pprice'];
            $farmer_fk= $row['farmer_fk'];
            $product_image= $row['imagename'];

            $farmer_name= "select * from farmerregistration where farmersID= '$farmer_fk'";
            $name_query= mysqli_query($con, $farmer_name);

            while($rows= mysqli_fetch_array($name_query)){
                $firstname= $rows['firstname'];
            }

            echo"<div class='search_product'>

            <h3>Farmer Name: $firstname</h3>
            <h3>Price: $product_price/=</h3>

            <a href='#'><img class='image_container' src='../Admin/product_images/$product_image' height='300px'></a>
            
            </div>
            
            ";

        }
    }

    else
    echo"<h2>Product Not Available</h2>";

}

?>

</div>

<?php
include("../Template/footer.php");

?>


</body>


</html>