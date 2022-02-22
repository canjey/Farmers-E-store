<?php
include("../includes/db.php");

?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM blogs where blog_id = $id";
    $query = mysqli_query($con, $sql);
    if($query){
        while($row = mysqli_fetch_array($query)){
            $title = $row['blog_title'];
            $image = $row['image'];
            $description = $row['description'];

        }
    }

}

?>


<html>
    <head>
        <title>
        </title>
    </head>
    <style>
        .container-b1{
            display:flex;
            margin-top: 50px;
            margin-left:50px;
            padding:50px;
        }
        .container-b3{
            margin-left: 30px;
        }

    </style>
    <body>
        <?php
        include("header.php");
        ?>

        <div class ="container-b1">
            <div class="container-b2">
                <?php
                echo"<img src='../Admin/product_images/$image' width='200px'>";

                ?>
            </div>
            <div class="container-b3">
                <?php
                echo"$title </br>";
                echo $description;
                ?>

            </div>

        </div>
        <?php
        include("../Template/footer.php");
        ?>

    </body>

</html>