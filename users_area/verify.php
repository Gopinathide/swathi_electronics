<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swathi Electronics</title>
</head>
<body>
    
</body>
</html>

<?php 
     include('../includes/connect.php');
     include('../functions/common_function.php');

    if(isset($_GET['vcode']) && isset($_GET['user_email']) )
    {
           $qu="select * from `user_table` where user_email='$_GET[user_email]' and vcode='$_GET[vcode]' ";
           $qus=mysqli_query($con,$qu);
           if(mysqli_num_rows($qus)==1)
           {
            $rfetch=mysqli_fetch_assoc($qus);
            $up="Update `user_table` set verify=1 where user_email='$_GET[user_email]'";
            $upsmutf=mysqli_query($con,$up);
            echo"<script>alert('Email Verification Successfull')</script>";
            echo"<script>window.open('user_login.php','_self')</script>";

           }
    }

 ?>