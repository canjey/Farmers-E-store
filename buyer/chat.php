<?php
include("../functions/function.php");
include("../includes/db.php");
?>
<html>
  <head>

  </head>
  <style>
    .header1{
      margin-left:150px;
      width: 450px;
      margin-right:150px;
      background-color: gainsboro;
    }
    #profile{
      height: 60px;
      border-radius: 50%;
      margin-left: 10px;
    }
    .message1{
      margin-left:150px;
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
        body{
            background-color: lightgray;
        }
        .sent{
      margin-left:150px;
            background: #fff;
  max-width: 450px;
  height: 400px;
  overflow-y: scroll;
  width: 100%;
  
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);

        }

  </style>
  <body>
    <a href="home.php">home</a>
 
    <div class="messages">
      <div class="header1">
        <?php
        if(isset($_SESSION['username'])){
          $username = $_SESSION['username'];
          $sql1 = "SELECT * FROM buyerregistration where username = '$username' ";
          $query1 = mysqli_query($con, $sql1);
          while($row1 = mysqli_fetch_array($query1)){
            $buyer_id = $row1['buyer_id'];
            $firstname1 = $row1['firstname'];
          }
          if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM product where PID = $id ";
            $query = mysqli_query($con, $sql);
            while($row = mysqli_fetch_array($query)){
              $farmer_id = $row['farmer_fk'];
              $sql2 = "SELECT * FROM farmerregistration where farmersID = $farmer_id ";
              $query2 = mysqli_query($con, $sql2);
              while($row2 = mysqli_fetch_array($query2)){
                $profile = $row2['image_filename'];
                $firstname = $row2['firstname'];
                $status = $row2['status'];
                echo"<img src ='../Admin/product_images/$profile' id ='profile'> $firstname";
                echo $status ;?>

                </div>
                    <div class="write_up">
                      <div class="sent">
                        <?php
                        $sql4 = "SELECT * FROM messages where farmer_id = $farmer_id and buyer_id = $buyer_id ";
                        $query4 = mysqli_query($con, $sql4);
                        while($row4 = mysqli_fetch_array($query4)){
                          $message4 = $row4['message'];
                          $pronoun = $row4['pronoun'];
                                    if($pronoun == 'You'){
                                        echo"<div class='message4'><span>  $message4</span></br></div>";



                                    }
                                    else{
                                        echo"<div class='message5'><span> $message4</span></br></div>";
                                        
                                    }
                                  }
                        
                        ?>
                      </div>
                   </div>
                      </div>
                      <form action = <?php echo"chat.php?id=$id"?> method= "POST">
                      <div class ="message1">
                        <div>
                            <input type ="text" name="farmer" id="farmer_id" value="<?php echo $farmer_id;?>" hidden>
                            <input type ="text" name="pronoun" id="pro-text" value="You" hidden >
                                        
                            <input type ="text" name="message" placeholder="write message here">
                            <input type ="submit" name="text" value="send">


                          </form>
                        </div>

                      </div>


                    

                <?php

              }
          }


        }
      }
        ?>

      

  </body>

</html>

<?php

if(isset($_POST['text'])){
  $message = $_POST['message'];
  $farmer_id = $_POST['farmer'];
  $pronoun = $_POST['pronoun'];
  $sql3 = "INSERT INTO messages (farmer_id, buyer_id, message,pronoun) values ('$farmer_id', '$buyer_id','$message','$pronoun')";
  $query3 = mysqli_query($con, $sql3);
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo"<script>window.open('chat.php?id=$id','_self')</script>";
  
  }

}