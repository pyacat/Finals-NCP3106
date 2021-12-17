<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: login.php");
  exit;
}

require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $yearlevel = trim($_POST["password"]);


  $updateSql = "UPDATE barangay SET password=? WHERE id=?";
  if ($updateStmt = $mysqli->prepare($updateSql)) {
    $updateStmt->bind_param("si", $password, $_SESSION["id"]);

    if ($updateStmt->execute()) {
      header("location: login.php");
    } else {
      header("location: Accounts.php");
    }
  }
  $updateStmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="account.css" />
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
    <section class="accountContainer">
      <h3 class="accountTitle">Account Settings</h3>
      <hr />
      <section class="account-content-container1">
        <div class="prologue">
          <h1>Barangay Moonwalk</h1>
          <p>
            Moonwalk, officially Barangay Moonwalk, is one of Parañaque's 16
            barangays and is part of Parañaque's 2nd district. It was created
            under Presidential Decree No. 1321 signed in by President
            Ferdinand Marcos on April 3, 1978,[5][6] From the latest
            population census of The Philippines (2015) Moonwalk has a
            population of 67,723.[7] Moonwalk is a residential place and has
            seen commercial growth with 2,120 business establishments and its
            total road network is believed to be around 38.1 km.
          </p>
          <p>
            Barangay Moonwalk was previously a contiguous area of subdivisions
            that formed part of Barangay Sto.Niño, until it was separated and
            given its own identity by virtue of Presidential Decree No. 1321
            entitled “CREATING BARANGAY MOONWALK IN THE MUNICIPALITY OF
            PARAÑAQUE, METRO-MANILA” issued by Malacañang and signed by then
            President Ferdinand Marcos on April 13, 1978. The subdivisions
            mentioned therein include Moonwalk Phase 1 and 2, Bricktown Phase
            1, 2 and 3, and Multinational Village.
          </p>
        </div>

        <div>
          <img class="barangay-logo" src="map.png" />
        </div>
        <section class="barangay-official">
          <div class="">
            <img src="assets/img/man3.jpg" alt="" />
            <h3>Edwin Olivarez</h3>
            <p>Parañaque Mayor</p>
          </div>
          <div class="">
            <img src="assets/img/man3.jpg" alt="" />
            <h3>Roberto C. Alano</h3>
            <p>Barangay Chairman</p>
          </div>
          <div class="">
            <img src="assets/img/man3.jpg" alt="" />
            <h3>Jonas Dennis A. Punay</h3>
            <p>SK Chairman</p>
          </div>
        </section>
      </section>
      <section class="button-container">
        <button type="button">Change Password</button>
        <button onclick="logout()" type="button">Logout</button>
      </section>
    </section>
  </div>
</body>

<script>
  function logout() {
    window.location.href = "logout.php";
  }
</script>

</html>