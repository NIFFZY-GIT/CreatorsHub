<?php
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

// Retrieve the product ID from the URL
if (isset($_GET['id'])) {
  $product_id = $_GET['id'];

  // Delete the product from the database
  $sql = "DELETE FROM products WHERE id = $product_id";

  if (mysqli_query($con, $sql)) {
    echo "Product deleted successfully!";
    header('Location: adminproduct.php?id=' . $productId);
  } else {
    echo "Error deleting product: " . mysqli_error($con);
  }
} else {
  echo "Product ID not provided";
}

// Close the database connection
mysqli_close($con);
?>
