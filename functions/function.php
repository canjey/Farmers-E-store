


<?php
session_start();
include("../includes/db.php");

function getFarmerusername()
    {
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            global $con;

            $query = "select * from farmerregistration where username = '$username'";
            $run_query = mysqli_query($con, $query);
            if ($run_query) {
                while ($row_cat = mysqli_fetch_array($run_query)) {
                    $image = $row_cat['image_filename'];
                    $status = $row_cat['status'];
                    $firstname = $row_cat['firstname'];
                    $firstname = 'Hello ,' . $firstname;
                }

                // echo @"<label>$buyer_name</label>";
                echo "$firstname 
                <a href='profilepic.php'><img src='../Admin/product_images/$image' width='50px' id='profile'></a> <h5 id ='status'> $status </h5>";
            }
        } else {
            echo "<a href = '../logs/farmerlogin.php'><div class='text-success logins mx-5'>Hey</div></a>";
            // echo "<label><a href = '../logs/farmerlogin.php' style = 'color:white' >Login/Sign up</a></label>";
        }
    }


function getfarmerproducts(){
   
    include("../includes/db.php");

    
        global $con;
        $username=$_SESSION['username'];
        $sql="select*from product where farmer_fk in (select farmersID from farmerregistration where username='$username')";
        $query_product= mysqli_query($con,$sql);
        $count=0;
        if($query_product){
            while($row = mysqli_fetch_array($query_product)){
                $count+=1;
                $filename=$row['imagename'];
                $pname = $row['pname'];
                $pcategory = $row['pcategory'];
                $pprice = $row['pprice'];
                $id = $row['PID'];
                $path="../Admin/product_images/" . $filename;

                
                echo"
                <div class='image1container'>
                <a href='../logs/ProductDetails.php?id=$id'><img src='../Admin/product_images/$filename  ' alt='image not available' width='200px;' height='150px;'></a>
                
                <p class='productdetails'>name: $pname <br/>
                category: $pcategory<br/>
                price:$pprice/=<br/>
                </p>
                </div>
                ";
                
                
                
            }


        }

        else{
            echo"<h1> Product Not uploaded</h1>";
        }


           

  
    
}

function getfarmersdetails(){
    global $con;
    if(isset($_SESSION['username'])){
        $sql="select * from farmerregistration";
        $query=mysqli_query($con,$sql);
        if(mysqli_num_rows($query)==0){
            echo"No farmers Available";

        }
        else{
            if($query){
                while ($row=mysqli_fetch_array($query)){
                    $id = $row['farmersID'];
                    $firstname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $username = $row['username'];
                    $farmer_location =$row['farmer_location'];
    
                    echo"<div class='admin_container'>
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
                    $farmer_location</br>
                    </div>
                    <div class='container7'>
                    <a href='../Admin/deletefarmers.php?id=$id'>    <button type ='submit' name ='delete'>Delete
                        </button></a>
                   
                    
                    </div>
                    </div>";
                    
    
    
                    
                }
    
            }

        }


        if(isset($_GET['id'])){
            $farmer_id = $_GET['id'];
            $sql2 = "DELETE FROM farmerregistration where farmersID = $farmer_id ";
            $query2 = mysqli_query($con, $sql2);
            if($query2){
                $sql3 = "DELETE FROM product where farmer_fk = $farmer_id";
                $query3 = mysqli_query($con, $sql3);
                if($query3){
                    echo"<script>alert('user deleted')</script>";
                    echo"<script>window.open('farmers.php','_self')</script>";
            

                }
                }
            else{
                echo"<script>alert('user not deleted')</script>";
            }
        }
        
        

        


    }
    else{
        echo"login";
    }
}

