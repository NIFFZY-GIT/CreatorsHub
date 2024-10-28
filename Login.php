
<!DOCTYPE html>
<html lang="en">
<?php
session_start();

// Check if the form is submitted
if (isset($_POST["btnsubmit"])) {
    $username = $_POST["txtuname"];
    $password = $_POST["txtpassword"];

    $con = mysqli_connect("localhost", "root", "", "creatorshub");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Validate customer login
    $sql = "SELECT * FROM `users` WHERE `Email` = '$username' AND `Password` = '$password' AND `utype` = 'customer'";
    $result = mysqli_query($con, $sql);

    if ($result === false) {
        die("Query failed: " . mysqli_error($con));
    }

    if (mysqli_num_rows($result) > 0) {
        // Set customer's email in the session
        $_SESSION["customer_email"] = $username;

        // Redirect to the product page
        header('Location: Product.php');
        exit();
    }
    // }else{
    //   echo '<script>alert("INCORRECT PASSWORD OR USER NAME")</script>';
    // }

    // Validate admin login if customer login failed
    $sql = "SELECT * FROM `users` WHERE `Email` = '$username' AND `Password` = '$password' AND `utype` = 'admin'";
    $result = mysqli_query($con, $sql);

    if ($result === false) {
        die("Query failed: " . mysqli_error($con));
    }

    if (mysqli_num_rows($result) > 0) {
        // Set admin's email in the session if admin login
        $_SESSION["admin_email"] = $username;

        // Redirect to the admin product page
        header('Location: adminproduct.php');
        exit();
    }

    // If neither customer nor admin login is successful
    echo '<script>alert("INCORRECT PASSWORD OR USER NAME")</script>';

    mysqli_close($con);
}

// Rest of your HTML code...
?>

<!-- The rest of your HTML code remains unchanged -->


<head>
  <link rel="stylesheet" href="css/Login.css">
  <title>Login-Creators Hub</title>
  <link rel="icon" type="image/x-icon" href="/assets/logo/logotr.png">
	<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
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
        <form action="" id="form1" name="form1" method="post">
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
        <!-- <li><a href="Contact-us.php">Contact Us</a></li> -->
      </ul>
    </div>
  </div>
  <div class="yellow-bar"></div>
	<video autoplay loop muted plays-inline class="bgvid">
  <source src="bgvidlog3.mp4"  type="video/mp4">
</video>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" id="form1" name="form1" method="post">
                    <!--<a href="file:///F:/SEM%202/WAD/Projects/CreatorsHub/Login/Login.html"--><h2>Login</h2>
			
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" placeholder="Enter Username" name="txtuname" id="txtuname"  required >
                        <label for="uname">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" placeholder="Enter Password" name="txtpassword" id="txtpassword"  required>
                        <label for="pwd">Password</label>
                    </div>
                  <!--  <div class="forget"><center>
                        <label for="FJ"><input type="checkbox">Remember Me  <a href="#">Forget Password</a></label></center>
                      
                    </div>-->
                    <button  type="submit" name="btnsubmit" id="subbtn">Log in</button> <box-icon name="left-arrow-alt"></box-icon>
                    <div class="register">
                        <p>Don't have a account <a href="SignUp.php"> Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>
        <div class="foot">
            
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>