<?php
      include('../includes/connect.php');
      
?>
<!DOCTYPE html>
<html lang = "en" >
<head >
    <meta charset = "UTF-8" >
    <meta http - equiv = "X-UA-Compatible " content = "IE-edge " >
    <meta name = "viewport" content ="width=device-width,initial-scale=1.0">
    <title > Edit account </title >
    <style>
          .img
        {
            width:50px;
            height:50px;
            object-fit: contain;
        }
        </style>
</head >
<body>

<div class="container">
            <div class="row">
               <form action="" method="post" >
                <table class="table table-bordered text-center" style="width:1000px;">
                   
                  <tbody>
                      <?php
                               if(isset($_SESSION['username']))
                               {
                              global $con;
                              $cart_query="Select * from `user_order` where  user_name='$_SESSION[username]' ";
                              $result=mysqli_query($con,$cart_query);
                              $result_count=mysqli_num_rows($result);
                              $result_count=mysqli_num_rows($result);
                              echo"$result_count";
                              if($result_count>0)
                              {
                                    echo" <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Product Image</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Cancellation</th>
                                            <th>Operation</th>
                                            
                                        </tr>
                                        </thead>";
                                        while($row=mysqli_fetch_array($result))
                                        {
                                            $product_id=$row['product_id'];
                                            $select_products="Select * from `products` where product_id='$product_id'";
                                            $result_products=mysqli_query($con,$select_products);
                                            while($row_product_price=mysqli_fetch_array($result_products))
                                            {
                                                $product_title=$row_product_price['product_name'];
                                            $product_image=$row_product_price['product_image'];
                                            $product_values=$row_product_price['product_price']; 
                                            
                                            
                                    ?>
                                        <tr>
                                        <td><?php echo"$product_title"?></td>
                                        <td><img src="../admin/product_images/<?php echo $product_image ?>" alt="" class="img"></td>
                                        <td><?php echo"0" ?></td>
                                        <?php
                                        $get_ip_add = getIPAddress();
                                        $name=$_SESSION['username'];
                                            if(isset($_POST['update_cart']))
                                            {
                                                $quantity=$_POST['qty'];
                                                echo"$quantity";
                                                $update_cart="UPDATE `cart_details` SET `quantity`=' $quantity' WHERE `user_name`='$name' and `product_id`= $product_id";
                                                $result_products_quantity=mysqli_query($con,$update_cart);
                                                $select_products="Select * from `products` where product_id='$product_id'";
                                                $result_products=mysqli_query($con,$select_products);
                                                $price=mysqli_fetch_assoc($result_products);
                                                $price=$price['product_price'];
                                                $total_price=($price)*($quantity);
                                            }
     
                                            ?>
                                            <td><?php echo"$product_values"?></td>
                                            
                                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                            <td>
                    
                                           
                                            <input type="submit" value="Cancel Order" name="remove_cart" class="bg-info px-3 py-2 border-0 mx-3">
                                            </td>
                                            </tr>
                                            
                                                <?php }}}


                                  else
                                  {
                                     echo"<h2 class='text-center text-danger'>You don't have any pending orders</h2>";
                                  }
                                }
                            
                            ?>
                  </tbody>

                </table>
               </form>

               <?php
              
              function remove_cart_item()
              {
                 global $con;
                 if(isset($_POST['remove_cart'])){
                 foreach($_POST['removeitem'] as $remove_id)
                 {
                    echo $remove_id;
                    $select="Select * from user_order where user_name='$_SESSION[username]' and product_id=$remove_id";
                    $selects=mysqli_query($con,$select);
                    $row=mysqli_fetch_assoc($selects);
                    $id=$row['order_id'];
                    $delete_query="Delete from `user_order` where order_id=$id";
                    $run_delete=mysqli_query($con,$delete_query);
                    if($run_delete)
                    {
                        echo"<script>alert('Your order have been cancelled successfuly')</script>";
                    echo "<script>window.open('profile.php?user_order','_self')</script>";
                    }
              }
           }
        }
   echo $remove_item=remove_cart_item();

         ?>
            </div>
</div>
</body>
</html>