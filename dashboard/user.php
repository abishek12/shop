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

                <table class='table table-bordered table-striped text-center'>
                    <thead>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                    <?php
                    $sql = "select * from user";
                    $query = mysqli_query($connection, $sql);

                    while($row = mysqli_fetch_assoc($query)){
                        $id = $row['id'];
                        $full_name = $row['full_name'];
                        $email = $row['email'];
                        $role = $row['role'];
                        $date = $row['date'];
                        $time = $row['time'];
                        ?>
                        <tr>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $role; ?></td>
                            <td><?php echo $date; ?></td>
                            <td><?php echo $time; ?></td>
                            <td>
                                <a href="edit_user.php?edit=<?php echo $id; ?>">edit</a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
                    </tbody>
                </table>

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