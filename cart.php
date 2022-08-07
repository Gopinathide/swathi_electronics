<?php
      include('includes/connect.php');
      include('functions/common_function.php');
      session_start();
?>

<!DOCTYPE html>
<html lang="en">
   <head>
     
      <title>Swathi electronics</title>
     
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <style>
          .card-img-top {
              width: 100%;
              height: 200px;
              object-fit: contain;
          }

        .img
        {
            width:50px;
            height:50px;
            object-fit: contain;
        }
        * {box-sizing: border-box;}

body {
margin: 0;
font-family: Arial, Helvetica, sans-serif;
}

.topnav {
overflow: hidden;
background-color: #e9e9e9;
}

.topnav a {
float: right;
display: block;
color: black;
text-align: center;
padding: 14px 16px;
text-decoration: none;
font-size: 17px;
}

.topnav a:hover {
background-color: #ddd;
color: black;
}

.topnav a.active {
background-color: #2196F3;
color: white;
}

.topnav .search-container {
float: right;
}

.topnav input[type=text] {
padding: 6px;
margin-top: 8px;
font-size: 17px;
border: none;
}

.topnav .search-container button {
float: right;
padding: 6px;
margin-top: 8px;
margin-right: 16px;
background: #ddd;
font-size: 17px;
border: none;
cursor: pointer;
}

.topnav .search-container button:hover {
background: #ccc;
}

