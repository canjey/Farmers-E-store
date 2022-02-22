<?php

include("../includes/db.php");
include("../functions/function.php");
?>

<html>
    <head><title>Farmer profile</title>
    </head>

    <style>
        .container{
            display:flex;
            flex-wrap:wrap;
            border-style:groove;
            
            padding:40px;
            margin:20px 20px;
        }
        .details_container{
            width:300px;
            margin:40px 40px;
        }
        .others{
            width:400px;
           
            
            padding:40px 60px;
            
        }

        
        #all{
            text-align:center;
            border-bottom:groove 1px;
            
        }
        #profile{
            width:60px;
            border-radius: 50%;
        }
        .container-f1{
            display:flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
        }


    </style>

    <body>
       
            <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $sql = "SELECT * FROM product where PID = $id";
                $query= mysqli_query($con, $sql);
                while($row= mysqli_fetch_array($query)){
                    $farmer_fk= $row['farmer_fk'];

                    $name="select * from farmerregistration where farmersID= $farmer_fk";
                    $query_name= mysqli_query($con, $name);

                    while($rowname= mysqli_fetch_array($query_name)){
                        $id = $rowname['farmersID'];
                        $image = $rowname['image_filename'];
                        $firstname= $rowname['firstname'];
                        $lastname= $rowname['lastname'];
                        $email= $rowname['email'];
                        $location= $rowname['farmer_location'];
                        $phone = $rowname['phone'];

                        echo"<div class='container'>
                        
                        <div class='details_container'>
                        <h2> <img src='../Admin/product_images/$image' id='profile'> $firstname  $lastname
                        <h2>$email
                        <h2><img src='../images/location.jpg' height='20px'>$location
                        <h2>$phone</h2>
                        </div>
                        
                        <div class='others'>
                        <span>
                        Have Some query?

                        </span>
                        <a href='messagedetails.php?id=$id'><button>
                        Chat Here <img src='../images/chat2.png'>

                        </button></a>

                        </div>

                        </div>

                        
                        
                        ";

                        echo"<h2 id='all'>Farmers All Products</h2>";
?>
                    <div class = "container-f1">
                <?php
                        $others = "SELECT * FROM product where farmer_fk = $id";
                        $sql = mysqli_query($con, $others);
                        while($rowothers = mysqli_fetch_array($sql)){
                            $id = $rowothers['PID'];
                            $product_name = $rowothers['pname'];
                            $product_stock = $rowothers['pstock'];
                            $product_image = $rowothers['imagename'];

                            echo"

                            <div class ='other_details'>
                                <div class='img_container'>
                                    <a href='productdetails.php?id=$id'><img src='../Admin/product_images/$product_image' height='200px'>
                                    </a>

                                </div>

                                <div class='product_details'>

                                    $product_name
                                    $product_stock
                                    
                                </div>
                        
                            </div>
                    ";

                        
                        }
                        

                    }
                }

            }
            ?>
        </div>


    </body>







</html>