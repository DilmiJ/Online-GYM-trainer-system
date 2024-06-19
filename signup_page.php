<?php
include_once 'connection.php';

if(isset($_POST['join']))
{
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $age = $_POST['age'];
  $gender =$_POST['gender'];
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $contactno = $_POST['contactnumber'];
  $address = $_POST['address'];

  if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM user WHERE Email='{$email}'")) > 0)
  {
    echo "<script>alert('{$email} - This email has already taken.');</script>";
  }
   else
  {
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM user WHERE username='{$username}'")) > 0)
    {
      echo "<script>alert('{$username} - This username has already taken.');</script>";
    }
    else
    {    
      if ($password === $cpassword) 
      {
        $sql = " INSERT INTO user (firstname,lastname,age,gender,height,weight,email,username,password,contactno,address)
                VALUES ('$firstname','$lastname','$age','$gender','$height','$weight','$email','$username','$password','$contactno','$address')";


        $result=mysqli_query($con,$sql);
        if($result)
        {
            echo "<script>alert('Data inserted sucessfully')</script>";
            header("Location: login_member.html");
            
        } else {
            die(mysqli_error($con));
        }
      }
      else 
      {
        echo "<script>alert('Password and confirm password do not match.');</script>";
      }
    }  
  }
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MLB Fitness Register page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Styles/AllStyles.css">
    <link rel="stylesheet" href="Styles/signupStyle.css">
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
        <li id="login"><a class="menu" href="login_member.html">LOGIN/SIGNUP</a></li>
    </ul>
    </header>

    <div class="register-form">
      <div class="form">
          <h2>Register</h2>
          <form id="member-sign-up-form" method="post" action="signup_page.php">
            <div class="form-left">
              <div class="form-group">
                <label for="name">Name</label><br>
                <input type="text" class="fname" name="firstname" placeholder="First name" required>
              </div>
              <div class="form-group">
                <label for="age">Age</label><br>
                <input type="text" name="age" placeholder="Your age" required>
              </div>
              <div class="form-group">
                <label for="weight">Weight(kg)</label>
                <input type="text" class="weight" name="weight" placeholder="weight in kg" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="email" name="email" placeholder="example@gmail.com" required>
              </div>              
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="password" name="password" placeholder="password" required>
              </div>
              <div class="form-group">
                <label for="contactnumber">Contact number</label>
                <input type="text" class="contactnumber" name="contactnumber" placeholder="0123456789" maxlength="10" pattern="[0-9]{10}" required> 
              </div>
            </div>
            <div class="form-right">
              <div class="form-group">
                <input type="text" class="lname" name="lastname" placeholder="Last name" required>
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="gender" name="gender" placeholder="Male or Femail" required>         
              </div>
              <div class="form-group">
                <label for="height">Height(cm)</label>
                <input type="text" class="height" name="height" placeholder="Height in cm" required>          
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="username" name="username" placeholder="Username" required> 
              </div>
              <div class="form-group">
                <label for="re-password">Confirm password</label>
                <input type="password" class="cpassword" name="cpassword" placeholder="Re-enter password" required> 
              </div>
              <div class="form-group">
                <label for="country">Address</label>
                <input type="text" class="address" name="address" placeholder="Your Address" required>
              </div>
            </div>
            <div class="form-group">
              <label for="terms" class="terms">
              <input type="checkbox" class="terms" name="terms" required>I agree with MLB Fitness's terms and conditions , privacy and policy.</label>
            </div>
            <button name="join"id="join-button" type="submit">Join</button>
            <p>Already have an account? <a href="login_member.html">Login</a></p>
          </form>
      </div>
    
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
          <p>copyright &copy;Group MLB_WD_01.01_06. All rights reserved</p>
      </div>
    </footer>
  </body>
</html>