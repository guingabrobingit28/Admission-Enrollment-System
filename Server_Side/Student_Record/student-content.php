<?php 
require_once 'student-backend.php';

// SELECT RECORD

if(isset($_POST['src-submit'])){
    $search_name = $_POST['search_name'];
    $fetch_student = new Student_Record();
    $result_student = $fetch_student->Search_Records($search_name);
   

}
else if(isset($_POST['multi-filter'])){
    $course = $_POST['course'];
    $year = $_POST['year'];
    $section = $_POST['section'];
    $semester = $_POST['semester'];


    $fetch_student = new Student_Record();
    $result_student = $fetch_student->Student_Filter($course,$year,$section,$semester);
}
else{
    $fetch_student = new Student_Record();
    $result_student = $fetch_student->Student_Records();
}



// SELECT COURSE

$fetch_course = new Student_Record();
$result_course = $fetch_course->Select_Course();

// SELECT SECTION

$fetch_section = new Student_Record();
$result_section = $fetch_section->Select_Section();



if(isset($_GET['id_delete'])){ 

    $id = $_GET['id_delete'];

    $delete_student = new Student_Record();
    $result_delete =  $delete_student->Delete_Records($id);

    if($result_delete == 200){
        echo "
        <script>alert('Student Records Deleted')
            window.location.href='student.php';
        </script>";
    }else{
        echo "
        <script>alert('ERROR')
            window.location.href='student.php';
        </script>";
    }


}



