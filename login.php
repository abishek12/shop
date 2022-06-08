
<?php require_once "include/header.php"; ?>

<?php

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



        if($enc_password_substr == $db_password){
            session_start();
            $_SESSION['username'] = $db_username;
            $_SESSION['email'] = $email;
            $_SESSION['state'] = TRUE;
            header("Location: dashboard/");
        }else{
            echo "Sorry Password didn't matched";
        }
    }else{
        echo "User doesn't exists";
    }
}

?>

    <div class="section my-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2>Login</h2>
                    <form action="login.php" method="post" autocomplete="off">
                        <div class="form-group">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="l_email" class="form-control" id="" placeholder="youremail@domain.com">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="l_password" id="" placeholder="youremail@domain.com">
                        </div>
                        
                        <input type="submit" value="Login" name="l_btn" class="btn btn-success mt-3" id="">
                    </form>
                </div>
                <p>
                    <small>
                        <a href="forget-password.php" class="mx-3">Forget Password?</a>
                    </small>
                </p>
                <div class="card-footer">
                    <p><a href="register.php" class="text-reset">Create a new account</a></p>
                </div>
            </div>
        </div>
    </div>
    
    <?php require_once "include/footer.php"; ?>