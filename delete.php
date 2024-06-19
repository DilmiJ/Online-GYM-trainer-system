<?php
include 'connection.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from  payment1 where c_id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "deleted successfully";
        header('location:display.php');
    }else{
        die(mysqli_error($con));
    }
}
?>