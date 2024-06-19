<?php
include 'connection.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Display</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        background-image: url("../LOGO.jpg");
    
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

<center><h1 style="margin-top:20px;">All payments</h1></center>

    <div>
        <button>
            <a href="paypage.php" style="text-decoration:none">Add Payment</a>
        </button>
        <button>
        <a href="plan select page.html" style="text-decoration:none">Log out</a>


        </button>
        <table>
            <thead>
                <tr>
                    <th scope="col">C_ID</th>
                    <th scope="col">FullName</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Province</th>
                    <th scope="col">ZipCode</th>
                    <th scope="col">CardType</th>
                    <th scope="col">CardNumber</th>
                    <th scope="col">ExpMonth</th>
                    <th scope="col">ExpYear</th>
                    <th scope="col">Cvv</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
    $sql="Select * from payment1;";
    $result=mysqli_query($con,$sql);
    if($result)
    
    {
        while ($_row=mysqli_fetch_assoc($result))
        {
            $C_ID=$_row['C_ID'];
  		    $FullName=$_row['FullName'];
  		    $Mail=$_row['Mail'];
  		    $Address=$_row['Address'];
  		    $City=$_row['City'];
  		    $Province=$_row['Province'];
  		    $ZipCode=$_row['ZipCode'];
  		    $CardType=$_row['CardType'];
            $CardNumber=$_row['CardNumber'];
  		    $ExpMonth=$_row['ExpMonth'];
  		    $ExpYear=$_row['ExpYear'];
  		    $CVV=$_row['CVV'];
            

            
            echo'<tr>
            <th scope="row">'.$C_ID.'</th>
            <td>'.$FullName.'</td>
            <td>'.$Mail.'</td>
            <td>'.$Address.'</td>
            <td>'.$City.'</td>
            <td>'.$Province.'</td>
            <td>'.$ZipCode.'</td>
            <td>'.$CardType.'</td>
            <td>'.$CardNumber.'</td>
            <td>'.$ExpMonth.'</td>
            <td>'.$ExpYear.'</td>
            <td>'.$CVV.'</td>
     
     
     
            
            <td>
        <button><a href="update.php?updateid='.$C_ID.'" style="text-decoration:none">Update</a></button>
        <button><a href="delete.php?deleteid='.$C_ID.'" style="text-decoration:none">Delete</a></button>
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