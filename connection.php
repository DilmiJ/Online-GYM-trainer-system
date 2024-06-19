<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$database="iwt";

$con= new mysqli($dbservername, $dbusername, $dbpassword,$database);

if ($con->connect_error) {
die("Connection failed: ". $con->connect_error);
}

?>