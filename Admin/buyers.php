<?php
include("../includes/db.php");
include("../functions/function.php");
?>


<html>
    <head><title>View Buyers</title>
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
            
            width:200px;
        }
        .container6{
            
            width:180px;
        }
        .container7{
            
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
        .admin-container{
            margin-left:30px;

        }
        body{
            background-image: url("../Admin/product_images/farmers.jpeg");
        }
        </style>

</head>

<body>
    <div class="top">
        <img src="../Admin/product_images/soko.PNG" width="100px">
        
        
        
    </div>

    <div class="container-f1">
    <div>
            <a href="AdminHomepage.php">Home</a>
        </div>
        <div>
            <a href="buyers.php">View Buyers</a>
        </div>
        <div>
            <a href="addbuyers.php">Add Buyers</a>
        </div>
        <div>
            <a href="deletebuyers.php">Delete Buyers</a>
        </div>
        <div>
            <a href="#">Update Buyers</a>
        </div>
    </div>
    <div class="admin-container">
        <div class="container1">
            <div class="container2">
                <p>FirstName</p>
            </div>
            <div class="container3">
                <p>LastName</p>
            </div>
            <div class="container4">
                <p>Username</p>
            </div>
            <div class="container5">
                <p>Email</p>
            </div>
            <div class="container6">
                <p>phone</p>
            </div>
            <div class="container7">
                <p>Home location</p>
            </div> 
            <div class="container8">
                <p>Status</p>
            </div>  
        </div>
        
        

    <?php
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM buyerregistration";
        $query = mysqli_query($con, $sql);
        if($query){
            if(mysqli_num_rows($query)==0){
                echo"</br>No Buyers Available";
            }
            else{
                while($row = mysqli_fetch_array($query)){
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $location = $row['buyer_location'];
                    $status = $row['status'];
                    echo "<div class='admin_container'>
                    <div class='container1'>
                    <div class='container2'>
                    $firstname
                    </div>
                    <div class='container3'>
                    $lastname
                    </div>
                    <div class='container4'>
                    $username
                    </div>
                    <div class='container5'>
                    $email
                    </div>
                    <div class='container6'>
                    $phone
                    </div>
                    <div class='container7'>
                    $location</br>
                    </div>
                    <div class='container7'>
                    $status</br>
                    </div>
                    
                    </div>";
                }

            }

        }
    }
    else{
        echo"<a href='login.php'>Login</a>";
    }

?>



</body>

</html>