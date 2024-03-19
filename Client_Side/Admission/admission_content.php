<?PHP 
require_once "admission_entry.php";

$ClientData = new admission();

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $admissiontype = $_POST['admissiontype'];
    $course = $_POST['course'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $suffix = $_POST['suffix'];
    $bod = $_POST['dob'];
    $phone = $_POST['phone'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $country = $_POST['country'];
    $zipcode = $_POST['zipcode'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $civilstatus = $_POST['civilstatus'];
    $fatherfirstname = $_POST['fatherfirstname'];
    $fathermiddlename = $_POST['fathermiddlename'];
    $fatherlastname = $_POST['fatherlastname'];
    $fathersuffix = $_POST['fathersuffix'];
    $fatheroccupation = $_POST['fatheroccupation'];
    $motherfirstname = $_POST['motherfirstname'];
    $mothermiddlename = $_POST['mothermiddlename'];
    $motherlastname = $_POST['motherlastname'];
    $mothersuffix = $_POST['mothersuffix'];
    $motheroccupation = $_POST['motheroccupation'];
    $pri_name = $_POST['pri-name'];
    $pri_year = $_POST['pri-year'];
    $sec_name = $_POST['sec-name'];
    $sec_year = $_POST['sec-year'];
    $last_name = $_POST['last-name'];
    $last_year = $_POST['last-year'];
    $guardian_num = $_POST['guardian_num'];
    $id = $_POST['id'];

    echo $result = $ClientData->admission_data($admissiontype,$course,$firstname,$middlename,$lastname,$suffix,$bod,$phone,$street,$city,$province,$country,$zipcode,$email,$gender,$civilstatus,$fatherfirstname,$fathermiddlename,$fatherlastname,$fathersuffix,$fatheroccupation,$motherfirstname,$mothermiddlename,$motherlastname,$mothersuffix,$motheroccupation,$pri_name,$pri_year,$sec_name,$sec_year,$last_name,$last_year,$guardian_num,$id);

    if($result == 200){
    	echo '<script> 
    	alert("Successfully Submitted") 
    	window.location.href = "admission.php";
    	</script>';
    }
    else if($result == 400) {
    	echo '<script> 
    	alert("Error") 
    	window.location.href = "admission.php";
    	</script>';
    }
    else {
    	echo '<script> 
    	alert("ERROR !")
    	window.location.href = "admission.php";
    	</script>';
    }
}

$select_course = new Course();
$result_list  = $select_course->Show_Course();


?>
<link rel="stylesheet" href="admission_form.css">
<div class="admission-container">
    <div class="sub-admission-container">
       <div class="admission-header">
            <label for="">Admission Application Form</label>
       </div>
       <div class="admission-content">
            <form action="admission_content.php" method="post" id="FormPreview">
                <!-- admission type -->
            <div class="student-input-con">
                    <div class="student-label">
                        <label for=""></label>
                    </div>
                    <div class="studen-input">
                        <label for="">Admission Type</label>
                        <SELECT name="admissiontype" onchange="old();" id="admissiontype">
                            <OPTION value="Freshmen">Freshmen</OPTION>
                            <OPTION value="Transferee">Transferee</OPTION>
                            <OPTION value="Returnee">Returnee</OPTION>
                        </SELECT>
                    </div>
                    <div class="studen-input" id="course-div" >
                        <label for="">Course to Enroll</label>
                        <SELECT name="course">
                        <?php foreach($result_list as $data){?>
                            <OPTION value="<?php echo $data['course_name']; ?>"><?php echo $data['course_name']; ?></OPTION>
                        <?php  } ?>
                        </SELECT>
                    </div>
                    <div class="studen-input" id="id-div" style="display: none;" >
                        <label for="">ID</label>
                        <input type="text" name="id">
                        
                    </div>
                </div>
                <!-- CLIENT NAME -->
                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for="">Student Name </label>
                    </div>
                    <div class="studen-input">
                        <label for="">First Name</label>
                        <input type="text" name="firstname" placeholder="First Name: ">
                    </div>
                    <div class="studen-input">
                        <label for="">Last Name</label>
                        <input type="text" name="lastname" placeholder="Last Name:" >
                    </div>
                </div>
                <!-- 2 -->
                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for=""></label>
                    </div>
                    <div class="studen-input">
                        <label for="">Middle Name</label>
                        <input type="text" name="middlename" placeholder="Middle Name: ">
                    </div>
                    <div class="studen-input">
                        <label for="">Suffix</label>
                        <input type="text" name="suffix" placeholder="Suffix(optional)" >
                    </div>
                </div>
                <!-- GENDER CIVIL STATUS -->
                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for=""></label>
                    </div>
                    <div class="studen-input">
                        <label for="">GENDER</label>
                        <SELECT name="gender">
                            <OPTION value="Male">MALE</OPTION>
                            <OPTION value="Female">FEMALE</OPTION>
                        </SELECT>
                    </div>
                    <div class="studen-input">
                        <label for="">CIVIL STATUS</label>
                        <SELECT name="civilstatus">
                            <OPTION value="Single">SINGLE</OPTION>
                            <OPTION value="Married">MARRIED</OPTION>
                            <OPTION value="Devorced">DEVORCED</OPTION>
                            <OPTION value="Widowed">WIDOWED</OPTION>
                        </SELECT>
                    </div>
                </div>
                <!-- DATE OF BIRTH -->
                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for="">Date of Birth</label>
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input style="width: 34em;" type="date" name="dob" >
                    </div>
                </div>
                <!-- PHONE NUMBER -->
                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for="">Phone</label>
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input style="width: 34em;" type="text" name="phone" placeholder="Contact Number: "  >
                    </div> 
                </div>
                <!-- 1 Home address -->
                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for="">Home Address</label>
                    </div>
                    <div class="studen-input sub-input">
                        <label for=""></label>
                        <input style="width: 34em;" type="text" name="street" placeholder="Street:"  >
                    </div> 
                </div>
                <!-- 2 -->
                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for=""></label>
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input type="text" name="city" placeholder="City: ">
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input type="text" name="province" placeholder="Province:" >
                    </div>
                </div>
                  <!-- 3 -->
                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for=""></label>
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input type="text" name="zipcode" placeholder="Zip Code: ">
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input type="text" name="country" placeholder="Country:" >
                    </div>
                </div>
                <!-- Email -->
                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for="">Email</label>
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input style="width: 34em;" type="email" name="email" placeholder="Email: "  >
                    </div> 
                </div>
                <!-- father name -->
                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for="">Father Name</label>
                    </div>
                    <div class="studen-input">
                        <label for="">First Name</label>
                        <input type="text" name="fatherfirstname" placeholder="First Name: ">
                    </div>
                    <div class="studen-input">
                        <label for="">Last Name</label>
                        <input type="text" name="fatherlastname" placeholder="Last Name:" >
                    </div>
                </div>
                <!-- 2 -->
                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for=""></label>
                    </div>
                    <div class="studen-input">
                        <label for="">Middle Name</label>
                        <input type="text" name="fathermiddlename" placeholder="Middle Name: ">
                    </div>
                    <div class="studen-input">
                        <label for="">Suffix</label>
                        <input type="text" name="fathersuffix" placeholder="Suffix(optional)" >
                    </div>
                </div>
                <!-- father occupataion-->
                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for="">Occupation</label>
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input style="width: 34em;" type="text" name="fatheroccupation" placeholder="Occupation: "  >
                    </div> 
                </div>
                <!-- mother name -->
                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for="">Mother Name</label>
                    </div>
                    <div class="studen-input">
                        <label for="">First Name</label>
                        <input type="text" name="motherfirstname" placeholder="First Name: ">
                    </div>
                    <div class="studen-input">
                        <label for="">Last Name</label>
                        <input type="text" name="motherlastname" placeholder="Last Name:" >
                    </div>
                </div>
                <!-- 2 -->
                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for=""></label>
                    </div>
                    <div class="studen-input">
                        <label for="">Middle Name</label>
                        <input type="text" name="mothermiddlename" placeholder="Middle Name: ">
                    </div>
                    <div class="studen-input">
                        <label for="">Suffix</label>
                        <input type="text" name="mothersuffix" placeholder="Suffix(optional)" >
                    </div>
                </div>
                <!-- Mother occupataion-->
                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for="">Occupation</label>
                    </div>
                    <div class="studen-input" id="if-returnee">
                        <label for=""></label>
                        <input style="width: 34em;" type="text" name="motheroccupation" placeholder="Occupation: "  >
                    </div> 
                </div>

                <!-- GUARDIAN -->

                <div class="student-input-con" id="if-returnee">
                    <div class="student-label">
                        <label for="">No. Parent/Guardian</label>
                    </div>
                    <div class="studen-input">
                        <label for=""></label>
                        <input style="width: 34em;" type="text" name="guardian_num" placeholder="Contact: "  >
                    </div> 
                </div>



                <!-- EDUCATIONAL BG -->

                <div class="student-input-con ed-bg" id="if-returnee" >
                    <div class="student-label">
                        <label for="">Educational Background</label>
                    </div>
                    <div class="studen-input">
                        <label for="">Primary</label>
                        <input type="text" name="pri-name" placeholder="School Name: ">
                    </div>
                    <div class="studen-input">
                        <label for="">Year Graduated</label>
                        <select id="year" name="pri-year">
                            <?php
                            for ($year = 2000; $year <= 2030; $year++) {
                                echo "<option value=\"$year\">$year</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- SECONDARY -->

                <div class="student-input-con ed-bg" id="if-returnee">
                    <div class="student-label">
                        <label for=""></label>
                    </div>
                    <div class="studen-input">
                        <label for="">Secondary</label>
                        <input type="text" name="sec-name" placeholder="School Name: ">
                    </div>
                    <div class="studen-input">
                        <label for="">Year Graduated</label>
                        <select id="year" name="sec-year">
                            <?php
                            for ($year = 2000; $year <= 2030; $year++) {
                                echo "<option value=\"$year\">$year</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <!-- last year attended -->

                <div class="student-input-con ed-bg" id="if-returnee">
                    <div class="student-label">
                        <label for=""></label>
                    </div>
                    <div class="studen-input">
                        <label for="">Last School Attended</label>
                        <input type="text" name="last-name" placeholder="School Name: ">
                    </div>
                    <div class="studen-input">
                        <label for="">Last School Year Attended</label>
                        <select id="year" name="last-year">
                            <?php
                            for ($year = 2000; $year <= 2030; $year++) {
                                echo "<option value=\"$year\">$year</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>



                <!--  -->
                <div class="admission-btn">
                    <button type="button" onclick="preview()">SUBMIT</button>
                </div>
                
              
               
                
                
            </form>
       </div>
    </div>
</div>

<!-- modal -->

<div class="modal">
    <div class="modal-container">
        <div class="modal-header">
            <label for="">TERMS AND CONDITION</label>
            <a href="javascript: close_message()"></a>
        </div>
        <div class="modal-body">
            <div class="container-terms">
                <P>By submitting this admission form, I confirm that all the information provided is true, accurate, and complete.
                    <br>
                    <br>
                I understand that any falsification of information may result in the rejection of my application or dismissal if already admitted.</P>
                
            </div>
            <div class="btn-container">
                <div class="chckbox-container">
                    <input type="checkbox" id="terms" onclick="enable_accept()">
                    <p>I agree to the terms and conditions</p>
                </div>
                <div class="option-container">
                    <a href="admission.php">Back</a>
                    <button id="btn_acc" onclick="terms()" disabled>ACCEPT</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Preview Modal -->

<div id="modal-preview">
    <div  id="preview-container">
        <div class="preview_header">
            <p>Check Details</p>
        </div>
        <div class="preview_body">
            
        </div>
        <div class="Btn-preview">
            <button id="submitButton">Proceed</button>
            <a onclick="closePreview()">Cancel</a>
        </div>
    </div>
</div>



<script>
    // terms and condition
    function enable_accept(){
        console.log('enable');
    let checkbox = document.getElementById('terms');
    let btnTerms = document.getElementById('btn_acc');
     
   // Enable the button if the checkbox is checked, otherwise disable it
   if(checkbox.checked){
        btnTerms.disabled = false;
        btnTerms.style.backgroundColor = '#5AA5D1';
   }else{
        btnTerms.disabled = true;
        btnTerms.style.backgroundColor = 'darkgrey';
   }
    }

    function terms(){
        let modal = document.querySelector('.modal');
        modal.style.display='none';
    }
    function old(){

        let at = document.querySelector('#admissiontype').value;
        if(at == 'Returnee' ){
            document.querySelector('#id-div').style.display = "FLEX";
            document.querySelector('#course-div').style.display = "NONE";
            elements =document.querySelectorAll('#if-returnee');

            for (var i = 0; i < elements.length; i++) {
            elements[i].style.display = 'none';
        }

        }else{
            document.querySelector('#id-div').style.display = "NONE";
            document.querySelector('#course-div').style.display = "FLEX";
            

            elements =document.querySelectorAll('#if-returnee');

            for (var i = 0; i < elements.length; i++) {
            elements[i].style.display = 'flex';
            }
        }
    }

    // Preview Before to be Submitted
    function preview() {
    let formElements = document.getElementById("FormPreview").elements;
    let modalPreview = document.querySelector('#modal-preview');
    modalPreview.style.display = "flex";
    
    // Retrieve all form data and store them in variables
    let admissiontype = document.querySelector('select[name="admissiontype"]').value;
    let course = document.querySelector('select[name="course"]').value;
    let firstname = document.querySelector('input[name="firstname"]').value;
    let middlename = document.querySelector('input[name="middlename"]').value;
    let lastname = document.querySelector('input[name="lastname"]').value;
    let suffix = document.querySelector('input[name="suffix"]').value;
    let bod = document.querySelector('input[name="dob"]').value;
    let phone = document.querySelector('input[name="phone"]').value;
    let street = document.querySelector('input[name="street"]').value;
    let city = document.querySelector('input[name="city"]').value;
    let province = document.querySelector('input[name="province"]').value;
    let country = document.querySelector('input[name="country"]').value;
    let zipcode = document.querySelector('input[name="zipcode"]').value;
    let email = document.querySelector('input[name="email"]').value;
    let gender = document.querySelector('select[name="gender"]').value;
    let civilstatus = document.querySelector('select[name="civilstatus"]').value;
    let fatherfirstname = document.querySelector('input[name="fatherfirstname"]').value;
    let fathermiddlename = document.querySelector('input[name="fathermiddlename"]').value;
    let fatherlastname = document.querySelector('input[name="fatherlastname"]').value;
    let fathersuffix = document.querySelector('input[name="fathersuffix"]').value;
    let fatheroccupation = document.querySelector('input[name="fatheroccupation"]').value;
    let motherfirstname = document.querySelector('input[name="motherfirstname"]').value;
    let mothermiddlename = document.querySelector('input[name="mothermiddlename"]').value;
    let motherlastname = document.querySelector('input[name="motherlastname"]').value;
    let mothersuffix = document.querySelector('input[name="mothersuffix"]').value;
    let motheroccupation = document.querySelector('input[name="motheroccupation"]').value;
    let pri_name = document.querySelector('input[name="pri-name"]').value;
    let pri_year = document.querySelector('select[name="pri-year"]').value;
    let sec_name = document.querySelector('input[name="sec-name"]').value;
    let sec_year = document.querySelector('select[name="sec-year"]').value;
    let last_name = document.querySelector('input[name="last-name"]').value;
    let last_year = document.querySelector('select[name="last-year"]').value;
    let guardian_num = document.querySelector('input[name="guardian_num"]').value;
    let id = document.querySelector('input[name="id"]').value; 

    // Now you can use these variables as needed
    let AdmissionType = document.createElement('p');
    let Course = document.createElement('p');
    let Name = document.createElement('p');
    let Bday = document.createElement('p');
    let Phone = document.createElement('p');
    let HomeAddress = document.createElement('p');
    let Email = document.createElement('p');
    let FatherName = document.createElement('p');
    let FatherOccupation = document.createElement('p');
    let MotherName = document.createElement('p');
    let MotherOccupation = document.createElement('p');
    let GuardianNumber = document.createElement('p');
    let PrimarySchool = document.createElement('p');
    let SecondarySchool = document.createElement('p');
    let LastSchool = document.createElement('p');

    
    let container = document.querySelector('.preview_body');


    AdmissionType.innerHTML = `Admission Type: ${admissiontype} ` ;
    Course.innerHTML = `Course: ${course} ` ;
    Name.innerHTML = `Name: ${firstname} ${middlename} ${lastname} ${suffix} ` ;
    Bday.innerHTML += `Birthday: ${bod}`;
    Phone.innerHTML = `Contact Number: ${phone}`;
    HomeAddress.innerHTML = `Home Address: ${street} ${city} ${province} ${country} ${zipcode}`;
    Email.innerHTML = `Email: ${email}`;
    FatherName.innerHTML = `Father's Name: ${fatherfirstname} ${fathermiddlename} ${fatherlastname} ${fathersuffix}`;
    FatherOccupation.innerHTML = `Father's Occupation: ${fatheroccupation}`;
    MotherName.innerHTML = `Mother's Name : ${motherfirstname} ${mothermiddlename} ${motherlastname} ${mothersuffix}`;
    MotherOccupation.innerHTML = `Mother's Occupation: ${motheroccupation}`;
    GuardianNumber.innerHTML = `Parent's/Guardian Number: ${guardian_num}`;
    PrimarySchool.innerHTML = `Primary School: ${pri_name } - ${pri_year}`;
    SecondarySchool.innerHTML = `Secondary School: ${sec_name} - ${sec_year}`; 
    LastSchool.innerHTML = `Last School Attended : ${last_name} - ${last_year}`; 


    container.appendChild(AdmissionType);
    container.appendChild(Course);
    container.appendChild(Name);
    container.appendChild(Bday);
    container.appendChild(Phone);
    container.appendChild(HomeAddress);
    container.appendChild(Email);
    container.appendChild(FatherName);
    container.appendChild(FatherOccupation);
    container.appendChild(MotherName);
    container.appendChild(MotherOccupation);
    container.appendChild(GuardianNumber);
    container.appendChild(PrimarySchool);
    container.appendChild(SecondarySchool);
    container.appendChild(LastSchool);
    
    

    
    
}

function closePreview(){
    let modalPreview = document.querySelector('#modal-preview');
    let container = document.querySelector('.preview_body');
    container.innerHTML = ""
    modalPreview.style.display = "None";
}

let form = document.getElementById("FormPreview");

let submitButton = document.getElementById("submitButton");

// Add event listener to the button
submitButton.addEventListener("click", function(event) {
   
    event.preventDefault();
    form.submit();
});
</script>
