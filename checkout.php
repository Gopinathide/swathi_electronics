<?php
      include('includes/connect.php');
      include('functions/common_function.php');
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
       
        <?php 
          if(!isset($_SESSION['username']))
        {
            
            echo"<p style='margin-top:17px; font-size:20px; margin-left:10px;'>Welcome <span style='color: orange;'>Guest</span></p>";
           
         }
        else
         {
            echo"<p style='margin-top:17px; font-size:20px; margin-left:10px;'>Welcome <span style='color: orange;'>".$_SESSION['username']."</span></p>";
        }?>
         
         
      </div>
       
       <div class="row px-1">
           <div class="col-mid-12">
               <div class="row">
                   <?php
                      if(!isset($_SESSION['username']))
                      {
                          include('./users_area/user_login.php');
                      }
                      else{
                          include('payment.php');
                      }
                   
                   ?>
               </div>
            </div>
       </div>
     
      
      
                       
              
              
        


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