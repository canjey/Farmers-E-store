<?php
include("../includes/db.php");


?>
<style>
    .farmer_container{
        display:flex;
        width:500px;
    }

</style>
<html>
<body>

<?php
include("header.php");
?>

<div class="farmer_container">
<?php
getfarmers();

?>
</div>
<?php
include("../Template/footer.php");
?>


</body>

</html>