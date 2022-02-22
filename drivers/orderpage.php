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
    <?php
        include("header.php");
        ?>
        
        <?php
        if (isset($_GET['id'])){
            if(isset($_SESSION['username'])){
                $i =0;
                $allorderid = array();
                $username = $_SESSION['username'];
                $sql6 = "SELECT * FROM drivers where username = '$username' ";
                $query6 = mysqli_query($con, $sql6);
                while ($row6 =  mysqli_fetch_array($query6)){
                    $driver_id = $row6['driver_id'];
                }
                $id = $_GET['id'];
            echo"<form action =  'orderpage.php?id=$id' method ='POST'>";

                        $sql = "SELECT * FROM orders where buyer_id = $id ";
                        $query = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_array($query)){
                            $order_id = $row['order_id'];
                            array_push($allorderid, $order_id);
                            $sql2 = "SELECT * FROM buyerregistration where buyer_id = $id";
                            $query2 = mysqli_query($con, $sql2);
                            while($row2 = mysqli_fetch_array($query2)){
                                $firstname = $row2['firstname'];
                                $phone = $row2['phone'];

                            }
                            
                            $product_id = $row['product_id'];
                            $county = $row['county'];
                            $location = $row['location'];
                            $payment = $row['payment'];
                            echo"<div class = 'container-o5'>
                                
                                Order_id : <input type = 'text' name ='id' value = $order_id disabled></br>
                                Name:$firstname.</br> Phone: $phone.</br> County: $county.</br> Location $location
                                <input type = 'submit' value = 'Deliver' name = 'deliver'>


                                
                    </form>
                </div>";
                
            }$i++;
            }
            
        }
        ?>
        

        

    </body>
</html>

<?php
    if(isset($_POST['deliver'])){
        
        $status = "Delivering";
        $sql3="select * from jobs where order_id ='$id' LIMIT 1 ";
        $query3=mysqli_query($con,$sql3);
        $job=mysqli_fetch_array($query3);
        $count = 0;
      
        // if user exists
          if ($job['order_id'] === $order_id)
      {
        echo "<script>alert( $id) <script>";
        
        }
        else{
            while ($count < $i){
                $order_id = $allorderid[$i];
                $sql1 = "INSERT INTO jobs (order_id,status,driver_id) values('$order_id','$status','$driver_id')";
                $query1 = mysqli_query($con, $sql1);
                $count += 1;
            
    
                
                
            }
            
           
            

        }
        
        

    }


    ?>
        