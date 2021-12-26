<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'medicine') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
    
    $id=(int)$_GET['edite'];
    $mat = $_POST['matricule'];
    $prenom = $_POST['prenom'];
    $dateNaiss = $_POST['dateNaiss'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $patient = $_POST['patient'];
    $stmt1=$mysqli->prepare("update  patient set  matricule=? , prenom=? , dateNaiss=? , telephone=? , patient=?,adresse=?  where idPatient=? ");
    $stmt1->bind_param("isssssi",$mat,$prenom,$dateNaiss,$telephone,$patient,$adresse,$id);
    $stmt1->execute();
    $stmt1->close();
    header('location: filemedical.php');
}
$stmt=$mysqli->prepare("select * from patient where idPatient=?");
$stmt->bind_param("i",$id);
$id=(int)$_GET['edite'];
$stmt->execute();
$result=$stmt->get_result();
$numRow=$result->num_rows;
while($row=$result->fetch_assoc()){
    $name = $row['idPatient'];
    $mat = $row['matricule'];
    $prenom = $row['prenom'];
    $dateNaiss = $row['dateNaiss'];
    $telephone = $row['telephone'];
    $adresse = $row['adresse'];
    $patient = $row['patient'];  
}
$stmt->free_result();
$stmt->close();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="filemedical.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</head>


<body>
    <section id="cover" class="min-vh-100">
        <div id="cover-caption">
            <div class="container">
                <div class="row text-white">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">



                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                        <h1 class="display-4 py-2 text-truncate">Patient</h1>

                        <div class="px-2">

                            <form method="POST" class="justify-content-center" role="form" action="">
                                <table class="table">
                                    <div class="row justify-content-center ">
                                        <tr>
                                            <label>matricule </label><br />
                                            <input type="text" name="matricule" value="<?php echo $mat; ?>" /><br />
                                            <label>prenom</label><br />
                                            <input type="text" name="prenom" value="<?php echo $prenom; ?>" />
                                            <br /><label>Patient</label><br />
                                            <input type="text" name="patient" value="<?php echo $patient; ?>" />
                                            <br /><label>dateNaiss</label><br />
                                            <input type="date" name="dateNaiss" value="<?php echo $dateNaiss; ?>" />
                                            <br /> <label>telephone</label><br />
                                            <input type="text" name="telephone" value="<?php echo $telephone; ?>" />
                                            <br /><label>adresse</label><br />
                                            <input type="text" name="adresse" value="<?php echo $adresse; ?>" />
                                        </tr>



                                </table>
                        </div>
                        <button name="save" class="btn btn-submit">save</button>
                

                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

</body>

</html>