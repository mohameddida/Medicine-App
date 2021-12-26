<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link href="login.css" rel="stylesheet" />
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
          <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
            <h1 class="display-4 py-2 text-truncate">médicine</h1>
            <div class="px-2">
              <form action="filemedical.php" method="POST" class="justify-content-center" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                                                                            ?>">
                <div class="form-group">
                  <label class="sr-only">matricule de patient</label>
                  <input type="text" class="form-control" id="username" placeholder="0123456789" required />
                </div>
                <div class="form-group">
                  <label class="sr-only">Mode Passe</label>
                  <input type="text" name="securityCode" id="password" class="form-control" required />
                </div>
                <?php
                session_start();
                $message = '';
                if (isset($_POST['securityCode']) && ($_POST['securityCode'] != "")) {
                  if (strcasecmp($_SESSION['captcha'], $_POST['securityCode']) != 0) {
                    $message = "You have entered incorrect security code! Please try again.";
                  } else {
                    $message = "Your have entered correct security code.";
                  }
                } else {
                  $message = "Enter security code.";
                }
                ?>
                <div>
                  <label> am not robot :</label>
                  <div class="row">
                    <div class="col">
                      <img src="./View/Captcha.php" />
                    </div>
                    <div class="col">
                      <input name="captcha_code" type="text" class="demo-input form-control captcha-input" placeholder="Enter Code" required />
                    </div>
                  </div>
                  <div style="margin-top: 10px;">
                    <button type="submit" class="btn btn-outline-secondary" name="login">
                      Log In
                    </button>

                  </div>
                </div>
                If you don't have accout <a href="insecription.php" tite="Logout">Sign In here</a>.
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>