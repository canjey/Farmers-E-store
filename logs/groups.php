<?php
include("../includes/db.php");
include("../functions/function.php");


?>

<html>
    <head><title>Groups</title>
    </head>
        <style>
            #container-g4{
                display:none;
            }
            .container-g3{
                display: flex;
                margin-top: 20px;
            }
            #name{
                width:150px;
            }
            .container-g5{
                display: flex;
            }
            #container-g10{
                display:none;
            }

        </style>
        <script>
            function showsub(){
                var x = document.getElementById("category").value;
                if (x==="farming"){
                    var array = ["Animal Farming","Plant Farming" ];
                }
                else if(x==="Equipments"){
                    var array =["Machineries","Tools"];
                }
                else if(x==="diseases"){
                    var array = ["Animal Diseases", "Plants Diseases"];
                }
                var string = "";
                for( let i =0; i<array.length; i++){
                    string = string + "<option>" + array[i] + "</option>" ;


                    
                }
                string = "<select name ='lol'> " +string + "</select>"
                document.getElementById("subcategory").innerHTML = string;
        
            }
            function showgroups(){
                var y = doument.getElementById("container-g10");
                if(y.style.display ==="none"){
                    y.style.display = "block"
                }
                else{
                    y.style.display = "none";
                }

            }
            
            function myshow(){
                var x = document.getElementById("container-g4");
                if(x.style.display ==="none"){
                    x.style.display = "block";
                }
                else{
                    x.style.display = "none";
                }
            }

        

        </script>
    <body>
        <div class="container-g2">
            <?php
            include("../Template/header.php");
            
            ?>
            
                <div class ="container-g1">
                    <span>New Group </span>
                    <input type = "button" value="Create Group" onclick="myshow()">
                </div>
                <div class ="container-g1">
                    <input type = "button" value="View Groups" onclick="showgroups()">
                </div>
            
            
            <div id = "container-g4">
                <form action ="groups.php" method="post">
                    <div class ="container-g3">
                        <div id ="name"><span>Group name</span></div>
                        <div><input type="text" name="group_name"></div>
                    </div>
                    <div class ="container-g3">
                        <div id ="name"><span>Group Description</span></div>
                        <div><input type="text" name ="group_description"></div>
                    </div>
                    <div class ="container-g3">
                        <div id ="name"><span>Group Category</span></div>
                        <div><select name ='category' id="category" onchange="showsub()">
                            <option value = '0'>
                                --Select category--
                            </option>
                            <option value = 'farming'>
                                Farming
                            </option>
                            <option value = 'Equipments'>
                               Equipments
                            </option>
                            <option value = 'diseases'>
                                Diseases
                            </option>
                        </select> 
                    </div>
                    </div>
                    <div class ="container-g3">
                        <div id ="name">
                            <span> Group Sub Category</span>
                            
                        </div>
                        <div>
                            <select name = 'sub_category' id ="subcategory">
                                <option > --Select Sub Category--</option>
                            </select>
                        </div>
                    </div>
                    <div class ="container-g3">
                       
                    <input type = "submit" name = "create" id ="create_btn" value ="Create ">
                    </div>
                    

                    

                </form>
            </div>
            
            <h3><u> Groups</u></h3>
            <div class="container-g5">
               
                <?php
                if(isset($_SESSION['username'])){
                    $username = $_SESSION['username'];
                    $sql = "SELECT * FROM groups";
                    $query = mysqli_query($con, $sql);
                    if($query){
                        if(mysqli_num_rows($query)> 0){
                            while($row = mysqli_fetch_array($query)){
                                $id = $row['group_id'];
                                $name = $row['group_name'];
                                $category = $row['category'];
                                $sub_category = $row['sub_category'];
                                echo"$name. $category. $sub_category</br>";
                            }
                        }
                        else{
                            echo"No groups Available";
                        }
                    }
                }
                
    
                ?>
                <h2>Groups I am In</h2>
    
                <div class ="container-g9">
                    
                <?php
                if(isset($_SESSION['username'])){
                    $username = $_SESSION['username'];
                    $sql1 = "SELECT * FROM farmerregistration where username = '$username' ";
                    $query1 = mysqli_query($con, $sql1);
                    while($row1 = mysqli_fetch_array($query1)){
                        $id = $row1['farmersID'];
                        $sql2 = "SELECT * FROM groups where farmer_id = $id";
                        $query2 = mysqli_query($con, $sql2);
                        if($query2){
                            
                            $name = $row['group_name'];
                            $category = $row['category'];
                            $sub_category = $row['sub_category'];
                            echo"$name. $category. $sub_category</br>";
                        

                        

                        }
                        
                    }
                }
                
                ?>

                    
                
                            

                            
                </div>
                                    
            </div>
            
        </div>
        
        <div id = "container-g10">
            <?php
            if(isset($_SESSION['username'])){
                $username = $_SESSION['username'];
                $sql10 = "SELECT * FROM farmerregistration where username = '$username' ";
                $query10 = mysqli_query($con, $sql10);
                if($query10){
                    while($row10 = mysqli_fetch_array($query10)){
                        $id = $row10['farmersID'];
                        $sql11 = "SELECT * FROM groups ";
                        $query11 = mysqli_query($con, $sql11);
                        if(mysqli_num_rows($query11)>0){
                            while($row11 = mysqli_fetch_array($query11)){
                                $role = $row11['role'];
                               
                                    $group_name = $row11['group_name'];
                                    echo "<div class='container-g11>$group_name</br>
                                    </div>";

                                
                            }
                        }
                        else{
                            echo"no groups";
                        }
                    }
                }
            }
        
        
            ?>

        </div>
       
        
    </body>
    <?php
        include("../Template/footer.php");
        
        ?>
</html>
<?php
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM farmerregistration where username = '$username' ";
    $query = mysqli_query($con, $sql);
    if($query){
        while($row = mysqli_fetch_array($query)){
            $id = $row['farmersID'];
        }
        if(isset($_POST['create'])){
            $group_name = $_POST['group_name'];
            $group_description = $_POST['group_description'];
            $category = $_POST['category'];
            $sub_category = $_POST['sub_category'];
            $role = "Admin";
            $sql1 = "INSERT INTO groups (group_name, group_description,category,sub_category,farmer_id,role) values
            ('$group_name','$group_description','$category','$sub_category','$id','$role')";
            $query1 = mysqli_query($con, $sql1);
            if($query1){
                echo"<script>alert('group created')</script>";
                echo"<script>window.open('groups.php','_self')</script>";
                
            }
            else{
                echo"Check Network";
            }
    
            
    
    
        }
    }
    
}

?>