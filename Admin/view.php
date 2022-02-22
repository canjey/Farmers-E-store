<?php
include("../includes/db.php");
include("../functions/function.php");


?>

<html>
    <head>
        <title>
            Delivery
        </title>
    </head>
    <style>
        .container-d1{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            background-color: teal;
            height:50px;
        }
        #title{
            text-align: center;
        }
        .container-d1 >div{
            margin-top: 15px;
        }
        .container-d1 >div >a{
            text-decoration: none;

        }
        .container1{
            display:inline-flex;
            flex-wrap: wrap;
            margin-left:5px;
            border-bottom:groove 1px;
            padding:10px;
            justify-content: space-evenly;
            
        }
        .container2 {
            width:100px;
        }
        .container3 {
            width:190px;
        }
        .admin_container{
            padding:10px;
        }
        #print-btn{
           width:100px; 
           margin-top: 30px;
           margin-left: 30px;
           background-color: yellowgreen;
           height:30px;
           cursor:pointer;
           border-style:  groove 0.5px;
        }
        </style>
    <body>
                <div class="top">
                    <img src="../Admin/product_images/soko.PNG" width="100px">
                    
                    
                    
                </div>
                    <?php
                    if(isset($_SESSION['username'])){
                        echo"<div class = 'container-d1'>";
                        echo"<div><a href='AdminHomepage.php'>Home</a></div>";
                        echo"<div><a href='newdrivers.php'>Insert Drivers</a></div>";
                        echo"<div><a href='view.php'>View Drivers</a></div>";
                        echo"<div><a href='delete.php'>Delete Drivers</a></div>";
                        echo"<div><a href='activity.php'>View Activity</a></div>";
                        echo"</div>";
                    }
                    else{
                        echo"<div><a href='logout.php'>logout</a></div>";
                    }
                    
                    ?>

<button onclick="window.print()" id = "print-btn">print</button>
        
        <div class="admin-container">
            <div class="container1">
                <div class="container2">
                    <p>FirstName</p>
                </div>
                <div class="container2">
                    <p>LastName</p>
                </div>
                <div class="container2">
                    <p>Username</p>
                </div>
                <div class="container3">
                    <p>Email</p>
                </div>
                <div class="container2">
                    <p>phone</p>
                </div>
                
            </div>
        </div>
            
            
    
        <?php
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM drivers";
            $query = mysqli_query($con, $sql);
            if($query){
                if(mysqli_num_rows($query)==0){
                    echo"</br>No farmer available";
                }
                else{
                    while($row = mysqli_fetch_array($query)){
                        $firstname = $row['driver_firstname'];
                        $lastname = $row['driver_lastname'];
                        $username = $row['username'];
                        $email = $row['email'];
                        $phone = $row['phone'];
                        
                        
                        echo "
                        <div class='admin_container'>
                            <div class='container1'>
                                <div class='container2'>
                                $firstname
                                </div>
                                <div class='container2'>
                                $lastname
                                </div>
                                <div class='container2'>
                                $username
                                </div>
                                <div class='container3'>
                                $email
                                </div>
                                <div class='container2'>
                                $phone
                                </div>
                                
                                
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
    
    
                    
                    

                    <?php
                    include("../Template/footer.php");
                    ?>
    </body>
</html>

