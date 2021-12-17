<?php
$lastname = $firstname = $middlename = $alias = $purok = $gender = $civilstatus = $birthdate = $dateofregistration = $birthplace = $contactnumber = $emailaddress = $voterstatus = $religion = $occupation = $nationality = "";

// Include config file
require_once "config.php";
if (isset($_GET["read"]) && !empty(trim($_GET["read"]))) {
    $sql = "SELECT * FROM barangay WHERE id = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $_GET["read"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $id = $_GET["read"];

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
// Prepare a select statement

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
        <form name="RegForm" action="resident.php" onsubmit="" method="post">


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
                        <input type="text" name="lastname" class="form-control" placeholder="" value="<?= $lastname ?>" readonly>
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
                                <input type="text" name="birthplace" class="form-control" placeholder="Birth place" value="<?= $birthplace; ?>" readonly>
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
                                <input type="text" name="contactnumber" class="form-control" placeholder="Contact number" value="<?php echo $contactnumber; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group" style="float: left;margin-left: .5cm; margin-top: -.5cm; width: 11.6cm;">
                            <div class="input-group" style="margin-left:9cm;margin-top:10px; float:left; ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="fa fa-envelope"></span>
                                    </span>
                                </div>
                                <input type="text" name="emailaddress" class="form-control" placeholder="emailaddress" value="<?= $emailaddress; ?>" readonly>
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
                            <input type="text" name="firstname" class="form-control" placeholder="First Name" value="<?= $firstname; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group" style=" margin-top: -.30cm;">
                        <div class=" input-group margintop1" style="width: 9cm;">
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    <span class="fa fa-user"></span>
                                </span>
                            </div>
                            <input type="text" name="middlename" class="form-control " placeholder="Middle name" value="<?= $middlename; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group" style=" margin-top: -.3cm;">
                        <div class=" input-group margintop1" style="width:9cm;">
                            <div class=" input-group-prepend">
                                <span class="input-group-text">
                                    <span class="fa fa-user-circle"></span>
                                </span>
                            </div>
                            <input type="text" name="alias" class="form-control " placeholder="Alias" value="<?= $alias; ?>" readonly>
                        </div>
                    </div>
                    <div class="row" style="float: left; margin-top: -.3cm;">
                        <div class="col-sm-1">
                            <select class="form-control " name="purok" style="width: 4.4cm;" disabled>

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
                            <select class="form-control " name="gender" style="width: 4.4cm;" disabled>

                                <option <?php if ($gender == 1) echo "selected" ?>>Male</option>
                                <option <?php if ($gender == 2) echo "selected" ?>>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="float: left; margin-top: 10px;">
                        <select class="form-control " name="civilstatus" style="width: 4.4cm;" disabled>
                            <option <?php if ($civilstatus == 1) echo "selected" ?>>Single</option>
                            <option <?php if ($civilstatus == 2) echo "selected" ?>>Married</option>
                            <option <?php if ($civilstatus == 3) echo "selected" ?>>Separated</option>
                            <option <?php if ($civilstatus == 4) echo "selected" ?>>Widowed</option>
                        </select>
                    </div>
                    <div class="form-group" style="float: right; margin-top: 10px;">
                        <select class="form-control " name="voterstatus" style="width: 4.4cm;" disabled>
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
                            <input type="date" class="form-control " value="<?= $birthdate; ?>" name="birthdate" disabled>
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
                                <input type="date" class="form-control " value="<?= $dateofregistration; ?>" name="dateofregistration" disabled>
                            </div>
                            <div class="input-group margintop1" style="width: 10.2cm; float:left; margin-top: -6.3cm; margin-left:9.5cm;">
                                <div class=" input-group-prepend">
                                    <span class="input-group-text">
                                        <span class="fa fa-building"></span>
                                    </span>
                                </div>
                                <input type="text" name="occupation" class="form-control " placeholder="occupation" value="<?= $occupation; ?>" readonly>

                                <div class="input-group margintop1" style="width: 10.2cm; float:left;">
                                    <div class=" input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="fa fa-flag"></span>
                                        </span>
                                    </div>
                                    <input type="text" name="nationality" class="form-control " placeholder="Nationality" value="<?= $nationality; ?>" readonly>
                                </div>
                                <div class="input-group margintop1" style="width: 10.2cm; float:left;">
                                    <div class=" input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="fa fa-globe"></span>
                                        </span>
                                    </div>
                                    <input type="text" name="religion" class="form-control " placeholder="Religion" value="<?= $religion; ?>" readonly>
                                </div>
                            </div>



                            <div class="form-group text-center" style="margin-left: 10.7cm; margin-top:-39px; float:left;">
                                <button class="btn btn-primary btn-lg">Back</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>

</body>

</html>