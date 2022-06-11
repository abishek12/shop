<?php require_once "include/header.php"; ?> 

<?php 

if(isset($_POST['check_email']))
{
    $email = $_POST['checkemail'];

    $search_user_sql = "select * from user where email='$email'";
    $search_user_query = mysqli_query($connection, $search_user_sql);

    if(mysqli_num_rows($search_user_query)>0){ ?>

    <?php

    if(isset($_POST['update_pass'])){
        $pass = $_POST['pass'];
        $enc_pass = md5($pass);

        $query = mysqli_query($connection, "update user set password='$enc_pass' where email='$email'");
        if($query){
            header("Location: index.php");
        }
    }

?>

<div class="section m-5">
    <div class="container">
        <h3 class="text-center">Update Password</h3>
        <form action="forget-password.php" method="post">
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="pass">
            </div>
            <div class="d-grid my-4">
                <input type="submit" value="New Password" class="btn btn-sm btn-primary" name="update_pass">
            </div>
        </form>
    </div>
</div>


<?php 
    }else{
        echo "Something went wrong";
    }
}


?>

<div class="section m-5">
    <div class="container">
        <h3 class="text-center">Forget Password</h3>
        <form action="forget-password.php" method="post">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="checkemail">
            </div>
            <div class="d-grid my-4">
                <input type="submit" value="Check Email" class="btn btn-sm btn-primary" name="check_email">
            </div>
        </form>
    </div>
</div>

<?php require_once "include/footer.php"; ?>