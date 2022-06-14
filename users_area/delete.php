<?php
      
   if(isset($_POST['no']))
   {
       echo"<script>window.open('profile.php','_self')</script>";
   } 
   if(isset($_POST['delete']))
   {
    $username=$_SESSION['username'];
    $delete_query="DELETE FROM `user_table` WHERE user_name='$username' ";
    $result_query=mysqli_query($con,$delete_query);
    echo"<script>window.open('../logout.php','_self')</script>";
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class = " mb-4" style="color:red;font-size:50px;text-align:center;">
        You really want to delete your account
    </h3>
    <form action = "" method ="post" style="text-align:center;" enctype = "multipart/form-data">
         <div class = "form-outline mb-4">
            <input type = "submit" value="Yes" class = "bg-info py-2 px-3 border-0" style="border-radius:12px;" name="delete" >
            <input type = "submit" value="No" class = "bg-info py-2 px-3 border-0" style="border-radius:12px; margin-left:50px" name="no" >
        </div> 
    </form>
</body>


</a>
</html>