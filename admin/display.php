<?php
include 'C:\xampp\htdocs\MLB_WD_01.01_06\connection.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin display</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
    
    }

    h1 {
        margin-top: 20px;
    }

    div {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        background-color: #D2B4DE;
        color: white;
        padding: 8px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 10px;
    }

    button a {
        color: white;
        text-decoration: none;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>

</head>

<body>

<center><h1 style="margin-top:20px;">All Trainers</h1></center>

    <div>
        <button>
            <a href="user.php" style="text-decoration:none">Add trainer</a>
        </button>

        <table>
            <thead>
                <tr>
                    <th scope="col">TID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Experience</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operation</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
    $sql="Select * from trainer";
    $result=mysqli_query($con,$sql);
    if($result)
    {
      
        while ($row=mysqli_fetch_assoc($result))
        {
            $tid=$row['tid'];
            $name=$row['name'];
            $email=$row['email'];
            $contactno=$row['contactno'];
            $username=$row['username'];
            $experience=$row['experience'];
            $password=$row['password'];

            
            echo'<tr>
            <th scope="row">'.$tid.'</th>
            <td>'.$name.'</td>
            <td>'.$email.'</td>
            <td>'.$contactno.'</td>
            <td>'.$username.'</td>
            <td>'.$experience.'</td>
            <td>'.$password.'</td>
     
            
            <td>
        <button><a href="update.php? updateid='.$tid.'" style="text-decoration:none">Update</a></button>
        <button><a href="delete.php? deleteid='.$tid.'" style="text-decoration:none">Delete</a></button>
    </td>
          </tr>';
        }
          
    } 
    ?>
    


            </tbody>
        </table>
    </div>

</body>

</html>