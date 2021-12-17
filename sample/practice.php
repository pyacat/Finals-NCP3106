<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}



//READ//

$firstname = $familyname = $middlename = $gender  = $purpose = $birthdate  = $civilstatus =  "";
$purpose_err = "";
require_once "config.php";



$sql = "SELECT * FROM barangay WHERE id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$id = $_GET["id"];

$familyname = $row["lastname"];
$firstname = $row["firstname"];
$middlename = $row["middlename"];
$gender = $row["gender"];
$purpose = $row["purpose"];
$birthdate =  $row["birthdate"];
$civilstatus = $row["civilstatus"];

// END READ //

// PURPOSE

if (isset($_POST["id"]) && !empty($_POST["id"])) {

    $purpose = trim($_POST["id"]);
    $id = $_POST["id"];

    $input_purpose = trim($_POST["purpose"]);
    if (empty($input_purpose)) {
        $purpose_err = "Please enter a name.";
    } else {
        $purpose = $input_purpose;
    }
    if (empty($purpose_err)) {

        $updateSql = "UPDATE barangay SET purpose=? WHERE id=?";
        if ($updateStmt = $mysqli->prepare($updateSql)) {
            $updateStmt->bind_param("si", $param_purpose, $param_id);
            $param_purpose = $purpose;
            $param_id = $id;

            if ($updateStmt->execute()) {
                header("location: barangayClearance.php");
            } else {
                header("location: practice.php");
            }
        }
        $updateStmt->close();
    }
    $mysqli->close();
}
// END PURPOSE

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" />
    <title>Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="regform.css" />
    <script>
        function residency() {
            location.href = "certificateOfResidency.php";
        }
    </script>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>

<body style="background-image: url('189581.png');">
    <div class="signup-form">
        <form name="regform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Certificate Issuance</h2>
            <p>These are your information:</p>
            <hr />
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"></i></span>
                    <input type="text" class="form-control" pattern="[A-Za-z]+" name="familyname" placeholder="Family Name" value="<?= $familyname ?>" disabled />
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"></i></span>
                    <input type="text" class="form-control" pattern="[A-Za-z]+" name="firstname" placeholder="First Name" value="<?= $firstname ?>" disabled />
                </div>
            </div>


            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input type="email" class="form-control" name="middlename" placeholder="Middle Name" value="<?= $middlename ?>" disabled />
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input type="numbers" class="form-control" name="gender" placeholder="Gender" value="<?= $gender ?>" disabled />
                </div>
                <p>
                </p>
            </div>




            <span class="input-group-addon"></span>
            <input type="date" id="birthday" name="birthdate" max="2003,12,31" value="<?= $birthdate ?>" disabled>


            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input type="numbers" class="form-control" name="civilstatus" placeholder="Civil Status" value="<?= $civilstatus ?>" disabled />
                </div>
                <p>
                </p>
            </div>


            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-check"></i>
                    </span>
                    <input type="text" class="form-control" name="purpose" placeholder="Purpose" value="<?= $purpose ?>" />
                </div>
            </div>





            <div class=" form-group" style="margin-left: 15px;">
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModalCenter2">
                            Clearance
                        </button>


                    </div>

                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <div class="col" style="float: right; margin-top: -40px; margin-right: 15px;">
                        <button type="button" onclick="residency()" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModalCenter1">
                            Residency
                        </button>




                    </div>





                </div>
            </div>



        </form>

    </div>
</body>

</html>