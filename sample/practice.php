<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}



//READ//
$firstname = $familyname = $middlename = $gender  = $purpose = $birthdate  = $civilstatus = "";

require_once "config.php";

$sql = "SELECT * FROM login WHERE id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_SESSION["id"]);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$id = $_SESSION["id"];

$familyname = $row["lastName"];
$firstname = $row["firstName"];
$middlename = $row["middleName"];
$gender = $row["sex"];
$purpose = $row["purpose"];
$birthdate =  $row["birthDate"];
$civilstatus = $row["civilStatus"];

// END READ //

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




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
    function barangayclear() {
        location.href = "barangayClearance.php";
    }
    </script>

</head>

<body style="background-image: url('189581.png');">
    <div class="signup-form">
        <form name="regform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Welcome!</h2>
            <p>These are your information:</p>
            <hr />
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"></i></span>
                    <input type="text" class="form-control" pattern="[A-Za-z]+" name="familyname"
                        placeholder="Family Name" value="<?= $familyname ?>" disabled />
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"></i></span>
                    <input type="text" class="form-control" pattern="[A-Za-z]+" name="firstname"
                        placeholder="First Name" value="<?= $firstname ?>" disabled />
                </div>
            </div>


            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input type="email" class="form-control" name="middlename" placeholder="Middle Name"
                        value="<?= $middlename ?>" disabled />
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input type="numbers" class="form-control" name="gender" placeholder="Gender" value="<?= $gender ?>"
                        disabled />
                </div>
                <p>
                </p>
            </div>




            <span class="input-group-addon"></span>
            <input type="date" id="birthday" name="birthdate" max="2003,12,31" value="<?= $birthdate ?>" disabled>


            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input type="numbers" class="form-control" name="civilstatus" placeholder="Civil Status"
                        value="<?= $civilstatus ?>" disabled />
                </div>
                <p>
                </p>
            </div>


            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="fa fa-check"></i>
                    </span>
                    <input type="tel" class="form-control" name="purpose" placeholder="Purpose"
                        value="<?= $purpose ?>" />
                </div>
            </div>





            <div class="form-group" style="margin-left: 15px;">
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                            data-target="#exampleModalCenter2">
                            Generate Report
                        </button>

                        <!-- Modal -->
                        <div class=" modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title " id="exampleModalLongTitle">Update</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Barangay Clearance Successfully created
                                    </div>
                                    <div class="modal-footer">


                                        <button type="button" onclick="barangayclear()"
                                            class="btn btn-primary">OKAY</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>


                    <div class="col" style="float: right; margin-top: -40px; margin-right: 15px;">
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                            data-target="#exampleModalCenter1">
                            Delete
                        </button>

                        <!-- Modal -->
                        <div class=" modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title " id="exampleModalLongTitle">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete your account?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" onclick="delete1()" class="btn btn-primary">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>





                </div>
            </div>



        </form>

    </div>
</body>

</html>