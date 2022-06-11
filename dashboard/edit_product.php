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
                    if(isset($_GET['update_prod'])){
                    $id = $_GET['update_prod'];
                    ?>

                    <?php
                    
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
                        $sql = "update product set title='$title', slug='$slug', category='$category', content='$shortDescription', description='$description', price='$price', image='$filename' where id='$id'";
                  
                        // Execute query
                        mysqli_query($connection, $sql);
                          
                        // Now let's move the uploaded image into the folder: image
                        if (move_uploaded_file($tempname, $folder))  {
                           echo "<script>alert('Your $title has been updated')</script>";
                        }else{
                            return die("Error is: ". mysqli_error());
                      }
                  }
                }
                ?>
                
                <?php
                    $sql_get_pro_from_id = "select * from product where id='$id'";
                    $query_get_pro_from_id = mysqli_query($connection, $sql_get_pro_from_id);

                    if(mysqli_num_rows($query_get_pro_from_id)>0){
                        while($row = mysqli_fetch_assoc($query_get_pro_from_id)){
                            $title = $row['title'];
                            $slug = $row['slug'];
                            $content = $row['content'];
                            $description = $row['description'];
                            $price = $row['price'];
                        }
                    }
                ?>
                <form action="edit_product.php?update_prod=<?php echo $id; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name='title' value='<?php echo $title; ?>'>
                            </div>
                            <div class="form-group">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name='slug' value='<?php echo $slug; ?>'>
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
                                <textarea name="shortDescription" id="" cols="30" rows="10" class="form-control"><?php echo $content; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"><?php echo $description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Price</label>
                                <input name='price' type="number" class="form-control" min=50 value='<?php echo $price; ?>'>
                            </div>
                            <div class="form-group">
                                <label for="">Choose a file</label>
                                <input type="file" name='uploadfile'>
                            </div>
                            <input type="submit" name='upload' value="Update" class="btn btn-sm btn-primary">
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