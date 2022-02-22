<?php
include("../functions/function.php");
include("../includes/db.php");
?>
<?php
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM buyerregistration where username = '$username' ";
            $query = mysqli_query($con, $sql);
            while($row = mysqli_fetch_array($query)){
                $buyer_id = $row['buyer_id'];
                $username = $row['username'];
                $status = $row['status'];
                $image = $row['image_filename'];
                $sql2 = "SELECT * FROM messages where buyer_id = $buyer_id ";
                $query2 = mysqli_query($con, $sql2);
                if(mysqli_num_rows($query2) >0){
                   while($row2 = mysqli_fetch_array($query2)){
                       $i =0;
                       $farmer_id = $row2['farmer_id'];
                       $message = $row2['message'];
                       $sql5 = "SELECT * FROM farmerregistration where farmersID = '$farmer_id'";
                       $query5 = mysqli_query($con, $sql5);
                       while($row5 = mysqli_fetch_array($query5)){
                         $firstname5 = $row5['firstname'];
                         $lastname5 = $row5['lastname'];
                         $image5 = $row5['image_filename'];
                         


                       }
                       
                   }$i++;

                }
            }
            
        }
        ?>
<html>
  <head>

  </head>
  <style>
    .header1{
      margin-left:150px;
      margin-right:150px;
      display: flex;
     
    }
    #name{
      margin: 10px 20px;
    }
    #profile{
      height: 60px;
      border-radius: 50%;
      margin-left: 10px;
    }
    .message1{
      margin-left:150px;
    }
    .write_up{
      height:200px;
    }
    .sent{
      height: 100px;

    }
    .messages{
      width:500px;
      margin-top: 100px;
      margin-left:200px;
      background-color: lightyellow;
    }
    .message4{
      border-left:groove;
      margin-left: 150px;
      width:absolute;
      border-radius: 5px;
    }
    .container-m1{
      display: flex;
      margin-left:150px;
      margin-right:150px;
      border-bottom: groove;
     
    }
    .container-m3{
      margin-top: 20px;
      margin-left: 10px;
    }
    #select{
      text-align: center;
    }
    body{
      background-color: lightgray;
    }

  </style>
  <body>
  <a href="home.php">home</a>
    <div class="messages">
      <div class="header1">
          <?php
          echo"<div><img src='../Admin/product_images/$image' id='profile'> </div>";
          echo"<div id='name'>$username</div>";
          
          
          ?>
        

        </div>

        <h3 id ='select'><u> Select A user to start Chat</u></h3>
        <?php
        getbuyeruserlist()
        
        ?>
                   