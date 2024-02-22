<?php
// Include the file that establishes the database connection
include('../includes/connect.php');

// Check if the form has been submitted
if (isset($_POST['insert_cat'])) {
  // Retrieve the category title from the form
  $category_title = $_POST['cat_title'];

  // Select data from the database to check if the category already exists
  $select_query = "SELECT * FROM categories WHERE category_title=?";
  // Prepare the SQL query
  $stmt = mysqli_prepare($con, $select_query);
  // Bind the category title parameter to the prepared statement
  mysqli_stmt_bind_param($stmt, "s", $category_title);
  // Execute the prepared statement
  mysqli_stmt_execute($stmt);
  // Get the result set from the executed statement
  $result_select = mysqli_stmt_get_result($stmt);
  // Get the number of rows in the result set
  $number = mysqli_num_rows($result_select);

  // If the category already exists in the database
  if ($number > 0) {
    // Display an alert message
    echo "<script>alert('This category is present inside the database')</script>";
  } else {
    // If the category doesn't exist, insert it into the database
    $insert_query = "INSERT INTO categories (category_title) VALUES (?)";
    // Prepare the SQL query for insertion
    $stmt = mysqli_prepare($con, $insert_query);
    // Bind the category title parameter to the prepared statement
    mysqli_stmt_bind_param($stmt, "s", $category_title);
    // Execute the prepared statement
    $result = mysqli_stmt_execute($stmt);

    // If the insertion was successful
    if ($result) {
      // Display an alert message
      echo "<script>alert('Category has been inserted successfully')</script>";
    }
  }
}
?>



<form action="" method="post" class="mb-2">
  <div class="input-group w-90 mb-2">
    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Username" aria-describedby="basic-addon1">
  </div>
  <div class="input-group w-10 mb-2 m-auto">
    <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="Insert Categories">

  </div>

</form>