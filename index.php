<?php require_once "include/header.php"; ?>
<?php require_once "include/nav.php"; ?>   

<div class="section">
    <div class="container">
        <h3 class="mt-5">Product</h3>
        <hr>
        <div class="row">
        <?php
            $product_sql = "select * from product";
            $product_query = mysqli_query($connection, $product_sql);

            while($row = mysqli_fetch_assoc($product_query)){
                $title = $row['title'];
                $slug = $row['slug'];
                $category = $row['category'];
                $image = $row['image'];
                $price = $row['price'];
        ?>
            <div class="col-xl-4">
                <div class="card">
                    <img src="assets/img/<?php echo $image; ?>" alt="" height="200">
                    <div class="card-body">
                       <h4>
                            <?php echo $title; ?>
                       </h4>
                       <h6>
                           Rs. <?php echo $price; ?>
                       </h6>
                       <a href="details.php?details=<?php echo $slug; ?>" class="btn btn-sm btn-primary">More</a>
                    </div>
                    <div class="card-footer">
                        
                    </div>
                </div>
            </div>
        
        <?php
            }
        ?>
        </div>
    </div>
</div>

<?php require_once "include/footer.php"; ?>
