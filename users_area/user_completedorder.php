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
                              $cart_query="Select * from `user_order` where  user_name='$_SESSION[username]' and ready=1 ";
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
                                            <th>Order Date</th>
                                           
                                            
                                        </tr>
                                        </thead>";
                                        while($row=mysqli_fetch_array($result))
                                        {
                                            $product_id=$row['product_id'];
                                            $quan=$row['quantity'];
                                            $product_values=$row['amount']; 
                                            $date=$row['order_date'];
                                            $select_products="Select * from `products` where product_id='$product_id'";
                                            $result_products=mysqli_query($con,$select_products);
                                            while($row_product_price=mysqli_fetch_array($result_products))
                                            {
                                                $product_title=$row_product_price['product_name'];
                                            $product_image=$row_product_price['product_image'];
                                           
                                            
                                            
                                    ?>
                                        <tr>
                                        <td><?php echo"$product_title"?></td>
                                        <td><img src="../admin/product_images/<?php echo $product_image ?>" alt="" class="img"></td>
                                        <td><?php echo"$quan" ?></td>
                                        <?php
                                        $get_ip_add = getIPAddress();
                                        $name=$_SESSION['username'];
                                            
     
                                            ?>
                                            <td><?php echo"$product_values"?></td>
                                            <td><?php echo"$date"?></td>
                                            
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
             
         ?>
            </div>
</div>
</body>
</html>