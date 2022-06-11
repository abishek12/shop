
<?php

require_once "../db.php";

if(isset($_POST['l_btn'])){
    $email = $_POST['l_email'];
    $password = $_POST['l_password'];

    $search_user_sql = "select * from user where email='$email'";
    $search_user_query = mysqli_query($connection, $search_user_sql);

    if(mysqli_num_rows($search_user_query)>0){
        $row = mysqli_fetch_assoc($search_user_query);
        $db_username = $row['full_name'];
        $db_password = $row['password'];
        $enc_password = md5($password);
        $enc_password_substr = substr($enc_password,0,16);
        $role = $row['role'];



        if($enc_password_substr == $db_password){
            session_start();
            $_SESSION['username'] = $db_username;
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            $_SESSION['state'] = TRUE;
            header("Location: ../dashboard/");
        }else{
            echo "Sorry Password didn't matched";
        }
    }else{
        echo "User doesn't exists";
    }
}

?>