if(isset($_POST['btn-update'])){

    $enrollment_id = $_POST['enrollment_id'];
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $suffix = $_POST['suffix'];
    $gender = $_POST['gender'];
    $status = $_POST['status'];
    $bod = $_POST['bod'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $country = $_POST['country'];
    $zipcode = $_POST['zipcode'];

    $ffirstname = $_POST['ffirstname'];
    $fmiddlename = $_POST['fmiddlename'];
    $flastname = $_POST['flastname'];
    $fsuffix = $_POST['fsuffix'];
    $foccupation = $_POST['foccupation'];

    $mfirstname = $_POST['mfirstname'];
    $mmiddlename = $_POST['mmiddlename'];
    $mlastname = $_POST['mlastname'];
    $msuffix = $_POST['msuffix'];
    $moccupation = $_POST['moccupation'];

    $admissiontype = $_POST['admissiontype'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];
    $section = $_POST['sec'];
    $gnumber = $_POST['gnumber'];

    $primary = $_POST['primary'];
    $priyear = $_POST['pri-year'];
    $secondary = $_POST['secondary'];
    $secyear = $_POST['sec-year'];
    $last = $_POST['last'];
    $lastyear = $_POST['last-year'];
    

    $update_student = new Student_Record();
    $result_update = $update_student->Update_Student($enrollment_id,$id,$firstname,$middlename,$lastname,$suffix,$gender,$status,$bod,$email,$number,$street,$city,$province,$country,$zipcode,$ffirstname,$fmiddlename,$flastname,$fsuffix,$foccupation,$mfirstname,$mmiddlename,$mlastname,$msuffix,$moccupation,$admissiontype,$course,$year,$semester,$section,$gnumber,$primary,$priyear,$secondary,$secyear,$last,$lastyear);

    if($result_update == 200){
        echo "
        <script>alert('Student Updated Successfully')
            window.location.href='student.php';
        </script>";
    }else{
        echo "
        <script>alert('ERROR')
            window.location.href='student.php';
        </script>";
    }

}




?>
<div class="admission-application-container">
    <div class="sub-admission-container">
        <div class="admission-header">
            <label for="">Student Information</label>
            
        </div>
        <div class="admission-content">
            <div class="admission-content-header">
                <div class="label-container">
                    <form action="student.php" method="post">
                        <select name="course" id="">
                            <?php foreach($result_course as $course_data){ ?>
                                <option value="<?php echo $course_data['course_name']; ?>"><?php echo $course_data['course_name']; ?></option>
                            <?php } ?>
                        </select>
                        <select name="year" id="">
                                <option value="First Year" >First Year</option>
                                <option value="Second Year">Second Year</option>
                                <option value="Third Year">Third Year</option>
                                <option value="Fourth Year">Fourth Year</option>
                        </select>
                        <select name="section" id="">
                            <?php foreach($result_section as $section_data){ ?>
                                <option value="<?php echo $section_data['section_id'] ?>"><?php echo $section_data['section_name'] ?></option>
                            <?php } ?>
                        </select>
                        <select name="semester" id="">
                                <option value="First Semester">Semester</option>
                                <option value="First Semester">First Semester</option>
                                <option value="Second Semester">Second Semester</option>
                        </select>
                        <button type="submit" name="multi-filter">Filter</button>
                    </form>
                </div> 
                <form action="student.php" method="post">
                    <input type="text" name="search_name" placeholder="Search Name: ">
                    <button type="submit" name="src-submit">Filter</button>
                </form>
            </div>
            <div class="admission-content-body">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 5em;">ID</th>
                            <th>Name</th>
                            <th>Date Enrolled</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Semester</th>
                            <th>Section</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php foreach($result_student as $student ){ ?>
                    <tbody>
                        <tr>
                            <td><?php echo $student['student_id'] ?></td>
                            <td><?php echo $student['firstName'] . " " . $student['lastName'] ?></td>
                            <td><?php echo date('M-d-Y',strtotime($student['date'])) ?></td>
                            <td><?php echo $student['course'] ?></td>
                            <td><?php echo $student['Year'] ?></td>
                            <td><?php echo $student['Sem'] ?></td>
                            <td><?php echo $student['section_name'] ?></td>
                            <td>          
                               <a href="javascript: edit_info(
                                '<?php echo $student['enrollment_id'] ?>',
                                '<?php echo $student['student_id'] ?>',
                                '<?php echo $student['firstName'] ?>',
                                '<?php echo $student['middleName'] ?>',
                                '<?php echo $student['lastName'] ?>',
                                '<?php echo $student['Suffix'] ?>',
                                '<?php echo $student['Bod'] ?>',
                                '<?php echo $student['email'] ?>',
                                '<?php echo $student['province'] ?>',
                                '<?php echo $student['street'] ?>',
                                '<?php echo $student['city'] ?>',
                                '<?php echo $student['province'] ?>',
                                '<?php echo $student['country'] ?>',
                                '<?php echo $student['zipCode'] ?>',
                                '<?php echo $student['fatherFirstname'] ?>',
                                '<?php echo $student['fatherMiddlename'] ?>',
                                '<?php echo $student['fatherLastname'] ?>',
                                '<?php echo $student['fatherSuffix'] ?>',
                                '<?php echo $student['fatherOccupation'] ?>',
                                '<?php echo $student['motherFirstname'] ?>',
                                '<?php echo $student['motherMiddlename'] ?>',
                                '<?php echo $student['motherLastname'] ?>',
                                '<?php echo $student['motherSuffix'] ?>',
                                '<?php echo $student['MotherOccupation'] ?>',
                                '<?php echo $student['gnumber'] ?>',
                                '<?php echo $student['pri-name'] ?>',
                                '<?php echo $student['sec'] ?>',
                                '<?php echo $student['last'] ?>',
                        









                               );">
                                    <img class="icons" src="../../Icons/edit.png" alt="" srcset="">
                                </a>
                                <a href="student.php?id_delete=<?php echo $student['student_id']; ?>">
                                    <img class="icons" src="../../Icons/delete.png" alt="" srcset="">
                                </a>
                                <a href="../Admission/admission_view.php?id=<?php echo $student['student_id'] ?>" target="_blank">
                                    <img class="icons" src="../../Icons/profile.png" >
                                </a>
                                <a href="schedule_view.php?id=<?php echo $student['schedule_id'] ?> &&name=<?php echo $student['lastName'] ?> " target="_blank">
                                    <img class="icons" src="../../Icons/weekly.png" >
                                </a>
                        </tr>
                    </tbody>
                    <?php } ?>
                    
               
                </table>
            </div>
        </div>

    </div>
  
