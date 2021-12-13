<?php

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'database');
// Processing form data when form is submitted
if (isset($_POST["insert"])) {
    $username = $_POST['username'];

    $query = "INSERT INTO game ('username') VALUES ('$username')";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: resident.php');
    } else {
        echo '<script> alert("Data not saved"); </script>';
    }
}
