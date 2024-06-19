<?php 
include 'connection.php';

if(isset($_POST['submit'])){
    $id=$_POST['cID'];
    $fullname=$_POST['full'];
  		    $email=$_POST['mail'];
  		    $address=$_POST['add'];
  		    $city=$_POST['city'];
  		    $province=$_POST['pro'];
  		    $zipcode=$_POST['zip'];
  		    $typecard=$_POST['card'];
  		    $cardnumber=$_POST['cardno'];
  		    $expmonth=$_POST['exm'];
  		    $expyear=$_POST['exy'];
  		    $cvv=$_POST['cv'];
    

    $sql="update payment1 set fullname='$fullname',mail='$email',address='$address',city='$city',province='$province',zipcode='$zipcode',cardtype='$typecard',cardnumber='$cardnumber',expmonth='$expmonth',expyear='$expyear',cvv='$cvv' where c_id='$id'";   //without where clause value will not be updated.
    $result=mysqli_query($con,$sql); //add single quotes to varchar one

    if($result)
    {
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}else{


$id=$_GET['updateid'];
$sql="Select * from payment1 where c_id=$id;";
$result=mysqli_query($con,$sql);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
     
        $rowString = implode(', ', $row);
       
            $c_id = $row['C_ID'];
            $fullname=$row['FullName'];
  		    $email=$row['Mail'];
  		    $address=$row['Address'];
  		    $city=$row['City'];
  		    $province=$row['Province'];
  		    $zipcode=$row['ZipCode'];
  		    $typecard=$row['CardType'];
  		    $cardnumber=$row['CardNumber'];
  		    $expmonth=$row['ExpMonth'];
  		    $expyear=$row['ExpYear'];
  		    $cvv=$row['CVV'];
    }
            
}
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud operation</title>
    
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
<midle><h1 style="margin-top:20px;">Update User</h1></middle>
    <div >
        <form method="post" action='update.php'>

            <div class="a">
            <input type="hidden" name="cID" value="<?php  echo $c_id;?>">
            </div>


            <div class="a">
                <label>Name</label>
                <input type="text" placeholder="Enter Name" name="full" autocomplete="off"
                    value=<?php echo $fullname;?>>
            </div>

            <div class="a">
                <label>E-mail</label>
                <input type="text" placeholder="Enter Email" name="mail" autocomplete="off"
                    value=<?php echo $email;?>>
            </div>

            <div class="a">
                <label>Address</label>
                <input type="text" placeholder="Enter Address" name="add" autocomplete="off"
                    value=<?php echo $address;?>>
            </div>

            <div class="a">
                <label>City</label>
                <input type="text" placeholder="Enter City" name="city" autocomplete="off"
                    value=<?php echo $city;?>>
            </div>
            


            <div class="a">
                <label for="Province">Province:</label>
                <br />
                <select name="pro" id="province" style="">
                                    <option value=<?php echo $province;?>><?php echo $province;?> </option>
                                    <option value="Western">Western </option>
                                    <option value="Southern">Southern</option>
                                    <option value="Sabaragamuwa">Sabaragamuwa</option>
                                    <option value="Uva">Uva</option>
                                    <option value="Central">Central</option>
                                    <option value="North Western">North Western</option>
                                    <option value="North Centra">North Central</option>
                                    <option value="Eastern">Eastern</option>
                                    <option value="Northern">Northern</option>
                </select>
            </div>

            <div class="a">
                <label>ZipCode</label>
                <input type="text" placeholder="Enter ZipCode" name="zip" autocomplete="off"
                    value=<?php echo $zipcode;?>>
            </div>

            <div class="a">
                <label for="Card">Card</label>
                <br />
                <select name="card" id="card" style="">
                                    <option value=<?php echo $typecard;?>><?php echo $typecard;?>  </option>
                                    <option value="Visa">Visa</option>
                                    <option value="Master">Master</option>
                </select>
            </div>

            <div class="a">
                <label>Card Number</label>
                <input type="text" placeholder="Enter Card Number" name="cardno" autocomplete="off"
                    value=<?php echo $cardnumber;?>>
            </div>


            <div class="a">
                <label>Month</label>
                <input type="text" placeholder="Enter Month" name="exm" autocomplete="off"
                    value=<?php echo $expmonth;?>>
            </div>

            
            <div class="a">
                <label for="Expiry Year">Expiry Year:</label>
                <br />
                <select name="exy" id="exy" style="">
                                    <option value=<?php echo $expyear;?>><?php echo $expyear;?> </option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                </select>
            </div>

            
            <div class="a">
                <label>CCV</label>
                <input type="text" placeholder="Enter CCV" name="cv" autocomplete="off"
                    value=<?php echo $cvv;?>>
            </div>

            <button type="submit" name="submit" style="background-color: #D2B4DE;">Update</button>
        </form>

    </div>



</body>

</html>