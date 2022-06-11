<?php require_once "include/header.php"; ?>

    <div class="section my-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2>Register</h2>
                    <form action="action/register.php" method="post" autocomplete="off">
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
                        <a href="index.php" class="text-reset float-end">Back to Home</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <?php require_once "include/footer.php"; ?>