function getbuyersdetails(){
    global $con;
    if(isset($_SESSION['username'])){
        $sql="select * from buyerregistration";
        $query=mysqli_query($con,$sql);

        if($query){
            while ($row=mysqli_fetch_array($query)){
                $id = $row['buyer_id'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $username = $row['username'];
                $buyer_location =$row['buyer_location'];

                echo"<div class='admin_container'>
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
                $buyer_location</br>
                </div>
                <div class='container7'>
                <a href='../Admin/deletebuyers.php?id=$id'>    <button type ='submit' name ='delete'>Delete
                    </button></a>
               
                
                </div>
                </div>";
                


                
            }

        }
        if(isset($_GET['id'])){
            $buyer_id = $_GET['id'];
            $sql2 = "DELETE FROM buyerregistration where buyer_id = $buyer_id ";
            $query2 = mysqli_query($con, $sql2);
            if($query2){
                echo"<script>alert('user deleted')</script>";
                echo"<script>window.open('buyers.php','_self')</script>";
                }
            else{
                echo"<script>alert('user not deleted')</script>";
            }
        }
        
        

        


    }
    else{
        echo"login";
    }
}
function delete(){
    global $con;
    if(isset($_SESSION)){

        $select="select * from farmerregistration ";
        $run_query= mysqli_query($con, $select);
        if($run_query){

          while($fetch=mysqli_fetch_array($run_query)){

            $username=$fetch['username'];
            $details="delete * from farmerregistration where username='$username'";
            $query=mysqli_query($con, $details);

          }
        }
    }
    
}



function getbuyerusername(){
    global $con;
    if(isset($_SESSION['username'])){

        $username = $_SESSION['username'];
        $sql=" SELECT * FROM buyerregistration where username = '$username'";
        $run_query= mysqli_query($con, $sql);

        if($run_query){
            while($getname= mysqli_fetch_array($run_query)){
                $image = $getname['image_filename'];
                $status = $getname['status'];
                $firstname= $getname['firstname'];
                $firstname= 'Hey, '. $firstname;
            }

            echo" $firstname <a href='profilepic.php'><img src= '../Admin/product_images/$image' id='profile'></a><h5 id ='status'>$status</h5> ";
        }
    }
}

function getFruits(){
    global $con;

    $query = "SELECT * FROM product where pcategory= 'Fruits' order by RAND() limit 0,10 ";
    $sql= mysqli_query($con, $query);
    while($row = mysqli_fetch_array($sql)){
        $pname = $row['pname'];
        echo"<a class='dropdown-item 'href='../buyer/categories.php?name=$pname'>$pname</a>";
    }




}

function getVegetables(){
    global $con;

    $query = "SELECT * FROM product where pcategory= 'Vegetables' order by RAND() LIMIT 0,10";
    $sql = mysqli_query($con, $query);

    while($row = mysqli_fetch_array($sql)){
        $pname = $row['pname'];
        echo"<a class='dropdown-item 'href='../buyer/categories.php?name=$pname'>$pname</a>";
    

    }
}

function getCereals(){
    global $con;
    $query = "SELECT * FROM product where pcategory= 'Cereals' order by RAND() LIMIT 0,10";
     $sql = mysqli_query($con, $query);

     while($row = mysqli_fetch_array($sql)){
        
        $pname = $row['pname'];
        echo"<a class='dropdown-item 'href='../buyer/categories.php?name=$pname'>$pname</a>";
    
     }
}

function gethomefruits(){
    global $con;

    $query= "SELECT * FROM product where pcategory='Fruits' order by RAND() LIMIT 0,10";
    $sql= mysqli_query($con, $query);

    while($row= mysqli_fetch_array($sql)){
        $image= $row['imagename'];
        $price= $row['pprice'];
        $name= $row['pname'];
        $product_id=$row['PID'];
        echo"<div class='product_container'>
        <div class='image_container'>
        <a href='productdetails.php?id=$product_id'><img class='round' src='../Admin/product_images//$image' width='200px' height='200px' alt='image'></a>
        
        </div>
        <div class='details'>
        $name</br> $price/=</br> 
        </div>

        <div class='cart'>
        <a href='../buyer/home.php?add_cart=$product_id' class='addcartbtn ' style='color:black ;font-weight:50px;'><button type = 'submit' >Add to cart
        </button></a>
                            
        </div>

        </div>";
    }
}

function gethomevegetables(){
    global $con;

    $query =" SELECT * FROM product where pcategory='Vegetables' order by RAND() LIMIT 0,10";
    $sql= mysqli_query($con, $query);

    while($row= mysqli_fetch_array($sql)){
        $image= $row['imagename'];
        $price= $row['pprice'];
        $name= $row['pname'];
        $id= $row['PID'];
        echo"<div class='product_container'>
        <div class='image_container'>
        <a href='productdetails.php?id=$id'><img class='round' src='../Admin/product_images//$image' width='200px' height='200px' alt='image'></a>
        
        </div>
        <div class='details'>
        $name</br> $price/=</br> Farmer: 
        </div>

        <div class='cart'>
        <a href='../buyer/home.php?add_cart=$id' class='addcartbtn ' style='color:black ;font-weight:50px;'><button type = 'submit' >Add to cart
        </button></a>
                            
        </div>

        </div>";
    }
}



function gethomecereals(){

    global $con;

    $query= "SELECT * FROM product where pcategory= 'Cereals' order by RAND() LIMIT 0,10";
    $sql= mysqli_query($con, $query);

    while($row= mysqli_fetch_array($sql)){
        $image= $row['imagename'];
        $name= $row['pname'];
        $price= $row['pprice'];
        $product_id= $row['PID'];
        echo"<div class='product_container'>
        <div class='image_container'>
        <a href='productdetails.php?id=$product_id'><img class='round' src='../Admin/product_images//$image' width='200px' height='200px' alt='image'></a>
        
        </div>
        <div class='details'>
        $name</br> $price/=</br> 
        </div>

        <div class='cart'>
        <a href='../buyer/home.php?add_cart=$product_id' class='addcartbtn ' style='color:black ;font-weight:50px;'><button type = 'submit' >Add to cart
        </button></a>
                            
        </div>

        </div>"
        ;
    }
}

function getproductshomepage(){

    global $con;

    $query= "SELECT * FROM product order by RAND() LIMIT 0,10 ";
    $sql= mysqli_query($con, $query);
    while($row= mysqli_fetch_array($sql)){
        $image= $row['imagename'];
        $name= $row['pname'];
        $price= $row['pprice'];
        $product_id = $row['PID'];
        echo"<div class='product_container'>
        <div class='image_container'>
        <a href='productdetails.php?id=$product_id'><img class='round' src='../Admin/product_images//$image' width='200px' height='200px' alt='image'></a>
        
        </div>
        <div class='details'>
        $name</br> $price/=</br> 
        </div>

        <div class='cart'>
        <a href='../buyer/home.php?add_cart=$product_id' class='addcartbtn ' style='color:black ;font-weight:50px;'><button type = 'submit' >Add to cart
        </button></a>
                            
        </div>

        </div>";
    }


}

function getproducts(){
    global $con;

    $query=" SELECT * FROM product order by RAND() limit 0, 10";
    $sql= mysqli_query($con, $query);

    while($row=mysqli_fetch_array($sql)){
        $name= $row['pname'];
        $price= $row['pprice'];
        $product_id= $row['PID'];
        $image= $row['imagename'];
        $farmer_fk= $row['farmer_fk'];
        $farmer_query= "SELECT firstname from farmerregistration where farmersID= $farmer_fk";
        $farmer_sql= mysqli_query($con, $farmer_query);
        while($farmer_row= mysqli_fetch_array($farmer_sql)){
            $firstname= $farmer_row['firstname'];
        }

        echo"
        <div class='product_container'>
        <div class='image_container'>
        <a href='productdetails.php?id=$product_id'><img class='round' src='../Admin/product_images//$image' width='200px' height='200px' alt='image'></a>
        
        </div>
        <div class='details'>
        $name</br> $price/=</br> Farmer: $firstname </br>
        </div>

        <div class='cart'>
        <a href='../buyer/home.php?add_cart=$product_id' class='addcartbtn ' style='color:black ;font-weight:50px;'><button type = 'submit' >Add to cart
        </button></a>
                            
        </div>

        </div>
        ";
    }
}

function cart(){
    global $con;

    if(isset($_SESSION['username'])){
        if(isset($_GET['add_cart'])){
            $username= $_SESSION['username'];
            $product_id= $_GET['add_cart'];

            if(isset($_POST['quantity'])){
                $qty = $_POST['quantity'];


            }
            else{
                $qty = 1;
            }
            $sql1 = "SELECT * FROM product where PID = $product_id ";
            $query1 = mysqli_query($con, $sql1);
            if($row = mysqli_fetch_array($query1)){
                $product_price = $row['pprice'];
            }

            $check_product= "select * from cart where username = '$username' and PID = $product_id ";
            $product_query= mysqli_query($con, $check_product);

            if (mysqli_num_rows($product_query) > 0 ){
                echo"";
            }
            else{
                $insert = "insert into cart(PID, username, quantity, subtotal) values ($product_id,'$username','$qty', '$product_price')";

                $insert_sql = mysqli_query($con, $insert);
            }
            echo"<script>alert('product added')</script>";
            
        }
    }

}

function totalItems(){

    global $con;

    if(isset($_SESSION['username'])){
        $username= $_SESSION['username'];
        $get_items = " SELECT * FROM cart where username = '$username' ";
        $query = mysqli_query($con, $get_items);
        $count = mysqli_num_rows($query);
        return $count;
        
    }

    else{
        echo 0;
    }

}

function getcat(){
    global $con;

    $sql= "SELECT * FROM category  ";
    $query = mysqli_query($con, $sql);

    if($query){
        while($row=mysqli_fetch_array($query)){

            $catname= $row['cat_title'];

            echo"<div class='menu2'>
            <a href='#'>$catname</a>
            </div>";
        }
    }

    

    
}

function getfarmers(){
    if(isset($_SESSION['username'])){
        global $con;
        $username = $_SESSION['username'];

        $sql = "select * from farmerregistration";
        $query= mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($query)){
            $id = $row['farmersID'];
            $firstname = $row['firstname'];
            $image = $row['image_filename'];
            $location = $row['farmer_location'];

            echo"<div class='farmer_container'>
            <div class='details'>

            <img src='../Admin/product_images/$image' id='profile' alt src='../Admin/product_images/man.png'>
            <h2>$firstname 
            
            <h2>$location </br>
            <a href='#'><input type='button' value='View Profile'></a>

            </div>
            </div>";
        }
    }
}
function productdetails(){
    global $con;
    if(isset($_SESSION['username'])){
    if(isset($_GET['id'])){
        $id= $_GET['id'];

        $query= "SELECT * FROM product where PID =". $id;
        $sql= mysqli_query($con, $query);

        while($row= mysqli_fetch_array($sql)){
            $id= $row['PID'];
            $product_name= $row['pname'];
            $product_price= $row['pprice'];
            $product_stock= $row['pstock'];
            $product_description= $row['pdescription'];
            $product_image= $row['imagename'];
            $farmer_fk=$row['farmer_fk'];
            $delivery= $row['delivery'];


            $name_query= "SELECT * FROM farmerregistration where farmersID =". $farmer_fk;
            $run_query=mysqli_query($con, $name_query);

            while($row1= mysqli_fetch_array($run_query))
            {
                $firstname= $row1['firstname'];
                $email= $row1['email'];
            }
            
            if ($product_stock==0){
                $stock="Stock Not Available";
            }

            else{
                $stock=" Stock Available";
            }

        }

        echo"
        <div class='detailss'>
            <div class='image_container'>
                <img src='../Admin/product_images/$product_image' height='200px'>
            
            </div>
            <div class='details_products'>
                <h3>Name: $product_name 
                <h3>Price: $product_price</h3>
                <h3>$stock</h3>
                <h3> Delivery :$delivery Available</h3>


                <form action='' method='POST'>
                    <div>
                        Quantity
                        <input type ='number' name='quantity' placeholder='1'>
                    </div>
            
                </form>

                <a href='../buyer/home.php?add_cart=$id' class='addcartbtn ' style='color:black ;font-weight:50px;'><button>Add to cart
                
                <img src='../images/carticons.png' height='20px'></button></a>
                <button type='submit'>Save For Later<img src='../images/saveforlater4.png' height='20px'></button>
                

            </div>

            <div class='farmer_details'>
                <h3> Farmer Name: $firstname</h3>
                <h3> Email: $email</h3>
                <a href='../buyer/farmerprofile.php?id=$id'><button>view farmer profile <img src='../images/farmericon.png' height='20px'> </button></a>
                </br>
                Have a Query</br>
                <a href='chat.php?id=$id'><button> Chat Here <img src='../images/chat2.png'></button></a>
                

            </div>
            
        </div>

            <h2 id='all'>Product Description</h2>

            <div class='des'>
                <h2>$product_description</h2>

            </div>
        ";
    }
    if(isset($_POST['cart'])){
        if(isset($_POST['quantity'])){
            $qty = $_POST['quantity'];
        }
        else{
            $qty = 1;
        }
        echo $qty;
        global $con;
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            $sql2 = "SELECT * FROM cart where username = '$username' and PID = $id ";
            $query2 = mysqli_query($con, $sql2);
            $subtotal = $product_price * $qty;
            $sql3 = "INSERT INTO cart (PID, username, quantity, subtotal) values ('$id', '$username', '$qty', '$subtotal')";
            $query3 = mysqli_query($con, $sql3);
           
                
            }
        }
    }
    

