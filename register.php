<?php require_once "include/header.php"; ?>

<?php

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
            header("Location: login.php");
        }else{
            echo "Something went wrong";
        }
    }
}

?>

    <div class="section my-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2>Register</h2>
                    <form action="register.php" method="post" autocomplete="off">
                        <div class="form-group">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="r_username" class="form-control" id="" placeholder="username">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="r_email" class="form-control" id="" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control" name="r_password" id="" placeholder="Password">
                        </div>
                        
                        <input type="submit" name="r_btn" class="btn btn-success mt-3" id="">
                    </form>
                </div>
                <div class="card-footer">
                    <p>
                        <a href="login.php" class="text-reset">Back to login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <?php require_once "include/footer.php"; ?>