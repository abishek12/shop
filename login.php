
<?php require_once "include/header.php"; ?>
    <div class="section my-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2>Login</h2>
                    <form action="action/login.php" method="post" autocomplete="off">
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
                    <p>
                        <a href="register.php" class="text-reset">Create a new account</a>
                        <a href="index.php" class="text-reset float-end">Back to Home</a>
                </p>
                
                </div>
            </div>
        </div>
    </div>
    
    <?php require_once "include/footer.php"; ?>