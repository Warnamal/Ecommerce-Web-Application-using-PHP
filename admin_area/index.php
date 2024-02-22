<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <!-- bootstrap CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- css file -->
  <link rel="stylesheet" href="../style.css">

  <style>
    .admin_image{
    width: 100px;
    object-fit: contain;
}
  </style>
</head>

<body>
  <!-- navbar -->
  <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <img src="../images/logo.png" alt="" class="logo">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link">Welcome guest</a>
                </li>
            </ul>            
        </nav>
        
      </div>
    </nav>

    <!-- second child -->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <!-- third child -->
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="px-5">
            <a href="#"><img src="../images/user.png" alt="" class="admin_image"></a>
            <p class="text-linr text-center">Admin Name</p>
        </div>
        <div class="button text-center">
            <button><a href="" class="navlink text-light bg-info my-1">Insert Projects</a></button>
            <button><a href="" class="navlink text-light bg-info my-1">View Products</a></button>
            <button><a href="index.php?insert_category" class="navlink text-light bg-info my-1">Insert categories</a></button>
            <button><a href="" class="navlink text-light bg-info my-1">View Categories</a></button>
            <button><a href="index.php?insert_brand" class="navlink text-light bg-info my-1">Insert Brands</a></button>
            <button><a href="" class="navlink text-light bg-info my-1">View Brands</a></button>
            <button><a href="" class="navlink text-light bg-info my-1">All orders</a></button>
            <button><a href="" class="navlink text-light bg-info my-1">All payments</a></button>
            <button><a href="" class="navlink text-light bg-info my-1">List Users</a></button>
            <button><a href="" class="navlink text-light bg-info my-1">Logout</a></button>
        </div>
    </div>

    <!-- second child -->
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');         
        } 
        if(isset($_GET['insert_brand'])){
            include('insert_brands.php');         
        }        
        ?>
    </div>

  </div>

  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>