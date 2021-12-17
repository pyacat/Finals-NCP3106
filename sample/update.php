<?php
// Include config file
require_once "config.php";

$lastname = $firstname = $middlename = $alias = $purok = $gender = $civilstatus = $birthdate = $dateofregistration = $birthplace = $contactnumber = $emailaddress = $voterstatus = $religion = $occupation = $nationality = "";
$lastname_err = $firstname_err = $middlename_err = $alias_err = $purok_err = $gender_err = $civilstatus_err = $birthdate_err = $dateofregistration_err = $birthplace_err = $contactnumber_err = $emailaddress_err = $voterstatus_err = $religion_err = $occupation_err = $nationality_err =  "";

// Include config file
require_once "config.php";

if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];

    //Validate first name
    $input_firstname = trim($_POST["firstname"]);
    if (empty($input_firstname)) {
        $input_firstname_err = "Please enter a name.";
    } elseif (!filter_var($input_firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $input_firstname_err = "Please enter a valid name.";
    } else {
        $firstname = $input_firstname;
    }

    //Validate last name
    $input_lastname = trim($_POST["lastname"]);
    if (empty($input_lastname)) {
        $lastname_err = "Please enter a name.";
    } elseif (!filter_var($input_lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $lastname_err = "Please enter a valid name.";
    } else {
        $lastname = $input_lastname;
    }
    //Validate middle name
    $input_middlename = trim($_POST["middlename"]);
    if (empty($input_middlename)) {
        $middlename_err = "Please enter a name.";
    } elseif (!filter_var($input_middlename, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $middlename_err = "Please enter a valid name.";
    } else {
        $middlename = $input_middlename;
    }

    //Validate middle name
    $input_alias = trim($_POST["alias"]);
    if (empty($input_alias)) {
        $alias_err = "Please enter a name.";
    } elseif (!filter_var($input_alias, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $alias_err = "Please enter a valid name.";
    } else {
        $alias = $input_alias;
    }

    $input_birthplace = trim($_POST["birthplace"]);
    if (empty($input_birthplace)) {
        $birthplace_err = "Please enter a name.";
    } else {
        $birthplace = $input_birthplace;
    }

    $input_nationality = trim($_POST["nationality"]);
    if (empty($input_nationality)) {
        $nationality_err = "Please enter a name.";
    } else {
        $nationality = $input_nationality;
    }

    $input_religion = trim($_POST["religion"]);
    if (empty($input_religion)) {
        $religion_err = "Please enter a name.";
    } else {
        $religion = $input_religion;
    }
    $input_occupation = trim($_POST["occupation"]);
    if (empty($input_occupation)) {
        $occupation_err = "Please enter a name.";
    } else {
        $occupation = $input_occupation;
    }

    $input_emailaddress = trim($_POST["emailaddress"]);
    if (empty($input_emailaddress)) {
        $emailaddress_err = "Please enter a name.";
    } else {
        $emailaddress = $input_emailaddress;
    }
    //Validate contact
    $input_contactnumber = trim($_POST["contactnumber"]);
    if (empty($input_contactnumber)) {
        $contactnumber_err = "Please enter a contact number.";
    } elseif (!filter_var($input_contactnumber, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/[0-9]/"))) || (strlen(trim($_POST["contactnumber"])) != 11)) {
        $contactnumber_err = "Please enter a valid contact number.";
    } elseif (!filter_var($input_contactnumber, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^(09)\d{9}$/")))) {
        $contactnumber_err = "The contact number should start with 09 follow by 9 digits.";
    } else {
        $contactnumber = $input_contactnumber;
    }
    // Validate purok
    $input_purok = trim($_POST["purok"]);
    $purok = $input_purok;

    // Validate gender
    $input_gender = trim($_POST["gender"]);
    $gender = $input_gender;
    // Validate purok
    $input_civilstatus = trim($_POST["civilstatus"]);
    $civilstatus = $input_civilstatus;
    // Validate purok
    $input_voterstatus = trim($_POST["voterstatus"]);
    $voterstatus = $input_voterstatus;
    // Validate Date
    $input_birthdate = trim($_POST["birthdate"]);
    if (empty($input_birthdate)) {
        $birthdate_err = "Please fill your birthdate.";
    } else {
        $birthdate = $input_birthdate;
    }

    // Validate Date
    $input_dateofregistration = trim($_POST["dateofregistration"]);
    if (empty($input_dateofregistration)) {
        $dateofregistration_err = "Please fill your date of registration.";
    } else {
        $dateofregistration = $input_dateofregistration;
    }



    if (empty($lastname_err) && empty($firstname_err) && empty($middlename_err) && empty($alias_err) && empty($purok_err) && empty($gender_err) && empty($civilstatus_err) && empty($birthdate_err) && empty($dateofregistration_err) && empty($birthplace_err) && empty($contactnumber_err) && empty($emailaddress_err) && empty($voterstatus_err) && empty($nationality_err) && empty($occupation_err) && empty($religion_err)) {
        $updateSql = "UPDATE barangay SET lastname=?, firstname=?, middlename=?, alias=?,purok=?, gender=?, civilstatus=?, birthdate=?, dateofregistration=?, birthplace=?, contactnumber=?, emailaddress=?, voterstatus=?, nationality=?, occupation=?, religion=? WHERE id=?";

        if ($updateStmt = $mysqli->prepare($updateSql)) {
            $updateStmt->bind_param("ssssssssssssssssi", $param_lastname, $param_firstname, $param_middlename, $param_alias, $param_purok, $param_gender, $param_civilstatus, $param_birthdate, $param_dateofregistration, $param_birthplace, $param_contactnumber, $param_emailaddress, $param_voterstatus, $param_nationality, $param_occupation, $param_religion, $param_id);

            $param_lastname = $lastname;
            $param_firstname = $firstname;
            $param_middlename = $middlename;
            $param_alias = $alias;
            $param_purok = $purok;
            $param_gender = $gender;
            $param_civilstatus = $civilstatus;
            $param_birthdate = $birthdate;
            $param_dateofregistration = $dateofregistration;
            $param_birthplace = $birthplace;
            $param_contactnumber = $contactnumber;
            $param_emailaddress = $emailaddress;
            $param_voterstatus = $voterstatus;
            $param_nationality = $nationality;
            $param_occupation = $occupation;
            $param_religion = $religion;
            $param_id = $id;
            if ($updateStmt->execute()) {
                header("location: resident.php");
            } else {
                header("location: update.php");
            }
        }

        $updateStmt->close();


        $mysqli->close();
    }
} else {
    if (isset($_GET["update"]) && !empty(trim($_GET["update"]))) {
        $sql = "SELECT * FROM barangay WHERE id = ?";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $_GET["update"]);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $id = $_GET["update"];

        // Retrieve indeividual fild value

        $lastname = $row["lastname"];
        $firstname = $row["firstname"];
        $middlename = $row["middlename"];
        $alias = $row["alias"];
        $purok = $row["purok"];
        $gender = $row["gender"];
        $civilstatus = $row["civilstatus"];
        $birthdate = $row["birthdate"];
        $dateofregistration = $row["dateofregistration"];
        $birthplace = $row["birthplace"];
        $contactnumber = $row["contactnumber"];
        $emailaddress = $row["emailaddress"];
        $voterstatus = $row["voterstatus"];
        $nationality = $row["nationality"];
        $religion = $row["religion"];
        $occupation = $row["occupation"];
    }
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
        <form name="RegForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">


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
                        <input type="text" name="lastname" class="form-control <?= (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastname ?>">
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
                                <input type="text" name="birthplace" class="form-control <?= (!empty($birthplace_err)) ? 'is-invalid' : ''; ?>" value="<?= $birthplace ?>">
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
                                <input type="text" name="contactnumber" class="form-control <?= (!empty($contactnumber_err)) ? 'is-invalid' : ''; ?>" placeholder="Contact number" value="<?= $contactnumber ?>">
                            </div>
                        </div>
                        <div class="form-group" style="float: left;margin-left: .5cm; margin-top: -.5cm; width: 11.6cm;">
                            <div class="input-group" style="margin-left:9cm;margin-top:10px; float:left; ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="fa fa-envelope"></span>
                                    </span>
                                </div>
                                <input type="text" name="emailaddress" class="form-control <?= (!empty($emailaddress_err)) ? 'is-invalid' : ''; ?>" placeholder="emailaddress" value="<?= $emailaddress ?>">
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
                            <input type="text" name="firstname" class="form-control <?= (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" placeholder="First Name" value="<?= $firstname ?>">
                        </div>
                    </div>
                    <div class="form-group" style=" margin-top: -.30cm;">
                        <div class=" input-group margintop1" style="width: 9cm;">
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    <span class="fa fa-user"></span>
                                </span>
                            </div>
                            <input type="text" name="middlename" class="form-control <?= (!empty($middlename_err)) ? 'is-invalid' : ''; ?>" placeholder="Middle name" value="<?= $middlename ?>">
                        </div>
                    </div>
                    <div class="form-group" style=" margin-top: -.3cm;">
                        <div class=" input-group margintop1" style="width:9cm;">
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    <span class="fa fa-user-circle"></span>
                                </span>
                            </div>
                            <input type="text" name="alias" class="form-control <?= (!empty($alias_err)) ? 'is-invalid' : ''; ?>" placeholder="Alias" value="<?= $alias ?>">
                        </div>
                    </div>
                    <div class="row" style="float: left; margin-top: -.3cm;">
                        <div class="col-sm-1">
                            <select class="form-control <?= (!empty($purok_err)) ? 'is-invalid' : ''; ?>" name="purok" style="width: 4.4cm;">
                                <option <?php if ($purok == 1) echo "selected" ?>>Purok 1</option>
                                <option <?php if ($purok == 2) echo "selected" ?>>Purok 2</option>
                                <option <?php if ($purok == 3) echo "selected" ?>>Purok 3</option>
                                <option <?php if ($purok == 4) echo "selected" ?>>Purok 4</option>
                                <option <?php if ($purok == 5) echo "selected" ?>>Purok 5</option>
                                <option <?php if ($purok == 6) echo "selected" ?>>Purok 6</option>
                                <option <?php if ($purok == 7) echo "selected" ?>>Purok 7</option>

                            </select>
                        </div>
                    </div>
                    <div class="row" style="float: left; margin-top: -1.05cm; margin-left:4.2cm;">
                        <div class="col-sm-1">
                            <select class="form-control <?= (!empty($gender_err)) ? 'is-invalid' : ''; ?>" name="gender" style="width: 4.4cm;">
                                <option <?php if ($gender == 1) echo "selected" ?>>Male</option>
                                <option <?php if ($gender == 2) echo "selected" ?>>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="float: left; margin-top: 10px;">
                        <select class="form-control <?= (!empty($civilstatus_err)) ? 'is-invalid' : ''; ?>" name="civilstatus" style="width: 4.4cm;">
                            <option <?php if ($civilstatus == 1) echo "selected" ?>>Single</option>
                            <option <?php if ($civilstatus == 2) echo "selected" ?>>Married</option>
                            <option <?php if ($civilstatus == 3) echo "selected" ?>>Separated</option>
                            <option <?php if ($civilstatus == 4) echo "selected" ?>>Widowed</option>
                        </select>
                    </div>
                    <div class="form-group" style="float: right; margin-top: 10px;">
                        <select class="form-control <?= (!empty($voterstatus_err)) ? 'is-invalid' : ''; ?>" name="voterstatus" style="width: 4.4cm;">
                            <option <?php if ($voterstatus == 1) echo "selected" ?>>Yes</option>
                            <option <?php if ($voterstatus == 2) echo "selected" ?>>No</option>
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
                            <input type="date" class="form-control <?= (!empty($birthdate_err)) ? 'is-invalid' : ''; ?>" value="<?= $birthdate ?>" name="birthdate">
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
                                <input type="date" class="form-control <?= (!empty($dateofregistration_err)) ? 'is-invalid' : ''; ?>" value="<?= $dateofregistration ?>" name="dateofregistration">
                            </div>
                            <div class="input-group margintop1" style="width: 10.2cm; float:left; margin-top: -6.3cm; margin-left:9.5cm;">
                                <div class=" input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="fa fa-building"></span>
                                    </span>
                                </div>
                                <input type="text" name="occupation" class="form-control <?= (!empty($occupation_err)) ? 'is-invalid' : ''; ?>" placeholder="occupation" value="<?= $occupation ?>">

                                <div class="input-group margintop1" style="width: 10.2cm; float:left;">
                                    <div class=" input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="fa fa-flag"></span>
                                        </span>
                                    </div>
                                    <input type="text" name="nationality" class="form-control <?= (!empty($nationality_err)) ? 'is-invalid' : ''; ?>" placeholder="Nationality" value="<?= $nationality ?>">
                                </div>
                                <div class="input-group margintop1" style="width: 10.2cm; float:left;">
                                    <div class=" input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="fa fa-globe"></span>
                                        </span>
                                    </div>
                                    <input type="text" name="religion" class="form-control <?= (!empty($religion_err)) ? 'is-invalid' : ''; ?>" placeholder="Religion" value="<?= $religion ?>">
                                </div>
                            </div>


                            <input type="hidden" name="id" value="<?php echo $id; ?>" />
                            <div class="form-group text-center" style="margin-left: 10.5cm; margin-top:-42px;">
                                <button type="submit" class="btn btn-primary btn-lg">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>

</html>