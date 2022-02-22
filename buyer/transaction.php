<?php
include("../includes/db.php");


?>


<html>
    <head>

    </head>
    <style>
        #transaction{
            text-align: center;
            border-bottom: groove 1px;
        }
        .main{
            display: flex;
            justify-content: space-around;
            border-left: groove;
            border-bottom: groove;
            background-color: greenyellow;
            height:35px;
            margin-left: 20px;

        }
        .main> div{
            border-right:groove;
            justify-content: space-around;
            width:100px;
        }
        .main> span{
            text-align: center;
        }
        .main2{
            display:flex;
            justify-content: space-around;
            height:30px;
            margin-left: 20px;
            border-left:groove;
            border-right:groove;
        }
        .main2> div{
            width:100px;
            

        }
        #continue{
            height:40px;
        }


    </style>


    <body>
        
        <?php
        include("header.php");

        ?>

        <h3 id ="transaction">Your Transactions</h3>

        <div class="main">
        <div class="main1">
                <span>
                     No

                </span>

            </div>
            <div class="main1">
                <span>
                    Farmer Name

                </span>

            </div>
            <div class="main1">
                <span>
                    Phone

                </span>

            </div>
            <div class="main1">
                <span>
                    Delivery County

                </span>

            </div>
            <div class="main1">
                <span>
                    Delivery Location

                </span>

            </div>
            <div class="main1">
                <span>
                    Product Name

                </span>

            </div>
            <div class="main1">
                <span>
                    Quantity

                </span>

            </div>
            <div class="main1">
                <span>
                    Delivery Mode

                </span>

            </div>
            <div class="main1">
                <span>
                    Payment Mode

                </span>

            </div>
            <div class="main1">
                <span>
                    Amount
                </span>

            </div>

            <?php
                if(isset($_SESSION['username'])){
                    $username = $_SESSION['username'];
                    $sql="SELECT * FROM buyerregistration where username = '$username' ";
                    $query = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_array($query)){
                        $buyer_id = $row['buyer_id'];
                        $sql2 = "SELECT * FROM orders where buyer_id = $buyer_id ";
                        $query2 = mysqli_query($con, $sql2);
                        
                        if(mysqli_num_rows($query2)>0){
                            while($row2 = mysqli_fetch_array($query2)){
                                $i = 0;
                                $county = $row2['county'];
                                $location = $row2['location'];
                                $quantity = $row2['quantity'];
                                $delivery = $row2['delivery'];
                                $payment = $row2['payment'];
                                $phone = $row2['phonenumber'];
                                $total = $row2['total'];
                                $name = $row2['farmer_name'];
                                $product_id = $row2['product_id'];
                                $sql4 = "SELECT * FROM product WHERE PID = $product_id ";
                                $query4 = mysqli_query($con, $sql4);
                                while($row4 = mysqli_fetch_array($query4)){
                                    $pname = $row4['pname'];
                                }

                                
                                
                                ?>
                                 </div>
                                <div class="main2">
                                    <div class="main1">
                                            <span>
                                            <?php echo $i + 1;?>

                                            </span>

                                        </div>
                                        <div class="main1">
                                            <span>
                                            <?php echo $name;?>
                                            </span>

                                        </div>
                                        <div class="main1">
                                            <span>
                                            <?php echo $phone;?>

                                            </span>

                                        </div>
                                        <div class="main1">
                                            <span>
                                            <?php echo $county;?>

                                            </span>

                                        </div>
                                        <div class="main1">
                                            <span>
                                            <?php echo $location;?>
                                            </span>

                                        </div>
                                        <div class="main1">
                                            <span>
                                            <?php echo $pname;?>


                                            </span>

                                        </div>
                                        <div class="main1">
                                            <span>
                                            <?php echo $quantity;?>

                                            </span>

                                        </div>
                                        <div class="main1">
                                            <span>
                                            <?php echo $delivery;?>

                                            </span>

                                        </div>
                                        <div class="main1">
                                            <span>
                                            <?php echo $payment;?>

                                            </span>

                                        </div>
                                        <div class="main1">
                                            <span>
                                            <?php echo $total;?>
                                            </span>

                                        </div>


                                    </div>
                                
        <?php   


                                


                            } $i++;
                        }

                    }


                }

        ?>
                                </div>
                                <p >
                                <div>
                                   <a href="home.php"> <button id="continue" >
                                        Continue Shopping

                                    </button></a>

                                </div>
                                </p>

        
       <div>
        <?php
        
            include("../Template/footer.php");

        ?>
       </div>
    </body>


</html>