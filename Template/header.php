<?php




?>
<html>
    <head>
        <title>header</title>
        <meta name="viewport" content="width=device-width initial-scale=1">

</head>
<style>

.tophead{
    display:flex;
    justify-content:space-between; 
   
}

.setting{
        height:30px;
        background-color:#f0ff0f;
        padding:30px;
        text-align:center;
        font-weight: 100px;
        min-width: 0;
        display:flex;
        flex-wrap:wrap;
        justify-content:space-between;
    }
    .setting a{
        text-decoration:none;
        margin:50px 30px;
        margin-top:20px;
        text-align:center;
        
    }
    #profile{
        margin-top: 10px;
        border-radius: 50%;
        height:60px;
        width:60px;
    }
    .greetings{
        margin-top: -30px;
        
    }
    #status{
    margin-left:120px;
    margin-top: -20px;
    text-decoration-color: red;
}
    </style>
<body>
    <div class="tophead">
        <div class="logo">
                <img src="../images/soko.png" height="50px" width="200px">
        </div>
        <div class="greetings">
                <h2>    <?php getFarmerusername();
                    ?>
                    </h2>
        </div>
    </div>
    

<div class="setting"> 
           
             <?php
             if(isset($_SESSION['username'])){
                         echo"<div><a href='../logs/farmerHomepage.php' class='dropdown_item'>Home</a></div>";
                          echo"<div><a href='../logs/farmerprofile.php' class='dropdown_item'>Profile</a></div>";
                          echo"<div><a href='farmerTransaction.php' class='dropdown_item'>Transactions</a></div>";
                          echo"<div><a href='../logs/myproduct.php' class='dropdown_item'>Product</a></div>";
                          echo"<div><a href='../logs/messages.php' class='dropdown_item'>Messages</a></div>";
                          echo"<div><a href='../logs/groups.php' class='dropdown_item'>Groups</a></div>";
                         echo"<div><a href='../logs/logout.php' class='dropdown_item'>Log out</a></div>";
        
    }
    else{
        echo"<a href='farmerHomepage.php' class='dropdown_item'>Home</a>";
         echo"<a href='farmerlogin.php' class='dropdown_item'>Profile</a>";
        echo"<a href='farmerlogin.php' class='dropdown_item'>Transactions</a>";
        echo"<a href='farmerlogin.php' class='dropdown_item'>Product</a>";
        echo"<a href='farmerlogin.php' class='dropdown_item'>Log In</a>";
            }
    ?>
</div>
</body>
</html>