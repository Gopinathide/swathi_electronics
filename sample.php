<?php
    $pass="1234";
    $hasspass=password_hash($pass,PASSWORD_DEFAULT);
    echo" $pass,$hasspass";
    if(password_verify($pass,$hasspass))
    {
        echo"hi";
    }
    else{
        echo"bie";
    }
?>