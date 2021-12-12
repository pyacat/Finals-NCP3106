<?php
session_start();

require_once "config.php";

$username = $password = "";
$username_err = $password_err = $login_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $username = trim($_POST["username"]);

  if (empty($username)) {
    $username_err = "Please enter your username.";
  }

  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  }

  if (empty($username_err) && empty($password_err)) {

    $sql = "SELECT id, username, password FROM login WHERE username = ?";

    if ($stmt = $mysqli->prepare($sql)) {
      $stmt->bind_param("s", $param_username);
      $param_username = $username;


      if ($stmt->execute()) {

        $stmt->store_result();


        if ($stmt->num_rows == 1) {
          $stmt->bind_result($id, $username, $hashed_password);

          if ($stmt->fetch()) {
            if (password_verify($_POST['password'], $hashed_password)) {

              session_start();

              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;

              header("location: practice.php");
            } else {
              $login_err = "Invalid username or password.";
            }
          }
        } else {
          $login_err = "Invalid username or password.";
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }

      $stmt->close();
    }
  }

  $mysqli->close();
}
?>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin Panel Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" />

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" />
    <link rel="stylesheet" href="login.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <span><img class="photo" src="map.png" /></span>
                </div>
                <div class="col-lg-12 login-title">ADMIN PANEL</div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <?php
              if (!empty($login_err)) {
                echo '<div class="alert alert-danger">' . $login_err . '</div>';
              }
              ?>

                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input name="username" type="text"
                                    class="form-control <?= (!empty($username_err)) ? 'is-invalid' : ''; ?>">
                                <span class="invalid-feedback"><?= $username_err; ?></span>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input name="password" type="password"
                                    class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" />
                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text"></div>
                                <div class="col-lg-6 login-btm login-button">

                                    <button type="submit" class="btn btn-outline-primary">
                                        LOGIN
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>