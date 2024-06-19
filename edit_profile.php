<?php
session_start();

include ("connection.php");

if ($con->connect_error) 
{
    die("Connection failed: " . $con->connect_error);
}
else
{

    $username = $_SESSION['username'];
  
    $sql = "SELECT * FROM user WHERE username = ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) 
    {
        $row = $result->fetch_assoc(); 
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $address = $row["address"];
        $email = $row["email"];
        $contactno=$row["contactno"];
        $weight = $row["weight"];
        $height = $row["height"];

    } 

    if(isset($_POST['back']))
    {
        header("Location: user_profile.php");
    }

    if(isset($_POST['update']))
    {
        $username1=$username;
        $firstname = $_POST["firstname" ];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $contactno = $_POST["contactno"];
        $weight = $_POST["weight"];
        $height = $_POST["height"];

        $sql = "UPDATE user SET firstname = ?, lastname = ?, email = ?, address = ?, contactno = ?, username = ?, height = ?, weight = ? WHERE username = ?";


        $stmt = $con->prepare($sql);
        $stmt->bind_param("sssssssss", $firstname, $lastname, $email, $address, $contactno , $username , $height , $weight ,$username1);


        if ($stmt->execute()) 
        {
            echo "<html><head></head><body><script>
            alert ('Account Information updated successfully');
            window.location.href = 'user_profile.php';
            </script>
            </body>
            </html>";
        } 
        else 
        {
            echo "Error updating user data: " . $stmt->error;
        }
    }



}
$stmt->close();
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="Styles/AllStyles.css"> 
    <link rel="stylesheet" href="Styles/edit_profile.css"> 

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
        <form class="updateprofile" method="post" action="edit_profile.php" >
        <div id="image">
            <div class="profile-info">
                
                <div class="profile-left">
                    
                    <div class="profile-value" id="first-name"><b>First Name:</b> <input type="text" value="<?php echo $firstname; ?>" name="firstname"required> </div>
                
                    <div class="profile-value" id="username"><b>Weight: </b>  <input type="text" value="<?php echo $weight; ?>" name="weight"required></div>

                    <div class="profile-value" id="username"><b>Height: </b>  <input type="text" value="<?php echo $height; ?>" name="height"required></div>
                </div>
               
                <br>
                <div class="profile-right">

                    <div class="profile-value" id="last-name"><b>Last Name: </b> <input type="text" value="<?php echo $lastname; ?>" name="lastname"required></div>

                    <div class="profile-value" id="address"><b>Address:</b><input type="text" value="<?php echo $address; ?>" name="address"required> </div>
                
                    <div class="profile-value" id="city"> <b>Contact No. : </b> <input type="text" value="<?php echo $contactno; ?>" name="contactno"required></div>
                
                    <div class="profile-value" id="email"><b>Email: </b><input type="text" value=" <?php echo $email; ?>" name="email"required></div>
                </div>

            </div>
            <div class="update">
            <button  id="cancel" type="submit" name = "back" >Cancel</button>
            <button  id="update" type="submit" name = "update">Update Conform</button>
            </div>
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
                <p>copyright &copy;Group MLB_WD_01.01_06. All rights reserved</p>
            </div>
        </footer>
        
    </body>
</html>