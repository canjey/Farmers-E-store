
<?php
include("../includes/db.php");
include("../functions/function.php");
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
        .transaction3{
            display: flex;
            justify-content: space-evenly;
        }
        .transaction4{
            display: flex;
            justify-content: space-evenly;
        
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
            <a href="#">View Transactions</a>
        </div>
    </div>

    <div class="transaction2">
            

        </div>

        <div class="transaction3">
            <div class="detail1">
                <p>Product Name</p>
        </div>

        <div class="detail1">
                <p>Buyer Name</p>
        </div>

        <div class="detail1">
                <p>Phone</p>
        </div>
        <div class="detail1">
                <p>Pick-up Location</p>
        </div>
        <div class="detail1">
                <p>Delivery Mode</p>
        </div>
        <div class="detail1">
                <p>Payment</p>
        </div>

        <div class="detail1">
                <p>Quantity</p>
        </div>
        <div class="detail1">
                <p>Amount</p>
        </div>
        <div class="detail1">
                <p>Status</p>
        </div>

    </div>


    <?php
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            $i =0;
           
            $sql = "SELECT * FROM orders";
            $query = mysqli_query($con, $sql);
            if(mysqli_num_rows($query)){
                while($row = mysqli_fetch_array($query)){
                    $status = $row['status'];
                   
                    $location = $row['location'];
                    $quantity = $row['quantity'];
                    $total = $row['total'];
                    $delivery = $row['delivery'];
                    $buyer_id = $row['buyer_id'];
                    $product_id = $row['product_id'];
                    $sql3 = "SELECT * FROM product where PID = $product_id";
                    $query3 = mysqli_query($con, $sql3);
                    while($row3 = mysqli_fetch_array($query3)){
                        $pname = $row3['pname'];
                    }
                    $payment = $row['payment'];
                    $sql2 = "SELECT * FROM buyerregistration where buyer_id = $buyer_id ";
                    $query2 = mysqli_query($con, $sql2);

                    while($row2 = mysqli_fetch_array($query2)){
                        $name = $row2['firstname'];
                        $phone = $row2['phone'];
                    }
                    ?>

                        <div class="transaction4">
                                    <div class="detail1">
                                        <p><?php echo $pname?></p>
                                </div>

                                <div class="detail1">
                                        <p><?php echo $name?></p>
                                </div>

                                <div class="detail1">
                                        <p><?php echo $phone?></p>
                                </div>
                                <div class="detail1">
                                        <p><?php echo $location?></p>
                                </div>
                                <div class="detail1">
                                        <p><?php echo $delivery?></p>
                                </div>
                                
                                <div class="detail1">
                                        <p><?php echo $payment?></p>
                                </div>

                                <div class="detail1">
                                        <p><?php echo $quantity?></p>
                                </div>
                                <div class="detail1">
                                        <p><?php echo $total?></p>
                                </div>
                                <div class="detail1">
                                        <p><?php echo $status?></p>
                                </div>

                            </div>


                    <?php



                }$i++;
            }
            else{
                echo'';
            }

            
        }
    ?>
    

</body>

</html>