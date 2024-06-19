<?php 
include 'connection.php';
$id=$_GET['updateid'];
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    $sql="update `contactus` set id='$id',name='$name',email='$email',message='$message' 
    where id=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo "updated successfully";
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
    <link rel="stylesheet" href="Styles/AllStyle.css">
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
    <section class="Contact">
                        <div class="ContactForm">
                        <form name="myForm" method="post" onsubmit="return validateForm()">
                            <label for="name"><b>Name</b></label><br>
                            <input type="text" placeholder="Enter name" name="name"><br />

                            <label for="email"><b>E-mail</b></label><br>
                            <input type="email" placeholder="Enter email" name="email" required><br />

                            <label for="message"><b>Message</b></label><br>
                            <textarea type="text" placeholder="Enter message" name="message" required></textarea><br>

                            <div class="btna">
                            
                                <button type="submit" class="btns" name="submit"><b>Update</b></button>
                            </div>
                        </form>
                        </div>   
            </div>
    </section>

</body>
</html> 