else{
    echo"<a href='login.php'>Login</a>";
}
}

function getblogs(){
    global $con;

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM blogs";
        $query = mysqli_query($con, $sql);
        if($query){
            while($row = mysqli_fetch_array($query)){
                $id = $row['blog_id'];
                $title = $row['blog_title'];
                $image =$row['image'];
                $description = $row['description'];

                echo"
                <div class='imagecontainer'>
                <a href='blogsupdate.php?id=$id'><img src='../Admin/product_images/$image  ' alt='image not available' width='200px;'></a>
                
                
                <p class='productdetails'>name: $title <br/>
                Description: $description<br/>
                
                </p>
                </div>
                ";

            }
            

        }
    }
}
function gethomeblogs(){
    global $con;

    
    $sql = "SELECT * FROM blogs ORDER BY rand() LIMIT 0,3";
    $query = mysqli_query($con, $sql);
    if($query){
        while($row = mysqli_fetch_array($query)){
            $id = $row['blog_id'];
            $title = $row['blog_title'];
            $image =$row['image'];
            $description = $row['description'];

            echo"
            <div class='imagecontainer'>
            <a href='blogs.php?id=$id'><img src='../Admin/product_images/$image  ' alt='image not available' width='200px;' height ='200px'></a>
            
            
            <p class='productdetails'>name: $title <br/>
            Description: $description<br/>
            
            </p>
            </div>
            ";

        }
        

    }
    
}
function getallproducts(){
    global $con;

    $query=" SELECT * FROM product order by RAND() ";
    $sql= mysqli_query($con, $query);
    if(mysqli_num_rows($sql)==0){
        echo"No products available for display";
    }
    else{
        while($row=mysqli_fetch_array($sql)){
            $name= $row['pname'];
            $price= $row['pprice'];
            $product_id= $row['PID'];
            $image= $row['imagename'];
            $farmer_fk= $row['farmer_fk'];
            $farmer_query= "SELECT * from farmerregistration where farmersID= $farmer_fk";
            $farmer_sql= mysqli_query($con, $farmer_query);
            while($farmer_row= mysqli_fetch_array($farmer_sql)){
                $firstname= $farmer_row['firstname'];
            }
    
            echo"
            <div class='product_container'>
            <div class='image_container'>
            <a href='productdetails.php?id=$product_id'><img class='round' src='../Admin/product_images//$image' width='200px' height='200px' alt='image'></a>
            
            </div>
            <div class='details'>
            $name</br> $price/=</br> Farmer: $firstname </br>
            </div>
    
            
    
            </div>
            ";
        }

    }

   
} 
function updatefarmersdetails(){
    global $con;
    if(isset($_SESSION['username'])){
        $sql="select * from farmerregistration";
        $query=mysqli_query($con,$sql);

        if($query){
            while ($row=mysqli_fetch_array($query)){
                $id = $row['farmersID'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $username = $row['username'];
                $farmer_location =$row['farmer_location'];
                $password = $row['farmer_password'];
                $cpassword = $row['confirm_password'];

                echo"<div class='admin_container'>
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
                $farmer_location</br>
                </div>
                <div class='container7'>
                <a href='../Admin/updatefarmer.php?id=$id'>    <button type ='submit' name ='delete'>Update
                    </button></a>
               
                
                </div>
                </div>";
                


                
            }

        }
        if(isset($_GET['id'])){
            $farmer_id = $_GET['id'];
            $sql2 = "UPDATE  farmerregistration SET  farmer_password = '$password', confirm_password = '$cpassword' WHERE farmersID = $farmer_id ";
            $query2 = mysqli_query($con, $sql2);
            if($query2){
                echo"<script>alert('user deleted')</script>";
                echo"<script>window.open('AdminHomepage.php','_self')</script>";
            }
            else{
                echo"<script>alert('user not deleted')</script>";
            }
        }
        
        

        


    }
    else{
        echo"login";
    }
}

function orders(){
    global $con;
    
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $i =0;
       
        $sql = "SELECT * FROM orders where farmer_name = '$username' ";
        $query = mysqli_query($con, $sql);
        if(mysqli_num_rows($query)){
            while($row = mysqli_fetch_array($query)){
               
                $location = $row['location'];
                $quantity = $row['quantity'];
                $total = $row['total'];
                $delivery = $row['delivery'];
                $buyer_id = $row['buyer_id'];
                $product_id = $row['product_id'];
                $sql3 = "SELECT * FROM product where PID = $product_id";
                $query3 = mysqli_query($con, $sql3);
                while($row3 = mysqli_fetch_array($query3)){
                    $pname = $row3['pname'];
                }
                $payment = $row['payment'];
                $sql2 = "SELECT * FROM buyerregistration where buyer_id = $buyer_id ";
                $query2 = mysqli_query($con, $sql2);

                while($row2 = mysqli_fetch_array($query2)){
                    $name = $row2['firstname'];
                    $phone = $row2['phone'];
                }
            }
        }
    }
}
function category(){
    global $con;
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $sql1 = "SELECT * FROM categories";
    $query1 = mysqli_query($con, $sql1);
    if($query1){
        if(mysqli_num_rows($query1)!==0){
            while($row = mysqli_fetch_array($query1)){
                $title = $row['cat_title'];
                echo"<div class='container-c5'>";
                echo"<h3>Categories Available</h3>";
                echo"<li>$title</li>";
                echo"</div'>";
            }
        }
        else{
            echo"<h3>No categories Available</h3>";
        }
    }
}



}
function getuserlist(){
    global$con;
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM farmerregistration where username = '$username' ";
        $query = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($query)){
            $farmer_id = $row['farmersID'];
            $username = $row['username'];
            $image = $row['image_filename'];
            $sql2 = "SELECT DISTINCT buyer_id FROM messages where farmer_id = $farmer_id ";
            $query2 = mysqli_query($con, $sql2);
            if(mysqli_num_rows($query2) >0){
               while($row2 = mysqli_fetch_array($query2)){
                   $i =0;
                   $id = $row2['buyer_id'];
                   
                   $sql5 = "SELECT * FROM buyerregistration where buyer_id = '$id'";
                   $query5 = mysqli_query($con, $sql5);
                   while($row5 = mysqli_fetch_array($query5)){
                     $firstname5 = $row5['firstname'];
                     $lastname5 = $row5['lastname'];
                     $status = $row5['status'];
                     $image5 = $row5['image_filename'];
                     echo"<div class='container-m1'>
                    <a href='messagedetails.php?id=$id'><div class='container-m2'>
                    <img src='../Admin/product_images/$image5' width='50px' id='profile'>

                    </div></a>
                    <div class='container-m3'>
                        $firstname5 $lastname5
                        <div>
                        $status
                        </div>

                    </div>
                        </div>";


                                    }
                                    
                                }$i++;

            }
            else{
                echo"No Message Available";
            }
        }
        
    }
}

