
<!doctype html>

<html>
<link rel="stylesheet" href="css/Cart.css" />

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
        <li><a href="Product.php">Products</a></li>
        <li><a href="About.php">About</a></li>
        <!-- <li><a href="Contactus.php">Contact Us</a></li> -->
      </ul>
    </div>
  </div>
  <div class="yellow-bar"></div>




  
  <div class="small-container cart-page">
        <table align="center" border="1">
            <tr>
                <th>Product Image</th>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Delete</th>
            </tr>

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

            // Fetch products from the cart table
            $sql = "SELECT cart.id, products.name, products.price, products.path FROM cart JOIN products ON cart.id = products.id";
            $result = mysqli_query($con, $sql);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td><img src='" . $row['path'] . "' width='50' height='50'></td>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td><a href='?action=delete&id=" . $row['id'] . "'>Delete</a></td>"; // Adjust the delete link accordingly
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No products in the cart</td></tr>";
            }
            if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
              $productId = $_GET['id'];
              // Perform the deletion from the cart table
              $deleteProductSql = "DELETE FROM cart WHERE id = '$productId'";
              if (mysqli_query($con, $deleteProductSql)) {
                  // You may want to add a success message
                  echo "<script>alert('Product deleted successfully from the cart.');</script>";
                  // Redirect or refresh the page after deletion
                  echo "<script>window.location.replace('Cart.php');</script>";
              } else {
                  // Handle deletion error
                  echo "<script>alert('Error deleting product from the cart.');</script>";
              }
          }

            // Close the database connection
            mysqli_close($con);
            ?>

        </table>
        <div class="total">
            <div>

                <button>Check out</button>
            </div>
        </div>
    </div>
</body>
  </html>