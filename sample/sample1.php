<?php
require('fpdf.php');

session_start();

// Database Connection 
$conn = new mysqli('localhost', 'root', '', 'finals');
//Check for connection error
if($conn->connect_error){
  die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);    
}

//READ//
$firstname = $familyname = $middlename = $gender  = $purpose = $birthdate  = $civilstatus = $nationality = "";

require_once "config.php";

$sql = "SELECT * FROM login WHERE id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $_SESSION["id"]);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$id = $_SESSION["id"];

$familyname = $row["lastName"];
$firstname = $row["firstName"];
$middlename = $row["middleName"];
$gender = $row["sex"];
$purpose = $row["purpose"];
$birthdate =  $row["birthDate"];
$civilstatus = $row["civilStatus"];
$nationality = $row["nationality"];

// END READ //






class PDF extends FPDF

{
    
// Page header
function Header()
{
    // Logo
    $this->Image('MoonwalkOfficialSeal.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','',10);
    // Move to the right
    $this->Cell(75);
    // Title
    $this->Cell(30,3,'Republic of the Philippines');
    // Line break
    $this->Ln(4);

    // Arial bold 15
    $this->SetFont('Arial','',10);
    // Move to the right
    $this->Cell(72);
    // Title
    $this->Cell(30,2,'Municipality of Paranaque City');
    // Line break
    $this->Ln(12);
    
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Move to the right
    $this->Cell(74.5);
    // Title
    $this->Cell(30,-3,'BARANGAY MOONWALK');
    // Line break
    $this->Ln(30);

    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Move to the right
    $this->Cell(55);
    // Title
    $this->Cell(30,-3,'BARANGAY CLEARANCE');
    // Line break
    $this->Ln(20);


    // Arial bold 15
    $this->SetFont('Arial','',10);
    // Move to the right
    $this->Cell(55);
    // Title
    $this->Cell(70,-3,'This is to certify');
    // Line break
     $this->Cell(20,-3,'is of legal age,');
    $this->Ln(12);
    $this->Cell(40);
    $this->Cell(1,-20,'and a bonafied residence of Barangay Moonwalk and that has no derogatary ');

    $this->Ln(8);
    $this->Cell(40);
    $this->Cell(1,-29,'records in Barangay prior to the date of issuance of this certificate.');

    $this->Ln(8);
    $this->Cell(40);
    $this->Cell(1,-29,'This certificate is issued in his/her request for:');


}







// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','I',12);
$pdf->Cell(40);
$pdf->Cell(17,-60,$familyname,);
$pdf->Cell(12,-60,$firstname,);
$pdf->Cell(39,-60,$middlename,);
$pdf->Cell(12,-60,$nationality,);
$pdf->Cell(-100);
$pdf->Cell(12,8,$purpose,);
$pdf->Ln();

$pdf->Output();
?>