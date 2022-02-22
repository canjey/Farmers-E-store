<?php
    include("../functions/function.php");
    include("../includes/db.php");

?>
<html>
    <head>
        <title>

        </title>


    </head>
    <script>
        function countyname(){
            var a = document.getElementById("county").value;
            if (a==="Nairobi"){
                var array=["Westlands","Dagoretti","Kasarani","Starehe","Embakasi","Langata"];
            }
            else if(a==="Kiambu"){
                var array=["Gatundu South", "Gatundu North","Juja","Thika","Ruiru","Kiambaa","Limuru"];
            }

            var string ="";
            for(let i = 0; i< array.length; i++){
                string = string + "<option>" + array[i] + "</option>";

            }
            string = "<select name ='lol'> " +string + "</select>"
            document.getElementById("location").innerHTML = string;
        }

    </script>
    <style>
        .main{
            display:flex;
            justify-content: space-around;
        }
        .area2{
            display:flex;
            margin:5px;
        }
        .area2 select{
            height:30px;
            width:150px;
        }
        .name{
            background-color: #8fc80f;
            width:150px;
        }
        .main3{
            display:flex;
            justify-content: space-around;
            
            
        }
        .main3>div{
            width:200px;
            border-right: groove;
        }
        #items{
            border-bottom: groove 1px;
            text-align: center;
        }
        .main5{
            align-content: right;
        }
        

    </style>

    <body>
        
            <div class ="main">
                <div class="logo">
                            <a href="home.php"><img src="../images/soko.png" height="50px" width="200px"></a>
                </div>
                <div class="menu1">
                            <a href="#">Home</a>
                            <a href="#">About Us</a>
                            <a href="#">Blog</a>
                </div>

                        <div class="search">
                            <form action="search.php" method="get">

                            <input type="text" placeholder="search product" id="search_text" name="search">
                            <input type="submit" id="search_btn" value="Search">
                            </form>
                        </div>
                        
                        <div>
                        <a href="cartpage.php"><img src="../images/carticons.png"><?php $temp = totalItems(); echo" $temp "?></a>
                        </div>

            </div>
        <form action="checkout.php" method="POST" name="myform">

            <div class="main2">
                <div class="area">
                    <h3>Select Your Area of Collection</h3>
                    <p>
                        <div class="area2">
                        <div class="name"> County name </div>
                            <div>
                                <select name="county" id="county" onchange="countyname()" required>
                                <option value="0">--Select County--</option>
                                <option value="Nairobi">Nairobi</option>
                                <option value="Kiambu">Kiambu</option>
                            </div>


                            </select>
                        </div>
                    </p>
                </div>
                

                <div class="area2">

                
                    
                    <div class ="name"> Location</div>
                    <div>
                        <select name="location" id="location" required>
                        <option>--Select Location--</option>
                

                        </select>
                    </div>
                    
                </div>

               

            </div>

            <h3 id="items">Check your Items </h3>
            <div class="main3">
                

                <div>
                    <span>No </span>

                </div>
                <div>
                    <span>Name </span>

                </div>
                <div>
                    <span>Total </span>

                </div>
                <div>
                    <span>Delivery Options </span>

                </div>

            </div>
            <?php
                if(isset($_SESSION['username'])){
                    $username = $_SESSION['username'];
                    global $con;
                    $sql_buyer = "SELECT * FROM buyerregistration where username = '$username' ";
                    $query_buyer = mysqli_query($con, $sql_buyer);
                    while($buyer_row = mysqli_fetch_array($query_buyer)){
                        $buyer_id= $buyer_row['buyer_id'];
                    
                        $phone = $buyer_row['phone'];
                        $sql = "SELECT * FROM cart where username = '$username' ";
                        $query = mysqli_query($con, $sql);
                        $i = 0;
                        $subtotal = 0;

                        $allproducts = array();
                        $allqty = array();
                        $alltotal = array();
                        $allphones = array();

                        if(mysqli_num_rows($query)>0){
                            while($row= mysqli_fetch_array($query)){
                                $product_id = $row['PID'];
                                $qty = $row['quantity'];
                                $total = $row['subtotal'];
                                array_push($allproducts, $product_id);
                                array_push($allqty, $qty);

                                $name_sql = "SELECT * FROM product where PID = $product_id ";
                                $name_query = mysqli_query($con, $name_sql);
                                while($name_row = mysqli_fetch_array($name_query)){
                                    $product_name = $name_row['pname'];
                                    $farmer_id = $name_row['farmer_fk'];
                                    $delivery = $name_row['delivery'];

                                    $farmer_sql = "SELECT * FROM farmerregistration where farmersID = $farmer_id ";
                                    $farmer_query = mysqli_query($con, $farmer_sql);
                                    while($farmer_row = mysqli_fetch_array($farmer_query)){
                                        $farmer_phone = $farmer_row['phone'];
                                        $farmer_username = $farmer_row['username'];
                                        $farmer_name = $farmer_row['firstname'];
                                        array_push($allphones, $farmer_phone);?>
                                        <div class="main3">
                    

                                            <div>
                                                <span><?php echo $i + 1 ;?> </span>

                                            </div>
                                            <div>
                                                <span><?php echo $product_name ;?> </span>

                                            </div>
                                            <div>
                                                <span><?php echo $total?> </span>
                                                <?php array_push($alltotal, $total)?>

                                            </div>
                                            <div>
                                                <select name="delivery">
                                                    <?php
                                                    if($delivery == "Yes"){
                                                        echo"
                                                        <option value ='farmer' name='farmer'>Farmer</option>
                                                        <option value ='courier' name='courier'>Courier</option>
                                                        ";
                                                        
                                                    }
                                                    else{
                                                        echo"
                                                        <option value ='farmer' name='buyer'>You</option>
                                                        <option value ='courier' name='courier'>Courier</option>
                                                        ";

                                                    }
                                                    
                                                    ?>
                                                    
                                                    

                                                </select>

                                            </div>

                                        </div>
                    <?php
                                    }
                                    $i++;
                                    $subtotal += $total;
                                   
                                }
                            }

                        }
                        else{
                            echo"No product";
                        }

                    }

                }
                ?>
                
                <div class="total">
                    <h3> Total Amount: <?php echo $subtotal; ?> </h2>

                </div>

            <div class="main4">
                <h3>Select Your Mode of Payment </h3>
                Payment Options :- <input type="radio" name="payment" value="M-Pesa" required>M-pesa <input type="radio" name="payment" value="COD" required>Cash on Delivery

            </div>

            <div class="main5">
                <input type="submit" name="order" value ="Place Order">
                <button>Go Back </button>

            </div>



        </form>
    </body>


</html>

<?php

if(isset($_POST['order'])){
        $county = $_POST['county'];
        $location = $_POST['location'];
        $delivery = $_POST['delivery'];
        $payment = $_POST['payment'];
        $count = 0;

        if($payment == "M-PESA"){

           
        }

        
        while($count < $i){
            $product_id = $allproducts[$count];
            $qty = $allqty[$count];
            $farmer_phone = $allphones[$count];
            $total = $alltotal[$count];

            $sql1 = "INSERT INTO orders (product_id, quantity, county, location, delivery,farmer_name, phonenumber, total, payment, buyer_id)
             values ('$product_id', '$qty' , '$county', '$location', '$delivery', '$farmer_username','$farmer_phone' , '$total' , '$payment', '$buyer_id')";
            $query1 = mysqli_query($con, $sql1);
            $count = $count + 1;
           
            stkPush($phone, "https://0c83-105-160-80-171.ngrok.io",$subtotal);
        }
        

        $clear = "delete from cart where username = '$username' ";
        $run = mysqli_query($con, $clear);

        if($run){
           
        } else{
            echo"nothing";
        }
    
}

else{
    echo '';
}