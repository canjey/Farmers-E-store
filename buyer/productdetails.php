<?php

include("../includes/db.php");


?>

<html>

<head><title></title>

</head>

<style>
.detailss{
    display:flex;
    flex-wrap:wrap;
    padding:30px;
    margin:30px 30px;
    border-style:groove;
}
.image_container{

border-right:groove 1px;

}
.details_products{
width:300px;
}
.farmer_details{
    width:350px;
    
}
#all{
    text-align:center;
}
</style>

<body>

<?php

include("header.php");
?>

<div class="container">
    <div class="product">

    <?php
    cart();
    productdetails();
    ?>
<?php
include("../Template/footer.php");

?>

</body>

</html>