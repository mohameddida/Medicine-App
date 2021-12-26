<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'medicine');
$id = '';
$mat = '';
$prenom = '';
$dateNaiss = '';
$telephone = '';
$adresse = '';
$Patient = '';


if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (isset($_GET['delete'])) {
    $mat = $_POST['matricule'];
    $prenom = $_POST['prenom'];
    $dateNaiss = $_POST['dateNaiss'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $Patient = $_POST['Patient'];
    $name = $_GET['delete'];
    $mysqli->query("DELETE FROM patient WHERE idPatient = $name") or die($mysqli->error);
    header("location : filemedical.php");
    $_SESSION['message'] = " delated successfuly ";
}


if (isset($_GET['edit'])){
    $mat = $_POST['matricule'];
    $prenom = $_POST['prenom'];
    $dateNaiss = $_POST['dateNaiss'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $Patient = $_POST['Patient'];
    $name = $_GET['edite'];
    $mysqli->query("SELECT * patient WHERE idPatient = $name") or die($mysqli->error);
    
    header("location : <ital>editefile.php</ital>");
    
}
/*if (isset($_POST['ajoute'])) {

    $query = "INSERT INTO  patient (matricule,prenom,dateNaiss,telephone,adresse,Patient) 
    VALUES ($mat,$prenom,$dateNaiss,$telephone,$adresse,$Patient)"
        or die($mysqli->error);
    $query_run = mysqli_query($mysqli, $query);
    if ($query_run) {
        $_SESSION['status'] = "Data Value Insered !! ";
        header("Location : filemedical.php");
    } else {
        $_SESSION['status'] = "Data Value Erreur !! ";
        header("Location : filemedical.php");
    }
}
if (isset($_GET['edit'])) {
    $name = $_GET['edit'];
    $mysqli->query("SELECT * FROM patient WHERE idPatient=$name") or die($mysqli->error);
    if (count($_SESSION[$mysqli]) == 1) {
        $n = mysqli_fetch_array($record);
        $name = $n['name'];
        $address = $n['address'];
    }
}
/*
$id = $_SESSION['idPatient'];

$sql = "SELECT * FROM patient WHERE idPatient = $id";
if (isset($_GET['edit'])) {
    $id = $_GET['idPatient'];
    if ($mysqli->query($sql) === TRUE) {
        $row = $result->fetch_array();
        $mat = $row['matricule'];
        $prenom = $row['prenom'];
        $patient = $row['patient'];
        $dateNaiss = $row['dateNaiss'];
        $telephone = $row['telephone'];
        $adresse = $row['adresse'];
        header("location : filemedical.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header("location : filemedical.php");
    }
}*/
/*if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $mysqli-> query("SELECT * FROM patient WHERE idPatient = $id") or die($mysqli->error);
    if (count($result) === 1) {
        $row = $result->fetch_array();
        $mat = $row['matricule'];
        $prenom = $row['prenom'];
        $patient = $row['patient'];
        $dateNaiss = $row['dateNaiss'];
        $telephone = $row['telephone'];
        $adresse = $row['adresse'];
    }
}
*/