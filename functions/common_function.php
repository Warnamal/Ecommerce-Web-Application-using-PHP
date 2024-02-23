<?php

// including connect file
include('./includes/connect.php');

// getting products
function getproducts()
{
    global $con;
    $select_query = "SELECT * FROM products ORDER BY rand() LIMIT 0,9";
    $result_query = mysqli_query($con, $select_query);
    // $row=mysqli_fetch_assoc($result_query);
    // echo $row['product_title']
    while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keywords'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];

        echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <a href='#' class='btn btn-info'>Add to cart</a>
                <a href='#' class='btn btn-secondary'>View more</a>
              </div>
            </div>
          </div> ";
    }
}

// displaying brands in sidenav
function getbrands()
{
    global $con;
    $select_brand = "SELECT * FROM brands";
    $result_brands = mysqli_query($con, $select_brand);
    // $row_data=mysqli_fetch_assoc($result_brands);
    // echo $row_data['brand_title'];
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'>
          <a class='nav-link text-light' href='index.php?brand=$brand_id'>$brand_title</a>
        </li>";
    }
}

// displaying categories in sidenav
function getcategories()
{
    global $con;
    $select_category="SELECT * FROM categories";
        $result_categories=mysqli_query($con,$select_category);
        // $row_data=mysqli_fetch_assoc($result_brands);
        // echo $row_data['brand_title'];
        while($row_data=mysqli_fetch_assoc($result_categories)){
          $category_title=$row_data['category_title'];
          $category_id=$row_data['category_id'];
          echo "<li class='nav-item'>
          <a class='nav-link text-light' href='index.php?category=$category_id'>$category_title</a>
        </li>";
        }
}