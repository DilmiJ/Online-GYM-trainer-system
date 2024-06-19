<?php
session_start();

include ('connection.php');

if ($con->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

else
{
  $sql = "SELECT * FROM user WHERE username = ?";

  $username = $_SESSION['username'];

  $stmt = $con->prepare($sql);
  $stmt->bind_param("s", $username);
  $stmt->execute();

  $result = $stmt->get_result();

  if ($result->num_rows > 0)
  {
      $row = $result->fetch_assoc();
      $firstname = $row["firstname"];
      $lastname = $row["lastname"];
      $email = $row["email"];
      $contactno = $row["contactno"];
      $address=$row["address"];
      $age=$row["age"];
      $height=$row["height"];
      $weight=$row["weight"];
  } 
  else
  {
      echo "<html>
              <head>
              </head>
              <body>
                <script>
                  alert ('Please log in');
                  window.location.href = 'login_member.html';
                </script>
              </body>
              </html>";
      exit();
  }

  }
  if(isset($_POST['logOut']))
  {
    session_destroy();
    $stmt->close();
    $con->close();
    echo "<html>
            <head>
            </head>
            <body>
              <script>
                alert ('You are logout');
                window.location.href = 'login_member.html';
              </script>
            </body>
          </html>";
  }

  if(isset($_POST['delete']))
  {
    $sql="DELETE  FROM user WHERE username = ?";
    $stmt=$con->prepare($sql);
    $stmt->bind_param("s",$username);
    $stmt->execute();
    echo "<html>
            <head>
            </head>
            <body>
              <script>
                alert ('Account Deleted');
                window.location.href = 'login_member.html';
              </script>
            </body>
          </html>";
  }

  if(isset($_POST['update']))
  {
    header("Location: edit_profile.php");
}

$stmt->close();
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="Styles/AllStyles.css">
    <link rel="stylesheet" href="Styles/user_profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  </head>
  <body>
    <header>
      <ul>
        <li><img src="images/MLB.png" alt="logo"></li>
        <li><a class="menu" href="home.html">HOME</a></li>
        <li><a class="menu" href="Training.html">TRANING</a></li>
        <li><a class="menu" href="meal.html">MEAL</a></li>
        <li><a class="menu" href="Aboutus.html">ABOUT US</a></li>
        <li><a class="menu" href="plan select page.html">GO PRIMIUM</a></li>
        <li><a class="menu" href="FAQ.html">FAQ</a></li>
        <li id="pro_pic"><a href="user_profile.php"><img src="images/profile/Profile-PNG-File.png"></a>
                
      </ul>    
    </header>
    
    <div class="profile">
      <form class="profile-details" method="post" action="user_profile.php">
        
        <div class="topbar">
            <img src="images/profile/logo1.png" class="circale-img">
              <h1>WELCOME ! - <?php echo $firstname; ?></h1>
        </div>
        
        <button  id="logout" type="submit" name = "logOut">log out</button>
        <button  id="update" type="submit" name = "update" >Edit Account</button>

        <div class="bmi">
            <h1 class="headn">User BMI</h1>
            <hr>
            <div class="bmialign">
               <div class="profile-value" id="username"><b>Age : </b>  <?php echo $age; ?></div>
                    
                <div class="profile-value" id="contactno"><b>Height : </b><?php echo $height; ?> </div>
                    
                <div class="profile-value" id="address"><b>Weight : </b> <?php echo $weight; ?></div>
                    
                <br>
                    
                <div class="profile-value" id="email"><b>Subcription : </b> Annual Subcription</div>
            </div>
        </div>
    
        <div class="about">
          <h1 class="headn">About</h1>
          <hr>
            <div class="aboutalign">
                    
              <div class="profile-value" id="fullname"><b>FullName : </b>  <?php echo $firstname; ?> <?php echo $lastname; ?></div>
                    
              <div class="profile-value" id="username"><b>Username : </b>  <?php echo $username; ?></div>
                    
              <div class="profile-value" id="contactno"><b>Contact No. : </b><?php echo $contactno; ?> </div>
                    
              <div class="profile-value" id="address"><b>Address : </b> <?php echo $address; ?></div>
                    
              <div class="profile-value" id="email"><b>Email : </b> <?php echo $email; ?></div>
            </div>
          </div>
        </div> 
        <button  id="delete" type="submit" name = "delete">Delete My Account</button>
      </form>
    </div>
    <footer>
      <div class="footerContainer">
        <div class="logo">
          <img src="images/MLB.png" alt="logo">
        </div>
        <div class="socialIcons">
          <a href=""><i class="fa-brands fa-facebook"></i></a>
          <a href=""><i class="fa-brands fa-instagram"></i></a>
          <a href=""><i class="fa-brands fa-youtube"></i></a>
        </div>
        <div class="footerNav">
          <ul>
            <li><a href="contactus.php">Contact Us</a></li>
            <li><a href="Terms and condition.html">Terms and Conditions</a></li>
            <li><a href="Aboutus.html">Privacy policy</a></li>
          </ul>
        </div>
      </div>
      <div class="footerBottom">
         <p>&copy;Group MLB_WD_01.01_06. All rights reserved</p>
      </div>
    </footer>
  </body>
</html>