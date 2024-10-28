<?php
session_start(); // Start or resume a session

// Check if the product_id is set in the POST request
if (isset($_POST['product_id'])) {
  // Assuming you have the logged-in customer's email stored in the session
  if (isset($_SESSION['customer_email'])) {
    $product_id = $_POST['product_id'];
    $customer_email = $_SESSION['customer_email'];

    // Establish a connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "creatorshub";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    // Check the connection
    if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch product details based on the product_id
    $sql = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
      $product = mysqli_fetch_assoc($result);

      // Insert into the cart table
      $insert_sql = "INSERT INTO cart (id, name, email, path) VALUES (?, ?, ?, ?)";
      $stmt = mysqli_prepare($con, $insert_sql);

      mysqli_stmt_bind_param($stmt, "ssss", $product['id'], $product['name'], $customer_email, $product['path']);
      mysqli_stmt_execute($stmt);

      // Check if the insertion was successful
      if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Product added to the cart successfully.";
        header('Location: Cart.php');
      } else {
        echo "Failed to add the product to the cart.";
      }

      mysqli_stmt_close($stmt);
    } else {
      echo "Product not found.";
    }

    // Close the database connection
    mysqli_close($con);
  } else {
    echo "Customer email not set in the session. Please log in.";
  }
} else {
  echo "Product ID not provided.";
}
?>
