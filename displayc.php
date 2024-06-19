<?php
include 'connection.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <style>
        body {
            margin: 50px;
        }

        h1 {
            font-size: 24px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #fff;
        }

        th, td {
            width: 20%;
        }


    </style>

    <title>Display-Contact us</title>
</head>
<body>
    <h1>Contact Us</h1>
    <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
          $sql="Select * from `contactus`";
          $result=mysqli_query($con,$sql);
          if($result){


                 while($row=mysqli_fetch_assoc($result)){
                    echo "<tr>
                    <td>". $row["id"] . "</td>
                    <td>". $row["name"] . "</td>
                    <td>". $row["email"] . "</td>
                    <td>". $row["message"] . "</td>
                    <td>
                        <button class='btn1'><a href='updatec.php?
                        updateid=". $row["id"] ."' class='text-light'>Update</a></button>
                        <button class='btn btn-danger'><a href='deletec.php?
                        deleteid=". $row["id"] ."' class='text-light'>Delete</a></button>
                    </td>
                </tr>";
                 }
            }
            ?>
        </tbody>
    </table>
</body>
</html>