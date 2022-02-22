<?php
include("../includes/db.php");

?>

<html>
    <head>
        <title>
            Get In Touch
        </title>
    </head>
    <style>
        .container-m1{
            display:flex;
            margin-left: 50px;
            border-bottom: groove 1px;
            margin-right: 50px;
           
        }
        .container-m1 >div{
            width:200px;
        }
        #btn-color{
            background-color: greenyellow;
        }
        </style>
    <body>
        <?php
        include("header.php");
        
        ?>
        <div class = 'container-m1'>
            <div>
            Name
            </div>
            <div>
            Email
            </div>
            <div>
            Phone
            </div>
            <div>
            Message
            </div>
            
            </div>
        <?php
        
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM information ORDER BY infor_id DESC";
            $query = mysqli_query($con, $sql);
            if(mysqli_num_rows($query)>0){
                while($row = mysqli_fetch_array($query)){
                    $name = $row['name'];
                    $email = $row['email'];
                    $phone = $row['phone'];
                    $message = $row['message'];

                    echo "<div class = 'container-m1'>
                    <div>
                    $name
                    </div>
                    <div>
                    $email
                    </div>
                    <div>
                    $phone
                    </div>
                    <div>
                    $message
                    </div>
                    <div>
                    <a href ='mailto:$email'><input type ='submit' id = 'btn-color' value='Reply' onclick ='changecolor()'></a>
                    </div>
                    
                    </div>";
                }
            }
            else{
                echo"No message available";
            }
        }
        else{
            echo"<a href ='login.php'>Login</a>";
        }
        
        ?>

    </body>
</html>

<script>
    document.getElementById('change').onclick = changecolor;
    function changecolor(){
       document.body.style.color = "purple";

    }
</script>