function getbuyeruserlist(){
    global$con;
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM buyerregistration where username = '$username' ";
        $query = mysqli_query($con, $sql);
        while($row = mysqli_fetch_array($query)){
            $buyer_id = $row['buyer_id'];
            $username = $row['username'];
            $image = $row['image_filename'];
            $sql2 = "SELECT DISTINCT farmer_id FROM messages where buyer_id = $buyer_id ";
            $query2 = mysqli_query($con, $sql2);
            if(mysqli_num_rows($query2) >0){
               while($row2 = mysqli_fetch_array($query2)){
                   $i =0;
                   $id = $row2['farmer_id'];
                   
                   $sql5 = "SELECT * FROM farmerregistration where farmersID = '$id'";
                   $query5 = mysqli_query($con, $sql5);
                   while($row5 = mysqli_fetch_array($query5)){
                     $firstname5 = $row5['firstname'];
                     $lastname5 = $row5['lastname'];
                     $status = $row5['status'];
                     $image5 = $row5['image_filename'];
                     echo"<div class='container-m1'>
                    <a href='messagedetails.php?id=$id'><div class='container-m2'>
                    <img src='../Admin/product_images/$image5' width='50px' id='profile'>

                    </div></a>
                    <div class='container-m3'>
                        $firstname5 $lastname5
                        <div>
                        $status
                        </div>

                    </div>
                        </div>";


                                    }
                                    
                                }$i++;

            }
            else{
                echo"No Message Available";
            }
        }
        
    }

}

