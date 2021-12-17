<?php
require('fpdf.php');

session_start();
$familyname = $firstname = $middlename = $gender = $purpose = $birthdate = $civilstatus = $date = $nationality = "";

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
    $this->Cell(55);
    // Title
    $this->Cell(30, -3, 'BARANGAY CLEARANCE');
    // Line break
    $this->Ln(20);


    // Arial bold 15
    $this->SetFont('Arial', '', 10);
    // Move to the right
    $this->Cell(55);
    // Title
    $this->Cell(70, -3, 'This is to certify');
    // Line break
    $this->Cell(20, -3, 'is of legal age,');
    $this->Ln(12);
    $this->Cell(40);
    $this->Cell(1, -20, 'and a bonafied residence of Barangay Moonwalk and that has no derogatary ');

    $this->Ln(8);
    $this->Cell(40);
    $this->Cell(1, -29, 'records in Barangay prior to the date of issuance of this certificate.');

    $this->Ln(10);
    $this->Cell(40);
    $this->Cell(1, -29, 'This certificate is issued in his/her request for:');

    $this->Ln(20);
    $this->Cell(40);
    $this->Cell(1, -29, 'Issued this ');


    // Line break
    $this->Ln(-53);
    // Move to the right
    $this->Cell(-5);
    // Title
    $this->Cell(40, 150, '', 1, 0, 'C');
    // Line break
    $this->Ln(6);

    // Arial bold 15
    $this->SetFont('Arial', 'U', 9);
    // Move to the right
    $this->Cell(3.8);
    // Title
    $this->Cell(30, 2, 'Patrick  Yacat');
    // Line break
    $this->Ln(4);

    // Arial bold 15
    $this->SetFont('Arial', '', 9);
    // Move to the right
    $this->Cell(1);
    // Title
    $this->Cell(30, 2, 'Barangay Captain');
    // Line break
    $this->Ln(12);

    // Arial bold 15
    $this->SetFont('Arial', 'U', 9);
    // Move to the right
    $this->Cell(.5);
    // Title
    $this->Cell(30, 2, 'Christian  Manayao');
    // Line break
    $this->Ln(4);

    // Arial bold 15
    $this->SetFont('Arial', '', 9);
    // Move to the right
    $this->Cell(7.5);
    // Title
    $this->Cell(30, 2, 'Secretary');
    // Line break
    $this->Ln(12);


    // Arial bold 15
    $this->SetFont('Arial', 'U', 9);
    // Move to the right
    $this->Cell(-0.5);
    // Title
    $this->Cell(30, 2, 'Errol "POGI" Antonio');
    // Line break
    $this->Ln(4);

    // Arial bold 15
    $this->SetFont('Arial', '', 9);
    // Move to the right
    $this->Cell(7.6);
    // Title
    $this->Cell(30, 2, 'Treasurer');
    // Line break
    $this->Ln(12);



    // Arial bold 15
    $this->SetFont('Arial', 'U', 9);
    // Move to the right
    $this->Cell(4);
    // Title
    $this->Cell(30, 2, 'Jedh Villarosa');
    // Line break
    $this->Ln(4);

    // Arial bold 15
    $this->SetFont('Arial', '', 9);
    // Move to the right
    $this->Cell(2.6);
    // Title
    $this->Cell(30, 2, 'Barangay Tanod');
    // Line break
    $this->Ln(12);


    // Arial bold 15
    $this->SetFont('Arial', 'U', 9);
    // Move to the right
    $this->Cell(3);
    // Title
    $this->Cell(30, 2, 'James Lagunda');
    // Line break
    $this->Ln(4);

    // Arial bold 15
    $this->SetFont('Arial', '', 9);
    // Move to the right
    $this->Cell(2.6);
    // Title
    $this->Cell(30, 2, 'Barangay Tanod');
    // Line break
    $this->Ln(12);
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
$pdf->Cell(82);
$pdf->Cell(17, -169, $familyname,);
$pdf->Cell(12, -169, $firstname,);
$pdf->Cell(39, -169, $middlename,);
$pdf->Cell(12, -169, $nationality,);
$pdf->Cell(-100);
$pdf->Cell(12, -112, $purpose,);
$pdf->Cell(-15);
$pdf->Cell(12, -96, $date,);
$pdf->Ln();

$pdf->Output();
