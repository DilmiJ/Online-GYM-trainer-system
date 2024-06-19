<?php
include 'connection.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `contactus` where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Deleted Successfull";
        header('location:displayc.php');
    }else{
        die(mysqli_error($con));
    }
}
