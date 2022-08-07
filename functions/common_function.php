   <style>
    .cen{
        color:red;
       
        margin: auto;
    }
    </style>
<?php
      
     
    
     function getproducts() 
     {

        global $con;
        
        if(!isset($_GET['category']))
        {
            if(!isset($_GET['brand']))
            {
                $select_query="Select *  from `products` order by rand() limit 0,12 ";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query))
                {
                    if($row['quantity']>=0)
                    {
                    $product_id=$row['product_id'];
                    $product_title=$row[ 'product_name'];
                    $product_description=$row['product_description'];
                    $product_keyword=$row['product_keywords'];
                    $product_image1=$row[ 'product_image'];
                    $product_price=$row[ 'product_price'];
                    $category_id=$row['category_id'];
                    $brand_id=$row[ 'brand_id'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                    <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                    <h5_class='card-title'> $product_title</h5>
                    <p class='card-text'>$product_description</p><br>
                    <p class='card-text'>Price:  $product_price/-</p>
                    <a href='product.php?add_to_cart=$product_id' class='btn btn-info my-4'>Add to cart</a>
                    <a href='product_detials.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                    </div>
  
                    </div>";
                    }
                  
                    }
                }
            }
       

    }

    function get_unique_categories()
    {

        global $con;
        if(isset($_GET['category']))
        {
               $category_id=$_GET['category'];
               $select_query="Select *  from `products` where category_id=$category_id";
               $result_query=mysqli_query($con,$select_query);
               $num_of_rows=mysqli_num_rows($result_query);
               if($num_of_rows==0)
               {
                   echo "<h2 class='cen' >No Stocks available for this category</h2>";
               }
               while($row=mysqli_fetch_assoc($result_query)){
                   $product_id=$row['product_id'];
                   $product_title=$row[ 'product_name'];
                   $product_description=$row['product_description'];
                   $product_image1=$row[ 'product_image'];
                   $product_price=$row[ 'product_price'];
                   $category_id=$row['category_id'];
                   $brand_id=$row[ 'brand_id'];
                   echo "<div class='col-md-4 mb-2'>
                   <div class='card'>
                   <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                   <div class='card-body'>
                   <h5_class='card-title'> $product_title</h5>
                   <p class='card-text'>$product_description</p>
                   <p class='card-text'>Price:  $product_price/-</p>
                   <a href='product.php?add_to_cart=$product_id' class='btn btn-info my-4'>Add to cart</a>
                   <a href='product_detials.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                   </div>
                   </div>
                   </div>";
                   }

        }
    }

    function get_unique_brands()
    {
        
        global $con;
        if(isset($_GET['brand']))
        {
               $brand_id=$_GET['brand'];
               $select_query="Select *  from `products` where brand_id=$brand_id";
               $result_query=mysqli_query($con,$select_query);
               $num_of_rows=mysqli_num_rows($result_query);
               if($num_of_rows==0)
               {
                   echo "<h2 class='cen' >Sorry..currently this brand is not avilable</h2>";
               }
               while($row=mysqli_fetch_assoc($result_query)){
                   $product_id=$row['product_id'];
                   $product_title=$row[ 'product_name'];
                   $product_description=$row['product_description'];
                   $product_image1=$row[ 'product_image'];
                   $product_price=$row[ 'product_price'];
                   $category_id=$row['category_id'];
                   $brand_id=$row[ 'brand_id'];
                   echo "<div class='col-md-4 mb-2'>
                   <div class='card'>
                   <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                   <div class='card-body'>
                   <h5_class='card-title'> $product_title</h5>
                   <p class='card-text'>$product_description</p>
                   <p class='card-text'>Price:  $product_price/-</p>
                   <a href='product.php?add_to_cart=$product_id' class='btn btn-info my-4'>Add to cart</a>
                   <a href='product_detials.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                   </div>
                   </div>
                   </div>";
                   }

        }
    }

     function getbrands()
     {
        global $con;


        $select_brands="Select * from `brands`";
        $result_brands=mysqli_query($con,$select_brands);
       
        while($row_data=mysqli_fetch_assoc($result_brands))
        {
        $brand_title=$row_data['brand_title'];
        $brand_id=$row_data['brand_id'];
        echo " <li class='nav-item'>
        <a href='product.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
        </li>";
        }
     }

     function getcategories()
     {
        global $con;

        $select_cats="Select * from `categories`";
                    $result_cats=mysqli_query($con,$select_cats);
                   
                    while($row_data=mysqli_fetch_assoc($result_cats))
                    {
                    $category_title=$row_data['category_title'];
                    $category_id=$row_data['category_id'];
                    echo " <li class='nav-item'>
                    <a href='product.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                    </li>";
                    }
     }


     function search_product() 
     {

        global $con;
         if(isset($_GET['search_data_product']))
         { 
             $search_data_value=$_GET['search_data'];
                $search_query="SELECT *  FROM `products`  WHERE product_keywords LIKE '%$search_data_value%'";
                $result_query=mysqli_query($con,$search_query);
                $num_of_rows=mysqli_num_rows($result_query);
                if($num_of_rows==0)
                {
                    echo "<h2 class='cen' >No Stocks available for this category</h2>";
                }
                while($row=mysqli_fetch_assoc($result_query))
                {
                    $product_id=$row['product_id'];
                    $product_title=$row[ 'product_name'];
                    $product_description=$row['product_description'];
                    $product_keyword=$row['product_keywords'];
                    $product_image1=$row[ 'product_image'];
                    $product_price=$row[ 'product_price'];
                    $category_id=$row['category_id'];
                    $brand_id=$row[ 'brand_id'];
                    echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                    <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                    <div class='card-body'>
                    <h5_class='card-title'> $product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>Price:  $product_price/-</p>
                    <a href='product.php?add_to_cart=$product_id' class='btn btn-info my-4'>Add to cart</a>
                    <a href='product_detials.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                    </div>
                    </div>
  
                    </div>";
                    }
                }
       

         }
         function viewpage()
         {
           
            global $con;
         
          if(isset($_GET['product_id']))
          {
            if(!isset($_GET['category']))
            {
                if(!isset($_GET['brand']))
                {
                    $product_id=$_GET['product_id'];
                   
                    $select_query="Select *  from `products` where product_id=$product_id";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query))
                    {
                        $product_id=$row['product_id'];
                        $product_title=$row[ 'product_name'];
                        $product_description=$row['product_description'];
                        $product_keyword=$row['product_keywords'];
                        $product_image1=$row[ 'product_image'];
                        $product_price=$row[ 'product_price'];
                        $category_id=$row['category_id'];
                        $viewpage=$row['viewpage'];
                        $brand_id=$row[ 'brand_id'];
                        echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                        <h5_class='card-title'> $product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <p class='card-text'>Price:  $product_price/-</p>
                        <a href='product.php?add_to_cart=$product_id' class='btn btn-info my-4'>Add to cart</a>
                        <a href='product.php' class='btn btn-secondary'>Go Home</a>
                        </div>
                        </div>
                      
                        </div>";
                        echo"<div class='col-md-5 mb-2'>
                        <p style='font-size:20px;'>$viewpage</p>
                         </div>";
                     
                        }
                    }
                }
         }
        }
        function getIPAddress() 
        {  
      
                if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                            $ip = $_SERVER['HTTP_CLIENT_IP'];  
                    }  
               
                elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
                }  
          
                else{  
                        $ip = $_SERVER['REMOTE_ADDR'];  
                }  
                return $ip;  
            }  
         
   
           
            function cart()
            {
                if(isset($_GET['add_to_cart']))
                {
                    if(!isset($_SESSION['username']))
                    {
                        echo"<script>window.open('./users_area/user_login.php','_self')</script>";
                    }
                    else
                    {
                        global $con;
                        $ip =getIPAddress();
                        $get_product_id=$_GET['add_to_cart'];
                        $select_query="Select * from `cart_details` where user_name='$_SESSION[username]' and
                        product_id=$get_product_id";
                        $result_query=mysqli_query($con,$select_query);
                        $num_of_rows=mysqli_num_rows($result_query);
                        if($num_of_rows>0)
                        {
                        echo "<script>alert('This item is already present inside cart')
                        </script>";
                        echo "<script>window.open('product.php','_self')</script>";
                        }
                        else
                        {
                            $sel="Select * from `products` where product_id=$get_product_id";
                            $rel=mysqli_query($con,$sel);
                            $re=mysqli_fetch_assoc($rel);
                            $pr=$re['product_price'];
                        $insert_query="insert into `cart_details` (product_id,ip_address,
                        quantity,user_name,price) values( $get_product_id,'$ip',1,'$_SESSION[username]',$pr)";   
                        $result_query=mysqli_query($con,$insert_query);
                        echo "<script>alert('This product is successfully added in cart')</script>";
                        echo "<script>window.open('product.php','_self')</script>";
                        }
            
                    }
                 }
           }

            function total_cart_price()
            {
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
                    while($row=mysqli_fetch_array($result))
                    {
                       $product_values=$row['price'];
                        
                        $total_price+=$product_values; 
                        
                        
                    }
                    echo $total_price;
                }
                   
            }
        

?>  

