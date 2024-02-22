<?php
// Include the file that establishes the database connection
include('../includes/connect.php');

// Check if the form has been submitted
if (isset($_POST['insert_brand'])) {
  // Retrieve the brand title from the form
  $brand_title = $_POST['brand_title'];

  // Select data from the database to check if the brand already exists
  $select_query = "SELECT * FROM brands WHERE brand_title=?";

  // Prepare the SQL query
  $stmt = mysqli_prepare($con, $select_query);

  // Bind the brand title parameter to the prepared statement
  mysqli_stmt_bind_param($stmt, "s", $brand_title);

  // Execute the prepared statement
  mysqli_stmt_execute($stmt);

  // Get the result set from the executed statement
  $result_select = mysqli_stmt_get_result($stmt);

  // Get the number of rows in the result set
  $number = mysqli_num_rows($result_select);

  // If the brand already exists in the database
  if ($number > 0) {
    // Display an alert message indicating that the brand is already present
    echo "<script>alert('This brand is already present in the database')</script>";
  } else {
    // If the brand doesn't exist, insert it into the database

    // SQL query to insert the brand into the categories table
    $insert_query = "INSERT INTO brands (brand_title) VALUES (?)";

    // Prepare the SQL query for insertion
    $stmt = mysqli_prepare($con, $insert_query);

    // Bind the brand title parameter to the prepared statement
    mysqli_stmt_bind_param($stmt, "s", $brand_title);
    
    // Execute the prepared statement for insertion
    $result = mysqli_stmt_execute($stmt);

    // If the insertion was successful
    if ($result) {
      // Display an alert message indicating successful insertion
      echo "<script>alert('Brand has been inserted successfully')</script>";
    }
  }
}
?>


<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="brands" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">
  <input type="submit" class="bg-info b-0 p-2 my-3" name="insert_brand" value="Insert Brands">
  
</div>

</form>