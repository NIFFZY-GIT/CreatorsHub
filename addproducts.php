<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Establish a connection to the database
  $servername = "localhost"; // Replace with your actual server name
  $username = "root"; // Replace with your actual username
  $password = ""; // Replace with your actual password
  $dbname = "creatorshub";

  $con = mysqli_connect("localhost", "root", "", "creatorshub");

  // Check the connection
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Get form data
  $id = ''; // You may use an auto-increment column, or generate a unique ID
  $productName = $_POST["txtProductName"];
  $price = $_POST["txtPrice"];

  // File upload handling (you may need to customize this part)
  $targetDir = "assets/"; // Replace with your desired upload directory
  $targetFile = $targetDir . basename($_FILES["imagefol"]["name"]);

  if (move_uploaded_file($_FILES["imagefol"]["tmp_name"], $targetFile)) {
    // File uploaded successfully, now insert data into the database
    $sql = "INSERT INTO products (`id`, `name`, `price`, `path`) VALUES ('$id', '$productName', '$price', '$targetFile')";

    if (mysqli_query($con, $sql)) {
      echo "Product added successfully";
      header('Location: adminproduct.php');
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
  } else {
    echo "Error uploading file";
  }

  // Close the database connection
  mysqli_close($con);
}
?>

<!doctype html>
<html>
<link rel="stylesheet" href="css/addproducts.css" />

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

  <section class="container">
    <header>Add Products</header>


    <form action="addproducts.php" method="post" class="form" enctype="multipart/form-data">
      <div class="input-box">
        <label>Product Name</label>
        <input type="text" placeholder="" id="txtProductName" name="txtProductName" required />
      </div>

      <div class="input-box address">
        <label>Upload image</label>
        <div class image>
          <input type="file" placeholder="" id="imagefol" name="imagefol" required />
        </div>
      </div>
     
      <div class="input-box address">
        <label>Price</label>
        <input type="number" placeholder="" id="txtPrice" name="txtPrice" required />
      </div>


      <center><button type="Submit" id="btnSubmit" name="btnSubmit">Add</button>
        <button>Cancel</button>
      </center>

    </form>
  </section>
</body>

</html>