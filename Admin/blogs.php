<?php
include("../includes/db.php");

?>


<html>
    <head>
        <title>

        </title>

    </head>
    <style>
        .products{
        display:flex;
        margin:20px 20px;
    }
    .productdetails{
        margin-top:60px;
    }
    .myproducts{
        
        
        display:flex;
        flex-wrap:wrap;
    }
    .allproducts{
        width:300px;
        text-align:center;
    }
    .adding_products{
        margin-top:20px;
        width:300px;
    }
    .imagecontainer{
        margin-top:30px;
        display:flex;
        flex-wrap: wrap;
        
       
        
        
    }
    .pbox{
        height:200px;
        width:200px;
        
    }
    .addblogs{
        display:flex;
        margin-left: 200px;
        margin-top: 15px;
    }
    #add{
        width: 100px;
        height:30px;
        background-color: greenyellow;
        margin-left: 30px;
        cursor: pointer;
    }
    #print-btn{
           width:100px; 
           cursor: pointer;
           margin-left: 30px;
           background-color: yellowgreen;
           height:30px;
           border-style:  groove 0.5px;
        }
    </style>

    <body>
        <?php
        include("header.php");
        ?>
        <div class = "addblogs">
            <div class="add">
                <span> Add Blog </span>

            </div>
            <div class= "add-btn">
                <a href="insertblogs.php"><input type="button" value="Add " id="add"></a>

            </div>
            <div>
                <button onclick="window.print()" id = "print-btn">print</button>
            </div>

        </div>
        <div class="myproducts">

            <div class="imagecontainer">
                
                <?php
                if(isset($_SESSION['username'])){
                    $username=$_SESSION['username'];
                    getblogs();
                }
                else{
                    echo"<script>alert('login')</script>";
                }
                ?> 
                
                
            </div>
        </div>

    </body>


</html>

