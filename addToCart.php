<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["productId"])) {
    $productId = $_POST["productId"];
    $email = isset($_SESSION["txtuname"]) ? $_SESSION["txtuname"] : '';

    $con = mysqli_connect("localhost", "root", "", "creatorshub");

    if (!$con) {
        die("Cannot connect to the DB server");
    }

    // Fetch product details from the products table based on the product ID
    $query = "SELECT * FROM products WHERE id = $productId";
    $result = mysqli_query($con, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        $productName = $row["name"];
        $productPrice = $row["price"];
        $productImagePath = $row["image_path"];

        // Insert the product into the cart table
        $insertQuery = "INSERT INTO cart (email, product_id, product_name, price, image_path) VALUES ('$email', $productId, '$productName', $productPrice, '$productImagePath')";
        $insertResult = mysqli_query($con, $insertQuery);

        if ($insertResult) {
            echo "Product added to cart successfully!";
        } else {
          echo '<script>alert("You already have this item in your cart")</script>';
        }
    } else {
        echo "Product not found.";
    }

    mysqli_close($con);
} else {
    echo "Invalid request.";
}
?>
