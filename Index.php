<!doctype html>
<html>
<link rel="stylesheet" href="css/Index.css" />

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
        <li><a href="About.html">About</a></li>
        <!-- <li><a href="Contact-us.html">Contact Us</a></li> -->
      </ul>
    </div>
  </div>
  <div class="yellow-bar"></div>
  <div class="hero">
    <p class="herotxt">Unleashing the creativity </p>
    <!--		Painting is more than an art-->
    <button class="herobtn">VIEW ART</button>
    <video src="assets/Videos/your name 4K 60fps_1.mp4" muted autoplay loop></video>
  </div>
  <div class="yellow-bar"></div>
  <div class="view">
    <!-- <p>Art Works</p> -->
  </div>
  
  <div class="container">
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

        // Fetch data from the products table
        $sql = "SELECT * FROM products";
        $result = mysqli_query($con, $sql);

        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='card'>";
                echo "<div class='imgBox'>";
                echo "<img src='" . $row['path'] . "' alt='" . $row['name'] . "' class='mouse'>";
                echo "</div>";
                echo "<div class='contentBox'>";
                echo "<h3>" . $row['name'] . "</h3>";
                echo "<h2 class='price'>" . $row['price'] . ".<small>00</small> LKR</h2>";
                // Pass the product ID as a parameter in the URL
                echo "<a href='Login.php?id=" . $row['id'] . "' class='buy'>View Art</a>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "0 results";
        }

        // Close the database connection
        mysqli_close($con);

        ?>
    </div>

  </div>

  <footer class="footer">
    <div class="footer__addr">
      <h1 class="footer__logo">Something</h1>
          
      <h2>Contact</h2>
      
      <address>
        5534 Somewhere In. The World 22193-10212<br>
            
        <a class="footer__btn" href="mailto:example@gmail.com">Email Us</a>
      </address>
    </div>
    
    <ul class="footer__nav">
      <li class="nav__item">
        <h2 class="nav__title">Media</h2>
  
        <ul class="nav__ul">
          <li>
            <a href="#">Online</a>
          </li>
  
          <li>
            <a href="#">Print</a>
          </li>
              
          <li>
            <a href="#">Alternative Ads</a>
          </li>
        </ul>
      </li>
      
      <li class="nav__item nav__item--extra">
        <h2 class="nav__title">Technology</h2>
        
        <ul class="nav__ul nav__ul--extra">
          <li>
            <a href="#">Hardware Design</a>
          </li>
          
          <li>
            <a href="#">Software Design</a>
          </li>
          
          <li>
            <a href="#">Digital Signage</a>
          </li>
          
          <li>
            <a href="#">Automation</a>
          </li>
          
          <li>
            <a href="#">Artificial Intelligence</a>
          </li>
          
          <li>
            <a href="#">IoT</a>
          </li>
        </ul>
      </li>
      
      <li class="nav__item">
        <h2 class="nav__title">Legal</h2>
        
        <ul class="nav__ul">
          <li>
            <a href="#">Privacy Policy</a>
          </li>
          
          <li>
            <a href="#">Terms of Use</a>
          </li>
          
          <li>
            <a href="#">Sitemap</a>
          </li>
        </ul>
      </li>
    </ul>
    
    <div class="legal">
      <p>&copy; 2023 NIFFZY. All rights reserved.</p>
      
      <div class="legal__links">
        <span><span class="heart">♥</span></span>
      </div>
    </div>
  </footer>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>