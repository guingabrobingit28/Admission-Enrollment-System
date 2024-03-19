<?php
session_start();
include 'student-backend.php';
require('pdf/fpdf.php');
date_default_timezone_set('Asia/Manila');

if(isset($_GET['id'])){
    $get_cor = new Student_Record();
    $result_cor = $get_cor->Get_Cor($_GET['id'],$_GET['id_enroll']);

   
    $pdf = new FPDF('P', 'mm', 'A4');
    $pdf->SetFont('Arial', '', 9);

  
    $pdf->AddPage();


    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(190, 10, "Certificate Of Registration" , 0, 1, 'C');


    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(190, 5, "Bestlink College Of The Philippines", 0, 1, 'C');

  
    $pdf->Ln(8);


    $pdf->Cell(95, 7, "Name: " . $_GET['name'], 1, 0, 'L');
    $pdf->Cell(95, 7, "Yr & Course: "  . $_GET['year'] . " " . $_GET['course'], 1, 1, 'L');
    $pdf->Cell(95, 7, "Section: " . $_GET['section'], 1, 0, 'L');
    $pdf->Cell(95, 7, "Semester: ". $_GET['sem'], 1, 1, 'L');

   
    $pdf->Ln(12);

    
    $pdf->Cell(43, 7, "Subjects", 1, 0, 'C');
    $pdf->Cell(85, 7, "Description", 1, 0, 'C');
    $pdf->Cell(22, 7, "Day", 1, 0, 'C');
    $pdf->Cell(40, 7, "Time", 1, 1, 'C');

  
    foreach($result_cor as $data) {
        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(43, 10, $data['subject_name'], 1, 0, 'C');
        $pdf->Cell(85, 10, $data['subject_description'], 1, 0, 'C');
        $pdf->Cell(22, 10, $data['day'], 1, 0, 'C');
        $pdf->Cell(40, 10, date('h:i A', strtotime($data['time_in'])) . " - " . date('h:i A', strtotime($data['time_out'])), 1, 1, 'C');
    }


    $filename = "cor.pdf";
        $pdf->output('F' , $filename, TRUE);
        header('Content-type:application/pdf');
        header('Content-Description: inline;filename="' .$filename.  '"');
        header('Content-Transfer-Encoding:binary');
        header('Accept-ranges:bytes');
        @readfile($filename);
    
} else {
    echo "Student ID not provided!";
}
?>
