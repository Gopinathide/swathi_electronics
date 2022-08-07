<?php
   include('../includes/connect.php');
   include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
   <head>
     
      <title>Swathi electronics</title>
      <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    
       </head>
<body>
     <div class="container-fuid my-3">
         <h2 style="text-align:center;">Registration Form</h2><br><br>
         <div class="row d-flex align-items-center justify-content-center">
             <div class="col-lg-12 col-xl-6">

             <form action="" method="post" enctype="multipart/form-data" onsubmit="return validate()">
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="user_name" class="form-label">User Name</label>
                    <input type="text" name="user_name" id="user_name" class="form-control"
                    placeholder="Enter your User name" autocomplete="off"
                    required="required">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" name="user_email" id="user_email" class="form-control"
                    placeholder="Enter you Email" autocomplete="off"
                    required="required">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="user_image" class="form-label">Image</label>
                    <input type="file" name="user_image" id="user_image" class="form-control"
                    placeholder="Upload your image" 
                    required="required">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control"
                    placeholder="Enter your Password" autocomplete="off" 
                    required="required">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="user_confirm" class="form-label">Confirm Password</label>
                    <input type="password" name="user_confirm" id="user_confirm" class="form-control"
                    placeholder="Confirm Password" autocomplete="off"
                    required="required">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" name="user_address" id="user_address" class="form-control"
                    placeholder="Enter your Address" autocomplete="off"
                    required="required">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="user_pincode" class="form-label">Pincode</label>
                    <input type="text" name="user_pincode" id="user_pincode" class="form-control"
                    placeholder="Enter your Pincode" autocomplete="off"
                    required="required">
                </div>

                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" name="user_contact" id="user_contact" class="form-control"
                    placeholder="Enter your Mobile Number" autocomplete="off"
                    required="required">
                </div>
                
                <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="user_register" class="btn btn-info mb-3 px-3" value="Register">
                <p class="small fw-bold mt-2 pt-1 mb-0">
                    Already have an account ?
                    <a href="user_login.php"> Login</a>
                </p>
            </div>

   

</form>


             </div>

         </div>
      
    </div>
</body>
</html>


<?php
    if(isset($_POST['user_register']))
    {
        
        $username=$_POST['user_name'];
        $useremail=$_POST['user_email'];
        $userpass=$_POST['user_password'];
        $hasspass=password_hash($userpass,PASSWORD_DEFAULT);
        $userconfirm=$_POST['user_confirm'];
        $useraddress=$_POST['user_address'];
        $userpincode=$_POST['user_pincode'];
        $usercontact=$_POST['user_contact'];
        $userimage=$_FILES['user_image']['name'];
        $userimagetmp=$_FILES['user_image']['tmp_name'];
        $userip=getIPAddress();

        $vc=bin2hex(random_bytes(16));
         
        $select_query="Select * from `user_table` where user_name='$username' or user_email=' $useremail' ";
       $result=mysqli_query($con,$select_query);
        $rows_count=mysqli_num_rows($result);

        $mobileno =  ($_POST['user_contact']);  
        $length = strlen ($mobileno);  

        $pin=($_POST['user_pincode']);
        $lengths = strlen ($pin);
       
        if ( $lengths < 6 || $lengths > 6) { 
            echo"<script>alert('$lengths Pincode must have only 6 digits.')</script>";
            echo"<script>window.open('user_registration.php','_self')</script>";
          
             }
  
        else if ( $length < 10 || $length > 10) { 
         echo"<script>alert('Mobile number must have 10 digits.')</script>";
         echo"<script>window.open('user_registration.php','_self')</script>";
       
          }
          
        else if($rows_count>0)
        {
            echo"<script>alert('Username and Email already exist')</script>";
            echo"<script>window.open('user_registration.php','_self')</script>";
        }
        else if($userpass!= $userconfirm)
        {
            echo"<script>alert('Password do not match')</script>";
            echo"<script>window.open('user_registration.php','_self')</script>";
        }
        else{
        move_uploaded_file($userimagetmp,"./user_images/ $userimage");
        $insert_query="insert into `user_table` (user_name,user_email,user_password,
        user_image,user_ip,user_address1,user_pincode,user_mobile,vcode) values('$username','$useremail','$hasspass','$userimage','$userip',' $useraddress','$userpincode',' $usercontact','$vc')";
         $execute=mysqli_query($con,$insert_query);
         send($useremail,$vc);
         if($execute )
         {
             echo"<script>alert('Email have been sent to your mail id for verification')</script>";
             echo"<script>window.open('user_registration.php','_self')</script>";
         }
        }

        $select_cart_items="Select * from `cart_details` where ip_address='$userip'";
        $result_cart=mysqli_query($con,$select_cart_items);
        $rows_count=mysqli_num_rows($result_cart);
        if($rows_count>0)
        {
            $_SESSION['username']=$username;
            echo"<script>alert('You have items in your cart')</script>";
            echo"<script>window.open('checkout.php','_self')</script>";
        }
        else
         {
             echo"<script>window.open('product.php','_self')</script>";
        }
   
    }

    function send($useremail,$vc)
    {
        $dest = "$useremail";
        $subjetc = "Email Verifiction From Swathi Electronics";
        $body = "Thanks for Registration!
        Click the below link to verify the email address
        <a href='http://localhost/SwathiElecttronics/users_area/verify.php?user_email=$useremail&vcode=$vc'>verify</a>";
        $headers = "From: gopinathk.19it@kongu.edu";

       
      
       mail($dest, $subjetc, $body, $headers);
         
        
    }
?>