@media screen and (max-width: 600px) {
.topnav .search-container {
   float: none;
}
.topnav a, .topnav input[type=text], .topnav .search-container button {
   float: none;
   display: block;
   text-align: left;
   width: 100%;
   margin: 0;
   padding: 14px;
}
.topnav input[type=text] {
   border: 1px solid #ccc;  
}
}

                  
                
          </style>
     
       </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <!-- <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div> -->
      <!-- end loader --> 
      <!-- header -->
      <header>
         <!-- header inner -->
        
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                  <div class="full">
                     <div class="center-desk">
                        <div class="logo"> <a href="index.html"><img src="images/1.jfif" alt="logo" style="width: 100px;"></a> </div>
                        <p style="font-size: 20px;margin-top: 20px; color: black;font-style: italic;"><strong>SWATHI </strong><br>ELECTRONICS</p>
                     </div>
                  </div>
               </div>
               <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">
                  <div class="menu-area">
                     <div class="limit-box">
                        <nav class="main-menu">
                           <ul class="menu-area-main">
                              <li> <a href="index.php" style="font-style: italic;">Home</a> </li>
                              <li > <a href="about.php" style="font-style: italic;">About</a> </li>
                              <li class="active"> <a href="product.php" style="font-style: italic;">product</a> </li>
                            
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
               <?php
               if(!isset($_SESSION['username']))
               { 
              echo" <li><a class='buy' href='./users_area/user_login.php' style='font-style: italic;'>Login</a></li>";
              
               }
               else{
                  echo" <li><a class='buy' href='logout.php' style='font-style: italic;'>Logout</a></li>";
               }
               
               ?>
               </div>
            </div>
         </div>

         <!-- end header inner --> 
      </header>
      <div class="topnav">
         
         
         <a href="#">Total Price:<?php total_cart_price() ?>/-</a>
         <a href="cart.php" style="margin-right:2px; background-color: #ddd;"><img style="width:40px;"src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIEAAACBCAMAAADQfiliAAAAZlBMVEX///8AAAD7+/vS0tJlZWXNzc3w8PAuLi5XV1f39/dJSUkUFBRubm5ycnIZGRn09PQNDQ0+Pj5fX1/k5OR+fn6EhISRkZEdHR23t7eenp43NzekpKS+vr5SUlLFxcUmJibb29utra1mv8jHAAADwUlEQVR4nO2ci5KqMAyGoWq1gMhFxQuIvv9LnrTFguihKaKeM5PfmRWihG/bJk3LznqC/VbCY95vxYiACIiACIiACIiACIiACIiACIiACIiACP5PgmvwqPT8dQK/p5p/mcAr+gizbxNs+wT7bxOUfYL02wR52COIr18m8M6n0ymFKKiqWCMczEdiNkK5M0GrhSaIjOHQ7yGMBnrRnpGW2oc5fwpVjAZGsp1gp31czRWrEQQD0WwnuGgfR2PYuwMUA/7tBHmtnGTGMHMnmL9F4GXay8ZcUjsTLN4jOGovpTHwhYMuZVkOxCKKoBn8W9v3RgpBsNHxGIifEdznqevvCJos+KEyBUOw0QQrY+C7rdSuq/2Djnedz+fjcHmDqhNPiqA28cifKphBXd8naLLgxRgqJ4Jh5yiCJjG308vNBWA9AYHQrb40Bqf58TDgGUtwb3UzEDapA8FgRsQS3LSvmzEclmjtLL5xBM+JmaNl840jYIEiqIcSM2NsM/DxmwSIxMyE4GLM1IEkkPVqUvy93GMK4ZNtwAEgCZMV03eD2/Xc3D/4GIE39+M6DotcwK8qZI/vo/U6gpdUBAeROpQH6q1RtLe6xxIc/TgJYyiUxEZICi/wEzU0EmgcWFOpI3mizGFyTwaZ1TOWIAevcZhEkoB5QHDzC2mJY3iHIQKvOAwLX75BWyUNH2JKR++h+GEM/pdM94JgM7i5vFtRhEAQqxMgqBMFVvhxaIseV4K1bNoQlh6AwGTwp748h76Rt5I/ExirYIGv6TNFYHeMJij7rbrGzAm2lOxCkOtFdNUa5iurIsTuD34vrZkOOxbrXzKhUiSeoCmUhpY/o4QnaJaLk+8o4Qm47oZq6h1Qhz3VqOkG2cPNxW2PK21ayawxOUFTKCXVKsvmSlmWyRFfgfTeK+gklaZBUGVzS33mTMAxCeBBUxMwt1WC76cTR6P79g0iIToSLBwJSrtLRwLPkQDn1Ing3MSATTJEsvnN7tCZAC+G9/qPPuUhAowE56/SDZidVy2jCPJtAYvIY9/MdzVMGzvHpdsYgvszoODRbPab3ZphBEFuUs5DtcLNdnP0tyunImgfxCXdQvTcJkPUnDieQHSmyEvH3nnw8TRCpiXg6etbdQhwk+Jogm6Z0F0VZq3ZqZp9axw8PD46vu6cTxC0sRB0r22LuNrJ5Zh8cLuHwuOYv7xqmc8QeDe51R0/lcIXNUZXjs/px80LfHG4XJ/NYlG+Mn+CYEoRAREQAREQAREQAREQAREQAREQwRDBz///wR8y9jOp2SJTlgAAAABJRU5ErkJggg=="></a>
       
         <?php 
        if(!isset($_SESSION['username']))
        {  
            echo"<p style='margin-top:17px; font-size:20px; margin-left:10px;'>Welcome <span style='color: orange;'>Guest</span></p>";
         }
        else
         { 

            if(isset($_SESSION['username']))
            {
                $user_name=$_SESSION['username'];
                $user="Select * from user_table where user_name='$user_name'";
                $img=mysqli_query($con,$user);
                $row_img=mysqli_fetch_array($img);
                $image=$row_img['user_image'];
                
            }

             echo"<a href='./users_area/profile.php' style='float:left;padding:0px 0px; '><img src='./users_area/user_images/ $image' style=' width: 90px; height:70px;margin: auto;display: block;object-fit: contain;margin-left:10px; border-radius:100px;'></a><span style='margin-left:10px; font-size:30px'> $_SESSION[username]</span>";
         }?>

         
         
      </div>
     
      
      <br><br>
    
    <div class="container">
            <div class="row">
               <form action="" method="post" >
                <table class="table table-bordered text-center">
                   
                  <tbody>
                      <?php
                      if(!isset($_SESSION['username']))
                      {
                        
                            }
                            
                            else
                            
                            {
                              global $con;
                              $get_ip_add = getIPAddress();
                              $total_price=0;
                              $cart_query="Select * from `cart_details` where user_name='$_SESSION[username]' ";
                              $result=mysqli_query($con,$cart_query);
                              $result_count=mysqli_num_rows($result);
                              if($result_count>0)
                              {
                               echo" <thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Update Quantity</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Remove from cart</th>
                                </tr>
                          </thead>";
                              while($row=mysqli_fetch_array($result))
                              {
                                  $product_id=$row['product_id'];
                                  $value=$row['quantity'];
                                  $select_products="Select * from `products` where product_id='$product_id'";
                                  $result_products=mysqli_query($con,$select_products);
                                  while($row_product_price=mysqli_fetch_array($result_products))
                                  {
                                 
                                  
                                  $product_title=$row_product_price['product_name'];
                                  $product_image=$row_product_price['product_image'];
                                  $se="Select * from `cart_details` where product_id='$product_id' and user_name='$_SESSION[username]'";
                                  $sel=mysqli_query($con,$se);
                                  $sels=mysqli_fetch_assoc($sel);
                                  $price_table=$sels['price'];
                                  $total_price+=$price_table; 
                                
                           ?>
                             <tr>
                             <td><p class="my-2"><?php echo"$product_title"?></p></td>
                             <td><img src="./admin/product_images/<?php echo $product_image ?>" alt="" class="img"></td>
                           
                             <?php
                                 echo" <td><p class='my-2'>$value</p></td>";
                                 $get_ip_add = getIPAddress();
                                $name=$_SESSION['username'];
                                 
     
                             ?>
                             <td><p class="my-2"><?php echo"$price_table"?></p></td>
                             <td>
                             <?php
                              echo"<a href='edit_cart_quant.php?id=$product_id' class='btn btn-info my-1'>Update</a>"
                              ?>
                             <td><input type="checkbox" name="removeitem[]" class="my-3" value="<?php echo $product_id ?>"></td>
                             <td>
                             <input type="submit" value="Remove" name="remove_cart" class="btn btn-info my-1">
                             </td>
                            </tr>
                                  <?php }}}
                                  
                                  else{
                                     echo"<h2 class='text-center text-danger'>Cart is Empty</h2>";
                                      
                                  echo"  <input type='submit' value='Continue shopping' name='continue_shopping' class='bg-info px-3 py-2 border-0 mx-3'>";
                                 
                                  }
                            }
                            ?>
                  </tbody>

                </table>
                             <td
                           <?php
                               
                               global $con;
                               $get_ip_add = getIPAddress();
                               $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
                               $result=mysqli_query($con,$cart_query);
                               $result_count=mysqli_num_rows($result);
                               if($result_count>0)
                               {
                                 echo "
                                 <h4 class='px-3'>Subtotal:<strong></strong>$total_price/-</h4>
                                 <input type='submit' value='Continue shopping' name='continue_shopping' class='btn btn-info my-2'>
                                 <input type='submit' value='Place Order' name='checkout' class='btn btn-info my-2'>";
                               }
                               else
                               {
                                  
                                  echo"  <input type='submit' value='Continue shopping' name='continue_shopping' class='bg-info px-3 py-2 border-0 mx-3'>";
                               }


                               if(isset($_POST['continue_shopping']))
                               {
                                echo "<script>window.open('product.php','_self')</script>";
                               }


                               if(isset($_POST['checkout']))
                               {
                                  if(!isset($_SESSION['username']))
                                  {
                                     
                                echo "<script>window.open('./users_area/user_login.php','_self')</script>";
                                  }
                                  else
                                  {
                                       
                                      
                                       global $con;
                                       $get_ip_add = getIPAddress();
                                       $total_price=0;
                                       $name=$_SESSION['username'];
                                       $cart_query="Select * from `cart_details` where user_name='$_SESSION[username]'";
                                       $result=mysqli_query($con,$cart_query);
                        
                                       while($row=mysqli_fetch_array($result))
                                       {
                                          $product_id=$row['product_id'];
                                          $quans=$row['quantity'];
                                         
                                          $select_products="Select * from `products` where product_id='$product_id'";
                                          $result_products=mysqli_query($con,$select_products);
                                          $prices=mysqli_fetch_assoc($result_products);
                                          $red=$prices['quantity']-$quans;
                                         
                                          $reds="UPDATE `products` SET `quantity`='$red' WHERE product_id=$product_id ";
                                          $redss=mysqli_query($con,$reds);
                                          $price=$row['price'];
                                          $selectss="Select * from `user_table` where user_name='$name'";
                                          $runns=mysqli_query($con,$selectss);
                                          $runs=mysqli_fetch_assoc($runns);
                                          $u_id=$runs['user_id'];
                                          $u_email=$runs['user_email'];
                                          $u_address=$runs['user_address1'];
                                          $u_pincode=$runs['user_pincode'];
                                          $u_mobile=$runs['user_mobile'];
                                           $insert="INSERT INTO `user_order`( `user_name`,`user_id`,`user_email`,`user_address`,`user_pincode`,`user_mobile`,`product_id`, `amount`, `quantity`) 
                                           VALUES ('$name', $u_id,'$u_email','$u_address','$u_pincode','$u_mobile',$product_id,$price,$quans)";
                                           $resultdown=mysqli_query($con,$insert);  
                                       }
                                       
                                       echo"<script>alert('Your Order have been placed Successfully')</script>";
                                       echo"<script>window.open('product.php','_self')</script>";
                                        $delete="DELETE FROM `cart_details` WHERE user_name='$name'";
                                        $resultup=mysqli_query($con,$delete);
                                       

                                  }
                                 }
                                
                           ?>
              
            </div>
    </div>
   </form>

       <?php
         function remove_cart_item()
         {
            global $con;
            if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $remove_id)
            {
               echo $remove_id;
               $delete_query="Delete from `cart_details` where product_id=$remove_id";
               $run_delete=mysqli_query($con,$delete_query);
               if($run_delete)
               {
               echo "<script>window.open('cart.php','_self')</script>";
               }
         }
      }
   }
   echo $remove_item=remove_cart_item();

         ?>


      <script src="js/jquery.min.js"></script> 
      <script src="js/popper.min.js"></script> 
      <script src="js/bootstrap.bundle.min.js"></script> 
      <script src="js/jquery-3.0.0.min.js"></script> 
      <script src="js/plugin.js"></script> 
      <!-- sidebar --> 
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script> 
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         $(".zoom").hover(function(){
         
         $(this).addClass('transition');
         }, function(){
         
         $(this).removeClass('transition');
         });
         });
         
      </script> 
   </body>
</html>