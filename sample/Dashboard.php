<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="container">
    <div class="navigation">
      <ul>
        <img class="photo" src="map.png" />
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
    <div>
      <h1>Dashboard</h1>
      <hr style="margin-left: .1cm; width: 100%; height:2px;border-width:0;color:gray;background-color:gray">
      <p class="welcome">Welcome To <strong>Barangay Moonwalk</strong></p>
      <div class="address">No. 2 Armstrong Avenue, Barangay Moonwalk, Paranaque City PARANAQUE, NCR - NATIONAL CAPITAL REGION</div>
      <hr style="margin-left: .1cm; width: 65%; height:2px;border-width:0;color:gray;background-color:gray">

      <div class="box">
        <div class="texttitle">Total Registered Population:</div>
        <hr style=" width: 100%; height:3px;border-width:0;color:gray;background-color:gray;">
        <?php
        error_reporting(0);

        $conn = mysqli_connect("localhost", "root", "", "database") or die(mysqli_error());

        $query = "SELECT COUNT(*) AS count FROM barangay";

        $query_result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($query_result)) {
          $output = $row['count'];
        }

        $sql = "SELECT * FROM barangay";

        $result = mysqli_query($conn, $sql);

        ?>
        <h1><?php echo $output; ?></h1>
      </div>
      <div class="box1">
        <div class="texttitle">Registered Voter/s:</div>
        <hr style=" width: 200%; height:3px;border-width:0;color:gray;background-color:gray;">
        <?php
        error_reporting(0);

        $conn = mysqli_connect("localhost", "root", "", "database") or die(mysqli_error());

        $query = "SELECT COUNT(*) AS count FROM barangay WHERE voterstatus = 'Yes'";

        $query_result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($query_result)) {
          $output = $row['count'];
        }


        $sql = "SELECT * FROM barangay";

        $result = mysqli_query($conn, $sql);

        ?>

        <h1><?php echo $output; ?></h1>
      </div>
      <div>
        <span class="las la-female"></span>
      </div>
    </div>
    <div class="box3">
      <div class="texttitle">Male/s:</div>
      <hr style=" width: 200%; height:3px;border-width:0;color:gray;background-color:gray;">
      <?php
      error_reporting(0);

      $conn = mysqli_connect("localhost", "root", "", "database") or die(mysqli_error());

      $query = "SELECT COUNT(*) AS count FROM barangay WHERE gender = 'Male'";

      $query_result = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_assoc($query_result)) {
        $output = $row['count'];
      }


      $sql = "SELECT * FROM barangay";

      $result = mysqli_query($conn, $sql);


      ?><h1><?php echo $output; ?></h1>
    </div>
    <div>
      <span class="las la-vote-yea"></span>
    </div>

    <div class="box4">
      <div class="texttitle">Females:</div>
      <hr style=" width: 100%; height: 3px;border-width:0;color:gray;background-color:gray;">
      <?php
      error_reporting(0);

      $conn = mysqli_connect("localhost", "root", "", "database") or die(mysqli_error());

      $query = "SELECT COUNT(*) AS count FROM barangay WHERE gender = 'Female'";

      $query_result = mysqli_query($conn, $query);

      while ($row = mysqli_fetch_assoc($query_result)) {
        $output = $row['count'];
      }


      $sql = "SELECT * FROM barangay";

      $result = mysqli_query($conn, $sql);


      ?><h1><?php echo $output; ?></h1>
    </div>
    <div class="box5">
      <img src="assets/img/prq1.png" width="300" height="300" style="border-radius: 5px;float: left;padding: 2cm;">
      <img src="assets/img/brgy.png" width="300" height="300" style="border-radius: 5px;float: right;padding: 2cm;">
      <img src="assets/img/sk.png" width="400" height="300" style="border-radius: 5px; margin-left: 3.1in;">
    </div>
  </div>
</body>

</html>