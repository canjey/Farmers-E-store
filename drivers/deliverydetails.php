<?php
include("../functions/function.php");
include("../includes/db.php");
?>
<?php
if(isset($_GET['id'])){
   
    $id = $_GET['id'];
    $sql = "INSERT INTO jobs ('order_id') VALUES( '$id' )";
    $query = mysqli_query($con, $sql);
    if($query){
        echo'success';
    }
    else{
        echo'trouble';
    }
    

}

?>