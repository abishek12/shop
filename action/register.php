<?php

require_once "../db.php";

if(isset($_POST['r_btn']))
{
    $fullname = $_POST['r_fullname'];
    $email = $_POST['r_email'];
    $password = $_POST['r_password'];

    $register_search_sql = "select * from user where email='$email'";
    $register_search_query = mysqli_query($connection, $register_search_sql);

    if(mysqli_num_rows($login_search_query)<0){
       $sql = "insert into user(full_name,email,password) values('$fullname', '$email','$password')";
       $query = mysqli_query($connection, $sql);
       if($query){
           header("Location: login.php");
       }else{
           echo "Something went wrong";
       }
        }else{
            echo "User already exist";
        }
    }

}


?>