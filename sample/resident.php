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
                    <a href="Dashboard.html">
                        <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="information.html">
                        <span class="icon"><i class="fa fa-home" aria-hidden="true"></i></span>
                        <span class="title">Barangay Information</span>
                    </a>
                </li>
                <li>
                    <a href="ResidentInfo.html">
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
                    <a href="Accounts.html">
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
    <div class="restitle">
        <p>Resident Information Management</p>
        <div class="topnav">
            <input type="text" placeholder="Search..">

            <table>
                <tr>
                    <th>Action</th>
                    <th>Resident ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Alias</th>
                    <th>Gender</th>
                    <th>Birthdate</th>
                    <th>Birthplace</th>
                    <th>Civil Status</th>
                    <th>Voter Status</th>
                </tr>

                <?php
                $conn = mysqli_connect("localhost", "root", "", "database");
                $sql = "SELECT * from game";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['username'] . "</td><tr>";
                    }
                }
                $conn->close();
                ?>


            </table>
            <hr style="margin-left: .4cm; width: 80%; height:5px;border-width:0;color:gray;background-color:gray">

        </div>
    </div>
    </div>

    <!-- Trigger/Open The Modal -->
    <button class="buttonnew" id="myBtn">+ New Resident</button>

    <!-- The Modal -->
    <form action="insert.php" method="POST">
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">

                <div class="modal-body">
                    <h2>New Resident Information</h2>
                    <hr>

                    <div class="form-group">
                        <label>First Name:</label>
                        <div>
                            <input type="text" name="username" class="fill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Middle Name:</label>
                        <div>
                            <input type="text" name="username" class="fill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Last Name:</label>
                        <div>
                            <input type="text" name="username" class="fill">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alias:</label>
                        <div>
                            <input type="text" name="username" class="fill">
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="modalbutton" data-dismiss="span">Close</button>
                        <button type="submit" name="insert" class="modalbutton">Save</button>
                    </div>
                </div>
            </div>
    </form>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>


</body>

</html>