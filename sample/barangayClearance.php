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
$firstname = $familyname = $middlename = $gender  = $purpose = $birthdate  = $civilstatus = "";

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
// $purpose = $row["purpose"];
$birthdate =  $row["birthDate"];
$civilstatus = $row["civilStatus"];

// END READ //


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);

$pdf->Cell(30,10,$familyname,);
$pdf->Cell(50,10,$firstname,);
$pdf->Cell(80,10,$middlename,);
$pdf->Cell(40,10,$gender,);
$pdf->Ln();

$pdf->Output();





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
    $this->Ln(12);

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
$pdf->SetFont('Times','',12);

$pdf->Output();
?>