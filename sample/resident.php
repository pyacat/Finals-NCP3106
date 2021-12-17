<?php
$lastname = $firstname = $middlename = $alias = $purok = $gender = $civilstatus = $birthdate = $dateofregistration = $birthplace = $contactnumber = $emailaddress = $voterstatus = $religion = $occupation = $nationality = "";

// Include config file
require_once "config.php";
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $sql = "SELECT * FROM barangay WHERE id = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $_GET["id"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $id = $_GET["id"];

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />

</head>



<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <a>
                    <span><img class="photo" src="map.png" /></span>
                </a>
                <li>
                    <a href="Dashboard.php">
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
                    <a href="Accounts.php">
                        <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <span class="title">Accounts</span>
                    </a>
                </li>
                <li>
                    <a href="website.html">
                        <span class="icon"><i class="fa fa-cogs" aria-hidden="true"></i></span>
                        <span class="title">Barangay Website</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="restitle">
        <p>Resident Information Management</p>

        <div class="topnav boxinfo">
            <input type="text" placeholder="Search...">
            <button type="button" class="pull-right form-group text-center" style="margin-top: -20px; border-color: #1d2636; background-color:#2196f3;border-radius:5%;"><a href="newresident.php" style="text-decoration: none;color:#fff;"> + New Resident </a></button>

            <table>

                <tr>
                    <th scope="col">Action</th>
                    <th scope="col">Resident ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Middle Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Alias</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Birthdate</th>
                    <th scope="col">Birthplace</th>
                    <th scope="col">Civil Status</th>
                    <th scope="col">Voter Status</th>
                </tr>

                <?php
                $conn = mysqli_connect("localhost", "root", "", "database");
                $sql = "SELECT * from barangay ORDER BY id asc";
                $result = $conn->query($sql);
                ?>
                <tbody>

                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>

                            <tr>
                                <td>

                                    <a href="read.php ?read= <?php echo $row['id'] ?>"> <button style="width:.5in;height:.3in;background-color:#28a745;border-radius:5px;" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></button></a>
                                    <a href="update.php?update=<?php echo $row['id'] ?>"> <button style="width:.5in;height:.3in;background-color:#007bff;border-radius:5px;" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></button></a>
                                    <a href="deleteinfo.php?delete=<?php echo $row['id'] ?>"><button style="width:.5in;height:.3in;background-color:#dc3545;border-radius:5px;" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></button></a>
                                    <a href="practice.php?id=<?php echo $row['id'] ?>"><button style="width:.5in;height:.3in;background-color:#ffc107;border-radius:5px;" title="Certificate Issuance Record" data-toggle="tooltip"><span class="fa fa-print"></span></button></a>

                                </td>




                                <td> <?php echo $row['id'] ?>
                                    <hr>
                                </td>
                                <td> <?php echo  $row['lastname'] ?>
                                    <hr>
                                </td>
                                <td> <?php echo  $row['middlename'] ?>
                                    <hr>
                                </td>
                                <td> <?php echo  $row['firstname'] ?>
                                    <hr>
                                </td>
                                <td> <?php echo  $row['alias'] ?>
                                    <hr>
                                </td>
                                <td> <?php echo  $row['gender'] ?>
                                    <hr>
                                </td>
                                <td> <?php echo  $row['birthdate'] ?>
                                    <hr>
                                </td>
                                <td> <?php echo  $row['birthplace'] ?>
                                    <hr>
                                </td>
                                <td> <?php echo  $row['civilstatus'] ?>
                                    <hr>
                                </td>
                                <td> <?php echo $row['voterstatus'] ?>
                                    <hr>
                                </td>

                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>

            </table>
            <hr style="margin-left: 20px;width: 100%; height:5px;border-width:0;color:gray;background-color:gray">

        </div>
    </div>
    </div>



</body>

</html>