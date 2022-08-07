<?php

   if(isset($_GET['edit_account']))
   {
       $username=$_SESSION['username'];
       $select="Select * from user_table where user_name='$username'";
       $result=mysqli_query($con,$select);
       $row=mysqli_fetch_assoc($result);
       $user_id=$row['user_id'];
       $user_name=$row['user_name'];
       $user_email=$row['user_email'];
       $user_address=$row['user_address1'];
       $user_pincode=$row['user_pincode'];
       $user_mobile=$row['user_mobile'];
   }
    

   if(isset($_POST['update']))
   {
       $updateid=$user_id;
       $user_name=$_POST['user_name'];
       $user_email=$_POST['user_email'];
       $user_address=$_POST['user_address'];
       $user_pincode=$_POST['user_pincode'];
       $user_mobile=$_POST['user_mobile'];
       $userimage=$_FILES['user_image']['name'];
        $userimagetmp=$_FILES['user_image']['tmp_name'];
      
        move_uploaded_file($userimagetmp,"./user_images/ $userimage");
       $update_query="Update `user_table` set user_name='$user_name',user_email='$user_email',user_image='$userimage',
       user_address1='$user_address',user_pincode='$user_pincode', user_mobile='$user_mobile' where user_id=$updateid";
       $_SESSION['username']=$user_name;
      $result_query=mysqli_query($con,$update_query);
      if($result_query)
      {
          echo"<script>alert('Data Updated Successfully')</script>";
          echo"<script>window.open('profile.php','_self')</script>";
      } 
   
   
    }

?>






<!DOCTYPE html>
<html lang = "en" >
<head >
    <meta charset = "UTF-8" >
    <meta http - equiv = "X-UA-Compatible " content = "IE-edge " >
    <meta name = "viewport" content ="width=device-width,initial-scale=1.0">
    <title > Edit account </title >
</head >
<body >
    <br><br>
    <h3 class = " mb-4" style="text-align:center; color:black;font-size:40px;"> Edit Account </h3>
    <form action = "" method ="post" style="text-align:center;" enctype = "multipart/form-data">
        <div class = "form-outline mb-4 ">
           <input type = "text " value="<?php echo $user_name ?>" class = "form-control w-50 m-auto "  style="border-radius:12px; border-color:gray;" name = "user_name">
        </div >

        <div class = "form-outline mb-4" >
           <input type = "email"  value="<?php echo $user_email ?>" class = "form-control w-50 m-auto" style="border-radius:12px; border-color:gray;"
           name = "user_email" >
        </div >

        <div class="form-outline mb-4 ">
                   
                    <input type="file" name="user_image" id="user_image" class="form-control w-50 m-auto" style="border-radius:12px; border-color:gray;"
                    placeholder="Upload your image"
                    required="required">
      </div>

        

        <div class = "form-outline mb-4">
            <input type = "text" value="<?php echo $user_address ?>" class = "form-control w-50 m-auto" style="border-radius:12px; border-color:gray;" name="user_address">
        </div>

        <div class = "form-outline mb-4">
            <input type = "text" value="<?php echo $user_pincode ?>" class = "form-control w-50 m-auto" style="border-radius:12px; border-color:gray;" name="user_pincode">
        </div>

        <div class = "form-outline mb-4">
            <input type = "text" value="<?php echo $user_mobile ?>" class = "form-control w-50 m-auto" style="border-radius:12px; border-color:gray;" name="user_mobile">
        </div>

        <div class = "form-outline mb-4">
            <input type = "submit" value="Update" class = "bg-info py-2 px-3 border-0" style="border-radius:12px;" name="update" >
        </div>
    </form>
</body>
</html>