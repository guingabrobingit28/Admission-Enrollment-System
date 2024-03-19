<?php 
session_start();
include 'report-backend.php';
require('pdf/fpdf.php');
date_default_timezone_set('Asia/Manila');
$current_date = date("F d Y");


if($_GET['type'] == 'Enrolled Student'){


    $GENDER = $_GET['gen'];
    if($GENDER == "ALL"){

        // ALL ENROLLED STUDENTS REPORT
        
        if($_GET['section'] == 'ALL'){
        $year = $_GET['year'];
        $semester = $_GET['semester'];
        $show_all_enrolled = new Report();
        $result_enrolled = $show_all_enrolled->Show_Enrolled_Students_all($year,$semester);
        $total_number = count($result_enrolled);

        $pdf = new FPDF(orientation:'p',unit:'mm',size:'a4');
        $pdf->SetFont(family:'arial',style:'',size:'8');
    
    
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->cell(190,10, "Bestlink " . $_GET['type'] ,0,1,'C');
        $pdf->ln(8);


        $pdf->SetFont('Arial', '', 12);    
        $pdf->cell(95,8,"Student Year : " . $year ,0,1,'L');

        $pdf->SetFont('Arial', '', 12);
        
        $pdf->cell(95,8,"LIST OF " . strtoupper($_GET['gen']) . " " . "STUDENTS",0,0,'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->cell(95,8,"TOTAL STUDENTS : " . $total_number ,0,1,'R');
    
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->cell(10,10,'ID',1,0,'C');
        $pdf->cell(80,10,'Name',1,0,'C');
      
        $pdf->cell(30,10,'Section',1,0,'C');
        $pdf->cell(20,10,'Gender',1,0,'C');
        $pdf->cell(50,10,'Date Enrolled',1,1,'C');
    
        foreach($result_enrolled as $data){
            $pdf->SetFont('Arial', '', 9);
            $pdf->cell(10,10,$data['student_id'],1,0,'C');
            $pdf->cell(80,10,$data['firstName'],1,0,'C');
      
            $pdf->cell(30,10,$data['section_name'],1,0,'C');
            $pdf->cell(20,10,$data['gender'],1,0,'C');
            $pdf->cell(50,10,$data['date'],1,1,'C');
    
        }
    
    
        $filename = "report.pdf";
        $pdf->output('F' , $filename, TRUE);
        header('Content-type:application/pdf');
        header('Content-Description: inline;filename="' .$filename.  '"');
        header('Content-Transfer-Encoding:binary');
        header('Accept-ranges:bytes');
        @readfile($filename);

        // ALL ENROLLED BY SECTION
        }else {

        $year = $_GET['year'];
        $semester = $_GET['semester'];
        $section = $_GET['section'];
        $show_all_enrolled_by_section = new Report();
        $result_enrolled_by_section = $show_all_enrolled_by_section->Show_Enrolled_Students_by_section($year,$semester,$section);
        $total_number = count($result_enrolled_by_section);

        $get_section = new Report();
        $result_section = $get_section->specific_section($section);

        $pdf = new FPDF(orientation:'p',unit:'mm',size:'a4');
        $pdf->SetFont(family:'arial',style:'',size:'8');
    
    
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->cell(190,10, "Bestlink " . $_GET['type'] ,0,1,'C');
        $pdf->ln(8);
    
        $pdf->SetFont('Arial', '', 12);

        $pdf->cell(95,8,"Academic Year: " . $year ,0,1,'L');
        $pdf->cell(95,8,"Section: " . $result_section['section']  ,0,1,'L');
        $pdf->ln(8);
      
        $pdf->cell(95,10,"LIST OF " . strtoupper($_GET['gen']) . " STUDENTS",0,0,'L');
      
        $pdf->SetFont('Arial', '', 12);
        $pdf->cell(95,10,"TOTAL STUDENTS : " . $total_number ,0,1,'R');
    
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->cell(30,10,'ID',1,0,'C');
        $pdf->cell(80,10,'Name',1,0,'C');
        $pdf->cell(40,10,'Gender',1,0,'C');
        $pdf->cell(40,10,'Date',1,1,'C');
    
        foreach($result_enrolled_by_section as $data){
            $pdf->SetFont('Arial', '', 9);
            $pdf->cell(30,10,$data['student_id'],1,0,'C');
            $pdf->cell(80,10,$data['firstName'],1,0,'C');
            $pdf->cell(40,10,$data['gender'],1,0,'C');
            $pdf->cell(40,10,$data['date'],1,1,'C');
    
        }
    
    
        $filename = "report.pdf";
        $pdf->output('F' , $filename, TRUE);
        header('Content-type:application/pdf');
        header('Content-Description: inline;filename="' .$filename.  '"');
        header('Content-Transfer-Encoding:binary');
        header('Accept-ranges:bytes');
        @readfile($filename);
        }

    


    }else if ($_GET['gen'] == 'Male' || $_GET['gen'] == 'Female'){

        // SELECTED BY GENDER
        // ALL ENROLLED STUDENTS REPORT
        if($_GET['section'] == 'ALL'){

            $year = $_GET['year'];
            $semester = $_GET['semester'];
            $section = $_GET['section'];
            $gender = $_GET['gen'];
            $show_all_enrolled = new Report();
            $result_enrolled = $show_all_enrolled->Show_Enrolled_Students_gender($year,$semester,$gender);
            $total_number = count($result_enrolled);

            $pdf = new FPDF(orientation:'p',unit:'mm',size:'a4');
            $pdf->SetFont(family:'arial',style:'',size:'8');
        
        
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->cell(190,10, "Bestlink " . $_GET['type']  ,0,1,'C');
            $pdf->ln(8);
            
            $pdf->SetFont('Arial', '', 12);

            $pdf->cell(95,5,"Academic Year : " . $year ,0,1,'L');


            $pdf->SetFont('Arial', '', 12);
            $pdf->cell(95,10,"LIST OF " . strtoupper($_GET['gen']) . " " . "STUDENTS",0,0,'L');
            $pdf->SetFont('Arial', '', 12);
            $pdf->cell(95,10,"TOTAL STUDENTS : " . $total_number ,0,1,'R');
        
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->cell(30,10,'ID',1,0,'C');
            $pdf->cell(80,10,'Name',1,0,'C');
            $pdf->cell(40,10,'Section',1,0,'C');
            $pdf->cell(40,10,'Date Enrolled',1,1,'C');
        
            foreach($result_enrolled as $data){
                $pdf->SetFont('Arial', '', 9);
                $pdf->cell(30,10,$data['student_id'],1,0,'C');
                $pdf->cell(80,10,$data['firstName'],1,0,'C');
                $pdf->cell(40,10,$data['section_name'],1,0,'C');
                $pdf->cell(40,10,$data['date'],1,1,'C');
        
            }
    
    
            $filename = "report.pdf";
            $pdf->output('F' , $filename, TRUE);
            header('Content-type:application/pdf');
            header('Content-Description: inline;filename="' .$filename.  '"');
            header('Content-Transfer-Encoding:binary');
            header('Accept-ranges:bytes');
            @readfile($filename);


        }ELSE{
            // by section and gender

            $year = $_GET['year'];
            $semester = $_GET['semester'];
            $section = $_GET['section'];
            $gender = $_GET['gen'];
            $show_all_enrolled = new Report();
            $result_enrolled = $show_all_enrolled->Show_Enrolled_Students_gender_section($year,$semester,$gender,$section);
            $total_number = count($result_enrolled);

            $get_section = new Report();
            $result_section = $get_section->specific_section($section);

            $pdf = new FPDF(orientation:'p',unit:'mm',size:'a4');
            $pdf->SetFont(family:'arial',style:'',size:'8');
        
        
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 16);
            $pdf->cell(190,10, "Bestlink " . $_GET['type']  ,0,1,'C');
            $pdf->ln(8);
            
            $pdf->SetFont('Arial', '', 12);

            $pdf->cell(95,8,"Academic Year: " . $year ,0,1,'L');
            $pdf->cell(95,8,"Section: " . $result_section['section']  ,0,1,'L');
            $pdf->ln(8);


            $pdf->SetFont('Arial', '', 12);
            $pdf->cell(95,8,"LIST OF " . strtoupper($_GET['gen']) . " " . "STUDENTS",0,0,'L');
            $pdf->SetFont('Arial', '', 12);
            $pdf->cell(95,8,"TOTAL STUDENTS : " . $total_number ,0,1,'R');
        
            $pdf->SetFont('Arial', 'B', 9);
            $pdf->cell(30,10,'ID',1,0,'C');
            $pdf->cell(80,10,'Name',1,0,'C');
      
            $pdf->cell(80,10,'Date Enrolled',1,1,'C');
        
            foreach($result_enrolled as $data){
                $pdf->SetFont('Arial', '', 9);
                $pdf->cell(30,10,$data['student_id'],1,0,'C');
                $pdf->cell(80,10,$data['firstName'],1,0,'C');
                
                $pdf->cell(80,10,$data['date'],1,1,'C');
        
            }
    
    
            $filename = "report.pdf";
            $pdf->output('F' , $filename, TRUE);
            header('Content-type:application/pdf');
            header('Content-Description: inline;filename="' .$filename.  '"');
            header('Content-Transfer-Encoding:binary');
            header('Accept-ranges:bytes');
            @readfile($filename);
        }

    }ELSE{
        echo " NO DATA";
    }

}ELSE{
    echo "NO DATA";
}
// Change F to D if download
?>



