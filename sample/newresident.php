<?php
// Include config file
require_once "config.php";

$lastname = $firstname = $middlename = $alias = $purok = $gender = $civilstatus = $birthdate = $dateofregistration = $birthplace = $contactnumber = $emailaddress = $voterstatus = $religion = $occupation = $nationality = "";
$lastname_err = $firstname_err = $middlename_err = $alias_err = $purok_err = $gender_err = $civilstatus_err = $birthdate_err = $dateofregistration_err = $birthplace_err = $contactnumber_err = $emailaddress_err = $voterstatus_err = $religion_err = $occupation_err = $nationality_err =  "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Validate first name
    $firstname = trim($_POST["firstname"]);
    if (empty($firstname)) {
        $firstname_err = "Please enter a name.";
    } elseif (!filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $firstname_err = "Please enter a valid name.";
    }

    //Validate last name
    $lastname = trim($_POST["lastname"]);
    if (empty($lastname)) {
        $lastname_err = "Please enter a name.";
    } elseif (!filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $lastname_err = "Please enter a valid name.";
    }
    //Validate middle name
    $middlename = trim($_POST["middlename"]);
    if (empty($middlename)) {
        $middlename_err = "Please enter a name.";
    } elseif (!filter_var($middlename, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $middlename_err = "Please enter a valid name.";
    }

    //Validate middle name
    $alias = trim($_POST["alias"]);
    if (empty($alias)) {
        $alias_err = "Please enter a name.";
    } elseif (!filter_var($alias, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $alias_err = "Please enter a valid name.";
    }
    $birthplace = trim($_POST["birthplace"]);
    if (empty($birthplace)) {
        $birthplace_err = "Please enter a name.";
    }
    $nationality = trim($_POST["nationality"]);
    if (empty($nationality)) {
        $nationality_err = "Please enter a name.";
    }
    $religion = trim($_POST["religion"]);
    if (empty($religion)) {
        $religion_err = "Please enter a name.";
    }
    $occupation = trim($_POST["occupation"]);
    if (empty($occupation)) {
        $occupation_err = "Please enter a name.";
    }
    $emailaddress = trim($_POST["emailaddress"]);
    if (empty($emailaddress)) {
        $emailaddress_err = "Please enter a name.";
    }
    //Validate contact
    $contactnumber = trim($_POST["contactnumber"]);
    if (empty($contactnumber)) {
        $contactnumber_err = "Please enter a contact number.";
    } elseif (!filter_var($contactnumber, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[0-9]/"))) || (strlen(trim($_POST["contactnumber"])) != 11)) {
        $contactnumber_err = "Please enter a valid contact number.";
    } elseif (!filter_var($contactnumber, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^(09)\d{9}$/")))) {
        $contactnumber_err = "The contact number should start with 09 follow by 9 digits.";
    }
    // Validate purok
    $purok = trim($_POST["purok"]);
    if ($purok = 0 || empty($purok)) {
        $purok_err = "Please select a purok.";
    }
    // Validate gender
    $gender = trim($_POST["gender"]);
    if ($gender = 0 || empty($gender)) {
        $gender_err = "Please select a gender.";
    }
    // Validate purok
    $civilstatus = trim($_POST["civilstatus"]);
    if ($civilstatus = 0 || empty($civilstatus)) {
        $civilstatus_err = "Please select a civilstatus.";
    }
    // Validate purok
    $voterstatus = trim($_POST["voterstatus"]);
    if ($voterstatus = 0 || empty($voterstatus)) {
        $voterstatus_err = "Please select a voter status.";
    }
    // Validate Date
    $birthdate = trim($_POST["birthdate"]);
    if (empty($birthdate)) {
        $birthdate_err = "Please fill your birthdate.";
    }
    // Validate Date
    $dateofregistration = trim($_POST["dateofregistration"]);
    if (empty($dateofregistration)) {
        $dateofregistration_err = "Please fill your date of registration.";
    }


    if (empty($firstname_err) && empty($lastname_err) && empty($middlename_err) && empty($alias_err) && empty($purok_err) && empty($gender_err) && empty($civilstatus_err) && empty($birthdate_err) && empty($dateofregistration_err) && empty($birthplace_err) && empty($contactnumber_err) && empty($emailaddress_err) && empty($voterstatus_err) && empty($nationality_err) && empty($occupation_err) && empty($religion_err)) {
        $sql = "INSERT INTO barangay
        (lastname,firstname,middlename,alias,purok,gender,civilstatus,birthdate,dateofregistration,birthplace,contactnumber,emailaddress,voterstatus,nationality,occupation,religion) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ssssssssssssssss", $param_lastname, $param_firstname, $param_middlename, $param_alias, $param_purok, $param_gender, $param_civilstatus, $param_birthdate, $param_dateofregistration, $param_birthplace, $param_contactnumber, $param_emailaddress, $param_voterstatus, $param_nationality, $param_occupation, $param_religion);

            // Set parameters
            $param_lastname = trim($_POST["firstname"]);
            $param_firstname = trim($_POST["lastname"]);
            $param_middlename = trim($_POST["middlename"]);
            $param_alias = trim($_POST["alias"]);
            $param_purok = trim($_POST["purok"]);
            $param_gender = trim($_POST["gender"]);
            $param_civilstatus = trim($_POST["civilstatus"]);
            $param_birthdate = date("Y-m-d", strtotime($birthdate));
            $param_dateofregistration = date("Y-m-d", strtotime($dateofregistration));
            $param_birthplace = trim($_POST["birthplace"]);
            $param_contactnumber = trim($_POST["contactnumber"]);
            $param_emailaddress = trim($_POST["emailaddress"]);
            $param_voterstatus = trim($_POST["voterstatus"]);
            $param_nationality = trim($_POST["nationality"]);
            $param_religion = trim($_POST["religion"]);
            $param_occupation = trim($_POST["occupation"]);




            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location:resident.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }  // Close statement
            $stmt->close();
        }
    }


    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="project3form.css">

</head>

<body>
    <div class="container">
        <div class="navigation2">
            <ul>
                <a>
                    <span><img class="photo2" src="map.png" /></span>
                </a>
                <li>
                    <a href="Dashboard.html">
                        <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="resident.php">
                        <span class="icon"><i class="fa fa-address-book-o" aria-hidden="true"></i></span>
                        <span class="title">Resident Information</span>
                    </a>
                </li>
                <li>
                    <a href="BlotterRecord.html">
                        <span class="icon"><i class="fa fa-folder" aria-hidden="true"></i></span>
                        <span class="title">Blotter Records</span>
                    </a>
                </li>
                <li>
                    <a href="SettlementSched.html">
                        <span class="icon"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                        <span class="title">Settlement Schedules</span>
                    </a>
                </li>
                <li>
                    <a href="CertificateIssu.html">
                        <span class="icon"><i class="fa fa-certificate" aria-hidden="true"></i></span>
                        <span class="title">Certificate Issuance</span>
                    </a>
                </li>
                <li>
                    <a href="Accounts.php">
                        <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <span class="title">Accounts</span>
                    </a>
                </li>
                <li>
                    <a href="BarangayConfig.html">
                        <span class="icon"><i class="fa fa-cogs" aria-hidden="true"></i></span>
                        <span class="title">Barangay Config</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="signup-form" style="height: 100cm;">
        <form name="RegForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return checkValidates()" method="post">


            <div style="float: left; margin-top:-25px;">
                <div class="head">New Resident Information</div>
                <h6>Barangay Moonwalk</h6>
                <hr style="width:250%; height:1px;color:gray;background-color:#ffffff">
                <div class="form-group floatleft" style="margin-top: .5cm; width: 9cm;">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <span class="fa fa-user"></span>
                            </span>
                        </div>
                        <input type="text" name="lastname" class="form-control <?= (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" placeholder="Last Name" value="<?= $lastname; ?>">
                        <div class="form-group" style="margin-left:9.5cm;margin-top: -1.79cm; float:right; ">
                            <div style="color: #ffdbac;">
                                <h6>Birthplace</h6>
                            </div>
                            <div class="input-group margintop1" style="width: 10.2cm;">
                                <div class=" input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="fa fa-globe"></span>
                                    </span>
                                </div>
                                <input type="text" name="birthplace" class="form-control <?= (!empty($birthplace_err)) ? 'is-invalid' : ''; ?>" placeholder="Birth place" value="<?= $birthplace; ?>">
                            </div>

                            <div style="color: #ffdbac;margin-top:10px;">
                                <h4>Contact Details:</h4>
                            </div>
                        </div>
                        <div class="form-group" style="float: left;margin-left: .5cm; margin-top: -.9cm; width: 11.6cm;">
                            <div class="input-group" style="margin-left:9cm;margin-top:10px; float:left; ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="fa fa-hashtag"></span>
                                    </span>
                                </div>
                                <input type="text" name="contactnumber" class="form-control <?= (!empty($contactnumber_err)) ? 'is-invalid' : ''; ?>" placeholder="Contact number" value="<?= $contactnumber; ?>">
                            </div>
                        </div>
                        <div class="form-group" style="float: left;margin-left: .5cm; margin-top: -.5cm; width: 11.6cm;">
                            <div class="input-group" style="margin-left:9cm;margin-top:10px; float:left; ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="fa fa-envelope"></span>
                                    </span>
                                </div>
                                <input type="text" name="emailaddress" class="form-control <?= (!empty($emailaddress_err)) ? 'is-invalid' : ''; ?>" placeholder="emailaddress" value="<?= $emailaddress; ?>">
                            </div>
                        </div>
                    </div>
                    <div class=" form-group">
                        <div class=" input-group margintop1" style="width: 9cm; margin-top:-3.70cm;">
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    <span class="fa fa-user"></span>
                                </span>
                            </div>
                            <input type="text" name="firstname" class="form-control <?= (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" placeholder="First Name" value="<?= $firstname; ?>">
                        </div>
                    </div>
                    <div class="form-group" style=" margin-top: -.30cm;">
                        <div class=" input-group margintop1" style="width: 9cm;">
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    <span class="fa fa-user"></span>
                                </span>
                            </div>
                            <input type="text" name="middlename" class="form-control <?= (!empty($middlename_err)) ? 'is-invalid' : ''; ?>" placeholder="Middle name" value="<?= $middlename; ?>">
                        </div>
                    </div>
                    <div class="form-group" style=" margin-top: -.3cm;">
                        <div class=" input-group margintop1" style="width:9cm;">
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    <span class="fa fa-user-circle"></span>
                                </span>
                            </div>
                            <input type="text" name="alias" class="form-control <?= (!empty($alias_err)) ? 'is-invalid' : ''; ?>" placeholder="Alias" value="<?= $alias; ?>">
                        </div>
                    </div>
                    <div class="row" style="float: left; margin-top: -.3cm;">
                        <div class="col-sm-1">
                            <select class="form-control <?= (!empty($purok_err)) ? 'is-invalid' : ''; ?>" value="<?= $purok; ?>" name="purok" style="width: 4.4cm;">
                                <option value="0">Purok</option>
                                <option>Purok 1</option>
                                <option>Purok 2</option>
                                <option>Purok 3</option>
                                <option>Purok 4</option>
                                <option>Purok 5</option>
                                <option>Purok 6</option>
                                <option>Purok 7</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="float: left; margin-top: -1.05cm; margin-left:4.2cm;">
                        <div class="col-sm-1">
                            <select class="form-control <?= (!empty($gender_err)) ? 'is-invalid' : ''; ?>" value="<?= $gender; ?>" name="gender" style="width: 4.4cm;">
                                <option value="0">Gender</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="float: left; margin-top: 10px;">
                        <select class="form-control <?= (!empty($civilstatus_err)) ? 'is-invalid' : ''; ?>" value="<?= $civilstatus; ?>" name="civilstatus" style="width: 4.4cm;">
                            <option value="0">Civil Status</option>
                            <option>Single</option>
                            <option>Married</option>
                            <option>Separated</option>
                            <option>Widowed</option>
                        </select>
                    </div>
                    <div class="form-group" style="float: right; margin-top: 10px;">
                        <select class="form-control <?= (!empty($voterstatus_err)) ? 'is-invalid' : ''; ?>" value="<?= $voterstatus; ?>" name="voterstatus" style="width: 4.4cm;">
                            <option value="0">Voter Status</option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                    </div>
                    <div class="form-group floatleft" style=" margin-top: -.25cm; width: 9cm;">
                        <div style="color: #ffdbac ;">
                            <h6>Birthdate</h6>
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <span class="fa fa-calendar"></span>
                                </span>
                            </div>
                            <input type="date" class="form-control <?= (!empty($birthdate_err)) ? 'is-invalid' : ''; ?>" value="<?= $birthdate; ?>" name="birthdate">
                        </div>
                        <div class="form-group floatleft" style=" margin-top: 10px; width: 9cm;">
                            <div style="color: #ffdbac ;">
                                <h6>Date of Registration</h6>
                            </div>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                                <input type="date" class="form-control <?= (!empty($dateofregistration_err)) ? 'is-invalid' : ''; ?>" value="<?= $dateofregistration; ?>" name="dateofregistration">
                            </div>
                            <div class="input-group margintop1" style="width: 10.2cm; float:left; margin-top: -6.3cm; margin-left:9.5cm;">
                                <div class=" input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="fa fa-building"></span>
                                    </span>
                                </div>
                                <input type="text" name="occupation" class="form-control <?= (!empty($occupation_err)) ? 'is-invalid' : ''; ?>" placeholder="occupation" value="<?= $occupation; ?>">

                                <div class="input-group margintop1" style="width: 10.2cm; float:left;">
                                    <div class=" input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="fa fa-flag"></span>
                                        </span>
                                    </div>
                                    <input type="text" name="nationality" class="form-control <?= (!empty($nationality_err)) ? 'is-invalid' : ''; ?>" placeholder="Nationality" value="<?= $nationality; ?>">
                                </div>
                                <div class="input-group margintop1" style="width: 10.2cm; float:left;">
                                    <div class=" input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="fa fa-globe"></span>
                                        </span>
                                    </div>
                                    <input type="text" name="religion" class="form-control <?= (!empty($religion_err)) ? 'is-invalid' : ''; ?>" placeholder="Religion" value="<?= $religion; ?>">
                                </div>
                            </div>




                            <div class="form-group text-center" style="margin-left: 10.5cm; margin-top:-42px;">
                                <button type="submit" class="btn btn-primary btn-lg">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>