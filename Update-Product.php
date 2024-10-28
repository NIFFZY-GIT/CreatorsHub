<!doctype html>
<html>
<link rel="stylesheet" href="css/Update-Product.css" />

<head>
  <meta charset="utf-8">
  <title>CreatorsHub</title>
  <link rel="icon" type="image/x-icon" href="/assets/logo/logotr.png">
  <script src="https://kit.fontawesome.com/c4a594ff55.js" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
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
        <h1><span><!--<img src="/assets/logo/logotr.png">-->CreatorsHub<!--<i class="fa-solid fa-fan"></i><i class="bx bx-heart-circle"></i>--></span></h1>
      </div>
      <div>
        <div class="sign-up-approach">
          <!--
        <div> <a href="Login.html">Login<span><i class="fa fa-sign-in" aria-hidden="true"></i></span></a>
          <p>Get Extra 20% off</p>
        </div>
-->

          <div><a href="Login.php"><i class="fa-regular fa-user" ></i></a></div>
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

  
	<section class="container">
    <header>Update Product</header>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

      // Get data from the form
      $productName = mysqli_real_escape_string($con, $_POST['txtProductName']);
      $productPrice = mysqli_real_escape_string($con, $_POST['txtPrice']);
      $productId = mysqli_real_escape_string($con, $_GET['id']); // Get product ID from the URL

      // Check if a file was uploaded
      if (isset($_FILES['imagefol']) && $_FILES['imagefol']['error'] == UPLOAD_ERR_OK) {
        // Define the target directory for the upload
        $targetDir = "assets/"; // Replace with your actual target directory

        // Get the file name and move the uploaded file
        $targetFile = $targetDir . basename($_FILES['imagefol']['name']);
        move_uploaded_file($_FILES['imagefol']['tmp_name'], $targetFile);

        // Update the product in the database with the new image path
        $sql = "UPDATE products SET name = '$productName', price = '$productPrice', path = '$targetFile' WHERE id = '$productId'";
      } else {
        // Update the product in the database without changing the image path
        $sql = "UPDATE products SET name = '$productName', price = '$productPrice' WHERE id = '$productId'";
      }

      if (mysqli_query($con, $sql)) {
        echo "Product updated successfully!";
        header('Location: adminproduct.php?id=' . $productId);
      } else {
        echo "Error updating product: " . mysqli_error($con);
      }

      // Close the database connection
      mysqli_close($con);
    }
    ?>

    <form action="" method="post" class="form" enctype="multipart/form-data">
      <div class="input-box">
        <label>Product Name</label>
        <input type="text" placeholder="" name="txtProductName"  />
      </div>

      <div class="input-box address">
        <label>Upload image</label>
        <input type="file" placeholder="" name="imagefol"  />
      </div>

      <div class="input-box address">
        <label>Price</label>
        <input type="number" placeholder="" name="txtPrice"  />
      </div>

      <center>
        <button type="submit">Submit</button>
        <button type="button" onclick="window.location.href='adminproductview.php?id=<?php echo $_GET['id']; ?>'">Cancel</button>
      </center>
    </form>
  </section>
  </body>
</html>