<?php
      include('../includes/connect.php');
      include('../functions/common_function.php');
    
?>
<!DOCTYPE html>
<html lang = "en" >
<head >
    <meta charset = "UTF-8" >
    <meta http - equiv = "X-UA-Compatible " content = "IE-edge " >
    <meta name = "viewport" content ="width=device-width,initial-scale=1.0">
    
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
                               
                              global $con;
                              $cart_query="Select * from `products`";
                              $result=mysqli_query($con,$cart_query);
                              $result_count=mysqli_num_rows($result);
                              $result_count=mysqli_num_rows($result);
                              if($result_count>0)
                              {
                                    echo" <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Product Image</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Remove Product</th>
                                            <th>Operation</th>
                                            
                                        </tr>
                                        </thead>";
                                        while($row=mysqli_fetch_array($result))
                                        {
                                            $product_id=$row['product_id'];
                                            $select_products="Select * from `products`";
                                            $result_products=mysqli_query($con,$select_products);
                                           
                                            $product_title=$row['product_name'];
                                            $product_image=$row['product_image'];
                                            $product_values=$row['product_price']; 
                                            
                                            
                                    ?>
                                        <tr>
                                        <td><?php echo"$product_title"?></td>
                                        <td><img src="../admin/product_images/<?php echo $product_image ?>" alt="" class="img"></td>
                                        <td><?php echo"0" ?></td>
                                        <?php
                                        $get_ip_add = getIPAddress();
                                       
                                           
     
                                            ?>
                                            <td><?php echo"$product_values"?></td>
                                            
                                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                                            <td>
                    
                                           
                                            <input type="submit" value="Remove Product" name="remove_cart" class="bg-info px-3 py-2 border-0 mx-3">
                                            </td>
                                            </tr>
                                            
                                                <?php }}


                                  else
                                  {
                                     echo"<h2 class='text-center text-danger'>Stock is empty</h2>";
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
                    $delete_query="Delete from `products` where product_id=$remove_id";
                    $run_delete=mysqli_query($con,$delete_query);
                    if($run_delete)
                    {
                        echo"<script>alert('Product removed successfuly')</script>";
                    echo "<script>window.open('index.php?view_products','_self')</script>";
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