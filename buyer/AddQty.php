<?php
     include("../functions/function.php");
     if(isset($_GET['id'])) {
          $product_id = $_GET['id'];
          $sel_price = "select * from cart where PID = '$product_id'";
          $run_price = mysqli_query($con,$sel_price);
          while ($p_price = mysqli_fetch_array($run_price)) {
              $qty = $p_price['quantity'];
             
          }
          $pro_price = "select * from product where PID='$product_id'";
          $run_pro_price = mysqli_query($con, $pro_price);
        while ($pp_price = mysqli_fetch_array($run_pro_price)) {
            $price = $pp_price['pprice'];
        }
          if ($qty >= 0) {
              $qty +=1;
              $subtotal = $price * $qty;
              $sel_price = "update cart set quantity = '$qty',subtotal = '$subtotal' where PID = '$product_id'";
              $run_price = mysqli_query($con, $sel_price);
          }

          echo "<script>window.open('cartPage.php','_self')</script>";
     }
