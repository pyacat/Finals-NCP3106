<?php
// Process delete operation after confirmation
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Include config file
    require_once "config.php";

    // Prepare a delete statement
    $sql = "DELETE FROM barangay WHERE id = ?";

    if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("i", $param_id);

        // Set parameters
        $param_id = trim($_POST["id"]);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Records deleted successfully. Redirect to landing page
            header("location: resident.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    $stmt->close();

    // Close connection
    $mysqli->close();
} else {
    // Check existence of id parameter
    if (empty(trim($_GET["delete"]))) {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="style.css" />
    <script>
        function logout() {
            window.location.href = "resident.php";
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="navigation" style="margin-top: -1.5in;">
            <ul>
                <a>
                    <span><img class="photo" src="map.png" /></span>
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


    <div style="margin-left:2in;margin-top:1.5in;font-family:sans-serif;">
        <h1>Delete Record</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div style="margin-left: 4in;margin-top:10px; font-size:20px; font-family:sans-serif;">
                <input type="hidden" name="id" value="<?php echo trim($_GET["delete"]); ?>" />
                <p> Are you sure you want to delete this Information?</p>
            </div>
            <div>
                <button type="submit" style="height: 1cm;width:4cm;float:left;margin-left:5in;border-radius:5px;background-color:#dc3545;color:#fff;margin-top:10px;">Yes</button>
            </div>

        </form>
        <button onclick="logout()" href="resident.php" style="height: 1cm;width:4cm;margin-left:10px;border-radius:5px;background-color:#28a745 ; color:#fff;margin-top:10px;">No</button>
    </div>

</body>

</html>