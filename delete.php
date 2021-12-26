<?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicine";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



if($_GET['delete']){
$stm=$conn->prepare("delete from patient where idPatient=?");
$stm->bind_param("i",$_GET['delete']);
$stm->execute();
header('location:filemedical.php');
}