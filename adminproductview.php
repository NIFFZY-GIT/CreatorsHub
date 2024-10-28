<!--DOCTYPE html-->
<html lang="en">

<head>
  <style>
  /* Your existing styles above this comment */

  
  /* Your existing styles below this comment */
</style>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Product Page HTML</title>
  <link rel="stylesheet" href="css/adminproductview.css">

</head>

<body>
  <nav>
    <div class="bar1">
      <div>
        <form action="">
          <input type="search" id="search" placeholder="Search">
          <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
      </div>
      <div>
        <h1>
          <span><!--<img src="/assets/logo/logotr.png">-->CreatorsHub<!--<i class="fa-solid fa-fan"></i><i class="bx bx-heart-circle"></i>--></span>
        </h1>
      </div>
      <div>
        <div class="sign-up-approach">
          <!--
                <div> <a href="Login.html">Login<span><i class="fa fa-sign-in" aria-hidden="true"></i></span></a>
                  <p>Get Extra 20% off</p>
                </div>
        -->

          <div><a href="Login.php"><i class="fa-regular fa-user"></i></a></div>
        </div>
        <div> <a href="Cart.php"><i class="fa fa-shopping-cart nav-loginbtn"></i></a> </div>
        <div> <a href="Login.php"><i class="fa fa-sign-in nav-loginbtn" aria-hidden="true"></i></a></div>
      </div>
    </div>

  </nav>
  <div class="bar2">
    <div>
      <ul>
        <li><a href="Index.php">Home</a></li>
        <li><a href="adminproduct.php">Products</a></li>
        <li><a href="About.php">About</a></li>
        <!-- <li><a href="Contact-us.php">Contact Us</a></li> -->
      </ul>
    </div>
  </div>
  <div class="yellow-bar"></div>

  <section id="product-page">
    <div class="product-details">
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

        // Fetch data for the specified product ID
        $sql = "SELECT * FROM products WHERE id = $product_id";
        $result = mysqli_query($con, $sql);

        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);

          // Output product details
          echo "<div class='product-details'>";
          echo "<div class='product-img' >";
          echo "<div class='swiper mySwiper'>";
          echo "<div class='swiper-wrapper'>";
          echo "<div class='swiper-slide'>";
          echo "<img src='" . $row['path'] . "'  />";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "<div class='product-text'>";
          echo "<h3>" . $row['name'] . "</h3>";
          echo "<span class='product-price'>" . $row['price'] . ".00 LKR</span>";
          echo "<div class='product-button'>";
          echo "<a href='Update-Product.php?id=" . $row['id'] . "' class='add-bag-btn' >Update Product</a>";
          echo "<a href='delete-product.php?id=" . $row['id'] . "' class='add-wishlist-btn' >Delete Product</a>";
          echo "</div>";
          echo "<a href='#' class='help-btn'>Need Any Help?</a>";
          echo "</div>";
          echo "</div>";


        } else {
          echo "Product not found";
        }
      } else {
        echo "Product ID not provided";
      }

      // Close the database connection
      mysqli_close($con);
      ?>
    </div>
  </section>
</body>

</html>