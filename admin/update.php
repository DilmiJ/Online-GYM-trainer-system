<?php 
include 'C:\xampp\htdocs\MLB_WD_01.01_06\connection.php';

$tid=$_GET['updateid'];
$sql="Select * from `trainer` where tid=$tid";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$contactno=$row['contactno'];
$username=$row['username'];
$experience=$row['experience'];
$password=$row['password'];


if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contactno=$_POST['contactno'];
    $username=$_POST['username'];
    $experience=$_POST['experience'];
    $password=$_POST['password'];

    

    $sql="update `trainer` set tid=$tid, name='$name', 
    email='$email', contactno=$contactno, username='$username',experience='$experience',password='$password'
    where tid=$tid";  
    $result=mysqli_query($con,$sql); 
    if($result)
    {
        
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trainer update</title>
    
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        background-image: url("../LOGO.jpg");
    }

    h1 {
        margin-top: 20px;
        text-align: center;
    }

    .a {
        width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    label {
        margin-bottom: 10px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
    }

    button:hover {
        background-color: #45a049;
    }
</style>


   
</head>

<body>
<center><h1 style="margin-top:20px;">Update User</h1></center>
    <div >
        <form method="post">

            <div class="a">
                <label>Name</label>
                <input type="text" placeholder="Enter Name" name="name" autocomplete="off"
                    value=<?php echo $name;?>>
            </div>

            <div class="a">
                <label>E-mail</label>
                <input type="email" placeholder="Enter Email" name="email" autocomplete="off"
                    value=<?php echo $email;?>>
            </div>

            <div class="a">
                <label>contactno Number</label>
                <input type="text" placeholder="Enter contactno" name="contactno" autocomplete="off"
                    value=<?php echo $contactno;?>>
            </div>

            <div class="a">
                <label>User Name</label>
                <input type="text" placeholder="Enter Username" name="username" autocomplete="off"
                    value=<?php echo $username;?>>
            </div>



            <div class="a">
                <label for="experience">Experience:</label>
                <input type="text" placeholder="Enter experience" name="experience" autocomplete="off"
                    value=<?php echo $experience;?>>
            </div>

            <div class="a">
                <label>Licence Id</label>
                <input type="text" placeholder="Enter Licence Id" name="password" autocomplete="off"
                    value=<?php echo $password;?>>
            </div>



            <button onclick="add()" type="submit" name="submit" style="background-color: #D2B4DE;">Update</button>
            <script>
            function add() {
                var txt;
                (confirm("Data updated successfully!"))                
                }
            </script>
        </form>

    </div>



</body>

</html>