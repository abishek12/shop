<?php

require_once "../db.php";

if(isset($_POST['r_btn'])){
    $username = $_POST['r_username'];
    $email = $_POST['r_email'];
    $password = $_POST['r_password'];
    $enc_password = md5($password);
    $date = date('Y/m/d');
    $time = date('H:i:s');

    // check email exist or not 
    // (user should have unique email for registration)
    $search_user_sql = "select * from user where email= '$email'";
    $search_user_query = mysqli_query($connection, $search_user_sql);
    if(mysqli_num_rows($search_user_query)>0){
        echo "User already registered";
    }else{
        // register user into database
        $register_user_sql = "insert into user(full_name, email, password, date, time) values('$username','$email','$enc_password','$date','$time')";
        $register_user_query = mysqli_query($connection, $register_user_sql);

        // if register redirect to login page
        if($register_user_query){
            header("Location: ../login.php");
        }else{
            echo "Something went wrong";
        }
    }
}

?>