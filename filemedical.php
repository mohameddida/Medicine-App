<?php

session_start();
$mysqli = new mysqli('localhost', 'root', '', 'medicine') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
    $name = $_POST['idPatient'];
    $mat = $_POST['matricule'];
    $prenom = $_POST['prenom'];
    $dateNaiss = $_POST['dateNaiss'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $patient = $_POST['patient'];
    $mysqli->query("Select * From patient") or die($mysqli->error);
}
$resulet = $mysqli->query("select * from patient ") or die($mysqli->error);

function pre_result($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="filemedical.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</head>

<body>
    <?php

    if (isset($_SESSION['status'])) {
        echo "<h4>" . $_SESSION['status'] . "</h4>";
        unset($_SESSION['status']);
    }
    ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="modale.php">
                    <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Ajouter un patient</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">matricule</label>
                                <input type="text" class="form-control" id="matricule" name="matricule" placeholder="matricule" value="" required>
                                <div class="valid-feedback">
                                    valide !
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">prenom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom" value="" required>
                                <div class="valid-feedback">
                                    valide !
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername">patient</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input type="text" class="form-control" name="patient" id="patient" placeholder="patient name" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        donne le patient
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03">date de naissace</label>
                                <input type="date" class="form-control" name="dateNaiss" id="dateNaiss" placeholder="datenaiss" required>

                                <div class="invalid-feedback">

                                    donner votre date naiss !
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom04">telephone</label>
                                <input type="text" class="form-control" name="telephone" id="telephone" placeholder="telephone" required>
                                <div class="invalid-feedback">
                                    donner votre numero !
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom05">adresse</label>
                                <input type="text" class="form-control" name="adresse" id="Adress" placeholder="adresse" required>
                                <div class="invalid-feedback">
                                    donner votre adress !
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="ajouter" name="ajoute" class="btn btn-primary">Ajout</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>







    <!---- modale edite --->

    <div class="modal fade" id="editmodals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                            ?>">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier les donners d'une patient</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="idPatient" id="idPatient" />


                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">matricule</label>
                                <input type="text" class="form-control" id="Ematricule" name="matricule" placeholder="matricule" value="<?php echo $mat ?>" required>
                                <div class="valid-feedback">
                                    valide !
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom02">prenom</label>
                                <input type="text" class="form-control" id="Eprenom" name="prenom" placeholder="prenom" value="<?php echo $prenom ?>" required>
                                <div class="valid-feedback">
                                    valide !
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustomUsername">patient</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    </div>
                                    <input type="text" class="form-control" name="patient" id="Epatient" placeholder="patient name" value="<?php echo $patient ?>" aria-describedby="inputGroupPrepend" required>
                                    <div class="invalid-feedback">
                                        donne le patient
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03">date de naissace</label>
                                <input type="date" class="form-control" name="dateNaiss" id="EdateNaiss" value="<?php $_SESSION['dateNaiss'] ?>" required>

                                <div class="invalid-feedback">

                                    donner votre date naiss !
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom04">telephone</label>
                                <input type="text" class="form-control" name="telephone" id="Etelephone" value="<?php echo $telephone ?>" placeholder="telephone" required>
                                <div class="invalid-feedback">
                                    donner votre numero !
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom05">adresse</label>
                                <input type="text" class="form-control" name="adresse" id="EAdress" value="<?php echo $adresse ?>" placeholder="adresse" required>
                                <div class="invalid-feedback">
                                    donner votre adress !
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="updatedata" class="btn btn-primary">Update</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--- finish edite --->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {

                $('#editmodal').modal('show');
                $th = $(this).closest('th');

                var data = $th.children("th").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#idPatient').val(data[0]);
                $('#matricule').val(data[1]);
                $('#prenom').val(data[2]);
                $('#patient').val(data[3]);
                $('#dateNaiss').val(data[4]);
                $('#telephone').val(data[5]);
                $('#Adress').val(data[6]);
            });
        });
    </script>





    <!--  // <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('button', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>



    <?php if (isset($_SESSION['message'])) : ?>
        <div class="msg">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>
    <section id="cover" class="min-vh-100">
        <div id="cover-caption">
            <div class="container">
                <div class="row text-white">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">



                    </div>
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                        <h1 class="display-4 py-2 text-truncate">Patient</h1>

                        <div class="px-2">

                            <form method="POST" class="justify-content-center" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                                                                    ?>">
                                <div class="row justify-content-center ">
                                    <table class="table ">
                                        <thead>
                                            <tr>
                                                <th>matricule </th>
                                                <th>prenom</th>
                                                <th>Patient</th>
                                                <th>dateNaiss</th>
                                                <th>telephone</th>
                                                <th>adresse</th>
                                                <th colspan="2">Action </th>

                                            </tr>
                                        </thead>
                                        <?php
                                        while ($row = $resulet->fetch_assoc()) :
                                        ?>
                                            <tr>
                                                <th><?php echo $row['matricule']; ?></th>
                                                <th><?php echo $row['prenom']; ?></th>
                                                <th><?php echo $row['patient']; ?></th>
                                                <th><?php echo $row['dateNaiss']; ?></th>
                                                <th><?php echo $row['telephone']; ?></th>
                                                <th><?php echo $row['adresse']; ?></th>
                                                <th>
                                                    <a href="editefile.php?edite=<?php echo $row['idPatient']; ?>" class="btn btn-info editbtn" id="editmodal"> Edite </a>
                                                    <a href="delete.php?delete=<?php echo $row['idPatient']; ?>" class="btn btn-danger"> delete </a>


                                                </th>
                                            </tr>
                                        <?php
                                        endwhile;
                                        ?>
                                    </table>
                                </div>
                                <button name="save" class="btn btn-submit">save</button>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-submit " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Ajoute
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>