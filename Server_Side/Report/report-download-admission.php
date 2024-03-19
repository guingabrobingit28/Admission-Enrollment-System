<?php 
session_start();
include 'report-backend.php';
require('pdf/fpdf.php');
date_default_timezone_set('Asia/Manila');
$current_date = date("F d Y");


if($_GET['type'] == 'Admission Student'){

    if($_GET['gender'] == 'ALL'){

        // ALL ADMISSION STUDENTS REPORT
        $show_all_admission = new Report();
        $result_admission = $show_all_admission->Show_Pending_admission_all();
        $total_number = count($result_admission);

        $pdf = new FPDF(orientation:'p',unit:'mm',size:'a4');
        $pdf->SetFont(family:'arial',style:'',size:'8');
    
    
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->cell(190,10, "Bestlink " . $_GET['type'],0,1,'C');
        $pdf->ln(8);
    
        $pdf->SetFont('Arial', '', 12);
        $pdf->cell(95,10,"LIST OF " . $_GET['gender'] . " " . "STUDENTS",0,0,'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->cell(95,10,"TOTAL STUDENTS : " . $total_number ,0,1,'R');
    
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->cell(30,10,'ID',1,0,'C');
        $pdf->cell(80,10,'Name',1,0,'C');
        $pdf->cell(40,10,'Admission Type',1,0,'C');
        $pdf->cell(40,10,'Date',1,1,'C');
    
        foreach($result_admission as $data){
            $pdf->SetFont('Arial', '', 9);
            $pdf->cell(30,10,$data['admission_id'],1,0,'C');
            $pdf->cell(80,10,$data['firstName'],1,0,'C');
            $pdf->cell(40,10,$data['admissionType'],1,0,'C');
            $pdf->cell(40,10,$data['date'],1,1,'C');
    
        }
    
    
        $filename = "report.pdf";
        $pdf->output('D' , $filename, TRUE);
        header('Content-type:application/pdf');
        header('Contebt-Description: inline;filename="' .$filename.  '"');
        header('Content-Transfer-Encoding:binary');
        header('Accept-ranges:bytes');
        @readfile($filename);

    

    }else{

        // SELECTED BY GENDER
        $gender = $_GET['gender'];
        $show_admission = new Report();
        $result_admission = $show_admission->Show_Pending_admission($gender);
        $total_number = count($result_admission);


        $pdf = new FPDF(orientation:'p',unit:'mm',size:'a4');
        $pdf->SetFont(family:'arial',style:'',size:'8');


        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->cell(190,10, "Bestlink " . $_GET['type'],0,1,'C');
        $pdf->ln(8);

        $pdf->SetFont('Arial', '', 12);
        $pdf->cell(95,10,"LIST OF " . $_GET['gender'] . " " . "STUDENTS",0,0,'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->cell(95,10,"TOTAL STUDENTS : " . $total_number ,0,1,'R');

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->cell(30,10,'ID',1,0,'C');
        $pdf->cell(80,10,'Name',1,0,'C');
        $pdf->cell(40,10,'Admission Type',1,0,'C');
        $pdf->cell(40,10,'Date',1,1,'C');

        foreach($result_admission as $data){
            $pdf->SetFont('Arial', '', 9);
            $pdf->cell(30,10,$data['admission_id'],1,0,'C');
            $pdf->cell(80,10,$data['firstName'],1,0,'C');
            $pdf->cell(40,10,$data['admissionType'],1,0,'C');
            $pdf->cell(40,10,$data['date'],1,1,'C');

        }


        $filename = "report.pdf";
        $pdf->output('D' , $filename, TRUE);
        header('Content-type:application/pdf');
        header('Contebt-Description: inline;filename="' .$filename.  '"');
        header('Content-Transfer-Encoding:binary');
        header('Accept-ranges:bytes');
        @readfile($filename);

    }

}ELSE{
    echo "NO DATA";
}
// Change F to D if download
?>



