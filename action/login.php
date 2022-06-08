<?php

require_once "../db.php";

if(isset($_POST['l_btn']))
{
    $email = $_POST['l_email'];
    $password = $_POST['l_password'];

    $login_search_sql = "select * from user where email='$email'";
    $login_search_query = mysqli_query($connection, $login_search_sql);

    if(mysqli_num_rows($login_search_query)<0){
        $row = mysqli_fetch_assoc($login_search_query);
        $d_password = $row['password'];
        if($d_password == $password){
            session_start();
            $_SESSION['state'] = true;
            header("Location: index.php");
        }else{
            echo "User does't exist";
        }
    }

}


?>