
<!doctype html>

<html>
<?php
	if(isset($_POST["btnSubmit"]))  //check whether button is clicked or not
	{
		
		$fullname = $_POST["txtFullName"]; 
    $email = $_POST["txtEmail"]; //get values
		$password = $_POST["txtPassword"];
    $contact = $_POST["txtnum"];
		$utype="customer";
    $adress=$_POST["txtAdress"];;
		$con = mysqli_connect("localhost", "root", "", "creatorshub");

					
				if(!$con) // check db connection
				{
					die("Cannot connect our DB Seaver");
          echo '<script>alert("error: DATABASE")</script>';
				}
        $sql = "INSERT INTO `users` (`fullname`, `email`, `Password`, `contact`, `utype`, `adress`) 
        VALUES ('$fullname', '$email', '$password', '$contact', '$utype', '$adress')";


	
		if( mysqli_query($con,$sql))
		{
			
			header('Location:Login.php');
			ob_end_flush();
			

		}
	
	}
?>	


<link rel="stylesheet" href="css/Sign Up css.css" />

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

          <div><a href="#"><i class="fa-regular fa-user" ></i></a></div>
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
  <section class="container">
    <header>Registration Form</header>
    <form class="form" method="post" action="SignUp.php">
        <div class="input-box">
            <label>Full Name</label>
            <input required="" placeholder="Enter full name" type="text" name="txtFullName" id="txtFullName">
        </div>
        <div class="input-box">
            <label>User Name</label>
            <input required="" placeholder="Enter Email" type="text" name="txtEmail" id="txtEmail">
        </div>

        <div class="column">
            <div class="input-box">
              <label>Phone Number</label>
              <input required="" placeholder="Enter phone number" type="txt" name="txtnum" id="txtnum">
            </div>
        </div>

        <div class="input-box">
            <label>Password</label>
            <input required="" placeholder="Enter Password" type="text" name="txtPassword" id="txtPassword">
        </div>

    
       

       
      
        <div class="input-box address">
          <label>Address</label>
          <input required="" placeholder="Enter  address" type="text" name="txtAdress" id="txtAdress">  
        </div>
        <button  type="submit" class="button" name="btnSubmit" id="btnSubmit">Submit</button>
    </form>
  </section>
  </body>
</html>