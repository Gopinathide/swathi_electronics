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
                              <li class="active"> <a href="index.php" style="font-style: italic;">Home</a> </li>
                              <li> <a href="about.php" style="font-style: italic;">About</a> </li>
                              <li> <a href="product.php" style="font-style: italic;">product</a> </li>
                            
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

         <!-- end header inner --> 
      </header>

      <div class="topnav">
         
         <div class="search-container">
            <form action="search_product.php" method="get">
               <input type="text" placeholder="Search.." name="search_data">
               <!-- <button type="submit">Search</button> -->
               <input type="submit" value="search" class="btn-outline-light " name="search_data_product" >
            </form>
         </div>
         <a href="#">Total Price:<?php total_cart_price() ?>/-</a>
         <a href="cart.php" style="margin-right:2px;"><img style="width:40px;"src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIEAAACBCAMAAADQfiliAAAAZlBMVEX///8AAAD7+/vS0tJlZWXNzc3w8PAuLi5XV1f39/dJSUkUFBRubm5ycnIZGRn09PQNDQ0+Pj5fX1/k5OR+fn6EhISRkZEdHR23t7eenp43NzekpKS+vr5SUlLFxcUmJibb29utra1mv8jHAAADwUlEQVR4nO2ci5KqMAyGoWq1gMhFxQuIvv9LnrTFguihKaKeM5PfmRWihG/bJk3LznqC/VbCY95vxYiACIiACIiACIiACIiACIiACIiACIiACP5PgmvwqPT8dQK/p5p/mcAr+gizbxNs+wT7bxOUfYL02wR52COIr18m8M6n0ymFKKiqWCMczEdiNkK5M0GrhSaIjOHQ7yGMBnrRnpGW2oc5fwpVjAZGsp1gp31czRWrEQQD0WwnuGgfR2PYuwMUA/7tBHmtnGTGMHMnmL9F4GXay8ZcUjsTLN4jOGovpTHwhYMuZVkOxCKKoBn8W9v3RgpBsNHxGIifEdznqevvCJos+KEyBUOw0QQrY+C7rdSuq/2Djnedz+fjcHmDqhNPiqA28cifKphBXd8naLLgxRgqJ4Jh5yiCJjG308vNBWA9AYHQrb40Bqf58TDgGUtwb3UzEDapA8FgRsQS3LSvmzEclmjtLL5xBM+JmaNl840jYIEiqIcSM2NsM/DxmwSIxMyE4GLM1IEkkPVqUvy93GMK4ZNtwAEgCZMV03eD2/Xc3D/4GIE39+M6DotcwK8qZI/vo/U6gpdUBAeROpQH6q1RtLe6xxIc/TgJYyiUxEZICi/wEzU0EmgcWFOpI3mizGFyTwaZ1TOWIAevcZhEkoB5QHDzC2mJY3iHIQKvOAwLX75BWyUNH2JKR++h+GEM/pdM94JgM7i5vFtRhEAQqxMgqBMFVvhxaIseV4K1bNoQlh6AwGTwp748h76Rt5I/ExirYIGv6TNFYHeMJij7rbrGzAm2lOxCkOtFdNUa5iurIsTuD34vrZkOOxbrXzKhUiSeoCmUhpY/o4QnaJaLk+8o4Qm47oZq6h1Qhz3VqOkG2cPNxW2PK21ayawxOUFTKCXVKsvmSlmWyRFfgfTeK+gklaZBUGVzS33mTMAxCeBBUxMwt1WC76cTR6P79g0iIToSLBwJSrtLRwLPkQDn1Ing3MSATTJEsvnN7tCZAC+G9/qPPuUhAowE56/SDZidVy2jCPJtAYvIY9/MdzVMGzvHpdsYgvszoODRbPab3ZphBEFuUs5DtcLNdnP0tyunImgfxCXdQvTcJkPUnDieQHSmyEvH3nnw8TRCpiXg6etbdQhwk+Jogm6Z0F0VZq3ZqZp9axw8PD46vu6cTxC0sRB0r22LuNrJ5Zh8cLuHwuOYv7xqmc8QeDe51R0/lcIXNUZXjs/px80LfHG4XJ/NYlG+Mn+CYEoRAREQAREQAREQAREQAREQAREQwRDBz///wR8y9jOp2SJTlgAAAABJRU5ErkJggg=="></a>
         <!-- <a href="./users_area/profile.php"><img src="./images/1.jpg" style="width:40px; margin-right:100px;"></a> -->
        
 
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
         
         
     
      
      <div class="brand_color">
         <div class="container" style="height: 60px;">
             <div class="row">
                 <div class="col-md-12">
                     <div class="titlepage" style="margin-top:3px;">
                         <h2>PRODUCTS</h2>
                     </div>
                 </div>
             </div>
         </div>
    </div><br><br>
    <div class="row">

        <div class="col-md-10 " >
            <div class="row">
             
             <?php
               getproducts();
               get_unique_categories();
               get_unique_brands();
               // $ip = getIPAddress();  
               // echo 'User Real IP Address - '.$ip;  
               cart();
             ?>
            
               

               
            </div>
        </div>
    

            
       

        <div class="col-md-2 bg-secondary p-0" >
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><strong> Brands</strong></a>
                </li>
                <?php
                   getbrands();
                ?>


                <li class="nav-item bg-info">
                <a href="#" class="nav-link text-light"><strong> Categories </strong></a>
                </li>
                <?php
                    getcategories();
                ?>
               
            </ul>
        </div>
    
    </div>

    <footr>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class="col-md-6 offset-md-3">
                  <ul class="sociel">
                      <li> <a href="#"><img src="data:image/png;base64,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"></i></a></li>
                      <li> <a href="#"><img src="data:image/png;base64,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"></i></a></li>
                      <li> <a href="#"><img src="data:image/jpeg;base64,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"></i></a></li>
                  </ul>
               </div>
            </div>
         </div><br><br>
         <p style="text-align: center; font-size: 20px ; ">Copyright 2022 All Right Reserved By Swathi Electronics</p>
<br>
   </div>
   </footr>

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