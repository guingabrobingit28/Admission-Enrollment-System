<?php 
require_once "admission_view_backend.php";

error_reporting(0);

$id = $_GET['id']; 
$admission_id = $_GET['admission_id'];

$student_data = new Show_Student();
$data = $student_data->Show_Student_details($id,$admission_id);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admission_view.css">
    <title>Admission View</title>
</head>
<body>                                                    
    <div class="main-container">
        <div class="sub-container">
            <div class="header-student">
                <label for="">Admission Information</label>
            </div>
            <div class="body-student">
                <div class="student-info">
                    <label>Student Informations</label>
                </div>
                <div class="info">

                    <div class="stud-info">
                        <label for="">Admission type</label>
                        <p><?php echo $data['admissionType']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">Course</label>
                        <p><?php echo $data['course']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">Student ID</label>
                        <p><?php echo $data['student_id']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for=""></label>
                        <p></p>
                    </div>

                </div>

                <div class="info">

                    <div class="stud-info">
                        <label for="">Last Name</label>
                        <p><?php echo $data['lastName']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">First Name</label>
                        <p><?php echo $data['firstName']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">Middle Name</label>
                        <p><?php echo $data['middleName']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">Suffix</label>
                        <p><?php echo $data['Suffix']; ?></p>
                    </div>
                 

                </div>

                <div class="info">

                    <div class="stud-info">
                        <label for="">Birth of Date</label>
                        <p><?php echo date('m d Y',strtotime($data['Bod'])); ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">Marital Status</label>
                        <p><?php echo $data['civilStatus']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">Gender</label>
                        <p><?php echo $data['gender']; ?></p>
                    </div>
                  

                </div>

                <div class="info">

                    <div class="stud-info">
                        <label for="">Email</label>
                        <p><?php echo $data['email']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">Contact Number</label>
                        <p><?php echo $data['number']; ?></p>
                    </div>
                   

                </div>
                <div class="info">

                    <div class="stud-info">
                        <label for="">Address </label>
                        <p><?php echo $data['street'] . " " . $data['city'] . " " . $data['province'] . " " . $data['country'] . " " . $data['zipCode'];  ?></p>
                    </div>
                    <div class="stud-info">
                        
                    </div>
                  

                </div>
                <br>
                <div class="student-info">
                    <label>Parent Informations</label>
                </div>
                <div class="info" >
                    <div class="stud-info">
                        <label for="">Last Name</label>
                        <p><?php echo $data['fatherLastname']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">First Name</label>
                        <p><?php echo $data['fatherFirstname']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">Middle Name</label>
                        <p><?php echo $data['fatherMiddlename']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">Suffix</label>
                        <p><?php echo $data['fatherSuffix']; ?></p>
                    </div>
                </div>
                <div class="info" >
                    <div class="stud-info">
                        <label for="">Father's Occupation</label>
                        <p><?php echo $data['fatherOccupation']; ?></p>
                    </div>
                </div>
                <div class="info"  >
                    <div class="stud-info">
                        <label for="">Last Name</label>
                        <p><?php echo $data['motherLastname']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">First Name</label>
                        <p><?php echo $data['motherFirstname']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">Middle Name</label>
                        <p><?php echo $data['motherMiddlename']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">Suffix</label>
                        <p><?php echo $data['motherSuffix']; ?></p>
                    </div>
                </div>
                <div class="info"  >
                    <div class="stud-info">
                        <label for="">Mother's Occupation</label>
                        <p><?php echo $data['MotherOccupation']; ?></p>
                    </div>
                </div>
                <div class="info"  >
                    <div class="stud-info">
                        <label for="">Parent/Guardian Contact Number</label>
                        <p><?php echo $data['gnumber']; ?></p>
                    </div>
                </div>
                <div class="student-info">
                    <label>Educational Backgrounds</label>
                </div>
                <div class="info"   >
                    <div class="stud-info">
                        <label for="">Primary</label>
                        <p><?php echo $data['pri-name']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">Year Graduated</label>
                        <p><?php echo $data['pri-year']; ?></p>
                    </div>
                </div>
                <div class="info"   >
                    <div class="stud-info">
                        <label for="">Secondary Year</label>
                        <p><?php echo $data['sec']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">Year Graduated</label>
                        <p><?php echo $data['sec-year']; ?></p>
                    </div>
                </div>
                <div class="info"   style="margin-bottom: 9em;">
                    <div class="stud-info">
                        <label for="">Last School Attended</label>
                        <p><?php echo $data['last']; ?></p>
                    </div>
                    <div class="stud-info">
                        <label for="">Year Attended</label>
                        <p><?php echo $data['last-year']; ?></p>
                    </div>
                </div>

              
              
                
            </div>
        </div>
    </div>
</body>
</html>