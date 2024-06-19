<?php 
include 'C:\xampp\htdocs\MLB_WD_01.01_06\connection.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $contactno=$_POST['contactno'];
    $username=$_POST['username'];
    $experience=$_POST['experience'];
    $password=$_POST['password'];


    $sql="INSERT INTO trainer (name,email,contactno,username,experience,password)
    VALUES ('$name','$email','$contactno','$username','$experience','$password')";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        echo "Data inserted sucessfully";
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
    <title>Add Trainer </title>
    <style>
        .center {
  margin: auto;
  width: 50%;
  border: 3px solid #73AD21;
  padding: 10px;
}
.form-container {
        width: 300px;
        margin: auto;
    }

  
    label {
        display: block;
        margin-bottom: 5px;
    }

    
    input[type="text"],
    input[type="email"],
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }
    </style>
   
</head>

<body>
    <center>
        <h1 style="margin-top:20px;">Add Trainer</h1>
    </center>

    <div class="form">
        <form method="post">
    <div class="center">
            <div>
                <label>Name</label>
                <input type="text" placeholder="Enter Name" name="name" autocomplete="off">
            </div>

            <div>
                <label>E-mail</label>
                <input type="email" placeholder="Enter Email" name="email" autocomplete="off">
            </div>

            <div>
                <label>contact number</label>
                <input type="text" placeholder="Enter Contact No" name="contactno"
                    autocomplete="off">
            </div>

            <div>
                <label>username</label>
                <input type="text" placeholder="Enter Username" name="username"
                    autocomplete="off">
            </div>

            <div>
                <label>experience</label>
                <input type="text" placeholder="Enter Experience" name="experience"
                    autocomplete="off">
            </div>

            <div>
                <label>Password</label>
                <input type="text" placeholder="Enter License Id" name="password"
                    autocomplete="off">
            </div>



            <button onclick="add()"  type="submit" name="submit">Submit</button>
            <script>
                function add() {
                var txt;
                (confirm("Data added successfully!"))                
                }
            </script>
            <div>
        </form>

    </div>



</body>

</html>