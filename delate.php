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

$mat = $_POST['matricule'];
$prenom = $_POST['prenom'];
$patient = $_POST['patient'];
$dateNaiss = $_POST['dateNaiss'];
$telephone = $_POST['telephone'];
$adresse = $_POST['adresse'];