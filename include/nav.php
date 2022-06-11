<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">Bakery</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <?php 
          if(!empty($_SESSION['state'])){ ?>
          <li class="nav-item">
          <a class="nav-link" href="dashboard/">Profile</a>
        </li>
         <?php }else{ ?>
          <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
           <?php
         }
        ?>
      </ul>
      <?php
          if(!empty($_SESSION['state'])){ ?>
            <a href="dashboard/cart.php" class="text-reset">
              <img src="assets/icons/cart.png" alt="" width="24" height="24">
            </a>
          <?php
          }
      ?>
    </div>
  </div>
</nav>