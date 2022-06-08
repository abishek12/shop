<?php require_once "include/header.php"; ?>

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

                    <a href="add_product.php" class="btn btn-sm btn-info my-3">Add Product</a>

                    <?php
                        if(isset($_GET['delete'])){
                            $delete_id = $_GET['delete'];
                            $delete_product_sql = "delete from product where id='$delete_id';";
                            $delete_product_query = mysqli_query($connection, $delete_product_sql);

                            if($delete_product_query){
                                echo "<br>";
                                echo "Your item has been deleted";
                            }else{
                                echo "<br>";
                                echo "Something went wrong";
                            }
                        }
                    ?>

                    <div class="section">
                        <table class='table table-bordered'>
                            <thead>
                                <th>Title</th>
                                <th>Short Description</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql = "select * from product";
                                    $query = mysqli_query($connection, $sql);
                                    while($row = mysqli_fetch_assoc($query)){
                                        $id = $row['id'];
                                        $title = $row['title'];
                                        $shortDescription = $row['content'];
                                        $description = $row['description'];
                                        $price = $row['price']; 
                                    ?>
                                    <tr>
                                        <td><?php echo $title; ?></td>
                                        <td><?php echo substr($shortDescription, 0, 150); ?></td>
                                        <td><?php echo substr($description, 0, 200); ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td>
                                        <a href="edit_product.php?update_prod=<?php echo $id; ?>">edit</a>
                                            <a href="product.php?delete=<?php echo $id; ?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require_once "include/footer.php"; ?>