</div>
<!-- view -->
<div class="modal">
    <div class="modal-container"> 
        <div class="student-header">
            <label for="">Student Information</label>
            <a href="javascript: close_info();"><img class="close" src="../../Icons/close.png" alt="" srcset=""></a>
        </div>
        <div class="student-body">
            <!-- colomn -->
            <form action="student.php" method="post">
            <div class="student-info">
                <!-- row -->
                <div class="student-input">
                    <label for="">Name</label>
                    <input type="text" name="id" id="user_id" hidden>
                    <input type="text" name="enrollment_id" id="en_id" hidden>
                    <input type="text" name="firstname" placeholder="First name:" id="firstname">
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                    <input type="text" name="middlename" placeholder="Middle name:" id="lastname">
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                    <input type="text" name="lastname" placeholder="Last name:" id="middlename">
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                    <input type="text" name="suffix" placeholder="suffix(Optional)" id="suffix">
                </div>

            </div>
            <!-- 2 -->
            <div class="student-info">
                <!-- row -->
                <div class="student-input">
                    <label for="">Gender</label>
                    <select name="gender" >
                        <option value="Male" >Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="student-input">
                    <label for="">Marital Status</label>
                    <select name="status" id="status">
                            <OPTION value="Single">SINGLE</OPTION>
                            <OPTION value="Married">MARRIED</OPTION>
                            <OPTION value="Devorced">DEVORCED</OPTION>
                            <OPTION value="Widowed">WIDOWED</OPTION>
                    </select>
                </div>
                <div class="student-input">
                    <label for="">Birth Date</label>
                    <input type="date" name="bod" placeholder="Last name:" id="bod">
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                </div>
            </div>

            <!-- 3 -->
            <div class="student-info">
                <!-- row -->
                <div class="student-input">
                    <label for="">Email</label>
                    <input type="email" name="email" id="email" placeholder="Email:">
                </div>
                <div class="student-input">
                    <label for="">Contact Number</label>
                    <input type="text" name="number" id="number" placeholder="Contact Number:">
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                  
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                
                </div>

            </div>

            <!-- 4 -->

            
            <div class="student-info">
                <!-- row -->
                <div class="student-input" style="width: 20%;">
                    <label for="">Address</label>
                    <input type="text" name="street" placeholder="Street:" id="street">
                </div>
                <div class="student-input" style="width: 20%;">
                    <label for="">&nbsp;</label>
                    <input type="text" name="city" placeholder="City:" id="city">
                </div>
                <div class="student-input" style="width: 20%;">
                    <label for="">&nbsp;</label>
                    <input type="text" name="province" placeholder="Province:" id="province">
                </div>
                <div class="student-input" style="width: 20%;">
                    <label for="">&nbsp;</label>
                    <input type="text" name="country" placeholder="Country:" id="country">
                </div>
                <div class="student-input" style="width: 20%;">
                    <label for="">&nbsp;</label>
                    <input type="text" name="zipcode" placeholder="Zip code:" id="zipcode">
                </div>

            </div>

            <!-- 5 -->

            <div class="student-info">
                <!-- row -->
                <div class="student-input">
                    <label for="">Father's Name</label>
                    <input type="text" name="ffirstname" placeholder="First name:" id="ff">
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                    <input type="text" name="fmiddlename" placeholder="Middle name:" id="fm">
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                    <input type="text" name="flastname" placeholder="Last name:" id="fl">
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                    <input type="text" name="fsuffix" placeholder="suffix(Optional)" id="fs">
                </div>

            </div>

            <!-- 6 -->

            
            <div class="student-info">
                <!-- row -->
                <div class="student-input">
                    <label for="">Occupation</label>
                    <input type="text" name="foccupation" placeholder="Occupation: " id="fo">
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                    
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                   
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                    
                </div>

            </div>

            <!-- 7 -->

            <div class="student-info">
                <!-- row -->
                <div class="student-input">
                    <label for="">Mother's Name</label>
                    <input type="text" name="mfirstname" placeholder="First name:" id="mf">
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                    <input type="text" name="mmiddlename" placeholder="Middle name:" id="mm">
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                    <input type="text" name="mlastname" placeholder="Last name:" id="ml">
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                    <input type="text" name="msuffix" placeholder="suffix(Optional)" id="ms">
                </div>

            </div>

            <!-- 8 -->

            <div class="student-info">
                <!-- row -->
                <div class="student-input">
                    <label for="">Occupation</label>
                    <input type="text" name="moccupation" placeholder="Occupation: " id="mo">
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                    
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                   
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                    
                </div>

            </div>



            <!-- 9 -->


            <div class="student-info">
                <!-- row -->
                <div class="student-input">
                    <label for="">Guardian/Parent's Number</label>
                    <input type="text" name="gnumber" placeholder="Contact Number: " id="gn">
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                    
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                   
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                    
                </div>

            </div>
            <!-- 10 -->
            <!-- Primary School -->
            <div class="student-info">
                <!-- row -->
                <div class="student-input">
                    <label for="">Primary School</label>
                    <input type="text" name="primary" placeholder="School Name: " id="p">
                </div>
                <div class="student-input">
                    <label for="">Year Graduated</label>
                    <select id="year" name="pri-year">
                            <?php
                            for ($year = 2000; $year <= 2030; $year++) {
                                echo "<option value=\"$year\">$year</option>";
                            }
                            ?>
                    </select>
                </div>
                <div class="student-input">
                   
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                </div>
            </div>


            <!-- Secondary-->

            <div class="student-info">
                <!-- row -->
                <div class="student-input">
                    <label for="">Secondary School</label>
                    <input type="text" name="secondary" placeholder="School Name: " id="s">
                </div>
                <div class="student-input">
                    <label for="">Year Graduated</label>
                    <select id="year" name="sec-year">
                            <?php
                            for ($year = 2000; $year <= 2030; $year++) {
                                echo "<option value=\"$year\">$year</option>";
                            }
                            ?>
                    </select>
                </div>
                <div class="student-input">
                   
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                </div>
            </div>

            <!-- Last School Attended -->

            <div class="student-info">
                <!-- row -->
                <div class="student-input">
                    <label for="">Last School Attended</label>
                    <input type="text" name="last" placeholder="School Name: " id="l">
                </div>
                <div class="student-input">
                    <label for="">Year Graduated</label>
                    <select id="year" name="last-year">
                            <?php
                            for ($year = 2000; $year <= 2030; $year++) {
                                echo "<option value=\"$year\">$year</option>";
                            }
                            ?>
                    </select>
                </div>
                <div class="student-input">
                   
                </div>
                <div class="student-input">
                    <label for="">&nbsp;</label>
                </div>
            </div>

            
            <div class="student-info">
                <!-- row -->
                <div class="student-input" style="width: 33.3%;">
                    <label for="">Admission Type</label>
                    <select name="admissiontype" id="">
                            <OPTION value="Ruturnee">Ruturnee</OPTION>
                            <OPTION value="Transferee">Transferee</OPTION>
                            <OPTION value="Freshmen">Freshmen</OPTION>
                    </select>
                </div>
                <div class="student-input" style="width: 33.3%;">
                    <label for="">Course</label>
                    <select name="course" id="">
                        <?php foreach($result_course as $course){ ?>       
                        <option value="<?php echo $course['course_name']; ?>"><?php echo $course['course_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="student-input" style="width: 33.3%;">
                    
                </div>
            </div>

            <!-- 11 -->

            <div class="student-info">
                <!-- row -->
                <div class="student-input" style="width: 33.3%;">
                    <label for="">Year</label>
                    <select name="year" id="">
                            <OPTION value="First Year">First Year</OPTION>
                            <OPTION value="Second Year">Second Year</OPTION>
                            <OPTION value="Third Year">Third Year</OPTION>
                            <OPTION value="Fourth Year">Fourth Year</OPTION>
                    </select>
                </div>
                <div class="student-input" style="width: 33.3%;">
                    <label for="">Semester</label>
                    <select name="semester" id="">           
                        <option value="First Semester">First Semester</option>
                        <option value="Second Semester">Second Semester</option>
                    </select>
                </div>
                <div class="student-input" style="width: 33.3%;">
                    <label for="">Section</label>
                    <select name="sec" id="">           
                    <?php foreach($result_section as $section){ ?>    
                        <option value="<?php echo $section['section_id']; ?>"><?php echo $section['section_name']; ?></option>
                        <?php } ?>
                    </select>
                    
                    
                </div>
            </div>

            <!-- 11-->
            <div class="student-submit">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                    <button type="submit" name="btn-update">UPDATE</button>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
     

     let openModal = document.querySelector('.modal');
    function edit_info(en_id,id,firstname,middlename,lastname,suffix,bod,email,number,street,city,province,country,zipcode,
    ff,fm,fl,fs,fo,mf,mm,ml,ms,mo,gn,p,s,l
    
    
    ){

        // name
        document.querySelector('#user_id').value=id;
        document.querySelector('#en_id').value=en_id;
        document.querySelector('#firstname').value=firstname;
        document.querySelector('#middlename').value=middlename;
        document.querySelector('#lastname').value=lastname;
        document.querySelector('#suffix').value=suffix;

        // 
        document.querySelector('#bod').value=bod;
        document.querySelector('#email').value=email;
        document.querySelector('#number').value=number;

        // 

        document.querySelector('#street').value=street;
        document.querySelector('#city').value=city;
        document.querySelector('#province').value=province;
        document.querySelector('#country').value=country;
        document.querySelector('#zipcode').value=zipcode;

        // 

        document.querySelector('#ff').value=ff;
        document.querySelector('#fm').value=fm;
        document.querySelector('#fl').value=fl;
        document.querySelector('#fs').value=fs;
        document.querySelector('#fo').value=fo;

        // 
        
        document.querySelector('#mf').value=mf;
        document.querySelector('#mm').value=mm;
        document.querySelector('#ml').value=ml;
        document.querySelector('#ms').value=ms;
        document.querySelector('#mo').value=mo;

        // 

        document.querySelector('#gn').value=gn;
        document.querySelector('#p').value=p;
        document.querySelector('#s').value=s;
        document.querySelector('#l').value=l;




        
        openModal.style.display ="Flex";
    }

    function close_info(){
        openModal.style.display = "None";
    }


</script>