function getAccessToken(){
    $consumer_key = 'GqyAM2tAVmOLPchPjGZESYE6hA00mLd8';
    $consumer_secret = '4PGNV6GRZ8E599rd';
    $credentials = base64_encode($consumer_key . ":" . $consumer_secret);
    $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic " . $credentials));
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $curl_response = curl_exec($curl);
    $access_token = json_decode($curl_response);
    return $access_token->access_token;
}
function lipaNaMpesaPassword()
    {
        $lipa_time = date("YmdHms",time());
        $passkey ="bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        $timestamp = $lipa_time;
        $lipa_na_mpesa_password = base64_encode(174379 . $passkey . $timestamp);
        return $lipa_na_mpesa_password;
    }
function stkPush($phone,$callbackUrl,$subtotal)
    {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer '.getAccessToken()));
        $curl_post_data = [
            //Fill in the request parameters with valid values
            'BusinessShortCode' => 174379,
            'Password' => lipaNaMpesaPassword(),
            'Timestamp' => date("YmdHms",time()),
            'TransactionType' => "CustomerPayBillOnline",
            'Amount' => 1,
            'PartyA' => $phone, // replace this with your phone number
            'PartyB' => 174379,
            'PhoneNumber' => $phone, // replace this with your phone number
            'CallBackURL' => $callbackUrl,
            
            'AccountReference' => "soko",
            'TransactionDesc' => "Payment of X"
        ];
        $callbackUrl = "http://localhost/store/buyer/success.php";
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        echo $curl_response;
        return $curl_response;
    }
    getfarmerproducts();