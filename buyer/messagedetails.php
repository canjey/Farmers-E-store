<?php
include("../functions/function.php");
include("../includes/db.php");
?>
<html>
    <head>
    </head>
    <style>
        #profile{
            border-radius:50%;
        }
        .container-md1{
            display:flex;
            background: #fff;
  max-width: 450px;
  width: 100%;
 
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);

        }
        .container-md3{
            margin-top: 30px;
            margin-left:20px;
        }
        .container-md5{
            margin-left: 150px;
        }
        body{
            background-color: lightgray;
        }
        .sent{
            background: #fff;
  max-width: 450px;
  height: 400px;
  overflow-y: scroll;
  width: 100%;
  
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);

        }
        .message4{
            text-align: right;
            background-color: darkgray;
            margin-left: 300px;
            border-style: groove;
            margin-top: 5px;
            border-radius: 5px;
        }
        .message5{
            background-color: #696969;
            margin-top: 10px;
            margin-right: 300px;
            border-style: groove;
            border-radius: 5px;
        }

       
        </style>
        <body>
            <a href="message.php">Messages</a>
            <div class='container-md5'>


            <?php
                    if(isset($_SESSION['username'])){
                        $username = $_SESSION['username'];
                        $sql1 = "SELECT * from buyerregistration where username = '$username'";
                        $query1 = mysqli_query($con, $sql1);
                        while($row1 = mysqli_fetch_array($query1)){
                            $buyer_id = $row1['buyer_id'];
                        }
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM farmerregistration where farmersID = '$id'";
                            $query = mysqli_query($con, $sql);
                            if($query){
                                while($row = mysqli_fetch_array($query)){
                                    $firstname = $row['firstname'];
                                    $lastname = $row['lastname'];
                                    $image = $row['image_filename'];
                                    $status = $row['status'];
                                    echo"<div class = 'container-md1'>
                                    <div class ='container-md2'>
                                    <img src='../Admin/product_images/$image' width='100px' id ='profile'>
                                    </div>
                                    <div class='container-md3' >$firstname $lastname 
                                    <div >$status</div></div>
                                    </div>";
                                }
                            }
                        }

                        
                    }
                    ?>

                            <div class="write_up">
                                <div class="sent">
                                    <?php
                                    $sql4 = "SELECT * FROM messages where farmer_id = $id and buyer_id = $buyer_id ";
                                    $query4 = mysqli_query($con, $sql4);
                                    while($row4 = mysqli_fetch_array($query4)){
                                    $message4 = $row4['message'];
                                    $pronoun = $row4['pronoun'];
                                    $time = $row4['time'];
                                    if($pronoun == 'You'){
                                        echo"<div class='message4'><span>  $message4</span></br><span> $time</span></div>";
                                        


                                    }
                                    else{
                                        echo"<div class='message5'><span> $message4</span><span> <h7> $time</h7></span></br></div>";
                                       
                                       
                                        
                                    }
                                   
                                    }
                                    
                                    ?>
                                </div>
                            </div>
                               
                                <form action =<?php echo"messagedetails.php?id=$id"?> method= "POST">
                                <div class ="message1">
                                    <div>
                                        <input type ="text" name="buyer" id="buyer_id" value="<?php echo $buyer_id;?>" hidden>
                                        <input type ="text" name="pronoun" id="pro-text" value="You" hidden >
                                        <input type ="text" name="message" placeholder="write message here" :>
                                        <input type ="submit" name="text" value="send">
                                    </div>

                                </div>


                                </form>
                                    

                                


          </div>                  

      

  </body>

</html>

<?php

if(isset($_POST['text'])){
    $send = $_POST['text'];
  $message = $_POST['message'];
  $buyer_id = $_POST['buyer'];
  $pronoun = $_POST['pronoun'];

  $sql3 = "INSERT INTO messages (farmer_id, buyer_id, message,pronoun ) values ('$id', '$buyer_id','$message','$pronoun')";
  $query3 = mysqli_query($con, $sql3);
  echo"<script>window.open('messagedetails.php?id=$id','_self')</script>";
  
  
  
  

}