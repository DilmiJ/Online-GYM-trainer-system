<?php
include 'C:\xampp\htdocs\MLB_WD_01.01_06\connection.php';

if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from trainer where tid=$id";
    $result=mysqli_query($con,$sql);
    if($result){
       
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}
?>