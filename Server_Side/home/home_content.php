<?php 
include 'home-backend.php';


$display_course = new Count();
$result_course  = $display_course ->Show_Course();


$display_inquiry = new Count();
$Count_Inquiries = $display_inquiry->Count_Inquiries();

$display_Student = new Count();
$Count_student = $display_Student->Count_Student();

$display_admission = new Count();
$Count_admission = $display_admission->Count_Admission();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Dashboard</title>
</head>
<body>
    <div class="dashboard-container">
        <div class="count-items">
            <a href="../Student_Record/student.php" class="count-data">
                    <img class="icons" src="../../Icons/student.png" alt="">
                    <label for=""><?PHP echo $Count_student; ?></label>
                    <p>Number of Student</p>
            </a>
            <a class="count-data">
                    <img class="icons" src="../../Icons/homework.png" alt="">
                    <label for=""><?php echo $result_course ?></label>
                    <p>Number of Course</p>
            </a>
            <a href="../Admission/admission.php" class="count-data">
                    <img class="icons" src="../../Icons/view.png" alt="">
                    <label for=""><?php echo $Count_admission; ?></label>
                    <p>Number of Admission</p>
            </a>
            <a href="../Inquiry/inquiry.php" class="count-data">
                    <img class="icons" src="../../Icons/conversation.png" alt="">
                    <label for=""><?php echo $Count_Inquiries; ?></label>
                    <p>Number of Inquiry</p>
            </a>
        </div>

       
    </div>
</body>
</html>