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
                    <?php
error_reporting(0);
?>
<?php
  $msg = "";
  
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    $title = $_POST['title'];
    $slug = $_POST['slug'];
    $category = $_POST['category'];
    $shortDescription = $_POST['shortDescription'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "../assets/img/".$filename;
  
        // Get all the submitted data from the form
        $sql = "INSERT INTO product (title, slug, category, content, description, price, image) VALUES ('$title','$slug','$category','$shortDescription','$description','$price','$filename')";
  
        // Execute query
        mysqli_query($connection, $sql);
          
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  {
            $msg = "Image uploaded successfully";
        }else{
            $msg = "Failed to upload image";
      }
  }
?>
                    <div class="section">
                        <form action="add_product.php" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name='title'>
                            </div>
                            <div class="form-group">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name='slug'>
                            </div>
                            <div class="from-group">
                                <label for="">Category</label>
                                <select name="category" id="" class="form-control">
                                    <option value="">egg</option>
                                    <option value="">chocolates</option>
                                    <option value="">Foods</option>
                                    <option value="">Ballons</option>
                                    <option value="">Extra product</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Short Description</label>
                                <textarea name="shortDescription" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input name='price' type="number" class="form-control" min=50 value=50>
                            </div>
                            <div class="form-group">
                                <label for="">Choose a file</label>
                                <input type="file" name='uploadfile'>
                            </div>
                            <input type="submit" name='upload' value="Publish" class="btn btn-sm btn-primary">
                        </form>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require_once "include/footer.php"; ?>