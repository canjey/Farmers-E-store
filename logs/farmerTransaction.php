
<?php
include("../functions/function.php");
?>
<html>

<head><title>Transaction</title>
</head>
<style>
    .transaction2{
        text-align:center;
        
        border-bottom:groove;
    }

    .transaction3{
        display:flex;
        justify-content:space-between;
        background-color:#f000ff;
        margin:50px;
    }
    .transaction4{
        display:flex;
        justify-content:space-between;
        margin-left:50px;
        margin-right:50px;
       
    }
    </style>
<body>
            <?php
            include("../Template/header.php");
            ?>

            <div class="transactions">

        </div>
    <div class="transaction2">
            <h1>Order History</h1>

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

    </div>


    <?php
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            $i =0;
           
            $sql = "SELECT * FROM orders where farmer_name = '$username' ";
            $query = mysqli_query($con, $sql);
            if(mysqli_num_rows($query)){
                while($row = mysqli_fetch_array($query)){
                   
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

                            </div>


                    <?php



                }$i++;
            }
            else{
                echo'';
            }

            
        }
    ?>



        
        <div class="footer">
            <?php
            include("../Template/footer.php");
            ?>
        </div>
</body>
</html>