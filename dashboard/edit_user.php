<?php
require_once "include/header.php";
if(!empty($_SESSION['state'])){ ?>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <?php require_once "include/sidebar.php"; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
               <?php require_once "include/navbar.php"; ?>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <?php

                if(isset($_GET['edit'])){
                    $id = $_GET['edit'];
                }

                if(isset($_POST['update'])){
                    $role = $_POST['role'];

                    $edit_order_sql = "update user set role='$role' where id='$id'";
                    $edit_order_query = mysqli_query($connection, $edit_order_sql);

                    if($edit_order_query){
                        echo "User has been updated to: ". $role;
                    }else{
                        return die('Error is: '.mysqli_error($connection));
                    }
                }

?>

                <form action="edit_user.php?edit=<?php echo $id; ?>" method="post">
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="role" id="" class='form-control'>
                            <option value="admin">Admin</option>
                            <option value="customer">Customer</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-info" value='Update' name='update'>
                </form>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php require_once "include/footer.php"; ?>




<?php } else{ ?>
    <h3>You have no permission to access. <span><a href="../login.php">Login</a></span></h3>
<?php
}
?>