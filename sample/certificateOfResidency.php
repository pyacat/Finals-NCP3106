<?php
require('fpdf.php');

session_start();
$familyname = $firstname = $middlename = $gender = $purpose = $birthdate = $civilstatus = $date = $nationality = "";
require_once "config.php";
// Database Connection 
$conn = new mysqli('localhost', 'root', '', 'database');
//Check for connection error
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $sql = "SELECT * FROM barangay WHERE id = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $_GET["id"]);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $id = $_GET["id"];

    // Retrieve indeividual fild value

    $familyname = $row["lastname"];
    $firstname = $row["firstname"];
    $middlename = $row["middlename"];
    $gender = $row["gender"];
    $purpose = $row["purpose"];
    $birthdate =  $row["birthdate"];
    $civilstatus = $row["civilstatus"];
    $nationality = $row["nationality"];
    $date = date("Y/m/d");
}
// END READ //






class PDF extends FPDF

{

    // Page header
    function Header()
    {
        // Logo
        $this->Image('MoonwalkOfficialSeal.png', 10, 6, 30);
        // Arial bold 15
        $this->SetFont('Arial', '', 10);
        // Move to the right
        $this->Cell(75);
        // Title
        $this->Cell(30, 3, 'Republic of the Philippines');
        // Line break
        $this->Ln(4);

        // Arial bold 15
        $this->SetFont('Arial', '', 10);
        // Move to the right
        $this->Cell(72);
        // Title
        $this->Cell(30, 2, 'Municipality of Paranaque City');
        // Line break
        $this->Ln(12);

        // Arial bold 15
        $this->SetFont('Arial', 'B', 10);
        // Move to the right
        $this->Cell(74.5);
        // Title
        $this->Cell(30, -3, 'BARANGAY MOONWALK');
        // Line break
        $this->Ln(30);

        // Arial bold 15
        $this->SetFont('Arial', 'B', 20);
        // Move to the right
        $this->Cell(45);
        // Title
        $this->Cell(30, -3, 'CERTIFICATE OF RESIDENCY');
        // Line break
        $this->Ln(20);


        // Arial bold 15
        $this->SetFont('Arial', '', 10);
        // Move to the right
        $this->Cell(35);
        // Title
        $this->Cell(70, -3, 'This is to certify');
        // Line break
        $this->Cell(20, -3, 'is of legal age,');
        $this->Ln(12);
        $this->Cell(20);
        $this->Cell(1, -20, 'whose specimen signature appears below is a PERMANENT RESIDENT of this  ');

        $this->Ln(8);
        $this->Cell(20);
        $this->Cell(1, -29, 'Barangay Moonwalk, Paranaque City, NCR.');

        $this->Ln(8);
        $this->Cell(35);
        $this->Cell(1, -29, 'Based on the records of this office, he/she has been residing at Barangay Moonwalk,');

        $this->Ln(5);
        $this->Cell(19);
        $this->Cell(1, -29, ' Paranaque City, NCR.');

        $this->Ln(8);
        $this->Cell(35);
        $this->Cell(1, -29, 'This CERTIFICATION is being issued upon the request of the above-named person of,');

        $this->Ln(5);
        $this->Cell(19);
        $this->Cell(1, -29, ' whatever legal purposes it may serve.');

        $this->Ln(8);
        $this->Cell(20);
        $this->Cell(1, -29, 'issued this                        at Barangay Moonwalk, Paranaque City, NCR');
    }







    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', 'I', 12);
$pdf->Cell(40);
$pdf->Cell(17, -112, $familyname,);
$pdf->Cell(12, -112, $firstname,);
$pdf->Cell(39, -112, $middlename,);
$pdf->Cell(15, -112, $nationality,);
$pdf->Cell(17, -112, $civilstatus,);
$pdf->Cell(-122);
$pdf->Cell(12, -29, $date,);
$pdf->Ln();

$pdf->Output();
