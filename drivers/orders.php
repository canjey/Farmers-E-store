<?php
include("../functions/function.php");
include("../includes/db.php");
?>

<html>
    <head>
        <title>
        </title>
    </head>
    <style>
        .setting{
        height:30px;
        background-color:#f0ff0f;
        padding:30px;
        text-align:center;
        font-weight: 100px;
    }
        @media only screen and (min-width: 768px) {
        /* For desktop: */
        .col-1 {width: 8.33%;}
        .col-2 {width: 16.66%;}
        .col-3 {width: 25%;}
        .col-4 {width: 33.33%;}
        .col-5 {width: 41.66%;}
        .col-6 {width: 50%;}
        .col-7 {width: 58.33%;}
        .col-8 {width: 66.66%;}
        .col-9 {width: 75%;}
        .col-10 {width: 83.33%;}
        .col-11 {width: 91.66%;}
        .col-12 {width: 100%;}
        }
        .container-o3{
            display: flex;
            margin-left:30%;

        }
        .container-o3 >div{
            width:100px;
        }
        .container-o1{
            padding:20px;
            
        }
        .container-o4{
        display:flex;
        margin-left:30%;
    }
        .container-o4 >div{
            width:100px;
            margin-top :20px;
        }
        .container-o6{
            display:none;
        }
        </style>
    <body>
    
    <div>

           
        <?php
            include("header.php");
        ?>
    </div>
        <div class = 'container-o3'>
        <div>
        ID
        </div>
        <div>
        Name
        </div>
        <div>
        Location
        </div>
        
        <div>
        Product_id
        </div>
        <div>
        status
        </div>
        

        </div>
        <div class ="container-o1">
            <div class = "container-05">
                <?php
                if(isset($_SESSION['username'])){
                    $username = $_SESSION['username'];
                    $sql5 = "SELECT * FROM drivers where username = '$username'";
                    $query5 = mysqli_query($con, $sql5);
                    while ($row5 = mysqli_fetch_array($query5)){
                        $driver_id = $row5['driver_id'];
                    }
                    $sql = "SELECT * FROM orders ";
                    $query = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($query)){
                        $i = 0;
                        $id  = $row['order_id'];
                        $buyer_id = $row['buyer_id'];
                        $location = $row['location'];
                        $delivery = $row['delivery'];
                        $product_id = $row['product_id'];
                        $sql2 = "SELECT * FROM buyerregistration where buyer_id = $buyer_id ";
                        $query2 = mysqli_query($con, $sql2);
                        while($row2 = mysqli_fetch_array($query2)){
                            $firstname = $row2['firstname'];
                            $image = $row2['image_filename'];
                        }

                        if($delivery == "courier"){
                            echo "
                            

                            <div class ='container-o4'>
                            <div>
                            $id
                            </div>
                            <div>
                            $firstname
                            </div>
                            <div>
                            $location
                            </div>
                            <div>
                            $product_id
                            </div>
                            <div>
                            
                            <input type = 'text' value = '$id' name = 'id' hidden >
                            <input type = 'checkbox' name ='box[]' value='check' >
                            
                            <a href = 'orderpage.php?id=$buyer_id'><button type='submit' name='deliver' id='delivery'  onclick = 'change()'> Deliver
                            
                            </button></a>
                            
                            
                            </div>
                            
                            </div>";
                        }
                        ?>
             </div>
                        <div class ="col-8 container-o6">
hwy
                <?php
                echo "<img src = '../Admin/product_images/$image ' width='200px'>$image"
                ?>
            </div>
<?php


                    }
                   
                }
            
                ?>
          
            
        </div>

        <?php
        include("../Template/footer.php");
        ?>
    </body>
</html>

    