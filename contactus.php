<?php 
include 'connection.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    $sql="insert into `contactus` (name,email,message)
    values ('$name','$email','$message')";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo "<script>alert('Data inserted sucessfully')</script>";
        
    } else {
        die(mysqli_error($con));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/AllStyles.css">
    <link rel="stylesheet" href="Styles/ContactStyle.css">
    <title>Contact Us</title>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script>
function validateForm() {
    let x = document.forms["myForm"]["name"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}
</script>
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
    <br><br><br><br><br><br>
    <section class="Contact">
        <div class="content">
        <h1>Conect with us </h1>
        <p>
            We would love to respond to your queries and help you succeed
            feel free to get touch with us.</p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        <div class="text">
                            <h3>Address</h3>
                            <p>46, 2nd Floor Galle Road,Dehiwala,</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            <div class="text">
                                <h3>Phone</h3>
                                <p>(206) 342-8631</p>
                            </div>
                        </div>
                        <div class="box">
                            <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                <div class="text">
                                    <h3>email</h3>
                                    <p>codex@live.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="ContactForm">
                        <form name="myForm" method="post" onsubmit="return validateForm()">
                            <label for="name"><b>Name</b></label><br>
                            <input type="text" placeholder="Enter name" name="name"><br />

                            <label for="email"><b>E-mail</b></label><br>
                            <input type="email" placeholder="Enter email" name="email" required><br />

                            <label for="message"><b>Message</b></label><br>
                            <textarea type="text" placeholder="Enter message" name="message" required></textarea><br>

                            <div class="btna">
                            
                                <button type="submit" class="btns" name="submit"><b>Submit</b></button>
                            </div>
                        </form>
                        </div>   
            </div>
    </section>
    <br><br><br><br><br><br>
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